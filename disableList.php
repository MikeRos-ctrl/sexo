<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include('assets/codeSnippets/header.php'); 
    
    $cookie_name = "user";
    
    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
    $users = mysqli_fetch_array($stmt);
    $id = $users['USERNAME_ID'];
    
    $stmt2 = $mysqli->query("SELECT * FROM LISTS WHERE LIST_OWNER = '{$id}' AND IS_ACTIVE = 1;");
    $lists = mysqli_fetch_array($stmt2);

    ?>
    <title>DELETE LIST</title>



</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>

<script>

function deleteList()
    {
        var e = document.getElementById("phpListId");
        var phpListId = e.value;

        var parametros = {
                "phpListId" : phpListId
        };


        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'assets/phpEngine/deleteList.php', //archivo que recibe la peticion
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
                    title: 'Your list has been deleted',
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
        <div class="row profile-row" style="background: rgba(255,255,255,0.37); margin-bottom:130px">
            <div class="col-md-8 col-xxl-12">
                <h1>DELETE LIST</h1>


                <hr />

           

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group mb-3">
 

            <select id="phpListId" class="form-select" aria-label="Default select example">


                        <option value="<?php echo $lists['LIST_ID'] ?>"><?php echo $lists['LIST_NAME'] ?></option>

                        <?php while($lists = mysqli_fetch_array($stmt2)) { ?>

                        <option value="<?php echo $lists['LIST_ID'] ?>"><?php echo $lists['LIST_NAME'] ?></option>

                        <?php } ?>
            </select>

            </div>
        </div>

    </div>
    <div class="row">

    </div>
    <hr />
    <div class="row">
        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
        <p><a class="btn btn-danger form-btn" role="button" onclick="deleteList()">DELETE</a></p>
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