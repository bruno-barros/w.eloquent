@extends('layouts.home')


@section('main')

	<h1>Test blade</h1>


	@loop

		<h2><a href="{{ the_permalink() }}">{{the_title()}}</a></h2>

	{{ the_content() }}

	@emptyloop

		<p>404</p>

	@endloop



	<hr/>


<ul>
	@query(array('post_type' => 'post'))

	<li><a href="{{the_permalink()}}">{{the_title()}}</a></li>

	@emptyquery

	<li>{{ __('Sorry, no posts matched your criteria.') }}</li>

	@endquery
</ul>


@stop

@section('sidebar')

	<h3>My page sidebar</h3>
	<ul>
		<li><a href="#">some link</a></li>
	</ul>

	@parent

@stop