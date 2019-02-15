<?php

namespace Moo\utils;

/**
 * Miscelanneous util for cards
 */
class Utils
{
    /**
     * Randomly generates a grey scale background in hexadecimal values for CSS background color use
     */
    public static function greyScaleRandomColourGenerator()
    {
        $col = rand(0, 256);
        $hex = dechex($col);
        $hex = strlen($hex) == 1 ? $hex.$hex : $hex;

        return '#' . $hex.$hex.$hex;
    }
}
