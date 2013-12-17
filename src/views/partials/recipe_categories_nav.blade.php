<div class="section-nav section-nav__recipes">

	{{ Form::open(array('action' => 'Fbf\LaravelFood\RecipeCategoriesController@redirector', 'class' => 'section-nav--dropdown js-form-nav')) }}
	{{ Form::select('url', array_merge(array('' => trans('laravel-food::messages.recipe_categories.nav.please_select')), $recipeCategories), Request::url()) }}
	{{ Form::button('Go', array('class' => 'btn', 'type' => 'submit')) }}
	{{ Form::close() }}
    
	<ul class="section-nav--list">
		@foreach ($recipeCategories as $recipeCategoryUrl => $recipeCategoryName)
			<li{{ Request::url() == $recipeCategoryUrl ? ' class="section-nav__selected"' : '' }}>
				@if (Request::url() == $recipeCategoryUrl)
					<span>{{ $recipeCategoryName }}</span>
				@else
					<a href="{{ $recipeCategoryUrl }}" title="{{ $recipeCategoryName }}">
						{{ $recipeCategoryName }}
					</a>
				@endif
			</li>
		@endforeach
	</ul>
</div>