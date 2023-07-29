<h1>Menus</h1>

<?php
require_once __DIR__ . '/../src/utils/getData.php';

function cartesianLength($data)
{
    if (count($data) == 0) return 0;
    $acc = 1;
    foreach ($data as $d) {
        $acc *= count($d);
    }
    return $acc;
}


function appendToKey($array, $key, $value)
{
    if (!isset($array[$key]) || is_array($array[$key]))
        $array[$key][] = $value;
    else
        $array[$key] = array($array[$key], $value);

    return $array;
}

function createMenu($plats)
{
    $datas = [];
    foreach ($plats as $index => $plat) {
        $datas = appendToKey($datas, $plat["type"], $index);
    }
    $menus = [];
    $i = 0;
    while ($i < 7 && $i < cartesianLength($datas)) {
        $menu = [];
        foreach ($datas as $data) {
            array_push($menu, $data[array_rand($data)]);
        }
        if (!in_array($menu, $menus)) {
            array_push($menus, $menu);
            $i++;
        }
    }
    return $menus;
}

function renderMenus($menus, $plats)
{

    echo "\n" . '<table class="table">';
    echo "\n" . '<tr>';
    echo "\n" . '   <th>entrée</th>';
    echo "\n" . '   <th>plat</th>';
    echo "\n" . '   <th>dessert</th>';
    echo "\n" . '</tr>';

    foreach ($menus as $index => $menu) {
        echo '<br>';
        echo "<h2>Menu " . $index + 1 . "</h2>";
        echo '<article class="container">';

        foreach ($menu as $platI) {
            echo '<div>' . $plats[$platI]["type"] . " : " . $plats[$platI]["name"] . '</div>';
        }
        echo '</article>';
    }
}


$plats = getPlats();

$menus = createMenu($plats);

renderMenus($menus, $plats);
