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

class FileUtility
{
    /**
     * Reads data from a JSON file.
     *
     * @param string $file The path to the JSON file.
     * @return array|null The decoded data as an associative array, or null on failure.
     */
    public static function readFromJson($file)
    {
        if (!file_exists($file))
        {
            return null;
        }
        $jsonContent = file_get_contents($file);
        if ($jsonContent === false)
        {
            return null;
        }
        $data = json_decode($jsonContent, true);
        return $data;
    }

    /**
     * Writes data to a JSON file.
     *
     * @param array $data The data to be encoded and written to the file.
     * @param string $file The path to the JSON file.
     * @return bool True on success, false on failure.
     */
    public static function writeToJson($data, $file)
    {
        $jsonContent = json_encode($data, JSON_PRETTY_PRINT);

        if ($jsonContent === false)
        {
            return false;
        }

        if (!is_dir(dirname($file)))
        {
            return false; // Return false if the directory does not exist
        }

        return file_put_contents($file, json_encode($data)) !== false;
    }

    /**
     * Reads data from a YAML file.
     *
     * @param string $file The path to the YAML file.
     * @return array|null The parsed data as an associative array, or null on failure.
     */
    public static function readFromYaml($file)
    {
        if (!file_exists($file))
        {
            return null;
        }
        $yamlContent = file_get_contents($file);
        if ($yamlContent === false)
        {
            return null;
        }
        $data = Polyfill::yaml_parse($yamlContent);
        return $data;
    }

    /**
     * Writes data to a YAML file.
     *
     * @param array $data The data to be encoded and written to the file.
     * @param string $file The path to the YAML file.
     * @return bool True on success, false on failure.
     */
    public static function writeToYaml($data, $file)
    {
        $yamlContent = Polyfill::yaml_emit($data);
        if ($yamlContent === false)
        {
            return false;
        }
        $result = file_put_contents($file, $yamlContent);
        return $result !== false;
    }

    /**
     * Reads data from an INI file.
     *
     * @param string $file The path to the INI file.
     * @return array|null The parsed data as an associative array, or null on failure.
     */
    public static function readFromIni($file)
    {
        if (!file_exists($file))
        {
            return null;
        }
        $data = parse_ini_file($file, true);
        return $data;
    }

    /**
     * Writes data to an INI file.
     *
     * @param array $data The data to be encoded and written to the file.
     * @param string $file The path to the INI file.
     * @return bool True on success, false on failure.
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
        $result = file_put_contents($file, $iniContent);
        return $result !== false;
    }

    /**
     * Reads data from an XML file.
     *
     * @param string $file The path to the XML file.
     * @return array|null The parsed data as an associative array, or null on failure.
     */
    public static function readFromXml($file)
    {
        if (!file_exists($file))
        {
            return null;
        }
        $xmlContent = file_get_contents($file);
        if ($xmlContent === false)
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
        $result = file_put_contents($file, $xmlContent);
        return $result !== false;
    }

    /**
     * Reads a value from the .env file.
     *
     * @param string $key The key of the environment variable.
     * @return string|null The value of the environment variable or null if not found.
     */
    public static function readFromEnv($file)
    {
        $env = parse_ini_file($file); // Parse the .env file
        return $env; // Return the value or null if not found
    }

    /**
     * Writes a value to the .env file.
     *
     * @param string $key The key of the environment variable.
     * @param string $value The value to set.
     * @return bool True on success, false on failure.
     */
    public static function writeToEnv($data, $file)
    {
        $content = '';

        foreach ($data as $k => $v)
        {
            $content .= "$k=\"$v\"\n"; // Quote values to handle spaces
        }

        return file_put_contents($file, $content) !== false;
    }
}
