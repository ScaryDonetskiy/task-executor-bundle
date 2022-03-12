<?php

namespace Vados\TaskExecutorBundle\Tests\TestCase\Exception\Handler;

use PHPUnit\Framework\TestCase;
use Vados\TaskExecutorBundle\Exception\Handler\ExceptionHandle;
use Vados\TaskExecutorBundle\Exception\UnhandledException;
use Vados\TaskExecutorBundle\Tests\Stub\HandlerStub;

class ExceptionHandleTest extends TestCase
{
    public function testHandleAcceptAndSuccessHandle(): void
    {
        self::expectOutputString('');

        $exceptionHandle = new ExceptionHandle([new HandlerStub()]);
        $exceptionHandle->handle(new \Exception());
    }

    public function testHandleAcceptAndErrorHandle(): void
    {
        self::expectOutputString('');

        $exceptionHandle = new ExceptionHandle([new HandlerStub(handleResult: false)]);
        $exceptionHandle->handle(new \Exception());
    }

    public function testHandleNotAccept(): void
    {
        self::expectException(UnhandledException::class);

        $exceptionHandle = new ExceptionHandle([new HandlerStub(acceptResult: false)]);
        $exceptionHandle->handle(new \Exception());
    }
}
