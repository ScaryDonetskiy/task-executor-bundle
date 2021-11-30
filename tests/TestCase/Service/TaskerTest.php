<?php

namespace Vados\TaskExecutorBundle\Tests\TestCase\Service;

use PHPUnit\Framework\TestCase;
use Vados\TaskExecutorBundle\Exception\WrongTaskClassnameException;
use Vados\TaskExecutorBundle\Service\Tasker;
use Vados\TaskExecutorBundle\Tests\Stub\TaskDocumentStub;
use Vados\TaskExecutorBundle\Tests\Stub\TaskRepositoryStub;
use Vados\TaskExecutorBundle\Tests\Stub\TaskStub;

class TaskerTest extends TestCase
{
    public function testSaveTaskSuccess(): void
    {
        self::expectOutputString('');

        $taskRepository = new TaskRepositoryStub();
        $tasker = new Tasker($taskRepository);
        $tasker->saveTask(new TaskDocumentStub(classname: TaskStub::class));
    }

    public function testSaveTaskWrongTaskClassnameException(): void
    {
        self::expectException(WrongTaskClassnameException::class);

        $taskRepository = new TaskRepositoryStub();
        $tasker = new Tasker($taskRepository);
        $tasker->saveTask(new TaskDocumentStub());
    }
}
