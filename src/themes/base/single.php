@extends('master')

@section('main')

	@loop

		<h1>{{the_title()}}</h1>

		{{ the_content() }}


	@emptyloop

		<p>404</p>

	@endloop


@stop