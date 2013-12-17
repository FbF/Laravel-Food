<div class="stockists--table">
	<table>
		<thead>
			<tr>
				<th colspan="2"></th>
				@foreach ($stockists as $stockist)
					<th class="stockists--table__{{ Str::slug($stockist->name) }}">{{ $stockist->getRotatedLogo() }}</th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach ($productCategories as $productCategory)
				<tr>
					<th rowspan="{{ count($productCategory->products) + 1 }}" class="stockists--category-image">
						{{ $productCategory->getStockistImageOriginal() }}
					</th>
					<th colspan="{{ count($stockists) + 1 }}" class="stockists--category-name">
						{{ $productCategory->name }}
					</th>
				</tr>
				@foreach ($productCategory->products as $product)
					<tr>
						<th class="stockists--product-name">
							{{ $product->name }}
						</th>
						@foreach ($stockists as $stockist)
							<td class="stockists--product-stocked">
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