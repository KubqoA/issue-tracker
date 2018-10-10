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

    public function testRequestToGitea()
    {
        $gitea = Gitea::getInstance();
        $response = $gitea->request('GET', $gitea->GET_ISSUES_URL);
        $this->assertEquals(200, $response->getStatusCode());
    }
                    
    public function testGetIssuesFromGitea()
    {
        $gitea = Gitea::getInstance();
        $issues = $gitea->getIssues();
        if (empty($issues)) $this->assertTrue(empty($issues));
        else $this->assertInstanceOf(Issue::class, $issues[0]);
    }
}
