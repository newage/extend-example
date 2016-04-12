<?php

namespace Example\View;

class JsonView extends AbstractView
{
    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return json_encode($this->getVariables());
    }
}