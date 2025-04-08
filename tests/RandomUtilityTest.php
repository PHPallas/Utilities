<?php

use PHPUnit\Framework\TestCase;
use PHPallas\Utilities\RandomUtility;

class RandomUtilityTest extends TestCase
{
    public function testRandomInt()
    {
        $result = RandomUtility::randomInt(1, 10);
        $this->assertGreaterThanOrEqual(1, $result);
        $this->assertLessThanOrEqual(10, $result);
    }

    public function testRandomFloat()
    {
        $result = RandomUtility::randomFloat(1.0, 10.0);
        $this->assertGreaterThanOrEqual(1.0, $result);
        $this->assertLessThanOrEqual(10.0, $result);
    }

    public function testRandomBool()
    {
        $result = RandomUtility::randomBool();
        $this->assertIsBool($result);
    }

    public function testRandomString()
    {
        $result = RandomUtility::randomString(5);
        $this->assertIsString($result);
        $this->assertEquals(5, strlen($result));
    }

    public function testRandomArray()
    {
        $result = RandomUtility::randomArray(3);
        $this->assertIsArray($result);
        $this->assertCount(3, $result);
    }

    public function testRandomObject()
    {
        $result = RandomUtility::randomObject(3);
        $this->assertIsObject($result);
        $this->assertCount(3, (array) $result);
    }
}
