<?php

namespace KubqoA\IssueTracker\Services;

use KubqoA\IssueTracker\Issue;

interface Service
{
    /*
     * Get all issues for the repository
     *
     * @return  Issue[]
     */
    public function getIssues() : array;

    /**
     * Creates a new issue
     *
     * @param  Issue  $issue
     * @return Issue
     */
    public function createIssue(Issue $issue) : Issue;

    /**
     * Gets an issue with the specified id
     *
     * @param  int  $id
     * @return Issue
     */
    public function getIssue(int $id) : Issue;

    /**
     * Deletes an issue with the specified id
     *
     * @param  int  $id
     * @return bool
     */
    public function deleteIssue(int $id) : bool;
}
