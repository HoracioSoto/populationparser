<?php

$provinces = array();
$provinces = 
    [
        [
            'name' => 'Chaco',
            'capital' => 'Resistencia',
            'cities' => 
                [
                    [
                        'name' => 'Resistencia',
                        'postalcode' => 3500,
                        'population' => 255000
                    ],
                    [
                        'name' => 'Saenz Peña',
                        'postalcode' => 3506,
                        'population' => 150000
                    ]
                ]
        ],
        [
            'name' => 'Corrientes',
            'capital' => 'Corrientes',
            'cities' => 
                [
                    [
                        'name' => 'Corrientes',
                        'postalcode' => 3400,
                        'population' => 200000
                    ]
                ]
        ],
    ];

    foreach ($provinces as $province) {
        $provinceEntity = new Province();
        $provinceEntity->setName($province['name']);
        $provinceEntity->setCapital();
        foreach ($province['cities'] as $city) {
            $cityEntity = new City();
            $cityEntity->setName($city['name']);
            $cityEntity->setPostalCode($city['postalcode']);
            $cityEntity->setPopulation($city['population']);
            $em->persist($cityEntity);
            if ($city['name'] == $province['name']){
                $provinceEntity->setCapital($cityEntity);
            }
        }
        $em->persist($provinceEntity);
    }
    $em->flush();
    $em->clear();

?>
