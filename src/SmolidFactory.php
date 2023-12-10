<?php

namespace Shanginn\Smolid;

class SmolidFactory
{
    public function __construct(
        private SmolidGenerator $generator = new SmolidGenerator(),
        private int $size = 21,
    ) {}

    public function generate(): string
    {
        return $this->generator->generate($this->size);
    }
}