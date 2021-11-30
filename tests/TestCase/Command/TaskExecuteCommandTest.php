<?php

namespace Vados\TaskExecutorBundle\Tests\TestCase\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Vados\TaskExecutorBundle\Command\TaskExecuteCommand;
use Vados\TaskExecutorBundle\Exception\Handler\ExceptionHandle;
use Vados\TaskExecutorBundle\Tests\Stub\ContainerStub;
use Vados\TaskExecutorBundle\Tests\Stub\HandlerStub;
use Vados\TaskExecutorBundle\Tests\Stub\TaskDocumentStub;
use Vados\TaskExecutorBundle\Tests\Stub\TaskRepositoryStub;
use Vados\TaskExecutorBundle\Tests\Stub\TaskStub;
use Vados\TaskExecutorBundle\Tests\Utils\RuntimeCache;

class TaskExecuteCommandTest extends TestCase
{
    public function testExecuteWithoutTasks(): void
    {
        $command = new TaskExecuteCommand(
            repository: new TaskRepositoryStub(),
            container: new ContainerStub(),
            exceptionHandle: new ExceptionHandle([new HandlerStub()])
        );

        $commandTester = new CommandTester($command);
        $commandTester->execute([]);
        $commandTester->assertCommandIsSuccessful();
        $output = $commandTester->getDisplay();
        self::assertStringContainsString('No more task. I\'m done.', $output);
    }

    public function testExecuteCompleteTask(): void
    {
        $command = new TaskExecuteCommand(
            repository: new TaskRepositoryStub(new TaskDocumentStub()),
            container: new ContainerStub(getResult: new TaskStub()),
            exceptionHandle: new ExceptionHandle([new HandlerStub()])
        );

        $commandTester = new CommandTester($command);
        $commandTester->execute([]);
        $commandTester->assertCommandIsSuccessful();
        $output = $commandTester->getDisplay();
        self::assertStringContainsString('Complete', $output);
        self::assertStringContainsString('No more task. I\'m done.', $output);
    }

    protected function tearDown(): void
    {
        (new RuntimeCache())->reset();
    }
}
