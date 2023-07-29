<h1>Plats</h1>

<?php
require_once __DIR__ . '/../src/utils/getData.php';
require_once __DIR__ . '/../core/security.php';

/**
 * sort an array in a certain order by the values of a key
 * @param array &$data  : array to sort
 * @param string $sort : key of by which value we will sort
 * @param string $order : order by which we will sort the array
 */
function sortTable(&$data, $sort, $order)
{
    if (isset($sort) && isset($order)) {
        usort($data, function ($a, $b) use ($sort, $order) {
            if ($a[$sort] == $b[$sort]) {
                return 0;
            }
            switch ($order) {
                case "desc":
                    return $a[$sort] < $b[$sort] ? 1 : -1;
                    break;
                default:
                    return $a[$sort] > $b[$sort] ? 1 : -1;
                    break;
            }
        });
    }
}




/**
 * display the data in a table
 */
function renderTable($data, $sort, $order)
{
    echo "\n" . '<table class="table">';
    echo "\n" . '<tr>';
    echo "\n" . '   <th><a href="/index.php?page=plats&sort=type&sort_order=' .
        (($sort == 'type' && $order == "asc") ? 'desc' : 'asc')
        . '">Type</a></th>';
    echo "\n" . '   <th><a href="/index.php?page=plats&sort=name&sort_order=' .
        (($sort == 'name' && $order == "asc") ? 'desc' : 'asc')
        . '">Nom</a></th>';
    echo "\n" . (is_connected() ?"<th>Supprimer</th>":"");
    echo "\n" . ' </tr>';


    foreach ($data as $row) {
        echo "\n" . '<tr>';
        echo "\n" . "<td>" . $row['type'] . "</td>";
        echo "\n" . "<td>" . $row['name'] . "</td>";
        echo  "\n" . "<td>" .
            (is_connected() ? '<a href="" class="btn btn-primary" method="DELETE">Supprimer</a>' : '') .
            "</td>";
        echo "\n" . '</tr>';
    }
    echo "\n" . '</table>';
}
$sort = "name";
$order = "asc";
if (isset($_GET["sort"]) && isset($_GET["sort_order"])) {
    $sort = $_GET["sort"];
    $order = $_GET["sort_order"];
}

$plats = getPlats();
sortTable($plats, $sort, $order);
renderTable($plats, $sort, $order);
