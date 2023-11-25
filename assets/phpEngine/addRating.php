<?php


include('../dbConnection/db.php'); 


        $phpUserId = $_POST["phpUserId"];
        $phpProductId = $_POST["phpProductId"];
        $phpRating = $_POST["phpRating"];
        $phpCreationDate = date('y-m-d h:i:s');



        print_r($_POST);


      $stmt = $mysqli->query("
      INSERT INTO RATING 
      (
        USERNAME_ID,
        PRODUCT_ID,
        RATING,
        CREATION_DATE
      ) 
      VALUES
      (
          '{$phpUserId}',
          '{$phpProductId}',
          '{$phpRating}',
          '{$phpCreationDate}'
      );");



   /* if($stmt->num_rows > 0)
    {

    }
    else
    {
    	 INSERT INTO RATING 
      (
        USERNAME_ID,
        PRODUCT_ID,
        RATING,
        CREATION_DATE
      ) 
      VALUES
      (
          2,
          2,
          1,
		 SYSDATE()
      );
    }


   */


?>