<?php

namespace Legobox\QuickSsh\Facades;

use Illuminate\Support\Facades\Facade;

class QuickSsh extends Facade {

    /**
    * Setting up the facade assessor
    *
    * @return void
    */
    protected static function getFacadeAccessor(){
        return 'quickssh';
    }
	
}
