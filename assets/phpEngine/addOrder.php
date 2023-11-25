<?php


include('../dbConnection/db.php'); 


        $phpUsername = $_POST["phpUsername"];
        $phpEmail = $_POST["phpEmail"];
        $phpPassword = $_POST["phpPassword"];
        //$phpImage = $_POST["phpImage"];
        //$phpVideo = $_POST["phpVideo"];
        $phpFirstName = $_POST["phpFirstName"];
        $phpLastName = $_POST["phpLastName"];

        $phpGender = $_POST["phpGender"];
        $phpAccountType = $_POST["phpAccountType"];
        $phpProfileType = $_POST["phpProfileType"];
        $phpCreationDate = date('y-m-d h:i:s');

        //$phpImage = $_POST["phpImage"];
        //$phpDateOfBirth = $_POST["phpDateOfBirth"];


        print_r($_POST);

        //echo $phpImage;





        $fileName = basename($_FILES["phpImage"]["name"]);
            $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $allowedTypes = array('png', 'jpg', 'gif');

            if(in_array($imageType, $allowedTypes)){
                                            //el nombre tmp_name es temporal, es donde se guarda el archivo en el apache
                $imageName = $_FILES["phpImage"]["tmp_name"];
                $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
                $realImage = 'data:image/'.$imageType.';base64,'.$base64Image; //para concatenar en php se usa el punto "."
            }

           // echo $realImage;

          /*
            $fileName = basename($_FILES["phpVideo"]["name"]);
            $videoType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $allowedTypes = array('mp4', 'wav');

            if(in_array($videoType, $allowedTypes)){
                                            //el nombre tmp_name es temporal, es donde se guarda el archivo en el apache
                $videoName = $_FILES["phpVideo"]["tmp_name"];
                $video64 = base64_encode(file_get_contents($videoName)); //se transformara en un string base64
                $realVideo = 'data:video/'.$videoType.';base64,'.$video64; //para concatenar en php se usa el punto "."
            }


            echo $realVideo;
*/
           /* echo $realImage;*/

         /*   $stmt = $mysqli->query("
            INSERT INTO USERS 
            (
              EMAIL,
              USERNAME,
              USER_PASSWORD,
              USER_TYPE_ID,

              FULL_NAME,
              LAST_NAME,
              GENDER,
              DATE_OF_BIRTH
            ) 
            VALUES
            (
                'a',
                'b',
                'c',
                '1',
                'f',
                'g',
                'h',
                'i'
            );");
*/

      $stmt = $mysqli->query("
      INSERT INTO USERS 
      (
        EMAIL,
        USERNAME,
        USER_PASSWORD,
        USER_TYPE_ID,
        AVATAR_BLOB,
        PRIVATE_PROFILE,
        FULL_NAME,
        LAST_NAME,
        GENDER,
        LAST_CHANGE_DATE
      ) 
      VALUES
      (
          '{$phpEmail}',
          '{$phpUsername}',
          '{$phpPassword}',
          '{$phpAccountType}',
          '{$realImage}',
          '{$phpProfileType}',
          '{$phpFirstName}',
          '{$phpLastName}',
          '{$phpGender}',
          '{$phpCreationDate}'
      );");


   /* if($stmt->num_rows > 0)
    {

    }
    else
    {

    }


   */


?>