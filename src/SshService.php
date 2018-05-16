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
	 * variable for configs
	 *
	 * @var [type]
	 */
	public $config;

	/**
	 * Initailizing the class
	 *
	 * @param Container $app
	 */
	public function __construct(Container $app, $config){
		$this->app = $app;
		$this->config = $config;
	}

	public function createKeys(){
		// create a new ssh key for the system
		return Pair::generate($this->config['keynum']);
	}

	public function connector(array $connect){
		return (new Connector($connect))->connect();
	}
}