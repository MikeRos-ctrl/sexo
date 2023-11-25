<?php

include('assets/dbConnection/db.php'); 


            $phpEmailLogin    = $_POST["phpEmailRegister"];
                      

    $stmt = $mysqli->query("SELECT EMAIL FROM USERS WHERE EMAIL = '{$phpEmailLogin}';");


    //echo $phpEmailLogin;             
    //echo $phpPasswordLogin;             
    echo $stmt->num_rows;  
    exit();


   


?>