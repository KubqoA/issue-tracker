<?php

namespace KubqoA\IssueTracker\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Carbon;
use KubqoA\IssueTracker\Issue;
use KubqoA\IssueTracker\User;

/**
 * Gitea API integration for version 1.1.1
 * Documentation for Gitea API can be found at your-gitea-url/api/swagger
 *
 * @package KubqoA\IssueTracker\Services
 */
class Gitea implements Service
{
    /**
     * The root url of Gitea web.
     *
     * @var string
     */
    protected $url;

    /**
     * The repository's owner name.
     *
     * @var string
     */
    protected $ownerName;

    /**
     * The repository name.
     *
     * @var string
     */
    protected $repositoryName;

    /**
     * The access token which can be generated in user settings.
     *
     * @var string
     */
    protected $accessToken;

    /**
     * Dynamically generated Gitea API url for listing all the issues.
     *
     * @var string
     */
    public $GET_ISSUES_URL;

    /**
     * Dynamically generated Gitea API url for creating new issues.
     *
     * @var string
     */
    public $CREATE_ISSUE_URL;

    /**
     * Dynamically generated Gitea API url for showing one specific issue.
     *
     * @var string
     */
    public $GET_ISSUE_URL;

    /**
     * GuzzleHttp Client used to make API requests.
     *
     * @var Client
     */
    protected $client;

    /**
     * Binds url, ownerName, repositoryName and accessToken from config to this service instance
     * Dynamically generates API urls for getting all issues, creating an issue and getting one specific issue.
     * Creates new GuzzleHttp Client and binds to the service instance.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->url = config('issuetracker.api.gitea.url');
        $this->ownerName = config('issuetracker.api.gitea.owner_name');
        $this->repositoryName = config('issuetracker.api.gitea.repository_name');
        $this->accessToken = config('issuetracker.api.gitea.access_token');
        $this->GET_ISSUES_URL = $this->url . '/api/v1/repos/' . $this->ownerName . '/' . $this->repositoryName . '/issues';
        $this->CREATE_ISSUE_URL = $this->url . '/api/v1/repos/' . $this->ownerName . '/' . $this->repositoryName . '/issues';
        $this->GET_ISSUE_URL = $this->url . '/api/v1/repos/' . $this->ownerName . '/' . $this->repositoryName . '/issues/{id}';
        $this->client = $client;
    }

    /**
     * Get an instance of this service.
     *
     * @return Gitea
     */
    public static function getInstance(): self
    {
        return new self(new Client());
    }

    /**
     * @param $method
     * @param string $uri
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $uri = '', $options = ['accept' => 'application/json']): Response
    {
        return $this->client->request($method, $uri . '?access_token=' . env('ISSUE_TRACKER_ACCESS_TOKEN'), $options);
    }

    /**
     * Get all issues for the repository.
     *
     * @return  Issue[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getIssues(): array
    {
        $response = $this->request('GET', $this->GET_ISSUES_URL);
        $issuesData = json_decode($response->getBody()->getContents());
        $issues = [];
        foreach ($issuesData as $issueData) {
            $issues[] = $this->createIssueFromResponseData($issueData);
        }
        return $issues;
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
     * Parses the response data for an issue from the server
     *
     * @param  $data
     * @return Issue
     */
    public function createIssueFromResponseData($data): Issue
    {
        return Issue::create(
            $data->url,
            $data->number,
            $this->createUserFromResponseData($data->user),
            $data->title,
            $data->body,
            $data->state,
            Carbon::createFromTimeString($data->created_at),
            Carbon::createFromTimeString($data->updated_at),
            $data->closed_at ? Carbon::createFromTimeString($data->closed_at) : $data->closed_at
        );
    }

    /**
     * Parses the response data for a user from the server
     *
     * @param  $data
     * @return User
     */
    public function createUserFromResponseData($data): User
    {
        return User::create(
            $data->email,
            $data->username,
            $data->full_name,
            $data->avatar_url
        );
    }
}
