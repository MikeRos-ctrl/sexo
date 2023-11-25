<?php

$cookie_name = "user";
$cookie_name_type = "type";

    $blank = "";
    
    setcookie($cookie_name, $blank, time() + (86400 * 30), "/", false);
    setcookie($cookie_name_type, $blank, time() + (86400 * 30), "/", false);


?>
