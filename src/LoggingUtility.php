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
 * Class LoggerUtility
 * A utility class for handling logging functionalities.
 */
class LoggingUtility
{
    private static $logFile = null;
    private static $logToConsole = false;

    /**
     * Sets the log file path.
     *
     * @param string $logFile The file where logs will be written.
     */
    public static function setLogFile($logFile)
    {
        if (@file_exists($logFile) && is_writable($logFile))
        {
            static::$logFile = $logFile;
        }
        else
        {
            throw new InvalidArgumentException("The specified log file does not exist or is not writable.");
        }
    }

    /**
     * Sets whether to log messages to the console.
     *
     * @param bool $logToConsole Whether to log messages to the console.
     */
    public static function setLogToConsole($logToConsole)
    {
        static::$logToConsole = $logToConsole;
    }

    /**
     * Logs an info message.
     *
     * @param string $message The message to log.
     */
    public static function logInfo($message)
    {
        static::log($message, 'INFO');
    }

    /**
     * Logs a warning message.
     *
     * @param string $message The message to log.
     */
    public static function logWarning($message)
    {
        static::log($message, 'WARNING');
    }

    /**
     * Logs an error message.
     *
     * @param string $message The message to log.
     */
    public static function logError($message)
    {
        static::log($message, 'ERROR');
    }

    /**
     * Writes a log message to the file and optionally to the console.
     *
     * @param string $message The message to log.
     * @param string $level The log level (INFO, WARNING, ERROR).
     */
    private static function log($message, $level)
    {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] [$level] $message" . PHP_EOL;

        // Check if the log file exists and is writable
        if (null !== static::$logFile)
        {
            if (file_exists(static::$logFile) && is_writable(static::$logFile))
            {
                // Write to log file
                file_put_contents(static::$logFile, $logMessage, FILE_APPEND);
            }
            else
            {
                // Write to syslog if the file doesn't exist or is not writable
                openlog('PHPallas', LOG_PID | LOG_PERROR, LOG_USER);
                syslog(LOG_ERR, $logMessage);
                closelog();
            }
        }
        else
        {
            // Write to syslog if the $file is not populated properly
            openlog('PHPallas', LOG_PID | LOG_PERROR, LOG_USER);
            syslog(LOG_ERR, $logMessage);
            closelog();
        }

        // Optionally log to console
        if (static::$logToConsole)
        {
            echo $logMessage;
        }
    }

    /**
     * Gets the contents of the log file.
     *
     * @return string The contents of the log file.
     */
    public static function getLogContents()
    {
        return file_get_contents(static::$logFile);
    }
}