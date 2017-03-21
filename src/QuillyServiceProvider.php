<?php

namespace Perkola\Quilly;

use Illuminate\Support\ServiceProvider;
use Perkola\Quilly\Contracts\Parser;

class QuillyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/quilly.php' => config_path('quilly.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('delta', function ($app) {
            return new Parser();
        });
    }
}
