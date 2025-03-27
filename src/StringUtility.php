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

# ------------------------------------------------------------------------------
# Contribution Roles
# ------------------------------------------------------------------------------
# [1]. All methods MUST be named clearly to reflect their functionality, 
#     following the camelCase naming standard.
# [2]. Each method should handle edge cases, such as null or invalid inputs, 
#      appropriately.
# [3]. Ensure that all methods are well-documented with PHPDoc comments 
#      and inline comments for clarity.
# [4]. New methods should be tested thoroughly to ensure they work as expected
#      across various scenarios, including edge cases.
# [5]. Consider implementing additional methods for common string manipulation
#      tasks based on user feedback or common use cases.
# ------------------------------------------------------------------------------

/**
 * Class StringUtility
 *
 * A comprehensive utility class designed to facilitate various string 
 * manipulations and transformations. This class provides methods for 
 * creating, modifying, encoding, decoding, hashing, and checking strings 
 * in a consistent and reusable manner. It includes functionalities such as 
 * string creation, substring retrieval, character manipulation, 
 * phrase checking, and various encoding/decoding techniques.
 *
 * The utility also supports different string formats and transformations, 
 * making it a versatile tool for developers working with string data 
 * in PHP applications.
 */
class StringUtility
{

    # --------------------------------------------------------------------------
    # Constants
    # --------------------------------------------------------------------------
    # provide a set of immutable values that can be reused throughout the 
    # codebase. They enhance code readability and maintainability by avoiding 
    # magic strings, making it clear what each constant represents. 
    # Additionally, using constants helps prevent errors associated with typos 
    # and inconsistencies, as they centralize commonly used values. This 
    # practice promotes cleaner code and facilitates easier updates, as changes 
    # to a constant only need to be made in one place.
    # --------------------------------------------------------------------------

    /**
     * Represents an empty string.
     */
    const EMPTY = "";

    /**
     * Represents a single space character.
     */
    const SPACE = " ";

    /**
     * Represents a double space (two space characters).
     */
    const DOUBLE_SPACE = "  ";

    /**
     * Represents a tab character.
     */
    const TAB = "\t";

    /**
     * Represents a newline character.
     */
    const NEW_LINE = "\n";

    /**
     * Represents a carriage return character.
     */
    const CARRIAGE_RETURN = "\r";

    /**
     * Represents a hyphen character.
     */
    const HYPHEN = "-";

    /**
     * Represents an underscore character.
     */
    const UNDERSCORE = "_";

    /**
     * Represents a dot (period) character.
     */
    const DOT = ".";

    /**
     * Represents a comma character.
     */
    const COMMA = ",";

    /**
     * Represents a semicolon character.
     */
    const SEMICOLON = ";";

    /**
     * Represents a colon character.
     */
    const COLON = ":";

    /**
     * Represents a question mark character.
     */
    const QUESTION_MARK = "?";

    /**
     * Represents an exclamation mark character.
     */
    const EXCLAMATION_MARK = "!";

    /**
     * Represents a double quote character.
     */
    const DOUBLE_QUOTE = "\"";

    /**
     * Represents a single quote character.
     */
    const QUOTE = "'";

    /**
     * Represents a forward slash character.
     */
    const SLASH = "/";

    /**
     * Represents a backslash character.
     */
    const BACKSLASH = "\\";

    /**
     * Represents a percent sign character.
     */
    const PERCENT = "%";

    /**
     * Represents an at symbol character.
     */
    const AT_SYMBOL = "@";

    /**
     * Represents a dollar sign character.
     */
    const DOLLAR = "$";

    /**
     * Represents an ampersand character.
     */
    const AMPERSAND = "&";

    /**
     * Represents a pipe character.
     */
    const PIPE = "|";

    /**
     * Represents a left parenthesis character.
     */
    const LEFT_PARENTHESIS = "(";

    /**
     * Represents a right parenthesis character.
     */
    const RIGHT_PARENTHESIS = ")";

    /**
     * Represents a left brace character.
     */
    const LEFT_BRACE = "{";

    /**
     * Represents a right brace character.
     */
    const RIGHT_BRACE = "}";

    /**
     * Represents a left square bracket character.
     */
    const LEFT_SQUARE_BRACKET = "[";

    /**
     * Represents a right square bracket character.
     */
    const RIGHT_SQUARE_BRACKET = "]";

    /**
     * Represents the directory separator constant for the current platform.
     */
    const DS = DIRECTORY_SEPARATOR;

    # --------------------------------------------------------------------------
    # String Creation Utility
    # --------------------------------------------------------------------------
    #   This utility functions are a set of static methods for creating and
    #   manipulating strings. It includes methods for generating strings filled 
    #   with a specific character, creating random strings from a defined set 
    #   of characters, and repeating a given string a specified number of times.
    #
    #   Contributing Roles:
    #   [1]. All methods are designed to facilitate various string creation 
    #        scenarios, enhancing code reusability and readability.
    #   [2]. Each method follows a consistent naming convention, starting with 
    #        `create`, ensuring clarity in their purpose and functionality.
    # --------------------------------------------------------------------------

    /**
     * Creates a string consisting of a specified character repeated to a given 
     * length.
     *
     * This method generates a string where the specified character is repeated 
     * until the desired length is achieved. If the length is less than or equal 
     * to zero, an empty string is returned.
     *
     * @param string $character The character to repeat.
     * @param int $length The total length of the resulting string.
     * @return string The resulting string filled with the specified character.
     */
    public static function create($character, $length)
    {
        // Calls a method to set the character in the string to the desired length
        return static::setInEnd(static::EMPTY , $character, $length);
    }

    /**
     * Generates a random string of a specified length using the provided 
     * characters.
     *
     * This method creates a random string by selecting characters from the 
     * provided set. If the length is not specified, it defaults to 8. The 
     * characters can be customized to include any valid characters.
     *
     * @param int $length The length of the random string to create. Default is 
     * 8.
     * @param string $characters The characters to use for generating the random 
     * string. Default is lowercase letters.
     * @return string The generated random string.
     */
    public static function createRandom(
        $length = 8,
        $characters = "abcdefghijklmnopqrstuvwxyz"
    ) {
        // Get the length of the character set
        $charactersLength = Polyfill::mb_strlen($characters);
        // Split the characters into an array for random selection
        $characters = Polyfill::mb_split('//u', $characters, "utf-8");
        $randomString = '';

        // Loop to build the random string
        for ($i = 0; $i < $length; $i++)
        {
            // Initialize the character variable
            $char = '';
            // Select a random character until a valid one is found
            while (empty($char))
            {
                $index = MathUtility::createRandomInteger(
                    0,
                    $charactersLength - 1
                );
                $char = isset($characters[$index]) ? $characters[$index] : "";
            }
            // Append the selected character to the result
            $randomString .= $char;
        }
        return $randomString; // Return the generated random string
    }

    /**
     * Repeats a given string a specified number of times.
     *
     * This method takes an input string and repeats it the specified number of 
     * times. If the times parameter is less than or equal to zero, an empty 
     * string is returned.
     *
     * @param string $string The string to repeat.
     * @param int $times The number of times to repeat the string.
     * @return string The resulting string after repetition.
     */
    public static function createByRepeat($string, $times)
    {
        // Use PHP's str_repeat function to create the repeated string
        return str_repeat($string, $times);
    }

    # --------------------------------------------------------------------------
    # Get Methods
    # --------------------------------------------------------------------------
    #   Use these methods to retrieve characters and substrings from a string.
    #
    #   Contributing Roles:
    #   [1]. All get methods MUST start with 'get' and follow a 
    #       camelCase naming standard.
    #   [2]. The methods handle out-of-bounds indices gracefully, returning 
    #       an empty string when necessary.
    # --------------------------------------------------------------------------

    /**
     * Retrieves a character from a string at a specified index.
     *
     * This method splits the given string into an array of characters and 
     * returns the character at the specified index. If the index is out of 
     * bounds, it returns an empty string.
     *
     * @param string $string The input string from which to retrieve the character.
     * @param int $index The index of the character to retrieve.
     * @return string The character at the specified index, or an empty string if not found.
     */
    public static function get($string, $index)
    {
        // Split the string into an array of characters
        $array = StringUtility::split($string, 1);
        // Check if the index exists in the array; return the character or empty string
        $output = isset($array[$index]) ? $array[$index] : static::EMPTY;
        return $output;
    }

    /**
     * Retrieves a subset of a string starting from a given index.
     *
     * This method extracts a substring from the input string, starting at 
     * the specified index and continuing for the specified length. It uses 
     * the multibyte string function if available, falling back to standard 
     * string functions otherwise.
     *
     * @param string $string The input string from which to extract the subset.
     * @param int $startIndex The starting index for the substring.
     * @param int|null $length The length of the substring. If null, the substring extends to the end of the string.
     * @param string $encoding The character encoding. Default is 'UTF-8'.
     * @return string The extracted substring.
     */
    public static function getSubset(
        $string,
        $startIndex,
        $length,
        $encoding = 'UTF-8'
    ) {
        // Use multibyte substring function if available
        if (function_exists("mb_substr"))
        {
            return mb_substr($string, $startIndex, $length);
        }
        // Return empty string if the input string is empty
        if ($string === '')
        {
            return '';
        }
        $stringLength = mb_strlen($string, $encoding);

        // Adjust starting index if negative
        if ($startIndex < 0)
        {
            $start = max(0, $stringLength + $startIndex);
        }
        else
        {
            $start = $startIndex;
        }

        // Handle case where length is null
        if ($length === null)
        {
            return substr($string, $start);
        }

        // Adjust length if negative
        if ($length < 0)
        {
            $length = max(0, $stringLength - $start);
        }

        $result = '';
        $currentIndex = 0;

        // Loop through the string to build the result
        for ($i = 0; $i < $stringLength; $i++)
        {
            $char = static::get($string, $i); // Get the character at the current index
            if ($i >= $start && $currentIndex < $length)
            {
                $result .= $char; // Append character to result
                $currentIndex++;
            }
            if ($currentIndex >= $length)
            {
                break; // Stop if the desired length is reached
            }
        }
        return $result;
    }

    /**
     * Retrieves a segment of a string between two specified indices.
     *
     * This method extracts a substring from the input string starting at 
     * the specified start index and ending at the specified end index.
     *
     * @param string $string The input string from which to extract the segment.
     * @param int $startIndex The starting index of the segment.
     * @param int $endIndex The ending index of the segment.
     * @return string The extracted segment of the string.
     */
    public static function getSegment($string, $startIndex, $endIndex)
    {
        $length = $endIndex - $startIndex; // Calculate the length of the segment
        return static::getSubset($string, $startIndex, $length); // Retrieve the subset
    }

    # --------------------------------------------------------------------------
    # Set Methods
    # --------------------------------------------------------------------------
    #   Use these methods to modify strings by setting characters, replacing 
    #   substrings, and padding strings.
    #
    #   Contributing Roles:
    #   [1]. All set methods MUST start with 'set' and follow a 
    #       camelCase naming standard.
    #   [2]. Ensure that the methods handle edge cases, such as invalid indices 
    #       or empty strings, appropriately.
    # --------------------------------------------------------------------------

    /**
     * Sets a character at a specified index in the given string.
     *
     * This method splits the string into an array of characters, replaces 
     * the character at the specified index with the provided value, and 
     * then reconstructs the string from the modified array.
     *
     * @param string $string The input string to modify.
     * @param int $index The index at which to set the new character.
     * @param string $value The character to set at the specified index.
     * @return string The modified string with the character set at the index.
     */
    public static function set($string, $index, $value)
    {
        // Split the string into an array of characters
        $array = StringUtility::split($string, 1);
        // Set the new value at the specified index
        $array[$index] = $value;
        // Reconstruct and return the modified string
        return StringUtility::fromArray($array);
    }

    /**
     * Replaces occurrences of a substring within a string.
     *
     * This method replaces all instances of the specified needle with the 
     * replacement value. It can perform case-sensitive or case-insensitive 
     * replacements based on the provided flag.
     *
     * @param string $string The input string in which to perform the replacement.
     * @param string $needle The substring to be replaced.
     * @param string $replace The substring to replace with.
     * @param bool $caseSensitive Indicates whether the replacement should be 
     *                            case-sensitive. Default is false.
     * @return string The modified string with replacements made.
     */
    public static function setReplace(
        $string,
        $needle,
        $replace,
        $caseSensitive = false
    ) {
        // Perform case-sensitive replacement if the flag is true
        if (true === $caseSensitive)
        {
            return str_ireplace($needle, $replace, $string);
        }
        // Perform case-insensitive replacement
        return str_replace($needle, $replace, $string);
    }

    /**
     * Pads the string on the left with a specified character to a given length.
     *
     * This method adds the specified character to the start of the string 
     * until the desired length is reached.
     *
     * @param string $string The input string to pad.
     * @param string $character The character to use for padding.
     * @param int $length The total length of the resulting string after padding.
     * @return string The left-padded string.
     */
    public static function setInStart($string, $character, $length)
    {
        // Pad the string on the left with the specified character
        return Polyfill::mb_str_pad($string, $length, $character, STR_PAD_LEFT);
    }

    /**
     * Pads the string on the right with a specified character to a given length.
     *
     * This method adds the specified character to the end of the string 
     * until the desired length is reached.
     *
     * @param string $string The input string to pad.
     * @param string $character The character to use for padding.
     * @param int $length The total length of the resulting string after padding.
     * @return string The right-padded string.
     */
    public static function setInEnd($string, $character, $length)
    {
        // Pad the string on the right with the specified character
        return Polyfill::mb_str_pad($string, $length, $character, STR_PAD_RIGHT);
    }

    # --------------------------------------------------------------------------
    # Checking Method
    # --------------------------------------------------------------------------
    #   This method checks for the presence of a specified substring (needle) 
    #   within a given string, with an option for case sensitivity.
    #
    #   Contributing Roles:
    #   [1]. The method MUST be named 'hasPhrase' and follow the camelCase 
    #       naming standard.
    #   [2]. It accepts three parameters:
    #       - `$string`: The input string in which to search.
    #       - `$needle`: The substring to search for within the input string.
    #       - `$caseSensitive`: A boolean flag indicating whether the search 
    #         should be case-sensitive (default is true).
    #   [3]. The method returns a boolean value:
    #       - `true` if the needle is found within the string.
    #       - `false` if the needle is not found.
    #   [4]. Ensure that the method handles edge cases, such as empty strings 
    #       or needles, appropriately.
    # --------------------------------------------------------------------------

    /**
     * Checks if a specified phrase exists within a given string.
     *
     * This method determines whether the needle (substring) is present in the 
     * string, with an option for case sensitivity. If case sensitivity is 
     * disabled, both the string and the needle are transformed to lowercase 
     * before the check.
     *
     * @param string $string The input string to search within.
     * @param string $needle The substring to search for.
     * @param bool $caseSensitive Indicates whether the search should be 
     *                            case-sensitive. Default is true.
     * @return bool Returns true if the needle is found in the string, false otherwise.
     */
    public static function hasPhrase(
        $string,
        $needle,
        $caseSensitive = true,
    ) {
        // If case sensitivity is disabled, transform both strings to lowercase
        if (false === $caseSensitive)
        {
            return Polyfill::str_contains(
                static::transformToLowercase($string),
                static::transformToLowercase($needle),
            );
        }
        // Perform a case-sensitive search
        return Polyfill::str_contains($string, $needle);
    }

    # --------------------------------------------------------------------------
    # String Add Methods
    # --------------------------------------------------------------------------
    #   This class provides utility methods to modify strings by adding 
    #   specified values at various positions: the start, end, center, or 
    #   evenly throughout the string.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. The methods include:
    #       - `addToStart`: Adds a value to the beginning of the string.
    #       - `addToEnd`: Adds a value to the end of the string.
    #       - `addToCenter`: Inserts a value in the middle of the string.
    #       - `addEvenly`: Inserts a value at regular intervals throughout 
    #         the string based on a specified size.
    #   [3]. Each method should handle edge cases, such as empty strings or 
    #       values, appropriately.
    #   [4]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    # --------------------------------------------------------------------------

    /**
     * Adds a specified value to the start of the given string.
     *
     * This method concatenates the value with the input string, placing 
     * the value at the beginning.
     *
     * @param string $string The input string to modify.
     * @param string $value The value to add to the start of the string.
     * @return string The modified string with the value added at the start.
     */
    public static function addToStart($string, $value)
    {
        return "$value$string"; // Concatenate value at the start
    }

    /**
     * Adds a specified value to the end of the given string.
     *
     * This method concatenates the input string with the value, placing 
     * the value at the end.
     *
     * @param string $string The input string to modify.
     * @param string $value The value to add to the end of the string.
     * @return string The modified string with the value added at the end.
     */
    public static function addToEnd($string, $value)
    {
        return "$string$value"; // Concatenate value at the end
    }

    /**
     * Adds a specified value to the center of the given string.
     *
     * This method calculates the middle of the input string and inserts 
     * the value at that position.
     *
     * @param string $string The input string to modify.
     * @param string $value The value to add to the center of the string.
     * @return string The modified string with the value added at the center.
     */
    public static function addToCenter($string, $value)
    {
        // Calculate the middle index of the string
        $middle = Polyfill::mb_strlen($string) / 2;
        // Get the first half of the string
        $firstPart = Polyfill::mb_substr($string, 0, floor($middle));
        // Get the second half of the string
        $secondPart = static::setReplace($string, $firstPart, static::EMPTY);
        // Concatenate the first half, value, and second half
        return $firstPart . $value . $secondPart;
    }

    /**
     * Adds a specified value evenly throughout the given string.
     *
     * This method inserts the value at regular intervals defined by the 
     * specified size within the string.
     *
     * @param string $string The input string to modify.
     * @param string $value The value to insert into the string.
     * @param int $size The interval size at which to insert the value.
     * @return string The modified string with the value added evenly.
     */
    public static function addEvenly($string, $value, $size)
    {
        // Get the length of the input string
        $stringLength = Polyfill::mb_strlen($string);
        // Calculate the number of insertions based on the string length and size
        $numInsertions = floor($stringLength / $size);
        $result = '';

        // Loop through each character in the string
        for ($i = 0; $i < $stringLength; $i++)
        {
            $result .= Polyfill::mb_substr($string, $i, 1); // Append the current character
            // Check if the current position is at the insertion interval
            if (($i + 1) % $size == 0 && $numInsertions > 0)
            {
                $result .= $value; // Insert the value
                $numInsertions--; // Decrement the number of remaining insertions
            }
        }
        // Trim any trailing instances of the inserted value
        return Polyfill::mb_trim($result, $value);
    }

    # --------------------------------------------------------------------------
    # Drop Methods
    # --------------------------------------------------------------------------
    #   This class provides utility methods to manipulate strings by dropping 
    #   specified characters or elements from various positions within the string.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as empty strings or invalid 
    #       indices, appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    # --------------------------------------------------------------------------

    /**
     * Drops specified characters from the given string.
     *
     * This method removes all occurrences of the specified characters 
     * from the input string. By default, it drops whitespace and control 
     * characters.
     *
     * @param string $string The input string to modify.
     * @param string $characters The characters to drop from the string.
     * @return string The modified string with the specified characters removed.
     */
    public static function drop($string, $characters = " \n\r\t\v\x00")
    {
        return static::setReplace($string, $characters, static::EMPTY); // Replace specified characters with an empty string
    }

    /**
     * Drops the first character from the given string.
     *
     * This method removes the first character of the input string and 
     * returns the modified string.
     *
     * @param string $string The input string to modify.
     * @return string The modified string with the first character removed.
     */
    public static function dropFirst($string)
    {
        return static::fromArray(
            ArrayUtility::dropFirst(
                static::toArray($string), // Convert string to array and drop the first element
            ),
            static::EMPTY ,
        );
    }

    /**
     * Drops the last character from the given string.
     *
     * This method removes the last character of the input string and 
     * returns the modified string.
     *
     * @param string $string The input string to modify.
     * @return string The modified string with the last character removed.
     */
    public static function dropLast($string)
    {
        return static::fromArray(
            ArrayUtility::dropLast(
                static::toArray($string), // Convert string to array and drop the last element
            ),
        );
    }

    /**
     * Drops the character at the specified index from the given string.
     *
     * This method removes the character at the specified index and 
     * returns the modified string.
     *
     * @param string $string The input string to modify.
     * @param int $index The index of the character to drop.
     * @return string The modified string with the character at the specified index removed.
     */
    public static function dropNth($string, $index)
    {
        return static::fromArray(
            ArrayUtility::dropKey(
                static::toArray($string), // Convert string to array and drop the character at the specified index
                $index,
                false,
            ),
        );
    }

    /**
     * Drops specified characters from both ends of the given string.
     *
     * This method trims the specified characters from the start and end 
     * of the input string.
     *
     * @param string $string The input string to modify.
     * @param string $characters The characters to drop from both ends.
     * @return string The modified string with specified characters trimmed from both ends.
     */
    public static function dropFromSides($string, $characters = " \n\r\t\v\x00")
    {
        return trim($string, $characters); // Trim specified characters from both sides
    }

    /**
     * Drops specified characters from the start of the given string.
     *
     * This method removes all occurrences of the specified characters 
     * from the beginning of the input string.
     *
     * @param string $string The input string to modify.
     * @param string $characters The characters to drop from the start.
     * @return string The modified string with specified characters removed from the start.
     */
    public static function dropFromStart($string, $characters = " \n\r\t\v\x00")
    {
        return ltrim($string, $characters); // Trim specified characters from the start
    }

    /**
     * Drops specified characters from the end of the given string.
     *
     * This method removes all occurrences of the specified characters 
     * from the end of the input string.
     *
     * @param string $string The input string to modify.
     * @param string $characters The characters to drop from the end.
     * @return string The modified string with specified characters removed from the end.
     */
    public static function dropFromEnd($string, $characters = " \n\r\t\v\x00")
    {
        return rtrim($string, $characters); // Trim specified characters from the end
    }

    /**
     * Drops specified separators from the given string.
     *
     * This method removes dashes and underscores from the input string.
     *
     * @param string $string The input string to modify.
     * @return string The modified string with specified separators removed.
     */
    public static function dropSeparator($string)
    {
        return static::setReplace($string, array("-", "_"), static::EMPTY); // Replace dashes and underscores with an empty string
    }

    /**
     * Drops all spaces from the given string.
     *
     * This method removes all space characters from the input string.
     *
     * @param string $string The input string to modify.
     * @return string The modified string with all spaces removed.
     */
    public static function dropSpace($string)
    {
        return static::setReplace($string, static::SPACE, static::EMPTY); // Replace spaces with an empty string
    }

    /**
     * Truncates a string to a specified length and appends ellipsis if needed.
     *
     * @param string $string The input string to truncate.
     * @param int $length The maximum length of the resulting string.
     * @return string The truncated string with ellipsis.
     */
    public static function dropExtras($string, $length)
    {
        if (mb_strlen($string) <= $length)
        {
            return $string; // Return original string if it's within the limit
        }
        return mb_substr($string, 0, $length) . '...'; // Truncate and append ellipsis
    }

    # --------------------------------------------------------------------------
    # Transform Methods
    # --------------------------------------------------------------------------
    #   This class provides utility methods to transform strings in various ways, 
    #   including changing cases, removing tags, and manipulating string formats.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as empty strings or invalid 
    #       inputs, appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    # --------------------------------------------------------------------------

    /**
     * Transforms the given string to its reverse.
     *
     * This method returns the input string reversed.
     *
     * @param string $string The input string to transform.
     * @return string The reversed string.
     */
    public static function transformToReverse($string)
    {
        return Polyfill::mb_strrev($string); // Reverse the string using mb_strrev
    }

    /**
     * Transforms the given string by shuffling its characters.
     *
     * This method returns a new string with the characters of the input string 
     * shuffled randomly.
     *
     * @param string $string The input string to transform.
     * @return string The shuffled string.
     */
    public static function transformToShuffle($string)
    {
        return Polyfill::mb_str_shuffle($string); // Shuffle the string using mb_str_shuffle
    }

    /**
     * Transforms the given string by stripping HTML and PHP tags.
     *
     * This method removes all tags from the input string, optionally allowing 
     * specified tags.
     *
     * @param string $string The input string to transform.
     * @param string|null $allowedTags Tags that should not be stripped.
     * @return string The string with tags stripped.
     */
    public static function transformToNoTag($string, $allowedTags = null)
    {
        return strip_tags($string, $allowedTags); // Strip tags from the string
    }

    /**
     * Transforms the given string to lowercase.
     *
     * This method converts the input string to lowercase, with options to 
     * remove separators and spaces.
     *
     * @param string $string The input string to transform.
     * @param bool $removeSeparators Whether to remove separators.
     * @param bool $dropSpace Whether to remove spaces.
     * @return string The lowercase string.
     */
    public static function transformToLowercase(
        $string,
        $removeSeparators = false,
        $dropSpace = false
    ) {
        if ($removeSeparators)
        {
            $string = static::dropSeparator($string); // Remove separators if specified
        }
        if ($dropSpace)
        {
            $string = static::dropSpace($string); // Remove spaces if specified
        }
        return strtolower($string); // Convert to lowercase
    }

    /**
     * Transforms the given string to uppercase.
     *
     * This method converts the input string to uppercase, with options to 
     * remove separators and spaces.
     *
     * @param string $string The input string to transform.
     * @param bool $removeSeparators Whether to remove separators.
     * @param bool $removeSpace Whether to remove spaces.
     * @return string The uppercase string.
     */
    public static function transformToUppercase(
        $string,
        $removeSeparators = false,
        $removeSpace = false)
    {
        if ($removeSeparators)
        {
            $string = static::dropSeparator($string); // Remove separators if specified
        }
        if ($removeSpace)
        {
            $string = static::dropSpace($string); // Remove spaces if specified
        }
        return strtoupper($string); // Convert to uppercase
    }

    /**
     * Transforms the given string to lowercase, capitalizing the first character.
     *
     * This method converts the input string to lowercase, with options to 
     * remove separators and spaces.
     *
     * @param string $string The input string to transform.
     * @param bool $removeSeparators Whether to remove separators.
     * @param bool $removeSpace Whether to remove spaces.
     * @return string The string with the first character in lowercase.
     */
    public static function transformToLowercaseFirst(
        $string,
        $removeSeparators = false,
        $removeSpace = false
    ) {
        if ($removeSeparators)
        {
            $string = static::dropSeparator($string); // Remove separators if specified
        }
        if ($removeSpace)
        {
            $string = static::dropSpace($string); // Remove spaces if specified
        }
        return lcfirst($string); // Convert to lowercase first character
    }

    /**
     * Transforms the given string to uppercase, capitalizing the first character.
     *
     * This method converts the input string to uppercase, with options to 
     * remove separators and spaces.
     *
     * @param string $string The input string to transform.
     * @param bool $removeSeparators Whether to remove separators.
     * @param bool $removeSpace Whether to remove spaces.
     * @return string The string with the first character in uppercase.
     */
    public static function transformToUppercaseFirst(
        $string,
        $removeSeparators = false,
        $removeSpace = false
    ) {
        if ($removeSeparators)
        {
            $string = static::dropSeparator($string); // Remove separators if specified
        }
        if ($removeSpace)
        {
            $string = static::dropSpace($string); // Remove spaces if specified
        }
        return ucfirst($string); // Convert to uppercase first character
    }

    /**
     * Capitalizes the first letter of each word in the string.
     *
     * @param string $string The input string to capitalize.
     * @return string The capitalized string.
     */
    public static function transformToCapital($string)
    {
        return static::transformToUppercaseFirst(
            static::transformToLowercase($string)
        ); // Capitalize first letter of each word
    }

    /**
     * Transforms the given string to flatcase.
     *
     * This method replaces dashes and underscores with spaces, converts 
     * each word to lowercase, and removes spaces.
     *
     * @param string $string The input string to transform.
     * @return string The flatcase string.
     */
    public static function transformToFlatcase($string)
    {
        $string = static::setReplace($string, array("-", "_"), static::SPACE); // Replace dashes and underscores with spaces
        $string = explode(static::SPACE, $string); // Split the string into words
        foreach ($string as &$word)
        {
            $word = static::transformToLowercase($word); // Convert each word to lowercase
        }
        $string = implode(static::EMPTY , $string); // Join words without spaces
        return $string;
    }

    /**
     * Transforms the given string to PascalCase.
     *
     * This method replaces dashes and underscores with spaces, capitalizes 
     * each word, and joins them together.
     *
     * @param string $string The input string to transform.
     * @return string The PascalCase string.
     */
    public static function transformToPascalCase($string)
    {
        $string = static::setReplace($string, array("-", "_"), static::SPACE); // Replace dashes and underscores with spaces
        $string = explode(static::SPACE, $string); // Split the string into words
        foreach ($string as &$word)
        {
            $word = static::transformToLowercase($word, false, false); // Convert each word to lowercase
            $word = ucfirst($word); // Capitalize the first letter of each word
        }
        $string = implode(static::EMPTY , $string); // Join words without spaces
        return $string;
    }

    /**
     * Transforms the given string to camelCase.
     *
     * This method converts the input string to PascalCase and then lowers 
     * the first character.
     *
     * @param string $string The input string to transform.
     * @return string The camelCase string.
     */
    public static function transformToCamelcase($string)
    {
        return static::transformToLowercaseFirst(
            static::transformToPascalCase($string)
        ); // Convert to camelCase
    }

    /**
     * Transforms the given string to snake_case.
     *
     * This method replaces dashes and underscores with spaces, converts 
     * each word to lowercase, and joins them with underscores.
     *
     * @param string $string The input string to transform.
     * @return string The snake_case string.
     */
    public static function transformToSnakecase($string)
    {
        $string = static::setReplace($string, array("-", "_"), static::SPACE); // Replace dashes and underscores with spaces
        $string = explode(static::SPACE, $string); // Split the string into words
        foreach ($string as &$word)
        {
            $word = static::transformToLowercase($word, false, false); // Convert each word to lowercase
        }
        $string = implode("_", $string); // Join words with underscores
        return $string;
    }

    /**
     * Transforms the given string to MACROCASE.
     *
     * This method converts the input string to snake_case and then converts 
     * it to uppercase.
     *
     * @param string $string The input string to transform.
     * @return string The MACROCASE string.
     */
    public static function transformToMacrocase($string)
    {
        return static::transformToUppercase(static::transformToSnakecase($string)); // Convert to MACROCASE
    }

    /**
     * Transforms the given string to Pascal_Snake_Case.
     *
     * This method converts the input string to PascalCase and joins them 
     * with underscores.
     *
     * @param string $string The input string to transform.
     * @return string The Pascal_Snake_Case string.
     */
    public static function transformToPascalSnakecase($string)
    {
        $string = static::setReplace($string, array("-", "_"), static::SPACE); // Replace dashes and underscores with spaces
        $string = explode(static::SPACE, $string); // Split the string into words
        foreach ($string as &$word)
        {
            $word = static::transformToLowercase($word, false, false); // Convert each word to lowercase
            $word = ucfirst($word); // Capitalize the first letter of each word
        }
        $string = implode("_", $string); // Join words with underscores
        return $string;
    }

    /**
     * Transforms the given string to camel_snake_case.
     *
     * This method converts the input string to Pascal_Snake_Case and then 
     * lowers the first character.
     *
     * @param string $string The input string to transform.
     * @return string The camel_snake_case string.
     */
    public static function transformToCamelSnakecase($string)
    {
        return static::transformToLowercaseFirst(
            static::transformToPascalSnakecase($string)
        ); // Convert to camel_snake_case
    }

    /**
     * Transforms the given string to kebab-case.
     *
     * This method converts the input string to snake_case and replaces 
     * underscores with dashes.
     *
     * @param string $string The input string to transform.
     * @return string The kebab-case string.
     */
    public static function transformToKebabcase($string)
    {
        return static::setReplace(
            static::transformToSnakecase($string),
            "_",
            "-"
        ); // Convert to kebab-case
    }

    /**
     * Transforms the given string to COBOLCASE.
     *
     * This method converts the input string to kebab-case and then 
     * converts it to uppercase.
     *
     * @param string $string The input string to transform.
     * @return string The COBOLCASE string.
     */
    public static function transformToCobolcase($string)
    {
        return static::transformToUppercase(
            static::transformToKebabcase($string)
        ); // Convert to COBOLCASE
    }

    /**
     * Transforms the given string to train-case.
     *
     * This method converts the input string to Pascal_Snake_Case and 
     * replaces underscores with dashes.
     *
     * @param string $string The input string to transform.
     * @return string The train-case string.
     */
    public static function transformToTraincase($string)
    {
        return static::setReplace(
            static::transformToPascalSnakecase($string),
            "_",
            "-"
        ); // Convert to train-case
    }

    /**
     * Transforms the given string to its metaphone representation.
     *
     * This method returns the metaphone key for the input string.
     *
     * @param string $string The input string to transform.
     * @return string The metaphone representation of the string.
     */
    public static function transformToMetaphone($string)
    {
        return metaphone($string, 0); // Get the metaphone representation
    }

    /**
     * Transforms the given string to its soundex representation.
     *
     * This method returns the soundex key for the input string.
     *
     * @param string $string The input string to transform.
     * @return string The soundex representation of the string.
     */
    public static function transformToSoundex($string)
    {
        return soundex($string); // Get the soundex representation
    }

    # --------------------------------------------------------------------------
    # Is Methods
    # --------------------------------------------------------------------------
    #   This class provides utility methods to compare strings in various ways, 
    #   including equality checks and prefix/suffix evaluations.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as empty strings or 
    #       null values, appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    # --------------------------------------------------------------------------

    /**
     * Checks if two strings are equal.
     *
     * This method compares two strings for strict equality.
     *
     * @param string $string1 The first string to compare.
     * @param string $string2 The second string to compare.
     * @return bool Returns true if the strings are equal, false otherwise.
     */
    public static function isEqualTo($string1, $string2)
    {
        return $string1 === $string2; // Return true if both strings are strictly equal
    }

    /**
     * Checks if two strings are equal, ignoring case.
     *
     * This method converts both strings to lowercase and then compares them 
     * for equality.
     *
     * @param string $string1 The first string to compare.
     * @param string $string2 The second string to compare.
     * @return bool Returns true if the strings are equal (case-insensitive), false otherwise.
     */
    public static function isSameAs($string1, $string2)
    {
        return static::isEqualTo(
            static::transformToLowercase($string1), // Convert first string to lowercase
            static::transformToLowercase($string2), // Convert second string to lowercase
        );
    }

    /**
     * Checks if a string starts with a given substring.
     *
     * This method checks if the input string begins with the specified starting 
     * substring.
     *
     * @param string $string The string to check.
     * @param string $starting The substring to look for at the start.
     * @return bool Returns true if the string starts with the specified substring, false otherwise.
     */
    public static function isStartedBy($string, $starting)
    {
        return Polyfill::str_starts_with($string, $starting); // Check if the string starts with the given substring
    }

    /**
     * Checks if a string ends with a given substring.
     *
     * This method checks if the input string ends with the specified ending 
     * substring.
     *
     * @param string $string The string to check.
     * @param string $ending The substring to look for at the end.
     * @return bool Returns true if the string ends with the specified substring, false otherwise.
     */
    public static function isEndedWith($string, $ending)
    {
        return Polyfill::str_ends_with($string, $ending); // Check if the string ends with the given substring
    }

    /**
     * Checks if a string is a palindrome.
     *
     * @param string $string The input string to check.
     * @return bool True if the string is a palindrome, false otherwise.
     */
    public static function isPalindrome($string)
    {
        $cleanedString = preg_replace('/[^A-Za-z0-9]/', '', strtolower($string)); // Clean string
        return $cleanedString === strrev($cleanedString); // Check if cleaned string is the same forwards and backwards
    }

    # --------------------------------------------------------------------------
    # Estimate Methods
    # --------------------------------------------------------------------------
    #   This class provides utility methods to estimate string lengths and 
    #   character counts, accommodating different string handling functions.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as empty strings or 
    #       null values, appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    #   [4]. Consider implementing additional methods for string manipulations 
    #       or enhancements based on common use cases.
    # --------------------------------------------------------------------------

    /**
     * Estimates the length of a string.
     *
     * This method uses `mb_strlen` if available, otherwise falls back to 
     * `strlen` for length estimation.
     *
     * @param string $string The input string to estimate the length of.
     * @return int The estimated length of the string.
     */
    public static function estimateLength($string)
    {
        if (function_exists("\mb_strlen"))
        {
            return mb_strlen($string); // Use mb_strlen for multibyte strings if available
        }
        return strlen($string); // Fallback to strlen for regular strings
    }

    /**
     * Estimates the counts of each character in a string.
     *
     * This method converts the string to an array of characters and counts 
     * the occurrences of each character.
     *
     * @param string $string The input string to estimate character counts.
     * @return array An associative array where keys are characters and values 
     *               are their respective counts.
     */
    public static function estimateCounts($string)
    {
        $counts = array(); // Initialize an array to hold character counts
        $array = static::toArray($string); // Convert the string to an array of characters
        foreach ($array as $character)
        {
            if (!isset($counts[$character]))
            {
                $counts[$character] = 0; // Initialize count for new characters
            }
            $counts[$character]++; // Increment the count for the character
        }
        return $counts; // Return the associative array of character counts
    }

    /**
     * Compares two strings and returns a similarity score.
     *
     * @param string $string1 The first string to compare.
     * @param string $string2 The second string to compare.
     * @return float A similarity score between 0 and 1, where 1 means identical.
     */
    public static function estimateSimilarity($string1, $string2)
    {
        $percent = 0;
        similar_text($string1, $string2, $percent);
        return $percent / 100; // Return similarity as a value between 0 and 1
    }

    # --------------------------------------------------------------------------
    # Merge Methods
    # --------------------------------------------------------------------------
    #   This functions are utility methods to merge multiple strings into a 
    #   single string with a specified separator.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as empty input or 
    #       null values, appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    #   [4]. Consider implementing additional methods for different merging 
    #       strategies or formats based on common use cases.
    # --------------------------------------------------------------------------

    /**
     * Merges multiple strings into a single string using a specified separator.
     *
     * This method takes a variable number of string arguments, removes the 
     * first argument (the separator), and concatenates the remaining strings 
     * with the specified separator.
     *
     * @param string $separator The separator to use between the strings.
     * @return string The merged string with the specified separator.
     */
    public static function merge($separator)
    {
        $strings = func_get_args(); // Retrieve all arguments as an array
        array_shift($strings); // Remove the first argument (separator)
        return implode($separator, $strings); // Merge the remaining strings with the separator
    }

    # --------------------------------------------------------------------------
    # Split Methods
    # --------------------------------------------------------------------------
    #   This class provides utility methods to split strings into segments or 
    #   based on a specified separator.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as empty strings or 
    #       invalid segment lengths, appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    #   [4]. Consider implementing additional methods for other splitting 
    #       strategies or formats based on common use cases.
    # --------------------------------------------------------------------------

    /**
     * Splits a string into segments of specified length.
     *
     * This method uses `mb_str_split` from the Polyfill to handle multibyte 
     * characters properly.
     *
     * @param string $string The input string to be split.
     * @param int $segmentLength The length of each segment.
     * @return array An array of string segments.
     */
    public static function split($string, $segmentLength)
    {
        return Polyfill::mb_str_split($string, $segmentLength); // Split the string into segments of specified length
    }

    /**
     * Splits a string by a specified separator.
     *
     * This method uses `explode` to divide the string into an array based on 
     * the provided separator.
     *
     * @param string $string The input string to be split.
     * @param string $separator The separator to split the string by.
     * @return array An array of substrings created by splitting the input string.
     */
    public static function splitBy($string, $separator)
    {
        return explode($separator, $string); // Split the string by the specified separator
    }

    # --------------------------------------------------------------------------
    # Export/Import/Convert Methods
    # --------------------------------------------------------------------------
    #   This functions provides utility methods to convert between various data 
    #   formats, including string, hexadecimal, ASCII, and numeric types.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as invalid inputs or 
    #       unexpected data types, appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    #   [4]. Consider implementing additional methods for other conversion 
    #       strategies or formats based on common use cases.
    # --------------------------------------------------------------------------

    /**
     * Converts a string to its hexadecimal representation.
     *
     * @param string $string The input string to convert.
     * @return string The hexadecimal representation of the input string.
     */
    public static function toHex($string)
    {
        return bin2hex($string); // Convert string to hexadecimal
    }

    /**
     * Converts a hexadecimal string back to its original form.
     *
     * @param string $string The hexadecimal string to convert.
     * @return string The original string represented by the hexadecimal input.
     */
    public static function fromHex($string)
    {
        return hex2bin($string); // Convert hexadecimal back to string
    }

    /**
     * Converts a character to its ASCII value.
     *
     * @param string $character The character to convert.
     * @return int The ASCII value of the character.
     */
    public static function toAscii($character)
    {
        return Polyfill::mb_ord($character); // Get ASCII value of the character
    }

    /**
     * Converts an ASCII value back to its corresponding character.
     *
     * @param int $ascii The ASCII value to convert.
     * @return string The character represented by the ASCII value.
     */
    public static function fromAscii($ascii)
    {
        return Polyfill::mb_chr($ascii); // Get character from ASCII value
    }

    /**
     * Formats values into a string according to a specified format.
     *
     * @param string $format The format string.
     * @return string The formatted string.
     */
    public static function toFormat($format)
    {
        $values = func_get_args(); // Retrieve all arguments as an array
        array_shift($values); // Remove the first argument (format)
        return vsprintf($format, $values); // Format the values into a string
    }

    /**
     * Parses a string according to a specified format.
     *
     * @param string $string The input string to parse.
     * @param string $format The format string.
     * @return array An array of parsed values.
     */
    public static function fromFormat($string, $format)
    {
        return sscanf($string, $format); // Parse the string according to the format
    }

    /**
     * Converts a string into an array of its characters.
     *
     * @param string $string The input string to convert.
     * @return array An array of characters from the string.
     */
    public static function toArray($string)
    {
        return Polyfill::mb_str_split($string, 1); // Split string into an array of characters
    }

    /**
     * Converts a string into an array using a custom separator.
     *
     * @param string $string The input string to convert.
     * @param string $separator The separator to use for splitting the string.
     * @return array An array of substrings created by splitting the input string.
     */
    public static function toArrayWithSeparator($string, $separator)
    {
        return explode($separator, $string); // Split the string by the specified separator
    }

    /**
     * Converts an array of strings back into a single string.
     *
     * @param array $array The array of strings to join.
     * @param string $separator The separator to use when joining.
     * @return string The joined string.
     */
    public static function fromArray($array, $separator = "")
    {
        return implode($separator, $array); // Join the array into a string
    }

    /**
     * Converts a string to an integer.
     *
     * @param string $string The input string to convert.
     * @return int The integer value of the string.
     */
    public static function toInteger($string)
    {
        return (int) $string; // Convert string to integer
    }

    /**
     * Converts an integer back to a string.
     *
     * @param int $integer The integer to convert.
     * @return string The string representation of the integer.
     */
    public static function fromInteger($integer)
    {
        return (string) $integer; // Convert integer to string
    }

    /**
     * Converts a string to a float.
     *
     * @param string $string The input string to convert.
     * @return float The float value of the string.
     */
    public static function toFloat($string)
    {
        return (float) $string; // Convert string to float
    }

    /**
     * Converts a float back to a string.
     *
     * @param float $float The float to convert.
     * @return string The string representation of the float.
     */
    public static function fromFloat($float)
    {
        return (string) $float; // Convert float to string
    }

    /**
     * Converts a string to a boolean value.
     *
     * @param string $string The input string to convert.
     * @return bool The boolean value represented by the string.
     */
    public static function toBoolean($string)
    {
        if (
            in_array(
                static::transformToLowercase($string),
                array(
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
                    "null",
                ),
            )
        )
        {
            return false; // Return false for specific false-equivalent strings
        }
        return true; // Return true for all other strings
    }

    /**
     * Converts a boolean value to its string representation.
     *
     * @param bool $boolean The boolean to convert.
     * @return string "true" or "false" based on the boolean value.
     */
    public static function fromBoolean($boolean)
    {
        return $boolean ? "true" : "false"; // Convert boolean to string
    }

    # --------------------------------------------------------------------------
    # Encode/Decode Methods
    # --------------------------------------------------------------------------
    #   This function provide utility methods to transform strings using various 
    #   encoding and decoding techniques, including ROT13, slashes, UU encoding, 
    #   and HTML entities.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as null or invalid inputs, 
    #       appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    #   [4]. Consider implementing additional methods for other transformation 
    #       strategies or formats based on common use cases.
    # --------------------------------------------------------------------------

    /**
     * Encodes a string using ROT13.
     *
     * @param string $string The input string to encode.
     * @return string The ROT13 encoded string.
     */
    public static function inRot($string)
    {
        return str_rot13($string); // Encode the string using ROT13
    }

    /**
     * Decodes a string using ROT13.
     *
     * @param string $string The input string to decode.
     * @return string The ROT13 decoded string.
     */
    public static function ofRot($string)
    {
        return str_rot13($string); // Decode the string using ROT13
    }

    /**
     * Escapes special characters in a string using slashes.
     *
     * @param string $string The input string to escape.
     * @return string The escaped string with slashes.
     */
    public static function inSlashes($string)
    {
        return addslashes($string); // Escape special characters in the string
    }

    /**
     * Unescapes special characters in a string.
     *
     * @param string $string The input string to unescape.
     * @return string The unescaped string.
     */
    public static function ofSlashes($string)
    {
        return stripslashes($string); // Unescape special characters in the string
    }

    /**
     * Encodes a string using UU encoding.
     *
     * @param string $string The input string to encode.
     * @return string The UU encoded string.
     */
    public static function inUU($string)
    {
        return convert_uuencode($string); // Encode the string using UU encoding
    }

    /**
     * Decodes a UU encoded string.
     *
     * @param string $string The UU encoded string to decode.
     * @return string The decoded string.
     */
    public static function ofUU($string)
    {
        return convert_uudecode($string); // Decode the UU encoded string
    }

    /**
     * Converts special characters to HTML entities.
     *
     * @param string $string The input string to convert.
     * @return string The string with special characters converted to HTML entities.
     */
    public static function inSafeCharacters($string)
    {
        return htmlspecialchars($string); // Convert special characters to HTML entities
    }

    /**
     * Converts HTML entities back to their corresponding characters.
     *
     * @param string $string The input string with HTML entities.
     * @return string The decoded string with HTML entities converted back.
     */
    public static function ofSafeCharacters($string)
    {
        return htmlspecialchars_decode($string); // Decode HTML entities back to characters
    }

    /**
     * Converts special characters to HTML entities with quotes.
     *
     * @param string $string The input string to convert.
     * @return string The string with special characters converted to HTML entities.
     */
    public static function inHtmlEntities($string)
    {
        return htmlentities($string, ENT_QUOTES); // Convert special characters to HTML entities
    }

    /**
     * Converts HTML entities back to their corresponding characters with quotes.
     *
     * @param string $string The input string with HTML entities.
     * @return string The decoded string with HTML entities converted back.
     */
    public static function ofHtmlEntities($string)
    {
        return html_entity_decode($string, ENT_QUOTES); // Decode HTML entities back to characters
    }

    # --------------------------------------------------------------------------
    # Hashing Methods
    # --------------------------------------------------------------------------
    #   This class provides utility methods for hashing strings using various 
    #   algorithms, including MD5, SHA-1, and checksum validation.
    #
    #   Contributing Roles:
    #   [1]. All methods MUST be named clearly to reflect their functionality, 
    #       following the camelCase naming standard.
    #   [2]. Each method should handle edge cases, such as null or empty strings, 
    #       appropriately.
    #   [3]. Ensure that all methods are well-documented with PHPDoc comments 
    #       and inline comments for clarity.
    #   [4]. Consider implementing additional methods for other hashing algorithms 
    #       or validation strategies based on common use cases.
    # --------------------------------------------------------------------------

    /**
     * Generates an MD5 hash of a given string.
     *
     * @param string $string The input string to hash.
     * @return string The MD5 hash of the input string.
     */
    public static function hashMD5($string)
    {
        return md5($string, false); // Generate MD5 hash without raw output
    }

    /**
     * Generates a SHA-1 hash of a given string.
     *
     * @param string $string The input string to hash.
     * @return string The SHA-1 hash of the input string.
     */
    public static function hashSHA($string)
    {
        return sha1($string); // Generate SHA-1 hash
    }

    /**
     * Generates a checksum for a given string using SHA-1.
     *
     * @param string $string The input string to hash.
     * @return string The hashed checksum of the input string.
     */
    public static function hashChecksum($string)
    {
        return Polyfill::password_hash(sha1($string)); // Create a hashed checksum using SHA-1
    }

    /**
     * Validates a given string against a provided checksum.
     *
     * @param string $string The input string to validate.
     * @param string $checksum The checksum to verify against.
     * @return bool True if the string matches the checksum, false otherwise.
     */
    public static function validateChecksum($string, $checksum)
    {
        return Polyfill::password_verify(sha1($string), $checksum); // Verify the string against the checksum
    }

}