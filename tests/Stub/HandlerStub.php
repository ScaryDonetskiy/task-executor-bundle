<?php

namespace Vados\TaskExecutorBundle\Tests\Stub;

use Throwable;
use Vados\TaskExecutorBundle\Exception\Handler\HandlerInterface;

class HandlerStub implements HandlerInterface
{
    public function __construct(private bool $handleResult = true, private bool $acceptResult = true)
    {
    }

    public function handle(Throwable $exception): bool
    {
        return $this->handleResult;
    }

    public function accept(string $className): bool
    {
        return $this->acceptResult;
    }
}
