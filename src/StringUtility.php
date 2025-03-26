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

class StringUtility
{

    public static $EMPTY = "";
    public static $SPACE = " ";
    public static $DOUBLE_SPACE = "  ";
    public static $TAB = "\t";
    public static $NEW_LINE = "\n";

    # --------------------------------------------------------------------------
    # Creational Methods
    # --------------------------------------------------------------------------
    #   Use this methods to create a string.
    #
    #   Contributing Roles:
    #   [1]. All creational methods MUST starts in `create` and follow a 
    #        camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Creates and string by repeating a character
     * @param $character
     * @param $length
     * @return string
     */
    public static function create($character, $length)
    {
        return static::setInEnd(static::$EMPTY, $character, $length);
    }

    /**
     * Generate a random string by given length
     * @param $length
     * @return string
     */
    public static function createRandom(
        $length = 8,
        $characters = "abcdefghijklmnopqrstuvwxyz"
    ) {
        $charactersLength = Polyfill::mb_strlen($characters);
        $characters = Polyfill::mb_split('//u',$characters,"utf-8");
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            while (empty($char)) {
                $char = $characters[MathUtility::createRandomInteger(0, $charactersLength - 1)];
            }
            $randomString .= $char;
        }
        return $randomString;
    }

    /**
     * Creates an string by repeating an string for given times
     * @param $string
     * @param $times
     * @return string
     */
    public static function createByRepeat($string, $times)
    {
        return str_repeat($string, $times);
    }

    # --------------------------------------------------------------------------
    # Get Methods
    # --------------------------------------------------------------------------
    #   Use this methods to get sub-strings
    #
    #   Contributing Roles:
    #   [1]. All get methods MUST starts in get and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Get a character from a string by index
     * @param $string
     * @param $index
     * @return string
     */
    public static function get($string, $index)
    {
        $array = StringUtility::split($string, 1);
        return isset($array[$index]) ? $array[$index] : "";
    }

    /**
     * Get a subset of a string by index and length
     * @param $string
     * @param $startIndex
     * @param $length
     * @return string
     */
    public static function getSubset($string, $startIndex, $length, $encoding = 'UTF-8')
    {
        if (function_exists("mb_substr")) {
            return mb_substr($string, $startIndex, $length);
        }
        if ($string === '') {
            return '';
        }
        $stringLength = mb_strlen($string, $encoding);
        if ($startIndex < 0) {
            $start = max(0, $stringLength + $startIndex);
        }
        if ($length === null) {
            return substr($string, $start);
        }
        if ($length < 0) {
            $length = max(0, $stringLength - $start);
        }
        $result = '';
        $currentIndex = 0;
        for ($i = 0; $i < $stringLength; $i++) {
            $char = static::getSubset($string, $i, 1, $encoding);
            if ($i >= $start && $currentIndex < $length) {
                $result .= $char;
                $currentIndex++;
            }
            if ($currentIndex >= $length) {
                break;
            }
        }
        return $result;
    }

    /**
     * Get a segment of a string by start and end indices
     * @param $string
     * @param $startIndex
     * @param $endIndex
     * @return string
     */
    public static function getSegment($string, $startIndex, $endIndex)
    {
        $length = $endIndex - $startIndex;
        return static::getSubset($string, $startIndex, $length);
    }

    # --------------------------------------------------------------------------
    # Set Methods
    # --------------------------------------------------------------------------
    #   Use this methods to set sub-strings
    #
    #   Contributing Roles:
    #   [1]. All set methods MUST starts in set and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Set a character into a string using index
     * @param $string
     * @param $index
     * @param $value
     * @return string
     */
    public static function set($string, $index, $value)
    {
        $array = StringUtility::split($string, 1);
        $array[$index] = $value;
        return StringUtility::fromArray($array);
    }

    /**
     * Replaces sub-strings with new values
     * @param $string
     * @param array|$from
     * @param array|$to
     * @param $caseSensitive
     * @return array|string
     */
    public static function setReplace($string, $needle, $replace, $caseSensitive = false)
    {
        if (true === $caseSensitive) {
            return str_ireplace($needle, $replace, $string);
        }
        return str_replace($needle, $replace, $string);
    }

    /**
     * Fill start of an string
     * @param $string
     * @param $character
     * @param $length
     * @return string
     */
    public static function setInStart($string, $character, $length)
    {
        return Polyfill::mb_str_pad($string, $length, $character, STR_PAD_LEFT);
    }

    /**
     * Fill end of a string
     * @param $string
     * @param $character
     * @param $length
     * @return string
     */
    public static function setInEnd($string, $character, $length)
    {
        return Polyfill::mb_str_pad($string, $length, $character, STR_PAD_RIGHT);
    }

    # --------------------------------------------------------------------------
    # Has Methods
    # --------------------------------------------------------------------------
    #   Use this methods to check existence of characters and sub-strings
    #
    #   Contributing Roles:
    #   [1]. All check methods MUST starts in has and follow a 
    #       camelCase naming standard.
    #   [2]. All Has methods must return a boolean value
    # --------------------------------------------------------------------------

    public static function hasPhrase(
        $string,
        $needle,
        $caseSensitive = true
    ) {
        if (false === $caseSensitive) {
            return str_contains(
                static::transformToLowercase($string),
                static::transformToLowercase($needle)
            );
        }
        return str_contains($string, $needle);
    }

    # --------------------------------------------------------------------------
    # Add Methods
    # --------------------------------------------------------------------------
    #   Use this methods to add new sub-strings to strings
    #
    #   Contributing Roles:
    #   [1]. All creational methods MUST starts in get and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Prepend a value into the start of a string
     * @param $string
     * @param $value
     * @return string
     */
    public static function addToStart($string, $value)
    {
        return "$value$string";
    }

    /**
     * append a value into the end of a string
     * @param $string
     * @param $value
     * @return string
     */
    public static function addToEnd($string, $value)
    {
        return "$string$value";
    }

    /**
     * Add a value into the center of another string
     * @param $string
     * @param $value
     * @return string
     */
    public static function addToCenter($string, $value)
    {
        $middle = Polyfill::mb_strlen($string) / 2;
        $firstPart = Polyfill::mb_substr($string, 0, floor($middle));
        $secondPart = static::setReplace(   $string, [$firstPart], [""]);
        return $firstPart . $value . $secondPart;
    }
    public static function addEvenly($string, $value, $size)
    {
        $stringLength = Polyfill::mb_strlen($string);
        $numInsertions = floor($stringLength / $size);
        $result = '';
        for ($i = 0; $i < $stringLength; $i++) {
            $result .= Polyfill::mb_substr($string, $i, 1);
            if (($i + 1) % $size == 0 && $numInsertions > 0) {
                $result .= $value;
                $numInsertions--;
            }
        }
        return Polyfill::mb_trim($result, $value);
    }

    # --------------------------------------------------------------------------
    # Drop Methods
    # --------------------------------------------------------------------------
    #   Use this methods to drop sub-strings from the string
    #
    #   Contributing Roles:
    #   [1]. All drop methods MUST starts in drop and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Drops characters from string
     * @param $string
     * @param $characters
     * @return string
     */
    public static function drop($string, $characters = " \n\r\t\v\x00")
    {
        return static::setReplace($string, [$characters], [""]);
    }

    public static function dropFirst($string)
    {
        return static::fromArray(
            ArrayUtility::dropFirst(
                static::toArray($string)
            ),
            ""
        );
    }

    public static function dropLast($string)
    {
        return static::fromArray(
            ArrayUtility::dropLast(
                static::toArray($string)
            )
        );
    }

    public static function dropNth($string, $index)
    {
        return static::fromArray(
            ArrayUtility::dropKey(
                static::toArray($string),
                $index,
                false
            )
        );
    }

    /**
     * Drops characters from start and end of a string
     * @param $string
     * @param $characters
     * @return string
     */
    public static function dropFromSides($string, $characters = " \n\r\t\v\x00")
    {
        return trim($string, $characters);
    }

    /**
     * Drops characters from start of a string
     * @param $string
     * @param $characters
     * @return string
     */
    public static function dropFromStart($string, $characters = " \n\r\t\v\x00")
    {
        return ltrim($string, $characters);
    }

    /**
     * Drops characters from end of a string
     * @param $string
     * @param $characters
     * @return string
     */
    public static function dropFromEnd($string, $characters = " \n\r\t\v\x00")
    {
        return rtrim($string, $characters);
    }

    /**
     * Drop - and _ from string
     * @param $string
     * @return array|string
     */
    public static function dropSeparator($string)
    {
        return static::setReplace($string, ["-", "_"], "");
    }

    /**
     * Frop space from string
     * @param $string
     * @return array|string
     */
    public static function dropSpace($string)
    {
        return static::setReplace($string, " ", "");
    }

    # --------------------------------------------------------------------------
    # Transform Methods
    # --------------------------------------------------------------------------
    #   Use this methods to transform sub-strings of a string
    #
    #   Contributing Roles:
    #   [1]. All transform methods MUST starts in transform and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Reverse a string
     * @param $string
     * @return string
     */
    public static function transformToReverse($string)
    {
        return Polyfill::mb_strrev($string);
    }

    /**
     * Shuffelize a string
     * @param $string
     * @return string
     */
    public static function transformToShuffle($string)
    {
        return Polyfill::mb_str_shuffle($string);
    }

    /**
     * Remove all Html & PHP tags from string
     * @param $string
     * @param array|string|null $allowedTags
     * @return string
     */
    public static function transformToNoTag($string, $allowedTags = null)
    {
        return strip_tags($string, $allowedTags);
    }

    /**
     * Transform a string to lowercase
     * @param $string
     * @return string
     */
    public static function transformToLowercase($string, $removeSeparators = false, $dropSpace = false)
    {
        if ($removeSeparators) {
            $string = static::dropSeparator($string);
        }
        if ($dropSpace) {
            $string = static::dropSpace($string);
        }
        return strtolower($string);
    }

    /**
     * Transform a string to uppercase
     * @param $string
     * @return string
     */
    public static function transformToUppercase($string, $removeSeparators = false, $removeSpace = false)
    {
        if ($removeSeparators) {
            $string = static::dropSeparator($string);
        }
        if ($removeSpace) {
            $string = static::dropSpace($string);
        }
        return strtoupper($string);
    }

    /**
     * Transform the first character of a string into lowercase
     * @param $string
     * @param $removeSeparators
     * @param $removeSpace
     * @return string
     */
    public static function transformToLowercaseFirst($string, $removeSeparators = false, $removeSpace = false)
    {
        if ($removeSeparators) {
            $string = static::dropSeparator($string);
        }
        if ($removeSpace) {
            $string = static::dropSpace($string);
        }
        return lcfirst($string);
    }

    /**
     * Transform the first character of a string into uppercase
     * @param $string
     * @param $removeSeparators
     * @param $removeSpace
     * @return string
     */
    public static function transformToUppercaseFirst($string, $removeSeparators = false, $removeSpace = false)
    {
        if ($removeSeparators) {
            $string = static::dropSeparator($string);
        }
        if ($removeSpace) {
            $string = static::dropSpace($string);
        }
        return ucfirst($string);
    }

    /**
     * Transform a string to flatcase
     * @param $string
     * @return string
     */
    public static function transformToFlatcase($string)
    {
        $string = static::setReplace($string, ["-", "_"], " ");
        $string = explode(" ", $string);
        foreach ($string as &$word) {
            $word = static::transformToLowercase($word);
        }
        $string = implode("", $string);
        return $string;
    }

    /**
     * Transform a string to PascalCase
     * @param $string
     * @return array|string
     */
    public static function transformToPascalCase($string)
    {
        $string = static::setReplace($string, ["-", "_"], " ");
        $string = explode(" ", $string);
        foreach ($string as &$word) {
            $word = static::transformToLowercase($word, false, false);
            $word = ucfirst($word);
        }
        $string = implode("", $string);
        return $string;
    }

    /**
     * Transform a string to camelCase
     * @param $string
     * @return string
     */
    public static function transformToCamelcase($string)
    {
        return static::transformToLowercaseFirst(static::transformToPascalCase($string));
    }

    /**
     * Transform a string to snake_case
     * @param $string
     * @return string
     */
    public static function transformToSnakecase($string)
    {
        $string = static::setReplace($string, ["-", "_"], " ");
        $string = explode(" ", $string);
        foreach ($string as &$word) {
            $word = static::transformToLowercase($word, false, false);
        }
        $string = implode("_", $string);
        return $string;
    }

    /**
     * Transform a string to MACRO_CASE
     * @param $string
     * @return string
     */
    public static function transformToMacrocase($string)
    {
        return static::transformToUppercase(static::transformToSnakecase($string));
    }

    /**
     * Transform a string to the Pascal_Snake_Case
     * @param $string
     * @return string
     */
    public static function transformToPascalSnakecase($string)
    {
        $string = static::setReplace($string, ["-", "_"], " ");
        $string = explode(" ", $string);
        foreach ($string as &$word) {
            $word = static::transformToLowercase($word, false, false);
            $word = ucfirst($word);
        }
        $string = implode("_", $string);
        return $string;
    }

    /**
     * Transform string to snake_Camel_Case
     * @param $string
     * @return string
     */
    public static function transformToCamelSnakecase($string)
    {
        return static::transformToLowercaseFirst(static::transformToPascalSnakecase($string));
    }

    /**
     * Transform string to kebaba-case
     * @param $string
     * @return array|string
     */
    public static function transformToKebabcase($string)
    {
        return static::setReplace(static::transformToSnakecase($string), "_", "-");
    }

    /**
     * Transform String to COBOL-CASE
     * @param $string
     * @return string
     */
    public static function transformToCobolcase($string)
    {
        return static::transformToUppercase(static::transformToKebabcase($string));
    }

    /**
     * Transform string to Pascal-Snake-Case
     * @param $string
     * @return array|string
     */
    public static function transformToTraincase($string)
    {
        return static::setReplace(static::transformToPascalSnakecase($string), "_", "-");
    }

    /**
     * Transform string To Metaphone
     * @param $string
     * @return string
     */
    public static function transformToMetaphone($string)
    {
        return metaphone($string, 0);
    }

    /**
     * Transform string to soundex
     * @param $string
     * @return string
     */
    public static function transformToSoundex($string)
    {
        return soundex($string);
    }

    # --------------------------------------------------------------------------
    # Is Methods
    # --------------------------------------------------------------------------
    #   Use this methods to evaluate sub-strings
    #
    #   Contributing Roles:
    #   [1]. All Is methods MUST starts in `is` and follow a 
    #       camelCase naming standard.
    #   [2]. All Is methods must return a boolean value
    # --------------------------------------------------------------------------

    /**
     * Checks if two string are equal
     * @param $string1
     * @param $string2
     * @return bool
     */
    public static function isEqualTo($string1, $string2)
    {
        return $string1 === $string2;
    }

    /**
     * Checks if two string are equal (case insentive)
     * @param $string1
     * @param $string2
     * @return bool
     */
    public static function isSameAs($string1, $string2)
    {
        return static::isEqualTo(
            static::transformToLowercase($string1),
            static::transformToLowercase($string2)
        );
    }

    /**
     * Checks if a string starts by another string
     * @param $string
     * @param $starting
     * @return bool
     */
    public static function isStartedBy($string, $starting)
    {
        return str_starts_with($string, $starting);
    }

    /**
     * Checks if a string ends with another string
     * @param $string
     * @param $ending
     * @return bool
     */
    public static function isEndedWith($string, $ending)
    {
        return str_ends_with($string, $ending);
    }
    # --------------------------------------------------------------------------
    # Estimate Methods
    # --------------------------------------------------------------------------
    #   Use this methods to get statistics of a string
    #
    #   Contributing Roles:
    #   [1]. All estimate methods MUST start in estimate and follow a 
    #       camelCase naming standard.
    #   [2]. All estimate methods must return an integer value
    # --------------------------------------------------------------------------

    /**
     * Get length of an string
     * @param $string
     * @return int
     */
    public static function estimateLength($string)
    {
        if (function_exists("\mb_strlen")) {
            return mb_strlen($string);
        }
        return strlen($string);
    }

    /**
     * Summary of estimateCounts
     * @param $string
     * @return array|string
     */
    public static function estimateCounts($string)
    {
        $counts = [];
        $array = static::toArray($string);
        foreach ($array as $character) {
            if (!isset($counts[$character])) {
                $counts[$character] = 0;
            }
            $counts[$character]++;
        }
        return $counts;
    }

    # --------------------------------------------------------------------------
    # Merge Methods
    # --------------------------------------------------------------------------
    #   Use this methods to merge strings
    #
    #   Contributing Roles:
    #   [1]. All merge methods MUST start in merge and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Merge strings and create new string
     * @param mixed $separator
     * @param array $strings
     * @return string
     */
    public static function merge($separator, ...$strings)
    {
        return implode($separator, $strings);
    }

    # --------------------------------------------------------------------------
    # Split Methods
    # --------------------------------------------------------------------------
    #   Use this methods to split strings
    #
    #   Contributing Roles:
    #   [1]. All split methods MUST start in split and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Split a string into sub-strings using given length
     * @param $string
     * @param $segmentLength
     * @return array
     */
    public static function split($string, $segmentLength)
    {
        return Polyfill::mb_str_split($string, $segmentLength);
    }

    /**
     * Split a string into sub-strings using given separator
     * @param $string
     * @param $separator
     * @return bool|string[]
     */
    public static function splitBy($string, $separator)
    {
        return explode($separator, $string);
    }

    # --------------------------------------------------------------------------
    # Export/Import/Convert Methods
    # --------------------------------------------------------------------------
    #   Use this methods to export/import strings
    #
    #   Contributing Roles:
    #   [1]. All import methods MUST start in from and follow a 
    #       camelCase naming standard.
    #   [2]. All export methods MUST start in to and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    /**
     * Convert a string into hexadecimal
     * @param $string
     * @return string
     */
    public static function toHex($string)
    {
        return bin2hex($string);
    }

    /**
     * Convert a hexadecimal into string
     * @param $string
     * @return bool|string
     */
    public static function fromHex($string)
    {
        return hex2bin($string);
    }

    /**
     * Convert a character into ascii number
     * @param $character
     * @return int
     */
    public static function toAscii($character)
    {
        return Polyfill::mb_ord($character);
    }

    /**
     * Convert a ascii number into character
     * @param $ascii
     * @return string
     */
    public static function fromAscii($ascii)
    {
        return Polyfill::mb_chr($ascii);
    }

    /**
     * Apply a format to a string and get a formatted string
     * @param $string
     * @param $format
     * @return string
     */
    public static function toFormat($format, ...$values)
    {
        return sprintf($format, ...$values);
    }


    public static function fromFormat($string, $format)
    {
        return sscanf($string, $format);
    }

    /**
     * Split a string into an array of characters
     * @param $string
     * @return array
     */
    public static function toArray($string)
    {
        return Polyfill::mb_str_split($string, 1);
    }

    /**
     * Merge array items and create a strings
     * @param array $array
     * @return string
     */
    public static function fromArray(array $array, $separator = "")
    {
        return implode($separator, $array);
    }

    /**
     * Convert string to integer
     * @param $string$
     * @return int
     */
    public static function toInteger($string)
    {
        return (int) $string;
    }

    /**
     * Convert integer to string
     * @param $integer
     * @return string
     */
    public static function fromInteger($integer)
    {
        return (string) $integer;
    }

    /**
     * Convert string to float
     * @param $string
     * @return float
     */
    public static function toFloat($string)
    {
        return (float) $string;
    }

    /**
     * Convert float to string
     * @param $float
     * @return string
     */
    public static function fromFloat($float)
    {
        return (string) $float;
    }

    /**
     * convert string to boolean
     * @param $string
     * @return bool
     */
    public static function toBoolean($string)
    {
        if (
            in_array(
                static::transformToLowercase($string),
                [
                    "no",
                    "off",
                    "not",
                    "false",
                    "cancel",
                    "incorrect",
                    "untrue",
                    "wrong",
                    "erroneous",
                    "nok",
                    "null"
                ]
            )
        )
            return false;
        return true;
    }

    /**
     * Convert boolean to string
     * @param $boolean
     * @return string
     */
    public static function fromBoolean($boolean)
    {
        return $boolean ? "true" : "false";
    }

    # --------------------------------------------------------------------------
    # Encode/Decode Methods
    # --------------------------------------------------------------------------
    #   Use this methods to encode/decode strings
    #
    #   Contributing Roles:
    #   [1]. All encode methods MUST start in in and follow a 
    #       camelCase naming standard.
    #   [2]. All decode methods MUST start in of and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    public static function inRot($string)
    {
        return str_rot13($string);
    }

    public static function ofRot($string)
    {
        return str_rot13($string);
    }

    public static function inSlashes($string)
    {
        return addslashes($string);
    }
    public static function ofSlashes($string)
    {
        return stripslashes($string);
    }
    public static function inUU($string)
    {
        return convert_uuencode($string);
    }
    public static function ofUU($string)
    {
        return convert_uudecode($string);
    }
    public static function inSafeCharacters($string)
    {
        return htmlspecialchars($string);
    }
    public static function ofSafeCharacters($string)
    {
        return htmlspecialchars_decode($string);
    }
    public static function inHtmlEntities($string)
    {
        return htmlentities($string, ENT_QUOTES);
    }
    public static function ofHtmlEntities($string)
    {
        return html_entity_decode($string, ENT_QUOTES);
    }

    # --------------------------------------------------------------------------
    # Hash Methods
    # --------------------------------------------------------------------------
    #   Use this methods to hash strings
    #
    #   Contributing Roles:
    #   [1]. All hashing methods MUST start in hash and follow a 
    #       camelCase naming standard.
    #   [2]. All validate methods MUST start validate of and follow a 
    #       camelCase naming standard.
    # --------------------------------------------------------------------------

    public static function hashMD5($string)
    {
        return md5($string, false);
    }
    public static function hashSHA($string)
    {
        return sha1($string);
    }
    public static function hashChecksum($string)
    {
        return password_hash(sha1($string));
    }
    public static function validateChecksum($string, $checksum)
    {
        return password_verify(sha1($string), $checksum);
    }

}