<?php


include('../dbConnection/db.php'); 


        $phpLinkListProductId = $_POST["phpLinkListProductId"];


        print_r($_POST);





      $stmt = $mysqli->query("
      UPDATE LISTS_LINK SET IS_PRODUCT_ACTIVE = 0 WHERE LIST_LINK_ACTION_ID = '{$phpLinkListProductId}';
      ");


?>