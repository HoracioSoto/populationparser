<?php
require_once "bootstrap.php";
require_once('fileToArray2.php');
//$provinces = array();
//$provinces = 
//    [
//        [
//            'name' => 'Chaco',
//            'capital' => 'Resistencia',
//            'cities' => 
//                [
//                    [
//                        'name' => 'Resistencia',
//                        'postalcode' => 3500,
//                        'population' => 255000
//                    ],
//                    [
//                        'name' => 'Saenz Peña',
//                        'postalcode' => 3506,
//                        'population' => 150000
//                    ]
//                ]
//        ],
//        [
//            'name' => 'Corrientes',
//            'capital' => 'Corrientes',
//            'cities' => 
//                [
//                    [
//                        'name' => 'Corrientes',
//                        'postalcode' => 3400,
//                        'population' => 200000
//                    ]
//                ]
//        ],
//    ];
    
$provinces = fileToArray('src/filetest2.txt');

    foreach ($provinces as $province) {
        $provinceEntity = new Province();
        $provinceEntity->setName($province['name']);
        foreach ($province['cities'] as $city) {
            $cityEntity = new City();
            $cityEntity->setName($city['name']);
            $cityEntity->setPostalCode($city['postalcode']);
            $cityEntity->setPopulation($city['population']);
            $entityManager->persist($cityEntity);
            $provinceEntity->addCity($cityEntity);
            if ($city['name'] === $province['capital']){
                $provinceEntity->setCapital($cityEntity);
            }
        }
        $entityManager->persist($provinceEntity);
    }
$entityManager->flush();
$entityManager->clear();
    echo "HOLA MUNDO!\n";

?>
