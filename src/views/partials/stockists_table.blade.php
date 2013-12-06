<div class="stockists stockists__table">
	<table>
		<thead>
			<tr>
				<th colspan="2"></th>
				@foreach ($stockists as $stockist)
					<th class="stockist stockist__{{ Str::slug($stockist->name) }}">{{ $stockist->getLogo() }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach ($productCategories as $productCategory)
				<tr>
					<th rowspan="{{ count($productCategory->products) + 1 }}" class="product-category-stockist-image">
						{{ $productCategory->getStockistImageOriginal() }}
					</th>
					<th colspan="{{ count($stockists) + 1 }}" class="product-category-name">
						{{ $productCategory->name }}
					</th>
				</tr>
				@foreach ($productCategory->products as $product)
					<tr>
						<th class="product-name">
							{{ $product->name }}
						</th>
						@foreach ($stockists as $stockist)
							<td class="product-stocked">
								@if ($product->stockists->contains($stockist->id))
									Yes
								@endif
							</td>
						@endforeach
					</tr>
				@endforeach
			@endforeach
		</tbody>
	</table>
</div>