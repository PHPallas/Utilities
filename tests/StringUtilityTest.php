<?php declare(strict_types=1);

use PHPallas\Utilities\ArrayUtility;
use PHPallas\Utilities\StringUtility;
use PHPUnit\Framework\TestCase;

final class StringUtilityTest extends TestCase
{
    public function testCreate(): void
    {
        $string = StringUtility::create("Z", 5);
        $this->assertSame("ZZZZZ", $string);
    }
    public function testCreateRandom(): void
    {
        $string = StringUtility::createRandom(8);
        $this->assertSame(strlen($string), 8);
        $this->assertIsString($string);
    }
    public function testCreateByRepeat(): void
    {
        $string = StringUtility::createByRepeat("Zx", 5);
        $this->assertSame("ZxZxZxZxZx", $string);
    }
    public function testGet(): void
    {
        $string = "Hello World!";
        $this->assertSame("W", StringUtility::get($string, 6));
    }
    public function testGetSubset(): void
    {
        $string = "Hello World!";
        $sub = StringUtility::getSubset($string, 3,4);
        $this->assertSame("lo W", $sub);
    }
    public function testGetSegment(): void
    {
        $string = "Hello World!";
        $segment = StringUtility::getSegment($string, 3,8);
        $this->assertSame("lo Wo", $segment);
    }
    public function testSet(): void
    {
        $string = "Hello World!";
        $result = StringUtility::set($string, 6, "w");
        $this->assertSame("Hello world!", $result);
    }
    public function testSetReplace(): void
    {
        $string = "Hello World!";
        $result = StringUtility::setReplace($string, "World", "Guys");
        $this->assertSame("Hello Guys!", $result);
    }
    public function testSetInStart(): void
    {
        $string = "888";
        $result = StringUtility::setInStart($string, "0", 8);
        $this->assertSame("00000888", $result);
    }
    public function testSetInEnd(): void
    {
        $string = "888";
        $result = StringUtility::setInEnd($string, "0", 8);
        $this->assertSame("88800000", $result);
    }
    public function testHasPhrase(): void
    {
        $string = "Hello World!";
        $this->assertSame(true, StringUtility::hasPhrase($string,"World"));
        $this->assertSame(true, StringUtility::hasPhrase($string, "world", false));
        $this->assertSame(false, StringUtility::hasPhrase($string, "world"));
        // $this->assertSame(false, StringUtility::hasPhrase($string, "world", true));
    }
    public function testAddToEnd(): void
    {
        $string = "Hi,";
        $this->assertSame("Hi, Guys!", StringUtility::addToEnd($string, " Guys!"));
    }
    public function testAddToStart(): void
    {
        $string = "World!";
        $this->assertSame("Hello World!", StringUtility::addToStart($string, "Hello "));
    }
    public function testAddToCenter(): void
    {
        $string = "World!";
        $this->assertSame("WorHellold!", StringUtility::AddToCenter($string, "Hello"));
    }
    public function testAddEvenly(): void
    {
        $string = "World!";
        $this->assertSame("Wo--rl--d!", StringUtility::addEvenly($string, "--", 2));
    }
    public function testDrop(): void
    {
        $string = "Hello World!";
        $this->assertSame("Heo Word!", StringUtility::drop($string, "l"));
    }
    public function testDropFirst(): void
    {
        $string = "Hello World!";
        $this->assertSame("ello World!", StringUtility::dropFirst($string));
    }    
    public function testDropFromStart(): void
    {
        $string = "---[Hello World]---";
        $this->assertSame("[Hello World]---", StringUtility::dropFromStart($string, "-"));
    }
    public function testDropFromEnd(): void
    {
        $string = "---[Hello World]---";
        $this->assertSame("---[Hello World]", StringUtility::dropFromEnd($string, "-"));
    }
    public function testDropLast(): void
    {
        $string = "Hello World!";
        $this->assertSame("Hello World", StringUtility::dropLast($string));
    }
    public function testDropFromSides(): void
    {
        $string = "---[Hello World]---";
        $this->assertSame("[Hello World]", StringUtility::dropFromSides($string, "-"));
    }
    public function testDropNth(): void
    {
        $string = "Hello World!";
        $this->assertSame("Hello Word!", StringUtility::dropNth($string, 9));
    }
    public function testDropSeparators(): void
    {
        $string = "Hello Back-End Developers!";
        $this->assertSame("Hello BackEnd Developers!", StringUtility::dropSeparator($string));
    }
    public function testTransformToReverse(): void
    {
        $this->assertSame("dcba", StringUtility::transformToReverse("abcd"));
        $this->assertSame("Hi There", StringUtility::transformToReverse("erehT iH"));
        $this->assertSame("Hello World!", StringUtility::transformToReverse("!dlroW olleH"));
    }
    public function testTransformToShuffle(): void
    {
        $string = "Hello world!";
        $shuffle = StringUtility::transformToShuffle($string);
        $arr1 = str_split($string, 1);
        $arr2 = str_split($shuffle, 1);
        sort($arr1);
        sort($arr2);
        $this->assertSame($arr1, $arr2);
    }
    public function testTransformToNoTag(): void
    {
        $this->assertSame("Hi!", StringUtility::transformToNoTag("<p>Hi</p>!"));
        $this->assertSame("<p>Hi</p>!", StringUtility::transformToNoTag("<p>Hi</p>!", "<p>"));
    }
    public function testTransformToLowercase(): void
    {
        $this->assertSame("hello world!", StringUtility::transformToLowercase("Hello World!"));
        $this->assertSame("helloworld!", StringUtility::transformToLowercase("Hello-World!",true));
        $this->assertSame("helloworld!", StringUtility::transformToLowercase("Hello World!",true,true));
        $this->assertSame("hello-world!", StringUtility::transformToLowercase("Hello - World!",false,true));
        $this->assertSame("hello world!", StringUtility::transformToLowercase("Hello World!",false,false));
    }
    public function testTransformToUppercase(): void
    {
        $this->assertSame("HELLO WORLD!", StringUtility::transformToUppercase("Hello World!"));
        $this->assertSame("HELLOWORLD!", StringUtility::transformToUppercase("Hello-World!",true));
        $this->assertSame("HELLOWORLD!", StringUtility::transformToUppercase("Hello World!",true,true));
        $this->assertSame("HELLO-WORLD!", StringUtility::transformToUppercase("Hello - World!",false,true));
        $this->assertSame("HELLO WORLD!", StringUtility::transformToUppercase("Hello World!",false,false));
    }
    public function testTransformToLowercaseFirst(): void
    {
        $this->assertSame("hello World!", StringUtility::transformToLowercaseFirst("Hello World!"));
        $this->assertSame("helloWorld!", StringUtility::transformToLowercaseFirst("Hello-World!",true));
        $this->assertSame("helloWorld!", StringUtility::transformToLowercaseFirst("Hello World!",true,true));
        $this->assertSame("hello-World!", StringUtility::transformToLowercaseFirst("Hello - World!",false,true));
        $this->assertSame("hello World!", StringUtility::transformToLowercaseFirst("Hello World!",false,false));
    }
    public function testTransformToUppercaseFirst(): void
    {
        $this->assertSame("Hello world!", StringUtility::transformToUppercaseFirst("hello world!"));
        $this->assertSame("Helloworld!", StringUtility::transformToUppercaseFirst("hello-world!",true));
        $this->assertSame("Helloworld!", StringUtility::transformToUppercaseFirst("hello world!",true,true));
        $this->assertSame("Hello-world!", StringUtility::transformToUppercaseFirst("hello - world!",false,true));
        $this->assertSame("Hello world!", StringUtility::transformToUppercaseFirst("hello world!",false,false));
    }
    public function testTransformToFlatcase(): void
    {
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("Hello World"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("Hello-World"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("Hello-world"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("Hello_world"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("hello_world"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("hello world"));
        $this->assertSame("helloworld", StringUtility::transformToFlatcase("hello-wORLd"));
    }
    public function testTransformToPascalcase(): void
    {
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("Hello World"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("Hello-World"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("Hello-world"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("Hello_world"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("hello_world"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("hello world"));
        $this->assertSame("HelloWorld", StringUtility::transformToPascalcase("hello-wORLd"));
    }
    public function testTransformToCamelcase(): void
    {
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("Hello World"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("Hello-World"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("Hello-world"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("Hello_world"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("hello_world"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("hello world"));
        $this->assertSame("helloWorld", StringUtility::transformToCamelcase("hello-wORLd"));
    }
    public function testTransformToSnakecase(): void
    {
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("Hello World"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("Hello-World"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("Hello-world"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("Hello_world"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("hello_world"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("hello world"));
        $this->assertSame("hello_world", StringUtility::transformToSnakecase("hello-wORLd"));
    }
    public function testTransformToMacroecase(): void
    {
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("Hello World"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("Hello-World"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("Hello-world"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("Hello_world"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("hello_world"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("hello world"));
        $this->assertSame("HELLO_WORLD", StringUtility::transformToMacrocase("hello-wORLd"));
    }
    public function testTransformToPascalSnakecase(): void
    {
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("Hello World"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("Hello-World"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("Hello-world"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("Hello_world"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("hello_world"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("hello world"));
        $this->assertSame("Hello_World", StringUtility::transformToPascalSnakecase("hello-wORLd"));
    }
    public function testTransformToCamelSnakecase(): void
    {
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("Hello World"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("Hello-World"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("Hello-world"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("Hello_world"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("hello_world"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("hello world"));
        $this->assertSame("hello_World", StringUtility::transformToCamelSnakecase("hello-wORLd"));
    }
    public function testTransformToKebalcase(): void
    {
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("Hello World"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("Hello-World"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("Hello-world"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("Hello_world"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("hello_world"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("hello world"));
        $this->assertSame("hello-world", StringUtility::transformToKebabcase("hello-wORLd"));
    }
    public function testTransformToCobolcase(): void
    {
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("Hello World"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("Hello-World"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("Hello-world"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("Hello_world"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("hello_world"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("hello world"));
        $this->assertSame("HELLO-WORLD", StringUtility::transformToCobolcase("hello-wORLd"));
    }
    public function testTransformToTraincase(): void
    {
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("Hello World"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("Hello-World"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("Hello-world"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("Hello_world"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("hello_world"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("hello world"));
        $this->assertSame("Hello-World", StringUtility::transformToTraincase("hello-wORLd"));
    }
    public function testIsEqual(): void
    {
        $this->assertSame(true, StringUtility::isEqualTo("test", "test"));
        $this->assertSame(false, StringUtility::isEqualTo("test", "tst"));
    }
    public function testIsSameAs(): void
    {
        $this->assertSame(true, StringUtility::isSameAs("test", "test"));
        $this->assertSame(true, StringUtility::isSameAs("test", "TesT"));
        $this->assertSame(false, StringUtility::isSameAs("test", "txt"));
    }
    public function testIsStartedBy(): void
    {
        $this->assertSame(true, StringUtility::isStartedBy("test", "te"));
        $this->assertSame(true, StringUtility::isStartedBy("test", "t"));
        $this->assertSame(false, StringUtility::isStartedBy("test", "tx"));
    }
    public function testIsEndedWith(): void
    {
        $this->assertSame(true, StringUtility::isEndedWith("test", "st"));
        $this->assertSame(true, StringUtility::isEndedWith("test", "t"));
        $this->assertSame(false, StringUtility::isEndedWith("test", "xt"));
    }
    public function testEstimateLength(): void
    {
        $this->assertSame(4, StringUtility::estimateLength("test"));
    }
    public function testEstimateCounts(): void
    {
        $this->assertSame(["t"=>2,"e"=>1,"s"=>1], StringUtility::estimateCounts("test"));
    }
    public function testMerge(): void
    {
        $this->assertSame("John Doe", StringUtility::merge(" ", "John", "Doe"));
    }
    public function testSplit(): void
    {
        $this->assertSame(["John"," Doe"], StringUtility::split("John Doe", 4));
    }
    public function testSplitBy(): void
    {
        $this->assertSame(["John","Doe"], StringUtility::splitBy("John Doe", " "));
    }
}