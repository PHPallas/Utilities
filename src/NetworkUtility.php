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
 * Class NetworkUtility
 * A utility class for handling network-related tasks.
 */
class NetworkUtility
{
    /**
     * Checks if the internet is reachable.
     *
     * @return bool True if the internet is reachable, false otherwise.
     */
    public static function isInternetAvailable()
    {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            fclose($connected);
            return true;
        }
        return false;
    }

    /**
     * Pings a host to check its availability.
     *
     * @param string $host The host to ping.
     * @param int $timeout Optional. The timeout in seconds for the ping.
     * @return bool True if the host is reachable, false otherwise.
     */
    public static function ping($host, $timeout = 1)
    {
        $output = null;
        $result = null;

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $result = exec("ping -n 1 -w " . ($timeout * 1000) . " " . escapeshellarg($host), $output);
        } else {
            $result = exec("ping -c 1 -W " . $timeout . " " . escapeshellarg($host), $output);
        }

        return strpos(implode("\n", $output), '0% packet loss') !== false;
    }

    /**
     * Resolves a domain name to its IP address.
     *
     * @param string $domain The domain name to resolve.
     * @return string|null The resolved IP address or null if it fails.
     */
    public static function resolveDomain($domain)
    {
        $ip = gethostbyname($domain);
        return ($ip !== $domain) ? $ip : null;
    }

    /**
     * Gets the local IP address of the machine.
     *
     * @return string|null The local IP address or null if it cannot be determined.
     */
    public static function getLocalIp()
    {
        $localIp = null;
        $hostname = gethostname();
        if ($hostname) {
            $localIp = gethostbyname($hostname);
        }
        return $localIp;
    }

    /**
     * Gets the public IP address of the machine.
     *
     * @return string|null The public IP address or null if it cannot be determined.
     */
    public static function getPublicIp()
    {
        $response = @file_get_contents('https://api.ipify.org');
        return $response ?: null;
    }

    /**
     * Checks the status of a URL.
     *
     * @param string $url The URL to check.
     * @return int|null The HTTP status code or null if the request fails.
     */
    public static function checkUrlStatus($url)
    {
        $headers = @get_headers($url);
        if ($headers) {
            return (int) substr($headers[0], 9, 3);
        }
        return null;
    }

    /**
     * Gets the HTTP headers of a URL.
     *
     * @param string $url The URL to retrieve headers from.
     * @return array|null The HTTP headers or null if the request fails.
     */
    public static function getUrlHeaders($url)
    {
        $headers = @get_headers($url, 1);
        return $headers ?: null;
    }

    /**
     * Tests the speed of a connection to a specified URL.
     *
     * @param string $url The URL to test.
     * @return float|null The time taken to connect in seconds or null if it fails.
     */
    public static function testConnectionSpeed($url)
    {
        $startTime = microtime(true);
        $response = @file_get_contents($url);
        $endTime = microtime(true);

        return $response !== false ? $endTime - $startTime : null;
    }
}