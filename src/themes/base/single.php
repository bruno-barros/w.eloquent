@include('header')

	<a href="{{ get_home_url() }}">Home</a>


	@wpposts

		<h1>{{the_title()}}</h1>

		{{ the_content() }}


	@wpempty

		<p>404</p>

	@wpend



@include('footer')