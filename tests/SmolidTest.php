<?php

namespace Shanginn\Smolid\Tests;

use PHPUnit\Framework\TestCase;
use Shanginn\Smolid\Alphabet;
use Shanginn\Smolid\Smolid;

class SmolidTest extends TestCase
{
    public function testSmolid()
    {
        $generator = new Smolid();
        $id = $generator->generate(10);

        $this->assertIsString($id);
    }

    public function testSmolidWithAAlphabetAndSize()
    {
        $generator = new Smolid('a');
        $id = $generator->generate(10);

        $this->assertEquals('aaaaaaaaaa', $id);
    }

    public function testSmolidWithCustomAlphabet()
    {
        $generator = new Smolid(Alphabet::HEXADECIMAL_UPPERCASE);
        $id = $generator->generate(size: 21);

        $this->assertMatchesRegularExpression('/^[0-9A-F]{21}$/', $id);
    }

    public function testGenerateOneMillionSmolidsNoDuplicates()
    {
        $smolid = new Smolid();
        $ids = [];
        $size = 10;
        $count = 1_000_000;

        for ($i = 0; $i < $count; $i++) {
            $ids[] = $smolid->generate($size);
        }

        $this->assertEquals($count, count(array_unique($ids)));
    }
}