<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php');
    
    $stmt = $mysqli->query("SELECT * FROM PRODUCT WHERE PRODUCT_STATUS = 0;");
    $PRODUCTS = mysqli_fetch_array($stmt);


    ?>
    <title>VALIDATE PRODUCT</title>

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); 
    
    
    ?>
    

<script>


function validateProduct(phpProductId)
    {

        var phpReflowId = $('#reflowId'+phpProductId).val();

        var parametros = {
                "phpProductId" : phpProductId,
                "phpReflowId" : phpReflowId
        };

        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'assets/phpEngine/confirmProduct.php', //archivo que recibe la peticion
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
                    title: 'Product Validated',
                    showConfirmButton: false,
                    timer: 1500
                    })


                    window.alert(response);

                    setTimeout(function() {
                    
                        window.location.href = "validateProduct.php";

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
                            <h1>REVIEW PRODUCT</h1>


                            <hr />

                            <?php
            if(!empty($PRODUCTS))
            {
                ?>

                <div class="row">

                    <div class="col-xxl-12">
                        <div class="form-group mb-3">
                        <h1><?php echo $PRODUCTS['PRODUCT_TITLE'] ?></h1>
                        </div>
                    </div>

                    <div class="col-xxl-12">
                        <div class="form-group mb-3"><label class="form-label">Product Description</label><input value="<?php echo $PRODUCTS['PRODUCT_DESCRIPTION']?>"disabled class="form-control" type="text" name="firstname" /></div>
                    </div>

                    <div class="col-xxl-12">
                        <div class="form-group mb-3"><label class="form-label">Reflow ID</label><input id="reflowId<?php echo $PRODUCTS['PRODUCT_ID']?>" class="form-control" type="text" name="firstname" /></div>
                    </div>


                            <label class="form-label">Image</label>
                            <img   src="<?php echo $PRODUCTS['IMAGE_BLOB'] ?>" />
              
                        
                            <label class="form-label">Video</label>
                            <video class="img-fluid rounded-start" controls="controls" preload="metadata"><source src="<?php echo $PRODUCTS['VIDEO_BLOB']?>"></video>


                </div>

                <div class="row">

                <div class="col-sm-2 col-md-2">
                    <div class="form-group mb-3"><label class="form-label">Product Price</label>
                        <input value="<?php echo $PRODUCTS['PRODUCT_PRICE'] ?>" disabled class="form-control" type="text" name="firstname" />
                    </div>
                </div>

                <div class="col-sm-2 col-md-2">
                    <div class="form-group mb-3">
                        <label class="form-label">Category</label>
                        <input value="<?php echo $PRODUCTS['CATEGORY']?>"disabled class="form-control" type="text" name="firstname" />
                    </div>
                </div>

                <div class="col-sm-2 col-md-2">
                    <div class="form-group mb-3">
                        <label class="form-label">Owned By</label>
                        <input value="<?php echo $PRODUCTS['OWNED_BY']?>"disabled class="form-control" type="text" name="firstname" />
                    </div>
                </div>

                <div class="col-sm-2 col-md-2">
                    <div class="form-group mb-3">
                        <label class="form-label">Auction</label>
                        <input value="<?php echo $PRODUCTS['AUCTION']?>"disabled class="form-control" type="text" name="firstname" />
                    </div>
                </div>

                <div class="col-sm-2 col-md-2">
                <p><a class="btn btn-primary form-btn" role="button" onclick="validateProduct(<?php echo $PRODUCTS['PRODUCT_ID']?>)">ACCEPT</a></p>

                </div>


                </div>

                <hr />





                <?php
            }
            else
            {
                ?>


                <?php
            }
            ?>
    



<?php while($PRODUCTS = mysqli_fetch_array($stmt)) { ?>

    <div class="row">

<div class="col-xxl-12">
    <div class="form-group mb-3">
    <h1><?php echo $PRODUCTS['PRODUCT_TITLE'] ?></h1>
    </div>
</div>

<div class="col-xxl-12">
    <div class="form-group mb-3"><label class="form-label">Product Description</label><input value="<?php echo $PRODUCTS['PRODUCT_DESCRIPTION']?>"disabled class="form-control" type="text" name="firstname" /></div>
</div>

<div class="col-xxl-12">
<div class="form-group mb-3"><label class="form-label">Reflow ID</label><input id="reflowId<?php echo $PRODUCTS['PRODUCT_ID']?>" class="form-control" type="text" name="firstname" /></div>
</div>


        <label class="form-label">Image</label>
        <img   src="<?php echo $PRODUCTS['IMAGE_BLOB'] ?>" />

        




        <label class="form-label">Video</label>
        <video class="img-fluid rounded-start" controls="controls" preload="metadata"><source src="<?php echo $PRODUCTS['VIDEO_BLOB']?>"></video>


</div>

<div class="row">

<div class="col-sm-2 col-md-2">
<div class="form-group mb-3"><label class="form-label">Product Price</label>
    <input value="<?php echo $PRODUCTS['PRODUCT_PRICE'] ?>" disabled class="form-control" type="text" name="firstname" />
</div>
</div>

<div class="col-sm-2 col-md-2">
<div class="form-group mb-3">
    <label class="form-label">Category</label>
    <input value="<?php echo $PRODUCTS['CATEGORY']?>"disabled class="form-control" type="text" name="firstname" />
</div>
</div>

<div class="col-sm-2 col-md-2">
<div class="form-group mb-3">
    <label class="form-label">Owned By</label>
    <input value="<?php echo $PRODUCTS['OWNED_BY']?>"disabled class="form-control" type="text" name="firstname" />
</div>
</div>

<div class="col-sm-2 col-md-2">
<div class="form-group mb-3">
    <label class="form-label">Auction</label>
    <input value="<?php echo $PRODUCTS['AUCTION']?>"disabled class="form-control" type="text" name="firstname" />
</div>
</div>

<div class="col-sm-2 col-md-2">
<div class="content-right" style="margin-top: 28px;">
<p><a class="btn btn-primary form-btn" role="button" onclick="validateProduct(<?php echo $PRODUCTS['PRODUCT_ID']?>)">ACCEPT</a></p>

</div>


</div>

<hr />
     
    </div>
    <?php } ?>




            </div>
        </div>
    </form>
</div>




    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>