<?php

namespace Vados\TaskExecutorBundle\Exception;

use Throwable;
use Vados\TaskExecutorBundle\Task\TaskInterface;

class WrongTaskClassnameException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf('[Task classname should be instance of %s] %s', TaskInterface::class, $message), $code, $previous);
    }
}
