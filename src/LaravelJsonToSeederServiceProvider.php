<?php

namespace Preshy\LaravelJsonToSeeder;

use Illuminate\Support\ServiceProvider;
use Preshy\LaravelJsonToSeeder\Commands\LaravelJsonToSeederCommand;

class LaravelJsonToSeederServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'preshy');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'preshy');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laraveljsontoseeder.php', 'laraveljsontoseeder');

        // Register the service the package provides.
        $this->app->singleton('laraveljsontoseeder', function ($app) {
            return new LaravelJsonToSeeder;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laraveljsontoseeder'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laraveljsontoseeder.php' => config_path('laraveljsontoseeder.php'),
        ], 'laraveljsontoseeder.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/preshy'),
        ], 'laraveljsontoseeder.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/preshy'),
        ], 'laraveljsontoseeder.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/preshy'),
        ], 'laraveljsontoseeder.views');*/

        // Registering package commands.
        $this->commands([
            LaravelJsonToSeederCommand::class,
        ]);
    }
}
