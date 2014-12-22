<!doctype html>
<html <?php language_attributes()?>>
<head>
	<meta charset="UTF-8">

	<title>{{ wp_title('&gt;', false, 'right' ) }}</title>

	<?php wp_head()?>

	@yield('head')

</head>

<body <?php body_class()?>>

	@yield('content')

</body>

</html>