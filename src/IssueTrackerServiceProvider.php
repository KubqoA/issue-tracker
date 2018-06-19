<?php

namespace KubqoA\IssueTracker;

use Illuminate\Support\ServiceProvider;

class IssueTrackerServiceProvider extends ServiceProvider
{
    /**
     * The path to the package's config.
     *
     * @var string
     */
    protected $packageConfigPath = __DIR__.'/../config/issuetracker.php';

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishConfig();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->packageConfigPath, 'issuetracker');
    }

    /**
     * Publishes the config file.
     */
    private function publishConfig()
    {
        $this->publishes([
            $this->packageConfigPath => config_path('issuetracker.php'),
        ], 'config');
    }
}
