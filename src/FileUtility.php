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
 * Class FileUtility
 * 
 * A utility class providing methods to read, write, manipulate and other 
 * operations upon files.
 *
 * @since 1.2.0
 */
class FileUtility
{
    /**
     * Creates a directory at the specified path.
     *
     * @param string $path The path of the directory to create.
     * @param int $permissions The permissions to set for the new directory (default is 0777).
     * @param bool $recursive Whether to create directories recursively (default is true).
     * @return void
     */
    public static function createDirectory($path, $permissions = 0777, $recursive = true)
    {
        mkdir($path, $permissions, $recursive);
    }

    /**
     * Loads the content of a file.
     *
     * @param string $file The path to the file.
     * @return string|null The content of the file, or null if the file does not exist.
     */
    public static function loadFileContent($file)
    {
        if (static::fileExists($file))
        {
            return file_get_contents($file);
        }
        return null;
    }

    /**
     * Writes content to a specified file.
     *
     * @param string $file The path to the file.
     * @param string $content The content to write to the file.
     * @return int|false The number of bytes written to the file, or false on failure.
     */
    public static function writeToFile($file, $content)
    {
        $directoryPath = dirname($file);

        // Check if the directory exists, if not create it
        if (static::isNotDirectory($directoryPath))
        {
            static::createDirectory($directoryPath); // Create the directory recursively
        }

        return file_put_contents($file, $content);
    }

    /**
     * Checks if the specified path is a directory.
     *
     * @param string $path The path to check.
     * @return bool True if the path is a directory, false otherwise.
     */
    public static function isDirectory($path)
    {
        return is_dir($path);
    }

    /**
     * Checks if the specified path is not a directory.
     *
     * @param string $path The path to check.
     * @return bool True if the path is not a directory, false otherwise.
     */
    public static function isNotDirectory($path)
    {
        return BooleanUtility::not(is_dir($path));
    }

    /**
     * Checks if a file exists.
     *
     * @param string $file The path to the file.
     * @return bool True if the file exists and is not a directory, false otherwise.
     */
    public static function fileExists($file)
    {
        if (@file_exists($file) && static::isNotDirectory($file))
        {
            return BooleanUtility::TRUE;
        }
        return BooleanUtility::FALSE;
    }

    /**
     * Checks if a file does not exist.
     *
     * @param string $file The path to the file.
     * @return bool True if the file does not exist, false otherwise.
     */
    public static function fileNotExists($file)
    {
        return BooleanUtility::not(static::fileExists($file));
    }

    /**
     * Reads data from a JSON file.
     *
     * @param string $file The path to the JSON file.
     * @return array|null The decoded data as an associative array, or null on failure.
     * @since 1.2.0
     */
    public static function readFromJson($file)
    {
        if (static::fileNotExists($file))
        {
            return null;
        }
        $jsonContent = static::loadFileContent($file);
        if (null === $jsonContent)
        {
            return null;
        }
        $data = json_decode($jsonContent, BooleanUtility::TRUE);
        return $data;
    }

    /**
     * Writes data to a JSON file.
     *
     * @param array $data The data to be encoded and written to the file.
     * @param string $file The path to the JSON file.
     * @return bool True on success, false on failure.
     * @since 1.2.0
     */
    public static function writeToJson($data, $file)
    {
        $jsonContent = json_encode($data, JSON_PRETTY_PRINT);

        if (BooleanUtility::FALSE === $jsonContent)
        {
            return BooleanUtility::FALSE;
        }

        if (static::isNotDirectory(dirname($file)))
        {
            return BooleanUtility::FALSE; // Return false if the directory does not exist
        }

        return BooleanUtility::FALSE !== static::writeToFile($file, $jsonContent);
    }

    /**
     * Reads data from a YAML file.
     *
     * @param string $file The path to the YAML file.
     * @return array|null The parsed data as an associative array, or null on failure.
     * @since 1.2.0
     */
    public static function readFromYaml($file)
    {
        if (static::fileNotExists($file))
        {
            return null;
        }
        $yamlContent = static::loadFileContent($file);
        if (BooleanUtility::FALSE === $yamlContent)
        {
            return null;
        }
        return Polyfill::yaml_parse($yamlContent);
    }

    /**
     * Writes data to a YAML file.
     *
     * @param array $data The data to be encoded and written to the file.
     * @param string $file The path to the YAML file.
     * @return bool True on success, false on failure.
     * @since 1.2.0
     */
    public static function writeToYaml($data, $file)
    {
        $yamlContent = Polyfill::yaml_emit($data);
        if (BooleanUtility::FALSE === $yamlContent)
        {
            return BooleanUtility::FALSE;
        }
        $result = static::writeToFile($file, $yamlContent);
        return BooleanUtility::FALSE !== $result;
    }

    /**
     * Reads data from an INI file.
     *
     * @param string $file The path to the INI file.
     * @return array|null The parsed data as an associative array, or null on failure.
     * @since 1.2.0
     */
    public static function readFromIni($file)
    {
        if (static::fileNotExists($file))
        {
            return null;
        }
        $data = static::loadFileContent($file);
        return parse_ini_string($data, BooleanUtility::TRUE);
    }

    /**
     * Writes data to an INI file.
     *
     * @param array $data The data to be encoded and written to the file.
     * @param string $file The path to the INI file.
     * @return bool True on success, false on failure.
     * @since 1.2.0
     */
    public static function writeToIni($data, $file)
    {
        $iniContent = '';
        foreach ($data as $section => $values)
        {
            $iniContent .= "[$section]\n";
            foreach ($values as $key => $value)
            {
                $iniContent .= "$key = \"$value\"\n";
            }
        }
        $result = static::writeToFile($file, $iniContent);
        return BooleanUtility::FALSE !== $result;
    }

    /**
     * Reads data from an XML file.
     *
     * @param string $file The path to the XML file.
     * @return array|null The parsed data as an associative array, or null on failure.
     * @since 1.2.0
     */
    public static function readFromXml($file)
    {
        if (static::fileNotExists($file))
        {
            return null;
        }
        $xmlContent = static::loadFileContent($file);
        if (BooleanUtility::FALSE === $xmlContent)
        {
            return null;
        }
        return Polyfill::xmlToArray($xmlContent); // Convert XML to array
    }

    /**
     * Writes data to an XML file.
     *
     * @param array $data The data to be encoded and written to the file.
     * @param string $file The path to the XML file.
     * @return bool True on success, false on failure.
     */
    public static function writeToXml($data, $file)
    {
        $xmlContent = Polyfill::arrayToXml($data); // Convert array to XML
        $result = static::writeToFile($file, $xmlContent);
        return BooleanUtility::FALSE !== $result;
    }

    /**
     * Reads key-value pairs from a .env file.
     *
     * @param string $file The path to the .env file.
     * @return array|null The parsed environment variables as an associative array, or null on failure.
     * @since 1.2.0
     */
    public static function readFromEnv($file)
    {
        $data = static::loadFileContent($file);
        $env = parse_ini_string($data, BooleanUtility::TRUE); // Parse the .env file
        return $env; // Return the parsed environment variables
    }

    /**
     * Writes key-value pairs to a .env file.
     *
     * @param array $data The key-value pairs to be written to the .env file.
     * @param string $file The path to the .env file.
     * @return bool True on success, false on failure.
     * @since 1.2.0
     */
    public static function writeToEnv($data, $file)
    {
        $content = '';

        foreach ($data as $k => $v)
        {
            $content .= "$k=\"$v\"\n"; // Quote values to handle spaces
        }

        return BooleanUtility::FALSE !== static::writeToFile($file, $content);
    }
}
