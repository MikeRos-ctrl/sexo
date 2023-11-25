<?php


include('../dbConnection/db.php'); 


        $phpListId = $_POST["phpListId"];


        print_r($_POST);





      $stmt = $mysqli->query("
      UPDATE LISTS SET IS_ACTIVE = 0 WHERE LIST_ID = '{$phpListId}';
      ");


?>