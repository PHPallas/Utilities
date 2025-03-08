<?php

declare(strict_types=1);

namespace PHPallas\Utilities;

class ArrayUtility
{
    public static function set(array &$array, string $path, mixed $value)
    {
        $location = &$array;
        foreach (explode(".", $path) as $step) {
            $location = &$location[$step];
        }
        return $location = $value;
    }
    public static function get(array &$array, string $path)
    {
        $location = &$array;
        foreach (explode(".", $path) as $step) {
            $location = &$location[$step];
        }
        return $location;
    }
}