<h2>Les membres</h2>

<?php
require_once __DIR__ . "/../../src/utils/getData.php";


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
 * render the html table with the users filed in
 *
 * @param array $users
 * @param string $sort
 * @param string $order
 * @return void
 */
function renderTabUsers($users, $sort, $order)
{

    require __DIR__ . "/../../src/constant/usersTableCols.php";



    echo "\n" . '<table class="table table-bordered table-striped border-dark">';
    echo "\n" . '<thead class="table-dark border-light"><tr>';

    //render col head with sort parameters
    foreach ($cols as $col) {
        //if the col was selected last sort desc
        $colOrder = (($sort == $col["name"] && $order == "asc") ? 'desc' : 'asc');

        //if the col is sorted display the order
        $sortIcon = ($sort == $col["name"] ? ($order == "asc" ? " <i>&#x25BC;</i>" : "<i>&#x25B2;</i>") : "");


        //write the table header element
        echo "\n" . '   <th><a class="d-flex justify-content-between' .
            ' text-decoration-none text-light" href="/users?sort=' .
            $col["name"] . '&sort_order=' .
            $colOrder .
            '">' . $col["fr"] . $sortIcon . '</a></th>';
    }
    echo "\n" . ' </tr></thead>';

    //for each users add a line
    foreach ($users as $user) {
        echo "\n" . '<tr>';

        //fill each cols with corresponding data
        foreach ($cols as $col) {
            echo "\n" . "<td>" . $user[$col["name"]] . "</td>";
        }

        echo "\n" . '</tr>';
    }
    echo "\n" . '</table>';
}


//TODO add connection test

$sort = "name";
$order = "asc";
if (isset($_GET["sort"]) && isset($_GET["sort_order"])) {
    $sort = $_GET["sort"];
    $order = $_GET["sort_order"];
}

$users = getUsers();
SortTable($users, $sort, $order);
renderTabUsers($users, $sort, $order);