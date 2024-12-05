<?php

namespace App;

class Helper
{
    public const CURRENCY = 'USD';
    public const CURRENCY_SYMBOL = '$';

    public const BKASH_NUMBER = '01794623620';

    /**
     * @param string $text
     * @param int $length
     * @return string
     */
    public static function readMore(string $text, int $length = 30): string
    {
        $words = explode(' ', $text);

        if (count($words) > $length) {
            return implode(' ', array_slice($words, 0, $length)) . '...';
        }

        return $text;
    }
}