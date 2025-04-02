<?php

/*
 * This file is part of the PHPallas package.
 *
 * (c) Sina Kuhestani <sinakuhestani@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPallas\Utilities\TypesUtility;
use PHPUnit\Framework\TestCase;

final class TypesUtilityTests extends TestCase
{
    public function testGetType()
    {
        $this->assertSame("string", TypesUtility::getType("text"));
        $this->assertSame("integer", TypesUtility::getType(110));
        $this->assertSame("double", TypesUtility::getType(3.14));
        $this->assertSame("array", TypesUtility::getType([]));
        $this->assertSame("null", TypesUtility::getType(null));
        $this->assertSame("object", TypesUtility::getType((object) []));
    }

    public function testIsArray()
    {
        $this->assertSame(true, TypesUtility::isArray([]));
        $this->assertSame(false, TypesUtility::isArray(110));
    }

    public function testIsBoolean()
    {
        $this->assertSame(true, TypesUtility::isBoolean(true));
        $this->assertSame(false, TypesUtility::isBoolean(1));
        $this->assertSame(false, TypesUtility::isBoolean("true"));
    }

    public function testIsCallable()
    {
        $this->assertSame(true, TypesUtility::isCallable(function (){}));
        $this->assertSame(false, TypesUtility::isCallable(1));
        $this->assertSame(false, TypesUtility::isCallable("true"));
    }

    public function testIsCountable()
    {
        $this->assertSame(false, TypesUtility::isCountable(function (){}));
        $this->assertSame(false, TypesUtility::isCountable(1));
        $this->assertSame(true, TypesUtility::isCountable([]));
    }

    public function testIsFloat()
    {
        $this->assertSame(true, TypesUtility::isFloat(1.2));
        $this->assertSame(false, TypesUtility::isFloat(1));
        $this->assertSame(false, TypesUtility::isFloat("true"));
    }

    public function testIsInteger()
    {
        $this->assertSame(true, TypesUtility::isInteger(15));
        $this->assertSame(false, TypesUtility::isInteger(1.0));
        $this->assertSame(false, TypesUtility::isInteger("true"));
    }

    public function testIsIterable()
    {
        $this->assertSame(false, TypesUtility::isIterable(function ()
        {
        }));
        $this->assertSame(false, TypesUtility::isIterable(1));
        $this->assertSame(true, TypesUtility::isIterable([]));
    }

    public function testIsNull()
    {
        $this->assertSame(false, TypesUtility::isNull(""));
        $this->assertSame(false, TypesUtility::isNull(0));
        $this->assertSame(false, TypesUtility::isNull([]));
        $this->assertSame(true, TypesUtility::isNull(null));
    }

    public function testIsNumeric()
    {
        $this->assertSame(false, TypesUtility::isNumeric(""));
        $this->assertSame(true, TypesUtility::isNumeric(0));
        $this->assertSame(false, TypesUtility::isNumeric([]));
        $this->assertSame(true, TypesUtility::isNumeric("1.2"));
        $this->assertSame(true, TypesUtility::isNumeric(1.2));
    }

    public function testIsObject()
    {
        $this->assertSame(false, TypesUtility::isObject(""));
        $this->assertSame(false, TypesUtility::isObject(0));
        $this->assertSame(false, TypesUtility::isObject([]));
        $this->assertSame(true, TypesUtility::isObject((object) []));
    }

    public function testIsResource()
    {
        $this->assertSame(false, TypesUtility::isResource(""));
        $this->assertSame(false, TypesUtility::isResource(0));
        $this->assertSame(false, TypesUtility::isResource([]));
        $fp = fopen(__FILE__, "r");
        $this->assertSame(true, TypesUtility::isResource($fp));
        fclose($fp);
    }

    public function testIsScalar()
    {
        $this->assertSame(true, TypesUtility::isScalar(""));
        $this->assertSame(true, TypesUtility::isScalar(0));
        $this->assertSame(false, TypesUtility::isScalar([]));
        $this->assertSame(false, TypesUtility::isScalar(null));
    }

    public function testIsString()
    {
        $this->assertSame(true, TypesUtility::isString(""));
        $this->assertSame(false, TypesUtility::isString(0));
        $this->assertSame(false, TypesUtility::isString([]));
        $this->assertSame(false, TypesUtility::isString(null));
    }

    public function testConvert()
    {
        $variable = "text";
        $this->assertSame("boolean", TypesUtility::getType(TypesUtility::to($variable, "boolean")));
        $this->assertSame("double", TypesUtility::getType(TypesUtility::to($variable, "float")));
        $this->assertSame("array", TypesUtility::getType(TypesUtility::to($variable, "array")));
        $variable = [];
        $this->assertSame("string", TypesUtility::getType(TypesUtility::toString($variable)));
        $this->assertSame("object", TypesUtility::getType(TypesUtility::toObject($variable)));
    }
}