<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ get_the_title() }}</title>
	
	<style>
		body{
			background-color: #fff6ed;
			font-family: Georgia, "Bitstream Charter", serif;
			line-height: 1.5em;
		}
		a, p{
			color: #777;
			text-decoration: none;
		}
		.container {
			margin: 30px auto;
			width: 50%;
			border: #fff solid 2px;
		}
		.logo{
			display: block;
			width: 100%;
			height: auto;
			margin: 20px 0 0 0;
		}
		.post {
			margin: 0 30px 15px;
		}
		hr{
			margin: 0 30px;
			border: 0;
			border-top: 1px solid #ec5959;
		}
		.get-theme {
			text-align: center;
			color: #ec5959;
			display: block;
			padding: 10px;
		}
	</style>
	
	<?php wp_head()?>
</head>
<body>

	<div class="container">

		<a href="{{ get_home_url() }}" title="back home">
			<img src="https://raw.githubusercontent.com/bruno-barros/w.eloquent/master/src/themes/base/screenshot.png" alt="w.eloquent" class="logo"/>
		</a>

		@loop

			<div class="post">
				<h2><a href="{{ the_permalink() }}">{{ the_title() }}</a></h2>

				{{ the_content() }}
			</div>

		@emptyloop

		<p>404</p>

		@endloop

		<hr/>

		<a href="https://github.com/bruno-barros/weloquent-starter-theme" class="get-theme">get a base theme on github</a>

	</div>



<?php wp_footer()?>
</body>
</html>





