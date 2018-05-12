<?php

namespace Legobox\QuickSsh;

use Collective\Remote\Connection; 
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\ConsoleOutput;

class Connector {

	private $connectVariable;

	public function __construct($connectVariables){
		$this->connectVariable = $connectVariable;
	}

	private function getAuth($value){
		if (isset($config['key']) && trim($config['key']) != '') {
            return ['keytext' => $config['key']];
        } elseif (isset($config['password'])) {
            return ['password' => $config['password']];
        }

        throw new \InvalidArgumentException('Password / key is required.');
	}

	protected function connect()
    {
        $timeout = isset($this->connectVariable['timeout']) ? $this->connectVariable['timeout'] : 20;

        $this->setOutput($connection = new Connection(

            $this->connectVariable['host'], $this->connectVariable['host'], $this->connectVariable['username'], $this->getAuth($this->connectVariable), null, $timeout

        ));

        return $connection;
	}
	
	public function setOutput(Connection $connection){
		$output = php_sapi_name() == 'cli' ? new ConsoleOutput() : new NullOutput();

        $connection->setOutput($output);
	}
}