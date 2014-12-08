<?php
// If this file is called directly, abort.
if (!defined('WPINC'))
{
	die;
}


/*
|--------------------------------------------------------------------------
| Setup Patchwork UTF-8 Handling
|--------------------------------------------------------------------------
|
| The Patchwork library provides solid handling of UTF-8 strings as well
| as provides replacements for all mb_* and iconv type functions that
| are not available by default in PHP. We'll setup this stuff here.
|
*/

Patchwork\Utf8\Bootup::initMbstring();

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

$app = new \Framework\Core\Application;

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

$objEnv = new Framework\Config\Environment(dirname(ABSPATH));
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
$app->bindInstallPaths(require SRC_PATH.'/framework/bootstrap/paths.php');


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
use Illuminate\Support\Facades\Facade;

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
	'app'            => 'Framework\Core\Application',
	'artisan'        => 'Framework\Core\Console\WelConsole',
	'auth'           => 'Illuminate\Auth\AuthManager',
	'auth.reminder.repository' => 'Illuminate\Auth\Reminders\ReminderRepositoryInterface',
	'blade.compiler' => 'Framework\Plugins\Blade\BladeCompiler',
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
//	'request'        => 'Illuminate\Http\Request',
//	'router'         => 'Illuminate\Routing\Router',
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
use Illuminate\Config\Repository as Config;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Config\FileLoader;
$app->instance('config', $config = new Config(

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
