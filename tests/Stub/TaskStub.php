<?php

namespace Vados\TaskExecutorBundle\Tests\Stub;

use Throwable;
use Vados\TaskExecutorBundle\Task\Metadata;
use Vados\TaskExecutorBundle\Task\TaskInterface;

class TaskStub implements TaskInterface
{
    public function __construct(private bool $executeReturnValue = true, private ?Throwable $shouldThrowException = null)
    {

    }

    public function execute(Metadata $metadata): bool
    {
        if (null !== $this->shouldThrowException) {
            throw $this->shouldThrowException;
        }

        return $this->executeReturnValue;
    }
}
