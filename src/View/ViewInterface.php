<?php

namespace Example\View;

interface ViewInterface
{
    /**
     * Array of view variables set
     * @param array $variables
     */
    public function setVariables(array $variables);

    /**
     * A One variable set
     * @param string $key
     * @param mixed $value
     * @param bool $force Change variable if exists
     * @return bool
     */
    public function setVariable($key, $value, $force = false);

    /**
     * View variables get
     * @return array
     */
    public function getVariables();

    /**
     * String call from a view
     * @return string
     */
    public function __toString();
}
