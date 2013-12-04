@extends ('layouts.master')

@section ('content')
	@include ('laravel-food::partials.recipes_list')
	{{ $recipes->links() }}
@stop