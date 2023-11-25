<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); 
    
    $cookie_name = "user";
    
    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
    $users = mysqli_fetch_array($stmt);
    $id = $users['USERNAME_ID'];

    $stmt2 = $mysqli->query("SELECT * FROM LISTS WHERE LIST_OWNER = '{$id}' AND IS_ACTIVE = 1;");
    $lists = mysqli_fetch_array($stmt2);


    ?>
    <title>VIEW LIST</title>

    

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>

<script>


    $(document).ready(function() {

        });

    
    function createNew()
    {
        window.location.href = "createList.php";
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
            document.write('<p><a class="btn btn-primary hero-button plat" role="button" href="viewListDetails.php?id='+ <?php echo $lists['LIST_ID']?> +'">VIEW LIST</a></p>');
        </script>
        </div>
        </div>

     
    </div>



<?php while($lists = mysqli_fetch_array($stmt2)) { ?>

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
            document.write('<p><a class="btn btn-primary hero-button plat" role="button" href="viewListDetails.php?id='+ <?php echo $lists['LIST_ID']?> +'">VIEW LIST</a></p>');

        </script>
        </div>
        </div>



    </div>
    <?php } ?>
    <div class="row">

    </div>
    <hr />
    <div class="row">
    </div>

    <div class="content-right" style="margin-top: 28px;">
    <p><a class="btn btn-danger hero-button plat" style="margin-left: 20px" role="button" href="disableList.php">DELETE LIST</a></p>
    <p><a class="btn btn-primary hero-button plat" role="button" href="createList.php">CREATE LIST</a></p>
 
    </div>


            </div>
        </div>
    </form>
</div>

    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>