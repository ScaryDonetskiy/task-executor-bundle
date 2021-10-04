<?php

namespace Vados\TaskExecutorBundle\Exception;

use Exception;

class UnhandledException extends Exception
{
    private Exception $exception;

    public function __construct(Exception $exception)
    {
        $this->exception = $exception;

        parent::__construct($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
    }

    public function getException(): Exception
    {
        return $this->exception;
    }
}
