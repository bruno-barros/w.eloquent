<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">

	<title>Default</title>

	@include('partials.head')

</head>

<body <?php body_class()?>>

	@include('partials.header')

	<div class="container">

		<div class="row">

			<div class="col-sm-8">

				@yield('main')

			</div>

			<div class="col-sm-4">

				@section('sidebar')

					<h3>My default sidebar</h3>

				@show

			</div>

		</div>

	</div>


	@include('partials.footer')

</body>

</html>