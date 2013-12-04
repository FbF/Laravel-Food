<?php namespace Fbf\LaravelFood;

class BaseModel extends \Eloquent {

	/**
	 * Status values for the database
	 */
	const DRAFT = 'DRAFT';
	const APPROVED = 'APPROVED';

	/**
	 * Used for Cviebrock/EloquentSluggable
	 * @var array
	 */
	public static $sluggable = array(
		'build_from' => 'name',
		'save_to' => 'slug',
		'separator' => '-',
		'unique' => true,
	);

	/**
	 * Used to store the old image value, set during model updating event before the model is actually updated
	 * Used to compare with the new main image value after saving the model, so we can work out whether we need to
	 * recalculate the image width and height
	 * @var string
	 */
	protected $oldImages = array();

	protected $imageFields = array();

	/**
	 *
	 */
	public static function boot()
	{
		parent::boot();

		static::created(function($model)
		{
			foreach ($model->imageFields as $field)
			{
				// If the record is being created and there is an "image" supplied, set it's width and height
				if (!empty($model->$field))
				{
					$model->updateImageSize($field);
				}
			}
		});

		static::updating(function($model)
		{
			$obj = self::where('id','=',$model->id)->first();
			foreach ($model->imageFields as $field)
			{
				// If the record is about to be updated and there is a "image" supplied, get the current image
				// value so we can compare it to the new one
				$model->oldImages[$field] = $obj->pluck($field);
			}
			return true;
		});

		static::updated(function($model)
		{
			foreach ($model->imageFields as $field)
			{
				// If the main image has changed, and the save was successful, update the database with the new width and height
				if (isset($model->oldImages[$field]) && $model->oldImages[$field] <> $model->$field)
				{
					$model->updateImageSize($field);
				}
			}
		});

	}

	/**
	 * Triggered from madel save events, it updates the main image width and height fields to the values of the
	 * uploaded image.
	 */
	protected function updateImageSize($field)
	{
		// Get path to image
		$pathToImage = public_path() . \Config::get('laravel-blog::details_image_dir') . $this->$field;
		if (is_file($pathToImage) && file_exists($pathToImage))
		{
			list($width, $height) = getimagesize($pathToImage);
		}
		else
		{
			$width = $height = null;
		}
		// Update the database, use DB::table()->update approach so as not to trigger the Eloquent save() event again.
		\DB::table($this->getTable())
			->where('id', $this->id)
			->update(array(
				$field.'_width' => $width,
				$field.'_height' => $height,
			));
	}

	public function scopeLive($query)
	{
		return $query->where($this->getTable().'.status', '=', self::APPROVED)
			->where($this->getTable().'.published_date', '<=', \Carbon\Carbon::now());
	}

}