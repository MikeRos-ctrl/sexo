<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); ?>
    <?php include('assets/dbConnection/db.php'); ?>
    <title>My profile</title>

<!---->


</head>

<script>

        $(document).ready(function() 
        {

            if(isLogged == false)
                {
                    Swal.fire
                    ({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You need to log in to proceed with the page',
                    footer: '<a href="register.php">Register now!</a>'
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location.href = "login.php";
                    }
                    else
                    {
                        window.location.href = "login.php";
                    }
                    })
                }

            <?php 

            $id = $_GET['id'];

            $stmt = $mysqli->query("SELECT * FROM USERS WHERE USERNAME_ID = '{$id}';");
            
            $user = mysqli_fetch_array($stmt);
            
            ?>





        });


function logOut()
{

    $.ajax({
                url:   'logOut.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () 
                {

                },
                success:  function (response) 
                { 


                    window.location.href = "index.php";

                },
                error: function(jqXHR, textStatus, errorThrown){
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
    window.alert(<?php echo $user['AVATAR_BLOB'] ?>);

</script>



    <div class="container profile profile-view" data-aos="fade-up" id="profile" style="margin-top: 48px;">
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info alert-dismissible absolue center" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><span>Profile save with success</span></div>
            </div>
        </div>
        <form>
        <?php if($user['PRIVATE_PROFILE'] == "1") 
        { 
        ?>

        <h1> This profile is private </h1>


        <?php 
        } 
        ?>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">

                <div class="col-md-4 relative">
                    <div class="avatar" style="margin-top: 21px;">
                        <img class="rounded img-fluid d-block w-100 fit-cover" style="height: 200px; object-fit: cover;" src="<?php echo $user['AVATAR_BLOB'] ?>" />
                    </div>
                </div>

                <div class="col-md-8">

                    <h1> <?php echo $user['USERNAME'] ?> </h1>
                    <hr>
                    <?php if($user['PRIVATE_PROFILE'] == "0") 
                    { 
                    ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Firstname </label><input class="form-control" type="text" name="firstname" value=<?php echo $user['FULL_NAME'] ?> disabled></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Lastname </label><input class="form-control" type="text" name="lastname" value=<?php echo $user['LAST_NAME'] ?> disabled></div>
                        </div>
                    </div>
                    <div class="form-group mb-3"><label class="form-label">Email </label><input class="form-control" type="email" autocomplete="off" required="" name="email" disabled value=<?php echo $user['EMAIL'] ?>></div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
                    
                    </div>

                    <div > 


                    </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>

<?php 
} 
?>


    <?php 
    if(($user['PRIVATE_PROFILE'] == "0") && ($user['USER_TYPE_ID'] == "1")) {
        
    
    $stmt2 = $mysqli->query("SELECT * FROM LISTS WHERE LIST_OWNER = '{$id}' AND IS_ACTIVE = 1;");
    $lists = mysqli_fetch_array($stmt2);
    ?>

    <?php if(($lists['PRIVATE_LIST'] == "0") && ($user['USER_TYPE_ID'] == "1")) {
    

    ?>

<div id="profile-2" class="container profile profile-view" data-aos="fade-up" data-aos-duration="450" >


<div class="row profile-row" style="background: rgba(255,255,255,0.37); margin-bottom:100px">
            <div class="col-md-8 col-xxl-12">
                <h1>MY LISTS</h1>


                <hr />

           
                <div class="row">
        <div class="col-sm-2 col-md-2">
            <div class="form-group mb-3"><label class="form-label">List Name</label><input value="<?php echo $lists['LIST_NAME'] ?>" disabled class="form-control" type="text" name="firstname" /></div>
        </div>
        <div class="col-sm-2 col-md-2">
            <div class="form-group mb-3"><label class="form-label">Description</label><input value="<?php echo $lists['LIST_DESCRIPTION']?>"disabled class="form-control" type="text" name="firstname" /></div>
        </div>

        <div class="col-sm-2 col-md-6">
        <div class="content-right" style="margin-top: 28px;">
        <script>
            document.write('<p><a class="btn btn-primary hero-button plat" role="button" href="viewOtherListDetails.php?id='+ <?php echo $lists['LIST_ID']?> +'">VIEW LIST</a></p>');
        </script>
        </div>
        </div>

     
   
     

    <hr />
    
            

    <?php }?>

<?php while($lists = mysqli_fetch_array($stmt2)) { ?>

    <?php if(($lists['PRIVATE_LIST'] == "0") && ($user['USER_TYPE_ID'] == "1")){
    

    ?>
    <div class="row">
        <div class="col-sm-2 col-md-2">
            <div class="form-group mb-3"><label class="form-label"></label><input value="<?php echo $lists['LIST_NAME'] ?>" disabled class="form-control" type="text" name="firstname" /></div>
        </div>
        <div class="col-sm-2 col-md-2">
            <div class="form-group mb-3"><label class="form-label"></label><input value="<?php echo $lists['LIST_DESCRIPTION']?>"disabled class="form-control" type="text" name="firstname" /></div>
        </div>
     
        <div class="col-sm-2 col-md-6">

            <div class="content-right" style="margin-top: 28px;">
            <script>
                document.write('<p><a class="btn btn-primary hero-button plat" role="button" href="viewOtherListDetails.php?id='+ <?php echo $lists['LIST_ID']?> +'">VIEW LIST</a></p>');
            </script>
            </div>

        </div>

    </div>
 
    <hr />

 


    <?php } ?>
    <?php }?>
    <?php }?>
    </div>


    </div>
    </div>
    </div>


    <?php if($user['PRIVATE_PROFILE'] == "0") {
    
    $stmt3 = $mysqli->query("SELECT * FROM PRODUCT WHERE OWNED_BY = '{$id}' AND PRODUCT_STATUS = 1;");
    $product = mysqli_fetch_array($stmt3);

    ?>
    <?php if($user['USER_TYPE_ID'] == "2") {
    

    ?>
    <div id="profile-2" class="container profile profile-view" data-aos="fade-up" data-aos-duration="450" >
        <div class="row profile-row" style="background: rgba(255,255,255,0.37); margin-bottom:100px">
            <div class="col-md-8 col-xxl-12">
                <h1>MY LISTED PPRODUCTS</h1>


                <hr />
                <script>
                document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');
                </script>
           

            
            </div>
            </div>

    <?php }?>

<?php while($product = mysqli_fetch_array($stmt3)) { ?>

    <?php if($user['USER_TYPE_ID'] == "2"){
    

    ?>
    <div class="row">
    <div class="col-md-8 col-xxl-12">


                <hr />
                <script>
                document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');


                </script>
           

            
            </div>


    </div>

    <hr />

 
  

    <?php } ?>
    <?php }?>
    <?php }?>

    



    <?php 
    if($user['PRIVATE_PROFILE'] == "0") 
    { 
    include('assets/codeSnippets/footer.php'); 
    }
    ?>
    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>