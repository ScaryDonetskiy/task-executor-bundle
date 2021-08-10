<?php

namespace Vados\TaskExecutorBundle\Task;

class Metadata
{
    private array $body;

    public function __construct(array $body = [])
    {
        $this->body = $body;
    }

    public function getBody(): array
    {
        return $this->body;
    }
}
