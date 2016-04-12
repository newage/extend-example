<?php

namespace Example\Controller;

/**
 * Class IndexController
 */
class IndexController
{
    protected $addresses = [];

    /* Move a some logic to model */
    function executeAction()
    {
//        $this->readCsvFile();
//        $id = $_GET['id'];
//        $address = $this->addresses[$id];
//        return json_encode($address);
        return 'ok';
    }

    /* Move the part to a storage for work with csv files */
//    function readCsvFile()
//    {
//        $file = fopen('data/example.csv', 'r');
//        while (($line = fgetcsv($file)) !== false) {
//            $this->addresses[] = [
//                'name' => $line[0],
//                'phone' => $line[1],
//                'street' => $line[2],
//            ];
//        }
//
//        fclose($file);
//    }
}
