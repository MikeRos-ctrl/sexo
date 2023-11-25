<?php


include('../dbConnection/db.php'); 


        $phpCategoryName = $_POST["phpCategoryName"];
        $phpUser = $_POST["phpUser"];
        $phpStatus = 1;



        print_r($_POST);



       

      $stmt = $mysqli->query("
      INSERT INTO CATEGORIES 
      (
        CATEGORY_DESCRIPTION,
        REQUESTED_BY,
        ISACTIVE
      ) 
      VALUES
      (
          '{$phpCategoryName}',
          '{$phpUser}',
          '{$phpStatus}'
      );");



   /* if($stmt->num_rows > 0)
    {

    }
    else
    {

    }


   */


?>