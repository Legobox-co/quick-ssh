<?php

namespace Legobox\QuickSsh;

use Codeaken\SshKey\SshKey;
use Codeaken\SshKey\SshKeyPair;
use Codeaken\SshKey\SshPublicKey;
use Codeaken\SshKey\SshPrivateKey;
use Illuminate\Support\ServiceProvider;

class SshServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap classes for packages.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__.'/../config/quickssh.php');

        if (class_exists('Illuminate\Foundation\Application', false)) {
            $this->publishes([$source => config_path('quickssh.php')]);
        }
        $this->mergeConfigFrom($source, 'quickssh');

        // $this->app['QuickSsh\Ssh\Ssh'] = function ($app) {
        //     return $app['quickssh'];
        // };
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        $this->app->singleton('quickssh', function () use ($app) {
            return new SshService();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('quickssh');
    }
}
