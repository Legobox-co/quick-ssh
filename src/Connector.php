<?php

namespace Legobox\QuickSsh;

use Collective\Remote\Connection; 

class Connector {

	private function getAuth($value){
		if (isset($config['key']) && trim($config['key']) != '') {
            return ['keytext' => $config['key']];
        } elseif (isset($config['password'])) {
            return ['password' => $config['password']];
        }

        throw new \InvalidArgumentException('Password / key is required.');
	}

	protected function connect($array $config)
    {
        $timeout = isset($config['timeout']) ? $config['timeout'] : 20;

        $this->setOutput($connection = new Connection(

            $config['host'], $config['host'], $config['username'], $this->getAuth($config), null, $timeout

        ));

        return $connection;
    }
}