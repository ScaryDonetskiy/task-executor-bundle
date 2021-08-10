<?php

namespace Vados\TaskExecutorBundle\Document;

use Vados\TaskExecutorBundle\Task\Metadata;

interface TaskDocumentInterface
{
    public function getId(): ?string;
    public function getClassname(): string;
    public function getMetadata(): array;
    public function setClassname(string $classname): self;
    public function setMetadata(array $metadata): self;
}
