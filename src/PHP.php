<?php

declare(strict_types=1);

namespace PHPallas\Utilities;

class PHP
{
    public static function version(): string
    {
        return phpversion();
    }
    public static function versionID(): int
    {
        $version = explode(".", phpversion());
        $value = 10000 * (int) $version[0] + 100 * (int) $version[1] + (int) $version[2];
        return $value;
    }
}