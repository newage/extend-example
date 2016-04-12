<?php

namespace Example\Controller;

/**
 * Class IndexController
 */
class IndexController
{
    protected $addresses = [];

    function executeAction()
    {
        $this->readCsvFile();
        $id = $_GET['id'];
        $address = $this->addresses[$id];
        return json_encode($address);
    }

    function readCsvFile()
    {
        $file = fopen('data/example.csv', 'r');
        while (($line = fgetcsv($file)) !== false) {
            $this->addresses[] = [
                'name' => $line[0],
                'phone' => $line[1],
                'street' => $line[2],
            ];
        }

        fclose($file);
    }
}
