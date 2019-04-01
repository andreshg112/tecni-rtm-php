<?php

namespace Andreshg112\TecniRtm;

use Illuminate\Support\ServiceProvider;

class TecniRtmServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/tecni-rtm.php' => config_path('tecni-rtm.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/tecni-rtm.php', 'tecni-rtm');

        // Register the main class to use with the facade
        $this->app->singleton('tecni-rtm', function () {
            return new TecniRtm;
        });
    }
}
