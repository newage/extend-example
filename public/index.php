<?php

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

require_once 'vendor/autoload.php';

$path = $_SERVER['PATH_INFO'];

$storage = new \Example\Storage\CsvFileStorage(['file' => 'data/example.csv']);
$model = new \Example\Model\IndexModel($storage);

if ($path = '/address')
{
    $controller = new \Example\Controller\IndexController($model);
    $return = false;
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $return = $controller->getList();
            break;
    }

    echo $return;
}
