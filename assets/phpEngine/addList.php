<?php


include('../dbConnection/db.php'); 


        $phpListName = $_POST["phpListName"];
        $phpListDescription = $_POST["phpListDescription"];
        $phpOwnerId = $_POST["phpOwnerId"];
        $phpPrivate = $_POST["phpPrivate"];
        $phpCreationDate = date('y-m-d h:i:s');

        print_r($_POST);





      $stmt = $mysqli->query("
      INSERT INTO LISTS 
      (
        LIST_NAME,
        LIST_DESCRIPTION,
        LIST_OWNER,
        CREATION_DATE,
        PRIVATE_LIST
      ) 
      VALUES
      (
          '{$phpListName}',
          '{$phpListDescription}',
          '{$phpOwnerId}',
          '{$phpCreationDate}',
          '{$phpPrivate}'
      );");




   /* if($stmt->num_rows > 0)
    {
      INSERT INTO LISTS 
      (
        LIST_NAME,
        LIST_DESCRIPTION,
        LIST_OWNER,
        CREATION_DATE,
        PRIVATE_LIST
        
      ) 
      VALUES
      (
          'Test List 4',
          'Descripcion 4',
          1,
		  SYSDATE(),
          0
      );
    }
    else
    {

    }


   */


?>