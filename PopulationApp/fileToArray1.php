<?php
/*
 * File format:
 * 
 * Province1
 *     City1
 *     City2
 *     City3
 * Province2
 *     City1
 * Province3
 *     City1
 *     City2
 */

/*
 * Array format:
 * 
 * array ( 'Province1' => array('City1', 'City2', 'City3'),
 *         'Province2' => array('City1'),
 *         'Province3' => array('City1', 'City2')
 *       )
 */
 
/**
 * File to array
 * @param string $file
 * @return array
 */
function fileToArray($file) 
{
    $file = fopen($file, 'r') or die('Unable to open file!');
    $provinces = array();
    while (!feof($file)) {
        $line = fgets($file);
        if (substr($line, 0, 4) == '    ') {
            $provinces[$province][] = trim($line);
        } else {
            $province = trim($line);
            $provinces[$province] = array();
        }
    }
    return $provinces;
}
?>

