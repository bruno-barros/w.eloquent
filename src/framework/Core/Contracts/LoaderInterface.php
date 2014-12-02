<?php namespace Framework\Core\Contracts;

/**
 * LoaderInterface
 *
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright    Copyright (c) 2014 Bruno Barros
 */
interface LoaderInterface
{
	/**
	 * Build the path where the class has to scan
	 * the files.
	 */
	public static function add();
} 