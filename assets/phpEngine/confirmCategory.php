<?php


include('../dbConnection/db.php'); 


        $phpReflowId = $_POST["phpReflowId"];
        $phpCategoryId = $_POST["phpCategoryId"];
        $phpStatus = 1;

        //$phpImage = $_POST["phpImage"];
        //$phpDateOfBirth = $_POST["phpDateOfBirth"];


        echo $phpReflowId;




      $stmt = $mysqli->query("UPDATE CATEGORIES SET ISACTIVE = '{$phpStatus}', REFLOW_ID = '{$phpReflowId}' WHERE CATEGORY_ID = '{$phpCategoryId}';");

   /* if($stmt->num_rows > 0)
    {

    }
    else
    {

    }


   */


?>