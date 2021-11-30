<?php

namespace Vados\TaskExecutorBundle\Tests\Stub;

use Vados\TaskExecutorBundle\Task\Metadata;
use Vados\TaskExecutorBundle\Task\TaskInterface;

class TaskStub implements TaskInterface
{
    public function __construct(private bool $executeReturnValue = true)
    {

    }

    public function execute(Metadata $metadata): bool
    {
        return $this->executeReturnValue;
    }
}
