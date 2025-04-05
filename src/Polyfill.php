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

use InvalidArgumentException;

/**
 * Class Polyfill
 * Provides multibyte string functions to polyfill missing PHP functionality.
 */
class Polyfill
{
    /**
     * Pads a string to a certain length with another string.
     *
     * @param string $input The input string.
     * @param int $pad_length The length of the resulting string after padding.
     * @param string $pad_string The string to pad with.
     * @param int $pad_type The type of padding (STR_PAD_LEFT, STR_PAD_RIGHT, STR_PAD_BOTH).
     * @param string|null $encoding The character encoding.
     * @return string The padded string.
     */
    public static function mb_str_pad($input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT, $encoding = null)
    {
        if ($encoding === null)
        {
            $encoding = static::mb_internal_encoding();
        }
        $input_length = static::mb_strlen($input, $encoding);
        $pad_length = (int) $pad_length;
        if ($pad_length <= $input_length)
        {
            return $input;
        }
        $pad_string_length = static::mb_strlen($pad_string, $encoding);
        $pad_needed = $pad_length - $input_length;

        switch ($pad_type)
        {
            case STR_PAD_LEFT:
                return str_repeat($pad_string, ceil($pad_needed / $pad_string_length)) . $input;
            case STR_PAD_BOTH:
                $pad_left = floor($pad_needed / 2);
                $pad_right = $pad_needed - $pad_left;
                return str_repeat($pad_string, ceil($pad_left / $pad_string_length)) . $input . str_repeat($pad_string, ceil($pad_right / $pad_string_length));
            case STR_PAD_RIGHT:
            default:
                return $input . str_repeat($pad_string, ceil($pad_needed / $pad_string_length));
        }
    }

    /**
     * Get the length of a multibyte string.
     *
     * @param string $string The input string.
     * @param string|null $encoding The character encoding.
     * @return int The length of the string.
     */
    public static function mb_strlen($string, $encoding = null)
    {
        if (function_exists("\mb_strlen"))
        {
            return mb_strlen($string, $encoding);
        }
        if ($encoding === null)
        {
            $encoding = static::mb_internal_encoding();
        }
        $string = static::iconv($encoding, $encoding . '//IGNORE', $string);
        $length = strlen($string);
        $char_length = strlen(static::iconv($encoding, $encoding . '//IGNORE', 'あ'));
        return $length / $char_length;
    }

    /**
     * Get or set the internal encoding.
     *
     * @param string|null $encoding The character encoding.
     * @return string The internal encoding.
     */
    public static function mb_internal_encoding($encoding = null)
    {
        if (function_exists("\mb_internal_encoding"))
        {
            return mb_internal_encoding($encoding);
        }
        $internal_encoding = 'UTF-8';
        if ($encoding !== null)
        {
            $internal_encoding = $encoding;
        }
        return $internal_encoding;
    }

    /**
     * Convert character encoding.
     *
     * @param string $in_charset The input character set.
     * @param string $out_charset The output character set.
     * @param string $str The string to convert.
     * @return string The converted string.
     */
    public static function iconv($in_charset, $out_charset, $str)
    {
        if (function_exists("\iconv"))
        {
            return iconv($in_charset, $out_charset, $str);
        }
        $charset_map = [
            'UTF-8' => 'utf8_decode',
            'ISO-8859-1' => 'utf8_encode',
            'WINDOWS-1252' => 'utf8_encode',
        ];
        if (array_key_exists($in_charset, $charset_map))
        {
            $str = call_user_func($charset_map[$in_charset], $str);
        }
        if (array_key_exists($out_charset, $charset_map))
        {
            return call_user_func($charset_map[$out_charset], $str);
        }
        return $str;
    }

    /**
     * Split a string into an array using a regular expression.
     *
     * @param string $pattern The regular expression pattern.
     * @param string $string The input string.
     * @param string|null $encoding The character encoding.
     * @return array The array of split strings.
     */
    public static function mb_split($pattern, $string, $encoding = null)
    {
        if ($encoding === null)
        {
            $encoding = static::mb_internal_encoding();
        }

        $string = static::iconv($encoding, $encoding . '//IGNORE', $string);
        $result = preg_split($pattern, $string);

        foreach ($result as &$value)
        {
            $value = static::iconv($encoding, $encoding . '//IGNORE', $value);
        }

        return array_values($result);
    }

    /**
     * Split a multibyte string into an array.
     *
     * @param string $string The input string.
     * @param int $length The length of each segment.
     * @param string|null $encoding The character encoding.
     * @return array The array of split strings.
     */
    public static function mb_str_split($string, $length = 1, $encoding = null)
    {
        if (function_exists("\mb_str_split"))
        {
            return mb_str_split($string, $length, $encoding);
        }
        if ($encoding === null)
        {
            $encoding = static::mb_internal_encoding();
        }

        $result = array();
        $string_length = static::mb_strlen($string, $encoding);

        for ($i = 0; $i < $string_length; $i += $length)
        {
            $result[] = static::mb_substr($string, $i, $length, $encoding);
        }

        return $result;
    }

    /**
     * Get a part of a multibyte string.
     *
     * @param string $string The input string.
     * @param int $start The starting position.
     * @param int|null $length The length of the substring.
     * @param string|null $encoding The character encoding.
     * @return string The substring.
     */
    public static function mb_substr($string, $start, $length = null, $encoding = null)
    {
        if (function_exists("\mb_substr"))
        {
            return mb_substr($string, $start, $length, $encoding);
        }
        if ($encoding === null)
        {
            $encoding = static::mb_internal_encoding();
        }
        $string_length = static::mb_strlen($string, $encoding);
        if ($start < 0)
        {
            $start = $string_length + $start;
            if ($start < 0)
            {
                $start = 0;
            }
        }
        if ($length === null)
        {
            $length = $string_length - $start;
        }
        else if ($length < 0)
        {
            $length = $string_length - $start + $length;
        }
        $result = '';
        for ($i = 0; $i < $length; $i++)
        {
            if ($start + $i < $string_length)
            {
                $result .= static::mb_substr($string, $start + $i, 1, $encoding);
            }
        }
        return $result;
    }

    /**
     * Trim whitespace or other characters from both sides of a multibyte string.
     *
     * @param string $string The input string.
     * @param string|null $character_mask The characters to trim.
     * @param string|null $encoding The character encoding.
     * @return string The trimmed string.
     */
    public static function mb_trim($string, $character_mask = null, $encoding = null)
    {
        if ($encoding === null)
        {
            $encoding = static::mb_internal_encoding();
        }

        if ($character_mask === null)
        {
            $character_mask = " \t\n\r\0\x0B";
        }

        $string = static::mb_ltrim($string, $character_mask, $encoding);
        $string = static::mb_rtrim($string, $character_mask, $encoding);

        return $string;
    }

    /**
     * Trim characters from the left side of a multibyte string.
     *
     * @param string $string The input string.
     * @param string $character_mask The characters to trim.
     * @param string $encoding The character encoding.
     * @return string The trimmed string.
     */
    public static function mb_ltrim($string, $character_mask, $encoding)
    {
        $len = mb_strlen($string, $encoding);
        $start = 0;

        while ($start < $len && static::mb_strpos($character_mask, static::mb_substr($string, $start, 1, $encoding), 0, $encoding) !== false)
        {
            $start++;
        }

        return static::mb_substr($string, $start, $len - $start, $encoding);
    }

    /**
     * Trim characters from the right side of a multibyte string.
     *
     * @param string $string The input string.
     * @param string $character_mask The characters to trim.
     * @param string $encoding The character encoding.
     * @return string The trimmed string.
     */
    public static function mb_rtrim($string, $character_mask, $encoding)
    {
        $len = static::mb_strlen($string, $encoding);
        $end = $len;

        while ($end > 0 && static::mb_strpos($character_mask, static::mb_substr($string, $end - 1, 1, $encoding), 0, $encoding) !== false)
        {
            $end--;
        }

        return static::mb_substr($string, 0, $end, $encoding);
    }

    /**
     * Find the position of the first occurrence of a substring in a multibyte string.
     *
     * @param string $haystack The input string.
     * @param string $needle The substring to find.
     * @param int $offset The offset from which to start searching.
     * @param string|null $encoding The character encoding.
     * @return int|false The position of the first occurrence or false if not found.
     */
    public static function mb_strpos($haystack, $needle, $offset = 0, $encoding = null)
    {
        if ($encoding === null)
        {
            $encoding = static::mb_internal_encoding();
        }

        $haystack_length = static::mb_strlen($haystack, $encoding);
        $needle_length = static::mb_strlen($needle, $encoding);

        if ($needle_length === 0)
        {
            return ($offset >= 0 && $offset <= $haystack_length) ? $offset : false;
        }

        if ($offset < 0)
        {
            $offset = $haystack_length + $offset;
        }

        if ($offset < 0 || $offset >= $haystack_length)
        {
            return false;
        }

        for ($i = $offset; $i <= $haystack_length - $needle_length; $i++)
        {
            if (static::mb_substr($haystack, $i, $needle_length, $encoding) === $needle)
            {
                return $i;
            }
        }

        return false;
    }

    /**
     * Reverse a multibyte string.
     *
     * @param string $string The input string.
     * @param string $encoding The character encoding.
     * @return string The reversed string.
     */
    public static function mb_strrev($string, $encoding = 'UTF-8')
    {
        $characters = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
        $reversedCharacters = array_reverse($characters);
        return implode('', $reversedCharacters);
    }

    /**
     * Shuffle the characters of a multibyte string.
     *
     * @param string $string The input string.
     * @param string $encoding The character encoding.
     * @return string The shuffled string.
     */
    public static function mb_str_shuffle($string, $encoding = 'UTF-8')
    {
        $characters = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
        shuffle($characters);

        return implode('', $characters);
    }

    /**
     * Get a character from an ASCII value.
     *
     * @param int $ascii The ASCII value.
     * @return string The character.
     * @throws InvalidArgumentException If the ASCII value is out of range.
     */
    public static function chr($ascii)
    {
        if ($ascii < 0 || $ascii > 255)
        {
            throw new InvalidArgumentException('ASCII value must be between 0 and 255.');
        }

        return static::mb_convert_encoding(pack('C', $ascii), 'UTF-8');
    }

    /**
     * Detect the encoding of a string.
     *
     * @param string $string The input string.
     * @param array|null $encodings The list of encodings to check.
     * @return string|false The detected encoding or false if not found.
     */
    public static function polyfill_mb_detect_encoding($string, $encodings = null)
    {
        if ($encodings === null)
        {
            $encodings = ['UTF-8', 'ISO-8859-1', 'Windows-1252', 'ASCII'];
        }
        else
        {
            $encodings = (array) $encodings;
        }

        foreach ($encodings as $encoding)
        {
            if (is_string($string) && static::mb_check_encoding($string, $encoding))
            {
                return $encoding;
            }
        }

        return false;
    }

    /**
     * Detect the encoding of a string.
     *
     * @param string $string The input string.
     * @param array|null $encodings The list of encodings to check.
     * @return string|false The detected encoding or false if not found.
     */
    public static function mb_detect_encoding($string, $encodings = null)
    {
        return static::polyfill_mb_detect_encoding($string, $encodings);
    }

    /**
     * Get or set the order of encodings to use for detection.
     *
     * @param array|null $order The order of encodings.
     * @return array The current encoding order.
     * @throws InvalidArgumentException If the order is not an array.
     */
    public static function mb_detect_order($order = null)
    {
        global $encodingOrder;

        if ($order !== null)
        {
            if (is_array($order))
            {
                $encodingOrder = array_map('strtoupper', $order);
            }
            else
            {
                throw new InvalidArgumentException('Order must be an array of encodings.');
            }
        }

        return $encodingOrder;
    }

    /**
     * Get the ASCII value of the first character of a string.
     *
     * @param string $string The input string.
     * @return int The ASCII value.
     */
    public static function ord($string)
    {
        if (empty($string))
        {
            return 0;
        }

        $firstChar = static::mb_substr($string, 0, 1, 'UTF-8');
        $codePoint = static::mb_ord($firstChar);

        return $codePoint;
    }

    /**
     * Get the codepoint of a character.
     *
     * @param string $char The input character.
     * @return int|false The codepoint or false if invalid.
     */
    public static function mb_ord($char)
    {
        if (static::mb_strlen($char, 'UTF-8') !== 1)
        {
            return false;
        }

        $bytes = array_values(unpack('C*', $char));
        $codepoint = 0;

        if ($bytes[0] < 0x80)
        {
            $codepoint = $bytes[0];
        }
        elseif ($bytes[0] < 0xE0)
        {
            $codepoint = (($bytes[0] & 0x1F) << 6) | ($bytes[1] & 0x3F);
        }
        elseif ($bytes[0] < 0xF0)
        {
            $codepoint = (($bytes[0] & 0x0F) << 12) | (($bytes[1] & 0x3F) << 6) | ($bytes[2] & 0x3F);
        }
        else
        {
            $codepoint = (($bytes[0] & 0x07) << 18) | (($bytes[1] & 0x3F) << 12) | (($bytes[2] & 0x3F) << 6) | ($bytes[3] & 0x3F);
        }
        return $codepoint;
    }

    /**
     * Check if a string contains a substring.
     *
     * @param string $haystack The input string.
     * @param string $needle The substring to find.
     * @param string $encoding The character encoding.
     * @return bool True if the substring is found, false otherwise.
     */
    public static function str_contains($haystack, $needle, $encoding = 'UTF-8')
    {
        if ($needle === '')
        {
            return true;
        }
        return static::mb_strpos($haystack, $needle, 0, $encoding) !== false;
    }

    /**
     * Check if a string starts with a given substring.
     *
     * @param string $haystack The input string.
     * @param string $needle The substring to check.
     * @param string $encoding The character encoding.
     * @return bool True if the string starts with the substring, false otherwise.
     */
    public static function str_starts_with($haystack, $needle, $encoding = 'UTF-8')
    {
        if ($needle === '')
        {
            return true;
        }

        return static::mb_substr($haystack, 0, static::mb_strlen($needle, $encoding), $encoding) === $needle;
    }

    /**
     * Check if a string ends with a given substring.
     *
     * @param string $haystack The input string.
     * @param string $needle The substring to check.
     * @param string $encoding The character encoding.
     * @return bool True if the string ends with the substring, false otherwise.
     */
    public static function str_ends_with($haystack, $needle, $encoding = 'UTF-8')
    {
        if ($needle === '')
        {
            return true;
        }
        $haystackLength = static::mb_strlen($haystack, $encoding);
        $needleLength = static::mb_strlen($needle, $encoding);
        if ($needleLength > $haystackLength)
        {
            return false;
        }
        return static::mb_substr($haystack, -$needleLength, null, $encoding) === $needle;
    }

    /**
     * Get a character from a Unicode codepoint.
     *
     * @param int $codepoint The Unicode codepoint (must be between 0 and 0x10FFFF).
     * @return string The corresponding character.
     * @throws InvalidArgumentException If the codepoint is out of range.
     */
    public static function mb_chr($codepoint)
    {
        if (!is_int($codepoint) || $codepoint < 0 || $codepoint > 0x10FFFF)
        {
            throw new InvalidArgumentException('Codepoint must be an integer between 0 and 0x10FFFF.');
        }

        if ($codepoint < 0x80)
        {
            return pack('C', $codepoint);
        }
        elseif ($codepoint < 0x800)
        {
            return pack('C*', 0xC0 | ($codepoint >> 6), 0x80 | ($codepoint & 0x3F));
        }
        elseif ($codepoint < 0x10000)
        {
            return pack('C*', 0xE0 | ($codepoint >> 12), 0x80 | (($codepoint >> 6) & 0x3F), 0x80 | ($codepoint & 0x3F));
        }
        else
        {
            return pack('C*', 0xF0 | ($codepoint >> 18), 0x80 | (($codepoint >> 12) & 0x3F), 0x80 | (($codepoint >> 6) & 0x3F), 0x80 | ($codepoint & 0x3F));
        }
    }

    /**
     * Convert a string from one character encoding to another.
     *
     * @param string $string The input string.
     * @param string $to_encoding The target encoding.
     * @param string|null $from_encoding The source encoding (if null, will be detected).
     * @return string The converted string.
     * @throws InvalidArgumentException If the target encoding is unsupported.
     */
    public static function mb_convert_encoding($string, $to_encoding, $from_encoding = null)
    {
        if ($from_encoding === null)
        {
            $from_encoding = static::mb_detect_encoding($string, static::mb_detect_order(), true);
        }
        switch (strtoupper($to_encoding))
        {
            case 'UTF-8':
                if (strtoupper($from_encoding) === 'ISO-8859-1')
                {
                    return utf8_encode($string);
                }
                break;
            case 'ISO-8859-1':
                if (strtoupper($from_encoding) === 'UTF-8')
                {
                    return utf8_decode($string);
                }
                break;
            default:
                throw new InvalidArgumentException('Unsupported encoding: ' . $to_encoding);
        }
        return $string;
    }

    /**
     * Check if a string is valid for a given encoding.
     *
     * @param string $string The input string.
     * @param string|null $encoding The encoding to check against (defaults to 'UTF-8').
     * @return bool True if the string is valid for the encoding, false otherwise.
     * @throws InvalidArgumentException If the encoding is unsupported.
     */
    public static function mb_check_encoding($string, $encoding = null)
    {
        if ($encoding === null)
        {
            $encoding = 'UTF-8';
        }

        switch (strtoupper($encoding))
        {
            case 'UTF-8':
                return preg_match('//u', $string);
            case 'ISO-8859-1':
                return static::mb_detect_encoding($string, 'ISO-8859-1', true) === 'ISO-8859-1';
            case 'ASCII':
                return preg_match('/^[\x00-\x7F]*$/', $string);
            default:
                throw new InvalidArgumentException('Unsupported encoding: ' . $encoding);
        }
    }

    /**
     * Verify a password against a hashed value.
     *
     * @param string $password The plain text password.
     * @param string $hash The hashed password.
     * @return bool True if the password matches the hash, false otherwise.
     */
    public static function password_verify($password, $hash)
    {
        if (function_exists("\password_verify"))
        {
            return password_verify($password, $hash);
        }

        $salt = substr($hash, 0, 29);
        $newHash = crypt($password, $salt);

        return $newHash === $hash;
    }

    /**
     * Hash a password using a secure algorithm.
     *
     * @param string $password The plain text password.
     * @param int $algo The hashing algorithm to use (defaults to PASSWORD_DEFAULT).
     * @param array $options Options for the hashing algorithm.
     * @return string|false The hashed password or false on failure.
     */
    public static function password_hash($password, $algo = PASSWORD_DEFAULT, array $options = [])
    {
        if (function_exists("\password_hash"))
        {
            return password_hash($password, $algo, $options);
        }
        if ($algo !== PASSWORD_DEFAULT)
        {
            trigger_error('Only PASSWORD_DEFAULT is supported', E_USER_WARNING);
            return false;
        }

        $cost = 10;
        if (isset($options['cost']))
        {
            $cost = $options['cost'];
        }

        $salt = sprintf("$2y$%02d$", $cost) . substr(strtr(base64_encode(mcrypt_create_iv(16)), '+', '.'), 0, 22);
        $hash = crypt($password, $salt);

        return $hash;
    }
}