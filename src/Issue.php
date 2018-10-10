<?php

namespace KubqoA\IssueTracker;

use Illuminate\Support\Carbon;

class Issue
{
    /**
     * The issue url in the repository.
     *
     * @var string
     */
    public $url;

    /**
     * The issue number in the repository.
     *
     * @var int
     */
    public $number;

    /**
     * The user that created the issue.
     *
     * @var User
     */
    public $user;

    /**
     * Title of the issue.
     *
     * @var string
     */
    public $title;

    /**
     * Body of the issue.
     *
     * @var string
     */
    public $body;

    /**
     * Indicates whether the issue is closed.
     *
     * @var bool
     */
    public $state;

    /**
     * The time at which the issue was created.
     *
     * @var Carbon
     */
    public $created_at;

    /**
     * The time at which the issue was lastly updated.
     *
     * @var Carbon
     */
    public $updated_at;

    /**
     * The time at which the issue was closed.
     *
     * @var Carbon|null
     */
    public $closed_at;

    /**
     * Issue constructor.
     *
     * @param  string  $url
     * @param  int  $number
     * @param  User  $user
     * @param  string  $title
     * @param  string  $body
     * @param  string  $state
     * @param  Carbon  $created_at
     * @param  Carbon  $updated_at
     * @param  Carbon|null  $closed_at
     */
    public function __construct(string $url, int $number, User $user, string $title, string $body, string $state, Carbon $created_at, Carbon $updated_at, $closed_at)
    {
        $this->url = $url;
        $this->number = $number;
        $this->user = $user;
        $this->title = $title;
        $this->body = $body;
        $this->state = $state;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->closed_at = $closed_at;
    }

    /**
     * Static method to create a new issue.
     *
     * @param  string  $url
     * @param  int  $number
     * @param  User  $user
     * @param  string  $title
     * @param  string  $body
     * @param  string  $state
     * @param  Carbon  $created_at
     * @param  Carbon  $updated_at
     * @param  Carbon|null  $closed_at
     *
     * @return Issue
     */
    public static function create(string $url, int $number, User $user, string $title, string $body, string $state, Carbon $created_at, Carbon $updated_at, $closed_at): self
    {
        return new self($url, $number, $user, $title, $body, $state, $created_at, $updated_at, $closed_at);
    }

    public function save(): bool
    {
        //TODO: implement save method
        return false;
    }

    public function update(): bool
    {
        //TODO: implement update method
        return false;
    }
}
