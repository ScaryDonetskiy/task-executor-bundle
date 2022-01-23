<?php

namespace Vados\TaskExecutorBundle\Tests\TestCase\Task;

use PHPUnit\Framework\TestCase;
use Vados\TaskExecutorBundle\Task\Metadata;

class MetadataTest extends TestCase
{
    public function testGetBodyDefault(): void
    {
        $metadata = new Metadata();
        self::assertEmpty($metadata->getBody());
    }

    public function getGetBodyCustom(): void
    {
        $metadata = new Metadata(['foo' => 'bar']);
        self::assertNotEmpty($metadata->getBody());
        self::assertArrayHasKey('foo', $metadata->getBody());
    }
}
