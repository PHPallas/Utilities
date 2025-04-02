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

class PHP
{
    /**
     * Get PHP version
     * @return bool|string
     */
    public static function version()
    {
        return phpversion();
    }

    /**
     * Get PHP version as a number
     * @return int
     */
    public static function versionID()
    {
        $version = explode(".", phpversion());
        $value = 10000 * (int) $version[0] + 100 * (int) $version[1] + (int) $version[2];
        return $value;
    }

    /**
     * Get PHP major version
     * @return int|string
     */
    public static function versionMajor()
    {
        $version = explode(".", phpversion());
        return isset($version[0]) ? $version[0] : 0;
    }

    /**
     * Get PHP minor Version
     * @return int|string
     */
    public static function versionMinor()
    {
        $version = explode(".", phpversion());
        return isset($version[1]) ? $version[1] : 0;
    }
    
    /**
     * Get PHP release version
     * @return int|string
     */
    public static function versionRelease()
    {
        $version = explode(".", phpversion());
        return isset($version[2]) ? $version[2] : 0;
    }
}