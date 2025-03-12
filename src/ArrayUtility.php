<?php

declare(strict_types=1);

namespace PHPallas\Utilities;

class ArrayUtility
{
    /**
     * Create an array
     * @param mixed[] $elements
     * @return array
     */
    public static function create(mixed ...$elements): array
    {
        return [...$elements];
    }

    /**
     * Create an array containing a range of elements.
     * @param float|int $min
     * @param float|int $max
     * @param float|int $step
     * @return array
     */
    public static function createRange(float|int $min, float|int $max, float|int $step = 1): array
    {
        return range($min, $max, $step);
    }

    /**
     * Create an array with same value and given size
     * @param int $count
     * @param mixed $value
     * @return array
     */
    public static function createByValue(int $count, mixed $value): array
    {
        $output = [];
        for ($i = 0; $i < $count; $i++) {
            $output[] = $value;
        }
        return $output;
    }

    /**
     * Create an array with same value and given keys
     * @param array $keys
     * @param mixed $value
     * @return array
     */
    public static function createByKeys(array $keys, mixed $value): array
    {
        $output = [];
        foreach ($keys as $key) {
            $output[$key] = $value;
        }
        return $output;
    }

    /**
     * Checks if the given key or index exists in the array
     * @param array $array
     * @param int|string $key
     * @return bool
     */
    public static function isset(array $array, int|string $key): bool
    {
        return array_key_exists($key, $array);
    }

    /**
     * Gets the first key of an array
     * @param array $array
     * @return int|string|null
     */
    public static function firstKey(array $array): mixed
    {
        return array_key_first($array);
    }

    /**
     * Gets the last key of an array
     * @param array $array
     * @return int|string|null
     */
    public static function lastKey(array $array): mixed
    {
        return array_key_last($array);
    }

    /**
     * Gets the first element of an array
     * @param array $array
     * @return mixed
     */
    public static function first(array $array): mixed
    {
        $key = static::firstKey($array);
        return $array[$key] ?? null;
    }

    /**
     * Gets the last element of an array
     * @param array $array
     * @return mixed
     */
    public static function last(array $array): mixed
    {
        $key = static::lastKey($array);
        return $array[$key] ?? null;
    }

    /**
     * Drop n first element(s) of an array
     * @param array $array
     * @param int $count
     * @return array
     */
    public static function dropFirst(array $array, int $count = 1): mixed
    {
        $n = min(count($array), $count);
        for ($i = 0; $i < $n; $i++) {
            array_shift($array);
        }
        return $array;
    }

    /**
     * Drop n last element(s) of an array
     * @param array $array
     * @param int $count
     * @return array
     */
    public static function dropLast(array $array, int $count = 1): mixed
    {
        $n = min(count($array), $count);
        for ($i = 0; $i < $n; $i++) {
            array_pop($array);
        }
        return $array;
    }

    /**
     * Append elements into the end of an array
     * @param array $array
     * @param mixed[] $values
     * @return array
     */
    public static function append(array $array, mixed ...$values): array
    {
        array_push($array, ...$values);
        return $array;
    }

    /**
     * Append elements into the start of an array
     * @param array $array
     * @param mixed[] $values
     * @return array
     */
    public static function prepend(array $array, mixed ...$values): array
    {
        array_unshift($array, ...$values);
        return $array;
    }

    /**
     * Get total number of elements inside an array
     * @param array $array
     * @return int
     */
    public static function size(array $array): int
    {
        $size = 0;
        foreach ($array as $value) {
            if (true === is_array($value)) {
                $size += static::size($value);
            } else {
                $size++;
            }
        }
        return $size;
    }

    /**
     * Changes the case of all keys in an array to UPPER_CASE
     * @param mixed $array
     * @return array
     */
    public static function uppercaseKeys($array): array
    {
        return array_change_key_case($array, CASE_UPPER);
    }

    /**
     * Changes the case of all keys in an array to lower_case
     * @param mixed $array
     * @return array
     */
    public static function lowercaseKeys($array): array
    {
        return array_change_key_case($array, CASE_LOWER);
    }

    /**
     * Transform all elements of an array subject to a function
     * @param array $array
     * @param callable $function
     * @return array
     */
    public static function transform(array $array, callable $function): array
    {
        foreach ($array as &$element) {
            $element = $function($element);
        }
        return $array;
    }

    /**
     * Transform all elements of an array to lower_case
     * @param array $array
     * @return array
     */
    public static function toLower(array $array): array
    {
        return static::transform($array, function ($item) {
            return strtolower($item); });
    }

    /**
     * Transform all elements of an array to UPPER_CASE
     * @param array $array
     * @return array
     */
    public static function toUpper(array $array): array
    {
        return static::transform($array, function ($item) {
            return strtoupper($item); });
    }

    /**
     * Split an array into chunks
     * @param array $array
     * @param int $size
     * @param bool $isAssoc
     * @return array
     */
    public static function chunk(array $array, int $size, bool $isAssoc = false): array
    {
        return array_chunk($array, $size, $isAssoc);
    }

    /**
     * Get a subset of associative array
     * @param array $array
     * @param array $keys
     * @return array
     */
    public static function getKeys(array $array, array $keys): array
    {
        $output = [];
        foreach ($array as $key => $item) {
            if (false === in_array($key, $keys))
                continue;
            $output[$key] = $item;
        }
        return $output;
    }

    /**
     * Get a subset of two-dimensions array by keys
     * @param array $array
     * @param array $columns
     * @return array
     */
    public static function getColumns(array $array, array $columns): array
    {
        foreach ($array as &$item) {
            $item = static::getKeys($item, $columns);
        }
        return $array;
    }

    /**
     * Creates an `array` by using the values from the `keys` array as keys and 
     * the values from the `values` array as the corresponding values.
     * @param array $keys
     * @param array $values
     * @return array
     */
    public static function pairedCombine(array $keys, array $values): array
    {
        return array_combine($keys, $values);
    }

    /**
     * Get count of distinct values inside an array
     * @param array $array
     * @return int[]
     */
    public static function counts(array $array): array
    {
        $output = [];
        foreach ($array as $value) {
            if (!isset($output[$value]))
                $output[$value] = 0;
            $output[$value]++;
        }
        return $output;
    }

    /**
     * Check if an array includes a given value
     * @param array $array
     * @param mixed $value
     * @return bool
     */
    public static function has(array $array, mixed $value): bool
    {
        return in_array($value, $array, true);
    }

    /**
     * Compare two arrays and check if are same
     * @param array $array1
     * @param array $array2
     * @param bool $strict
     * @return bool
     */
    public static function areSame(array $array1, array $array2, bool $strict = false): bool
    {
        if (false === $strict) {
            return 0 === count(array_diff($array1, $array2));
        } else {
            return 0 === count(array_diff_assoc($array1, $array2));
        }
    }

    /**
     * Filters elements of an array using a callback function
     * @param array $array
     * @param callable $function
     * @return array
     */
    public static function filter(array $array, callable $function): array
    {
        return array_values(array_filter($array, $function, ARRAY_FILTER_USE_BOTH));
    }

    /**
     * Set array items, supporting dot notation
     * @param array $array
     * @param string $path
     * @param mixed $value
     */
    public static function set(array &$array, string $path, mixed $value)
    {
        $location = &$array;
        foreach (explode(".", $path) as $step) {
            $location = &$location[$step];
        }
        return $location = $value;
    }

    /**
     * Get array items, supporting dot notation
     * @param array $array
     * @param string $path
     * @param mixed $default
     */
    public static function get(array &$array, string $path, mixed $default = null)
    {
        $location = &$array;
        foreach (explode(".", $path) as $step) {
            $location = &$location[$step] ?? $default;
        }
        return $location;
    }

    
    public static function satisfies(array $array, callable $function): bool
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
            if (true === $descending) {
                krsort($array);
            } else {
                ksort($array);
            }
        } else {
            if (true === $descending) {
                if (true === $isAssoc) {
                    arsort($array);
                } else {
                    rsort($array);
                }
            } else {
                if (true === $isAssoc) {
                    asort($array);
                } else {
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