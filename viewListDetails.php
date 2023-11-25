<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); 
    
    $cookie_name = "user";
    $id = $_GET['id'];

    
    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
    $users = mysqli_fetch_array($stmt);
    $username_id = $users['USERNAME_ID'];


    $stmt2 = $mysqli->query("SELECT * FROM LISTS WHERE LIST_ID = '{$id}';");
    $lists = mysqli_fetch_array($stmt2);


    $stmt3 = $mysqli->query("SELECT * FROM LISTS_LINK WHERE LIST_ID = '{$id}' AND IS_PRODUCT_ACTIVE = 1;");
    $lists_details = mysqli_fetch_array($stmt3);

    $productId = $lists_details['PRODUCT_ID'];


    $stmt4 = $mysqli->query("SELECT * FROM PRODUCT WHERE PRODUCT_ID = '{$productId}';");
    $product = mysqli_fetch_array($stmt4);

    ?>
    <title>VIEW LIST DETAILS</title>

    

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>

<script>


    $(document).ready(function() {

        });

    
    function deleteFromList(phpLinkListProductId)
    {


        var parametros = {
                "phpLinkListProductId" : phpLinkListProductId
        };


        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'assets/phpEngine/deleteProductFromList.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () 
                {
                        //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) 
                { 
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your product has been deleted from the list',
                    showConfirmButton: false,
                    timer: 1500
                    })


                    //window.alert(response);

                    setTimeout(function() {
                    
                        window.location.reload();

                    }, 2500);

 
                }
                
        });
    }


</script>

<div id="profile-2" class="container profile profile-view" data-aos="fade-up" data-aos-duration="450" >
    <div class="row">
        <div class="col-md-12 alert-col relative">
            
        </div>
    </div>
    <form>
        <div class="row profile-row" style="background: rgba(255,255,255,0.37); margin-bottom:100px">
            <div class="col-md-8 col-xxl-12">
                <h1><?php echo $lists['LIST_NAME'] ?></h1>


                <hr />
                <script>
                document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');

                </script>
           
            </div>


     
    </div>
    <div class="row">
        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
        <p><a class="btn btn-danger form-btn" role="button" onclick="deleteFromList(<?php echo $lists_details['LIST_LINK_ACTION_ID'] ?>)">DELETE FROM LIST</a></p>
    </div>
    <hr />


<?php while($lists_details = mysqli_fetch_array($stmt3)) { 
    
    $productId = $lists_details['PRODUCT_ID'];
    $stmt4 = $mysqli->query("SELECT * FROM PRODUCT WHERE PRODUCT_ID = '{$productId}';");
    $product = mysqli_fetch_array($stmt4);

    ?>


    

    <div class="row">
     
        <div class="col-md-8 col-xxl-12">
        <script>

        document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');

        </script>
        </div>



    </div>
    <div class="row">
        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
        <p><a class="btn btn-danger form-btn" role="button" onclick="deleteFromList(<?php echo $lists_details['LIST_LINK_ACTION_ID'] ?>)">DELETE FROM LIST</a></p>
    </div>
    <hr />
    <?php } ?>

    <div class="row">

    </div>

    <div class="row">
    </div>

    <div class="content-right" style="margin-top: 28px;">
 
    </div>


            </div>
        </div>
    </form>
</div>

    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>