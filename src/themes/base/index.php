@include('header')



	@wpposts

	<h2><a href="{{ the_permalink() }}">{{the_title()}}</a></h2>

	{{ the_content() }}


	@wpempty

	<p>404</p>

	@wpend


	{{ View::make('master')->render() }}


@include('footer')