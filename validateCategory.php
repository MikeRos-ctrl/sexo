<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php');
    
    $stmt = $mysqli->query("SELECT * FROM CATEGORIES WHERE ISACTIVE = 0;");
    $CATEGORIES = mysqli_fetch_array($stmt);


    ?>
    <title>VALIDATE CATEGORY</title>

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); 
    
    
    ?>
    

<script>

function validateCategory(phpCategoryId)
    {
        var phpReflowId = $('#phpReflowId'+phpCategoryId).val();


   

        var parametros = {
                "phpCategoryId" : phpCategoryId,
                "phpReflowId" : phpReflowId
        };


        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'assets/phpEngine/confirmCategory.php', //archivo que recibe la peticion
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
                    title: 'Your category has been updated',
                    showConfirmButton: false,
                    timer: 1500
                    })


                    window.alert(response);

                    setTimeout(function() {
                    
                        window.location.href = "profile.php";

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
                            <h1>REVIEW CATEGORY</h1>


                            <hr />

                            <?php
            if(!empty($CATEGORIES))
            {
                ?>
                    
                            <div class="row">

                    <div class="col-sm-2 col-md-2">
                        <div class="form-group mb-3"><label class="form-label">Category Name</label><input value="<?php echo $CATEGORIES['CATEGORY_DESCRIPTION']?>"disabled class="form-control" type="text" name="firstname" /></div>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <div class="form-group mb-3"><label class="form-label">Reflow ID</label><input id="phpReflowId<?php echo $CATEGORIES['CATEGORY_ID']?>" class="form-control" type="text" name="phpReflowId" /></div>
                    </div>

                    <div class="col-sm-2 col-md-6">
                    <p><a class="btn btn-primary form-btn" role="button" onclick="validateCategory(<?php echo $CATEGORIES['CATEGORY_ID']?>)">ACCEPT</a></p>

                    </div>
                
                    </div>
                <?php
            }
            else
            {
                ?>


                <?php
            }
            ?>
    



<?php while($CATEGORIES = mysqli_fetch_array($stmt)) { ?>

    <div class="row">
        <div class="col-sm-2 col-md-2">
            <div class="form-group mb-3"><label class="form-label">Category Name</label><input value="<?php echo $CATEGORIES['CATEGORY_DESCRIPTION']?>"disabled class="form-control" type="text" name="firstname" /></div>
        </div>
        <div class="col-sm-2 col-md-2">
            <div class="form-group mb-3"><label class="form-label">Reflow ID</label><input id="phpReflowId<?php echo $CATEGORIES['CATEGORY_ID']?>" class="form-control" type="text" name="phpReflowId" /></div>
        </div>

        <div class="col-sm-2 col-md-6">
        <p><a class="btn btn-primary form-btn" role="button" onclick="validateCategory(<?php echo $CATEGORIES['CATEGORY_ID']?>)">ACCEPT</a></p>

        </div>
     
    </div>
    <?php } ?>
    <div class="row">

    </div>
    <hr />
    <div class="row">
    </div>



            </div>
        </div>
    </form>
</div>




    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>