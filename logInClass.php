<?php

include('assets/dbConnection/db.php'); 


            $phpEmailLogin    = $_POST["phpEmailLogin"];
            $phpPasswordLogin = $_POST["phpPasswordLogin"];
            $cookie_name = "user";
            $cookie_name_type = "type";
            $cookie_name_id = "id";

      




                      

    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$phpEmailLogin}' AND USER_PASSWORD = '{$phpPasswordLogin}';");
    $user = mysqli_fetch_array($stmt);


    //echo $phpEmailLogin;             
    //echo $phpPasswordLogin;             
    echo $stmt->num_rows;  
    

    
    if($stmt->num_rows > 0)
    {
      //echo $phpEmailLogin;  
      //echo $cookie_name;  
      //echo "contra correcta"; 


      setcookie($cookie_name, $phpEmailLogin, time() + (86400 * 30), "/", false);
      setcookie($cookie_name_type, $user['USER_TYPE_ID'], time() + (86400 * 30), "/", false);
      setcookie($cookie_name_id, $user['USERNAME_ID'], time() + (86400 * 30), "/", false);
      //echo "Value is: " . $_COOKIE[$cookie_name];

      //header("Location: ../../index.php");
      exit();
    }
    else
    {


      //echo "contra incorrecta";             
    }


   


?>