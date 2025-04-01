<?php

declare(strict_types=1);

use PHPallas\Utilities\MathUtility;
use PHPUnit\Framework\TestCase;

final class MathUtilityTest extends TestCase
{
    public function testSin()
    {
        $this->assertEqualsWithDelta(0, MathUtility::sin(0), 0.00001);
        $this->assertEqualsWithDelta(1, MathUtility::sin(M_PI / 2), 0.00001);
        $this->assertEqualsWithDelta(0, MathUtility::sin(M_PI), 0.00001);
        $this->assertEqualsWithDelta(-1, MathUtility::sin(3 * M_PI / 2), 0.00001);
        $this->assertEqualsWithDelta(0, MathUtility::sin(2 * M_PI), 0.00001);
    }
  
    public function testCos()
    {
        $this->assertEqualsWithDelta(1, MathUtility::cos(0), 0.00001);
        $this->assertEqualsWithDelta(0, MathUtility::cos(M_PI / 2), 0.00001);
        $this->assertEqualsWithDelta(-1, MathUtility::cos(M_PI), 0.00001);
        $this->assertEqualsWithDelta(0, MathUtility::cos(3 * M_PI / 2), 0.00001);
        $this->assertEqualsWithDelta(1, MathUtility::cos(2 * M_PI), 0.00001);
    }
  
    public function testTan()
    {
        $this->assertEqualsWithDelta(0, MathUtility::tan(0), 0.00001);
        $this->assertEqualsWithDelta(1, MathUtility::tan(M_PI / 4), 0.00001);
        $this->assertEqualsWithDelta(-1, MathUtility::tan(3 * M_PI / 4), 0.00001);
        $this->assertEqualsWithDelta(0, MathUtility::tan(M_PI), 0.00001);
    }
  
    public function testAtan()
    {
        $this->assertEqualsWithDelta(0.0, MathUtility::atan(0), 0.00001);
        $this->assertEqualsWithDelta(0.7853981633974483, MathUtility::atan(1), 0.00001);
        $this->assertEqualsWithDelta(-0.7853981633974483, MathUtility::atan(-1), 0.00001);
        $this->assertEqualsWithDelta(0.4636476090008061, MathUtility::atan(0.5), 0.00001);
        $this->assertEqualsWithDelta(-0.4636476090008061, MathUtility::atan(-0.5), 0.00001);
    }
  
    public function testDeg2Rad()
    {
        $this->assertEqualsWithDelta(M_PI, MathUtility::deg2rad(180), 0.00001);
        $this->assertEqualsWithDelta(-M_PI, MathUtility::deg2rad(-180), 0.00001);
    }
  
    public function testRad2Deg()
    {
        $this->assertEqualsWithDelta(180, MathUtility::rad2deg(M_PI), 0.00001);
        $this->assertEqualsWithDelta(-180, MathUtility::rad2deg(-M_PI), 0.00001);
    }

    public function testAddVectors()
    {
        $vecA = [2, 3];
        $vecB = [4, 5];
        $result = MathUtility::addVectors($vecA, $vecB);
        $this->assertEquals([6, 8], $result);
    }

    public function testAddVectorsDimensionMismatch()
    {
        $this->expectException(InvalidArgumentException::class);
        MathUtility::addVectors([1, 2], [3]);
    }

    public function testScalarMultiply()
    {
        $vector = [2, -3, 4];
        $result = MathUtility::scalarMultiply($vector, 2);
        $this->assertEquals([4, -6, 8], $result);
    }

    public function testNormalize()
    {
        $vector = [3, 4];
        $normalized = MathUtility::normalize($vector);
        $this->assertEqualsWithDelta([0.6, 0.8], $normalized, 0.001);
    }

    public function testNormalizeZeroVector()
    {
        $this->expectException(RuntimeException::class);
        MathUtility::normalize([0, 0, 0]);
    }

    public function testAngleBetweenOrthogonalVectors()
    {
        $vecA = [1, 0];
        $vecB = [0, 1];
        $angle = MathUtility::angleBetween($vecA, $vecB);
        $this->assertEqualsWithDelta(M_PI / 2, $angle, 0.001);
    }

    public function testProjection()
    {
        $vecA = [4, 3];
        $vecB = [2, 0];
        $proj = MathUtility::projection($vecA, $vecB);
        $this->assertEquals([4, 0], $proj);
    }

    public function testVectorAppend()
    {
        $vector = [1, 2];
        MathUtility::vectorAppend($vector, 3);
        $this->assertEquals([1, 2, 3], $vector);
    }

    public function testVectorReverse()
    {
        $original = [1, 2, 3];
        $reversed = MathUtility::vectorReverse($original);
        $this->assertEquals([3, 2, 1], $reversed);
    }

    public function testDotProductWithEmptyVectors()
    {
        $vecA = [];
        $vecB = [];
        $dot = MathUtility::dotProduct($vecA, $vecB);
        $this->assertEquals(0, $dot);
    }
    public function testDotProduct()
    {
        $vecA = [2, 3];
        $vecB = [4, 5];
        $dot = MathUtility::dotProduct($vecA, $vecB);
        $this->assertEquals(23, $dot);
    }
    public function testScalarMultiplyWithZeroVector()
    {
        $vector = [0, 0, 0];
        $result = MathUtility::scalarMultiply($vector, 2);
        $this->assertEquals([0, 0, 0], $result);
    }

    public function testEstimateSimpleInterest()
    {
        $this->assertEquals(150, MathUtility::estimateSimpleInterest(1000, 0.05, 3));
    }

    public function testEstimateCompoundInterest()
    {
        $this->assertEquals(157.63, round(MathUtility::estimateCompoundInterest(1000, 0.05, 3, 1), 2));
    }

    public function testEstimateFutureValue()
    {
        $this->assertEquals(1157.63, round(MathUtility::estimateFutureValue(1000, 0.05, 3), 2));
    }

    public function testEstimatePresentValue()
    {
        $this->assertEquals(1000, round(MathUtility::estimatePresentValue(1157.63, 0.05, 3), 2));
    }

    public function testEstimateLoanPayment()
    {
        $this->assertEquals(377.42, round(MathUtility::estimateLoanPayment(20000, 0.05, 60), 2));
    }

    public function testEstimateTotalPayment()
    {
        $this->assertEquals(22645.20, round(MathUtility::estimateTotalPayment(377.42, 60), 2));
    }

    public function testEstimateTotalInterest()
    {
        $this->assertEquals(2645.20, round(MathUtility::estimateTotalInterest(22645.20, 20000), 2));
    }

    public function testEstimateAPR()
    {
        $this->assertEquals(0.03, round(MathUtility::estimateAPR(2645.20, 20000, 60), 2));
    }

    public function testEstimateEAR()
    {
        $this->assertEquals(0.0512, round(MathUtility::estimateEAR(0.05, 12), 4));
    }

    public function testGenerateAmortizationSchedule()
    {
        $schedule = MathUtility::generateAmortizationSchedule(20000, 0.05, 60);
        $this->assertCount(60, $schedule);
        $this->assertArrayHasKey('Payment', $schedule[0]);
        $this->assertArrayHasKey('Principal', $schedule[0]);
        $this->assertArrayHasKey('Interest', $schedule[0]);
        $this->assertArrayHasKey('Remaining Balance', $schedule[0]);
    }

    public function testEstimateNPV()
    {
        $cashFlows = [-10000, 3000, 4200, 6800, 5000];
        $this->assertEquals(4722.36, round(MathUtility::estimateNPV($cashFlows, 0.1), 2));
    }

    public function testCompareLoans()
    {
        $this->assertEquals("Loan 2 is cheaper by 273.86. (Total Cost: 22371.62)", MathUtility::compareLoans(20000, 0.05, 60, 20000, 0.045, 60));
    }

    /**
     * Test normal case where loan can be paid off with given monthly payment.
     */
    public function testEstimateLoanPayoffTime()
    {
        $principal = 10000; // Loan amount
        $monthlyPayment = 300; // Monthly payment amount
        $annualRate = 0.05; // Annual interest rate (5%)

        $result = MathUtility::estimateLoanPayoffTime($principal, $monthlyPayment, $annualRate);
        $this->assertEquals(36, $result); // Expected months to pay off the loan
    }

    /**
     * Test case where the monthly payment is exactly equal to the interest.
     */
    public function testEstimateLoanPayoffTimeInsufficientPayment()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Monthly payment is not enough to cover interest.");

        $principal = 10000;
        $monthlyPayment = 40;
        $annualRate = 0.05;

        MathUtility::estimateLoanPayoffTime($principal, $monthlyPayment, $annualRate);
    }

    /**
     * Test case where the monthly payment is zero.
     */
    public function testEstimateLoanPayoffTimeZeroMonthlyPayment()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Monthly payment must be greater than zero and annual rate cannot be negative.");

        $principal = 10000;
        $monthlyPayment = 0; // Invalid monthly payment
        $annualRate = 0.05;

        MathUtility::estimateLoanPayoffTime($principal, $monthlyPayment, $annualRate);
    }

    /**
     * Test case where the annual rate is negative.
     */
    public function testEstimateLoanPayoffTimeNegativeAnnualRate()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Monthly payment must be greater than zero and annual rate cannot be negative.");

        $principal = 10000;
        $monthlyPayment = 300;
        $annualRate = -0.05; // Negative annual rate

        MathUtility::estimateLoanPayoffTime($principal, $monthlyPayment, $annualRate);
    }

    /**
     * Test case where the loan is paid off in the last month.
     */
    public function testEstimateLoanPayoffTimeExactLastPayment()
    {
        $principal = 10000;
        $monthlyPayment = 300; // Monthly payment amount
        $annualRate = 0.05;

        // This scenario should result in 34 months, with the last payment covering the remaining balance
        $result = MathUtility::estimateLoanPayoffTime($principal, $monthlyPayment, $annualRate);
        $this->assertEquals(36, $result);
    }

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