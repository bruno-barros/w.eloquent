@extends('layouts.home')


@section('main')


	@loop

		<h2><a href="{{ the_permalink() }}">{{the_title()}}</a></h2>

	{{ the_content() }}

	@emptyloop

		<p>404</p>

	@endloop



@stop

@section('sidebar')

	@parent

@stop