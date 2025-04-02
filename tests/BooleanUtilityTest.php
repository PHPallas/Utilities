<?php

/*
 * This file is part of the PHPallas package.
 *
 * (c) Sina Kuhestani <sinakuhestani@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPallas\Utilities\BooleanUtility;
use PHPUnit\Framework\TestCase;

final class BooleanUtilityTest extends TestCase
{
    public function testFromString()
    {
        $this->assertSame(true, BooleanUtility::fromString("true"));
        $this->assertSame(true, BooleanUtility::fromString("ok"));
        $this->assertSame(false, BooleanUtility::fromString("nok"));
        $this->assertSame(false, BooleanUtility::fromString(""));
    }

    public function testToString()
    {
        $this->assertSame("true", BooleanUtility::toString(true));
        $this->assertSame("false", BooleanUtility::toString(false));
    }

    public function testAreEqual()
    {
        $this->assertSame(true, BooleanUtility::areEqual(true,true));
        $this->assertSame(false, BooleanUtility::areEqual(true,false));
    }

    public function testIsTrue()
    {
        $this->assertSame(true, BooleanUtility::isTRUE(true));
        $this->assertSame(false, BooleanUtility::isTRUE(false));
    }

    public function testIsFasle()
    {
        $this->assertSame(true, BooleanUtility::isFalse(false));
        $this->assertSame(false, BooleanUtility::isFalse(true));
    }

    public function testNot()
    {
        $this->assertSame(true, BooleanUtility::not(false));
        $this->assertSame(false, BooleanUtility::not(true));
    }

    public function testGnot()
    {
        $this->assertSame([true,false,false,true], BooleanUtility::gnot(false,true,true,false));
        $this->assertSame([true,false,false,true], BooleanUtility::gnot([false,true,true,false]));
    }

    public function testAnd()
    {
        $this->assertSame(false, BooleanUtility::and(false,false));
        $this->assertSame(false, BooleanUtility::and(true,false));
        $this->assertSame(false, BooleanUtility::and(false,true));
        $this->assertSame(true, BooleanUtility::and(true,true));
    }
    
    public function testGand()
    {
        $this->assertSame(false, BooleanUtility::gand(false,false,false));
        $this->assertSame(false, BooleanUtility::gand(true,false,true));
        $this->assertSame(false, BooleanUtility::gand(false,true,false));
        $this->assertSame(true, BooleanUtility::gand(true,true,true));
    }

    public function testNand()
    {
        $this->assertSame(true, BooleanUtility::nand(false,false));
        $this->assertSame(true, BooleanUtility::nand(true,false));
        $this->assertSame(true, BooleanUtility::nand(false,true));
        $this->assertSame(false, BooleanUtility::nand(true,true));
    }

    public function testGnand()
    {
        $this->assertSame(true, BooleanUtility::gnand(false,false,false));
        $this->assertSame(true, BooleanUtility::gnand(true,false,false));
        $this->assertSame(true, BooleanUtility::gnand(false,true,true));
        $this->assertSame(false, BooleanUtility::gnand(true,true,true));
    }

    public function testOr()
    {
        $this->assertSame(false, BooleanUtility::or(false,false));
        $this->assertSame(true, BooleanUtility::or(true,false));
        $this->assertSame(true, BooleanUtility::or(false,true));
        $this->assertSame(true, BooleanUtility::or(true,true));
    }

    public function testGor()
    {
        $this->assertSame(false, BooleanUtility::gor(false,false,false));
        $this->assertSame(true, BooleanUtility::gor(true,false,false));
        $this->assertSame(true, BooleanUtility::gor(false,true,true));
        $this->assertSame(true, BooleanUtility::gor(true,true,true));
    }

    public function testNor()
    {
        $this->assertSame(true, BooleanUtility::nor(false,false));
        $this->assertSame(false, BooleanUtility::nor(true,false));
        $this->assertSame(false, BooleanUtility::nor(false,true));
        $this->assertSame(false, BooleanUtility::nor(true,true));
    }

    public function testGnor()
    {
        $this->assertSame(true, BooleanUtility::gnor(false,false,false));
        $this->assertSame(false, BooleanUtility::gnor(true,false,true));
        $this->assertSame(false, BooleanUtility::gnor(false,true,false));
        $this->assertSame(false, BooleanUtility::gnor(true,true,true));
    }

    public function testXor()
    {
        $this->assertSame(false, BooleanUtility::xor(false,false));
        $this->assertSame(true, BooleanUtility::xor(true,false));
        $this->assertSame(true, BooleanUtility::xor(false,true));
        $this->assertSame(false, BooleanUtility::xor(true,true));
    }

    public function testGxor()
    {
        $this->assertSame(false, BooleanUtility::gxor(false,false,false));
        $this->assertSame(false, BooleanUtility::gxor(true,false,true));
        $this->assertSame(true, BooleanUtility::gxor(false,true,false));
        $this->assertSame(true, BooleanUtility::gxor(false,false,true));
        $this->assertSame(true, BooleanUtility::gxor(true,false,false));
        $this->assertSame(false, BooleanUtility::gxor(true,true,true));
    }

    public function testXnor()
    {
        $this->assertSame(true, BooleanUtility::xnor(false,false));
        $this->assertSame(false, BooleanUtility::xnor(true,false));
        $this->assertSame(false, BooleanUtility::xnor(false,true));
        $this->assertSame(true, BooleanUtility::xnor(true,true));
    }
    
    public function testGxnor()
    {
        $this->assertSame(true, BooleanUtility::gxnor(false,false, false));
        $this->assertSame(true, BooleanUtility::gxnor(true,false, true));
        $this->assertSame(false, BooleanUtility::gxnor(false,true, false));
        $this->assertSame(true, BooleanUtility::gxnor(true,true, true));
    }
}