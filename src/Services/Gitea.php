<?php

namespace KubqoA\IssueTracker\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use KubqoA\IssueTracker\User;
use Illuminate\Support\Carbon;
use KubqoA\IssueTracker\Issue;

/**
 * Gitea API integration for version 1.1.1
 * Documentation for Gitea API can be found at your-gitea-url/api/swagger.
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
        $this->GET_ISSUES_URL = $this->url.'/api/v1/repos/'.$this->ownerName.'/'.$this->repositoryName.'/issues';
        $this->CREATE_ISSUE_URL = $this->url.'/api/v1/repos/'.$this->ownerName.'/'.$this->repositoryName.'/issues';
        $this->GET_ISSUE_URL = $this->url.'/api/v1/repos/'.$this->ownerName.'/'.$this->repositoryName.'/issues/{id}';
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
    public function request($method, $uri = '', $options = ['accept' => 'application/json']): Response
    {
        return $this->client->request($method, $uri.'?access_token='.env('ISSUE_TRACKER_ACCESS_TOKEN'), $options);
    }

    /**
     * Creates a new issue.
     *
     * @param Issue $issue
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return Issue
     */
    public function createIssue(Issue $issue): Issue
    {
        $issueData = $this->createIssueDataFromIssueModel($issue);
        $response = $this->request('POST', $issueData);
    }

    /**
     * Get all issues for the repository.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return  Issue[]
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
     * Parses the response data (json) for an issue from the server.
     *
     * @param  $data
     *
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
     * Parses the response data (json) for a user from the server.
     *
     * @param  $data
     *
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

    /**
     * Creates an issue data string (json) from Issue model which can be sent to the service.
     *
     * @param  Issue $issue
     *
     * @return string
     */
    public function createIssueDataFromIssueModel(Issue $issue): string
    {
        return json_encode([
            'title' => $issue->title,
            'body' => $issue->body,
        ]);
    }

    /**
     * Creates an issue data string (json) from Issue model which can be sent to the service.
     *
     * @param  User $user
     *
     * @return string
     */
    public function createUserDataFromUserModel(User $user): string
    {
        // TODO: Implement createUserDataFromUserModel() method.
    }
}
