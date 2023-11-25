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

function createList()
    {
        var e = document.getElementById("phpPrivate");
        var phpPrivate = e.value;

        var phpListName = $('#phpListName').val();
        var phpListDescription = $('#phpListDescription').val();
        var phpOwnerId = $('#phpOwnerId').val();
   

        var parametros = {
                "phpListName" : phpListName,
                "phpListDescription" : phpListDescription,
                "phpOwnerId" : phpOwnerId,
                "phpPrivate" : phpPrivate
        };


        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'assets/phpEngine/addList.php', //archivo que recibe la peticion
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
                    title: 'Your list has been created',
                    showConfirmButton: false,
                    timer: 1500
                    })


                    //window.alert(response);

                    setTimeout(function() {
                    
                        window.location.href = "viewList.php";

                    }, 2500);

 
                }
                
        });

    }

    function resetInputs()
    {


        $('#phpListName').val("");
        $('#phpListDescription').val("");


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
                <h1>ADD LIST</h1>


                <hr />

           

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group mb-3">

                <input class="form-control" type="hidden" id="phpOwnerId" value="<?php echo $id?>"/>



                <label class="form-label">List Name
                </label>
                <input class="form-control" type="text" id="phpListName" />

                </br>

                <label class="form-label">List Description
                </label>
                <input class="form-control" type="text" id="phpListDescription" />

                </br>

                <label class="form-label">Private List
                </label>

                </br>

                <select id="phpPrivate" class="form-select" aria-label="Default select example">
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                </select>
            </div>
        </div>

    </div>
    <div class="row">

    </div>
    <hr />
    <div class="row">
        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
        <p><a class="btn btn-danger form-btn" role="button" onclick="resetInputs()">RESET</a></p>

        <p><a class="btn btn-primary form-btn" role="button" onclick="createList()">CREATE</a></p>
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