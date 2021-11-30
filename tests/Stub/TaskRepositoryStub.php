<?php

namespace Vados\TaskExecutorBundle\Tests\Stub;

use Vados\TaskExecutorBundle\Document\TaskDocumentInterface;
use Vados\TaskExecutorBundle\Repository\TaskRepositoryInterface;

class TaskRepositoryStub implements TaskRepositoryInterface
{
    public function __construct(private ?TaskDocumentInterface $taskDocument = null)
    {
    }

    public function findTask(): ?TaskDocumentInterface
    {
        return $this->taskDocument;
    }

    public function saveTask(TaskDocumentInterface $taskDocument): void
    {
        // TODO: Implement saveTask() method.
    }

    public function deleteTask(TaskDocumentInterface $taskDocument): void
    {
        // TODO: Implement deleteTask() method.
    }
}
