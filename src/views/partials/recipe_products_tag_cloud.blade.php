<div class="tag-cloud">
    <h3>Filter by product</h3>
    
	@foreach($productTags as $tag)
		<span class="tag tag__{{ $tag['weight'] }}">
			<a href="{{ $tag['url'] }}">
				{{ $tag['name'] }}
			</a>
		</span>
	@endforeach
</div>