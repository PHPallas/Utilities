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

class SecurityUtility {

    /**
     * Hash a password using SHA-256.
     *
     * @param string $password The password to hash.
     * @return string The hashed password.
     */
    public static function hashPassword($password) {
        return hash('sha256', $password);
    }

    /**
     * Verify a password against a hashed value.
     *
     * @param string $password The password to verify.
     * @param string $hashedPassword The hashed password to compare against.
     * @return bool True if the password matches, false otherwise.
     */
    public static function verifyPassword($password, $hashedPassword) {
        return self::hashPassword($password) === $hashedPassword;
    }

    /**
     * Generate a secure random token.
     *
     * @param int $length The length of the token.
     * @return string The generated token.
     * @throws InvalidArgumentException if length is less than 1.
     */
    public static function generateToken($length = 32) {
        if ($length < 1) {
            throw new InvalidArgumentException('Length must be a positive integer.');
        }
        return bin2hex(openssl_random_pseudo_bytes($length / 2));
    }

    /**
     * Sanitize a string to prevent XSS.
     *
     * @param string $string The string to sanitize.
     * @return string The sanitized string.
     */
    public static function sanitizeString($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Validate an email address.
     *
     * @param string $email The email address to validate.
     * @return bool True if the email is valid, false otherwise.
     */
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Generate a random password.
     *
     * @param int $length The length of the password.
     * @return string The generated password.
     */
    public static function generateRandomPassword($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        $charactersLength = strlen($characters);
        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomPassword;
    }

    /**
     * Check if a string is a strong password.
     *
     * @param string $password The password to check.
     * @return bool True if the password is strong, false otherwise.
     */
    public static function isStrongPassword($password) {
        return (bool) preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
    }

    /**
     * Encrypt data using a simple XOR cipher (not secure for sensitive data).
     *
     * @param string $data The data to encrypt.
     * @param string $key The key to use for encryption.
     * @return string The encrypted data.
     */
    public static function encryptData($data, $key) {
        $encrypted = '';
        for ($i = 0; $i < strlen($data); $i++) {
            $encrypted .= $data[$i] ^ $key[$i % strlen($key)];
        }
        return base64_encode($encrypted);
    }

    /**
     * Decrypt data encrypted by the XOR cipher.
     *
     * @param string $encryptedData The encrypted data to decrypt.
     * @param string $key The key to use for decryption.
     * @return string The decrypted data.
     */
    public static function decryptData($encryptedData, $key) {
        $data = base64_decode($encryptedData);
        $decrypted = '';
        for ($i = 0; $i < strlen($data); $i++) {
            $decrypted .= $data[$i] ^ $key[$i % strlen($key)];
        }
        return $decrypted;
    }

    /**
     * Generate a random alphanumeric string.
     *
     * @param int $length The length of the string.
     * @return string The generated string.
     */
    public static function generateRandomString($length = 10, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Generate a random integer.
     *
     * @param int $min The minimum value.
     * @param int $max The maximum value.
     * @return int The generated integer.
     */
    public static function generateRandomInt($min = 0, $max = 100) {
        return rand($min, $max);
    }

    /**
     * Generate a random float.
     *
     * @param float $min The minimum value.
     * @param float $max The maximum value.
     * @return float The generated float.
     */
    public static function generateRandomFloat($min = 0.0, $max = 100.0) {
        return round(mt_rand() / mt_getrandmax() * ($max - $min) + $min, 2);
    }

    /**
     * Generate a random UUID.
     *
     * @return string The generated UUID.
     */
    public static function generateUUID() {
        return sprintf('%s-%s-%s-%s-%s',
            self::generateRandomString(8,"0123456789abcdef"),
            self::generateRandomString(4,"0123456789abcdef"),
            self::generateRandomString(4,"0123456789abcdef"),
            self::generateRandomString(4,"0123456789abcdef"),
            self::generateRandomString(12,"0123456789abcdef")
        );
    }

    /**
     * Generate a secure random binary string.
     *
     * @param int $length The length of the binary string.
     * @return string The generated binary string.
     */
    public static function generateSecureRandomBytes($length = 16) {
        return openssl_random_pseudo_bytes($length);
    }

    /**
     * Validate a URL.
     *
     * @param string $url The URL to validate.
     * @return bool True if the URL is valid, false otherwise.
     */
    public static function validateURL($url) {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Validate a phone number (simple validation).
     *
     * @param string $phone The phone number to validate.
     * @return bool True if the phone number is valid, false otherwise.
     */
    public static function validatePhoneNumber($phone) {
        return (bool) preg_match('/^\+?[0-9]{7,15}$/', $phone);
    }

    /**
     * Generate a secure hash using bcrypt.
     *
     * @param string $password The password to hash.
     * @return string The hashed password.
     */
    public static function hashWithBcrypt($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Verify a bcrypt-hashed password.
     *
     * @param string $password The password to verify.
     * @param string $hashedPassword The hashed password to compare against.
     * @return bool True if the password matches, false otherwise.
     */
    public static function verifyBcryptPassword($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }

    /**
     * Generate a random color in HEX format.
     *
     * @return string The generated color.
     */
    public static function generateRandomColor() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    /**
     * Sanitize an array of strings.
     *
     * @param array $array The array of strings to sanitize.
     * @return array The sanitized array.
     */
    public static function sanitizeArray($array) {
        return array_map('self::sanitizeString', $array);
    }

    /**
     * Generate a random security question.
     *
     * @return string The generated security question.
     */
    public static function generateSecurityQuestion() {
        $questions = [
            'What is your mother\'s maiden name?',
            'What was the name of your first pet?',
            'What is your favorite color?',
            'What city were you born in?',
            'What is your favorite food?'
        ];
        return $questions[array_rand($questions)];
    }

    /**
     * Generate a random answer for a security question.
     *
     * @return string The generated answer.
     */
    public static function generateSecurityAnswer() {
        return self::generateRandomString(8);
    }

    /**
     * Get the current IP address.
     *
     * @return string The client's IP address.
     */
    public static function getClientIP() {
        return isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : 
               (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : 
               $_SERVER['REMOTE_ADDR']);
    }

    /**
     * Get the current user agent.
     *
     * @return string The user agent string.
     */
    public static function getUserAgent() {
        return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown';
    }

    /**
     * Generate a random session ID.
     *
     * @return string The generated session ID.
     */
    public static function generateSessionID() {
        return self::generateToken(32);
    }

    /**
     * Check if a string is a valid JSON.
     *
     * @param string $string The string to check.
     * @return bool True if valid JSON, false otherwise.
     */
    public static function isValidJSON($string) {
        json_decode($string);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    /**
     * Generate a random string of a specified character set.
     *
     * @param int $length The length of the string.
     * @param string $set The character set to use.
     * @return string The generated string.
     */
    public static function generateRandomStringFromSet($length, $set) {
        $charactersLength = strlen($set);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $set[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Encrypt a string using AES-256.
     *
     * @param string $data The data to encrypt.
     * @param string $key The key to use for encryption.
     * @return string The encrypted data.
     */
    public static function aesEncrypt($data, $key) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }

    /**
     * Decrypt a string using AES-256.
     *
     * @param string $encryptedData The encrypted data to decrypt.
     * @param string $key The key to use for decryption.
     * @return string The decrypted data.
     */
    public static function aesDecrypt($encryptedData, $key) {
        $data = base64_decode($encryptedData);
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($data, 0, $ivLength);
        $encrypted = substr($data, $ivLength);
        return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
    }

    /**
     * Generate a random API key.
     *
     * @param int $length The length of the API key.
     * @return string The generated API key.
     */
    public static function generateAPIKey($length = 32) {
        return self::generateRandomString($length);
    }

    /**
     * Create a CSRF token.
     *
     * @return string The generated CSRF token.
     */
    public static function createCSRFToken() {
        return self::generateToken(32);
    }

    /**
     * Validate a CSRF token.
     *
     * @param string $token The token to validate.
     * @param string $sessionToken The session token to compare against.
     * @return bool True if the tokens match, false otherwise.
     */
    public static function validateCSRFToken($token, $sessionToken) {
        return hash_equals($token, $sessionToken);
    }

    /**
     * Generate a random secret key for HMAC.
     *
     * @param int $length The length of the secret key.
     * @return string The generated secret key.
     */
    public static function generateHMACKey($length = 32) {
        return self::generateRandomString($length);
    }

    /**
     * Generate HMAC for a given data.
     *
     * @param string $data The data to hash.
     * @param string $key The key to use for HMAC.
     * @return string The generated HMAC.
     */
    public static function generateHMAC($data, $key) {
        return hash_hmac('sha256', $data, $key);
    }

    /**
     * Validate HMAC for a given data.
     *
     * @param string $data The data to validate.
     * @param string $key The key used to generate the HMAC.
     * @param string $hmac The HMAC to compare against.
     * @return bool True if the HMAC is valid, false otherwise.
     */
    public static function validateHMAC($data, $key, $hmac) {
        return hash_equals(self::generateHMAC($data, $key), $hmac);
    }

    /**
     * Generate a random salt.
     *
     * @param int $length The length of the salt.
     * @return string The generated salt.
     */
    public static function generateSalt($length = 16) {
        return self::generateRandomString($length);
    }

    /**
     * Hash a password with a salt.
     *
     * @param string $password The password to hash.
     * @param string $salt The salt to use.
     * @return string The hashed password.
     */
    public static function hashPasswordWithSalt($password, $salt) {
        return hash('sha256', $password . $salt);
    }

    /**
     * Verify a password with a salt.
     *
     * @param string $password The password to verify.
     * @param string $salt The salt used in hashing.
     * @param string $hashedPassword The hashed password to compare against.
     * @return bool True if the password matches, false otherwise.
     */
    public static function verifyPasswordWithSalt($password, $salt, $hashedPassword) {
        return self::hashPasswordWithSalt($password, $salt) === $hashedPassword;
    }

    /**
     * Generate a random phrase (for testing).
     *
     * @param int $wordCount The number of words in the phrase.
     * @return string The generated phrase.
     */
    public static function generateRandomPhrase($wordCount = 4) {
        $words = explode(' ', 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua');
        $phrase = '';
        for ($i = 0; $i < $wordCount; $i++) {
            $phrase .= $words[array_rand($words)] . ' ';
        }
        return trim($phrase);
    }
}