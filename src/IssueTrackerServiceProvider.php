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
    protected $packageConfigPath = __DIR__.'/../config/issue_tracker.php';

    /**
     * The default config key used for publishing and merging.
     *
     * @var string
     */
    protected $configKey = 'issue_tracker';

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
        $this->mergeConfigFrom($this->packageConfigPath, $this->configKey);
    }

    /**
     * Publishes the config file.
     */
    private function publishConfig()
    {
        $this->publishes([
            $this->packageConfigPath => config_path($this->configKey.'.php'),
        ], 'config');
    }
}
