<?php

/*
 * This file is part of the PHPallas package.
 *
 * (c) Sina Kuhestani <sinakuhestani@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPallas\Utilities;

/**
 * Class RandomUtility
 *
 * Provides utility methods for generating random values.
 */
class RandomUtility
{
    private static $chars = "qazxswedcvfrtgbnhyujmkiolp";

    /**
     * Generates a random integer between the specified minimum and maximum values.
     *
     * @param int $min The minimum value (inclusive).
     * @param int $max The maximum value (inclusive).
     * @return int A random integer between min and max.
     */
    public static function randomInt($min = 0, $max = 100) {
        return MathUtility::randomInt($min, $max);
    }

    /**
     * Generates a random float between the specified minimum and maximum values.
     *
     * @param float $min The minimum value (inclusive).
     * @param float $max The maximum value (inclusive).
     * @return float A random float between min and max.
     */
    public static function randomFloat($min = 0.0, $max = 100.0) {
        return MathUtility::randomFloat($min, $max);
    }

    /**
     * Generates a random boolean value.
     *
     * @return bool A random boolean value (true or false).
     */
    public static function randomBool() {
        return BooleanUtility::createRandom();
    }

    /**
     * Generates a random string of the specified length using predefined characters.
     *
     * @param int $length The length of the random string to generate.
     * @return string A random string of the specified length.
     */
    public static function randomString($length = 10) {
        return StringUtility::createRandom($length, static::$chars);
    }

    /**
     * Generates an array of random values of the specified count.
     *
     * @param int $count The number of random values to generate.
     * @return array An array containing random values.
     */
    public static function randomArray($count = 5) {
        return ArrayUtility::createRandom($count);
    }

    /**
     * Generates a random object with properties based on random values.
     *
     * @param int $count The number of properties to include in the random object.
     * @return object A random object with specified properties.
     */
    public static function randomObject($count = 5) {
        return (object) static::randomArray($count);
    }
}
