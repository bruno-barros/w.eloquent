<?php namespace Framework\Plugins\Blade;

use Closure;
use Symfony\Component\Security\Core\Exception\InvalidArgumentException;

class BladeCompiler extends \Illuminate\View\Compilers\BladeCompiler
{


	/**
	 * @var(var = value)
	 *
	 * @param $expression
	 * @return string
	 */
	protected function compileVar($expression)
	{
		// expected => ('varName', View::shared('someVar'))

		$args  = substr($expression, 1, -1);
		$args2 = explode('=', $args);

		if(count($args2) !== 2)
		{
			throw new InvalidArgumentException("The @def statemant is out of pattern: @def(var = \$someValue)");
		}

		$var  = str_replace(array('\'', ' '), '', $args2[0]);
		$data = trim($args2[1]);

		return "<?php \${$var} = {$data};?>";
	}

	/**
	 * @loop
	 *
	 * have_posts()
	 *
	 * @param $value
	 * @return string
	 */
	protected function compileLoop($value)
	{

		return '<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>';

	}

	/**
	 * @emptyloop
	 *
	 * have_posts() else:
	 *
	 * @param $value
	 * @return string
	 */
	protected static function compileEmptyloop($value)
	{

		return '<?php endwhile; ?><?php else: ?>';
	}

	/**
	 * @endloop
	 *
	 * have_posts() end;
	 *
	 * @param $value
	 * @return string
	 */
	protected static function compileEndloop($value)
	{

		return '<?php endif; wp_reset_postdata(); ?>';
	}

	/**
	 * @query(array)
	 *
	 * new WP_Query
	 *
	 * @param $expression
	 * @return mixed
	 */
	protected function compileQuery($expression)
	{

		$replacement = "<?php \$bladequery = new WP_Query{$expression}; ";
		$replacement .= "if ( \$bladequery->have_posts() ) : ";
		$replacement .= "while ( \$bladequery->have_posts() ) : ";
		$replacement .= "\$bladequery->the_post(); ?> ";

		return $replacement;
	}

	/**
	 * @emptyquery
	 *
	 * @return string
	 */
	protected function compileEmptyquery()
	{
		return '<?php endwhile; else: ?>';
	}

	/**
	 * @endquery
	 *
	 * @return string
	 */
	protected function compileEndquery()
	{
		return '<?php endif; wp_reset_postdata(); ?>';
	}

	/**
	 * @die($exp);
	 *
	 * @param $expression
	 * @return string
	 */
	protected function compileDie($expression)
	{
		return "<?php die{$expression} ?>";

	}

	/**
	 * @dd($exp)
	 *
	 * var_dump(); die;
	 *
	 * @param $expression
	 * @return string
	 */
	protected function compileDd($expression)
	{
		return "<?php dd{$expression} ?>";
	}


	/**
	 * Advanced custom fields
	 *
	 * has_sub_field( {$expression} )
	 *
	 * @param $expression
	 * @return string
	 */
	public function compileAcfrepeater($expression)
	{
		$replacement = "<?php if ( get_field( {$expression} ) ) : ";
		$replacement .= "while ( has_sub_field( {$expression} ) ) : ?>";

		return $replacement;
	}

	/**
	 * endwhile; endif;
	 *
	 * @param $expression
	 * @return string
	 */
	public function compileAcfend($expression)
	{
		return '<?php endwhile; endif; ?>';
	}



	/*
	 * ======================= STANDARD ===========================
	 */

	/**
	 * Compile the each statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileEach($expression)
	{
		return "<?php echo View::renderEach{$expression}; ?>";
	}

	/**
	 * Compile the yield statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileYield($expression)
	{
		return "<?php echo View::yieldContent{$expression}; ?>";
	}

	/**
	 * Compile the show statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileShow($expression)
	{
		return "<?php echo View::yieldSection(); ?>";
	}

	/**
	 * Compile the section statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileSection($expression)
	{
		return "<?php View::startSection{$expression}; ?>";
	}

	/**
	 * Compile the append statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileAppend($expression)
	{
		return "<?php View::appendSection(); ?>";
	}

	/**
	 * Compile the end-section statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileEndsection($expression)
	{
		return "<?php View::stopSection(); ?>";
	}

	/**
	 * Compile the stop statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileStop($expression)
	{
		return "<?php View::stopSection(); ?>";
	}

	/**
	 * Compile the overwrite statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileOverwrite($expression)
	{
		return "<?php View::stopSection(true); ?>";
	}


	/**
	 * Compile the forelse statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileForelse($expression)
	{
		$empty = '$__empty_' . ++$this->forelseCounter;

		return "<?php {$empty} = true; foreach{$expression}: {$empty} = false; ?>";
	}


	/**
	 * Compile the forelse statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileEmpty($expression)
	{
		$empty = '$__empty_' . $this->forelseCounter--;

		return "<?php endforeach; if ({$empty}): ?>";
	}


	/**
	 * Compile the extends statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileExtends($expression)
	{
		if (starts_with($expression, '('))
		{
			$expression = substr($expression, 1, -1);
		}

		$data = "<?php echo View::make($expression, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";

		$this->footer[] = $data;

		return '';
	}

	/**
	 * Compile the include statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileInclude($expression)
	{
		if (starts_with($expression, '('))
		{
			$expression = substr($expression, 1, -1);
		}

		return "<?php echo View::make($expression, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";
		/*

		  return "<?php echo View::make($expression, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";
		    */

	}

	/**
	 * Compile the stack statements into the content
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileStack($expression)
	{
		return "<?php echo View::yieldContent{$expression}; ?>";
	}

	/**
	 * Compile the push statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compilePush($expression)
	{
		return "<?php View::startSection{$expression}; ?>";
	}

	/**
	 * Compile the endpush statements into valid PHP.
	 *
	 * @param  string $expression
	 * @return string
	 */
	protected function compileEndpush($expression)
	{
		return "<?php View::appendSection(); ?>";
	}

}
