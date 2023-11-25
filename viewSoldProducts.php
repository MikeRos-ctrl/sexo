<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); 
    
    $cookie_name = "user";
    
    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
    $users = mysqli_fetch_array($stmt);
    $id = $users['USERNAME_ID'];


    $stmt2 = $mysqli->query("SELECT * FROM PRODUCT WHERE OWNED_BY = '{$id}';");
    $product = mysqli_fetch_array($stmt2);
    $product_id = $product['PRODUCT_ID'];


    $stmt3 = $mysqli->query("SELECT * FROM BUY_SELL_DETAILS WHERE PRODUCT_ID = '{$product_id}';");
    $buy_sell_details = mysqli_fetch_array($stmt3);
    $order_id = $buy_sell_details['ORDER_ID'];


    $stmt4 = $mysqli->query("SELECT * FROM BUY_SELL WHERE ORDER_ID = '{$order_id}';");
    $buy_sell = mysqli_fetch_array($stmt4);


    ?>
    <title>SOLD PRODUCTS</title>

    

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
                <h1>MY SOLD PRODUCTS</h1>


                <hr />

        <?php



            ?>

            <div class="row">
            <div class="col-md-8 col-xxl-12">
            <script>
            document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');
            </script>
            <p>AMOUNT SOLD X<?php echo $buy_sell_details['AMOUNT'] ?></p>
            <p>SOLD ON <?php echo $buy_sell['CREATION_DATE'] ?></p>
            </div>
            <hr />


            <?php

            while($buy_sell_details = mysqli_fetch_array($stmt3)) 
            {
                $order_id = $buy_sell_details['ORDER_ID'];


                $stmt4 = $mysqli->query("SELECT * FROM BUY_SELL WHERE ORDER_ID = '{$order_id}';");
                $buy_sell_details = mysqli_fetch_array($stmt3);

                ?>

                <div class="row">
                <div class="col-md-8 col-xxl-12">
                <script>
                document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');
                </script>
                <p>AMOUNT SOLD X<?php echo $buy_sell_details['AMOUNT'] ?></p>
                
                <p>SOLD ON <?php echo $buy_sell['CREATION_DATE'] ?></p>
                </div>
                <hr />

                <?php
 
            }
        ?>
           


     
    </div>



<?php while($product = mysqli_fetch_array($stmt2)) { ?>

    <div class="row">

            <?php
            $product_id = $product['PRODUCT_ID'];


            $stmt3 = $mysqli->query("SELECT * FROM BUY_SELL_DETAILS WHERE PRODUCT_ID = '{$product_id}';");
            $buy_sell_details = mysqli_fetch_array($stmt3);

            while($buy_sell_details = mysqli_fetch_array($stmt3)) 
            {

                $order_id = $buy_sell_details['ORDER_ID'];


                $stmt4 = $mysqli->query("SELECT * FROM BUY_SELL WHERE ORDER_ID = '{$order_id}';");
                $buy_sell_details = mysqli_fetch_array($stmt3);

                ?>

 
                <div class="col-md-8 col-xxl-12">
                <script>
                document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');
                </script>
                <p>AMOUNT SOLD X<?php echo $buy_sell_details['AMOUNT'] ?></p>
                
                <p>SOLD ON <?php echo $buy_sell['CREATION_DATE'] ?></p>
                </div>

                <?php
 
            }
        ?>

    <hr />
    <?php } ?>
    <div class="row">

    </div>
    <div class="row">
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