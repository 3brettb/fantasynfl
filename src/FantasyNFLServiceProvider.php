<?php

namespace Fantasy\NFL;

use Illuminate\Support\ServiceProvider;

class FantasyNFLServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/auth.php', 'auth');
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/fantasynfl.php' => config_path('fantasynfl.php'),
            __DIR__.'/assets' => public_path('vendor/fantasynfl')
        ]);

        $this->loadMigrationsFrom(__DIR__.'../migrations/stats');
        $this->loadMigrationsFrom(__DIR__.'../migrations/fantasy');

        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

}