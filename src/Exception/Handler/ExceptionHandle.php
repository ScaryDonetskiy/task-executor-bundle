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
    public function handle(Exception $exception): bool
    {
        $result = null;

        foreach ($this->handlers as $handler) {
            if ($handler->accept(get_class($exception))) {
                $result = $handler->handle($exception);

                if (true === $result) {
                    return true;
                }
            }
        }

        if (null === $result) {
            throw new UnhandledException($exception);
        }

        return false;
    }
}
