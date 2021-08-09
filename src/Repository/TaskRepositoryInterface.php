<?php

namespace Vados\TaskExecutorBundle\Repository;

use Vados\TaskExecutorBundle\Document\TaskDocumentInterface;

interface TaskRepositoryInterface
{
    public function findTask(): ?TaskDocumentInterface;
    public function saveTask(TaskDocumentInterface $taskDocument): void;
    public function deleteTask(TaskDocumentInterface $taskDocument): void;
}
