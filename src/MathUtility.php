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
use RuntimeException;

/**
 * Class MathUtility
 * A utility class for common mathematical and physical constants.
 *
 * @package PHPallas\Utilities
 */
class MathUtility
{
    // Mathematical Constants
    const PI = 3.1415926535897932384626433832795028841971; // Pi
    const E = 2.7182818284590452353602874713526624977572; // Euler's Number
    const GOLDEN_RATIO = 1.6180339887498948482045868343656381177203; // Golden Ratio
    const SQRT_2 = 1.4142135623730950488016887242096980785697; // Square root of 2
    const SQRT_3 = 1.7320508075688772935274463415058762285359; // Square root of 3
    const SQRT_5 = 2.2360679774997896964091736687312762354406; // Square root of 5
    const LN_2 = 0.6931471805599453094172321214581765680755; // Natural logarithm of 2
    const LN_10 = 2.302585092994046; // Natural logarithm of 10
    const E_PI = 23.140692632779269005729086367948547146968; // e raised to the power of Pi
    const APERY_CONSTANT = 1.2020569031595942853997381615114499907649; // Apéry's constant

    // Physical Constants
    const SPEED_OF_LIGHT = 299792458; // Speed of light in m/s
    const GRAVITATIONAL_CONSTANT = 6.67430e-11; // Gravitational constant in m^3 kg^-1 s^-2
    const PLANCK_CONSTANT = 6.62607015e-34; // Planck's constant in J·s
    const BOLTZMANN_CONSTANT = 1.380649e-23; // Boltzmann's constant in J/K
    const AVOGADRO_CONSTANT = 6.02214076e23; // Avogadro's number in mol^-1
    const GAS_CONSTANT = 8.314; // Universal gas constant in J/(mol·K)
    const ELECTRON_MASS = 9.10938356e-31; // Mass of an electron in kg
    const PROTON_MASS = 1.6726219e-27; // Mass of a proton in kg
    const NEUTRON_MASS = 1.67551e-27; // Mass of a neutron in kg
    const RYDBERG_CONSTANT = 1.097373e7; // Rydberg constant in m^-1

    // Astronomical Constants
    const ASTRONOMICAL_UNIT = 1.496e11; // Astronomical unit in meters
    const LIGHT_YEAR = 9.461e15; // Light year in meters
    const PARSEC = 3.086e16; // Parsec in meters
    const EARTH_MASS = 5.972e24; // Mass of Earth in kg
    const SUN_MASS = 1.989e30; // Mass of the Sun in kg
    const MOON_MASS = 7.34767309e22; // Mass of the Moon in kg

    // Fine Structure Constants
    const FINE_STRUCTURE_CONSTANT = 0.0072973525693; // Fine-structure constant
    const COULOMB_CONSTANT = 8.9875517873681764e9; // Coulomb's constant in N·m²/C²
    const MAGNETIC_CONSTANT = 4 * M_PI * 1e-7; // Magnetic constant in N/A²
    const ELECTRIC_CONSTANT = 8.854187817e-12; // Electric constant in F/m
    const HERTZ = 1; // Frequency in Hz

    // Planck's Constants
    const PLANCK_LENGTH = 1.616255e-35; // Planck length in meters
    const PLANCK_TIME = 5.391247e-44; // Planck time in seconds
    const PLANCK_TEMPERATURE = 1.416808e32; // Planck temperature in Kelvin
    const PLANCK_MASS = 2.176434e-8; // Planck mass in kg
    const STEFAN_BOLTZMANN_CONSTANT = 5.670374419e-8; // Stefan-Boltzmann constant in W/(m²·K⁴)

    // Constants from Chemistry
    const MOLAR_GAS_CONSTANT = 8.31446261815324; // Molar gas constant in J/(mol·K)
    const STANDARD_ATMOSPHERE = 101325; // Standard atmosphere in Pa
    const STANDARD_TEMPERATURE = 273.15; // Standard temperature in K
    const STANDARD_PRESSURE = 101325; // Standard pressure in Pa

    // Thermodynamic Constants
    const TRIPLE_POINT_WATER = 273.16; // Triple point of water in K
    const BOILING_POINT_WATER = 373.15; // Boiling point of water in K
    const FREEZING_POINT_WATER = 273.15; // Freezing point of water in K

    // Cosmological Constants
    const HUBBLE_CONSTANT = 70.0; // Hubble constant in km/s/Mpc
    const DENSITY_CRITICAL = 1.8788e-26; // Critical density in kg/m³
    const COSMIC_MICROWAVE_BACKGROUND_TEMP = 2.725; // CMB temperature in K

    // Mathematical Constants
    const KINCHIN_CONSTANT = 2.6854520010653064453097148354815905512447; // Khinchin's constant
    const CATALAN_CONSTANT = 0.9159655941772190150546035149323841107742; // Catalan's constant
    const FEIGENBAUM_DELTA = 4.6692016091029906718532038204662016151385; // Feigenbaum's delta
    const FEIGENBAUM_ALPHA = 2.5029078750958929322503682551455644362983; // Feigenbaum's alpha

    // Information Theory Constants
    const SHANNON_ENTROPY = 0.6931471805599453; // Shannon entropy in bits
    const AVERAGE_INFORMATION = 1.0; // Average information in bits

    // Additional Mathematical Constants
    const SILVER_RATIO = 2.4142135623730950488016887242096980785697; // Silver ratio
    const PLASTIC_NUMBER = 1.3247179572447460259609088549569196487046; // Plastic number
    const CONWAY_CONSTANT = 1.303577269034295; // Conway's constant
    const TWIN_PRIME_CONSTANT = 0.6601618158468695739278121105559644622943; // Twin prime constant

    // Additional Useful Constants
    const GASOLINE_DENSITY = 737; // Density of gasoline in kg/m³
    const WATER_DENSITY = 997; // Density of water in kg/m³
    const STP_TEMPERATURE = 273.15; // Standard temperature in K
    const STP_PRESSURE = 101325; // Standard pressure in Pa

    /**
     * Round to the nearest integer.
     *
     * @param float $number The number to round.
     * @return int The rounded integer.
     */
    public static function round($number)
    {
        return ($number >= 0) ? (int) ($number + 0.5) : (int) ($number - 0.5);
    }

    /**
     * Floor: Round down to the nearest integer.
     *
     * @param float $number The number to floor.
     * @return int The floored integer.
     */
    public static function floor($number)
    {
        return ($number >= 0) ? (int) $number : (int) ($number - 1);
    }

    /**
     * Ceil: Round up to the nearest integer.
     *
     * @param float $number The number to ceil.
     * @return int The ceiled integer.
     */
    public static function ceil($number)
    {
        return ($number >= 0) ? (int) ($number + 1) : (int) $number;
    }

    /**
     * Truncate: Remove decimal part without rounding.
     *
     * @param float $number The number to truncate.
     * @return int The truncated integer.
     */
    public static function truncate($number)
    {
        return ($number >= 0) ? (int) $number : (int) ($number);
    }

    /**
     * Round Half Up.
     *
     * @param float $number The number to round.
     * @return int The rounded integer.
     */
    public static function roundHalfUp($number)
    {
        return ($number >= 0) ? (int) ($number + 0.5) : (int) ($number - 0.5);
    }

    /**
     * Round Half Down.
     *
     * @param float $number The number to round.
     * @return int The rounded integer.
     */
    public static function roundHalfDown($number)
    {
        if ($number > 0)
        {
            return (int) ($number + 0.499999999);
        }
        else
        {
            return (int) ($number - 0.500000001);
        }
    }

    /**
     * Bankers' Rounding (Round Half to Even).
     *
     * @param float $number The number to round.
     * @return int The rounded integer.
     */
    public static function roundHalfToEven($number)
    {
        $floor = static::floor($number);
        $ceil = static::ceil($number);
        if (($number - $floor) == 0.5)
        {
            return ($floor % 2 == 0) ? $floor : $ceil;
        }
        return ($number >= 0) ? static::round($number) : static::round(-$number) * -1;
    }

    /**
     * Generate a random integer between the given min and max values.
     *
     * @param int $min The minimum value (inclusive).
     * @param int $max The maximum value (inclusive).
     * @return int A random integer between min and max.
     */
    public static function randomInt($min, $max)
    {
        return mt_rand($min, $max);
    }

    /**
     * Generate a random float between the given min and max values.
     *
     * @param float $min The minimum value (inclusive).
     * @param float $max The maximum value (inclusive).
     * @return float A random float between min and max.
     */
    public static function randomFloat($min, $max)
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    /**
     * Estimate simple interest.
     *
     * @param float $principal The principal amount.
     * @param float $rate The annual interest rate (as a decimal).
     * @param int $time The time in years.
     * @return float The estimated simple interest.
     */
    public static function estimateSimpleInterest($principal, $rate, $time)
    {
        return $principal * $rate * $time;
    }

    /**
     * Estimate compound interest.
     *
     * @param float $principal The principal amount.
     * @param float $rate The annual interest rate (as a decimal).
     * @param int $time The time in years.
     * @param int $n The number of times interest is compounded per year.
     * @return float The estimated compound interest.
     */
    public static function estimateCompoundInterest($principal, $rate, $time, $n)
    {
        return $principal * pow((1 + $rate / $n), $n * $time) - $principal;
    }

    /**
     * Estimate the future value of an investment.
     *
     * @param float $principal The principal amount.
     * @param float $rate The annual interest rate (as a decimal).
     * @param int $time The time in years.
     * @return float The estimated future value.
     */
    public static function estimateFutureValue($principal, $rate, $time)
    {
        return $principal * pow((1 + $rate), $time);
    }

    /**
     * Estimate the present value of a future amount.
     *
     * @param float $futureValue The future amount.
     * @param float $rate The annual interest rate (as a decimal).
     * @param int $time The time in years.
     * @return float The estimated present value.
     */
    public static function estimatePresentValue($futureValue, $rate, $time)
    {
        return $futureValue / pow((1 + $rate), $time);
    }

    /**
     * Estimate monthly loan payment.
     *
     * @param float $principal The loan amount.
     * @param float $annualRate The annual interest rate (as a decimal).
     * @param int $months The number of months to pay off the loan.
     * @return float The estimated monthly payment.
     */
    public static function estimateLoanPayment($principal, $annualRate, $months)
    {
        if ($annualRate == 0)
        {
            return $principal / $months;
        }

        $monthlyRate = $annualRate / 12;
        return ($principal * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$months));
    }

    /**
     * Estimate the total amount paid over the life of the loan.
     *
     * @param float $monthlyPayment The monthly payment amount.
     * @param int $months The number of months to pay off the loan.
     * @return float The estimated total amount paid.
     */
    public static function estimateTotalPayment($monthlyPayment, $months)
    {
        return $monthlyPayment * $months;
    }

    /**
     * Estimate the total interest paid over the life of the loan.
     *
     * @param float $totalPayment The total amount paid.
     * @param float $principal The loan amount.
     * @return float The estimated total interest paid.
     */
    public static function estimateTotalInterest($totalPayment, $principal)
    {
        return $totalPayment - $principal;
    }

    /**
     * Estimate the Annual Percentage Rate (APR).
     *
     * @param float $interest The total interest paid.
     * @param float $principal The loan amount.
     * @param int $months The number of months.
     * @return float The estimated APR as a decimal.
     */
    public static function estimateAPR($interest, $principal, $months)
    {
        return ($interest / $principal) * (12 / $months);
    }

    /**
     * Estimate the Effective Annual Rate (EAR).
     *
     * @param float $nominalRate The nominal interest rate (as a decimal).
     * @param int $n The number of compounding periods per year.
     * @return float The estimated EAR as a decimal.
     */
    public static function estimateEAR($nominalRate, $n)
    {
        return pow((1 + $nominalRate / $n), $n) - 1;
    }

    /**
     * Generate a loan amortization schedule.
     *
     * @param float $principal The loan amount.
     * @param float $annualRate The annual interest rate (as a decimal).
     * @param int $months The number of months to pay off the loan.
     * @return array The amortization schedule.
     */
    public static function generateAmortizationSchedule($principal, $annualRate, $months)
    {
        $monthlyRate = $annualRate / 12;
        $monthlyPayment = static::estimateLoanPayment($principal, $annualRate, $months);
        $schedule = [];

        for ($i = 1; $i <= $months; $i++)
        {
            $interestPayment = $principal * $monthlyRate;
            $principalPayment = $monthlyPayment - $interestPayment;
            $remainingBalance = $principal - $principalPayment;

            $schedule[] = [
                'Month' => $i,
                'Payment' => round($monthlyPayment, 2),
                'Principal' => round($principalPayment, 2),
                'Interest' => round($interestPayment, 2),
                'Remaining Balance' => round($remainingBalance, 2)
            ];

            $principal = $remainingBalance;
        }

        return $schedule;
    }

    /**
     * Estimate the loan payoff time in months.
     *
     * @param float $principal The loan amount.
     * @param float $monthlyPayment The monthly payment amount.
     * @param float $annualRate The annual interest rate (as a decimal).
     * @return int The estimated number of months to pay off the loan.
     */
    public static function estimateLoanPayoffTime($principal, $monthlyPayment, $annualRate)
    {
        if ($monthlyPayment <= 0 || $annualRate < 0)
        {
            throw new InvalidArgumentException("Monthly payment must be greater than zero and annual rate cannot be negative.");
        }

        $monthlyRate = $annualRate / 12;
        $months = 0;

        while ($principal > 0)
        {
            $interest = $principal * $monthlyRate;
            $principalPayment = $monthlyPayment - $interest;

            if ($principalPayment <= 0)
            {
                throw new \RuntimeException("Monthly payment is not enough to cover interest.");
            }

            // Adjust for the last payment if the remaining principal is less than the principalPayment
            if ($principalPayment > $principal)
            {
                $months++; // Count the last month
                break; // Exit the loop since the loan will be paid off
            }

            $principal -= $principalPayment;
            $months++;
        }

        return $months;
    }

    /**
     * Estimate the Net Present Value (NPV) of cash flows.
     *
     * @param array $cashFlows An array of cash flows (positive and negative).
     * @param float $rate The discount rate (as a decimal).
     * @return float The estimated NPV.
     * @throws InvalidArgumentException If the cash flows array is empty or if the rate is negative.
     */
    public static function estimateNPV($cashFlows, $rate)
    {
        if (empty($cashFlows))
        {
            throw new InvalidArgumentException("Cash flows array cannot be empty.");
        }

        if ($rate < 0)
        {
            throw new InvalidArgumentException("Discount rate cannot be negative.");
        }

        $npv = 0.0;
        foreach ($cashFlows as $t => $cashFlow)
        {
            // Ensure that the index is non-negative
            if ($t < 0)
            {
                throw new InvalidArgumentException("Time period must be non-negative.");
            }

            $npv += $cashFlow / pow((1 + $rate), $t);
        }

        return round($npv, 2); // Optionally round to 2 decimal places
    }

    /**
     * Compare two loans based on total cost.
     *
     * @param float $principal1 The first loan amount.
     * @param float $annualRate1 The first loan annual interest rate (as a decimal).
     * @param int $months1 The first loan term in months.
     * @param float $principal2 The second loan amount.
     * @param float $annualRate2 The second loan annual interest rate (as a decimal).
     * @param int $months2 The second loan term in months.
     * @return string Comparison result.
     * @throws InvalidArgumentException If any of the inputs are invalid.
     */
    public static function compareLoans($principal1, $annualRate1, $months1, $principal2, $annualRate2, $months2)
    {
        // Input validation
        if ($principal1 <= 0 || $principal2 <= 0)
        {
            throw new InvalidArgumentException("Principal amounts must be greater than zero.");
        }
        if ($annualRate1 < 0 || $annualRate2 < 0)
        {
            throw new InvalidArgumentException("Annual rates cannot be negative.");
        }
        if ($months1 <= 0 || $months2 <= 0)
        {
            throw new InvalidArgumentException("Loan terms must be greater than zero.");
        }

        // Calculate total payments
        $monthlyPayment1 = static::estimateLoanPayment($principal1, $annualRate1, $months1);
        $totalPayment1 = static::estimateTotalPayment($monthlyPayment1, $months1);

        $monthlyPayment2 = static::estimateLoanPayment($principal2, $annualRate2, $months2);
        $totalPayment2 = static::estimateTotalPayment($monthlyPayment2, $months2);

        // Compare total payments and generate result
        if ($totalPayment1 < $totalPayment2)
        {
            return "Loan 1 is cheaper by " . round($totalPayment2 - $totalPayment1, 2) . ". (Total Cost: " . round($totalPayment1, 2) . ")";
        }
        elseif ($totalPayment1 > $totalPayment2)
        {
            return "Loan 2 is cheaper by " . round($totalPayment1 - $totalPayment2, 2) . ". (Total Cost: " . round($totalPayment2, 2) . ")";
        }
        else
        {
            return "Both loans cost the same. (Total Cost: " . round($totalPayment1, 2) . ")";
        }
    }

    /**
     * Add two vectors element-wise
     * @param array $vec1
     * @param array $vec2
     * @return array
     * @throws InvalidArgumentException
     */
    public static function addVectors($vec1, $vec2)
    {
        static::checkDimensions($vec1, $vec2);
        $result = array();
        foreach ($vec1 as $i => $val)
        {
            $result[] = $val + $vec2[$i];
        }
        return $result;
    }

    /**
     * Subtract two vectors element-wise
     * @param array $vec1
     * @param array $vec2
     * @return array
     * @throws InvalidArgumentException
     */
    public static function subtractVectors($vec1, $vec2)
    {
        static::checkDimensions($vec1, $vec2);
        $result = array();
        foreach ($vec1 as $i => $val)
        {
            $result[] = $val - $vec2[$i];
        }
        return $result;
    }

    /**
     * Multiply vector by scalar
     * @param array $vector
     * @param float $scalar
     * @return array
     * @throws InvalidArgumentException
     */
    public static function scalarMultiply($vector, $scalar)
    {
        static::validateVector($vector);
        if (!is_numeric($scalar))
        {
            throw new InvalidArgumentException("Scalar must be numeric");
        }
        $result = array();
        foreach ($vector as $val)
        {
            $result[] = $val * $scalar;
        }
        return $result;
    }

    /**
     * Normalize vector (convert to unit vector)
     * @param array $vector
     * @return array
     * @throws RuntimeException
     */
    public static function normalize($vector)
    {
        $magnitude = static::magnitude($vector);
        if ($magnitude == 0)
        {
            throw new RuntimeException("Cannot normalize zero vector");
        }
        return static::scalarMultiply($vector, 1 / $magnitude);
    }

    /**
     * Calculate vector magnitude (Euclidean norm)
     * @param array $vector
     * @return float
     */
    public static function magnitude($vector)
    {
        $sumOfSquares = 0;
        foreach ($vector as $val)
        {
            $sumOfSquares += $val * $val;
        }
        return sqrt($sumOfSquares);
    }

    /**
     * Dot product of two vectors
     * @param array $vec1
     * @param array $vec2
     * @return float
     * @throws InvalidArgumentException
     */
    public static function dotProduct($vec1, $vec2)
    {
        self::checkDimensions($vec1, $vec2);
        $sum = 0;
        foreach ($vec1 as $i => $val)
        {
            $sum += $val * $vec2[$i];
        }
        return $sum;
    }

    /**
     * Calculate angle between two vectors in radians
     * @param array $vec1
     * @param array $vec2
     * @return float
     * @throws InvalidArgumentException
     */
    public static function angleBetween($vec1, $vec2)
    {
        static::checkDimensions($vec1, $vec2);
        $dotProduct = static::dotProduct($vec1, $vec2);
        $mag1 = static::magnitude($vec1);
        $mag2 = static::magnitude($vec2);

        if ($mag1 == 0 || $mag2 == 0)
        {
            throw new InvalidArgumentException("Vectors must have non-zero magnitude");
        }

        return acos($dotProduct / ($mag1 * $mag2));
    }

    /**
     * Calculate sum of vector elements
     * @param array $vector
     * @return float
     */
    public static function vectorSum($vector)
    {
        static::validateVector($vector);
        return array_sum($vector);
    }

    /**
     * Calculate average of vector elements
     * @param array $vector
     * @return float
     */
    public static function vectorAvg($vector)
    {
        static::validateVector($vector);
        return static::vectorSum($vector) / count($vector);
    }

    /**
     * Find minimum value in vector
     * @param array $vector
     * @return float
     */
    public static function vectorMin($vector)
    {
        static::validateVector($vector);
        return min($vector);
    }

    /**
     * Find maximum value in vector
     * @param array $vector
     * @return float
     */
    public static function vectorMax($vector)
    {
        static::validateVector($vector);
        return max($vector);
    }

    /**
     * 1D cross product (returns scalar value)
     * @param array $vec1
     * @param array $vec2
     * @return float
     */
    public static function crossProduct1D($vec1, $vec2)
    {
        static::checkDimensions($vec1, $vec2);
        return ($vec1[0] * $vec2[0]) - ($vec1[0] * $vec2[0]); // Returns 0 in 1D
    }

    /**
     * Project vector A onto vector B
     * @param array $vecA
     * @param array $vecB
     * @return array
     */
    public static function projection($vecA, $vecB)
    {
        $scalar = static::dotProduct($vecA, $vecB) / pow(static::magnitude($vecB), 2);
        return static::scalarMultiply($vecB, $scalar);
    }

    /**
     * Append value to vector (modifies original vector)
     * @param array $vector
     * @param float $value
     */
    public static function vectorAppend(&$vector, $value)
    {
        if (!is_array($vector))
        {
            throw new InvalidArgumentException("Input must be an array");
        }
        $vector[] = $value;
    }

    /**
     * Reverse vector elements
     * @param array $vector
     * @return array
     */
    public static function vectorReverse($vector)
    {
        static::validateVector($vector);
        return array_reverse($vector);
    }

    // Helper validation methods
    private static function checkDimensions($vec1, $vec2)
    {
        if (!is_array($vec1) || !is_array($vec2))
        {
            throw new InvalidArgumentException("Both arguments must be arrays");
        }
        if (count($vec1) !== count($vec2))
        {
            throw new InvalidArgumentException("Vector dimensions must match");
        }
    }

    private static function validateVector($vector)
    {
        if (!is_array($vector))
        {
            throw new InvalidArgumentException("Input must be an array");
        }
        if (count($vector) === 0)
        {
            throw new InvalidArgumentException("Vector cannot be empty");
        }
        foreach ($vector as $val)
        {
            if (!is_numeric($val))
            {
                throw new InvalidArgumentException("Vector contains non-numeric values");
            }
        }
    }
    /**
     * Calculates the sine of an angle.
     *
     * @param float $angle The angle in radians.
     * @return float The sine of the angle.
     */
    public static function sin($angle)
    {
        return sin($angle);
    }

    /**
     * Calculates the cosine of an angle.
     *
     * @param float $angle The angle in radians.
     * @return float The cosine of the angle.
     */
    public static function cos($angle)
    {
        return cos($angle);
    }

    /**
     * Calculates the tangent of an angle.
     *
     * @param float $angle The angle in radians.
     * @return float The tangent of the angle.
     */
    public static function tan($angle)
    {
        return tan($angle);
    }

    /**
     * Calculates the arcsine (inverse sine) of a value.
     *
     * @param float $value The value, in the range [-1, 1].
     * @return float The angle in radians whose sine is the given value.
     */
    public static function asin($value)
    {
        return asin($value);
    }

    /**
     * Calculates the arccosine (inverse cosine) of a value.
     *
     * @param float $value The value, in the range [-1, 1].
     * @return float The angle in radians whose cosine is the given value.
     */
    public static function acos($value)
    {
        return acos($value);
    }

    /**
     * Calculates the arctangent (inverse tangent) of a value.
     *
     * @param float $value The value.
     * @return float The angle in radians whose tangent is the given value.
     */
    public static function atan($value)
    {
        return atan($value);
    }

    /**
     * Calculates the arctangent of y/x, using the signs of the arguments to determine the quadrant of the result.
     *
     * @param float $y The y-coordinate.
     * @param float $x The x-coordinate.
     * @return float The angle in radians.
     */
    public static function atan2($y, $x)
    {
        return atan2($y, $x);
    }

    /**
     * Calculates the hyperbolic sine of a value.
     *
     * @param float $value The value.
     * @return float The hyperbolic sine of the value.
     */
    public static function sinh($value)
    {
        return sinh($value);
    }

    /**
     * Calculates the hyperbolic cosine of a value.
     *
     * @param float $value The value.
     * @return float The hyperbolic cosine of the value.
     */
    public static function cosh($value)
    {
        return cosh($value);
    }

    /**
     * Calculates the hyperbolic tangent of a value.
     *
     * @param float $value The value.
     * @return float The hyperbolic tangent of the value.
     */
    public static function tanh($value)
    {
        return tanh($value);
    }

    /**
     * Calculates the inverse hyperbolic sine of a value.
     *
     * @param float $value The value.
     * @return float The inverse hyperbolic sine of the value.
     */
    public static function asinh($value)
    {
        return asinh($value);
    }

    /**
     * Calculates the inverse hyperbolic cosine of a value.
     *
     * @param float $value The value.
     * @return float The inverse hyperbolic cosine of the value.
     */
    public static function acosh($value)
    {
        return acosh($value);
    }

    /**
     * Calculates the inverse hyperbolic tangent of a value.
     *
     * @param float $value The value.
     * @return float The inverse hyperbolic tangent of the value.
     */
    public static function atanh($value)
    {
        return atanh($value);
    }

    /**
     * Converts an angle from degrees to radians.
     *
     * @param float $degrees The angle in degrees.
     * @return float The angle in radians.
     */
    public static function deg2rad($degrees)
    {
        return deg2rad($degrees);
    }

    /**
     * Converts an angle from radians to degrees.
     *
     * @param float $radians The angle in radians.
     * @return float The angle in degrees.
     */
    public static function rad2deg($radians)
    {
        return rad2deg($radians);
    }

    /**
     * Calculate the exponential of a number.
     *
     * @param float $x The exponent.
     * @return float The value of e raised to the power of x.
     */
    public static function exponential($x)
    {
        return exp($x);
    }

    /**
     * Calculate the natural logarithm of a number.
     *
     * @param float $x The number to calculate the logarithm for.
     * @return float The natural logarithm of x.
     * @throws InvalidArgumentException if x is less than or equal to zero.
     */
    public static function naturalLog($x)
    {
        if ($x <= 0)
        {
            throw new InvalidArgumentException('Input must be greater than zero.');
        }
        return log($x);
    }

    /**
     * Calculate the base 10 logarithm of a number.
     *
     * @param float $x The number to calculate the logarithm for.
     * @return float The base 10 logarithm of x.
     * @throws InvalidArgumentException if x is less than or equal to zero.
     */
    public static function logBase10($x)
    {
        if ($x <= 0)
        {
            throw new InvalidArgumentException('Input must be greater than zero.');
        }
        return log10($x);
    }

    /**
     * Calculate the base 2 logarithm of a number.
     *
     * @param float $x The number to calculate the logarithm for.
     * @return float The base 2 logarithm of x.
     * @throws InvalidArgumentException if x is less than or equal to zero.
     */
    public static function logBase2($x)
    {
        if ($x <= 0)
        {
            throw new InvalidArgumentException('Input must be greater than zero.');
        }
        return log($x, 2);
    }

    /**
     * Calculate the logarithm of a number with an arbitrary base.
     *
     * @param float $x The number to calculate the logarithm for.
     * @param float $base The base of the logarithm.
     * @return float The logarithm of x with the specified base.
     * @throws InvalidArgumentException if x is less than or equal to zero or base is less than or equal to one.
     */
    public static function logBase($x, $base)
    {
        if ($x <= 0 || $base <= 1)
        {
            throw new InvalidArgumentException('Input must be greater than zero and base must be greater than one.');
        }
        return log($x) / log($base);
    }

    /**
     * Change the base of a logarithm from one base to another.
     *
     * @param float $x The number to calculate the logarithm for.
     * @param float $fromBase The original base of the logarithm.
     * @param float $toBase The new base for the logarithm.
     * @return float The logarithm of x with the new base.
     * @throws InvalidArgumentException if x is less than or equal to zero or either base is less than or equal to one.
     */
    public static function changeBase($x, $fromBase, $toBase)
    {
        if ($x <= 0 || $fromBase <= 1 || $toBase <= 1)
        {
            throw new InvalidArgumentException('Input must be greater than zero and bases must be greater than one.');
        }
        return log($x) / log($fromBase) * log($toBase);
    }

    /**
     * Calculate the inverse of the natural logarithm.
     *
     * @param float $y The value to calculate the inverse for.
     * @return float The value of e raised to the power of y.
     */
    public static function inverseNaturalLog($y)
    {
        return exp($y);
    }

    /**
     * Calculate the inverse of the base 10 logarithm.
     *
     * @param float $y The value to calculate the inverse for.
     * @return float The value of 10 raised to the power of y.
     */
    public static function inverseLogBase10($y)
    {
        return pow(10, $y);
    }

    /**
     * Calculate the inverse of the base 2 logarithm.
     *
     * @param float $y The value to calculate the inverse for.
     * @return float The value of 2 raised to the power of y.
     */
    public static function inverseLogBase2($y)
    {
        return pow(2, $y);
    }

    /**
     * Calculate exponential growth.
     *
     * @param float $initial The initial amount.
     * @param float $rate The growth rate.
     * @param float $time The time period.
     * @return float The amount after exponential growth.
     */
    public static function exponentialGrowth($initial, $rate, $time)
    {
        return $initial * exp($rate * $time);
    }

    /**
     * Calculate exponential decay.
     *
     * @param float $initial The initial amount.
     * @param float $rate The decay rate.
     * @param float $time The time period.
     * @return float The amount after exponential decay.
     */
    public static function exponentialDecay($initial, $rate, $time)
    {
        return $initial * exp(-$rate * $time);
    }

    /**
     * Calculate the power of a base raised to an exponent.
     *
     * @param float $base The base.
     * @param float $exponent The exponent.
     * @return float The result of base raised to the exponent.
     */
    public static function power($base, $exponent)
    {
        return pow($base, $exponent);
    }

    /**
     * Solve for x in the equation a^x = b.
     *
     * @param float $a The base.
     * @param float $b The result.
     * @return float The value of x.
     * @throws InvalidArgumentException if a is less than or equal to zero, equal to one, or b is less than or equal to zero.
     */
    public static function solveExponentialEquation($a, $b)
    {
        if ($a <= 0 || $a == 1 || $b <= 0)
        {
            throw new InvalidArgumentException('Invalid input values.');
        }
        return log($b) / log($a);
    }

    /**
     * Calculate the logarithm of a factorial (log(n!)).
     *
     * @param int $n A non-negative integer.
     * @return float The logarithm of n!.
     * @throws InvalidArgumentException if n is negative.
     */
    public static function logFactorial($n)
    {
        if ($n < 0)
        {
            throw new InvalidArgumentException('Input must be a non-negative integer.');
        }
        $logFactorial = 0;
        for ($i = 1; $i <= $n; $i++)
        {
            $logFactorial += log($i);
        }
        return $logFactorial;
    }

}