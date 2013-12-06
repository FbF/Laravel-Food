<?php namespace Fbf\LaravelFood;

class BaseModel extends \Eloquent {

	/**
	 * Status values for the database
	 */
	const DRAFT = 'DRAFT';
	const APPROVED = 'APPROVED';

	public function scopeLive($query)
	{
		return $query->where($this->getTable().'.status', '=', self::APPROVED)
			->where($this->getTable().'.published_date', '<=', \Carbon\Carbon::now());
	}

}