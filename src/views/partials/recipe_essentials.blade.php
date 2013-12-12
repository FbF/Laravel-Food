<div class="essentials essentials__recipe">
	<ul>
		<li class="essentials--serves essentials--serves__{{ $recipe->serves }}">
			{{ trans('laravel-food::messages.recipes.details.serves', array('num' => $recipe->serves)) }}
		</li>
		<li class="essentials--prep-time">
			{{ trans('laravel-food::messages.recipes.details.prep_time', array('num' => $recipe->prep_time)) }}
		</li>
		<li class="essentials--cook-time">
			{{ trans('laravel-food::messages.recipes.details.cook_time', array('num' => $recipe->cook_time)) }}
		</li>
	</ul>
</div>