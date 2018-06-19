<?php

namespace KubqoA\IssueTracker;

use Illuminate\Support\Facades\Config;
use KubqoA\IssueTracker\Exceptions\InvalidHostingServiceNameException;
use KubqoA\IssueTracker\Services\Gitea;

class IssueTrackerServicesTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['KubqoA\IssueTracker\IssueTrackerServiceProvider'];
    }

    public function testServiceBinding()
    {
        $issueTracker = new IssueTracker();
        $this->assertInstanceOf(Gitea::class, $issueTracker->service);
    }

    public function testInvalidServiceBinding()
    {
        Config::set('issuetracker.hosting_service', 'not-a-real-hosting-service');
        $this->expectException(InvalidHostingServiceNameException::class);
        new IssueTracker();
    }

    public function testBoundServiceParameters()
    {
        $issueTracker = new IssueTracker();
        $this->assertEquals($issueTracker->service->accessToken, env('ISSUE_TRACKER_ACCESS_TOKEN'));
    }
}
