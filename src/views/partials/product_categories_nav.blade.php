<div class="section-nav">

	{{ Form::open(array('action' => 'Fbf\LaravelFood\ProductCategoriesController@redirector', 'class' => 'section-nav--dropdown js-form-nav')) }}
	{{ Form::select('url', array_merge(array('' => trans('laravel-food::messages.product_categories.nav.please_select')), $productCategories), Request::url()) }}
	{{ Form::button('Go', array('class' => 'btn', 'type' => 'submit')) }}
	{{ Form::close() }}

	<ul class="section-nav--list">
		@foreach ($productCategories as $productCategoryUrl => $productCategoryName)
			<li{{ Request::url() == $productCategoryUrl ? ' class="section-nav__selected"' : '' }}>
				@if (Request::url() == $productCategoryUrl)
					<span>{{ $productCategoryName }}</span>
				@else
					<a href="{{ $productCategoryUrl }}" title="{{ $productCategoryName }}">
						{{ $productCategoryName }}
					</a>
				@endif
			</li>
		@endforeach
	</ul>
</div>