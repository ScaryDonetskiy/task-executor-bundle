<?php

namespace Vados\TaskExecutorBundle\Task;

interface TaskInterface
{
    public function execute(Metadata $metadata): bool;
}
