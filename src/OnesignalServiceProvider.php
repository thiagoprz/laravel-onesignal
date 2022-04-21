<?php

namespace Thiagoprz\Onesignal;

use Illuminate\Support\ServiceProvider;
use Thiagoprz\Onesignal\Interfaces\ClientInterface;
use Thiagoprz\Onesignal\OneSignal\Client;

/**
 * Package provider
 */
class OnesignalServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/onesignal.php', 'onesignal');
        $this->app->bind(ClientInterface::class, Client::class);
    }

    /**
     * @return void
     */
    public function boot()
    {
        // Publishes configuration file
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/onesignal.php' => config_path('onesignal.php'),
            ]);
        }
    }

}