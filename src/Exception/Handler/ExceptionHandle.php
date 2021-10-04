<?php

namespace Vados\TaskExecutorBundle\Exception\Handler;

use Exception;
use Vados\TaskExecutorBundle\Exception\UnhandledException;

class ExceptionHandle
{
    /**
     * @var HandlerInterface[]
     */
    private iterable $handlers;

    public function __construct(iterable $handlers)
    {
        $this->handlers = $handlers;
    }

    /**
     * @throws UnhandledException
     */
    public function handle(Exception $exception): void
    {
        foreach ($this->handlers as $handler) {
            if ($handler->accept(get_class($exception)) && $handler->handle($exception)) {
                return;
            }
        }

        throw new UnhandledException($exception);
    }
}
