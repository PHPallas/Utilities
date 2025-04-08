<?php

use PHPUnit\Framework\TestCase;

use PHPallas\Utilities\SecurityUtility;

class SecurityUtilityTest extends TestCase {

    public function testHashPassword() {
        $password = 'SecureP@ssw0rd';
        $hashedPassword = SecurityUtility::hashPassword($password);
        $this->assertSame($hashedPassword, SecurityUtility::hashPassword($password));
    }

    public function testVerifyPassword() {
        $password = 'SecureP@ssw0rd';
        $hashedPassword = SecurityUtility::hashPassword($password);
        $this->assertSame(true, SecurityUtility::verifyPassword($password, $hashedPassword));
        $this->assertSame(false, SecurityUtility::verifyPassword('wrongPassword', $hashedPassword));
    }

    public function testGenerateToken() {
        $token = SecurityUtility::generateToken(32);
        $this->assertSame(32, strlen($token)); // 32 bytes = 64 hex characters
    }

    public function testSanitizeString() {
        $unsafeString = '<script>alert("XSS")</script>';
        $sanitizedString = SecurityUtility::sanitizeString($unsafeString);
        $this->assertSame('&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;', $sanitizedString);
    }

    public function testValidateEmail() {
        $validEmail = 'test@example.com';
        $invalidEmail = 'invalid-email';
        $this->assertSame(true, SecurityUtility::validateEmail($validEmail));
        $this->assertSame(false, SecurityUtility::validateEmail($invalidEmail));
    }

    public function testGenerateRandomPassword() {
        $password = SecurityUtility::generateRandomPassword(12);
        $this->assertSame(12, strlen($password));
    }

    public function testIsStrongPassword() {
        $strongPassword = 'StrongP@ssw0rd';
        $weakPassword = 'weakpass';
        $this->assertSame(true, SecurityUtility::isStrongPassword($strongPassword));
        $this->assertSame(false, SecurityUtility::isStrongPassword($weakPassword));
    }

    public function testEncryptDecryptData() {
        $data = 'Sensitive Data';
        $key = 'mysecretkey';
        $encryptedData = SecurityUtility::encryptData($data, $key);
        $decryptedData = SecurityUtility::decryptData($encryptedData, $key);
        $this->assertSame($data, $decryptedData);
    }

    public function testGenerateRandomString() {
        $randomString = SecurityUtility::generateRandomString(10);
        $this->assertSame(10, strlen($randomString));
    }

    public function testGenerateRandomInt() {
        $randomInt = SecurityUtility::generateRandomInt(1, 10);
        $this->assertGreaterThanOrEqual(1, $randomInt);
        $this->assertLessThanOrEqual(10, $randomInt);
    }

    public function testGenerateRandomFloat() {
        $randomFloat = SecurityUtility::generateRandomFloat(1.0, 10.0);
        $this->assertGreaterThanOrEqual(1.0, $randomFloat);
        $this->assertLessThanOrEqual(10.0, $randomFloat);
    }

    public function testGenerateUUID() {
        $uuid = SecurityUtility::generateUUID();
        $this->assertMatchesRegularExpression('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/', $uuid);
    }

    public function testValidateURL() {
        $validURL = 'https://www.example.com';
        $invalidURL = 'invalid-url';
        $this->assertSame(true, SecurityUtility::validateURL($validURL));
        $this->assertSame(false, SecurityUtility::validateURL($invalidURL));
    }

    public function testValidatePhoneNumber() {
        $validPhone = '+12345678901';
        $invalidPhone = '12345';
        $this->assertSame(true, SecurityUtility::validatePhoneNumber($validPhone));
        $this->assertSame(false, SecurityUtility::validatePhoneNumber($invalidPhone));
    }

    public function testGenerateRandomColor() {
        $color = SecurityUtility::generateRandomColor();
        $this->assertMatchesRegularExpression('/^#[0-9A-F]{6}$/i', $color);
    }

    public function testGenerateAPIKey() {
        $apiKey = SecurityUtility::generateAPIKey(32);
        $this->assertSame(32, strlen($apiKey));
    }

    public function testCreateCSRFToken() {
        $csrfToken = SecurityUtility::createCSRFToken();
        $this->assertSame(32, strlen($csrfToken)); // 32 bytes = 64 hex characters
    }

    public function testValidateCSRFToken() {
        $token = SecurityUtility::createCSRFToken();
        $this->assertSame(true, SecurityUtility::validateCSRFToken($token, $token));
        $this->assertSame(false, SecurityUtility::validateCSRFToken($token, 'invalidToken'));
    }

    public function testGenerateHMAC() {
        $data = 'data';
        $key = 'secret';
        $hmac = SecurityUtility::generateHMAC($data, $key);
        $this->assertSame($hmac, SecurityUtility::generateHMAC($data, $key));
    }

    public function testValidateHMAC() {
        $data = 'data';
        $key = 'secret';
        $hmac = SecurityUtility::generateHMAC($data, $key);
        $this->assertSame(true, SecurityUtility::validateHMAC($data, $key, $hmac));
        $this->assertSame(false, SecurityUtility::validateHMAC($data, 'wrongKey', $hmac));
    }

    public function testGenerateSalt() {
        $salt = SecurityUtility::generateSalt(16);
        $this->assertSame(16, strlen($salt));
    }

    public function testHashPasswordWithSalt() {
        $password = 'password';
        $salt = SecurityUtility::generateSalt();
        $hashedPassword = SecurityUtility::hashPasswordWithSalt($password, $salt);
        $this->assertSame($hashedPassword, SecurityUtility::hashPasswordWithSalt($password, $salt));
    }

    public function testVerifyPasswordWithSalt() {
        $password = 'password';
        $salt = SecurityUtility::generateSalt();
        $hashedPassword = SecurityUtility::hashPasswordWithSalt($password, $salt);
        $this->assertSame(true, SecurityUtility::verifyPasswordWithSalt($password, $salt, $hashedPassword));
        $this->assertSame(false, SecurityUtility::verifyPasswordWithSalt('wrongPassword', $salt, $hashedPassword));
    }

    public function testGenerateRandomPhrase() {
        $phrase = SecurityUtility::generateRandomPhrase(4);
        $this->assertNotEmpty($phrase);
    }
}
