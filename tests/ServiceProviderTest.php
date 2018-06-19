<?php

namespace KubqoA\IssueTracker;

class ServiceProviderTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['KubqoA\IssueTracker\IssueTrackerServiceProvider'];
    }

    /**
     * Test that config does publish.
     */
    public function testConfigPublishes()
    {
        $this->artisan('vendor:publish', [
            '--provider' => 'KubqoA\IssueTracker\IssueTrackerServiceProvider',
            '--tag' => 'config',
        ]);
        $this->assertFileExists(config_path('issuetracker.php'));
    }
}
