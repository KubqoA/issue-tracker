<?php

namespace KubqoA\IssueTracker;

class Issue
{
    /*
     * Title of the issue
     *
     * @var string
     */
    public $title;

    /*
     * Body of the issue
     *
     * @var string
     */
    public $body;

    /**
     * Indicates whether the issue is closed
     *
     * @var bool
     */
    public $closed;

    /**
     * Issue constructor.
     *
     * @param  string  $title
     * @param  string  $body
     */
    public function __construct($title, $body)
    {
        $this->title=$title;
        $this->body=$body;
    }

    /**
     * Static method to create a new issue from title and body
     *
     * @param  string  $title
     * @param  string  $body
     * @return Issue
     */
    public static function create($title, $body) : Issue
    {
        return new Issue($title, $body);
    }

    /**
     *
     *
     * @param  bool  $closed
     * @return Issue
     */
    public function setClosed($closed) : Issue
    {
        $this->closed=$closed;
        return $this;
    }

    public function toggleClosed() : Issue
    {
        return $this->setClosed(!$this->closed);
    }

    public function save() : bool
    {
        //TODO: implement save method
        return false;
    }

    public function update() : bool
    {
        //TODO: implement update method
        return false;
    }
}
