<?php

declare(strict_types=1);

namespace Shanginn\Smolid;

final class RandomPool implements RandomSourceInterface
{
    private const POOL_SIZE_MULTIPLIER = 256;
    private string $pool               = '';
    private int $poolOffset            = 0;

    public function get(int $length): string
    {
        $this->fillPool($length);
        $data = substr($this->pool, $this->poolOffset, $length);
        $this->poolOffset += $length;

        return $data;
    }

    private function getRandomBytes(int $length): string
    {
        return random_bytes($length);
    }

    private function fillPool(int $size): void
    {
        if (strlen($this->pool) < $size) {
            $this->pool       = $this->getRandomBytes($size * self::POOL_SIZE_MULTIPLIER);
            $this->poolOffset = 0;
        } elseif (strlen($this->pool) > $this->poolOffset + $size) {
            $this->pool       = $this->getRandomBytes(strlen($this->pool));
            $this->poolOffset = 0;
        }
    }
}