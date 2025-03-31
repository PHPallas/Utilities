<?php

declare(strict_types=1);

use PHPallas\Utilities\MathUtility;
use PHPUnit\Framework\TestCase;

final class MathUtilityTest extends TestCase
{
    public function testRandomInt()
    {
        $min = 1;
        $max = 100;
        $result = MathUtility::randomInt($min, $max);
        $this->assertGreaterThanOrEqual($min, $result);
        $this->assertLessThanOrEqual($max, $result);
    }

    public function testRandomFloat()
    {
        $min = 1.0;
        $max = 10.0;
        $result = MathUtility::randomFloat($min, $max);
        $this->assertGreaterThanOrEqual($min, $result);
        $this->assertLessThanOrEqual($max, $result);
    }

    public function testRound()
    {
        $this->assertEquals(3, MathUtility::round(2.5));
        $this->assertEquals(2, MathUtility::round(2.4));
        $this->assertEquals(-3, MathUtility::round(-2.5));
        $this->assertEquals(-2, MathUtility::round(-2.4));
    }

    public function testFloor()
    {
        $this->assertEquals(2, MathUtility::floor(2.9));
        $this->assertEquals(2, MathUtility::floor(2.1));
        $this->assertEquals(-3, MathUtility::floor(-2.1));
        $this->assertEquals(-3, MathUtility::floor(-2.9));
    }

    public function testCeil()
    {
        $this->assertEquals(3, MathUtility::ceil(2.1));
        $this->assertEquals(3, MathUtility::ceil(2.9));
        $this->assertEquals(-2, MathUtility::ceil(-2.1));
        $this->assertEquals(-2, MathUtility::ceil(-2.9));
    }

    public function testTruncate()
    {
        $this->assertEquals(2, MathUtility::truncate(2.9));
        $this->assertEquals(2, MathUtility::truncate(2.1));
        $this->assertEquals(-2, MathUtility::truncate(-2.1));
        $this->assertEquals(-2, MathUtility::truncate(-2.9));
    }

    public function testRoundHalfUp()
    {
        $this->assertEquals(3, MathUtility::roundHalfUp(2.5));
        $this->assertEquals(2, MathUtility::roundHalfUp(2.4));
        $this->assertEquals(-3, MathUtility::roundHalfUp(-2.5));
        $this->assertEquals(-2, MathUtility::roundHalfUp(-2.4));
    }

    public function testRoundHalfDown()
    {
        $this->assertEquals(2, MathUtility::roundHalfDown(2.5));
        $this->assertEquals(2, MathUtility::roundHalfDown(2.4));
        $this->assertEquals(-3, MathUtility::roundHalfDown(-2.5));
        $this->assertEquals(-2, MathUtility::roundHalfDown(-2.4));
    }

    public function testRoundHalfToEven()
    {
        $this->assertEquals(2, MathUtility::roundHalfToEven(2.5));
        $this->assertEquals(4, MathUtility::roundHalfToEven(3.5));
        $this->assertEquals(-2, MathUtility::roundHalfToEven(-2.5));
        $this->assertEquals(-4, MathUtility::roundHalfToEven(-3.5));
    }
}