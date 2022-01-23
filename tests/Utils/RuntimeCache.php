<?php

namespace Vados\TaskExecutorBundle\Tests\Utils;

use Symfony\Contracts\Cache\CacheInterface;

class RuntimeCache implements CacheInterface
{
    private static array $storage = [];

    public function get(string $key, callable $callback, float $beta = null, array &$metadata = null): mixed
    {
        if (!isset(self::$storage[$key])) {
            $computedValue = $callback();
            self::$storage[$key] = $computedValue;
        }

        return self::$storage[$key];
    }

    public function set(string $key, mixed $value): void
    {
        self::$storage[$key] = $value;
    }

    public function delete(string $key): bool
    {
        unset(self::$storage[$key]);

        return true;
    }

    public function reset(): void
    {
        self::$storage = [];
    }
}
