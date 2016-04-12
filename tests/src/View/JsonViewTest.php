<?php

namespace Example\Test\View;

use Example\View\JsonView;

class JsonViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var JsonView
     */
    protected $view;

    public function setUp()
    {
        $this->view = new JsonView();
    }

    public function testSetVariablesIConstructor()
    {
        $variables = ['name' => 'value'];
        $view = new JsonView($variables);
        $return = $view->getVariables();
        $this->assertEquals($variables, $return);
    }

    public function testSetVariables()
    {
        $variables = ['name' => 'value'];
        $this->view->setVariables($variables);
        $return = $this->view->getVariables();
        $this->assertEquals($variables, $return);
    }

    public function testSetVariable()
    {
        $this->view->setVariable('name', 'value');
        $return = $this->view->getVariables();
        $this->assertEquals(['name' => 'value'], $return);
    }

    public function testSetExistsVariable()
    {
        $this->view->setVariable('name', 'value');
        $this->view->setVariable('name', 'new');
        $return = $this->view->getVariables();
        $this->assertEquals(['name' => 'value'], $return);
    }

    public function testToString()
    {
        $variables = ['name' => 'value'];
        $this->view->setVariables($variables);
        $return = $this->view->__toString();
        $this->assertEquals('{"name":"value"}', $return);
    }
}
