<?php
require_once __DIR__ . "/../../core/security.php";

echo "\n" . var_dump($_POST) ;
if (!connect()){
    echo '<script type="text/javascript">
           window.onload = function () { alert("e-mail ou mot de passe incorrect"); }
    </script>';
}