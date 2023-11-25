<?php


include('../dbConnection/db.php'); 

        $phpUsernameId = $_POST["phpUsernameId"];
        $phpUsername = $_POST["phpUsername"];
        $phpPassword = $_POST["phpPassword"];
        $phpFirstName = $_POST["phpFirstName"];
        $phpLastName = $_POST["phpLastName"];


        $phpCreationDate = date('y-m-d h:i:s');


        print_r($_POST);




        $fileName = basename($_FILES["phpImage"]["name"]);
            $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $allowedTypes = array('png', 'jpg', 'gif');

            if(in_array($imageType, $allowedTypes)){
                                            //el nombre tmp_name es temporal, es donde se guarda el archivo en el apache
                $imageName = $_FILES["phpImage"]["tmp_name"];
                $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
                $realImage = 'data:image/'.$imageType.';base64,'.$base64Image; //para concatenar en php se usa el punto "."
            }





      $stmt = $mysqli->query("UPDATE USERS SET USERNAME = '{$phpUsername}', USER_PASSWORD = '{$phpPassword}', AVATAR_BLOB = '{$realImage}', FULL_NAME = '{$phpFirstName}', LAST_NAME = '{$phpLastName}', LAST_CHANGE_DATE = '{$phpCreationDate}' WHERE USERNAME_ID = '{$phpUsernameId}';");


   /* 

      $stmt = $mysqli->query("UPDATE RATING SET RATING = '{$phpRating}' WHERE USERNAME_ID = '{$phpUserId}' AND PRODUCT_ID = '{$phpProductId}';");



   */


?>