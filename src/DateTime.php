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

class DateTime
{
    const CALENDAR_GREGORIAN = 0;
    const CALENDAR_SOLAR_HIJRI = 1;
    const CALENDAR_LUNAR_HIJRI = 2;

    /**
     * Summary of toString
     * @param int $timestamp
     * @param string $format
     * @param int $calendar
     * @return array
     */
    public static function getComponents($timestamp, $calendar = 0)
    {
        $year = (int) date("Y", $timestamp);
        $month = (int) date("m", $timestamp);
        $day = (int) date("d", $timestamp);
        $jdn = (int) gregoriantojd($month, $day, $year);
        $output = [];
        if (TypesUtility::isInteger($timestamp))
        {
            switch ($calendar)
            {
                case DateTime::CALENDAR_GREGORIAN:
                    $output = [
                        "y" => $year,
                        "m" => $month,
                        "d" => $day,
                    ];
                    break;
                case DateTime::CALENDAR_SOLAR_HIJRI:
                    $jdn -= 1948319;
                    $output = [
                        "y" => 1,
                        "m" => 1,
                        "d" => 1
                    ];
                    for ($i = 0; $i < $jdn; $i++)
                    {
                        $maxDaysInMonth = 31;
                        if ($output["m"] > 6)
                        {
                            $maxDaysInMonth = 30;
                            if ($output["m"] === 12)
                            {
                                $maxDaysInMonth = 29;
                                if (static::isLeapSolarHijri($output["y"]))
                                {
                                    $maxDaysInMonth = 30;
                                }
                            }
                        }
                        $output["d"]++;
                        if ($output["d"] > $maxDaysInMonth)
                        {
                            $output["d"] = 1;
                            $output["m"]++;
                        }
                        if ($output["m"] > 12)
                        {
                            $output["m"] = 1;
                            $output["d"] = 1;
                            $output["y"]++;
                        }
                    }
                    break;
                case DateTime::CALENDAR_LUNAR_HIJRI:
                    //$jdn -= 1948439;
                    $output = [
                        "y" => 1,
                        "m" => 1,
                        "d" => 1
                    ];
                    $daysSinceStart = $jdn - 1948245;

                    while ($daysSinceStart >= 354) {
                        $daysInYear = static::isLeapLunarHijri($output["y"]) ? 355 : 354;
                        if ($daysSinceStart >= $daysInYear) {
                            $daysSinceStart -= $daysInYear;
                            $output["y"]++;
                        } else {
                            break;
                        }
                    }

                    while ($daysSinceStart >= 29) {
                        $daysInMonth = ($output["m"] % 2 == 1) ? 30 : 29; // Odd months have 30 days
                        if ($output["m"] == 12 && static::isLeapLunarHijri($output["y"])) {
                            $daysInMonth = 30; // Adjust for leap year in last month
                        }
                        if ($daysSinceStart >= $daysInMonth) {
                            $daysSinceStart -= $daysInMonth;
                            $output["m"]++;
                        } else {
                            break;
                        }
                    }
                    $output["d"] += $daysSinceStart;
                    break;
            }
        }
        return $output;
    }

    /**
     * Checks if a Solar Hijri year is leap year
     * @param mixed $year
     * @return bool
     */
    public static function isLeapSolarHijri($year)
    {
        $mod = fmod($year + 33000, 33);
        return in_array($mod, [1, 5, 9, 13, 17, 22, 26, 30]);
    }

    public static function isLeapLunarHijri($year)
    {
        return (($year % 30) % 2 == 0 && ($year % 30) != 0) || ($year % 30) == 0;
    }
}