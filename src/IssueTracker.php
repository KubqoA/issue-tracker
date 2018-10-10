<?php

namespace KubqoA\IssueTracker;

use KubqoA\IssueTracker\Services\Service;
use KubqoA\IssueTracker\Exceptions\InvalidHostingServiceNameException;

class IssueTracker
{
    /**
     * @var Service
     */
    public $service;

    public function __construct()
    {
        $this->service = $this->getServiceInstance();
    }

    /**
     * Gets class name of hosting service specified in config.
     *
     * @return string
     */
    private function getServiceClassName(): string
    {
        return '\\KubqoA\\IssueTracker\\Services\\'.ucfirst(config('issuetracker.hosting_service'));
    }

    /**
     * Uses getServiceClassName() to obtain class name and tries to create a new service instance.
     * If the class given by getServiceClassName() does not exist it throws InvalidHostingServiceNameException.
     *
     * @throws InvalidHostingServiceNameException
     *
     * @return Service
     */
    private function getServiceInstance(): Service
    {
        try {
            return call_user_func([$this->getServiceClassName(), 'getInstance']);
        } catch (\Exception $exception) {
            throw new InvalidHostingServiceNameException();
        }
    }
}
