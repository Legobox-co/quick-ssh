<?php

namespace Legobox\QuickSsh;

use Codeaken\SshKey\SshKey;

class Key {
	
	/**
	 * Our Key instance
	 *
	 * @var [type]
	 */
	private $key;

	/**
	 * Type of Key stored
	 *
	 * @var string
	 */
	private $type = 'public';


	/**
	 * Initializing key point
	 *
	 * @param SshKey $key
	 * @param [type] $type
	 */
	public function __construct(SshKey $key, $type = null){
		$this->key = $key;
		if($type != null) $this->type = $type;
	}

	/**
	 * returning the Key text
	 *
	 * @return void
	 */
	public function getText(){
		return $this->key->getKeyData(SshKey::FORMAT_OPENSSH);
	}

	/**
	 * returning the type
	 *
	 * @return void
	 */
	public function getType(){
		return $this->type;
	}

	/**
	 * returning the Key instance
	 *
	 * @return void
	 */
	public function getKey(){
		return $this->key;
	}
}