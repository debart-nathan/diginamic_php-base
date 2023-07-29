<?php
/**
 * get the list of users in the database
 * @return array[array["name"=>string,"surname"=>string,"email"=>string,"password"=>string]]
 */
function getUsers()
{
    $users = [];
    if (($handle = fopen(__DIR__ . "/../data/users.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $users[] = [
                "name" => $data[0],
                "surname" => $data[1],
                "email" => $data[2],
                "password" => $data[3]
            ];
        }

        fclose($handle);
    }
    return $users;
}
