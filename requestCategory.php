<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include('assets/codeSnippets/header.php'); 
    
    $cookie_name = "user";
    
    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
    $users = mysqli_fetch_array($stmt);
    $id = $users['USERNAME_ID'];
    
    ?>
    <title>CREATE LIST</title>



</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>

<script>

function requestCategory()
    {
        var phpUser = $('#phpUser').val();
        var phpCategoryName = $('#phpCategoryName').val();

   

        var parametros = {
                "phpUser" : phpUser,
                "phpCategoryName" : phpCategoryName
        };


        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'assets/phpEngine/addCategory.php', //archivo que recibe la peticion
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
                    title: 'Your category has been requested',
                    showConfirmButton: false,
                    timer: 1500
                    })


                    //window.alert(response);

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
        <div class="row profile-row" style="background: rgba(255,255,255,0.37); margin-bottom:130px">
            <div class="col-md-8 col-xxl-12">
                <h1>REQUEST CATEGORY</h1>


                <hr />

           

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group mb-3">

                <input class="form-control" type="hidden" id="phpUser" value="<?php echo $id?>"/>



                <label class="form-label">Category Name
                </label>
                <input class="form-control" type="text" id="phpCategoryName" />

                </br>

            </div>
        </div>

    </div>
    <div class="row">

    </div>
    <hr />
    <div class="row">
        <div class="col-md-12 content-right" style="margin-bottom: 19px;">

        <p><a class="btn btn-primary form-btn" role="button" onclick="requestCategory()">REQUEST</a></p>
    </div>
    </div>



            </div>
        </div>
    </form>
</div>

    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>