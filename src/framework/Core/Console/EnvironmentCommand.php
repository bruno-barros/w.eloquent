<?php namespace Framework\Core\Console;

use Illuminate\Console\Command;

class EnvironmentCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'env';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Display the current w.eloquent environment";

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->line('<info>Current w.eloquent environment:</info> <comment>'.$this->laravel['env'].'</comment>');
	}

}
