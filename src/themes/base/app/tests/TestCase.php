<?php namespace App\Tests;

use Illuminate\Foundation\Testing\ApplicationTrait;

class TestCase extends \PHPUnit_Framework_TestCase {

	use ApplicationTrait;


	/**
	 * Setup the test environment.
	 *
	 * @return void
	 */
	public function setUp()
	{
		\WP_Mock::setUp();

		if ( ! $this->app)
		{
			$this->app = $this->createApplication();

			$this->client = $this->createClient();

			$this->app->setRequestForConsoleEnvironment();

			$this->app->boot();
		}
	}

	public function tearDown() {

		\WP_Mock::tearDown();
		\Mockery::close();
	}




	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		$paths = require SRC_PATH . '/bootstrap/paths.php';

		$appInit = $paths['framework'] . '/Core/LaravelApplication.php';

		return require $appInit;
	}

}
