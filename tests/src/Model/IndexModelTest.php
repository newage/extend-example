<?php

namespace Example\Test\Model;

use Example\Model\IndexModel;
use Example\Storage\CsvFileStorage;
use Example\Storage\StorageInterface;

class IndexModelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var IndexModel
     */
    protected $model;

    /**
     * @var StorageInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $storageMock;

    public function setUp()
    {
        $this->storageMock = $this->getMockBuilder(CsvFileStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->model = new IndexModel($this->storageMock);
    }

    public function testGetStorage()
    {
        $storage = $this->model->getStorage();
        $this->assertTrue($storage instanceof StorageInterface);
    }

    public function testGetList()
    {
        $originData = ['Michal', '005566'];
        $this->storageMock->method('get')
            ->will($this->returnValue($originData));
        $result = $this->model->getList();
        $this->assertEquals($originData, $result);
    }

    public function testGetById()
    {
        $originData = ['Michal', '005566'];
        $this->storageMock->method('getById')
            ->with($this->greaterThan(0))
            ->will($this->returnValue($originData));
        $result = $this->model->get(1);
        $this->assertEquals($originData, $result);
    }

    public function testCreate()
    {
        $originData = ['Michal', '005566'];
        $this->storageMock->method('create')
            ->with($this->equalTo($originData))
            ->will($this->returnValue(true));
        $result = $this->model->create($originData);
        $this->assertTrue($result);
    }

    public function testUpdate()
    {
        $originData = ['Michal', '005566'];
        $this->storageMock->method('update')
            ->with(
                $this->greaterThan(0),
                $this->equalTo($originData)
            )
            ->will($this->returnValue(true));
        $result = $this->model->update(1, $originData);
        $this->assertTrue($result);
    }

    public function testDelete()
    {
        $this->storageMock->method('delete')
            ->with($this->greaterThan(0))
            ->will($this->returnValue(true));
        $result = $this->model->delete(1);
        $this->assertTrue($result);
    }
}
