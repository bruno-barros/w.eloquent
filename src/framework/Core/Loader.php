<?php  namespace Framework\Core;

/**
 * Loader
 *
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright    Copyright (c) 2014 Bruno Barros
 */
abstract class Loader
{


	/**
	 * Keep a copy of file names.
	 */
	protected static $names = array();

	/**
	 * @var Application
	 */
	protected static $app;

	/**
	 * @param Application $app
	 * @return static
	 */
	public static function setApp(Application $app)
	{
		static::$app = $app;
		return new static;
	}

	/**
	 * Validate the path and require common and environment files
	 *
	 * @param $path
	 * @return bool
	 */
	protected static function append($path)
	{

		if (is_dir($path))
		{

			$env = (is_admin()) ? 'admin' : 'front';

			// from common path
			static::requireFiles($path);

			// from environment path
			static::requireFiles($path."/{$env}");


			return true;

		}

		return false;

	}

	/**
	 * Scan the directory at the given path and include
	 * all files. Only 1 level iteration.
	 *
	 * @param string $path The directory/file path.
	 * @return bool True. False if not appended.
	 */
	public static function requireFiles($path)
	{
		$dir = new \DirectoryIterator($path);

		foreach ($dir as $file)
		{

			if (!$file->isDot() || !$file->isDir())
			{

				$file_extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);

				if ($file_extension === 'php')
				{

					static::$names[] = $file->getBasename('.php');

					include_once $file->getPath() . DS . $file->getBasename();

				}

			}

		}
	}
} 