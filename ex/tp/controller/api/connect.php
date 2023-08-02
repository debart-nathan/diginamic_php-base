<?php
require_once __DIR__ . "/../../core/security.php";

if (!connect()){
    echo '<script type="text/javascript">
           window.onload = function () { alert("e-mail ou mot de passe incorrect"); }
    </script>';
}