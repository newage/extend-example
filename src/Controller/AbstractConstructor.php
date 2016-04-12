<?php

namespace Example\Controller;

use Example\Model\ModelInterface;

class AbstractConstructor
{
    /**
     * @var ModelInterface
     */
    protected $model;

    public function __construct(ModelInterface $model)
    {
        $this->setModel($model);
    }

    /**
     * @return ModelInterface
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param ModelInterface $model
     */
    protected function setModel(ModelInterface $model)
    {
        $this->model = $model;
    }
}