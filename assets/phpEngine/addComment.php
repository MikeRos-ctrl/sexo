<?php


include('../dbConnection/db.php'); 


        $phpComment = $_POST["phpComment"];
        $phpUserId = $_POST["phpUserId"];
        $phpProductId = $_POST["phpProductId"];


        print_r($_POST);



      $stmt = $mysqli->query("
      INSERT INTO COMMENTS 
      (
        USERNAME_ID,
        PRODUCT_ID,
        USER_COMMENT
      ) 
      VALUES
      (
          '{$phpUserId}',
          '{$phpProductId}',
          '{$phpComment}'
      );");





?>