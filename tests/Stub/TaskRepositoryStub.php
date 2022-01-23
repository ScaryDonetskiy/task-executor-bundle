<?php

namespace Vados\TaskExecutorBundle\Tests\Stub;

use Vados\TaskExecutorBundle\Document\TaskDocumentInterface;
use Vados\TaskExecutorBundle\Repository\TaskRepositoryInterface;
use Vados\TaskExecutorBundle\Tests\Utils\RuntimeCache;

class TaskRepositoryStub implements TaskRepositoryInterface
{
    private const FIND_COUNT_CACHE = 'TaskRepositoryStub::findCount';

    private RuntimeCache $cache;

    public function __construct(private ?TaskDocumentInterface $taskDocument = null, private int $findLimit = 1)
    {
        $this->cache = new RuntimeCache();
    }

    public function findTask(): ?TaskDocumentInterface
    {
        if (($findCount = $this->cache->get(self::FIND_COUNT_CACHE, static fn() => 0)) === $this->findLimit) {
            return null;
        }

        $this->cache->set(self::FIND_COUNT_CACHE, ++$findCount);

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
