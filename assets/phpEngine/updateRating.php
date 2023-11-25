<?php


include('../dbConnection/db.php'); 


        $phpUserId = $_POST["phpUserId"];
        $phpProductId = $_POST["phpProductId"];
        $phpRating = $_POST["phpRating"];
        $phpCreationDate = date('y-m-d h:i:s');



        print_r($_POST);


      $stmt = $mysqli->query("UPDATE RATING SET RATING = '{$phpRating}' WHERE USERNAME_ID = '{$phpUserId}' AND PRODUCT_ID = '{$phpProductId}';");


?>