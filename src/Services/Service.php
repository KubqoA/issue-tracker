<?php

namespace KubqoA\IssueTracker\Services;

use KubqoA\IssueTracker\User;
use KubqoA\IssueTracker\Issue;

interface Service
{
    /**
     * Get an instance of this service.
     *
     * @return Service
     */
    public static function getInstance();

    /**
     * Get all issues for the repository.
     *
     * @return  Issue[]
     */
    public function getIssues(): array;

    /**
     * Creates a new issue.
     *
     * @param Issue $issue
     *
     * @return Issue
     */
    public function createIssue(Issue $issue): Issue;

    /**
     * Gets an issue with the specified id.
     *
     * @param int $id
     *
     * @return Issue
     */
    public function getIssue(int $id): Issue;

    /**
     * Parses the response data for an issue from the server.
     *
     * @param  $data
     *
     * @return Issue
     */
    public function createIssueFromResponseData($data): Issue;

    /**
     * Parses the response data for a user from the server.
     *
     * @param  $data
     *
     * @return User
     */
    public function createUserFromResponseData($data): User;
}
