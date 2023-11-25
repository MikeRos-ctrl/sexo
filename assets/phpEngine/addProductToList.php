<?php


include('../dbConnection/db.php'); 


        $phpProductId = $_POST["phpProductId"];
        $phpListId = $_POST["phpListId"];
        $phpCreationDate = date('y-m-d h:i:s');


        print_r($_POST);



      $stmt = $mysqli->query("
      INSERT INTO LISTS_LINK 
      (
        PRODUCT_ID,
        LIST_ID,
        CREATION_DATE
      ) 
      VALUES
      (
          '{$phpProductId}',
          '{$phpListId}',
          '{$phpCreationDate}'
      );");


?>