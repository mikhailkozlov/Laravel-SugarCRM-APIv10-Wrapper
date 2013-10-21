<?php namespace  Sugarcrm\Restapi\Facades;

use Illuminate\Support\Facades\Facade;

class SugarRestApi extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'sugarrest'; }

}