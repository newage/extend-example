<?php

namespace Example\Controller;

use Example\Model\RestModelInterface;
use Example\Exception;

/**
 * @package Example\Controller
 * @method RestModelInterface getModel()
 */
class AbstractRestConstructor extends AbstractConstructor
{
    /**
     * AbstractRestConstructor constructor.
     * @param RestModelInterface $model
     */
    public function __construct(RestModelInterface $model)
    {
        parent::__construct($model);
    }

    /**
     * For http method POST
     *
     * @param array $data
     * @throws Exception\ControllerException
     */
    public function create(array $data)
    {
        throw new Exception\ControllerException('Method `create` do not implements');
    }

    /**
     * Get one record for method GET
     *
     * @param int $id
     * @throws Exception\ControllerException
     */
    public function get($id)
    {
        throw new Exception\ControllerException('Method `get` do not implements');
    }

    /**
     * Get records for method GET
     *
     * @throws Exception\ControllerException
     */
    public function getList()
    {
        throw new Exception\ControllerException('Method `getList` do not implements');
    }

    /**
     * Update one record for method PUT
     *
     * @param int   $id
     * @param array $data
     * @throws Exception\ControllerException
     */
    public function update($id, array $data)
    {
        throw new Exception\ControllerException('Method `update` do not implements');
    }

    /**
     * Delete one record
     *
     * @param int $id
     * @throws Exception\ControllerException
     */
    public function delete($id)
    {
        throw new Exception\ControllerException('Method `delete` do not implements');
    }
}
