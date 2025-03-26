<?php declare(strict_types=1);

use PHPallas\Utilities\ArrayUtility;
use PHPallas\Utilities\Polyfill;
use PHPallas\Utilities\StringUtility;
use PHPUnit\Framework\TestCase;

final class StringUtilityTest extends TestCase
{
    public function testCreate()
    {
        $string = StringUtility::create("Z", 5);
        $this->assertSame("ZZZZZ", $string);

        $string = StringUtility::create("ض", 5);
        $this->assertSame("ضضضضض", $string);
    }
    public function testCreateRandom()
    {
        $string = StringUtility::createRandom(8);
        $this->assertSame(Polyfill::mb_strlen($string), 8);
        $this->assertIsString($string);

        $string = StringUtility::createRandom(8, "ضصثقفلبیسشظطزرذ");
        $this->assertSame(Polyfill::mb_strlen($string), 8);
        $this->assertIsString($string);
    }
    public function testCreateByRepeat()
    {
        $string = StringUtility::createByRepeat("Zx", 5);
        $this->assertSame("ZxZxZxZxZx", $string);

        $string = StringUtility::createByRepeat("صض", 5);
        $this->assertSame("صضصضصضصضصض", $string);
    }
    public function testGet()
    {
        $string = "Hello World!";
        $this->assertSame("W", StringUtility::get($string, 6));

        $string = "سلام دنیا!";
        $this->assertSame("ن", StringUtility::get($string, 6));
    }
    public function testGetSubset()
    {
        $string = "Hello World!";
        $sub = StringUtility::getSubset($string, 3,4);
        $this->assertSame("lo W", $sub);

        $string = "سلام دنیا!";
        $sub = StringUtility::getSubset($string, 5,4);
        $this->assertSame("دنیا", $sub);
    }
    public function testGetSegment()
    {
        $string = "Hello World!";
        $segment = StringUtility::getSegment($string, 3,8);
        $this->assertSame("lo Wo", $segment);

        $string = "سلام دنیا!";
        $segment = StringUtility::getSegment($string, 3,8);
        $this->assertSame("م دنی", $segment);
    }
    public function testSet()
    {
        $string = "Hello World!";
        $result = StringUtility::set($string, 6, "w");
        $this->assertSame("Hello world!", $result);

        $string = "سلام دنیا!";
        $result = StringUtility::set($string, 6, "ر");
        $this->assertSame("سلام دریا!", $result);
    }
    public function testSetReplace()
    {
        $string = "Hello World!";
        $result = StringUtility::setReplace($string, ["World"], ["Guys"]);
        $this->assertSame("Hello Guys!", $result);

        $string = "سلام دنیا!";
        $result = StringUtility::setReplace($string, ["دنیا"], ["فرناز"]);
        $this->assertSame("سلام فرناز!", $result);
    }
    public function testSetInStart()
    {
        $string = "888";
        $result = StringUtility::setInStart($string, "0", 8);
        $this->assertSame("00000888", $result);
    }
    public function testSetInEnd()
    {
        $string = "888";
        $result = StringUtility::setInEnd($string, "0", 8);
        $this->assertSame("88800000", $result);

        $string = "سلام";
        $result = StringUtility::setInEnd($string, "م", 8);
        $this->assertSame("سلاممممم", $result);

        $string = "hello";
        $result = StringUtility::setInEnd($string, "o", 8);
        $this->assertSame("helloooo", $result);
    }
    public function testHasPhrase()
    {
        $string = "Hello World!";
        $this->assertSame(true, StringUtility::hasPhrase($string,"World"));
        $this->assertSame(true, StringUtility::hasPhrase($string, "world", false));
        $this->assertSame(false, StringUtility::hasPhrase($string, "world"));
        $this->assertSame(false, StringUtility::hasPhrase($string, "world", true));

        $string = "سلام دنیا!";
        $this->assertSame(true, StringUtility::hasPhrase($string,"سلام"));
        $this->assertSame(true, StringUtility::hasPhrase($string, "سلام", false));
        $this->assertSame(true, StringUtility::hasPhrase($string, "سلام"));
        $this->assertSame(true, StringUtility::hasPhrase($string, "سلام", true));
    }
    public function testAddToEnd()
    {
        $string = "Hi,";
        $this->assertSame("Hi, Guys!", StringUtility::addToEnd($string, " Guys!"));

        $string = "سلام,";
        $this->assertSame("سلام, دوستان!", StringUtility::addToEnd($string, " دوستان!"));
    }
    public function testAddToStart()
    {
        $string = "World!";
        $this->assertSame("Hello World!", StringUtility::addToStart($string, "Hello "));

        $string = "دنیا!";
        $this->assertSame("سلام دنیا!", StringUtility::addToStart($string, "سلام "));
    }
    public function testAddToCenter()
    {
        $string = "World!";
        $this->assertSame("WorHellold!", StringUtility::AddToCenter($string, "Hello"));

        $string = "WordPress";
        $this->assertSame("WordxxxPress", StringUtility::AddToCenter($string, "xxx"));

        $string = "دنیا";
        $this->assertSame("دنسلامیا", StringUtility::AddToCenter($string, "سلام"));

        $string = "مهاراجه";
        $this->assertSame("مهاساراجه", StringUtility::AddToCenter($string, "سا"));
    }
    public function testAddEvenly()
    {
        $string = "World!";
        $this->assertSame("Wo--rl--d!", StringUtility::addEvenly($string, "--", 2));

        $string = "سلام!";
        $this->assertSame("سل--ام--!", StringUtility::addEvenly($string, "--", 2));
    }
    public function testDrop()
    {
        $string = "Hello World!";
        $this->assertSame("Heo Word!", StringUtility::drop($string, "l"));

        $string = "سلام دنیا!";
        $this->assertSame("لام دنیا!", StringUtility::drop($string, "س"));
    }
    public function testDropFirst()
    {
        $string = "Hello World!";
        $this->assertSame("ello World!", StringUtility::dropFirst($string));


        $string = "سلام دنیا!";
        $this->assertSame("لام دنیا!", StringUtility::dropFirst($string));
    }    
    public function testDropFromStart()
    {
        $string = "---[Hello World]---";
        $this->assertSame("[Hello World]---", StringUtility::dropFromStart($string, "-"));

        $string = "---[سلام دنیا]---";
        $this->assertSame("[سلام دنیا]---", StringUtility::dropFromStart($string, "-"));
    }
    public function testDropFromEnd()
    {
        $string = "---[Hello World]---";
        $this->assertSame("---[Hello World]", StringUtility::dropFromEnd($string, "-"));

        $string = "سلام دنیا";
        $this->assertSame("سلام دنی", StringUtility::dropFromEnd($string, "ا"));
    }
    public function testDropLast()
    {
        $string = "Hello World!";
        $this->assertSame("Hello World", StringUtility::dropLast($string));

        $string = "زن زندگی آزادی";
        $this->assertSame("زن زندگی آزاد", StringUtility::dropLast($string));
    }
    public function testDropFromSides()
    {
        $string = "---[Hello World]---";
        $this->assertSame("[Hello World]", StringUtility::dropFromSides($string, "-"));


        $string = "ایلیا";
        $this->assertSame("یلی", StringUtility::dropFromSides($string, "ا"));
    }
    public function testDropNth()
    {
        $string = "Hello World!";
        $this->assertSame("Hello Word!", StringUtility::dropNth($string, 9));

        $string = "سلام دنیا!";
        $this->assertSame("سلا دنیا!", StringUtility::dropNth($string, 3));
    }
    public function testDropSeparators()
    {
        $string = "Hello Back-End Developers!";
        $this->assertSame("Hello BackEnd Developers!", StringUtility::dropSeparator($string));

        $string = "زاد-روز کوروش";
        $this->assertSame("زادروز کوروش", StringUtility::dropSeparator($string));
    }
    public function testTransformToReverse()
    {
        $this->assertSame("dcba", StringUtility::transformToReverse("abcd"));
        $this->assertSame("Hi There", StringUtility::transformToReverse("erehT iH"));
        $this->assertSame("Hello World!", StringUtility::transformToReverse("!dlroW olleH"));


        $this->assertSame("رامین", StringUtility::transformToReverse("نیمار"));
        $this->assertSame("باران", StringUtility::transformToReverse("ناراب"));
        $this->assertSame("چطوری!", StringUtility::transformToReverse("!یروطچ"));
    }
    public function testTransformToShuffle()
    {
        $string = "Hello world!";
        $shuffle = StringUtility::transformToShuffle($string);
        $arr1 = str_split($string, 1);
        $arr2 = str_split($shuffle, 1);
        sort($arr1);
        sort($arr2);
        $this->assertSame($arr1, $arr2);

        $string = "تمامیت ارضی!";
        $shuffle = StringUtility::transformToShuffle($string);
        $arr1 = str_split($string, 1);
        $arr2 = str_split($shuffle, 1);
        sort($arr1);
        sort($arr2);
        $this->assertSame($arr1, $arr2);
    }
    public function testTransformToNoTag()
    {
        $this->assertSame("Hi!", StringUtility::transformToNoTag("<p>Hi</p>!"));
        $this->assertSame("<p>Hi</p>!", StringUtility::transformToNoTag("<p>Hi</p>!", "<p>"));

        $this->assertSame("سلام!", StringUtility::transformToNoTag("<p>سلام</p>!"));
        $this->assertSame("<p>سلام</p>!", StringUtility::transformToNoTag("<p>سلام</p>!", "<p>"));
    }
    public function testTransformToLowercase()
    {
        $this->assertSame("hello world!", StringUtility::transformToLowercase("Hello World!"));
        $this->assertSame("helloworld!", StringUtility::transformToLowercase("Hello-World!",true));
        $this->assertSame("helloworld!", StringUtility::transformToLowercase("Hello World!",true,true));
        $this->assertSame("hello-world!", StringUtility::transformToLowercase("Hello - World!",false,true));
        $this->assertSame("hello world!", StringUtility::transformToLowercase("Hello World!",false,false));
    }
    public function testTransformToUppercase()
    {
        $this->assertSame("HELLO WORLD!", StringUtility::transformToUppercase("Hello World!"));
        $this->assertSame("HELLOWORLD!", StringUtility::transformToUppercase("Hello-World!",true));
        $this->assertSame("HELLOWORLD!", StringUtility::transformToUppercase("Hello World!",true,true));
        $this->assertSame("HELLO-WORLD!", StringUtility::transformToUppercase("Hello - World!",false,true));
        $this->assertSame("HELLO WORLD!", StringUtility::transformToUppercase("Hello World!",false,false));
    }
    public function testTransformToLowercaseFirst()
    {
        $this->assertSame("hello World!", StringUtility::transformToLowercaseFirst("Hello World!"));
        $this->assertSame("helloWorld!", StringUtility::transformToLowercaseFirst("Hello-World!",true));
        $this->assertSame("helloWorld!", StringUtility::transformToLowercaseFirst("Hello World!",true,true));
        $this->assertSame("hello-World!", StringUtility::transformToLowercaseFirst("Hello - World!",false,true));
        $this->assertSame("hello World!", StringUtility::transformToLowercaseFirst("Hello World!",false,false));
    }
    public function testTransformToUppercaseFirst()
    {
        $this->assertSame("Hello world!", StringUtility::transformToUppercaseFirst("hello world!"));
        $this->assertSame("Helloworld!", StringUtility::transformToUppercaseFirst("hello-world!",true));
        $this->assertSame("Helloworld!", StringUtility::transformToUppercaseFirst("hello world!",true,true));
        $this->assertSame("Hello-world!", StringUtility::transformToUppercaseFirst("hello - world!",false,true));
        $this->assertSame("Hello world!", StringUtility::transformToUppercaseFirst("hello world!",false,false));
    }
    public function testTransformToFlatcase()
    {
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("Hello World"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("Hello-World"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("Hello-world"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("Hello_world"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("hello_world"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("hello world"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("hello-wORLd"));
    }
    public function testTransformToPascalcase()
    {
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("Hello World"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("Hello-World"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("Hello-world"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("Hello_world"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("hello_world"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("hello world"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("hello-wORLd"));
    }
    public function testTransformToCamelcase()
    {
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("Hello World"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("Hello-World"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("Hello-world"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("Hello_world"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("hello_world"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("hello world"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("hello-wORLd"));
    }
    public function testTransformToSnakecase()
    {
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("Hello World"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("Hello-World"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("Hello-world"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("Hello_world"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("hello_world"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("hello world"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("hello-wORLd"));
    }
    public function testTransformToMacroecase()
    {
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("Hello World"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("Hello-World"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("Hello-world"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("Hello_world"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("hello_world"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("hello world"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("hello-wORLd"));
    }
    public function testTransformToPascalSnakecase()
    {
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("Hello World"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("Hello-World"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("Hello-world"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("Hello_world"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("hello_world"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("hello world"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("hello-wORLd"));
    }
    public function testTransformToCamelSnakecase()
    {
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("Hello World"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("Hello-World"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("Hello-world"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("Hello_world"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("hello_world"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("hello world"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("hello-wORLd"));
    }
    public function testTransformToKebalcase()
    {
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("Hello World"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("Hello-World"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("Hello-world"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("Hello_world"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("hello_world"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("hello world"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("hello-wORLd"));
    }
    public function testTransformToCobolcase()
    {
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("Hello World"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("Hello-World"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("Hello-world"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("Hello_world"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("hello_world"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("hello world"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("hello-wORLd"));
    }
    public function testTransformToTraincase()
    {
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("Hello World"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("Hello-World"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("Hello-world"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("Hello_world"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("hello_world"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("hello world"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("hello-wORLd"));
    }
    public function testIsEqual()
    {
        $this->assertSame(true, StringUtility::isEqualTo("test", "test"));
        $this->assertSame(false, StringUtility::isEqualTo("test", "tst"));

        $this->assertSame(true, StringUtility::isEqualTo("مهمان", "مهمان"));
        $this->assertSame(false, StringUtility::isEqualTo("میزبان", "میز"));
    }
    public function testIsSameAs()
    {
        $this->assertSame(true, StringUtility::isSameAs("test", "test"));
        $this->assertSame(true, StringUtility::isSameAs("test", "TesT"));
        $this->assertSame(false, StringUtility::isSameAs("test", "txt"));

        $this->assertSame(true, StringUtility::isSameAs("تست", "تست"));
        $this->assertSame(false, StringUtility::isSameAs("آسیب", "سیب"));
    }
    public function testIsStartedBy()
    {
        $this->assertSame(true, StringUtility::isStartedBy("test", "te"));
        $this->assertSame(true, StringUtility::isStartedBy("test", "t"));
        $this->assertSame(false, StringUtility::isStartedBy("test", "tx"));

        $this->assertSame(true, StringUtility::isStartedBy("تست", "تس"));
        $this->assertSame(true, StringUtility::isStartedBy("تست", "ت"));
        $this->assertSame(false, StringUtility::isStartedBy("تست", "ست"));
    }
    public function testIsEndedWith()
    {
        $this->assertSame(true, StringUtility::isEndedWith("test", "st"));
        $this->assertSame(true, StringUtility::isEndedWith("test", "t"));
        $this->assertSame(false, StringUtility::isEndedWith("test", "xt"));

        $this->assertSame(true, StringUtility::isEndedWith("تست", "ست"));
        $this->assertSame(true, StringUtility::isEndedWith("تست", "ت"));
        $this->assertSame(false, StringUtility::isEndedWith("تست", "تس"));
    }
    public function testEstimateLength()
    {
        $this->assertSame(4, StringUtility::estimateLength("test"));

        $this->assertSame(3, StringUtility::estimateLength("تست"));
    }
    public function testEstimateCounts()
    {
        $this->assertSame(["t"=>2,"e"=>1,"s"=>1], StringUtility::estimateCounts("test"));

        $this->assertSame(["ت"=>2,"س"=>1], StringUtility::estimateCounts("تست"));
    }
    public function testMerge()
    {
        $this->assertSame("John Doe", StringUtility::merge(" ", "John", "Doe"));
        $this->assertSame("سینا کوهستانی", StringUtility::merge(" ", "سینا", "کوهستانی"));
    }
    public function testSplit()
    {
        $this->assertSame(["John"," Doe"], StringUtility::split("John Doe", 4));
        $this->assertSame(["سینا"," کوه","ستان","ی"], StringUtility::split("سینا کوهستانی", 4));
    }
    public function testSplitBy()
    {
        $this->assertSame(["John","Doe"], StringUtility::splitBy("John Doe", " "));
        $this->assertSame(["سینا","کوهستانی"], StringUtility::splitBy("سینا کوهستانی", " "));
    }
    public function testToHex()
    {
        $this->assertSame("74657374", StringUtility::toHex("test"));
        $this->assertSame("d8aad8b3d8aa", StringUtility::toHex("تست"));
    }
    public function testfromHex()
    {
        $this->assertSame("test", StringUtility::fromHex("74657374"));
        $this->assertSame("تست", StringUtility::fromHex("d8aad8b3d8aa"));
    }
    public function testToAscii()
    {
        $this->assertSame(116, StringUtility::toAscii("t"));
        $this->assertSame(1602, StringUtility::toAscii("ق"));
    }
    public function testFromAscii()
    {
        $this->assertSame("t", StringUtility::fromAscii(116));
        $this->assertSame("ق", StringUtility::fromAscii(1602));
    }
    public function testToFormat()
    {
        $this->assertSame("Hi, I am John Doe", StringUtility::toFormat("Hi, I am %s %s", "John", "Doe"));
        $this->assertSame("سلام, من سینا کوهستانی هستم", StringUtility::toFormat("سلام, من %s %s هستم", "سینا", "کوهستانی"));
    }
    public function testFromFormat()
    {
        $this->assertSame(["John", "Doe"], StringUtility::fromFormat("Hi, I am John Doe", "Hi, I am %s %s"));
        $this->assertSame(["سینا", "کوهستانی"], StringUtility::fromFormat("سلام, من سینا کوهستانی هستم", "سلام, من %s %s هستم"));
    }
    public function testToArray()
    {
        $this->assertSame(["j", "o","h","n"], StringUtility::toArray("john"));
        $this->assertSame(["س", "ی","ن","ا"], StringUtility::toArray("سینا"));
    }
    public function testFromArray()
    {
        $this->assertSame("john", StringUtility::fromArray(["j", "o","h","n"]));
        $this->assertSame("سینا", StringUtility::fromArray(["س", "ی","ن","ا"]));
    }
    public function testToInteger()
    {
        $this->assertSame(-10, StringUtility::toInteger("-10"));
    }
    public function testFromInteger()
    {
        $this->assertSame("-10", StringUtility::fromInteger(-10));
    }
    public function testToFloat()
    {
        $this->assertSame(-10.1, StringUtility::toFloat("-10.1"));
    }
    public function testFromFloat()
    {
        $this->assertSame("-10.1", StringUtility::fromFloat(-10.1));
    }
    public function testToBoolean()
    {
        $this->assertSame(false, StringUtility::toBoolean("false"));
        $this->assertSame(false, StringUtility::toBoolean("no"));
        $this->assertSame(false, StringUtility::toBoolean("not"));
        $this->assertSame(false, StringUtility::toBoolean("nok"));
        $this->assertSame(true, StringUtility::toBoolean("something"));
    }
    public function testFromBoolean()
    {
        $this->assertSame("false", StringUtility::fromBoolean(false));
        $this->assertSame("true", StringUtility::fromBoolean(true));
    }
}