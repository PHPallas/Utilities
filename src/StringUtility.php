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
    #   Use this methods to create an array.
    #
    #   Contributing Roles:
    #   [1]. All creational methods MUST starts in create and follow a camelCase
    #        naming standard.
    # --------------------------------------------------------------------------

    public static function createRandom(int $length = 8): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function createString(string $character, int $length): string
    {
        return static::fillEnd("", $character, $length);
    }
    public static function createByRepeat(string $string, int $times): string
    {
        return str_repeat($string, $times);
    }
    public static function toRot(string $string): string
    {
        return str_rot13($string);
    }
    public static function fromRot(string $string): string
    {
        return str_rot13($string);
    }
    public static function shuffleize(string $string): string
    {
        return str_shuffle($string);
    }
    public static function split(string $string, int $segmentLength): array
    {
        return str_split($string, $segmentLength);
    }
    public static function merge(array $array): string
    {
        return implode("", $array);
    }
    public static function format(string $string, string $format): void
    {
        sprintf($format, $string);
    }
    public static function detect(string $string, string $format): array
    {
        sscanf($string, $format, ...$vars);
        return [...$vars];
    }
    public static function isEqualTo(string $string1, string $string2): bool
    {
        return $string1 === $string2;
    }
    public static function isSameAs(string $string1, string $string2): bool
    {
        return static::isEqualTo(
            static::transformToLowercase($string1),
            static::transformToLowercase($string2)
        );
    }
    public static function transformToNoTag(string $string,  array|string|null $allowedTags = null): string
    {
        return strip_tags($string,$allowedTags);
    }
    public static function estimateSimilarity(string $string1, string $string2): float
    {
        // TODO
        return 0;
    }
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
    public static function hasEnd(string $string, string $ending): bool
    {
        return str_ends_with($string, $ending);
    }
    public static function estimateLength(string $string): int
    {
        if (function_exists("\mb_strlen")) {
            return mb_strlen($string);
        }
        return strlen($string);
    }
    public static function transformToReverse(string $string): string
    {
        return strrev($string);
    }

    public static function hasStart(string $string, string $starting): bool
    {
        return str_starts_with($string, $starting);
    }
    
    public static function addSlashes(string $string): string
    {
        return addslashes($string);
    }
    public static function removeSlashes(string $string): string
    {
        return stripslashes($string);
    }
    public static function toHex(string $string): string
    {
        return bin2hex($string);
    }
    public static function fromHex(string $string): string
    {
        return hex2bin($string);
    }

    public static function removeChars(string $string, string $characters = " \n\r\t\v\x00"): string
    {
        return chop($string, $characters);
    }
    public static function toAscii(string $character): int
    {
        return ord($character);
    }
    public static function fromAscii(int $ascii): string
    {
        return chr($ascii);
    }
    public static function addSeparator(string $string, int $size, string $separator): string
    {
        return chunk_split($string, $size, $separator);
    }

    public static function toUU(string $string): string
    {
        return convert_uuencode($string);
    }
    public static function fromUU(string $string): string
    {
        return convert_uudecode($string);
    }
    public static function estimateCounts(string $string): array
    {
        return count_chars($string, 1);
    }
    public static function getChecksum(string $string): string
    {
        return password_hash(sha1($string));
    }
    public static function validateChecksum(string $string, string $checksum): bool
    {
        return password_verify(sha1($string), $checksum);
    }
    public static function toArray(string $string, string $separator = ""): array
    {
        return explode($separator, $string);
    }
    public static function fromArray(array $array, string $separator): string
    {
        return implode($separator, $array);
    }
    public static function toSafeCharacters(string $string): string
    {
        return htmlspecialchars($string);
    }
    public static function fromSafeCharacters(string $string): string
    {
        return htmlspecialchars_decode($string);
    }
    public static function ToHtmlEntities(string $string): string
    {
        return htmlentities($string, ENT_QUOTES);
    }
    public static function fromHtmlEntities(string $string): string
    {
        return html_entity_decode($string, ENT_QUOTES);
    }
    public static function transformToLowercase(string $string): string
    {
        return strtolower($string);
    }
    public static function transformToUppercase(string $string): string
    {
        return strtoupper($string);
    }
    public static function transformToLowercaseFirst(string $string): string
    {
        return lcfirst($string);
    }
    public static function replace(string $string, array|string $from, array|string $to, bool $caseSensitive = false): string
    {
        if (true === $caseSensitive) {
            return str_ireplace($from, $to, $string);
        }
        return str_replace($from, $to, $string);
    }
    public static function fillStart(string $string, string $character, int $length): string
    {
        if (function_exists("\mb_str_pad")) {
            return mb_str_pad($string, $length, $character, STR_PAD_LEFT);
        }
        return str_pad($string, $length, $character, STR_PAD_LEFT);
    }
    public static function fillEnd(string $string, string $character, int $length): string
    {
        if (function_exists("\mb_str_pad")) {
            return mb_str_pad($string, $length, $character, STR_PAD_RIGHT);
        }
        return str_pad($string, $length, $character, STR_PAD_RIGHT);
    }
    public static function transformToUppercaseFirst(string $string): string
    {
        return ucfirst($string);
    }
    public static function transformToFlatcase(string $string): string
    {
        return static::transformToLowercase(static::replace($string, " ", ""));
    }
    public static function transformToPascalCase(string $string): string
    {
        $array = static::toArray(static::transformToLowercase($string), " ");
        foreach ($array as &$item) {
            $item = static::transformToUppercaseFirst($item);
        }
        return static::fromArray($array, "");
    }
    public static function transformToCamelcase(string $string): string
    {
        return static::transformToLowercaseFirst(static::transformToPascalCase($string));
    }
    public static function transformToSnakecase(string $string): string
    {
        return static::transformToLowercase(static::replace($string, " ", "_"));
    }
    public static function transformToMacrocase(string $string): string
    {
        return static::transformToUppercase(static::transformToSnakecase($string));
    }
    public static function transformToPascalSnakecase(string $string): string
    {
        $array = static::toArray($string, " ");
        foreach ($array as &$item) {
            $item = static::transformToPascalCase($item);
        }
        return static::fromArray($array, "_");
    }
    public static function transformToCamelSnakecase(string $string): string
    {
        return static::transformToLowercaseFirst(static::transformToPascalSnakecase($string));
    }
    public static function transformToKebabcase(string $string): string
    {
        return static::replace(static::transformToSnakecase($string), "_", "-");
    }
    public static function transformToCobolcase(string $string): string
    {
        return static::transformToUppercase(static::transformToKebabcase($string));
    }
    public static function transformToTraincase(string $string): string
    {
        return static::replace(static::transformToPascalSnakecase($string));
    }

    public static function trim(string $string, string $characters = " \n\r\t\v\x00"): string
    {
        return trim($string, $characters);
    }
    public static function trimStart(string $string, string $characters = " \n\r\t\v\x00"): string
    {
        return ltrim($string, $characters);
    }
    public static function trimEnd(string $string, string $characters = " \n\r\t\v\x00"): string
    {
        return rtrim($string, $characters);
    }
    public static function MD5(string $string): string
    {
        return md5($string, false);
    }
    public static function SHA(string $string): string
    {
        return sha1($string);
    }
    public static function transformToMetaphone(string $string): string
    {
        return metaphone($string, 0);
    }
    public static function transformToSoundex(string $string): string
    {
        return soundex($string);
    }
    public static function toInteger(string $string): int
    {
        return (int) $string;
    }
    public static function fromInteger(int $integer): string
    {
        return (string) $integer;
    }
    public static function toFloat(string $string): float
    {
        return (float) $string;
    }
    public static function fromFloat(float $float): string
    {
        return (string) $float;
    }

    public static function toBoolean(string $string): bool
    {
        if (in_array(static::transformToLowercase($string), ["no", "off", "not", "false", "cancel", "incorrect", "untrue", "wrong", "erroneous", "nok"]))
            return false;
        return true;
    }
    public static function fromBoolean(bool $boolean): string
    {
        return $boolean ? "true" : "false";
    }

}