<?php

namespace Vados\TaskExecutorBundle\Exception\Handler;

use Throwable;

interface HandlerInterface
{
    public function handle(Throwable $exception): bool;
    public function accept(string $className): bool;
}
