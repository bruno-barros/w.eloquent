@include('header')


	<h1>Test blade</h1>

	@if(true)
	<p>show true</p>
	@else
	<p>show false</p>
	@endif



	@wpposts

	<h2><a href="{{ the_permalink() }}">{{the_title()}}</a></h2>

	{{ the_content() }}


	@wpempty

	<p>404</p>

	@wpend


	<hr/>

@debug([1,2,'bb'])

<ul>
	@wpquery(array('post_type' => 'post'))
	<li><a href="{{the_permalink()}}">{{the_title()}}</a></li>
	@wpempty
	<li>{{ __('Sorry, no posts matched your criteria.') }}</li>
	@wpend
</ul>


{{ View::make('master')->render() }}


@include('footer')