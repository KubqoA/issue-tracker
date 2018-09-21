<?php

namespace KubqoA\IssueTracker;

use KubqoA\IssueTracker\Services\Gitea;

class GiteaServiceTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['KubqoA\IssueTracker\IssueTrackerServiceProvider'];
    }

    public function testCreateIssueURLMethod()
    {
        $gitea = Gitea::getInstance();
        $this->assertEquals(
            $gitea->GET_ISSUES_URL,
            config('issuetracker.api.gitea.url').'/api/v1/repos/'.config('issuetracker.api.gitea.owner_name').'/'.config('issuetracker.api.gitea.repository_name').'/issues'
        );
    }

    public function testGettingIssuesFromGitea()
    {
        $gitea = Gitea::getInstance();
        $gitea->getIssues();
    }
}
