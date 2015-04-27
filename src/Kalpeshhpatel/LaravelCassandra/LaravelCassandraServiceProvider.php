<?php namespace Kalpeshhpatel\LaravelCassandra;

use Illuminate\Support\ServiceProvider;

class LaravelCassandraServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
            $this->app['Cassandra'] = $this->app->share(function($app)
            {
                return new Cassandra();
            });

            $this->app->booting(function()
            {
                $loader = \Illuminate\Foundation\AliasLoader::getInstance();
                $loader->alias('Cassandra', 'Kalpeshhpatel\LaravelCassandra\Facades\Cassandra');
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
