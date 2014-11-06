<?php
/*
 * File format example:
 * 
 * Province,Capital
 *     City1,PostalCode,Population
 *     City2,PostalCode,Population
 *     City3,PostalCode,Population
 * Chaco,Resistencia
 *     Barranqueras,3500,32000
 *     Resistencia,3500,1000000
 *     Saenz Peña,3500,75000
 */

/*
 * Array format
 * 
 * array(  array( 'name'    => 'ProvinceName1',
 *                'capital' => 'CapitalName1',
 *                'cities'  => array(
 *                                     array( 'name' => 'Cityname', 'postalcode' => 100, 'population' => 100),
 *                                     array( 'name' => 'Cityname2', 'postalcode' => 100, 'population' => 100)
 *                             )
 *         ),
 *         array( 'name'    => 'Corrientes',
 *                'capital' => 'Corrientes',
 *                'cities'  => array(
 *                                     array( 'name' => 'Corrientes', 'postalcode' => 3400, 'population' => 100000000),
 *                                     array( 'name' => 'Mercedes', 'postalcode' => 3450, 'population' => 34565)
 *                             )
 *         )
 * )
 */

/**
 * File to array
 * @param .txt $file
 * @return array
 */
function fileToArray($file) {
    $file = fopen($file, 'r') or die('Unable to open file!');
    $provinces = array();
    $line = fgets($file);
    $count = 0;
    while (!feof($file)) {
        if (substr($line, 0, 4) == '    ') {
            $aux = explode(',', $line);
            $city['name'] = $aux[0];
            $city['postalcode'] = $aux[1];
            $city['population'] = $aux[2];
            $province['cities'][] = $city;
        } else {
            if ($count > count($provinces)): $provinces[] = $province; endif;
            $aux = explode(',', $line);
            $province['name'] = $aux[0];
            $province['capital'] = $aux[1];
            $province['cities'] = array();
            $count++;
        }
        $line = fgets($file);
    }
    $provinces[] = $province;
    return $provinces;
}
?>