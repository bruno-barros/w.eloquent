<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">

	<title><?php wp_title() ?></title>

	@include('partials.head')

	@yield('head')

</head>

<body <?php body_class()?>>

@yield('top')

@yield('middle')

@yield('bottom')

</body>

</html>