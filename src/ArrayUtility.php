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

    /**
     * Creates an array of given elements
     * @param mixed[] $elements The elements of the array
     * @return array
     */
    public static function create()
    {
        return func_get_args();
    }

    /**
     * Creates an array of randon numbers between 1 and 100.
     * @param int $size Length of array
     * @return int[]
     */
    public static function createRandom($size)
    {
        $array = array();
        for ($i = 0; $i < $size; $i++)
        {
            $array[] = rand(1, 100);
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
        $min,
        $max,
        $step = 1
    ) {
        return range($min, $max, $step);
    }

    /**
     * Creates an one dimension array of given size includes elements with 
     * similar value
     * @param int $size Count of array elements
     * @param mixed $value value of array elements
     * @return array
     */
    public static function createByValue($size, $value)
    {
        $output = array();
        for ($i = 0; $i < $size; $i++)
        {
            $output[] = $value;
        }
        return $output;
    }

    /**
     * Creates an one dimension array of given size that all elements are zero.
     * @param int $size
     * @return array
     */
    public static function createZeroArray($size)
    {
        return static::createByValue($size, 0);
    }

    /**
     * Createss an one dimension array of given size that all elements are null.
     * @param int $size
     * @return array
     */
    public static function createNullArray($size)
    {
        return static::createByValue($size, null);
    }

    /**
     * Creates an empty array
     * @return array
     */
    public static function createEmpty()
    {
        return array();
    }

    /**
     * Creates an array with given keys, all elements have similar value
     * @param array $keys
     * @param mixed $value
     * @return array
     */
    public static function createByKeys($keys, $value)
    {
        $output = array();
        foreach ($keys as $key)
        {
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
        $columnsCount,
        $rowsCount,
        $value
    ) {
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
        $columns,
        $rowsCount,
        $value
    ) {
        return static::createByValue($rowsCount, static::createByKeys($columns, $value));
    }

    /**
     * Creates an `array` by using the values from the `keys` array as keys and 
     * the values from the `values` array as the corresponding values.
     * @param array $keys
     * @param array $values
     * @return array
     */
    public static function createPairs($keys, $values)
    {
        return array_combine($keys, $values);
    }

    /**
     * Get array items, supporting dot notation
     * @param array $array
     * @param string $path
     * @param mixed $default
     */
    public static function get(
        &$array,
        $path,
        $default = null
    ) {
        $location = &$array;
        foreach (explode(".", $path) as $step)
        {
            if (isset($location[$step]))
            {
                $location = &$location[$step];
            }
            else
            {
                $location = $default;
            }
        }
        return $location;
    }

    /**
     * Get all keys of an array
     * @param array $array
     * @return array
     */
    public static function getKeys($array)
    {
        return array_keys($array);
    }

    /**
     * Gets the first key of an array
     * @param array $array
     * @return mixed
     */
    public static function getFirstKey($array)
    {
        if (function_exists("\array_key_first"))
        {
            return array_key_first($array);
        }
        else
        {
            $keys = array_keys($array);
            return $keys[0];
        }
    }

    /**
     * Gets the last key of an array
     * @param array $array
     * @return mixed
     */
    public static function getLastKey($array)
    {
        if (function_exists("\array_key_last"))
        {
            return array_key_last($array);
        }
        else
        {
            $keys = array_keys($array);
            return $keys[count($keys) - 1];
        }
    }

    /**
     * Gets the first element of an array
     * @param array $array
     * @return mixed
     */
    public static function getFirst($array)
    {
        $key = static::getFirstKey($array);
        return isset($array[$key]) ? $array[$key] : null;
    }

    /**
     * Gets the last element of an array
     * @param array $array
     * @return mixed
     */
    public static function getLast($array)
    {
        $key = static::getLastKey($array);
        return isset($array[$key]) ? $array[$key] : null;
    }

    /**
     * Get a subset of an array by giving keys
     * @param array $array
     * @param array $keys
     * @return array
     */
    public static function getSubset($array, $keys)
    {
        $output = array();
        foreach ($array as $key => $item)
        {
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
    public static function getColumns($array, $columns)
    {
        foreach ($array as &$item)
        {
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
    public static function getFiltered($array, $function)
    {
        if (defined("ARRAY_FILTER_USE_BOTH"))
        {
            return array_values(array_filter($array, $function, ARRAY_FILTER_USE_BOTH));
        }
        else
        {
            $output = array();
            foreach ($array as $key => $value)
            {
                // Call the function with both key and value
                if ($function($key, $value))
                {
                    $output[$key] = $value; // Include the item in the output if the function returns true
                }
            }
            return array_values($output);
        }
    }

    /**
     * Set array items, supporting dot notation
     * @param array $array
     * @param string $path
     * @param mixed $value
     */
    public static function set(&$array, $path, $value)
    {
        $location = &$array;
        foreach (explode(".", $path) as $step)
        {
            $location = &$location[$step];
        }
        return $location = $value;
    }

    /**
     * Check if an array includes a given value
     * @param array $array
     * @param mixed $value
     * @return bool
     */
    public static function has($array, $value)
    {
        return in_array($value, $array, true);
    }

    /**
     * Checks if the given key or index exists in the array
     * @param array $array
     * @param int|string $key
     * @return bool
     */
    public static function hasKey($array, $key)
    {
        return array_key_exists($key, $array);
    }

    /**
     * An acronym to addToEnd()
     * @param array $array
     * @param mixed[] $values
     * @return array
     */
    public static function add()
    {
        $values = func_get_args();
        return call_user_func_array([__CLASS__, "addToEnd"], $values);
    }

    /**
     * Append elements into the end of an array
     * @param array $array
     * @param mixed[] $values
     * @return array
     */
    public static function addToEnd($array)
    {
        $values = func_get_args();
        array_shift($values); // Remove the first argument (the array)
        krsort($values);
        foreach ($values as $value)
        {
            array_push($array, $value);
        }
        return $array;
    }

    /**
     * Prepend elements into the start of an array
     * @param array $array
     * @param mixed[] $values
     * @return array
     */
    public static function addToStart($array)
    {
        $values = func_get_args();
        array_shift($values); // Remove the first argument (the array)
        krsort($values);
        foreach ($values as $value)
        {
            array_unshift($array, $value);
        }

        return $array;
    }

    /**
     * Drop n first element(s) of an array
     * @param array $array
     * @param int $count
     * @return array
     */
    public static function dropFromStart($array, $count = 1)
    {
        $n = min(count($array), $count);
        for ($i = 0; $i < $n; $i++)
        {
            array_shift($array);
        }
        return $array;
    }

    /**
     * Drop the forst element of an array
     * @param array $array
     * @return array
     */
    public static function dropFirst($array)
    {
        return static::dropFromStart($array, 1);
    }

    /**
     * Drop n last element(s) of an array
     * @param array $array
     * @param int $count
     * @return array
     */
    public static function dropFromEnd($array, $count = 1)
    {
        $n = min(count($array), $count);
        for ($i = 0; $i < $n; $i++)
        {
            array_pop($array);
        }
        return $array;
    }

    /**
     * Drops the last element from an array
     * @param array $array
     * @return array
     */
    public static function dropLast($array)
    {
        return static::dropFromEnd($array, 1);
    }

    /**
     * Drops an element from an array by key, supporting dot notation
     * @param array $array
     * @param mixed $key
     * @param bool $reIndex
     * @return array
     */
    public static function dropKey(
        &$array,
        $key,
        $reIndex = true
    ) {
        // Split the key into parts based on dot notation
        $keys = explode(".", $key);
        $location = &$array;

        // Traverse the array to find the location of the key
        foreach ($keys as $step)
        {
            if (isset($location[$step]))
            {
                // If we're at the last key, we unset it
                if ($step === end($keys))
                {
                    unset($location[$step]);
                }
                else
                {
                    $location = &$location[$step];
                }
            }
            else
            {
                // Key does not exist, return the original array
                return $array;
            }
        }

        // Re-index the array if required
        if ($reIndex && !static::isAssociative($array))
        {
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
        $array,
        $value,
        $reIndex = true
    ) {
        foreach ($array as $key => $itemValue)
        {
            if ($value === $itemValue)
                unset($array[$key]);
        }
        if ($reIndex && !static::isAssociative($array))
        {
            return array_values($array);
        }
        return $array;
    }

    /**
     * Applies a transform callable to all elements of an array
     * @param array $array
     * @param callable $function
     * @return array
     */
    public static function transform($array, $function)
    {
        foreach ($array as $key => $value)
        {
            [$transformedKey, $transformedValue] = $function($key, $value);
            if ($transformedKey !== $key)
            {
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
    public static function transformToUppercaseKeys($array)
    {
        if (function_exists("\array_change_key_case"))
        {
            return array_change_key_case($array, CASE_UPPER);
        }
        return static::transform($array, function ($key, $value)
        {
            if (is_string($key))
            {
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
    public static function transformToLowercaseKeys($array)
    {
        if (function_exists("\lowercaseKeys"))
        {
            return array_change_key_case($array, CASE_LOWER);
        }
        return static::transform($array, function ($key, $value)
        {
            if (is_string($key))
            {
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
    public static function transformToLowercase($array)
    {
        return static::transform($array, function ($key, $value)
        {
            if (is_string($value))
            {
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
    public static function transformToUppercase($array)
    {
        return static::transform($array, function ($key, $value)
        {
            if (is_string($value))
            {
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
    public static function transformFlip($array)
    {
        return array_flip($array);
    }

    /**
     * Checks if an array is associative
     * @param array $array
     * @return bool
     */
    public static function isAssociative($array)
    {
        $keys = static::getKeys($array);
        foreach ($keys as $key)
        {
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
    public static function isEmpty($array)
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
        $array1,
        $array2,
        $strict = false
    ) {
        if (false === $strict)
        {
            return 0 === count(array_diff($array1, $array2));
        }
        else
        {
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
        $array,
        $function
    ) {
        foreach ($array as $index => $value)
        {
            if (false === $function($index, $value))
            {
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
    public static function isString($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isString($value);
        });
    }

    /**
     * Checks if an array elements all are boolean
     * @param array $array
     * @return bool
     */
    public static function isBoolean($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isBoolean($value);
        });
    }

    /**
     * Checks if an array elements all are callable
     * @param array $array
     * @return bool
     */
    public static function isCallable($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isCallable($value);
        });
    }

    /**
     * Checks if an array elements all are countable
     * @param array $array
     * @return bool
     */
    public static function isCountable($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isCountable($value);
        });
    }

    /**
     * Checks if an array elements all are iterable
     * @param array $array
     * @return bool
     */
    public static function isIterable($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isIterable($value);
        });
    }

    /**
     * Checks if an array elements all are numeric
     * @param array $array
     * @return bool
     */
    public static function isNumeric($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isNumeric($value);
        });
    }

    /**
     * Checks if an array elements all are scalar
     * @param array $array
     * @return bool
     */
    public static function isScalar($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isScalar($value);
        });
    }

    /**
     * Checks if an array elements all are float
     * @param array $array
     * @return bool
     */
    public static function isFloat($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isFloat($value);
        });
    }

    /**
     * Checks if an array elements all are null
     * @param array $array
     * @return bool
     */
    public static function isNull($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return null === $value;
        });
    }

    /**
     * Checks if an array elements all are object
     * @param array $array
     * @return bool
     */
    public static function isObject($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isObject($value);
        });
    }

    /**
     * Checks if an array elements all are array
     * @param array $array
     * @return bool
     */
    public static function isArray($array)
    {
        return static::isEligibleTo($array, function ($index, $value)
        {
            return TypesUtility::isArray($value);
        });
    }

    /**
     * Checks if an array elements all are of given class
     * @param array $array
     * @return bool
     */
    public static function isInstanceOf($array, $class)
    {
        foreach ($array as $item)
        {
            if (!$item instanceof $class)
                return false;
        }
        return true;
    }

    /**
     * Get total number of elements inside an array
     * @param array $array
     * @return int
     */
    public static function estimateSize($array)
    {
        $size = 0;
        foreach ($array as $value)
        {
            if (true === is_array($value))
            {
                $size += static::estimateSize($value);
            }
            else
            {
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
    public static function estimateCounts($array)
    {
        $output = array();
        foreach ($array as $value)
        {
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
    public static function estimateSum($array)
    {
        return array_sum($array);
    }

    /**
     * Merge one or more arrays
     * @param array[] $arrays
     * @return array
     */
    public static function merge()
    {
        $arrays = func_get_args();
        return call_user_func_array("array_merge", $arrays);
    }

    /**
     * Merge one or more arrays recursively
     * @param array[] $arrays
     * @return array
     */
    public static function mergeInDepth()
    {
        $arrays = func_get_args();
        return call_user_func_array("array_merge_recursive", $arrays);
    }

    /**
     * Split an array into chunks
     * @param array $array
     * @param int $size
     * @param bool $isAssoc
     * @return array
     */
    public static function split(
        $array,
        $size,
        $isAssoc = false
    ) {
        return array_chunk($array, $size, $isAssoc);
    }

    /**
     * Sort elements of an array
     * @param array $array
     * @param mixed $sortByKeys
     * @param mixed $descending
     * @param mixed $isAssoc
     * @return array
     */
    public static function sort(
        $array,
        $sortByKeys = false,
        $descending = false,
        $isAssoc = false
    ) {
        if (true === $sortByKeys)
        {
            if (true === $descending)
            {
                krsort($array);
            }
            else
            {
                ksort($array);
            }
        }
        else
        {
            if (true === $descending)
            {
                if (true === $isAssoc)
                {
                    arsort($array);
                }
                else
                {
                    rsort($array);
                }
            }
            else
            {
                if (true === $isAssoc)
                {
                    asort($array);
                }
                else
                {
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
    public static function sortRandom($array)
    {
        shuffle($array);
        return $array;
    }
}