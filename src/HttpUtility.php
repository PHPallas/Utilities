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

use SoapClient;
use SoapFault;
use Exception;

/**
 * Class HttpUtility
 * A utility class for handling HTTP requests and responses.
 */
class HttpUtility
{
    /**
     * Sends an HTTP GET request.
     *
     * @param string $url The URL to send the request to.
     * @param array $headers Optional. Headers to include in the request.
     * @param array $options Optional. Additional options for the request.
     * @return string The response from the request.
     */
    public static function sendGetRequest($url, $headers = [], $options = [])
    {
        $options = array_merge(['timeout' => 30], $options);
        $httpOptions = [
            'http' => [
                'header' => static::formatHeaders($headers),
                'method' => 'GET',
                'timeout' => $options['timeout'],
            ],
        ];

        return static::makeRequest($url, $httpOptions);
    }

    /**
     * Sends an HTTP POST request.
     *
     * @param string $url The URL to send the request to.
     * @param array $data The data to send in the request body.
     * @param array $headers Optional. Headers to include in the request.
     * @param array $options Optional. Additional options for the request.
     * @return string The response from the request.
     */
    public static function sendPostRequest($url, $data, $headers = [], $options = [])
    {
        $options = array_merge(['timeout' => 30], $options);
        $httpOptions = [
            'http' => [
                'header' => static::formatHeaders(array_merge($headers, ['Content-Type: application/x-www-form-urlencoded'])),
                'method' => 'POST',
                'content' => http_build_query($data),
                'timeout' => $options['timeout'],
            ],
        ];

        return static::makeRequest($url, $httpOptions);
    }

    /**
     * Sends an HTTP PUT request.
     *
     * @param string $url The URL to send the request to.
     * @param array $data The data to send in the request body.
     * @param array $headers Optional. Headers to include in the request.
     * @param array $options Optional. Additional options for the request.
     * @return string The response from the request.
     */
    public static function sendPutRequest($url, $data, $headers = [], $options = [])
    {
        $options = array_merge(['timeout' => 30], $options);
        $httpOptions = [
            'http' => [
                'header' => static::formatHeaders(array_merge($headers, ['Content-Type: application/json'])),
                'method' => 'PUT',
                'content' => json_encode($data),
                'timeout' => $options['timeout'],
            ],
        ];

        return static::makeRequest($url, $httpOptions);
    }

    /**
     * Sends an HTTP DELETE request.
     *
     * @param string $url The URL to send the request to.
     * @param array $headers Optional. Headers to include in the request.
     * @param array $options Optional. Additional options for the request.
     * @return string The response from the request.
     */
    public static function sendDeleteRequest($url, $headers = [], $options = [])
    {
        $options = array_merge(['timeout' => 30], $options);
        $httpOptions = [
            'http' => [
                'header' => static::formatHeaders($headers),
                'method' => 'DELETE',
                'timeout' => $options['timeout'],
            ],
        ];

        return static::makeRequest($url, $httpOptions);
    }

    /**
     * Sends a GraphQL request.
     *
     * @param string $url The URL to send the request to.
     * @param string $query The GraphQL query.
     * @param array $variables Optional. Variables for the query.
     * @param array $headers Optional. Headers to include in the request.
     * @param array $options Optional. Additional options for the request.
     * @return string The response from the request.
     */
    public static function sendGraphQLRequest($url, $query, $variables = [], $headers = [], $options = [])
    {
        $options = array_merge(['timeout' => 30], $options);
        $payload = [
            'query' => $query,
            'variables' => $variables,
        ];

        $httpOptions = [
            'http' => [
                'header' => static::formatHeaders(array_merge($headers, ['Content-Type: application/json'])),
                'method' => 'POST',
                'content' => json_encode($payload),
                'timeout' => $options['timeout'],
            ],
        ];

        return static::makeRequest($url, $httpOptions);
    }

    /**
     * Sends a SOAP request.
     *
     * @param string $url The URL to send the request to.
     * @param string $xml The XML data to send in the request body.
     * @param array $headers Optional. Headers to include in the request.
     * @param array $options Optional. Additional options for the request.
     * @return string The response from the request.
     */
    public static function sendSoapRequest($url, $xml, $headers = [], $options = [])
    {
        $options = array_merge(['timeout' => 30], $options);
        $httpOptions = [
            'http' => [
                'header' => static::formatHeaders(array_merge($headers, ['Content-Type: text/xml; charset=utf-8'])),
                'method' => 'POST',
                'content' => $xml,
                'timeout' => $options['timeout'],
            ],
        ];

        return static::makeRequest($url, $httpOptions);
    }

    /**
     * Sends a JSON-RPC request.
     *
     * @param string $url The URL to send the request to.
     * @param string $method The JSON-RPC method to call.
     * @param array $params Optional. Parameters for the method.
     * @param array $headers Optional. Headers to include in the request.
     * @param array $options Optional. Additional options for the request.
     * @return string The response from the request.
     */
    public static function sendJsonRpcRequest($url, $method, $params = [], $headers = [], $options = [])
    {
        $options = array_merge(['timeout' => 30], $options);
        $payload = [
            'jsonrpc' => '2.0',
            'method' => $method,
            'params' => $params,
            'id' => uniqid(),
        ];

        $httpOptions = [
            'http' => [
                'header' => static::formatHeaders(array_merge($headers, ['Content-Type: application/json'])),
                'method' => 'POST',
                'content' => json_encode($payload),
                'timeout' => $options['timeout'],
            ],
        ];

        return static::makeRequest($url, $httpOptions);
    }

    /**
     * Sends a WSDL request using SOAP.
     *
     * @param string $wsdl The WSDL URL.
     * @param string $method The method to call.
     * @param array $params The parameters for the method.
     * @param array $options Optional. Additional options including timeouts.
     * @return mixed The response from the SOAP service.
     */
    public static function sendWsdlRequest($wsdl, $method, $params = [], $options = [])
    {
        $options = array_merge(['timeout' => 30], $options);
        
        $client = new SoapClient($wsdl, [
            'connection_timeout' => $options['timeout'],
            'trace' => true,
        ]);

        try {
            $response = $client->__soapCall($method, [$params]);
            return $response;
        } catch (SoapFault $fault) {
            throw new Exception("SOAP request failed: {$fault->getMessage()}");
        }
    }

    /**
     * Makes an HTTP request.
     *
     * @param string $url The URL to send the request to.
     * @param array $options The options for the HTTP context.
     * @return string The response from the request.
     */
    private static function makeRequest($url, $options)
    {
        if (function_exists('curl_init')) {
            // Use cURL to make the request
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, explode("\r\n", $options['http']['header']));
            curl_setopt($ch, CURLOPT_TIMEOUT, $options['http']['timeout']);
            if (isset($options['http']['content'])) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $options['http']['content']);
            }
            if (isset($options['http']['method'])) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $options['http']['method']);
            }
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new Exception("cURL error: " . curl_error($ch));
            }
            curl_close($ch);
            return $response;
        } else {
            // Fallback to file_get_contents
            $context = stream_context_create($options);
            $response = @file_get_contents($url, false, $context);

            if ($response === false) {
                $error = error_get_last();
                throw new Exception("Error making request to $url: " . $error['message']);
            }
            return $response;
        }
    }

    /**
     * Formats headers for the HTTP request.
     *
     * @param array $headers The headers to format.
     * @return string The formatted headers.
     */
    private static function formatHeaders($headers)
    {
        return implode("\r\n", $headers);
    }

    /**
     * Retrieves the request method (GET, POST, PUT, DELETE, etc.).
     *
     * @return string The request method.
     */
    public static function getRequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Retrieves parameters from the request based on the method.
     *
     * @return array The parameters from the request.
     */
    public static function getRequestParams()
    {
        $method = static::getRequestMethod();

        switch (strtoupper($method)) {
            case 'GET':
                return $_GET;
            case 'POST':
                return $_POST;
            case 'PUT':
            case 'DELETE':
                parse_str(file_get_contents("php://input"), $params);
                return $params;
            default:
                return [];
        }
    }

    /**
     * Retrieves the JSON payload from the request body.
     *
     * @return mixed The decoded JSON data or null if not a valid JSON.
     */
    public static function getJsonPayload()
    {
        $json = file_get_contents('php://input');
        return json_decode($json, true);
    }

    /**
     * Sends a JSON response.
     *
     * @param mixed $data The data to send as a JSON response.
     * @param int $http_response_code Optional. The HTTP response code to send.
     */
    public static function sendJsonResponse($data, $http_response_code = 200)
    {
        static::sendHeader('Content-Type: application/json', true, $http_response_code);
        echo json_encode($data);
        return;
    }

    /**
     * Sends an HTTP header.
     *
     * @param string $header The header string to send.
     * @param bool $replace Whether to replace a previous similar header, or add a second header of the same type.
     * @param int $http_response_code Optional. Forces the HTTP response code to the specified value.
     */
    public static function sendHeader($header, $replace = true, $http_response_code = null)
    {
        if ($http_response_code !== null) {
            http_response_code($http_response_code);
        }
        header($header, $replace);
    }

    /**
     * Redirects to a specified URL.
     *
     * @param string $url The URL to redirect to.
     * @param int $http_response_code Optional. The HTTP response code to send.
     */
    public static function redirect($url, $http_response_code = 302)
    {
        static::sendHeader('Location: ' . $url, true, $http_response_code);
        return;
    }

    /**
     * Checks if the request is an AJAX request.
     *
     * @return bool True if the request is an AJAX request, false otherwise.
     */
    public static function isAjaxRequest()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    /**
     * Gets the client's IP address.
     *
     * @return string The client's IP address.
     */
    public static function getClientIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        }
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Sets a cookie.
     *
     * @param string $name The name of the cookie.
     * @param string $value The value of the cookie.
     * @param int $expires Optional. The time the cookie expires.
     * @param string $path Optional. The path on the server in which the cookie will be available.
     * @param string $domain Optional. The domain that the cookie is available to.
     * @param bool $secure Optional. Indicates whether the cookie should only be transmitted over a secure HTTPS connection.
     * @param bool $httponly Optional. When true the cookie will be made accessible only through the HTTP protocol.
     */
    public static function setCookie($name, $value, $expires = 0, $path = '/', $domain = '', $secure = false, $httponly = false)
    {
        setcookie($name, $value, $expires, $path, $domain, $secure, $httponly);
    }

    /**
     * Gets a cookie value.
     *
     * @param string $name The name of the cookie.
     * @param mixed $default Optional. The default value if the cookie does not exist.
     * @return mixed The cookie value or the default.
     */
    public static function getCookie($name, $default = null)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default;
    }
}