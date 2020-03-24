<?php

namespace Ferleal\Adminer;

use Illuminate\Support\ServiceProvider;

class AdminerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerPublishing();
    }


    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../public/' => public_path('vendor/adminer'),
            ], 'Adminer-assets');
        }
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

}
