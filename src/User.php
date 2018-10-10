<?php

namespace KubqoA\IssueTracker;

class User
{
    /**
     * The user's email.
     *
     * @var string
     */
    public $email;

    /**
     * The user's username.
     *
     * @var string
     */
    public $username;

    /**
     * The user's full name.
     *
     * @var string
     */
    public $full_name;

    /**
     * The user's avatar url.
     *
     * @var string
     */
    public $avatar_url;

    /**
     * User constructor.
     *
     * @param  string  $email
     * @param  string  $username
     * @param  string  $full_name
     * @param  string  $avatar_url
     */
    public function __construct(string $email, string $username, string $full_name, string $avatar_url)
    {
        $this->email = $email;
        $this->username = $username;
        $this->full_name = $full_name;
        $this->avatar_url = $avatar_url;
    }

    /**
     *  Static method to create a new user.
     *
     * @param  string  $email
     * @param  string  $username
     * @param  string  $full_name
     * @param  string  $avatar_url
     * @return User
     */
    public static function create(string $email, string $username, string $full_name, string $avatar_url): self
    {
        return new self($email, $username, $full_name, $avatar_url);
    }
}
