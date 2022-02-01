<?php

namespace Vados\TaskExecutorBundle\Tests\Stub;

use Psr\Container\ContainerInterface;

class ContainerStub implements ContainerInterface
{
    public function __construct(private mixed $getResult = null, private mixed $hasResult = true)
    {
    }

    /**
     * @inheritDoc
     */
    public function get(string $id)
    {
        return $this->getResult;
    }

    /**
     * @inheritDoc
     */
    public function has(string $id): bool
    {
        return $this->hasResult;
    }
}
