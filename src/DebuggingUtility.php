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
 * Class DebugUtility
 * A utility class for debugging purposes with static methods.
 */
class DebuggingUtility
{

    /**
     * Prints a variable in a readable format.
     *
     * @param mixed $var The variable to print.
     * @return void
     */
    public static function printVar($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    /**
     * Logs a message to a specified log file.
     *
     * @param string $message The message to log.
     * @param string $file The log file path (default is 'debug.log').
     * @return void
     */
    public static function log($message, $file = 'debug.log')
    {
        $date = date('Y-m-d H:i:s');
        error_log("[$date] $message\n", 3, $file);
    }

    /**
     * Dumps a variable with type information.
     *
     * @param mixed $var The variable to dump.
     * @return void
     */
    public static function dumpVar($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    /**
     * Checks and displays the execution time of a script.
     *
     * @param float $startTime The start time of the script.
     * @return void
     */
    public static function executionTime($startTime)
    {
        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;
        self::log("Execution time: {$executionTime} seconds");
        echo "Execution time: {$executionTime} seconds";
    }

    /**
     * Displays and logs the current memory usage.
     *
     * @return void
     */
    public static function memoryUsage()
    {
        $memoryUsage = memory_get_usage();
        self::log("Memory usage: {$memoryUsage} bytes");
        echo "Memory usage: {$memoryUsage} bytes";
    }

    /**
     * Handles errors and logs them.
     *
     * @param string $errorMessage The error message to log.
     * @param string $file The log file path (default is 'debug.log').
     * @return void
     */
    public static function handleError($errorMessage, $file = 'debug.log')
    {
        self::log("Error: $errorMessage", $file);
        echo "Error: $errorMessage";
    }

    /**
     * Outputs a formatted message.
     *
     * @param string $message The message to format and output.
     * @param string $format The format for the message (default is 'info').
     * @return void
     */
    public static function formatMessage($message, $format = 'info')
    {
        switch ($format)
        {
            case 'info':
                echo "<div style='color: blue;'>INFO: $message</div>";
                break;
            case 'warning':
                echo "<div style='color: orange;'>WARNING: $message</div>";
                break;
            case 'error':
                echo "<div style='color: red;'>ERROR: $message</div>";
                break;
            default:
                echo "<div>$message</div>";
                break;
        }
    }

    /**
     * Traces the call stack and logs it.
     *
     * @return void
     */
    public static function trace()
    {
        $backtrace = debug_backtrace();
        self::log("Trace: " . print_r($backtrace, true));
        echo '<pre>Trace: ' . print_r($backtrace, true) . '</pre>';
    }
}