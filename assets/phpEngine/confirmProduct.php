<?php


include('../dbConnection/db.php'); 


        $phpReflowId = $_POST["phpReflowId"];
        $phpProductId = $_POST["phpProductId"];
        $phpStatus = 1;

        //$phpImage = $_POST["phpImage"];
        //$phpDateOfBirth = $_POST["phpDateOfBirth"];



      $stmt = $mysqli->query("UPDATE PRODUCT SET PRODUCT_STATUS = '{$phpStatus}', REFLOW_ID = '{$phpReflowId}' WHERE PRODUCT_ID = '{$phpProductId}';");

   /* if($stmt->num_rows > 0)
    {

    }
    else
    {

    }


   */


?>