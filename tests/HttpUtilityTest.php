<?php

use PHPUnit\Framework\TestCase;

use PHPallas\Utilities\HttpUtility;

class HttpUtilityTest extends TestCase
{
    public function testSendGetRequest()
    {
        $url = 'http://httpbin.org/get';
        $response = HttpUtility::sendGetRequest($url);
        $this->assertStringContainsString('"url":', $response);
    }

    public function testSendPostRequest()
    {
        $url = 'http://httpbin.org/post';
        $data = ['key' => 'value'];
        $response = HttpUtility::sendPostRequest($url, $data);
        $this->assertStringContainsString('"key": "value"', $response);
    }

    public function testSendPutRequest()
    {
        $url = 'http://httpbin.org/put';
        $data = ['key' => 'value'];
        $response = HttpUtility::sendPutRequest($url, $data);
        $this->assertStringContainsString('"key": "value"', $response);
    }

    public function testSendDeleteRequest()
    {
        $url = 'http://httpbin.org/delete';
        $response = HttpUtility::sendDeleteRequest($url);
        $this->assertStringContainsString('"url":', $response);
    }

    public function testGetRequestParams()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['param'] = 'value';
        $params = HttpUtility::getRequestParams();
        $this->assertEquals(['param' => 'value'], $params);
    }

    public function testGetJsonPayload()
    {
        // Simulate a JSON payload
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $json = json_encode(['key' => 'value']);
        file_put_contents('php://input', $json);
        $payload = HttpUtility::getJsonPayload();
        $this->assertEquals(['key' => 'value'], $payload);
    }

    public function testSendJsonResponse()
    {
        ob_start(); // Start output buffering
        HttpUtility::sendJsonResponse(['status' => 'success']);
        $output = ob_get_clean(); // Get the output and clean the buffer
        $this->assertJsonStringEqualsJsonString('{"status":"success"}', $output);
    }

    public function testGetRequestMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $method = HttpUtility::getRequestMethod();
        $this->assertEquals('POST', $method);
    }

    public function testGetClientIp()
    {
        $_SERVER['REMOTE_ADDR'] = '192.168.1.1';
        $ip = HttpUtility::getClientIp();
        $this->assertEquals('192.168.1.1', $ip);
    }

    public function testSetAndGetCookie()
    {
        HttpUtility::setCookie('test_cookie', 'cookie_value');
        $cookieValue = HttpUtility::getCookie('test_cookie', 'default_value');
        $this->assertEquals('cookie_value', $cookieValue);
    }

    public function testIsAjaxRequest()
    {
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
        $isAjax = HttpUtility::isAjaxRequest();
        $this->assertTrue($isAjax);
    }
}
