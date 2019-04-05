<?php

namespace Legobox\QuickSsh;

use Collective\Remote\Connection; 
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\ConsoleOutput;

class Connector {

    private $connectVariable;
    protected $config;

	public function __construct($connectVariable){
        $this->connectVariable = $connectVariable;
	}

	private function getAuth($value){
		if (isset($value['keytext']) && trim($value['keytext']) != '') {
            return ['keytext' => $value['keytext']];
        } elseif (isset($value['password'])) {
            return ['password' => $value['password']];
        }

        throw new \InvalidArgumentException('Password / key is required.');
	}

	public function connect()
    {
        $timeout = isset($this->connectVariable['timeout']) ? $this->connectVariable['timeout'] : 20;

        $this->setOutput($connection = new Connection(
            $this->connectVariable['host'], 
            $this->connectVariable['host'], 
            $this->connectVariable['username'], 
            $this->getAuth($this->connectVariable), 
            null, 
            $timeout
        ));

        return $connection;
	}
	
	public function setOutput(Connection $connection){
		$output = php_sapi_name() == 'cli' ? new ConsoleOutput() : new NullOutput();

        $connection->setOutput($output);
	}
}