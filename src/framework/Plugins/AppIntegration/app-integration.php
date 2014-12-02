<?php namespace Framework\Plugins\AppIntegration;

	/**
	 * The plugin bootstrap file
	 *
	 * This file is read by WordPress to generate the plugin information in the plugin
	 * Dashboard. This file also includes all of the dependencies used by the plugin,
	 * registers the activation and deactivation functions, and defines a function
	 * that starts the plugin.
	 *
	 *
	 * @wordpress-plugin
	 * Plugin Name: AppIntegration
	 * Plugin URI: http://brunobarros.com/
	 * Description: A framework for WordPress developers.
	 * Version: 1.0.0
	 * Author: Bruno Barros
	 * Author URI: http://www.brunobarros.com/
	 * License: GPLv2
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 * Text Domain:       app-integration
	 * Domain Path:       /languages
	 */

// If this file is called directly, abort.
use Framework\Config\Environment;
use Framework\Plugins\AppIntegration\Includes\AppIntegration;
use Framework\Plugins\AppIntegration\Includes\AppIntegrationActivator;
use Framework\Plugins\AppIntegration\Includes\AppIntegrationDeactivator;
use Illuminate\Config\Repository as Config;
use Illuminate\Support\Facades\Facade;

if (!defined('WPINC'))
{
	die;
}


/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new \Illuminate\Foundation\Application;

/*
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Laravel takes a dead simple approach to your application environments
| so you can just specify a machine name for the host that matches a
| given environment, then we will automatically detect it for you.
|
*/

$objEnv = new Environment(dirname(ABSPATH).DS);
$env = $objEnv->which();
$app['env'] = $env;
/*
|--------------------------------------------------------------------------
| Bind Paths
|--------------------------------------------------------------------------
|
| Here we are binding the paths configured in paths.php to the app. You
| should not be changing these here. If you need to change these you
| may do so within the paths.php file and they will be bound here.
|
*/
//dd(file_exists(dirname(ABSPATH).'/app/bootstrap/paths.php'));
$app->bindInstallPaths(require dirname(ABSPATH).'/src/bootstrap/paths.php');

/*
|--------------------------------------------------------------------------
| Load The Application
|--------------------------------------------------------------------------
|
| Here we will load this Illuminate application. We will keep this in a
| separate location so we can isolate the creation of an application
| from the actual running of the application with a given request.
|
*/

//$framework = $app['path.base'].'/../vendor/laravel/framework/src';

//require $framework.'/Illuminate/Foundation/start.php';

/*
|--------------------------------------------------------------------------
| Bind The Application In The Container
|--------------------------------------------------------------------------
|
| This may look strange, but we actually want to bind the app into itself
| in case we need to Facade test an application. This will allow us to
| resolve the "app" key out of this container for this app's facade.
|
*/

$app->instance('app', $app);

/*
|--------------------------------------------------------------------------
| Load The Illuminate Facades
|--------------------------------------------------------------------------
|
| The facades provide a terser static interface over the various parts
| of the application, allowing their methods to be accessed through
| a mixtures of magic methods and facade derivatives. It's slick.
|
*/

Facade::clearResolvedInstances();

Facade::setFacadeApplication($app);
/*
|--------------------------------------------------------------------------
| Register Facade Aliases To Full Classes
|--------------------------------------------------------------------------
|
| By default, we use short keys in the container for each of the core
| pieces of the framework. Here we will register the aliases for a
| list of all of the fully qualified class names making DI easy.
|
*/

$aliases = array(
	'app'            => 'Illuminate\Foundation\Application',
	'artisan'        => 'Illuminate\Console\Application',
	'auth'           => 'Illuminate\Auth\AuthManager',
	'auth.reminder.repository' => 'Illuminate\Auth\Reminders\ReminderRepositoryInterface',
	'blade.compiler' => 'Illuminate\View\Compilers\BladeCompiler',
	'cache'          => 'Illuminate\Cache\CacheManager',
	'cache.store'    => 'Illuminate\Cache\Repository',
	'config'         => 'Illuminate\Config\Repository',
	'cookie'         => 'Illuminate\Cookie\CookieJar',
	'encrypter'      => 'Illuminate\Encryption\Encrypter',
	'db'             => 'Illuminate\Database\DatabaseManager',
	'events'         => 'Illuminate\Events\Dispatcher',
	'files'          => 'Illuminate\Filesystem\Filesystem',
	'form'           => 'Illuminate\Html\FormBuilder',
	'hash'           => 'Illuminate\Hashing\HasherInterface',
	'html'           => 'Illuminate\Html\HtmlBuilder',
	'translator'     => 'Illuminate\Translation\Translator',
	'log'            => 'Illuminate\Log\Writer',
	'mailer'         => 'Illuminate\Mail\Mailer',
	'paginator'      => 'Illuminate\Pagination\Factory',
	'auth.reminder'  => 'Illuminate\Auth\Reminders\PasswordBroker',
	'queue'          => 'Illuminate\Queue\QueueManager',
	'redirect'       => 'Illuminate\Routing\Redirector',
	'redis'          => 'Illuminate\Redis\Database',
	'request'        => 'Illuminate\Http\Request',
	'router'         => 'Illuminate\Routing\Router',
	'session'        => 'Illuminate\Session\SessionManager',
	'session.store'  => 'Illuminate\Session\Store',
	'remote'         => 'Illuminate\Remote\RemoteManager',
	'url'            => 'Illuminate\Routing\UrlGenerator',
	'validator'      => 'Illuminate\Validation\Factory',
	'view'           => 'Illuminate\View\Factory',
);

foreach ($aliases as $key => $alias)
{
	$app->alias($key, $alias);
}


/*
|--------------------------------------------------------------------------
| Register The Configuration Repository
|--------------------------------------------------------------------------
|
| The configuration repository is used to lazily load in the options for
| this application from the configuration files. The files are easily
| separated by their concerns so they do not become really crowded.
|
*/
//dd($app['path']);

use Illuminate\Filesystem\Filesystem;
use Illuminate\Config\FileLoader;
$app->instance('config', $config = new Config(

//	$app->getConfigLoader(), $env
	new FileLoader(new Filesystem, $app['path'].'/config'), $env

));

/*
|--------------------------------------------------------------------------
| Set The Default Timezone
|--------------------------------------------------------------------------
|
| Here we will set the default timezone for PHP. PHP is notoriously mean
| if the timezone is not explicitly set. This will be used by each of
| the PHP date and date-time functions throughout the application.
|
*/

$config = $app['config']['app'];

date_default_timezone_set($config['timezone']);



/*
|--------------------------------------------------------------------------
| Register The Alias Loader
|--------------------------------------------------------------------------
|
| The alias loader is responsible for lazy loading the class aliases setup
| for the application. We will only register it if the "config" service
| is bound in the application since it contains the alias definitions.
|
*/

$aliases = $config['aliases'];

use Illuminate\Foundation\AliasLoader;

AliasLoader::getInstance($aliases)->register();


/*
|--------------------------------------------------------------------------
| Enable HTTP Method Override
|--------------------------------------------------------------------------
|
| Next we will tell the request class to allow HTTP method overriding
| since we use this to simulate PUT and DELETE requests from forms
| as they are not currently supported by plain HTML form setups.
|
*/
use Illuminate\Http\Request;

Request::enableHttpMethodParameterOverride();


/*
|--------------------------------------------------------------------------
| Register The Core Service Providers
|--------------------------------------------------------------------------
|
| The Illuminate core service providers register all of the core pieces
| of the Illuminate framework including session, caching, encryption
| and more. It's simply a convenient wrapper for the registration.
|
*/

$providers = $config['providers'];

$app->getProviderRepository()->load($app, $providers);

/*
|--------------------------------------------------------------------------
| Register Booted Start Files
|--------------------------------------------------------------------------
|
| Once the application has been booted there are several "start" files
| we will want to include. We'll register our "booted" handler here
| so the files are included after the application gets booted up.
|
*/

$app->booted(function() use ($app, $env)
{

	/*
	|--------------------------------------------------------------------------
	| Load The Application Routes
	|--------------------------------------------------------------------------
	|
	| The Application routes are kept separate from the application starting
	| just to keep the file a little cleaner. We'll go ahead and load in
	| all of the routes now and return the application to the callers.
	|
	*/

//	$routes = $app['path'].'/routes.php';
//
//	if (file_exists($routes)) require $routes;

});

$routes = $app['path'].'/config/routes.php';
//dd(file_exists($routes));
if (file_exists($routes)) require $routes;

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can simply call the run method,
| which will execute the request and send the response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have whipped up for them.
|
*/
try{
	$request = \Illuminate\Http\Request::createFromGlobals();
	$response = $app['router']->dispatch($request);
	$response->send();
} catch (\Exception $e)
{
	// fail silently
}
//$app->run();

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 */
function run_wp_framework()
{
	/**
	 * The core plugin class that is used to define internationalization,
	 * dashboard-specific hooks, and public-facing site hooks.
	 */
	$plugin = new AppIntegration();
	$plugin->run();

}

run_wp_framework();
