<div class="section-nav section-nav__recipes">
    <form action="" method="post" class="section-nav--dropdown js-form-nav">
        <select>
            @foreach ($recipeCategories as $recipeCategory)
    			<option value="{{ $recipeCategory->getUrl() }}"{{ Request::url() == $recipeCategory->getUrl() ? ' selected="selected"' : '' }}>{{ $recipeCategory->name }}</option>
    		@endforeach
        </select>
        <input type="submit" value="Go" />
    </form>
    
	<ul class="section-nav--list">
		@foreach ($recipeCategories as $recipeCategory)
			<li{{ Request::url() == $recipeCategory->getUrl() ? ' class="section-nav__selected"' : '' }}>
				@if (Request::url() == $recipeCategory->getUrl())
					<span>{{ $recipeCategory->name }}</span>
				@else
					<a href="{{ $recipeCategory->getUrl() }}" title="{{ $recipeCategory->name }}">
						{{ $recipeCategory->name }}
					</a>
				@endif
			</li>
		@endforeach
	</ul>
</div>