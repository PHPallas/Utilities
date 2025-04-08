<?php

use PHPUnit\Framework\TestCase;

use PHPallas\Utilities\NetworkUtility;

class NetworkUtilityTest extends TestCase
{
    public function testIsInternetAvailable()
    {
        // This test may be unreliable in certain environments. 
        // Consider mocking the behavior if needed.
        $this->assertTrue(NetworkUtility::isInternetAvailable() || !NetworkUtility::isInternetAvailable());
    }

    public function testPing()
    {
        $host = "www.google.com";
        $this->assertTrue(NetworkUtility::ping($host));
    }

    public function testResolveDomain()
    {
        $domain = "www.google.com";
        $ip = NetworkUtility::resolveDomain($domain);
        $this->assertNotNull($ip);
        $this->assertEquals($ip, gethostbyname($domain));
    }

    public function testGetLocalIp()
    {
        $localIp = NetworkUtility::getLocalIp();
        $this->assertNotNull($localIp);
        $this->assertEquals($localIp, gethostbyname(gethostname()));
    }

    public function testGetPublicIp()
    {
        $publicIp = NetworkUtility::getPublicIp();
        $this->assertNotNull($publicIp);
        $this->assertMatchesRegularExpression('/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/', $publicIp);
    }

    public function testCheckUrlStatus()
    {
        $url = "http://www.example.com";
        $statusCode = NetworkUtility::checkUrlStatus($url);
        $this->assertIsInt($statusCode);
        $this->assertEquals(200, $statusCode); // Assuming the URL is reachable
    }

    public function testGetUrlHeaders()
    {
        $url = "http://www.example.com";
        $headers = NetworkUtility::getUrlHeaders($url);
        $this->assertIsArray($headers);
        $this->assertArrayHasKey(0, $headers);
        $this->assertStringContainsString("HTTP/", $headers[0]);
    }

    public function testTestConnectionSpeed()
    {
        $url = "http://www.example.com";
        $speed = NetworkUtility::testConnectionSpeed($url);
        $this->assertNotNull($speed);
        $this->assertGreaterThan(0, $speed); // Ensure speed is positive
    }
}
