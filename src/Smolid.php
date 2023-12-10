<?php

namespace Shanginn\Smolid;

class Smolid
{
    private static ?SmolidFactory $factory = null;

    public static function getFactory(): SmolidFactory
    {
        if (self::$factory === null) {
            self::$factory = new SmolidFactory();
        }

        return self::$factory;
    }

    public static function setFactory(SmolidFactory $factory): void
    {
        self::$factory = $factory;
    }

    public static function id(): string
    {
        return self::getFactory()->generate();
    }
}