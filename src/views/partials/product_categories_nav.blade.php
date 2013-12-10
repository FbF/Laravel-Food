<div class="section-nav">
    <form action="" method="post" class="section-nav--dropdown">
        <select>
            @foreach ($productCategories as $productCategory)
    			<option value="{{ $productCategory->getUrl() }}"{{ Request::url() == $productCategory->getUrl() ? ' selected="selected"' : '' }}>{{ $productCategory->name }}</option>
    		@endforeach
        </select>
        <input type="submit" value="Go" />
    </form>
    
	<ul class="section-nav--list">
		@foreach ($productCategories as $productCategory)
			<li{{ Request::url() == $productCategory->getUrl() ? ' class="section-nav__selected"' : '' }}>
				@if (Request::url() == $productCategory->getUrl())
					<span>{{ $productCategory->name }}</span>
				@else
					<a href="{{ $productCategory->getUrl() }}" title="{{ $productCategory->name }}">
						{{ $productCategory->name }}
					</a>
				@endif
			</li>
		@endforeach
	</ul>
</div>