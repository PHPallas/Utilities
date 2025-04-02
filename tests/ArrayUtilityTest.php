<?php

/*
 * This file is part of the PHPallas package.
 *
 * (c) Sina Kuhestani <sinakuhestani@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPallas\Utilities\ArrayUtility;
use PHPUnit\Framework\TestCase;

final class ArrayUtilityTest extends TestCase
{
    public function testCreateArray()
    {
        $expectedArray = [1, 2, 3];
        $createdArray = ArrayUtility::create(1, 2, 3);
        $this->assertSame($expectedArray, $createdArray);
    }
    
    public function testCreateRandomArray()
    {
        $expectedSize = 8;
        $createdArray = ArrayUtility::createRandom($expectedSize);
        $this->assertSame($expectedSize, ArrayUtility::estimateSize($createdArray));
    }

    public function testCreateRangeArray()
    {
        $expectedArray = [5, 6, 7, 8, 9];
        $createdArray = ArrayUtility::createRange(5, 9, 1);
        $this->assertSame($expectedArray, $createdArray);
        $expectedArray = [3, 6, 9];
        $createdArray = ArrayUtility::createRange(3, 9, 3);
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testCreateByValue()
    {
        $expectedArray = [1, 1, 1, 1, 1];
        $createdArray = ArrayUtility::createByValue(5, 1);
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testCreateZeroArray()
    {
        $expectedArray = [0, 0, 0, 0];
        $createdArray = ArrayUtility::createZeroArray(4);
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testCreateNullArray()
    {
        $expectedArray = [null, null, null];
        $createdArray = ArrayUtility::createNullArray(3);
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testCreateEmpty()
    {
        $expectedArray = [];
        $createdArray = ArrayUtility::createEmpty();
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testCreateByKeys()
    {
        $expectedArray = [
            "apple" => 100,
            "banana" => 100,
            "orange" => 100,
        ];
        $createdArray = ArrayUtility::createByKeys(["apple", "banana", "orange"], 100);
        $this->assertSame($expectedArray, $createdArray);
    }

    public function createMatrixarray()
    {
        $expectedArray = [
            [1, 1],
            [1, 1],
            [1, 1]
        ];
        $createdArray = ArrayUtility::createMatrixArray(1, 3, 1);
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testCreateTableArray()
    {
        $expectedArray = [
            [
                "fname" => "test",
                "lname" => "test",
            ],
            [
                "fname" => "test",
                "lname" => "test",
            ],
            [
                "fname" => "test",
                "lname" => "test",
            ]
        ];
        $createdArray = ArrayUtility::createTableArray(["fname", "lname"], 3, "test");
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testCreatePairs()
    {
        $expectedArray = [
            "fname" => "John",
            "lname" => "Doe",
        ];
        $createdArray = ArrayUtility::createPairs(["fname", "lname"], ["John", "Doe"]);
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testGet()
    {
        $array = [
            "info" => [
                "fname" => "john",
                "lname" => "doe"
            ],
            "age" => 18
        ];
        $this->assertSame("john", ArrayUtility::get($array, "info.fname"));
        $this->assertSame("doe", ArrayUtility::get($array, "info.lname"));
        $this->assertSame(18, ArrayUtility::get($array, "age"));
    }

    public function testGetFirst()
    {
        $array = [
            "apple" => 100,
            "banana" => 100,
        ];
        $this->assertSame(100, ArrayUtility::getFirst($array));
        $array = ["apple", "banana",];
        $this->assertSame("apple", ArrayUtility::getFirst($array));
    }

    public function testGetLast()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
        ];
        $this->assertSame(200, ArrayUtility::getLast($array));
        $array = ["apple", "banana",];
        $this->assertSame("banana", ArrayUtility::getLast($array));
    }

    public function testGetKeys()
    {
        $array = [
            "fname" => "john",
            "lname" => "doe",
        ];
        $this->assertSame(["fname", "lname"], ArrayUtility::getKeys($array));
    }

    public function testGetFirstKey()
    {
        $array = [
            "fname" => "john",
            "lname" => "doe",
        ];
        $this->assertSame("fname", ArrayUtility::getFirstKey($array));
        $array = ["john", "doe"];
        $this->assertSame(0, ArrayUtility::getFirstKey($array));
    }

    public function testGetLastKey()
    {
        $array = [
            "fname" => "john",
            "lname" => "doe",
        ];
        $this->assertSame("lname", ArrayUtility::getLastKey($array));
        $array = ["john", "doe"];
        $this->assertSame(1, ArrayUtility::getLastKey($array));
    }

    public function testGetSubset()
    {
        $array = [
            "fname" => "john",
            "lname" => "doe",
            "age" => 18,
            "gender" => "male",
        ];
        $expected = [
            "fname" => "john",
            "gender" => "male",
        ];
        $this->assertSame($expected, ArrayUtility::getSubset($array, ["fname", "gender"]));
    }

    public function testGetColumns()
    {
        $array = [
            [
                "fname" => "john",
                "lname" => "doe",
                "age" => 18,
                "gender" => "male",
            ],
            [
                "fname" => "david",
                "lname" => "bradt",
                "age" => 24,
                "gender" => "male",
            ]
        ];
        $expected = [
            [
                "fname" => "john",
                "lname" => "doe",
            ],
            [
                "fname" => "david",
                "lname" => "bradt",
            ]
        ];
        $this->assertSame($expected, ArrayUtility::getColumns($array, ["fname", "lname"]));
    }

    public function testGetFiltered()
    {
        $array = [
            [
                "fname" => "john",
                "lname" => "doe",
                "age" => 18,
                "gender" => "male",
            ],
            [
                "fname" => "david",
                "lname" => "bradt",
                "age" => 24,
                "gender" => "male",
            ]
        ];
        $expected = [
            [
                "fname" => "john",
                "lname" => "doe",
                "age" => 18,
                "gender" => "male",
            ]
        ];
        $filter = function ($item)
        {
            return $item["age"] < 20;
        };
        $this->assertSame($expected, ArrayUtility::getFiltered($array, $filter));
    }

    public function testSet()
    {
        $array = [
            "name" => [
                "nickname" => "john",
                "surname" => "doe"
            ],
            "address" => [
                "city" => "London",
                "country" => "England"
            ]
        ];
        $array2 = $array;
        ArrayUtility::set($array2, "name.nickname", "paul");
        $this->assertSame([
            "name" => [
                "nickname" => "paul",
                "surname" => "doe"
            ],
            "address" => [
                "city" => "London",
                "country" => "England"
            ]
        ], $array2);
    }

    public function testHasKey()
    {
        $array = [
            "apple" => 100,
            "banana" => 100,
        ];
        $this->assertSame(true, ArrayUtility::hasKey($array, "apple"));
        $this->assertSame(true, ArrayUtility::hasKey($array, "banana"));
        $this->assertSame(false, ArrayUtility::hasKey($array, "orange"));
        $this->assertSame(false, ArrayUtility::hasKey($array, 0));
        $array = ["apple", "banana",];
        $this->assertSame(false, ArrayUtility::hasKey($array, "apple"));
        $this->assertSame(false, ArrayUtility::hasKey($array, "banana"));
        $this->assertSame(false, ArrayUtility::hasKey($array, "orange"));
        $this->assertSame(true, ArrayUtility::hasKey($array, 0));
        $this->assertSame(true, ArrayUtility::hasKey($array, 1));
        $this->assertSame(false, ArrayUtility::hasKey($array, 2));
    }

    public function testHas()
    {
        $array = ["john", "mary", "paul", "john"];
        $this->assertSame(true, ArrayUtility::has($array, "john"));
        $this->assertSame(true, ArrayUtility::has($array, "paul"));
        $this->assertSame(false, ArrayUtility::has($array, "robert"));
    }

    public function testAdd()
    {
        $array = ["apple"];
        $this->assertSame(["apple", "orange",], ArrayUtility::add($array, "orange"));
        $this->assertNotSame(["orange", "apple",], ArrayUtility::add($array, "orange"));

    }

    public function testAddToStart()
    {
        $array = ["apple"];
        $this->assertSame(["orange", "banana", "apple",], ArrayUtility::addToStart($array, "orange", "banana"));
        $this->assertNotSame(["apple", "orange", "banana",], ArrayUtility::addToStart($array, "orange", "banana"));

    }

    public function testDropFromStart()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
            "orange" => 300,
        ];
        $this->assertSame(
            [
                "banana" => 200,
                "orange" => 300,
            ],
            ArrayUtility::dropFromStart($array)
        );
        $this->assertSame(
            [
                "orange" => 300,
            ],
            ArrayUtility::dropFromStart($array, 2)
        );
        $this->assertSame([], ArrayUtility::dropFromStart($array, 3));
        $this->assertSame([], ArrayUtility::dropFromStart($array, 100));
    }

    public function testDropFisrt()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
            "orange" => 300,
        ];
        $this->assertSame(
            [
                "banana" => 200,
                "orange" => 300,
            ],
            ArrayUtility::dropFirst($array)
        );
    }

    public function testDropFromEnd()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
            "orange" => 300,
        ];
        $this->assertSame(
            [
                "apple" => 100,
                "banana" => 200,
            ],
            ArrayUtility::dropFromEnd($array)
        );
        $this->assertSame(
            [
                "apple" => 100,
            ],
            ArrayUtility::dropFromEnd($array, 2)
        );
        $this->assertSame([], ArrayUtility::dropFromEnd($array, 3));
        $this->assertSame([], ArrayUtility::dropFromEnd($array, 100));
    }

    public function testDropLast()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
            "orange" => 300,
        ];
        $this->assertSame(
            [
                "apple" => 100,
                "banana" => 200,
            ],
            ArrayUtility::dropLast($array)
        );
    }

    public function testDropKey()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
            "orange" => 300,
        ];
        $this->assertSame(
            [
                "apple" => 100,
                "orange" => 300,
            ],
            ArrayUtility::dropKey($array, "banana")
        );
    }

    public function testDrop()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
            "orange" => 300,
        ];
        $this->assertSame(
            [
                "apple" => 100,
                "orange" => 300,
            ],
            ArrayUtility::drop($array, 200)
        );
        $array = [
            "apple" => 200,
            "banana" => 200,
            "orange" => 300,
        ];
        $this->assertSame(
            [
                "orange" => 300,
            ],
            ArrayUtility::drop($array, 200)
        );
    }

    public function testTransform()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
            "orange" => 300,
        ];
        $transform = function ($key, $value)
        {
            $key = strtoupper($key);
            $value = $value / 2;
            return [$key, $value];
        };
        $this->assertSame(
            [
                "APPLE" => 50,
                "BANANA" => 100,
                "ORANGE" => 150,
            ],
            ArrayUtility::transform($array, $transform)
        );
    }

    public function testTransformToUppercaseKeys()
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
            "orange" => 300,
        ];
        $this->assertSame(
            [
                "APPLE" => 100,
                "BANANA" => 200,
                "ORANGE" => 300,
            ],
            ArrayUtility::transformToUppercaseKeys($array)
        );
    }

    public function testTransformToLowercaseKeys()
    {
        $array = [
            "APPLE" => 100,
            "BANANA" => 200,
            "ORANGE" => 300,

        ];
        $this->assertSame(
            [
                "apple" => 100,
                "banana" => 200,
                "orange" => 300,
            ],
            ArrayUtility::transformToLowercaseKeys($array)
        );
    }

    public function testTransformToUppercase()
    {
        $array = [
            "apple",
            "banana",
            "orange",
        ];
        $this->assertSame(
            [
                "APPLE",
                "BANANA",
                "ORANGE",
            ],
            ArrayUtility::transformToUppercase($array)
        );
    }

    public function testTransformToLowercase()
    {
        $array = [
            "APPLE",
            "BANANA",
            "ORANGE",
        ];
        $this->assertSame(
            [
                "apple",
                "banana",
                "orange",
            ],
            ArrayUtility::transformToLowercase($array)
        );
    }

    public function testTransformFlip()
    {
        $array = [
            "APPLE" => 100,
            "BANANA" => 200,
            "ORANGE" => 300,

        ];
        $this->assertSame(
            [
                100 => "APPLE",
                200 => "BANANA",
                300 => "ORANGE",
            ],
            ArrayUtility::transformFlip($array)
        );
    }

    public function testIsAssociative()
    {
        $array = [
            "APPLE" => 100,
            "BANANA" => 200,
            "ORANGE" => 300,

        ];
        $this->assertSame(
            true,
            ArrayUtility::isAssociative($array)
        );
        $array = [
            "APPLE",
            "BANANA",
            "ORANGE",

        ];
        $this->assertSame(
            false,
            ArrayUtility::isAssociative($array)
        );
    }

    public function testIsEmpty()
    {
        $this->assertSame(
            true,
            ArrayUtility::isEmpty([])
        );
        $this->assertSame(
            false,
            ArrayUtility::isEmpty([null])
        );
    }

    public function testIsSameAs()
    {
        $this->assertSame(
            true,
            ArrayUtility::isSameAs([], [])
        );
        $this->assertSame(
            true,
            ArrayUtility::isSameAs([1, 2, 3], [3, 2, 1])
        );
        $this->assertSame(
            false,
            ArrayUtility::isSameAs([1, 2, 3], [3, 2, 1], true)
        );
        $this->assertSame(
            true,
            ArrayUtility::isSameAs(["a" => 1, "b" => 2], ["b" => 2, "a" => 1])
        );
        $this->assertSame(
            true,
            ArrayUtility::isSameAs(["a" => 1, "b" => 2], ["b" => 2, "a" => 1], true)
        );
    }

    public function testIsEligible()
    {
        $test1 = function ($key, $value)
        {
            return $value > 5;
        };
        $test2 = function ($key, $value)
        {
            return $value > 15;
        };
        $array = [10, 20, 30];
        $this->assertSame(
            true,
            ArrayUtility::isEligibleTo($array, $test1)
        );
        $this->assertSame(
            false,
            ArrayUtility::isEligibleTo($array, $test2)
        );
    }

    public function testIsString()
    {
        $this->assertSame(
            false,
            ArrayUtility::isString([1, 2])
        );
        $this->assertSame(
            true,
            ArrayUtility::isString(["1", "2"])
        );
    }

    public function testIsBoolean()
    {
        $this->assertSame(
            false,
            ArrayUtility::isBoolean([1, 0])
        );
        $this->assertSame(
            true,
            ArrayUtility::isBoolean([false, true])
        );
    }

    public function testIsCallable()
    {
        $this->assertSame(
            false,
            ArrayUtility::isCallable([1, 0])
        );
        $this->assertSame(
            true,
            ArrayUtility::isCallable([function ()
            {}, function ()
            {}])
        );
    }

    public function testIsCountable()
    {
        $this->assertSame(
            true,
            ArrayUtility::isCountable([[], [1, 2]])
        );
        $this->assertSame(
            false,
            ArrayUtility::isCountable([1, 2, [3, 4]])
        );
    }

    public function testIsIterable()
    {
        $this->assertSame(
            true,
            ArrayUtility::isIterable([[], [1, 2]])
        );
        $this->assertSame(
            false,
            ArrayUtility::isIterable([1, 2, [3, 4]])
        );
    }

    public function testIsNumeric()
    {
        $this->assertSame(
            true,
            ArrayUtility::isNumeric([1, 2, "3"])
        );
        $this->assertSame(
            false,
            ArrayUtility::isNumeric(["test", 2, 3])
        );
    }

    public function testIsScalar()
    {
        $this->assertSame(
            true,
            ArrayUtility::isScalar([1, "2", "test"])
        );
        $this->assertSame(
            false,
            ArrayUtility::isScalar(["test", [2, 3]])
        );
    }

    public function testIsFloat()
    {
        $this->assertSame(
            true,
            ArrayUtility::isFloat([1.1, 2.0, 3.0, 5.3])
        );
        $this->assertSame(
            false,
            ArrayUtility::isFloat([1, 2, 3, 4, 5])
        );
    }

    public function testIsNull()
    {
        $this->assertSame(
            true,
            ArrayUtility::isNull([null, null])
        );
        $this->assertSame(
            false,
            ArrayUtility::isNull([1, 2, 3, 4, 5])
        );
    }

    public function testIsObject()
    {
        $this->assertSame(
            true,
            ArrayUtility::isObject([new ArrayUtility(), new ArrayUtility()])
        );
        $this->assertSame(
            false,
            ArrayUtility::isObject([1, 2, 3, 4, 5])
        );
    }

    public function testIsArray()
    {
        $this->assertSame(
            true,
            ArrayUtility::isArray([[], [2, 1, 5], ["a", "b"]])
        );
        $this->assertSame(
            false,
            ArrayUtility::isArray([1, 2, [3, 4], 5])
        );
    }

    public function testIsInstanceOf()
    {
        $this->assertSame(
            true,
            ArrayUtility::isInstanceOf([new ArrayUtility(), new ArrayUtility()], ArrayUtility::class)
        );
        $this->assertSame(
            false,
            ArrayUtility::isInstanceOf([1, 2, 3, 4, 5], ArrayUtility::class)
        );
    }

    public function testEstimateSize()
    {
        $array = [
            "apple",
            "other" => [
                "banana",
                "orange"
            ]
        ];
        $this->assertSame(3, ArrayUtility::estimateSize($array));
        $array = [
            "apple",
            "banana",
            "orange",
            "other" => [
                "banana",
                "orange"
            ]
        ];
        $this->assertSame(5, ArrayUtility::estimateSize($array));
        $array = [
            "apple",
            "banana",
            "orange",
            "other" => [
                "banana",
                "orange",
                "other" => [
                    "appale",
                    "appale",
                ]
            ]
        ];
        $this->assertSame(7, ArrayUtility::estimateSize($array));
    }

    public function testEstimateSum()
    {
        $array = [1, 2, 3];
        $this->assertSame(6, ArrayUtility::estimateSum($array));
        $array = [1, 2, "appale"];
        $this->assertSame(3, ArrayUtility::estimateSum($array));
        $array = [1, 2, "appale" => 10];
        $this->assertSame(13, ArrayUtility::estimateSum($array));
    }

    public function testEstimateCounts()
    {
        $array = [
            "banana",
            "banana",
            "banana",
            "grape",
            "orange",
            "orange",
        ];
        $this->assertSame(["banana" => 3, "grape" => 1, "orange" => 2], ArrayUtility::estimateCounts($array));
    }

    public function testMerge()
    {
        $array1 = [
            "name" => "john",
            "surname" => "doe",
        ];
        $array2 = [
            "email" => "johndoe@example.com",
        ];
        $array3 = [
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $expected = [
            "name" => "john",
            "surname" => "doe",
            "email" => "johndoe@example.com",
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $this->assertSame($expected, ArrayUtility::merge($array1, $array2, $array3));
        $array1 = [
            "name" => [
                "name" => "john",
                "surname" => "doe",
            ]
        ];
        $array2 = [
            "email" => "johndoe@example.com",
            "name" => [
                "midname" => "washington"
            ]
        ];
        $array3 = [
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $expected = [
            "name" => [
                "midname" => "washington"
            ],
            "email" => "johndoe@example.com",
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $this->assertSame($expected, ArrayUtility::merge($array1, $array2, $array3));
    }

    public function testMergeInDepth()
    {
        $array1 = [
            "name" => [
                "name" => "john",
                "surname" => "doe",
            ]
        ];
        $array2 = [
            "email" => "johndoe@example.com",
            "name" => [
                "midname" => "washington"
            ]
        ];
        $array3 = [
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $expected = [
            "name" => [
                "name" => "john",
                "surname" => "doe",
                "midname" => "washington"
            ],
            "email" => "johndoe@example.com",
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $this->assertSame($expected, ArrayUtility::mergeInDepth($array1, $array2, $array3));
    }

    public function testSplit()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $this->assertSame([[1, 2, 3], [4, 5, 6], [7, 8, 9]], ArrayUtility::split($array, 3));
        $this->assertSame([[1, 2, 3, 4, 5, 6], [7, 8, 9]], ArrayUtility::split($array, 6));
        $array = [
            "name" => "john",
            "surname" => "doe",
            "email" => "johndoe@example.com",
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $this->assertSame([
            [
                "name" => "john",
                "surname" => "doe",
                "email" => "johndoe@example.com",
            ],
            [
                "country" => "Germany",
                "city" => "Berlin",
            ]
        ], ArrayUtility::split($array, 3, true));
    }

    public function testSort()
    {
        $array = [5, 6, 7, 1, 2];
        $this->assertSame([1, 2, 5, 6, 7], ArrayUtility::sort($array));
        $array = [5, 6, 7, 1, 2];
        $this->assertSame([7, 6, 5, 2, 1], ArrayUtility::sort($array, false, true));
        $array = ["a" => 10, "b" => 20, "c" => 30];
        $this->assertSame(["a" => 10, "b" => 20, "c" => 30], ArrayUtility::sort($array, true));
        $this->assertSame(["a" => 10, "b" => 20, "c" => 30], ArrayUtility::sort($array, false, false, true));
        $this->assertSame(["c" => 30, "b" => 20, "a" => 10,], ArrayUtility::sort($array, false, true, true));
    }

    public function testSortRandom()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $result = ArrayUtility::sortRandom($array);
        $this->assertSame($array, ArrayUtility::sort($result));
        $this->assertNotSame($array, $result);
    }
}