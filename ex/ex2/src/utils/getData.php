<?php
/**
 * get the liste of data form the csv file
 */
function getPlats()
{
    $plats = [];
    if (($handle = fopen(__DIR__ . "/../data/plats.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ";")) !== false) {
            $plats[] = [
                "type" => $data[0],
                "name" => $data[1]
            ];
        }

        fclose($handle);
    }
    return $plats;
}
