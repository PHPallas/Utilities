<?php

/*
 * This file is part of the PHPallas package.
 *
 * (c) Sina Kuhestani <sinakuhestani@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;
use PHPallas\Utilities\DateTime;

final class DateTimeTest extends TestCase
{
    public function testGregorian()
    {
        $this->assertSame(["y" => 2025, "m" => 3, "d" => 31], DateTime::getComponents(1743457259, 0));
        $this->assertSame(["y" => 1404, "m" => 1, "d" => 12],DateTime::getComponents(1743457259, 1));
        $this->assertSame(["y" => 1446, "m" => 10, "d" => 4],DateTime::getComponents(1743457259, 2));
        $this->assertSame(["y" => 1446, "m" => 9, "d" => 30],DateTime::getComponents(1743111659, 2));
        $this->assertSame(["y" => 1404, "m" => 1, "d" => 8],DateTime::getComponents(1743111659, 1));
        $this->assertSame(["y" => 2025, "m" => 3, "d" => 27],DateTime::getComponents(1743111659, 0));
    }
    
    public function testHijriLeap()
    {
        $leaps = [
            1201,1205,1210,1214,1218,1222,1226,1230,1234,1238,1243,1247,
            1251,1255,1259,1263,1267,1271,1276,1280,1284,1288,1292,1296,
            1300,1304,1309,1313,1317,1321,1325,1329,1333,1337,1342,1346,
            1350,1354,1358,1362,1366,1370,1375,1379,1383,1387,1391,1395,
            1399,1403,1408,1412,1416,1420,1424,1428,1432,1436,1441,1445,
            1449,1453,1457,1461,1465,1469,1474,1478,1482,1486,1490,1494,
        ];
        foreach ($leaps as $leap) {
            $this -> assertSame(true, DateTime::isLeapSolarHijri($leap));
        }
    }
}