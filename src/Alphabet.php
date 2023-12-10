<?php

declare(strict_types=1);

namespace Shanginn\Smolid;

/**
 * inspired by https://github.com/CyberAP/nanoid-dictionary/tree/master.
 */
final readonly class Alphabet
{
    public const NUMERIC = '0123456789';

    public const LOWERCASE = 'abcdefghijklmnopqrstuvwxyz';

    public const UPPERCASE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public const HEXADECIMAL_UPPERCASE = self::NUMERIC . 'ABCDEF';

    public const HEXADECIMAL_LOWERCASE = self::NUMERIC . 'abcdef';

    public const ALPHANUMERIC = self::NUMERIC . self::LOWERCASE . self::UPPERCASE;

    /**
     * Numbers and english alphabet without lookalikes: 1, l, I, 0, O, o, u, v, 5, S, s, 2, Z.
     */
    public const NO_LOOKALIKES = '346789ABCDEFGHJKLMNPQRTUVWXYabcdefghijkmnpqrtwxyz';

    /**
     * Same as NO_LOOKALIKES but with removed vowels and following letters: 3, 4, x, X, V.
     */
    public const NO_LOOKALIKES_SAFE = '6789BCDFGHJKLMNPQRTWbcdfghjkmnpqrtwz';
}