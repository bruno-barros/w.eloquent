@extends('layouts.home')

@section('main')


	@var(mp = View::shared('myPost'))


	@loop

		<h1 class="page-title">{{ the_title() }}</h1>

		<p><em>{{ $mp->post_date->format('d . M . y') }}</em></p>

		{{ the_content() }}


	@emptyloop

		<h2>404</h2>

	@endloop


@stop