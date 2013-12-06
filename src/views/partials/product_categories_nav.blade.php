<div class="section-nav">
	<ul>
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