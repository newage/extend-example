<?php

namespace Example\View;

abstract class AbstractView implements ViewInterface
{
    /**
     * @var array
     */
    protected $variables = [];

    /**
     * AbstractView constructor.
     * @param array|null $variables
     */
    public function __construct(array $variables = null)
    {
        if (null !== $variables) {
            $this->setVariables($variables);
        }
    }

    /**
     * @inheritdoc
     */
    public function setVariables(array $variables)
    {
        $this->variables = $variables;
    }

    /**
     * @inheritdoc
     */
    public function setVariable($key, $value, $force = false)
    {
        if (isset($this->variables[$key]) && $force === false) {
            return false;
        }
        $this->variables[$key] = $value;
        return true;
    }

    /**
     * @inheritdoc
     */
    public function getVariables()
    {
        return $this->variables;
    }
}