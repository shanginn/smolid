<?php

namespace Shanginn\Smolid\Tests;

use PHPUnit\Framework\TestCase;
use Shanginn\Smolid\Alphabet;
use Shanginn\Smolid\Smolid;
use Shanginn\Smolid\SmolidFactory;
use Shanginn\Smolid\SmolidGenerator;

class SmolidTest extends TestCase
{
    public function testSmolid()
    {
        $generator = new SmolidGenerator();
        $id = $generator->generate(10);

        $this->assertIsString($id);
    }

    public function testSmolidWithAAlphabetAndSize()
    {
        $generator = new SmolidGenerator('a');
        $id = $generator->generate(10);

        $this->assertEquals('aaaaaaaaaa', $id);
    }

    public function testSmolidWithCustomAlphabet()
    {
        $generator = new SmolidGenerator(Alphabet::HEXADECIMAL_UPPERCASE);
        $id = $generator->generate(size: 21);

        $this->assertMatchesRegularExpression('/^[0-9A-F]{21}$/', $id);
    }

    public function testGenerateOneMillionSmolidsNoDuplicates()
    {
        $smolid = new SmolidGenerator();
        $ids = [];
        $size = 10;
        $count = 1_000_000;

        for ($i = 0; $i < $count; $i++) {
            $ids[] = $smolid->generate($size);
        }

        $this->assertEquals($count, count(array_unique($ids)));
    }

    public function testFactory()
    {
        $id = Smolid::id();

        $this->assertIsString($id);
    }

    public function testCustomFactory()
    {
        $factory = new SmolidFactory(
            generator: new SmolidGenerator('a'),
            size: 10
        );
        Smolid::setFactory($factory);

        $id = Smolid::id();

        $this->assertEquals(10, strlen($id));
        $this->assertEquals('aaaaaaaaaa', $id);
    }
}