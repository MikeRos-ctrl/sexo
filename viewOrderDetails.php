<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); 
    
    $cookie_name = "user";
    $id = $_GET['id'];

    
    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
    $users = mysqli_fetch_array($stmt);
    $username_id = $users['USERNAME_ID'];


    $stmt2 = $mysqli->query("SELECT * FROM BUY_SELL WHERE ORDER_ID = '{$id}';");
    $orders = mysqli_fetch_array($stmt2);


    $stmt3 = $mysqli->query("SELECT * FROM BUY_SELL_DETAILS WHERE ORDER_ID = '{$id}';");
    $order_details = mysqli_fetch_array($stmt3);

    
    $productId = $order_details['PRODUCT_ID'];


    $stmt4 = $mysqli->query("SELECT * FROM PRODUCT WHERE PRODUCT_ID = '{$productId}';");
    $product = mysqli_fetch_array($stmt4);

    ?>
    <title>VIEW ORDERS DETAILS</title>

    

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
                <h1>ORDER #<?php echo $orders['ORDER_ID'] ?></h1>
                <p>Date <?php echo $orders['CREATION_DATE'] ?></p>


                <hr />
                <script>
                document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');


                </script>
                <p>AMOUNT X<?php echo $order_details['AMOUNT'] ?></p>

            
            </div>
    </div>
    <hr />


<?php while($order_details = mysqli_fetch_array($stmt3)) { 
    
    $productId = $order_details['PRODUCT_ID'];
    $stmt4 = $mysqli->query("SELECT * FROM PRODUCT WHERE PRODUCT_ID = '{$productId}';");
    $product = mysqli_fetch_array($stmt4);

    ?>


    

    <div class="row">
     
        <div class="col-md-8 col-xxl-12">
        <script>
        document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');
        </script>
        <p>AMOUNT X<?php echo $order_details['AMOUNT'] ?></p>

        </div>



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