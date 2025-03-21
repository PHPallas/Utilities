<?php

declare(strict_types=1);

namespace PHPallas\Utilities;

class PHP
{
    /**
     * Get PHP version
     * @return bool|string
     */
    public static function version(): string
    {
        return phpversion();
    }
    /**
     * Get PHP version as a number
     * @return int
     */
    public static function versionID(): int
    {
        $version = explode(".", phpversion());
        $value = 10000 * (int) $version[0] + 100 * (int) $version[1] + (int) $version[2];
        return $value;
    }
    /**
     * Get PHP major version
     * @return int|string
     */
    public static function versionMajor(): int
    {
        $version = explode(".", phpversion());
        return $version[0] ?? 0;
    }
    /**
     * Get PHP minor Version
     * @return int|string
     */
    public static function versionMinor(): int
    {
        $version = explode(".", phpversion());
        return $version[1] ?? 0;
    }
    /**
     * Get PHP release version
     * @return int|string
     */
    public static function versionRelease(): int
    {
        $version = explode(".", phpversion());
        return $version[2] ?? 0;
    }
}