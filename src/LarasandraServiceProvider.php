<?php

namespace SerdarOzturk\Larasandra;

use Illuminate\Support\ServiceProvider;
use Cassandra;

class LarasandraServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving('db', function ($db) {
            $db->extend('Cassandra', function ($config, $name) {
                $config['name'] = $name;
                return new Connection($config);
            });
        });
    }

}