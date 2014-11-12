<?php
require_once 'bootstrap.php';
require_once 'fileToArray1.php';

$provinces = fileToArray('src/filetest1.txt');

foreach ($provinces as $province => $cities) {
    $provinceEntity = new Province();
    $provinceEntity->setName($province);
    foreach ($cities as $city) {
        $cityEntity = new City();
        $cityEntity->setName($city);
        $cityEntity->setPc(1);
        $entityManager->persist($cityEntity);
        $provinceEntity->addCity($cityEntity);
    }
    $entityManager->persist($provinceEntity);
}

$entityManager->flush();
$entityManager->clear();

?>
