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
 * Class TypesUtility
 * 
 * A utility class for type checking and conversion.
 * 
 */
class TypesUtility
{
    /**
     * Get the type of a variable.
     *
     * @param mixed $value The variable to check.
     * @return string The type of the variable.
     */
    public static function getType($value)
    {
        return StringUtility::transformToLowercase(gettype($value));
    }

    /**
     * Check if the variable is an array.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is an array, false otherwise.
     */
    public static function isArray($value)
    {
        return is_array($value); // Since PHP 4.0
    }

    /**
     * Check if the variable is not an array.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not an array, false otherwise.
     * @since 1.1.0
     */
    public static function isNotArray($value)
    {
        return BooleanUtility::not(static::isArray($value));
    }

    /**
     * Check if the variable is a boolean.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is a boolean, false otherwise.
     */
    public static function isBoolean($value)
    {
        return is_bool($value); // Since PHP 4.0
    }

    /**
     * Check if the variable is not a boolean.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not a boolean, false otherwise.
     * @since 1.1.0
     */
    public static function isNotBoolean($value)
    {
        return BooleanUtility::not(static::isBoolean($value));
    }

    /**
     * Check if the variable is callable.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is callable, false otherwise.
     */
    public static function isCallable($value)
    {
        return is_callable($value); // Since PHP 4.0.6
    }

    /**
     * Check if the variable is not callable.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not callable, false otherwise.
     * @since 1.1.0
     */
    public static function isNotCallable($value)
    {
        return BooleanUtility::not(static::isCallable($value));
    }

    /**
     * Check if the variable is countable.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is countable, false otherwise.
     */
    public static function isCountable($value)
    {
        if (function_exists("is_countable"))
        {
            return is_countable($value); // Since PHP 7.3.0
        }
        else
        {
            if (is_array($value))
            {
                return true;
            }
            if (is_object($value))
            {
                return method_exists($value, 'count');
            }
            return false;
        }
    }

    /**
     * Check if the variable is not countable.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is mot countable, false otherwise.
     * @since 1.1.0
     */
    public static function isNotCountable($value)
    {
        return BooleanUtility::not(static::isCountable($value));
    }

    /**
     * Check if the variable is a float.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is a float, false otherwise.
     */
    public static function isFloat($value)
    {
        return is_float($value); // Since PHP 4.0
    }

    /**
     * Check if the variable is not a float.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not a float, false otherwise.
     * @since 1.1.0
     */
    public static function isNotFloat($value)
    {
        return BooleanUtility::not(static::isFloat($value));
    }

    /**
     * Check if the variable is an integer.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is an integer, false otherwise.
     */
    public static function isInteger($value)
    {
        return is_int($value); // Since PHP 4.0
    }

    /**
     * Check if the variable is not an integer.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not an integer, false otherwise.
     * @since 1.1.0
     */
    public static function isNotInteger($value)
    {
        return BooleanUtility::not(static::isInteger($value));
    }

    /**
     * Check if the variable is iterable.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is iterable, false otherwise.
     */
    public static function isIterable($value)
    {
        if (function_exists("is_iterable"))
        {
            return is_iterable($value); // Since PHP 7.1.0
        }
        else
        {
            if (is_array($value))
            {
                return true;
            }
            if (is_object($value))
            {
                return method_exists($value, 'rewind') &&
                    method_exists($value, 'current') &&
                    method_exists($value, 'key') &&
                    method_exists($value, 'next') &&
                    method_exists($value, 'valid');
            }
            return false;
        }
    }

    /**
     * Check if the variable is not iterable.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not iterable, false otherwise.
     * @since 1.1.0
     */
    public static function isNotIterable($value)
    {
        return BooleanUtility::not(static::isIterable($value));
    }

    /**
     * Check if the variable is null.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is null, false otherwise.
     */
    public static function isNull($value)
    {
        return is_null($value); // Since PHP 4.0.4
    }

        /**
     * Check if the variable is not null.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not null, false otherwise.
     * @since 1.1.0
     */
    public static function isNotNull($value)
    {
        return BooleanUtility::not(static::isNull($value));
    }

    /**
     * Check if the variable is numeric.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is numeric, false otherwise.
     */
    public static function isNumeric($value)
    {
        return is_numeric($value); // Since PHP 4.0.0
    }

    /**
     * Check if the variable is not numeric.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not numeric, false otherwise.
     * @since 1.1.0
     */
    public static function isNotNumeric($value)
    {
        return BooleanUtility::not(static::isNumeric($value));
    }

    /**
     * Check if the variable is an object.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is an object, false otherwise.
     */
    public static function isObject($value)
    {
        return is_object($value); // Since PHP 4.0.0
    }

    /**
     * Check if the variable is not an object.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not an object, false otherwise.
     * @since 1.1.0
     */
    public static function isNotObject($value)
    {
        return BooleanUtility::not(static::isObject($value));
    }

    /**
     * Check if the variable is a resource.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is a resource, false otherwise.
     */
    public static function isResource($value)
    {
        return is_resource($value); // Since PHP 4.0.0
    }

    /**
     * Check if the variable is not a resource.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not a resource, false otherwise.
     * @since 1.1.0
     */
    public static function isNotResource($value)
    {
        return BooleanUtility::not(static::isResource($value));
    }

    /**
     * Check if the variable is a scalar.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is a scalar, false otherwise.
     */
    public static function isScalar($value)
    {
        return is_scalar($value); // Since PHP 4.0.5
    }

    /**
     * Check if the variable is not a scalar.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is not a scalar, false otherwise.
     * @since 1.1.0
     */
    public static function isNotScalar($value)
    {
        return BooleanUtility::not(static::isScalar($value));
    }

    /**
     * Check if the variable is a string.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is a string, false otherwise.
     */
    public static function isString($value)
    {
        return is_string($value); // Since PHP 4.0.0
    }

    /**
     * Check if the variable is not a string.
     *
     * @param mixed $value The variable to check.
     * @return bool True if the variable is a string, false otherwise.
     * @since 1.1.0
     */
    public static function isNotString($value)
    {
        return BooleanUtility::not(static::isString($value));
    }

    /**
     * Convert a variable to a specified target type.
     *
     * @param mixed $variable The variable to convert.
     * @param string $targetType The target type to convert to (string, int, float, bool, array, object).
     * @return mixed The converted variable.
     */
    public static function to($variable, $targetType)
    {
        $currentType = StringUtility::transformToLowercase(static::getType($variable));
        switch (StringUtility::transformToLowercase($targetType))
        {
            case "string":
                switch ($currentType)
                {
                    case "int":
                    case "long":
                    case "integer":
                    case "float":
                    case "double":
                        return (string) $variable;
                    case "bool":
                    case "boolean":
                        return true === $variable ? "true" : "false";
                    case "array":
                        return json_encode($variable);
                    case "object":
                        if (method_exists($variable, "toString"))
                            return $variable->toString();
                        return json_encode((array) $variable);
                    default:
                        return $variable;
                }
            case "int":
            case "long":
            case "integer":
                switch ($currentType)
                {
                    case "string":
                    case "float":
                    case "double":
                        return (int) $variable;
                    case "bool":
                    case "boolean":
                        return true === $variable ? 1 : 0;
                    default:
                        return $variable;
                }
            case "float":
            case "double":
                switch ($currentType)
                {
                    case "string":
                    case "int":
                    case "integer":
                    case "long":
                        return (float) $variable;
                    case "bool":
                    case "boolean":
                        return true === $variable ? 1.0 : 0.0;
                    default:
                        return $variable;
                }
            case "bool":
            case "boolean":
                switch ($currentType)
                {
                    case "string":
                        return "" === $variable ? false : true;
                    case "int":
                    case "integer":
                    case "long":
                    case "float":
                    case "double":
                        return 0 === $variable ? false : true;
                    default:
                        return $variable;
                }
            case "array":
                switch ($currentType)
                {
                    case "int":
                    case "long":
                    case "integer":
                    case "float":
                    case "double":
                    case "bool":
                    case "boolean":
                    case "string":
                        return [$variable];
                    case "object":
                        if (method_exists($variable, "toArray"))
                            return $variable->toArray();
                        return (array) $variable;
                    default:
                        return $variable;
                }
            case "object":
                return (object) static::to($variable, "array");
            default:
                return $variable;
        }
    }

    /**
     * Convert a variable to a string.
     *
     * @param mixed $variable The variable to convert.
     * @return string The converted string.
     */
    public static function toString($variable)
    {
        return static::to($variable, "string");
    }

    /**
     * Convert a variable to an integer.
     *
     * @param mixed $variable The variable to convert.
     * @return int The converted integer.
     */
    public static function toInteger($variable)
    {
        return static::to($variable, "int");
    }

    /**
     * Convert a variable to a float.
     *
     * @param mixed $variable The variable to convert.
     * @return float The converted float.
     */
    public static function toFloat($variable)
    {
        return static::to($variable, "float");
    }

    /**
     * Convert a variable to a boolean.
     *
     * @param mixed $variable The variable to convert.
     * @return bool The converted boolean.
     */
    public static function toBoolean($variable)
    {
        return static::to($variable, "bool");
    }

    /**
     * Convert a variable to an array.
     *
     * @param mixed $variable The variable to convert.
     * @return array The converted array.
     */
    public static function toArray($variable)
    {
        return static::to($variable, "array");
    }

    /**
     * Convert a variable to an object.
     *
     * @param mixed $variable The variable to convert.
     * @return object The converted object.
     */
    public static function toObject($variable)
    {
        return static::to($variable, "object");
    }
}