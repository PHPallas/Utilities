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
}