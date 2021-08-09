<?php

namespace Vados\TaskExecutorBundle\Document;

use Vados\TaskExecutorBundle\Task\Metadata;

interface TaskDocumentInterface
{
    public function getId(): string;
    public function getClassname(): string;
    public function getMetadata(): Metadata;
    public function setClassname(string $classname): self;
    public function setMetadata(Metadata $metadata): self;
}
