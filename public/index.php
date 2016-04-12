<?php

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

require_once 'vendor/autoload.php';

$path = $_SERVER['PATH_INFO'];

if ($path = '/address')
{
    $controller = new \Example\Controller\IndexController();
    $return = $controller->executeAction();
    echo $return;
}
