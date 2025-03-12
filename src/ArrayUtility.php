<?php

declare(strict_types=1);

namespace PHPallas\Utilities;

class ArrayUtility
{
    public static function create (mixed ...$elements): array
    {
        return [...$elements];
    }
    public static function createRange (float|int $min, float|int $max, float|int $step = 1): array
    {
        return range ($min, $max, $step);
    }
    public static function createByValue(int $count, mixed $value): array
    {
        $output = [];
        for($i = 0; $i< $count; $i++)
        {
            $output[] = $value;
        }
        return $output;
    }
    public static function createByKeys(array $keys, mixed $value): array
    {
        $output = [];
        foreach($keys as $key)
        {
            $output[$key] = $value;
        }
        return $output;
    }
    public static function isset(array $array, int|string $key): bool
    {
        return array_key_exists($key, $array);
    }
    public static function firstKey(array $array): mixed
    {
        return array_key_first($array);
    }
    public static function lastKey(array $array): mixed
    {
        return array_key_last($array);
    }
    public static function first(array $array): mixed
    {
        $key =static::firstKey($array);
        return $array[$key] ?? null;
    }
    public static function last(array $array): mixed
    {
        $key = static::lastKey($array);
        return $array[$key] ?? null;
    }
    public static function dropFirst(array $array, int $count = 1): mixed
    {
        $n = min (count($array), $count);
        for ($i = 0; $i < $n; $i++) {
            array_shift($array);
        }
        return $array;
    }
    public static function dropLast(array $array, int $count = 1): mixed
    {
        $n = min (count($array), $count);
        for ($i = 0; $i < $n; $i++) {
            array_pop($array);
        }
        return $array;
    }
    public static function append(array $array, mixed ...$values): array
    {
        array_push($array, ...$values);
        return $array;
    }
    public static function prepend(array $array, mixed ...$values): array
    {
        array_unshift($array, ...$values);
        return $array;
    }
    public static function size(array $array): int
    {
        $size = 0;
        foreach ($array as $value) {
            if (true === is_array($value)) {
                $size += static::size($value);
            }
            else {
                $size++;
            }
        }
        return $size;
    }
    public static function uppercaseKeys($array): array
    {
        return array_change_key_case($array, CASE_UPPER);
    }
    public static function lowercaseKeys($array): array
    {
        return array_change_key_case($array, CASE_LOWER);
    }
    public static function transform(array $array, callable $function): array
    {
        foreach ($array as &$element) {
            $element = $function ($element);
        }
        return $array;
    }
    public static function toLower(array $array): array
    {
        return static::transform($array, function ($item){return strtolower($item);});
    }
    public static function toUpper(array $array): array
    {
        return static::transform($array, function ($item){return strtoupper($item);});
    }
    public static function chuck(array $array, int $size, bool $isAssoc): array
    {
        return array_chunk($array, $size, $isAssoc);
    }
    public static function getKeys(array $array, array $keys): array
    {
        $output = [];
        foreach ($array as $key => $item) {
            if (false === in_array($key, $keys)) continue;
            $output[$key] = $item;
        }
        return $output;
    }
    public static function getColumns(array $array, array $columns): array
    {
        foreach ($array as &$item) {
            $item = static::getKeys($item, $columns);
        }
        return $array;
    }
    public static function pairedCombine(array $keys, array $values): array
    {
        return array_combine($keys, $values);
    }
    public static function counts(array $array): array
    {
        $output = [];
        foreach ($array as $value) {
            if (!isset($output[$value])) $output[$value] = 0;
            $output[$value]++;
        }
        return $output;
    }
    public static function has (array $array, mixed $value): bool
    {
        return in_array($value, $array, true);
    }
    public static function areSame(array $array1, array $array2, bool $strict = false): bool
    {
        if (false === $strict) {
            return 0 === count(array_diff($array1, $array2));
        }
        else {
            return 0 === count(array_diff_assoc($array1, $array2));
        }
    }
    public static function filter(array $array, callable $function): array
    {
        return array_filter($array, $function, ARRAY_FILTER_USE_BOTH);
    }
    public static function search (array $array, mixed $value): array
    {
        return static::filter($array, function ($elem, $value){return $elem === $value;});
    }
    public static function set(array &$array, string $path, mixed $value)
    {
        $location = &$array;
        foreach (explode(".", $path) as $step) {
            $location = &$location[$step];
        }
        return $location = $value;
    }
    public static function get(array &$array, string $path, mixed $default = null)
    {
        $location = &$array;
        foreach (explode(".", $path) as $step) {
            $location = &$location[$step] ?? $default;
        }
        return $location;
    }
    public static function satisfies (array $array, callable $function): bool
    {
        foreach ($array as $index => $value) {
            if (false === $function($index, $value)) {
                return false;
            }
        }
        return true;
    }
    public static function flip(array $array): array
    {
        return array_flip($array);
    }
    public static function merge(array ...$arrays): array
    {
        return array_merge(...$arrays);
    }
    public static function mix(array ...$arrays): array
    {
        return array_merge_recursive(...$arrays);
    }
    public static function shuffle(array $array): array
    {
        shuffle($array);
        return $array;
    }
    public static function sort(array $array, $sortByKeys = false, $descending = false, $isAssoc = false): array
    {
        if (true === $sortByKeys) {
            if (true === $descending)
            {
                krsort($array);
            }
            else {
                ksort($array);
            }
        }
        else {
            if (true === $descending)
            {
                if (true === $isAssoc) {
                    arsort($array);
                }
                else {
                    rsort($array);
                }
            }
            else {
                if (true === $isAssoc) {
                    asort($array);
                }
                else {
                    sort($array);
                }
            }
        }
        return $array;
    }
    public static function sum(array $array): int|float
    {
        return array_sum($array);
    }
}