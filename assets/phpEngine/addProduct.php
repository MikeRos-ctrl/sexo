<?php


include('../dbConnection/db.php'); 


        $phprEFLOW = $_POST["REFLOW"];

        $phpProductTitle = $_POST["phpProductTitle"];
        $phpProductDescription = $_POST["phpProductDescription"];
        $phpProductPrice = $_POST["phpProductPrice"];
        $phpProductStatus = 0;
        $phpCategoryId = $_POST["phpCategoryId"];
        $phpOwnedById = $_POST["phpOwnedById"];
        $phpAuction = $_POST["phpAuction"];
        $phpCreationDate = date('y-m-d h:i:s');

        print_r($_POST);
        print_r($phpCategoryId);

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


            $fileName = basename($_FILES["phpVideo"]["name"]);
            $videoType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $allowedTypes = array('mp4', 'wav');

            if(in_array($videoType, $allowedTypes)){
                                            //el nombre tmp_name es temporal, es donde se guarda el archivo en el apache
                $videoName = $_FILES["phpVideo"]["tmp_name"];
                $video64 = base64_encode(file_get_contents($videoName)); //se transformara en un string base64
                $realVideo = 'data:video/'.$videoType.';base64,'.$video64; //para concatenar en php se usa el punto "."
            }



      $stmt = $mysqli->query("
      INSERT INTO PRODUCT 
      (
        PRODUCT_TITLE,
        REFLOW_ID,
        PRODUCT_DESCRIPTION,
        PRODUCT_PRICE,
        IMAGE_BLOB,
        VIDEO_BLOB,
        PRODUCT_STATUS,
        CATEGORY,
        OWNED_BY,
        AUCTION,
        CREATE_DATE
      ) 
      VALUES
      (
          '{$phpProductTitle}',
          '{$phprEFLOW}',
          '{$phpProductDescription}',
          '{$phpProductPrice}',
          '{$realImage}',
          '{$realVideo}',
          '{$phpProductStatus}',
          '{$phpCategoryId}',
          '{$phpOwnedById}',
          '{$phpAuction}',
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