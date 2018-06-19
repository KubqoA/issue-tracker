<?php

namespace KubqoA\IssueTracker\Services;

use KubqoA\IssueTracker\Issue;

class Gitea implements Service
{
    protected $url;
    protected $ownerName;
    protected $repositoryName;
    protected $accessToken;

    public function __construct()
    {
        $this->url = config('issuetracker.api.gitea.url');
        $this->ownerName = config('issuetracker.api.gitea.owner_name');
        $this->repositoryName = config('issuetracker.api.gitea.repository_name');
        $this->accessToken = config('issuetracker.api.gitea.access_token');
    }

    /**
     * Get an instance of this service
     *
     * @return Gitea
     */
    public static function getInstance(): self
    {
        return new self();
    }

    /*
     * Get all issues for the repository
     *
     * @return  Issue[]
     */
    public function getIssues(): array
    {
        // TODO: Implement getIssues() method.
    }

    /**
     * Creates a new issue.
     *
     * @param Issue $issue
     *
     * @return Issue
     */
    public function createIssue(Issue $issue): Issue
    {
        // TODO: Implement createIssue() method.
    }

    /**
     * Gets an issue with the specified id.
     *
     * @param int $id
     *
     * @return Issue
     */
    public function getIssue(int $id): Issue
    {
        // TODO: Implement getIssue() method.
    }

    /**
     * Deletes an issue with the specified id.
     *
     * @param int $id
     *
     * @return bool
     */
    public function deleteIssue(int $id): bool
    {
        // TODO: Implement deleteIssue() method.
    }
}
