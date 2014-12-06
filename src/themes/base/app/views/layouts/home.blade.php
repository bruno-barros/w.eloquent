@extends('master')
<?php
// Layout define a page structure
?>
@section('middle')

 	@include('partials.header')

 	<div class="container">

 		<div class="row">

 			<div class="col-sm-8">

 				@yield('main')

 			</div>

 			<div class="col-sm-4">

 				@section('sidebar')

 					<h3>My default sidebar</h3>

 					<form action="{{ get_home_url() }}/submit" method="POST">
 					<input type="text" name="input"/>
 					<button type="submit">GO</button>
 					</form>


 				@show

 			</div>

 		</div>

 	</div>


 	@include('partials.footer')

@stop