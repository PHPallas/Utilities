<?php

/*
 * This file is part of the PHPallas package.
 *
 * (c) Sina Kuhestani <sinakuhestani@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PHPallas\Utilities;

class StringUtility
{

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
     * @param string $character
     * @param int $length
     * @return string
     */
    public static function create(string $character, int $length): string
    {
        return static::setInEnd("", $character, $length);
    }

    /**
     * Generate a random string by given length
     * @param int $length
     * @return string
     */
    public static function createRandom(
        int $length = 8,
        $characters = 'abcdefghijklmnopqrstuvwxyz'
    ): string {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Creates an string by repeating an string for given times
     * @param string $string
     * @param int $times
     * @return string
     */
    public static function createByRepeat(string $string, int $times): string
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
     * @param string $string
     * @param int $index
     * @return string
     */
    public static function get(string $string, int $index): string
    {
        $array = StringUtility::split($string, 1);
        return $array[$index] ?? "";
    }

    /**
     * Get a subset of a string by index and length
     * @param string $string
     * @param int $startIndex
     * @param int $length
     * @return string
     */
    public static function getSubset(string $string, int $startIndex, int $length): string
    {
        return substr($string, $startIndex, $length);
    }

    /**
     * Get a segment of a string by start and end indices
     * @param string $string
     * @param int $startIndex
     * @param int $endIndex
     * @return string
     */
    public static function getSegment(string $string, int $startIndex, int $endIndex): string
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
     * @param string $string
     * @param int $index
     * @param string $value
     * @return string
     */
    public static function set(string $string, int $index, string $value): string
    {
        $array = StringUtility::split($string, 1);
        $array[$index] = $value;
        return StringUtility::fromArray($array);
    }

    /**
     * Replaces sub-strings with new values
     * @param string $string
     * @param array|string $from
     * @param array|string $to
     * @param bool $caseSensitive
     * @return array|string
     */
    public static function setReplace(string $string, array|string $needle, array|string $replace, bool $caseSensitive = false): string
    {
        if (true === $caseSensitive) {
            return str_ireplace($needle, $replace, $string);
        }
        return str_replace($needle, $replace, $string);
    }

    /**
     * Fill start of an string
     * @param string $string
     * @param string $character
     * @param int $length
     * @return string
     */
    public static function setInStart(string $string, string $character, int $length): string
    {
        if (function_exists("\mb_str_pad")) {
            return mb_str_pad($string, $length, $character, STR_PAD_LEFT);
        }
        return str_pad($string, $length, $character, STR_PAD_LEFT);
    }

    /**
     * Fill end of a string
     * @param string $string
     * @param string $character
     * @param int $length
     * @return string
     */
    public static function setInEnd(string $string, string $character, int $length): string
    {
        if (function_exists("\mb_str_pad")) {
            return mb_str_pad($string, $length, $character, STR_PAD_RIGHT);
        }
        return str_pad($string, $length, $character, STR_PAD_RIGHT);
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
        string $string,
        string $needle,
        bool $caseSensitive = true
    ): bool {
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
     * @param string $string
     * @param string $value
     * @return string
     */
    public static function addToStart(string $string, string $value): string
    {
        return "$value$string";
    }

    /**
     * append a value into the end of a string
     * @param string $string
     * @param string $value
     * @return string
     */
    public static function addToEnd(string $string, string $value): string
    {
        return "$string$value";
    }

    /**
     * Add a value into the center of another string
     * @param string $string
     * @param string $value
     * @return string
     */
    public static function addToCenter(string $string, string $value): string
    {
        return trim(
            chunk_split(
                $string,
                (int) (strlen($string) / 2),
                $value
            ),
            $value
        );
    }
    public static function addEvenly(string $string, string $value, int $size): string
    {
        return trim(chunk_split($string, $size, $value), $value);
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
     * @param string $string
     * @param string $characters
     * @return string
     */
    public static function drop(string $string, string $characters = " \n\r\t\v\x00"): string
    {
        return static::setReplace($string, $characters, "");
    }

    public static function dropFirst(string $string): string
    {
        return static::fromArray(
            ArrayUtility::dropFirst(
                static::toArray($string)
            ),
            ""
        );
    }

    public static function dropLast(string $string): string
    {
        return static::fromArray(
            ArrayUtility::dropLast(
                static::toArray($string)
            )
        );
    }

    public static function dropNth(string $string, int $index): string
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
     * @param string $string
     * @param string $characters
     * @return string
     */
    public static function dropFromSides(string $string, string $characters = " \n\r\t\v\x00"): string
    {
        return trim($string, $characters);
    }

    /**
     * Drops characters from start of a string
     * @param string $string
     * @param string $characters
     * @return string
     */
    public static function dropFromStart(string $string, string $characters = " \n\r\t\v\x00"): string
    {
        return ltrim($string, $characters);
    }

    /**
     * Drops characters from end of a string
     * @param string $string
     * @param string $characters
     * @return string
     */
    public static function dropFromEnd(string $string, string $characters = " \n\r\t\v\x00"): string
    {
        return rtrim($string, $characters);
    }

    /**
     * Drop - and _ from string
     * @param string $string
     * @return array|string
     */
    public static function dropSeparator(string $string): string
    {
        return static::setReplace($string, ["-", "_"], "");
    }

    /**
     * Frop space from string
     * @param string $string
     * @return array|string
     */
    public static function dropSpace(string $string): string
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
     * @param string $string
     * @return string
     */
    public static function transformToReverse(string $string): string
    {
        return strrev($string);
    }

    /**
     * Shuffelize a string
     * @param string $string
     * @return string
     */
    public static function transformToShuffle(string $string): string
    {
        return str_shuffle($string);
    }

    /**
     * Remove all Html & PHP tags from string
     * @param string $string
     * @param array|string|null $allowedTags
     * @return string
     */
    public static function transformToNoTag(string $string, array|string|null $allowedTags = null): string
    {
        return strip_tags($string, $allowedTags);
    }

    /**
     * Transform a string to lowercase
     * @param string $string
     * @return string
     */
    public static function transformToLowercase(string $string, bool $removeSeparators = false, $dropSpace = false): string
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
     * @param string $string
     * @return string
     */
    public static function transformToUppercase(string $string, bool $removeSeparators = false, bool $removeSpace = false): string
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
     * @param string $string
     * @param bool $removeSeparators
     * @param bool $removeSpace
     * @return string
     */
    public static function transformToLowercaseFirst(string $string, bool $removeSeparators = false, bool $removeSpace = false): string
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
     * @param string $string
     * @param bool $removeSeparators
     * @param bool $removeSpace
     * @return string
     */
    public static function transformToUppercaseFirst(string $string, bool $removeSeparators = false, bool $removeSpace = false): string
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
     * @param string $string
     * @return string
     */
    public static function transformToFlatcase(string $string): string
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
     * @param string $string
     * @return array|string
     */
    public static function transformToPascalCase(string $string): string
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
     * @param string $string
     * @return string
     */
    public static function transformToCamelcase(string $string): string
    {
        return static::transformToLowercaseFirst(static::transformToPascalCase($string));
    }

    /**
     * Transform a string to snake_case
     * @param string $string
     * @return string
     */
    public static function transformToSnakecase(string $string): string
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
     * @param string $string
     * @return string
     */
    public static function transformToMacrocase(string $string): string
    {
        return static::transformToUppercase(static::transformToSnakecase($string));
    }

    /**
     * Transform a string to the Pascal_Snake_Case
     * @param string $string
     * @return string
     */
    public static function transformToPascalSnakecase(string $string): string
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
     * @param string $string
     * @return string
     */
    public static function transformToCamelSnakecase(string $string): string
    {
        return static::transformToLowercaseFirst(static::transformToPascalSnakecase($string));
    }

    /**
     * Transform string to kebaba-case
     * @param string $string
     * @return array|string
     */
    public static function transformToKebabcase(string $string): string
    {
        return static::setReplace(static::transformToSnakecase($string), "_", "-");
    }

    /**
     * Transform String to COBOL-CASE
     * @param string $string
     * @return string
     */
    public static function transformToCobolcase(string $string): string
    {
        return static::transformToUppercase(static::transformToKebabcase($string));
    }

    /**
     * Transform string to Pascal-Snake-Case
     * @param string $string
     * @return array|string
     */
    public static function transformToTraincase(string $string): string
    {
        return static::setReplace(static::transformToPascalSnakecase($string), "_", "-");
    }

    /**
     * Transform string To Metaphone
     * @param string $string
     * @return string
     */
    public static function transformToMetaphone(string $string): string
    {
        return metaphone($string, 0);
    }

    /**
     * Transform string to soundex
     * @param string $string
     * @return string
     */
    public static function transformToSoundex(string $string): string
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
     * @param string $string1
     * @param string $string2
     * @return bool
     */
    public static function isEqualTo(string $string1, string $string2): bool
    {
        return $string1 === $string2;
    }

    /**
     * Checks if two string are equal (case insentive)
     * @param string $string1
     * @param string $string2
     * @return bool
     */
    public static function isSameAs(string $string1, string $string2): bool
    {
        return static::isEqualTo(
            static::transformToLowercase($string1),
            static::transformToLowercase($string2)
        );
    }

    /**
     * Checks if a string starts by another string
     * @param string $string
     * @param string $starting
     * @return bool
     */
    public static function isStartedBy(string $string, string $starting): bool
    {
        return str_starts_with($string, $starting);
    }

    /**
     * Checks if a string ends with another string
     * @param string $string
     * @param string $ending
     * @return bool
     */
    public static function isEndedWith(string $string, string $ending): bool
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
     * @param string $string
     * @return int
     */
    public static function estimateLength(string $string): int
    {
        if (function_exists("\mb_strlen")) {
            return mb_strlen($string);
        }
        return strlen($string);
    }

    /**
     * Summary of estimateCounts
     * @param string $string
     * @return array|string
     */
    public static function estimateCounts(string $string): array
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
    public static function merge($separator, ...$strings): string
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
     * @param string $string
     * @param int $segmentLength
     * @return array
     */
    public static function split(string $string, int $segmentLength): array
    {
        return str_split($string, $segmentLength);
    }

    /**
     * Split a string into sub-strings using given separator
     * @param string $string
     * @param string $separator
     * @return bool|string[]
     */
    public static function splitBy(string $string, string $separator): array
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
     * @param string $string
     * @return string
     */
    public static function toHex(string $string): string
    {
        return bin2hex($string);
    }

    /**
     * Convert a hexadecimal into string
     * @param string $string
     * @return bool|string
     */
    public static function fromHex(string $string): string
    {
        return hex2bin($string);
    }

    /**
     * Convert a character into ascii number
     * @param string $character
     * @return int
     */
    public static function toAscii(string $character): int
    {
        return ord($character);
    }

    /**
     * Convert a ascii number into character
     * @param int $ascii
     * @return string
     */
    public static function fromAscii(int $ascii): string
    {
        return chr($ascii);
    }

    /**
     * Apply a format to a string and get a formatted string
     * @param string $string
     * @param string $format
     * @return void
     */
    public static function toFormat(string $format, string ...$values): string
    {
        return sprintf($format, ...$values);
    }

    /**
     * Give a formatted string and extract variables
     * @param string $string
     * @param string $format
     * @return array
     */
    public static function fromFormat(string $string, string $format): array
    {
        return sscanf($string, $format);
    }

    /**
     * Split a string into an array of characters
     * @param string $string
     * @return array
     */
    public static function toArray(string $string): array
    {
        return str_split($string, 1);
    }

    /**
     * Merge array items and create a strings
     * @param array $array
     * @return string
     */
    public static function fromArray(array $array): string
    {
        return implode("", $array);
    }

    /**
     * Convert string to integer
     * @param string $string
     * @return int
     */
    public static function toInteger(string $string): int
    {
        return (int) $string;
    }

    /**
     * Convert integer to string
     * @param int $integer
     * @return string
     */
    public static function fromInteger(int $integer): string
    {
        return (string) $integer;
    }

    /**
     * Convert string to float
     * @param string $string
     * @return float
     */
    public static function toFloat(string $string): float
    {
        return (float) $string;
    }

    /**
     * Convert float to string
     * @param float $float
     * @return string
     */
    public static function fromFloat(float $float): string
    {
        return (string) $float;
    }

    /**
     * convert string to boolean
     * @param string $string
     * @return bool
     */
    public static function toBoolean(string $string): bool
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
     * @param bool $boolean
     * @return string
     */
    public static function fromBoolean(bool $boolean): string
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

    public static function inRot(string $string): string
    {
        return str_rot13($string);
    }

    public static function ofRot(string $string): string
    {
        return str_rot13($string);
    }

    public static function inSlashes(string $string): string
    {
        return addslashes($string);
    }
    public static function ofSlashes(string $string): string
    {
        return stripslashes($string);
    }
    public static function inUU(string $string): string
    {
        return convert_uuencode($string);
    }
    public static function ofUU(string $string): string
    {
        return convert_uudecode($string);
    }
    public static function inSafeCharacters(string $string): string
    {
        return htmlspecialchars($string);
    }
    public static function ofSafeCharacters(string $string): string
    {
        return htmlspecialchars_decode($string);
    }
    public static function inHtmlEntities(string $string): string
    {
        return htmlentities($string, ENT_QUOTES);
    }
    public static function ofHtmlEntities(string $string): string
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

    public static function hashMD5(string $string): string
    {
        return md5($string, false);
    }
    public static function hashSHA(string $string): string
    {
        return sha1($string);
    }
    public static function hashChecksum(string $string): string
    {
        return password_hash(sha1($string));
    }
    public static function validateChecksum(string $string, string $checksum): bool
    {
        return password_verify(sha1($string), $checksum);
    }

}