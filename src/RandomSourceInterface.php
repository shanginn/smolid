<?php

declare(strict_types=1);

namespace Shanginn\Smolid;

interface RandomSourceInterface
{
    /**
     * Retrieves random data of a specified length from the source.
     *
     * @param int $length the length of data to retrieve
     *
     * @return string the data retrieved from the source
     */
    public function get(int $length): string;
}