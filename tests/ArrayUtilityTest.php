<?php declare(strict_types=1);

use PHPallas\Utilities\ArrayUtility;
use PHPUnit\Framework\TestCase;

final class ArrayUtilityTest extends TestCase
{
    public function testCreateArray(): void
    {
        $expectedArray = [1, 2, 3];
        $createdArray = ArrayUtility::create(1, 2, 3);
        $this->assertSame($expectedArray, $createdArray);
    }
    public function testCreateRangeArray(): void
    {
        $expectedArray = [5, 6, 7, 8, 9];
        $createdArray = ArrayUtility::createRange(5, 9, 1);
        $this->assertSame($expectedArray, $createdArray);
        $expectedArray = [3, 6, 9];
        $createdArray = ArrayUtility::createRange(3, 9, 3);
        $this->assertSame($expectedArray, $createdArray);
    }
    public function testCreateByValue(): void
    {
        $expectedArray = [1, 1, 1, 1, 1];
        $createdArray = ArrayUtility::createByValue(5, 1);
        $this->assertSame($expectedArray, $createdArray);
    }
    public function testCreateByKeys(): void
    {
        $expectedArray = [
            "apple" => 100,
            "banana" => 100,
            "orange" => 100,
        ];
        $createdArray = ArrayUtility::createByKeys(["apple", "banana", "orange"], 100);
        $this->assertSame($expectedArray, $createdArray);
    }

    public function testIsset(): void
    {
        $array = [
            "apple" => 100,
            "banana" => 100,
        ];
        $this->assertSame(true, ArrayUtility::isset($array, "apple"));
        $this->assertSame(true, ArrayUtility::isset($array, "banana"));
        $this->assertSame(false, ArrayUtility::isset($array, "orange"));
        $this->assertSame(false, ArrayUtility::isset($array, 0));
        $array = ["apple", "banana",];
        $this->assertSame(false, ArrayUtility::isset($array, "apple"));
        $this->assertSame(false, ArrayUtility::isset($array, "banana"));
        $this->assertSame(false, ArrayUtility::isset($array, "orange"));
        $this->assertSame(true, ArrayUtility::isset($array, 0));
        $this->assertSame(true, ArrayUtility::isset($array, 1));
        $this->assertSame(false, ArrayUtility::isset($array, 2));
    }
    public function testFirstKey(): void
    {
        $array = [
            "apple" => 100,
            "banana" => 100,
        ];
        $this->assertSame("apple", ArrayUtility::firstKey($array));
        $array = ["apple", "banana",];
        $this->assertSame(0, ArrayUtility::firstKey($array));
    }
    public function testLastKey(): void
    {
        $array = [
            "apple" => 100,
            "banana" => 100,
        ];
        $this->assertSame("banana", ArrayUtility::lastKey($array));
        $array = ["apple", "banana",];
        $this->assertSame(1, ArrayUtility::lastKey($array));
    }
    public function testFirst(): void
    {
        $array = [
            "apple" => 100,
            "banana" => 100,
        ];
        $this->assertSame(100, ArrayUtility::first($array));
        $array = ["apple", "banana",];
        $this->assertSame("apple", ArrayUtility::first($array));
    }
    public function testLast(): void
    {
        $array = [
            "apple" => 100,
            "banana" => 200,
        ];
        $this->assertSame(200, ArrayUtility::last($array));
        $array = ["apple", "banana",];
        $this->assertSame("banana", ArrayUtility::last($array));
    }
    public function testDropFirst(): void
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
        $this->assertSame(
            [
                "orange" => 300,
            ],
            ArrayUtility::dropFirst($array, 2)
        );
        $this->assertSame([], ArrayUtility::dropFirst($array, 3));
        $this->assertSame([], ArrayUtility::dropFirst($array, 100));
    }
    public function testDropLast(): void
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
        $this->assertSame(
            [
                "apple" => 100,
            ],
            ArrayUtility::dropLast($array, 2)
        );
        $this->assertSame([], ArrayUtility::dropLast($array, 3));
        $this->assertSame([], ArrayUtility::dropLast($array, 100));
    }
    public function testAppend(): void
    {
        $array = ["apple"];
        $this->assertSame(["apple","orange",], ArrayUtility::append($array, "orange"));
        $this->assertNotSame(["orange","apple",], ArrayUtility::append($array, "orange"));

    }
    public function testPrepend(): void
    {
        $array = ["apple"];
        $this->assertSame(["orange","banana","apple",], ArrayUtility::prepend($array, "orange", "banana"));
        $this->assertNotSame(["apple","orange","banana",], ArrayUtility::prepend($array, "orange", "banana"));

    }
    public function testSize(): void
    {
        $array = [
            "apple",
            "other" => [
                "banana",
                "orange"
            ]
        ];
        $this->assertSame(3, ArrayUtility::size($array));
        $array = [
            "apple",
            "banana",
            "orange",
            "other" => [
                "banana",
                "orange"
            ]
        ];
        $this->assertSame(5, ArrayUtility::size($array));
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
        $this->assertSame(7, ArrayUtility::size($array));
    }
    public function testUppercaseKeys(): void
    {
        $array = ["apple" => 100, "orange" => 200];
        $this->assertSame(["APPLE" => 100, "ORANGE" => 200], ArrayUtility::uppercaseKeys($array));

    }
    public function testLowercaseKeys(): void
    {
        $array = ["APPLE" => 100, "ORANGE" => 200];
        $this->assertSame(["apple" => 100, "orange" => 200], ArrayUtility::lowercaseKeys($array));

    }
    public function testTransform(): void
    {
        $array = [1,4,9,16,25];
        $this->assertSame([1,2,3,4,5], ArrayUtility::transform($array,function($item){return (int) sqrt($item);}));

    }
    public function testTolower(): void
    {
        $array = ["appLE", "OranGe"];
        $this->assertSame(["apple", "orange"], ArrayUtility::tolower($array));

    }
    public function testToupper(): void
    {
        $array = ["appLE", "OranGe"];
        $this->assertSame(["APPLE", "ORANGE"], ArrayUtility::toupper($array));

    }
    public function testChunk(): void
    {
        $array = [1,2,3,4,5,6,7,8,9];
        $this->assertSame([[1,2,3],[4,5,6],[7,8,9]], ArrayUtility::chunk($array,3));
        $this->assertSame([[1,2,3,4,5,6],[7,8,9]], ArrayUtility::chunk($array,6));
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
        ], ArrayUtility::chunk($array,3, true));
    }
    public function testGetKeys(): void
    {
        $array = [
            "name" => "john",
            "surname" => "doe",
            "email" => "johndoe@example.com",
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $this->assertSame([
            "name" => "john",
            "surname" => "doe",
            "email" => "johndoe@example.com",
        ], ArrayUtility::getKeys($array, ["name","surname","email",]));
    }
    public function testGetColumns(): void
    {
        $array = [
            [
                "name" => "john",
                "surname" => "doe",
                "email" => "johndoe@example.com",
                "country" => "Germany",
                "city" => "Berlin",
            ],
            [
                "name" => "patt",
                "surname" => "mike",
                "email" => "patt@example.com",
                "country" => "England",
                "city" => "London",
            ]
            ];
        $this->assertSame([
            [
                "name" => "john",
                "surname" => "doe",
                "email" => "johndoe@example.com",
            ],
            [
                "name" => "patt",
                "surname" => "mike",
                "email" => "patt@example.com",
            ]
        ], ArrayUtility::getColumns($array, ["name","surname","email",]));
    }
    public function testPairedCombine(): void
    {
        $values = ["john","doe","johndoe@example.com"];
        $keys = ["name","surname","email"];
        $this->assertSame([
            "name" => "john",
            "surname" => "doe",
            "email" => "johndoe@example.com",
        ], ArrayUtility::pairedCombine($keys, $values));
    }
    public function testCount(): void
    {
        $array = ["john","mary","paul","john"];
        $this->assertSame([
            "john" => 2,
            "mary" => 1,
            "paul" => 1,
        ], ArrayUtility::counts($array));
    }
    public function testHas(): void
    {
        $array = ["john","mary","paul","john"];
        $this->assertSame(true, ArrayUtility::has($array,"john"));
        $this->assertSame(true, ArrayUtility::has($array,"paul"));
        $this->assertSame(false, ArrayUtility::has($array,"robert"));
    }

    public function testAreSame(): void
    {
        $array = ["john","mary","paul"];
        $this->assertSame(true, ArrayUtility::areSame($array,["mary","john","paul"]));
        $this->assertSame(false, ArrayUtility::areSame($array,["mary","john","paul"], true));
        $this->assertSame(true, ArrayUtility::areSame($array,["john","mary","paul"]));
        $this->assertSame(true, ArrayUtility::areSame($array,["john","mary","paul"], true));
        $array = [
            "name" => "john",
            "age" => 18
        ];
        $this->assertSame(true, ArrayUtility::areSame($array,[
            "name" => "john",
            "age" => 18
        ]));
        $this->assertSame(true, ArrayUtility::areSame($array,[
            "name" => "john",
            "age" => 18
        ],true));
        $this->assertSame(true, ArrayUtility::areSame($array,[
            "age" => 18,
            "name" => "john",
        ]));
        $this->assertSame(true, ArrayUtility::areSame($array,[
            "age" => 18,
            "name" => "john",
        ],true));
    }
    public function testFilter(): void
    {
        $array = [
            [
                "age" => 18,
                "name" => "john",
            ],
            [
                "age" => 22,
                "name" => "paul",
            ],
        ];
        $filter = function ($item) {
            return $item["age"] > 20;
        };
        $this->assertSame([["age" => 22, "name" => "paul"]], ArrayUtility::filter($array,$filter));
    }
    public function testSet(): void
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
    public function testSatisfies(): void
    {
        $condition = function ($index, $item) {
            return is_string($item);
        };
        $array = ["john","mary","paul","john"];
        $this->assertSame(true, ArrayUtility::satisfies($array, $condition));
        $array = ["john",120,"paul","john"];
        $this->assertSame(false, ArrayUtility::satisfies($array, $condition));
    }
    public function testFlip(): void
    {
        $array = [
            "name" => "john",
            "surname" => "doe",
            "email" => "johndoe@example.com",
            "country" => "Germany",
            "city" => "Berlin",
        ];
        $expected = [
            "john" => "name",
            "doe" => "surname",
            "johndoe@example.com" => "email",
            "Germany" => "country",
            "Berlin" => "city",
        ];
        $this->assertSame($expected, ArrayUtility::flip($array));
    }
    public function testMerge(): void
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
        $this->assertSame($expected, ArrayUtility::merge($array1,$array2,$array3));
    }

    public function testMix(): void
    {
        $array1 = [
            "name" => [
                "name" => "john",
            ],
        ];
        $array2 = [
            "email" => "johndoe@example.com",
            "address" => [
                "city" => "Berlin",
            ]
        ];
        $array3 = [
            "name" => [
                "surname" => "doe",
            ],
            "address" => [
                "country" => "Germany",
            ]
        ];
        $expected = [
            "name" => [
                "name" => "john",
                "surname" => "doe",
            ],
            "email" => "johndoe@example.com",
            "address" => [
                "city" => "Berlin",
                "country" => "Germany",
            ]
        ];
        $this->assertSame($expected, ArrayUtility::mix($array1,$array2,$array3));
        $array1 = [
            "fruits" => "apple"
        ];
        $array2 = [
            "fruits" => "orange"
        ];
        $expected = [
            "fruits" => ["apple", "orange"]
        ];
        $this->assertSame($expected, ArrayUtility::mix($array1,$array2));
    }
    public function testSum(): void
    {
        $array = [1,2,3];
        $this->assertSame(6, ArrayUtility::sum($array));
        $array = [1,2,"appale"];
        $this->assertSame(3, ArrayUtility::sum($array));
        $array = [1,2,"appale"=>10];
        $this->assertSame(13, ArrayUtility::sum($array));
    }

    public function testSort(): void
    {
        $array = [5,6,7,1,2];
        $this->assertSame([1,2,5,6,7], ArrayUtility::sort($array));
        $array = [5,6,7,1,2];
        $this->assertSame([7,6,5,2,1], ArrayUtility::sort($array,false,true));
        $array = ["a" => 10, "b" => 20, "c" => 30];
        $this->assertSame(["a" => 10, "b" => 20, "c" => 30], ArrayUtility::sort($array,true));
        $this->assertSame(["a" => 10, "b" => 20, "c" => 30], ArrayUtility::sort($array,false,false,true));
        $this->assertSame([ "c" => 30, "b" => 20,"a" => 10,], ArrayUtility::sort($array,false,true,true));
    }
}