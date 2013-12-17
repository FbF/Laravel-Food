<div class="stockists--list">
	<ul>
		@foreach ($stockists as $stockist)
			@if (count($stockist->products) > 0)
				<li class="stockist stockist__{{ Str::slug($stockist->name) }}">
					{{ $stockist->getLogo() }}
					<ul>
						@foreach ($stockist->products as $product)
							<li>
								<a href="{{ $product->getUrl() }}" title="{{ $product->name }}">
									{{ $product->name }}
								</a>
							</li>
						@endforeach
					</ul>
				</li>
			@endif
		@endforeach
	</ul>
</div>