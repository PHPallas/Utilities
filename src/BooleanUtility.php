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
 * Class BooleanUtility
 *
 * A utility class providing methods for boolean manipulations, including 
 * a set of immutable constants for commonly used boolean values.
 */
class BooleanUtility
{
    /**
     * Represents the boolean value true.
     */
    const TRUE = true;

    /**
     * Represents the boolean value false.
     */
    const FALSE = false;

    /**
     * Terms that will be considered as false
     */
    const FALSE_TERMS = [
        "off",
        "no",
        "false",
        "nok",
    ];

    /**
     * Terms that will be considered true
     */
    const TRUE_TERMS = [
        "on",
        "yes",
        "true",
        "ok",
    ];

    /**
     * Default boolean value when converting strings to boolean
     */
    const DEFAULT_BOOL = false;

    /**
     * Converts a string to a boolean value.
     *
     * This method interprets specific string values as true or false.
     * Recognized true values include: "true", "1", "yes", "on".
     * Recognized false values include: "false", "0", "no", "off".
     *
     * @param string $string The input string to convert.
     * @return bool The boolean value represented by the string.
     */
    public static function fromString($string)
    {
        if (
            ArrayUtility::has(
                static::TRUE_TERMS,
                StringUtility::transformToLowercase($string)
            )
        )
        {
            return static::TRUE;
        }
        if (
            ArrayUtility::has(
                static::FALSE_TERMS,
                StringUtility::transformToLowercase($string)
            )
        )
        {
            return static::FALSE;
        }

        return self::DEFAULT_BOOL;
        ; // Return null for unrecognized strings
    }

    /**
     * Converts a boolean value to its string representation.
     *
     * This method returns "true" or "false" based on the boolean value.
     *
     * @param bool $boolean The boolean value to convert.
     * @return string "true" or "false" based on the boolean value.
     */
    public static function toString($boolean)
    {
        return $boolean ? 'true' : 'false'; // Return string representation
    }

    /**
     * Checks if two boolean values are equal.
     *
     * @param bool $boolean1 The first boolean to compare.
     * @param bool $boolean2 The second boolean to compare.
     * @return bool Returns true if both booleans are equal, false otherwise.
     */
    public static function areEqual($boolean1, $boolean2)
    {
        if (
            TypesUtility::isBoolean($boolean1)
            &&
            TypesUtility::isBoolean($boolean2)
        )
        {
            return $boolean1 === $boolean2; // Strict comparison
        }
        else {
            static::throwError();
        }
        return static::FALSE;
    }

    /**
     * Checks if a boolean is TRUE.
     *
     * @param bool $boolean The boolean to check.
     * @return bool Returns true if both booleans are equal, false otherwise.
     */
    public static function isTrue($boolean)
    {
        return static::areEqual($boolean, static::TRUE); // Strict comparison
    }

    /**
     * Checks if a boolean is FALSE.
     *
     * @param bool $boolean The boolean to check.
     * @return bool Returns true if both booleans are equal, false otherwise.
     */
    public static function isFalse($boolean)
    {
        return static::areEqual($boolean, static::FALSE); // Strict comparison
    }

    /**
     * Negates a boolean value.
     *
     * This method returns the opposite of the provided boolean value.
     *
     * @param bool $boolean The boolean value to negate.
     * @return bool The negated boolean value.
     */
    public static function not($boolean)
    {
        return !$boolean; // Return the negation of the boolean
    }

    /**
     * Performs a logical NOT operation on an array of boolean values or a variable number of boolean arguments.
     *
     * This function negates each boolean value in the input array or the provided arguments and returns an array of the results.
     *
     * @param mixed $booleans Either an array of boolean values or a list of boolean arguments.
     * @return array An array containing the negated boolean values.
     *
     * @throws \InvalidArgumentException If the input is neither an array nor boolean values.
     */
    public static function gnot($booleans)
    {
        if (TypesUtility::isArray($booleans))
        {
            $values = $booleans;
        }
        else
        {
            $values = func_get_args();
        }
        $result = $values;
        foreach ($result as &$entry)
        {
            if (TypesUtility::isBoolean($entry))
            {
                $entry = static::not($entry);
            }
            else
            {
                static::throwError();
            }
        }
        return $result;
    }

    /**
     * Performs a logical AND operation on two boolean values.
     *
     * @param bool $boolean1 The first boolean value.
     * @param bool $boolean2 The second boolean value.
     * @return bool The result of the logical AND operation.
     */
    public static function and($boolean1, $boolean2)
    {
        return $boolean1 && $boolean2; // Return the result of AND operation
    }

    /**
     * Performs a logical AND operation on an array of boolean values or a variable number of boolean arguments.
     *
     * @param mixed $booleans Either an array of boolean values or a list of boolean arguments.
     * @return bool The result of the logical AND operation.
     *
     * @throws \InvalidArgumentException If the input is neither an array nor boolean values.
     */
    public static function gand($booleans)
    {
        if (TypesUtility::isArray($booleans))
        {
            $values = $booleans;
        }
        else
        {
            $values = func_get_args();
        }
        $result = static::TRUE;
        foreach ($values as $boolean)
        {
            if (TypesUtility::isBoolean($boolean))
            {
                $result = static::and($result, $boolean);
            }
            else
            {
                static::throwError();
            }
        }
        return $result;
    }

    /**
     * Performs a logical NAND operation on two boolean values.
     *
     * @param bool $boolean1 The first boolean value.
     * @param bool $boolean2 The second boolean value.
     * @return bool The result of the logical NAND operation.
     */
    public static function nand($boolean1, $boolean2)
    {
        return static::not(static::and($boolean1, $boolean2)); // Return the negation of AND
    }

    /**
     * Performs a logical NAND operation on an array of boolean values or a variable number of boolean arguments.
     *
     * @param mixed $booleans Either an array of boolean values or a list of boolean arguments.
     * @return bool The result of the logical NAND operation.
     *
     * @throws \InvalidArgumentException If the input is neither an array nor boolean values.
     */
    public static function gnand($booleans)
    {
        if (TypesUtility::isArray($booleans))
        {
            $values = $booleans;
        }
        else
        {
            $values = func_get_args();
        }
        return static::not(static::gand($values));
    }

    /**
     * Performs a logical OR operation on two boolean values.
     *
     * @param bool $boolean1 The first boolean value.
     * @param bool $boolean2 The second boolean value.
     * @return bool The result of the logical OR operation.
     */
    public static function or($boolean1, $boolean2)
    {
        return $boolean1 || $boolean2; // Return the result of OR operation
    }

    /**
     * Performs a logical OR operation on an array of boolean values or a variable number of boolean arguments.
     *
     * @param mixed $booleans Either an array of boolean values or a list of boolean arguments.
     * @return bool The result of the logical OR operation.
     *
     * @throws \InvalidArgumentException If the input is neither an array nor boolean values.
     */
    public static function gor($booleans)
    {
        if (TypesUtility::isArray($booleans))
        {
            $values = $booleans;
        }
        else
        {
            $values = func_get_args();
        }
        $result = false; // Start with false for OR
        foreach ($values as $boolean)
        {
            if (TypesUtility::isBoolean($boolean))
            {
                $result = static::or($result, $boolean);
                if (BooleanUtility::isTrue($result))
                { // for better performance
                    return static::TRUE;
                }
            }
            else
            {
                static::throwError();
            }
        }
        return $result;
    }

    /**
     * Performs a logical NOR operation on two boolean values.
     *
     * @param bool $boolean1 The first boolean value.
     * @param bool $boolean2 The second boolean value.
     * @return bool The result of the logical NOR operation.
     */
    public static function nor($boolean1, $boolean2)
    {
        return static::not(self::or($boolean1, $boolean2)); // Return the negation of OR
    }

    /**
     * Performs a logical NOR operation on an array of boolean values or a variable number of boolean arguments.
     *
     * @param mixed $booleans Either an array of boolean values or a list of boolean arguments.
     * @return bool The result of the logical NOR operation.
     *
     * @throws \InvalidArgumentException If the input is neither an array nor boolean values.
     */
    public static function gnor($booleans)
    {
        if (TypesUtility::isArray($booleans))
        {
            $values = $booleans;
        }
        else
        {
            $values = func_get_args();
        }
        return static::not(static::gor($values));
    }

    /**
     * Performs a logical XOR operation on two boolean values.
     *
     * @param bool $boolean1 The first boolean value.
     * @param bool $boolean2 The second boolean value.
     * @return bool The result of the logical XOR operation.
     */
    public static function xor($boolean1, $boolean2)
    {
        return $boolean1 xor $boolean2; // Return the result of XOR operation
    }

    /**
     * Performs a logical XOR operation on an array of boolean values or a variable number of boolean arguments.
     *
     * @param mixed $booleans Either an array of boolean values or a list of boolean arguments.
     * @return bool The result of the logical XOR operation.
     *
     * @throws \InvalidArgumentException If the input is neither an array nor boolean values.
     */
    public static function gxor($booleans)
    {
        if (TypesUtility::isArray($booleans))
        {
            $values = $booleans;
        }
        else
        {
            $values = func_get_args();
        }
        $result = false; // Start with false for XOR
        foreach ($values as $boolean)
        {
            if (TypesUtility::isBoolean($boolean))
            {
                if (BooleanUtility::isFalse($result))
                {
                    $result = static::or($result, $boolean);
                }
                else
                {
                    if (BooleanUtility::isTrue($boolean))
                    {
                        return static::FALSE;
                    }
                }
            }
            else
            {
                static::throwError();
            }
        }
        return $result;
    }

    /**
     * Performs a logical XNOR operation on two boolean values.
     *
     * @param bool $boolean1 The first boolean value.
     * @param bool $boolean2 The second boolean value.
     * @return bool The result of the logical XNOR operation.
     */
    public static function xnor($boolean1, $boolean2)
    {
        return static::not(static::xor($boolean1, $boolean2)); // Return true if both are equal
    }

    /**
     * Performs a logical XNOR operation on an array of boolean values or a variable number of boolean arguments.
     *
     * @param mixed $booleans Either an array of boolean values or a list of boolean arguments.
     * @return bool The result of the logical XNOR operation.
     *
     * @throws \InvalidArgumentException If the input is neither an array nor boolean values.
     */
    public static function gxnor($booleans)
    {
        if (TypesUtility::isArray($booleans))
        {
            $values = $booleans;
        }
        else
        {
            $values = func_get_args();
        }
        return static::not(static::gxor($values)); // Return the negation for XNOR
    }

    /**
     * Alias for xnor
     */
    public static function nxor($boolean1, $boolean2)
    {
        return static::xnor($boolean1, $boolean2);
    }

    /**
     * Alias for xnor
     */
    public static function xand($boolean1, $boolean2)
    {
        return static::xnor($boolean1, $boolean2);
    }

    /**
     * Alias for gxnor
     */
    public static function gnxor($booleans)
    {
        return static::gxnor($booleans);
    }

    /**
     * Alias for gxnor
     */

    public static function gxand($boolean)
    {
        return static::gxnor($boolean);
    }

    private static function throwError()
    {
        throw new \InvalidArgumentException("Invalid Argument");
    }
}