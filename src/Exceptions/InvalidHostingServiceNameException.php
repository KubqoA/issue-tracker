<?php

namespace KubqoA\IssueTracker\Exceptions;

class InvalidHostingServiceNameException extends \InvalidArgumentException
{
    public function __construct(
        $message = 'Invalid value for configuration option hosting_service in configuration file issuetracker.php',
        $code = 0,
        \Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
