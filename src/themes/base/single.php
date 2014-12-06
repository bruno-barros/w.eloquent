@extends('layouts.home')

@section('main')




	@var(mp = View::shared('myPost'))

	{{ $mp->post_title or 'no title' }}



	@loop

		<h1>{{the_title()}}</h1>

		{{ the_content() }}


	@emptyloop

		<p>404</p>

	@endloop


@stop