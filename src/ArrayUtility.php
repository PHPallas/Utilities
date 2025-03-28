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

class ArrayUtility
{

    # --------------------------------------------------------------------------
    # Creational Methods
    # --------------------------------------------------------------------------
    #   Use this methods to create an array.
    #
    #   Contributing Roles:
    #   [1]. All creational methods MUST starts in create and follow a camelCase
    #        naming standard.
    # --------------------------------------------------------------------------

    /**
     * Creates an array of given elements
     * @param mixed[] $elements The elements of the array
     * @return array
     */
    public static function create(mixed ...$elements): array
    {
        return [...$elements];
    }

    /**
     * Creates an array of randon numbers between 1 and 100.
     * @param int $size Length of array
     * @return int[]
     */
    public static function createRandom(int $size): array
    {
        $array = [];
        for ($i = 0; $i < $size; $i++) {
            $array[] = rand(1,100);
        }
        return $array;
    }

    /**
     * Creates an array containing a range of float or integer numericals
     * @param float|int $min The minimum value in the array
     * @param float|int $max The maximum value in the array
     * @param float|int $step Indicates by how much is the produced sequence 
     * progressed between values of the sequence. step may be negative for 
     * decreasing sequences
     * @return array
     */
    public static function createRange(
        float|int $min,
        float|int $max,
        float|int $step = 1
    ): array {
        return range($min, $max, $step);
    }

    /**
     * Creates an one dimension array of given size includes elements with 
     * similar value
     * @param int $size Count of array elements
     * @param mixed $value value of array elements
     * @return array
     */
    public static function createByValue(int $size, mixed $value): array
    {
        $output = [];
        for ($i = 0; $i < $size; $i++) {
            $output[] = $value;
        }
        return $output;
    }

    /**
     * Creates an one dimension array of given size that all elements are zero.
     * @param int $size
     * @return array
     */
    public static function createZeroArray(int $size): array
    {
        return static::createByValue($size, 0);
    }

    /**
     * Createss an one dimension array of given size that all elements are null.
     * @param int $size
     * @return array
     */
    public static function createNullArray(int $size): array
    {
        return static::createByValue($size, null);
    }

    /**
     * Creates an empty array
     * @return array
     */
    public static function createEmpty(): array
    {
        return [];
    }

    /**
     * Creates an array with given keys, all elements have similar value
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
     * Creates a two dimension array of given rows and columns that all elements 
     * are equal to given value.
     * @param int $columnsCount Number of matrix columns
     * @param int $rowsCount Number of matrix rows
     * @param mixed $value Value of matrix elements
     * @return array
     */
    public static function createMatrixArray(
        int $columnsCount,
        int $rowsCount,
        mixed $value
    ): array {
        return static::createByValue($columnsCount, static::createByValue($rowsCount, $value));
    }

    /**
     * Creates a two dimension array of given rows and column names that all 
     * elements  are of equal value.
     * @param array $columns An array of table head keys
     * @param int $rowsCount Number of rows
     * @param mixed $value Value of cells
     * @return array
     */
    public static function createTableArray(
        array $columns,
        int $rowsCount,
        mixed $value
    ): array {
        return static::createByValue($rowsCount, static::createByKeys($columns, $value));

    }

    /**
     * Creates an `array` by using the values from the `keys` array as keys and 
     * the values from the `values` array as the corresponding values.
     * @param array $keys
     * @param array $values
     * @return array
     */
    public static function createPairs(array $keys, array $values): array
    {
        return array_combine($keys, $values);
    }

    # --------------------------------------------------------------------------
    # Get Methods
    # --------------------------------------------------------------------------
    #   Use this methods to get array elements.
    #
    #   Contributing Roles:
    #   [1]. All get methods MUST starts in get and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Get array items, supporting dot notation
     * @param array $array
     * @param string $path
     * @param mixed $default
     */
    public static function get(
        array &$array,
        string $path,
        mixed $default = null
    ) {
        $location = &$array;
        foreach (explode(".", $path) as $step) {
            $location = &$location[$step] ?? $default;
        }
        return $location;
    }

    /**
     * Get all keys of an array
     * @param array $array
     * @return array
     */
    public static function getKeys(array $array): array
    {
        return array_keys($array);
    }

    /**
     * Gets the first key of an array
     * @param array $array
     * @return mixed
     */
    public static function getFirstKey(array $array): mixed
    {
        return array_key_first($array);
    }

    /**
     * Gets the last key of an array
     * @param array $array
     * @return mixed
     */
    public static function getLastKey(array $array): mixed
    {
        return array_key_last($array);
    }

    /**
     * Gets the first element of an array
     * @param array $array
     * @return mixed
     */
    public static function getFirst(array $array): mixed
    {
        $key = static::getFirstKey($array);
        return $array[$key] ?? null;
    }

    /**
     * Gets the last element of an array
     * @param array $array
     * @return mixed
     */
    public static function getLast(array $array): mixed
    {
        $key = static::getLastKey($array);
        return $array[$key] ?? null;
    }

    /**
     * Get a subset of an array by giving keys
     * @param array $array
     * @param array $keys
     * @return array
     */
    public static function getSubset(array $array, array $keys): array
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
            $item = static::getSubset($item, $columns);
        }
        return $array;
    }

    /**
     * Get a subset of array elements using a callback filter function
     * @param array $array
     * @param callable $function
     * @return array
     */
    public static function getFiltered(array $array, callable $function): array
    {
        return array_values(array_filter($array, $function, ARRAY_FILTER_USE_BOTH));
    }

    # --------------------------------------------------------------------------
    # Set Methods
    # --------------------------------------------------------------------------
    #   Use this methods to set array elements.
    #
    #   Contributing Roles:
    #   [1]. All set methods MUST starts in set and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Set array items, supporting dot notation
     * @param array $array
     * @param string $path
     * @param mixed $value
     */
    public static function set(array &$array, string $path, mixed $value): mixed
    {
        $location = &$array;
        foreach (explode(".", $path) as $step) {
            $location = &$location[$step];
        }
        return $location = $value;
    }

    # --------------------------------------------------------------------------
    # Has Methods
    # --------------------------------------------------------------------------
    #   Use this methods to check existence of elements
    #
    #   Contributing Roles:
    #   [1]. All check methods MUST starts in has and follow a 
    #       camelCase naming standard.
    #   [2]. All Has methods must return a boolean value
    # --------------------------------------------------------------------------

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
     * Checks if the given key or index exists in the array
     * @param array $array
     * @param int|string $key
     * @return bool
     */
    public static function hasKey(array $array, int|string $key): bool
    {
        return array_key_exists($key, $array);
    }

    # --------------------------------------------------------------------------
    # Add Methods
    # --------------------------------------------------------------------------
    #   Use this methods to add new element to arrays
    #
    #   Contributing Roles:
    #   [1]. All creational methods MUST starts in get and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * An acronym to addToEnd()
     * @param array $array
     * @param mixed[] $values
     * @return array
     */
    public static function add(array $array, mixed ...$values): array
    {
        return static::addToEnd($array, ...$values);
    }

    /**
     * Append elements into the end of an array
     * @param array $array
     * @param mixed[] $values
     * @return array
     */
    public static function addToEnd(array $array, mixed ...$values): array
    {
        array_push($array, ...$values);
        return $array;
    }

    /**
     * Prepend elements into the start of an array
     * @param array $array
     * @param mixed[] $values
     * @return array
     */
    public static function addToStart(array $array, mixed ...$values): array
    {
        array_unshift($array, ...$values);
        return $array;
    }

    # --------------------------------------------------------------------------
    # Drop Methods
    # --------------------------------------------------------------------------
    #   Use this methods to drop element from the array
    #
    #   Contributing Roles:
    #   [1]. All drop methods MUST starts in drop and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Drop n first element(s) of an array
     * @param array $array
     * @param int $count
     * @return array
     */
    public static function dropFromStart(array $array, int $count = 1): array
    {
        $n = min(count($array), $count);
        for ($i = 0; $i < $n; $i++) {
            array_shift($array);
        }
        return $array;
    }

    /**
     * Drop the forst element of an array
     * @param array $array
     * @return array
     */
    public static function dropFirst(array $array): array
    {
        return static::dropFromStart($array, 1);
    }

    /**
     * Drop n last element(s) of an array
     * @param array $array
     * @param int $count
     * @return array
     */
    public static function dropFromEnd(array $array, int $count = 1): array
    {
        $n = min(count($array), $count);
        for ($i = 0; $i < $n; $i++) {
            array_pop($array);
        }
        return $array;
    }

    /**
     * Drops the last element from an array
     * @param array $array
     * @return array
     */
    public static function dropLast(array $array): array
    {
        return static::dropFromEnd($array, 1);
    }

    /**
     * Drops an element from an array by key
     * @param array $array
     * @param mixed $key
     * @param bool $reIndex
     * @return array
     */
    public static function dropKey(
        array $array,
        mixed $key,
        bool $reIndex = true
    ): array {
        unset($array[$key]);
        if ($reIndex && !static::isAssociative($array)) {
            return array_values($array);
        }
        return $array;
    }

    /**
     * Drops all elements of an array that has a value equal to the given value
     * @param array $array
     * @param mixed $value
     * @param bool $reIndex
     * @return array
     */
    public static function drop(
        array $array,
        mixed $value,
        bool $reIndex = true
    ): array {
        foreach ($array as $key => $itemValue) {
            if ($value === $itemValue)
                unset($array[$key]);
        }
        if ($reIndex && !static::isAssociative($array)) {
            return array_values($array);
        }
        return $array;
    }

    # --------------------------------------------------------------------------
    # Transform Methods
    # --------------------------------------------------------------------------
    #   Use this methods to transform elements of an array
    #
    #   Contributing Roles:
    #   [1]. All transform methods MUST starts in transform and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Applies a transform callable to all elements of an array
     * @param array $array
     * @param callable $function
     * @return array
     */
    public static function transform(array $array, callable $function): array
    {
        foreach ($array as $key => $value) {
            [$transformedKey, $transformedValue] = $function($key, $value);
            if ($transformedKey !== $key) {
                unset($array[$key]);
                $key = $transformedKey;
            }
            $array[$key] = $transformedValue;

        }
        return $array;
    }

    /**
     * Transform the case of all keys in an array to the UPPER_CASE
     * @param mixed $array
     * @return array
     */
    public static function transformToUppercaseKeys(array $array): array
    {
        if (function_exists("\array_change_key_case")) {
            return array_change_key_case($array, CASE_UPPER);
        }
        return static::transform($array, function ($key, $value) {
            if (is_string($key)) {
                $key = strtoupper($key);
            }
            return [$key, $value];
        });
    }

    /**
     * Transform the case of all keys in an array to lower_case
     * @param mixed $array
     * @return array
     */
    public static function transformToLowercaseKeys(array $array): array
    {
        if (function_exists("\lowercaseKeys")) {
            return array_change_key_case($array, CASE_LOWER);
        }
        return static::transform($array, function ($key, $value) {
            if (is_string($key)) {
                $key = strtolower($key);
            }
            return [$key, $value];
        });
    }

    /**
     * Transform all elements of an array to lower_case
     * @param array $array
     * @return array
     */
    public static function transformToLowercase(array $array): array
    {
        return static::transform($array, function ($key, $value) {
            if (is_string($value)) {
                $value = strtolower($value);
            }
            return [$key, $value];
        });
    }

    /**
     * Transform all elements of an array to UPPER_CASE
     * @param array $array
     * @return array
     */
    public static function transformToUppercase(array $array): array
    {
        return static::transform($array, function ($key, $value) {
            if (is_string($value)) {
                $value = strtoupper($value);
            }
            return [$key, $value];
        });
    }

    /**
     * Exchanges all keys with their associated values in an array
     * @param array $array
     * @return array
     */
    public static function transformFlip(array $array): array
    {
        return array_flip($array);
    }

    # --------------------------------------------------------------------------
    # Is Methods
    # --------------------------------------------------------------------------
    #   Use this methods to get array elements.
    #
    #   Contributing Roles:
    #   [1]. All get methods MUST starts in get and follow a 
    #       camelCase naming standard.
    #   [2]. All Is methods must return a boolean value
    # --------------------------------------------------------------------------

    /**
     * Checks if an array is associative
     * @param array $array
     * @return bool
     */
    public static function isAssociative(array $array): bool
    {
        $keys = static::getKeys($array);
        foreach ($keys as $key) {
            if (!is_int($key))
                return true;
        }
        return false;
    }

    /**
     * Checks if an array is empty
     * @param array $array
     * @return bool
     */
    public static function isEmpty(array $array): bool
    {
        return empty($array);
    }

    /**
     * Compare two arrays and check if are same
     * @param array $array1
     * @param array $array2
     * @param bool $strict
     * @return bool
     */
    public static function isSameAs(
        array $array1,
        array $array2,
        bool $strict = false
    ): bool {
        if (false === $strict) {
            return 0 === count(array_diff($array1, $array2));
        } else {
            return 0 === count(array_diff_assoc($array1, $array2));
        }
    }

    /**
     * Checks a condition against all element of an array
     * @param array $array
     * @param callable $function
     * @return bool
     */
    public static function isEligibleTo(
        array $array,
        callable $function
    ): bool {
        foreach ($array as $index => $value) {
            if (false === $function($index, $value)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Checks if an array elements all are string
     * @param array $array
     * @return bool
     */
    public static function isString(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_string($value);
        });
    }

    /**
     * Checks if an array elements all are boolean
     * @param array $array
     * @return bool
     */
    public static function isBoolean(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_bool($value);
        });
    }

    /**
     * Checks if an array elements all are callable
     * @param array $array
     * @return bool
     */
    public static function isCallable(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_callable($value);
        });
    }

    /**
     * Checks if an array elements all are countable
     * @param array $array
     * @return bool
     */
    public static function isCountable(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_countable($value);
        });
    }

    /**
     * Checks if an array elements all are iterable
     * @param array $array
     * @return bool
     */
    public static function isIterable(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_iterable($value);
        });
    }

    /**
     * Checks if an array elements all are numeric
     * @param array $array
     * @return bool
     */
    public static function isNumeric(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_numeric($value);
        });
    }

    /**
     * Checks if an array elements all are scalar
     * @param array $array
     * @return bool
     */
    public static function isScalar(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_scalar($value);
        });
    }

    /**
     * Checks if an array elements all are float
     * @param array $array
     * @return bool
     */
    public static function isFloat(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_float($value);
        });
    }

    /**
     * Checks if an array elements all are null
     * @param array $array
     * @return bool
     */
    public static function isNull(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return null === $value;
        });
    }

    /**
     * Checks if an array elements all are object
     * @param array $array
     * @return bool
     */
    public static function isObject(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_object($value);
        });
    }

    /**
     * Checks if an array elements all are array
     * @param array $array
     * @return bool
     */
    public static function isArray(array $array): bool
    {
        return static::isEligibleTo($array, function ($index, $value) {
            return is_array($value);
        });
    }

    /**
     * Checks if an array elements all are of given class
     * @param array $array
     * @return bool
     */
    public static function isInstanceOf(array $array, string $class): bool
    {
        foreach ($array as $item) {
            if (!$item instanceof $class)
                return false;
        }
        return true;
    }

    # --------------------------------------------------------------------------
    # Estimate Methods
    # --------------------------------------------------------------------------
    #   Use this methods to get statistics of an array
    #
    #   Contributing Roles:
    #   [1]. All estimate methods MUST start in estimate and follow a 
    #       camelCase naming standard.
    #   [2]. All estimate methods must return an integer value
    # --------------------------------------------------------------------------

    /**
     * Get total number of elements inside an array
     * @param array $array
     * @return int
     */
    public static function estimateSize(array $array): int
    {
        $size = 0;
        foreach ($array as $value) {
            if (true === is_array($value)) {
                $size += static::estimateSize($value);
            } else {
                $size++;
            }
        }
        return $size;
    }

    /**
     * Get count of distinct values inside an array
     * @param array $array
     * @return int[]
     */
    public static function estimateCounts(array $array): array
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
     * Calculate the sum of values in an array
     * @param array $array
     * @return float|int
     */
    public static function estimateSum(array $array): int|float
    {
        return array_sum($array);
    }

    # --------------------------------------------------------------------------
    # Merge Methods
    # --------------------------------------------------------------------------
    #   Use this methods to merge arrays
    #
    #   Contributing Roles:
    #   [1]. All merge methods MUST start in merge and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Merge one or more arrays
     * @param array[] $arrays
     * @return array
     */
    public static function merge(array ...$arrays): array
    {
        return array_merge(...$arrays);
    }

    /**
     * Merge one or more arrays recursively
     * @param array[] $arrays
     * @return array
     */
    public static function mergeInDepth(array ...$arrays): array
    {
        return array_merge_recursive(...$arrays);
    }

    # --------------------------------------------------------------------------
    # Split Methods
    # --------------------------------------------------------------------------
    #   Use this methods to split arrays
    #
    #   Contributing Roles:
    #   [1]. All split methods MUST start in split and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Split an array into chunks
     * @param array $array
     * @param int $size
     * @param bool $isAssoc
     * @return array
     */
    public static function split(
        array $array,
        int $size,
        bool $isAssoc = false
    ): array {
        return array_chunk($array, $size, $isAssoc);
    }

    # --------------------------------------------------------------------------
    # Sort Methods
    # --------------------------------------------------------------------------
    #   Use this methods to sort arrays
    #
    #   Contributing Roles:
    #   [1]. All sort methods MUST start in sort and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Sort elements of an array
     * @param array $array
     * @param mixed $sortByKeys
     * @param mixed $descending
     * @param mixed $isAssoc
     * @return array
     */
    public static function sort(
        array $array,
        bool $sortByKeys = false,
        bool $descending = false,
        bool $isAssoc = false
    ): array {
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

    /**
     * Shuffles (randomizes the order of the elements in) an array.
     * @param array $array
     * @return array
     */
    public static function sortRandom(array $array): array
    {
        shuffle($array);
        return $array;
    }

    # --------------------------------------------------------------------------
    # Export/Import Methods
    # --------------------------------------------------------------------------
    #   Use this methods to export/import arrays
    #
    #   Contributing Roles:
    #   [1]. All import methods MUST start in from and follow a 
    #       camelCase naming standard.
    #   [2]. All export methods MUST start in to and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Export an array to a csv format
     * @param array $array
     * @return string
     */
    // public static function toCSV(array $array, string $delimiter = ","): string
    // {
    //     $csv = implode($delimiter,static::getKeys($array));
    //     foreach ($array as $row)
    //     {
    //         $csv .= "\n" . implode($delimiter, $row);
    //     }
    //     return $csv;
    // }

    /**
     * Import a CSV data into an array
     * @param string $csv
     * @return bool|string[]
     */
    // public static function fromCSV(string $csv, string $separator): array
    // {
    //     $array = explode("\n", $csv);
    //     foreach ($array as &$row) {
    //         $row = explode($separator, $row);
    //     }
    //     return $array;
    // }

    /**
     * Export an  array into a Json
     * @param array $array
     * @return bool|string
     */
    // public static function toJson(array $array): string
    // {
    //     return json_encode($array);
    // }

    /**
     * Import a json string data into an array
     * @param string $json
     * @return array
     */
    // public static function fromJson(string $json): array
    // {
    //     return json_decode($json, true, 2147483647, JSON_OBJECT_AS_ARRAY);
    // }
}