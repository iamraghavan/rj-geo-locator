<?php

namespace iamraghavan\CountryStateCity;

use Illuminate\Support\ServiceProvider;
use iamraghavan\CountryStateCity\Console\InstallCommand;

class CountryStateCityServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register commands and merge config
        $this->commands([InstallCommand::class]);
        $this->mergeConfigFrom(__DIR__ . '/Config/countrystatecity.php', 'countrystatecity');
    }

    public function boot()
    {
        // Publish configuration and views
        $this->publishes([
            __DIR__ . '/Config/countrystatecity.php' => config_path('countrystatecity.php'),
            __DIR__ . '/Resources/views' => resource_path('views/vendor/countrystatecity'),
        ], 'rjgeo');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
    }
}
