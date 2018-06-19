<?php

namespace KubqoA\IssueTracker;

use KubqoA\IssueTracker\Exceptions\InvalidHostingServiceNameException;
use KubqoA\IssueTracker\Services\Service;

class IssueTracker
{
    /**
     * @var Service
     */
    public $service;

    public function __construct()
    {
        $this->service = call_user_func(array($this->getServiceClass(), "getInstance"));
    }

    public function getServiceClass() : string
    {
        $serviceClassName=$this->getServiceClassName();
        if (class_exists($serviceClassName)) {
            return $serviceClassName;
        }
        throw new InvalidHostingServiceNameException();
    }

    public function getServiceClassName() : string
    {
        return '\\KubqoA\\IssueTracker\\Services\\' . ucfirst(config('issuetracker.hosting_service'));
    }
}
