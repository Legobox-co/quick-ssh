<?php

namespace Legobox\QuickSsh;

use Codeaken\SshKey\SshKeyPair;
use Codeaken\SshKey\SshPublicKey;
use Codeaken\SshKey\SshPrivateKey;

class Pair {
	public $publicKey;
	private $privateKey;

	public function __construct($privateKey, $publicKey){
		$this->publicKey = $publicKey;
		$this->privateKey = $privateKey;
	}

	public function connectToServer($connection){
		// use this instance to connect to a server
	}

	public static function generate($keynum){
		$pairs = SshKeyPair::generate($keynum);
		$privateKey = $pairs->getPrivateKey();
		$publicKey = $pairs->getPublicKey();
		return new Pair($privateKey, $publicKey);
	}
}
