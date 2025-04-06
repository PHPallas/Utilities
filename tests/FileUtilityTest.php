<?php

use PHPallas\Utilities\FileUtility;

class FileUtilityTest extends \PHPUnit\Framework\TestCase
{
    private $jsonFile = 'test.json';
    private $yamlFile = 'test.yaml';
    private $iniFile = 'test.ini';
    private $xmlFile = 'test.xml';
    private $envFile = '.env';

    protected function tearDown(): void
    {
        // Clean up test files after each test
        foreach ([$this->jsonFile, $this->yamlFile, $this->iniFile, $this->xmlFile, $this->envFile] as $file)
        {
            if (file_exists($file))
            {
                unlink($file);
            }
        }
    }

    public function testReadWriteJson()
    {
        $data = ['name' => 'John Doe', 'age' => 30];
        FileUtility::writeToJson($data, $this->jsonFile);

        $result = FileUtility::readFromJson($this->jsonFile);
        $this->assertEquals($data, $result);
    }

    public function testReadWriteYaml()
    {
        $data = ['name' => 'Jane Doe', 'age' => 25];
        FileUtility::writeToYaml($data, $this->yamlFile);
        $result = FileUtility::readFromYaml($this->yamlFile);
        $this->assertEquals($data, $result);
    }

    public function testReadWriteIni()
    {
        $data = ['user' => ['name' => 'Jane Doe', 'age' => 25]];
        FileUtility::writeToIni($data, $this->iniFile);

        $result = FileUtility::readFromIni($this->iniFile);
        $this->assertEquals($data, $result);
    }

    public function testReadWriteXml()
    {
        $data = ['user' => ['name' => 'John Doe', 'age' => 30]];
        FileUtility::writeToXml($data, $this->xmlFile);

        $result = FileUtility::readFromXml($this->xmlFile);
        $this->assertEquals($data, $result);
    }

    public function testReadWriteEnv()
    {
        $data = ["DATABASE" => "TEST"];
        FileUtility::writeToEnv($data, $this->envFile);
        $result = FileUtility::readFromEnv($this->envFile);
        $this->assertEquals($data, $result);
    }

    public function testReadNonExistentFile()
    {
        $result = FileUtility::readFromJson('non_existent.json');
        $this->assertNull($result);

        $result = FileUtility::readFromYaml('non_existent.yaml');
        $this->assertNull($result);

        $result = FileUtility::readFromIni('non_existent.ini');
        $this->assertNull($result);

        $result = FileUtility::readFromXml('non_existent.xml');
        $this->assertNull($result);
    }

    public function testWriteFailure()
    {
        $data = ['name' => 'John Doe'];
        $invalidPath = '/invalid_directory/test.json';
        $result = FileUtility::writeToJson($data, $invalidPath);
        $this->assertFalse($result, 'Expected false on writing to an invalid directory');
    }
}
