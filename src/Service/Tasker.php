<?php

namespace Vados\TaskExecutorBundle\Service;

use Vados\TaskExecutorBundle\Document\TaskDocumentInterface;
use Vados\TaskExecutorBundle\Exception\WrongTaskClassnameException;
use Vados\TaskExecutorBundle\Repository\TaskRepositoryInterface;
use Vados\TaskExecutorBundle\Task\TaskInterface;

class Tasker
{
    private TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws WrongTaskClassnameException
     */
    public function saveTask(TaskDocumentInterface $taskDocument)
    {
        if (!($taskDocument->getClassname() instanceof TaskInterface)) {
            throw new WrongTaskClassnameException();
        }

        $this->repository->saveTask($taskDocument);
    }
}
