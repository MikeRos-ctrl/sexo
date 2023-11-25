<?php

    $databasehost = "localhost";
    $databaseuser = "root";
    $databasepass = "root";
    $databasename = "dummy";

    //db es BDM_PIA2
    //$databasehost = "localhost";
    //$databaseuser = "root";
    //$databasepass = "wicho10211997";
    //$databasename = "pwci";


    $mysqli = new mysqli($databasehost, $databaseuser, $databasepass, $databasename);

    if ($mysqli->connect_errno) 
    {
            echo "Error con la conexion a la base de datos";
    }
   /* else
    {
        echo "Conectado";
    }
*/

?>