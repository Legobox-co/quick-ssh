<?php

namespace Legobox\QuickSsh;


use Illuminate\Contracts\Container\Container;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\ConsoleOutput;
/**
 * Running all ssh services
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
	public function __construct(Container $app, $config){
		$this->app = $app;
	}

	public function createKeys(){
		// create a new ssh key for the system
		return new Pair::generate($config['keynum']);
	}

	public function connector(array $connect){
		return (new Connector($connect))->connect();
	}
}