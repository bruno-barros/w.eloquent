@extends('master')
<?php
// Layout define a page structure
?>
@section('body_middle')

 	@include('partials.header')

 	<div class="container">

 		<div class="row">

 			<div class="col-sm-4">

				@section('menu')

					{{ Menu::render('primary') }}

				@show

				@section('sidebar')

					<?php dynamic_sidebar(); ?>

                @show


 			</div>

 			<div class="col-sm-8">

 				@yield('main')

 			</div>

 		</div>

 	</div>


 	@include('partials.footer')

@stop