<?php

namespace Legobox\QuickSsh;

use Illuminate\Contracts\Container\Container;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\ConsoleOutput;
/**
 * Running all ssh services, Creati
 */
class SshService {

	/**
	 * Illuminate App instance
	 *
	 * @var [Illuminate\Contracts\Container\Container]
	 */
	public $app;

	/**
	 * Initailizing the class
	 *
	 * @param Container $app
	 */
	public function __construct(Container $app){
		$this->app = $app;
	}


}