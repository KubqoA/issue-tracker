<?php

namespace KubqoA\IssueTracker\Services;

use GuzzleHttp\Psr7\Response;
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
     * Make a request to the service
     *
     * @param $method
     * @param string $uri
     * @param array $options
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request($method, $uri, $options): Response;

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
     * Parses the response data (json) for an issue from the server.
     *
     * @param  $data
     *
     * @return Issue
     */
    public function createIssueFromResponseData($data): Issue;

    /**
     * Parses the response data (json) for a user from the server.
     *
     * @param  $data
     *
     * @return User
     */
    public function createUserFromResponseData($data): User;

    /**
     * Creates an issue data string (json) from Issue model which can be sent to the service.
     *
     * @param  Issue  $issue
     *
     * @return string
     */
    public function createIssueDataFromIssueModel(Issue $issue): string;

    /**
     * Creates an issue data string (json) from Issue model which can be sent to the service.
     *
     * @param  User  $user
     *
     * @return string
     */
    public function createUserDataFromUserModel(User $user): string;
}
