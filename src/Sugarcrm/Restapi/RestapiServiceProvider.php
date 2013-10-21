<?php namespace Sugarcrm\Restapi;

use Illuminate\Support\ServiceProvider;

class RestapiServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('sugarcrm/restapi');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        //
        $app = $this->app;

        $this->app['sugarrest'] = $this->app->share(function ($app) {

            $connector = new Rest;

            $connector->setUrl($app['config']->get('restapi::config.url', 'http://localhost/rest/v10')); //'http://localhost/service/v4_1/rest.php';
            $connector->setUsername($app['config']->get('restapi::config.user', 'user'));
            $connector->setPassword($app['config']->get('restapi::config.password', 'password'));

            return $connector;
        });

        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('SugarRestApi', 'Sugarcrm\Restapi\Facades\SugarRestApi');
        });

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}