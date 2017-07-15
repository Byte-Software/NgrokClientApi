<?php

namespace ByteSoftware\NgrokClientApi;

use Illuminate\Support\ServiceProvider;

class NgrokClientProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/ngrokclient.php' => config_path('ngrokclient.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ngrokclient', function() {
            return new \ByteSoftware\NgrokClientApi\NgrokClient;
        });
    }
}
