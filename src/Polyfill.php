<?php

namespace PHPallas\Utilities;

class Polyfill
{
    public static function mb_str_pad($input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT, $encoding = null)
    {
        if ($encoding === null) {
            $encoding = static::mb_internal_encoding();
        }
        $input_length = static::mb_strlen($input, $encoding);
        $pad_length = (int) $pad_length;
        if ($pad_length <= $input_length) {
            return $input;
        }
        $pad_string_length = static::mb_strlen($pad_string, $encoding);
        $pad_needed = $pad_length - $input_length;
        switch ($pad_type) {
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
    public static function mb_strlen($string, $encoding = null)
    {
        if (function_exists("\mb_strlen")) {
            return mb_strlen($string, $encoding);
        }
        if ($encoding === null) {
            $encoding = static::mb_internal_encoding();
        }
        $string = static::iconv($encoding, $encoding . '//IGNORE', $string);
        $length = strlen($string);
        $char_length = strlen(static::iconv($encoding, $encoding . '//IGNORE', 'あ'));
        return $length / $char_length;
    }
    public static function mb_internal_encoding($encoding = null)
    {
        if (function_exists("\mb_internal_encoding")) {
            return mb_internal_encoding($encoding);
        }
        $internal_encoding = 'UTF-8';
        if ($encoding !== null) {
            $internal_encoding = $encoding;
        }
        return $internal_encoding;
    }
    public static function iconv($in_charset, $out_charset, $str)
    {
        if (function_exists("\iconv")) {
            return iconv($in_charset, $out_charset, $str);
        }
        $charset_map = [
            'UTF-8' => 'utf8_decode',
            'ISO-8859-1' => 'utf8_encode',
            'WINDOWS-1252' => 'utf8_encode',
        ];
        if (array_key_exists($in_charset, $charset_map)) {
            $str = call_user_func($charset_map[$in_charset], $str);
        }
        if (array_key_exists($out_charset, $charset_map)) {
            return call_user_func($charset_map[$out_charset], $str);
        }
        return $str;
    }
    public static function mb_split($pattern, $string, $encoding = null)
    {
        if ($encoding === null) {
            $encoding = static::mb_internal_encoding();
        }

        // Convert the string to the specified encoding
        $string = static::iconv($encoding, $encoding . '//IGNORE', $string);

        // Split the string using preg_split
        $result = preg_split($pattern, $string);

        // Convert each element back to the original encoding
        foreach ($result as &$value) {
            $value = static::iconv($encoding, $encoding . '//IGNORE', $value);
        }

        return array_values($result);
    }
    public static function mb_str_split($string, $length = 1, $encoding = null)
    {
        if (function_exists("\mb_str_split")) {
            return mb_str_split($string, $length, $encoding);
        }
        if ($encoding === null) {
            $encoding = static::mb_internal_encoding();
        }

        // Initialize the result array
        $result = array();

        // Get the total length of the string
        $string_length = static::mb_strlen($string, $encoding);

        // Loop through the string and extract substrings
        for ($i = 0; $i < $string_length; $i += $length) {
            $result[] = static::mb_substr($string, $i, $length, $encoding);
        }

        return $result;
    }
    public static function mb_substr($string, $start, $length = null, $encoding = null)
    {
        if (function_exists("\mb_substr")) {
            return mb_substr($string, $start, $length, $encoding);
        }
        if ($encoding === null) {
            $encoding = static::mb_internal_encoding();
        }
        $string_length = static::mb_strlen($string, $encoding);
        if ($start < 0) {
            $start = $string_length + $start;
            if ($start < 0) {
                $start = 0;
            }
        }
        if ($length === null) {
            $length = $string_length - $start;
        } else if ($length < 0) {
            $length = $string_length - $start + $length;
        }
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            if ($start + $i < $string_length) {
                $result .= static::mb_substr($string, $start + $i, 1, $encoding);
            }
        }
        return $result;
    }
    public static function mb_trim($string, $character_mask = null, $encoding = null)
    {
        // Set the default encoding if not specified
        if ($encoding === null) {
            $encoding = static::mb_internal_encoding();
        }

        // If no character mask is provided, use whitespace by default
        if ($character_mask === null) {
            $character_mask = " \t\n\r\0\x0B"; // Common whitespace characters
        }

        // Trim from the beginning
        $string = static::mb_ltrim($string, $character_mask, $encoding);
        // Trim from the end
        $string = static::mb_rtrim($string, $character_mask, $encoding);

        return $string;
    }

    public static function mb_ltrim($string, $character_mask, $encoding)
    {
        $len = mb_strlen($string, $encoding);
        $start = 0;

        while ($start < $len && static::mb_strpos($character_mask, static::mb_substr($string, $start, 1, $encoding), 0, $encoding) !== false) {
            $start++;
        }

        return static::mb_substr($string, $start, $len - $start, $encoding);
    }

    public static function mb_rtrim($string, $character_mask, $encoding)
    {
        $len = static::mb_strlen($string, $encoding);
        $end = $len;

        while ($end > 0 && static::mb_strpos($character_mask, static::mb_substr($string, $end - 1, 1, $encoding), 0, $encoding) !== false) {
            $end--;
        }

        return static::mb_substr($string, 0, $end, $encoding);
    }
    public static function mb_strpos($haystack, $needle, $offset = 0, $encoding = null)
    {
        // Set the default encoding if not specified
        if ($encoding === null) {
            $encoding = static::mb_internal_encoding();
        }

        // Get the length of the haystack and needle in characters
        $haystack_length = static::mb_strlen($haystack, $encoding);
        $needle_length = static::mb_strlen($needle, $encoding);

        // If the needle is empty, return the offset if it's valid
        if ($needle_length === 0) {
            return ($offset >= 0 && $offset <= $haystack_length) ? $offset : false;
        }

        // Adjust the offset if it's negative
        if ($offset < 0) {
            $offset = $haystack_length + $offset;
        }

        // Ensure the offset is within the bounds of the haystack
        if ($offset < 0 || $offset >= $haystack_length) {
            return false;
        }

        // Loop through the haystack to find the needle
        for ($i = $offset; $i <= $haystack_length - $needle_length; $i++) {
            // Compare the substring with the needle
            if (static::mb_substr($haystack, $i, $needle_length, $encoding) === $needle) {
                return $i; // Return the position if found
            }
        }

        return false; // Return false if not found
    }
    public static function mb_strrev($string, $encoding = 'UTF-8')
    {
        $characters = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
        $reversedCharacters = array_reverse($characters);
        return implode('', $reversedCharacters);
    }
    public static function mb_str_shuffle($string, $encoding = 'UTF-8') {
        // Convert the string to an array of characters
        $characters = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
        
        // Shuffle the array of characters
        shuffle($characters);
        
        // Join the shuffled characters back into a string
        return implode('', $characters);
    }
    public static function chr($ascii) {
        // Ensure the ASCII value is within the valid range
        if ($ascii < 0 || $ascii > 255) {
            throw new \InvalidArgumentException('ASCII value must be between 0 and 255.');
        }
    
        // Return the corresponding character
        return static::mb_convert_encoding(pack('C', $ascii), 'UTF-8');
    }
    public static function polyfill_mb_detect_encoding($string, $encodings = null) {
        // If no encodings are provided, use a default list
        if ($encodings === null) {
            $encodings = ['UTF-8', 'ISO-8859-1', 'Windows-1252', 'ASCII'];
        } else {
            $encodings = (array) $encodings; // Ensure it's an array
        }
    
        foreach ($encodings as $encoding) {
            // Check if the string is valid for the specified encoding
            if (is_string($string) && static::mb_check_encoding($string, $encoding)) {
                return $encoding; // Return the first valid encoding found
            }
        }
    
        return false; // Return false if no valid encoding is found
    }
    public static function mb_detect_encoding($string, $encodings = null) {
        // If no encodings are provided, use a default list
        if ($encodings === null) {
            $encodings = ['UTF-8', 'ISO-8859-1', 'Windows-1252', 'ASCII'];
        } else {
            $encodings = (array) $encodings; // Ensure it's an array
        }
    
        foreach ($encodings as $encoding) {
            // Check if the string is valid for the specified encoding
            if (is_string($string) && static::mb_check_encoding($string, $encoding)) {
                return $encoding; // Return the first valid encoding found
            }
        }
    
        return false; // Return false if no valid encoding is found
    }
    public static function mb_detect_order($order = null) {
        global $encodingOrder;
    
        // If an order is provided, set the new order
        if ($order !== null) {
            if (is_array($order)) {
                $encodingOrder = array_map('strtoupper', $order); // Normalize to uppercase
            } else {
                throw new InvalidArgumentException('Order must be an array of encodings.');
            }
        }
    
        // Return the current encoding order
        return $encodingOrder;
    }
    public static function ord($string) {
        if (empty($string)) {
            return 0; // Return 0 for empty strings
        }
    
        // Get the first character
        $firstChar = static::mb_substr($string, 0, 1, 'UTF-8');
    
        // Get the Unicode code point of the first character
        $codePoint = static::mb_ord($firstChar);
    
        return $codePoint;
    }
    
    /**
     * Function to get the Unicode code point of a character
     *
     * @param string $char The character to get the code point for.
     * @return int The Unicode code point.
     */
    public static function mb_ord($char) {
        // Check if the input is a single character
        if (static::mb_strlen($char, 'UTF-8') !== 1) {
            return false; // Return false if not a single character
        }
    
        // Get the UTF-8 byte representation
        $bytes = array_values(unpack('C*', $char));
    
        // Calculate the code point based on the first byte
        $codepoint = 0;
    
        if ($bytes[0] < 0x80) {
            // 1-byte character
            $codepoint = $bytes[0];
        } elseif ($bytes[0] < 0xE0) {
            // 2-byte character
            $codepoint = (($bytes[0] & 0x1F) << 6) | ($bytes[1] & 0x3F);
        } elseif ($bytes[0] < 0xF0) {
            // 3-byte character
            $codepoint = (($bytes[0] & 0x0F) << 12) | (($bytes[1] & 0x3F) << 6) | ($bytes[2] & 0x3F);
        } else {
            // 4-byte character
            $codepoint = (($bytes[0] & 0x07) << 18) | (($bytes[1] & 0x3F) << 12) | (($bytes[2] & 0x3F) << 6) | ($bytes[3] & 0x3F);
        }
        return $codepoint;
    }
    public static function str_contains($haystack, $needle, $encoding = 'UTF-8') {
        if ($needle === '') {
            return true; // An empty needle always matches
        }
        return static::mb_strpos($haystack, $needle, 0, $encoding) !== false;
    }
    public static function str_starts_with($haystack, $needle, $encoding = 'UTF-8') {
        if ($needle === '') {
            return true; // An empty needle always matches
        }
        
        // Use mb_substr to get the start of the haystack and compare it to the needle
        return static::mb_substr($haystack, 0, static::mb_strlen($needle, $encoding), $encoding) === $needle;
    }
    public static function str_ends_with($haystack, $needle, $encoding = 'UTF-8') {
        if ($needle === '') {
            return true; // An empty needle always matches
        }
        $haystackLength = static::mb_strlen($haystack, $encoding);
        $needleLength = static::mb_strlen($needle, $encoding);
        if ($needleLength > $haystackLength) {
            return false; // Needle is longer than haystack
        }
        return static::mb_substr($haystack, -$needleLength, null, $encoding) === $needle;
    }
    public static function mb_chr($codepoint) {
        if (!is_int($codepoint) || $codepoint < 0 || $codepoint > 0x10FFFF) {
            throw new \InvalidArgumentException('Codepoint must be an integer between 0 and 0x10FFFF.');
        }
    
        // Convert code point to UTF-8 character
        if ($codepoint < 0x80) {
            return pack('C', $codepoint);
        } elseif ($codepoint < 0x800) {
            return pack('C*', 0xC0 | ($codepoint >> 6), 0x80 | ($codepoint & 0x3F));
        } elseif ($codepoint < 0x10000) {
            return pack('C*', 0xE0 | ($codepoint >> 12), 0x80 | (($codepoint >> 6) & 0x3F), 0x80 | ($codepoint & 0x3F));
        } else {
            return pack('C*', 0xF0 | ($codepoint >> 18), 0x80 | (($codepoint >> 12) & 0x3F), 0x80 | (($codepoint >> 6) & 0x3F), 0x80 | ($codepoint & 0x3F));
        }
    }
    public static function mb_convert_encoding($string, $to_encoding, $from_encoding = null) {
        if ($from_encoding === null) {
            $from_encoding = static::mb_detect_encoding($string, static::mb_detect_order(), true);
        }
        switch (strtoupper($to_encoding)) {
            case 'UTF-8':
                if (strtoupper($from_encoding) === 'ISO-8859-1') {
                    return utf8_encode($string); // Simple conversion for ISO-8859-1 to UTF-8
                }
                break;
            case 'ISO-8859-1':
                if (strtoupper($from_encoding) === 'UTF-8') {
                    return utf8_decode($string); // Simple conversion for UTF-8 to ISO-8859-1
                }
                break;
            default:
                throw new \InvalidArgumentException('Unsupported encoding: ' . $to_encoding);
        }
        return $string;
    }
    public static function mb_check_encoding($string, $encoding = null) {
        // If no encoding is provided, default to UTF-8
        if ($encoding === null) {
            $encoding = 'UTF-8';
        }
    
        switch (strtoupper($encoding)) {
            case 'UTF-8':
                // Check if the string is valid UTF-8
                return preg_match('//u', $string);
    
            case 'ISO-8859-1':
                // Check if the string contains only valid ISO-8859-1 characters
                return static::mb_detect_encoding($string, 'ISO-8859-1', true) === 'ISO-8859-1';
    
            case 'ASCII':
                // Check if the string is valid ASCII (0-127)
                return preg_match('/^[\x00-\x7F]*$/', $string);
    
            // Add more cases for other encodings as needed
    
            default:
                throw new \InvalidArgumentException('Unsupported encoding: ' . $encoding);
        }
    }
    public static function password_verify($password, $hash) {
        if (function_exists("\password_verify")) {
            return password_verify($password, $hash);
        }
        // Extract the salt from the hash
        $salt = substr($hash, 0, 29);
        
        // Hash the password using the same salt
        $newHash = crypt($password, $salt);
        
        // Compare the hashes
        return $newHash === $hash;
    }
    public static function password_hash($password, $algo = PASSWORD_DEFAULT, array $options = []) {
        if (function_exists("\password_hash")) {
            return password_hash($password, $algo, $options);
        }
        if ($algo !== PASSWORD_DEFAULT) {
            trigger_error('Only PASSWORD_DEFAULT is supported', E_USER_WARNING);
            return false;
        }
        
        // Use bcrypt for hashing
        $cost = 10; // Default cost
        if (isset($options['cost'])) {
            $cost = $options['cost'];
        }

        // Create a salt
        $salt = sprintf("$2y$%02d$", $cost) . substr(strtr(base64_encode(mcrypt_create_iv(16)), '+', '.'), 0, 22);
        
        // Hash the password
        $hash = crypt($password, $salt);
        
        return $hash;
    }
}