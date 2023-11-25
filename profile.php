<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); ?>
    <?php include('assets/dbConnection/db.php');
    session_start();
    ?>
    <title>My profile</title>

    <!---->


</head>

<script>
    $(document).ready(function() {

        if (isLogged == false) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You need to log in to proceed with the page',
                footer: '<a href="register.php">Register now!</a>'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = "login.php";
                } else {
                    window.location.href = "login.php";
                }
            })
        }

        <?php

        $cookie_name = "user";

        $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
        $user = mysqli_fetch_array($stmt);

        ?>


    });

    function updateProfile()
    //, phpEmailRegister, phpPasswordRegister, phpFirstNameRegister, phpLastNameRegister)
    {

        parametros = new FormData(document.getElementById('updateForm'));

        //window.alert(phpUsernameRegister + " " + phpEmailRegister + " " + phpPasswordRegister + " " + phpFirstNameRegister + " "+ phpLastNameRegister + " " +phpGender + " " + phpAccountType + " " + phpProfileType + " " + phpImage);

        /*for (const value of parametros.values()) {
            console.log(value);
            }
*/

        /*for (const pair of parametros.entries()) {
        console.log(`${pair[0]}, ${pair[1]}`);
        }
    */


        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: 'assets/phpEngine/updateProfile.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            contentType: false,
            processData: false,
            beforeSend: function() {
                //$("#resultado").html("Procesando, espere por favor...");
            },
            success: function(response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your profile has been updated',
                    showConfirmButton: false,
                    timer: 1500
                })


                window.alert(response);

                setTimeout(function() {

                    window.location.reload();

                }, 2500);


            }

        });

    }

    function logOut() {


        <?php
        unset($_SESSION["Id_User"]);


        ?>




        $.ajax({
            url: 'logOut.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function() {

            },
            success: function(response) {


                window.location.href = "index.php";

            },
            error: function(jqXHR, textStatus, errorThrown) {
                window.alert(jqXHR);

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your registration has been completed',
                    showConfirmButton: false,
                    timer: 5000
                })

                setTimeout(function() {

                    //window.location.href = "thanksRegister.php";

                }, 5000);


                //window.alert(errorThrown);



            }



        });

    }
</script>

<body style="background: rgba(255,255,255,0);">


    <?php include('assets/codeSnippets/navbar.php'); ?>

    <script>

    </script>

    <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3" style="background: #696969 !important;">
        <div class="container"><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-6"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div id="navcol-6" class="collapse navbar-collapse flex-grow-0 order-md-first">
                <ul class="navbar-nav me-auto">

                    <li class="nav-item"><a class="nav-link active" id="lists" href="viewList.php" style="text-align: center;">LISTS</a></li>
                    <li class="nav-item"><a class="nav-link active" id="orders" href="viewOrders.php" style="text-align: center;">ORDERS</a></li>

                    <li class="nav-item"><a class="nav-link active" id="myProducts" href="viewMyProducts.php" style="text-align: center;">MY PRODUCTS</a></li>
                    <!--<li class="nav-item"><a class="nav-link active" id="soldProducts" href="viewSoldProducts.php" style="text-align: center;">SOLD PRODUCTS</a></li>-->
                    <li class="nav-item"><a class="nav-link active" id="requestProduct" href="requestProduct.php" style="text-align: center;">REQUEST PRODUCT</a></li>
                    <li class="nav-item"><a class="nav-link active" id="requestCategory" href="requestCategory.php" style="text-align: center;">REQUEST CATEGORY</a></li>


                    <li class="nav-item"><a class="nav-link active" id="validateProduct" href="validateProduct.php" style="text-align: center;">ACCEPT PRODUCT</a></li>
                    <li class="nav-item"><a class="nav-link active" id="validateCategory" href="validateCategory.php" style="text-align: center;">ACCEPT CATEGORY</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php

    include('phpCookie.php');

    ?>

    <div class="container profile profile-view" data-aos="fade-up" id="profile" style="margin-top: 48px;">
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info alert-dismissible absolue center" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><span>Profile save with success</span></div>
            </div>
        </div>
        <form id="updateForm" enctype="multipart/form-data">
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">

                <div class="col-md-4 relative">
                    <div class="avatar" style="margin-top: 21px;">
                        <img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px; object-fit: cover;" src="<?php echo $user['AVATAR_BLOB'] ?>" />
                    </div>
                    <input class="form-control form-control" type="file" name="phpImage" style="margin-top: 24px;">
                </div>

                <div class="col-md-8">

                    <h1> <?php echo $user['USERNAME'] ?> </h1>
                    <hr>

                    <div class="row">
                        <div class="form-group mb-3">
                            <label class="form-label">Email </label>
                            <input class="form-control" type="email" autocomplete="off" required="" name="email" disabled value=<?php echo $user['EMAIL'] ?>>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Firstname </label>
                                <input class="form-control" type="text" name="phpFirstName" value=<?php echo $user['FULL_NAME'] ?>>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Lastname </label>
                                <input class="form-control" type="text" name="phpLastName" value=<?php echo $user['LAST_NAME'] ?>>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-6">
                                <label class="form-label">USERNAME </label>
                                <input class="form-control" type="text" name="phpUsername" value=<?php echo $user['USERNAME'] ?>>
                                <input class="form-control" type="hidden" name="phpUsernameId" value=<?php echo $user['USERNAME_ID'] ?>>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Password </label>
                                <input class="form-control" type="password" name="phpPassword" autocomplete="off" required="" value=<?php echo $user['USER_PASSWORD'] ?>>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
                            <button class="btn btn-danger" type="button" onclick="logOut()">LOG OUT </button>
                            <button class="btn btn-primary" type="button" onclick="updateProfile()">UPDATE</button>

                        </div>



                    </div>
                </div>
            </div>
        </form>
    </div>





    </div>
    </div>



    <?php include('assets/codeSnippets/footer.php'); ?>
    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>