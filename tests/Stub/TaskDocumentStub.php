<?php

namespace Vados\TaskExecutorBundle\Tests\Stub;

use Vados\TaskExecutorBundle\Document\TaskDocumentInterface;

class TaskDocumentStub implements TaskDocumentInterface
{
    public function __construct(private ?string $id = null, private string $classname = 'Foo', private array $metadata = [])
    {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getClassname(): string
    {
        return $this->classname;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setClassname(string $classname): TaskDocumentInterface
    {
        $this->classname = $classname;

        return $this;
    }

    public function setMetadata(array $metadata): TaskDocumentInterface
    {
        $this->metadata = $metadata;

        return $this;
    }
}
