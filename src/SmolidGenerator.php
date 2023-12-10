<?php

declare(strict_types=1);

namespace Shanginn\Smolid;

final class SmolidGenerator
{
    private int $alphabetLength;

    public function __construct(
        private string $alphabet = Alphabet::ALPHANUMERIC,
        private RandomSourceInterface $pool = new RandomPool(),
    )
    {
        $this->alphabetLength = strlen($alphabet);
    }

    public function generate(int $size = 21): string
    {
        $id = '';
        $bytes = $this->pool->get($size);

        for ($i = 0; $i < $size; $i++) {
            $id .= $this->alphabet[ord($bytes[$i]) & $this->alphabetLength - 1];
        }

        return $id;
    }
}