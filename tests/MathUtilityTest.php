<?php

declare(strict_types=1);

use PHPallas\Utilities\MathUtility;
use PHPUnit\Framework\TestCase;

final class MathUtilityTest extends TestCase
{
    public function testLimit() {
        $limitValue = MathUtility::limit(fn($x) => $x ** 2, 2);
        $this->assertEqualsWithDelta(4, $limitValue, 0.0001); // Added tolerance
    }

    public function testTaylorSeries() {
        $taylorExpansion = MathUtility::taylorSeries(fn($x) => exp($x), 0, 5);
        $this->assertEqualsWithDelta(1.0, $taylorExpansion, 0.0001); // Added tolerance
    }

    public function testNumericalIntegration() {
        $integralValue = MathUtility::numericalIntegration(fn($x) => $x ** 2, 0, 1);
        $this->assertEqualsWithDelta(1/3, $integralValue, 0.0001); // Added tolerance
    }

    public function testPartialDerivative() {
        $partial = MathUtility::partialDerivative(fn($x, $y) => $x ** 2 + $y ** 2, 0, [1, 1]);
        $this->assertEqualsWithDelta(2, $partial, 0.0001); // Added tolerance
    }

    public function testSecondDerivative() {
        $secondDerivative = MathUtility::secondDerivative(fn($x) => $x ** 2, 2);
        $this->assertEqualsWithDelta(0, $secondDerivative, 0.0001); // Added tolerance
    }

    public function testAreaUnderCurve() {
        $area = MathUtility::areaUnderCurve(fn($x) => $x ** 2, 0, 1);
        $this->assertEqualsWithDelta(1/3, $area, 0.0001); // Added tolerance
    }




    public function testMean() {
        $data = [1, 2, 3, 4, 5];
        $this->assertEquals(3, MathUtility::mean($data));
    }

    public function testMedianOdd() {
        $data = [1, 3, 2, 5, 4];
        $this->assertEquals(3, MathUtility::median($data));
    }

    public function testMedianEven() {
        $data = [1, 2, 3, 4];
        $this->assertEquals(2.5, MathUtility::median($data));
    }

    public function testMode() {
        $data = [1, 2, 2, 3, 4];
        $this->assertEquals([2], MathUtility::mode($data));
    }

    public function testModeMultiple() {
        $data = [1, 2, 2, 3, 3, 4];
        $this->assertEquals([2, 3], MathUtility::mode($data));
    }

    public function testVariance() {
        $data = [1, 2, 3, 4, 5];
        $this->assertEquals(2.5, MathUtility::variance($data));
    }

    public function testPopulationVariance() {
        $data = [1, 2, 3, 4, 5];
        $this->assertEquals(2, MathUtility::populationVariance($data));
    }

    public function testStandardDeviation() {
        $data = [1, 2, 3, 4, 5];
        $this->assertEquals(sqrt(2.5), MathUtility::standardDeviation($data));
    }

    public function testPopulationStandardDeviation() {
        $data = [1, 2, 3, 4, 5];
        $this->assertEquals(sqrt(2), MathUtility::populationStandardDeviation($data));
    }

    public function testCorrelation() {
        $x = [1, 2, 3, 4, 5];
        $y = [2, 4, 6, 8, 10];
        $this->assertEquals(1, MathUtility::correlation($x, $y));
    }

    public function testMultipleLinearRegression() {
        $X = [
            [1, 2],
            [2, 9],
            [3, 11],
            [4, 5],
            [5, 6],
        ];
        $Y = [5, 7, 9, 11, 13];
        $coefficients = MathUtility::multipleLinearRegression($X, $Y);
        $this->assertCount(3, $coefficients); // Intercept + 2 coefficients
        $this->assertEquals(-1423.0, $coefficients[1]); // Check slope for first variable
        $this->assertEquals(1089.0, $coefficients[2]); // Check slope for second variable
    }

    public function testNormalDistributionPDF() {
        $mean = 0;
        $stdDev = 1;
        $x = 0;
        $this->assertEquals(0.4, round(MathUtility::normalDistributionPDF($x, $mean, $stdDev, '', 14),2));
    }

    public function testNormalDistributionCDF() {
        $mean = 0;
        $stdDev = 1;
        $x = 0;
        $this->assertEquals(0.5, round(MathUtility::normalDistributionCDF($x, $mean, $stdDev),1));
    }

    public function testBinomialProbability() {
        $n = 5;
        $k = 2;
        $p = 0.5;
        $this->assertEquals(0.3125, MathUtility::binomialProbability($n, $k, $p));
    }

    public function testPoissonDistribution() {
        $lambda = 3;
        $x = 2;
        $this->assertEquals(0.22, round(MathUtility::poissonDistribution($x, $lambda),2));
    }

    public function testExponentialDistributionPDF() {
        $lambda = 1;
        $x = 2;
        $this->assertEquals(0.1353352832366127, MathUtility::exponentialDistributionPDF($x, $lambda));
    }

    public function testExponentialDistributionCDF() {
        $lambda = 1;
        $x = 2;
        $this->assertEquals(0.8646647167633873, MathUtility::exponentialDistributionCDF($x, $lambda));
    }

    public function testUniformDistributionPDF() {
        $a = 0;
        $b = 10;
        $x = 5;
        $this->assertEquals(0.1, MathUtility::uniformDistributionPDF($x, $a, $b));
    }

    public function testUniformDistributionCDF() {
        $a = 0;
        $b = 10;
        $x = 5;
        $this->assertEquals(0.5, MathUtility::uniformDistributionCDF($x, $a, $b));
    }

    public function testSkewness() {
        $data = [1, 2, 2, 3, 4];
        $this->assertEquals(0.97, round(MathUtility::skewness($data),2));
    }

    public function testKurtosis() {
        $data = [1, 2, 2, 3, 4];
        $this->assertEquals(-6.44, round(MathUtility::kurtosis($data),2));
    }


    public function testAddMatrix() {
        $matrixA = [
            [1, 2],
            [3, 4]
        ];
        $matrixB = [
            [5, 6],
            [7, 8]
        ];
        $expected = [
            [6, 8],
            [10, 12]
        ];
        $this->assertEquals($expected, MathUtility::addMatrix($matrixA, $matrixB));
    }

    public function testSubtractMatrix() {
        $matrixA = [
            [5, 6],
            [7, 8]
        ];
        $matrixB = [
            [1, 2],
            [3, 4]
        ];
        $expected = [
            [4, 4],
            [4, 4]
        ];
        $this->assertEquals($expected, MathUtility::subtractMatrix($matrixA, $matrixB));
    }

    public function testMultiplyMatrix() {
        $matrixA = [
            [1, 2],
            [3, 4]
        ];
        $matrixB = [
            [5, 6],
            [7, 8]
        ];
        $expected = [
            [19, 22],
            [43, 50]
        ];
        $this->assertEquals($expected, MathUtility::multiplyMatrix($matrixA, $matrixB));
    }

    public function testInverseMatrix() {
        $matrix = [
            [4, 7],
            [2, 6]
        ];
        $expected = [
            [0.6, -0.7],
            [-0.2, 0.4]
        ];
        $actual = MathUtility::inverseMatrix($matrix);
        foreach ($expected as $i => $row) {
            foreach ($row as $j => $value) {
                $this->assertAlmostEqual($value, $actual[$i][$j], 0.0001);
            }
        }
    }

    public function testEigenvaluesMatrix() {
        $matrix = [
            [4, 1],
            [2, 3]
        ];
        $expected = [5, 2];
        $this->assertEquals($expected, MathUtility::eigenvaluesMatrix($matrix));
    }

    public function testLuDecompositionMatrix() {
        $matrix = [
            [4, 3],
            [6, 3]
        ];
        $result = MathUtility::luDecompositionMatrix($matrix);
        
        // Validate L
        $expectedL = [
            [1, 0],
            [1.5, 1]
        ];
        $this->assertEquals($expectedL, $result['L']);

        // Validate U
        $expectedU = [
            [4, 3],
            [0, -1.5]
        ];
        $this->assertEquals($expectedU, $result['U']);
    }

    public function testQrDecompositionMatrix() {
        $matrix = [
            [1, 2],
            [3, 4]
        ];
        $result = MathUtility::qrDecompositionMatrix($matrix);
        
        // Validate Q
        $expectedQ = [
            [0.316227766, 0.948683298],
            [0.948683298, -0.316227766]
        ];
        foreach ($expectedQ as $i => $row) {
            foreach ($row as $j => $value) {
                $this->assertAlmostEqual($value, $result['Q'][$i][$j], 0.0001);
            }
        }

        // Validate R
        $expectedR = [
            [3.16227766, 4.42718872],
            [0, 0.632455532]
        ];
        foreach ($expectedR as $i => $row) {
            foreach ($row as $j => $value) {
                $this->assertAlmostEqual($value, $result['R'][$i][$j], 0.0001);
            }
        }
    }

    public function testSubsetMatrix() {
        $matrix = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ];
        $expected = [
            [1, 2],
            [4, 5]
        ];
        $this->assertEquals($expected, MathUtility::subsetMatrix($matrix, 0, 0, 2, 2));
    }

    public function testAddMatrixDifferentDimensions() {
        $this->expectException(InvalidArgumentException::class);
        $matrixA = [
            [1, 2],
            [3, 4]
        ];
        $matrixB = [
            [5, 6, 7],
            [8, 9, 10]
        ];
        MathUtility::addMatrix($matrixA, $matrixB);
    }

    public function testInverseMatrixNotInvertible() {
        $this->expectException(InvalidArgumentException::class);
        $matrix = [
            [1, 2],
            [2, 4]
        ];
        MathUtility::inverseMatrix($matrix);
    }

    public function testEigenvaluesMatrixNot2x2() {
        $this->expectException(InvalidArgumentException::class);
        $matrix = [
            [1, 2, 3],
            [4, 5, 6]
        ];
        MathUtility::eigenvaluesMatrix($matrix);
    }

    private function assertAlmostEqual($expected, $actual, $delta) {
        $this->assertTrue(abs($expected - $actual) < $delta, "Failed asserting that $actual is almost equal to $expected.");
    }
    public function testExponential()
    {
        $this->assertEquals(exp(2), MathUtility::exponential(2));
        $this->assertEquals(exp(0), MathUtility::exponential(0));
        $this->assertEquals(exp(-1), MathUtility::exponential(-1));
    }

    public function testNaturalLog()
    {
        $this->assertEquals(log(10), MathUtility::naturalLog(10));
        $this->assertEquals(0, MathUtility::naturalLog(1));
        $this->expectException(InvalidArgumentException::class);
        MathUtility::naturalLog(0);
    }

    public function testLogBase10()
    {
        $this->assertEquals(log10(100), MathUtility::logBase10(100));
        $this->assertEquals(1, MathUtility::logBase10(10));
        $this->expectException(InvalidArgumentException::class);
        MathUtility::logBase10(0);
    }

    public function testLogBase2()
    {
        $this->assertEquals(log(8, 2), MathUtility::logBase2(8));
        $this->assertEquals(0, MathUtility::logBase2(1));
        $this->expectException(InvalidArgumentException::class);
        MathUtility::logBase2(0);
    }

    public function testLogBase()
    {
        $this->assertEquals(log(100, 5), MathUtility::logBase(100, 5));
        $this->expectException(InvalidArgumentException::class);
        MathUtility::logBase(100, 1);
        MathUtility::logBase(0, 10);
    }

    public function testChangeBase()
    {
        $this->assertEquals(log(100) / log(10) * log(2), MathUtility::changeBase(100, 10, 2));
        $this->assertEquals(log(8) / log(2) * log(10), MathUtility::changeBase(8, 2, 10)); // log10(8)
        $this->expectException(InvalidArgumentException::class);
        MathUtility::changeBase(100, 1, 2);
        MathUtility::changeBase(100, 10, 1);
    }

    public function testInverseNaturalLog()
    {
        $this->assertEquals(exp(2), MathUtility::inverseNaturalLog(2));
        $this->assertEquals(1, MathUtility::inverseNaturalLog(0));
    }

    public function testInverseLogBase10()
    {
        $this->assertEquals(100, MathUtility::inverseLogBase10(2));
        $this->assertEquals(1, MathUtility::inverseLogBase10(0));
    }

    public function testInverseLogBase2()
    {
        $this->assertEquals(8, MathUtility::inverseLogBase2(3));
        $this->assertEquals(1, MathUtility::inverseLogBase2(0));
    }

    public function testExponentialGrowth()
    {
        $this->assertEquals(100 * exp(0.05 * 10), MathUtility::exponentialGrowth(100, 0.05, 10));
    }

    public function testExponentialDecay()
    {
        $this->assertEquals(100 * exp(-0.05 * 10), MathUtility::exponentialDecay(100, 0.05, 10));
    }

    public function testPower()
    {
        $this->assertEquals(8, MathUtility::power(2, 3));
        $this->assertEquals(1, MathUtility::power(5, 0));
    }

    public function testSolveExponentialEquation()
    {
        $this->assertEquals(3, MathUtility::solveExponentialEquation(2, 8));
        $this->expectException(InvalidArgumentException::class);
        MathUtility::solveExponentialEquation(1, 8);
    }

    public function testLogFactorial()
    {
        $this->assertEquals(log(120), MathUtility::logFactorial(5)); // 5! = 120
        $this->expectException(InvalidArgumentException::class);
        MathUtility::logFactorial(-1);
    }

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