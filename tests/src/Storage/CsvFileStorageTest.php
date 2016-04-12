<?php

namespace Example\Test\Storage;

use Example\Storage\CsvFileStorage;

class CsvFileStorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var CsvFileStorage
     */
    protected $storage;

    public function setUp()
    {
        $this->filePath = 'tests/data/test.csv';
        $options = ['file' => $this->filePath];
        $this->storage = new CsvFileStorage($options);
    }

    public function tearDown()
    {
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
    }

    /**
     * Call protected/private method
     *
     * @param $class
     * @param $name
     * @return \ReflectionMethod
     */
    protected static function getMethod($class, $name)
    {
        $class = new \ReflectionClass($class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    public function testGetOptions()
    {
        $options = ['file' => $this->filePath];
        $return = $this->storage->getOptions();
        $this->assertEquals($options, $return);
    }

    public function testGetOption()
    {
        $return = $this->storage->getOption('file');
        $this->assertEquals($this->filePath, $return);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testGetOptionException()
    {
        $storage = new CsvFileStorage([]);
        $storage->getOption('file');
    }

    public function testWriteReadCount()
    {
        $originalRows = [
            ['Michal', '055555', 'Michalowskogo str.'],
            ['Test', '066666', 'Petrovskogo str.']
        ];
        $this->writeRows($originalRows);

        $countMethod = self::getMethod(CsvFileStorage::class, 'countRows');
        $countRows = $countMethod->invoke($this->storage);
        $this->assertEquals(2, $countRows);

        $returnRows = $this->readRows();
        $this->assertEquals($originalRows, $returnRows);
    }

    public function testAddRow()
    {
        $originalRow = ['Michal', '055555', 'Michalowskogo str.'];
        $method = self::getMethod(CsvFileStorage::class, 'addRow');
        $return = $method->invoke($this->storage, $originalRow);
        $this->assertTrue($return);

        $returnRows = $this->readRows();
        $this->assertEquals($originalRow, $returnRows[0]);
    }

    public function testGet()
    {
        $originalData = [['Michal', '055555', 'Michalowskogo str.']];
        $this->writeRows($originalData);

        $result = $this->storage->get();
        $this->assertEquals($originalData, $result);
    }

    public function testGetById()
    {
        $originalData = ['Michal', '055555', 'Michalowskogo str.'];
        $this->writeRows([$originalData]);

        $result = $this->storage->getById(1);
        $this->assertEquals($originalData, $result);
    }

    public function testGetByIdEmpty()
    {
        file_put_contents($this->filePath, '');
        $result = $this->storage->getById(100);
        $this->assertEquals([], $result);
    }

    public function testCreate()
    {
        $originalData = ['Michal', '055555', 'Michalowskogo str.'];
        $this->storage->create($originalData);

        $result = $this->readRows();
        $this->assertEquals($originalData, $result[0]);
    }

    public function testUpdate()
    {
        $originalData = [['Michal', '055555', 'Michalowskogo str.']];
        $updateData = ['Stas', '1122558899', 'Kirova str.'];

        $this->writeRows($originalData);
        $this->storage->update(1, $updateData);
        $result = $this->readRows();
        $this->assertEquals($updateData, $result[0]);
    }

    public function testDelete()
    {
        $originalData = [
            ['Michal', '055555', 'Michalowskogo str.']
        ];

        $this->writeRows($originalData);
        $this->storage->delete(1);
        $result = $this->readRows();
        $this->assertEquals([], $result);
    }

    protected function writeRows($rows)
    {
        $method = self::getMethod(CsvFileStorage::class, 'writeRows');
        $method->invoke($this->storage, $rows);
    }

    protected function readRows()
    {
        $method = self::getMethod(CsvFileStorage::class, 'readRows');
        return $method->invoke($this->storage);
    }
}
