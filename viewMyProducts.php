<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); 
    
    $cookie_name = "user";


    
    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
    $users = mysqli_fetch_array($stmt);
    $username_id = $users['USERNAME_ID'];


    if(!empty($_GET['category']))
    {
        $category = $_GET['category'];
        $stmt2 = $mysqli->query("SELECT * FROM PRODUCT WHERE OWNED_BY = '{$username_id}' AND PRODUCT_STATUS = 1 AND CATEGORY = '{$category}';");
        $product = mysqli_fetch_array($stmt2);
    }
    else
    {
        $stmt2 = $mysqli->query("SELECT * FROM PRODUCT WHERE OWNED_BY = '{$username_id}' AND PRODUCT_STATUS = 1;");
        $product = mysqli_fetch_array($stmt2);
    }



    

    ?>
    <title>VIEW LIST DETAILS</title>

    

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>
    <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3" style="background: #696969 !important;">
    <div class="container"><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-6"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div id="navcol-6" class="collapse navbar-collapse flex-grow-0 order-md-first">
            <ul class="navbar-nav me-auto">
                    <?php
                        $stmt0 = $mysqli->query("SELECT * FROM CATEGORIES WHERE ISACTIVE = 1;");
                        $categories = mysqli_fetch_array($stmt0);
                        $category_name = $categories['CATEGORY_ID'];

                    ?>
               

                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="color: rgb(255,255,255);margin-top: 0px;"><i class="fas fa-store-alt"></i>&nbsp;PRODUCTS&nbsp;</a>
                        <div class="dropdown-menu">
                        

                            <a class="dropdown-item" href="viewMyProducts.php?category=<?php echo $category_name?>"><?php echo $categories['CATEGORY_DESCRIPTION'] ?></a>

                            <?php while($categories = mysqli_fetch_array($stmt0)) { 
                            $category_name = $categories['CATEGORY_ID'];    
                            ?>
                            <a class="dropdown-item" href="viewMyProducts.php?category=<?php echo $category_name?>"><?php echo $categories['CATEGORY_DESCRIPTION'] ?></a>
                            <?php } ?>
                        </div>
                </li>

            </ul>
        </div>
    </div>
</nav>

<script>


    $(document).ready(function() {

        });

    
    function deactivateProduct(phpLinkListProductId)
    {


        var parametros = {
                "phpLinkListProductId" : phpLinkListProductId
        };


        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'assets/phpEngine/deleteProductFromList.php', //archivo que recibe la peticion
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
                    title: 'Your product has been deleted from the list',
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

        <div class="row profile-row" style="background: rgba(255,255,255,0.37); margin-bottom:100px">
            <div class="col-md-8 col-xxl-12">
                <h1>MY PRODUCTS</h1>

                <?php 
    


                ?>

                <hr />
                <script>
                document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');

                </script>
           
            </div>
    </div>

    <div class="row">
            <div class="col-sm-2 col-md-12">
                <div class="content-right" style="margin-top: 0px;">
                <table>
                <thead>
                    <tr>
                    <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if(!empty($product))
                    {
                        $product_id = $product['PRODUCT_ID'];

                        $stmt7 = $mysqli->query("SELECT * FROM RATING WHERE PRODUCT_ID = '{$product_id}';");
                        $rating = mysqli_fetch_array($stmt7);
                        $rating_number=0;
                        $i=0;

                        if(!empty($rating))
                        {
                            $rating_number = $rating_number + $rating['RATING'];
                            $i++;
                        }
                        while($rating = mysqli_fetch_array($stmt7)) 
                        { 
                            $rating_number = $rating_number + $rating['RATING'];
                            $i++;
                        }
                        if($i == 0)
                        {
                            $rating_number = 0;
                        }
                        else
                        {
                            $rating_number = $rating_number/$i;
                        }

                        ?>
                    <tr class="product<?php echo $product_id ?>">
                    <td>
                        <div class="stars-outer">
                        <div class="stars-inner">



                        
                            
                        </div>
                        </div>
                        <input type="hidden" id="<?php echo $product['REFLOW_ID'] ?>" value="<?php echo $rating_number ?>" disabled type="text" name="firstname" />
                        <p><a><?php echo $rating_number ?> (By <?php echo $i ?> users)</a></p>

                        <script>
                        const ratings = {
                        product<?php echo $product_id ?> :  <?php echo $rating_number ?>,
                        };

                        // total number of stars
                        const starTotal = 5;


                        for(const rating in ratings) {  
                        const starPercentage = (ratings[rating] / starTotal) * 100;
                        const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
                        document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
                        }
                        </script>
                        <?php } ?>

                    </td>
                    </tr>
                </tbody>
                </table>


                </div>
                </div>
            </div>

            <?php


            $stmt3 = $mysqli->query("SELECT * FROM BUY_SELL INNER JOIN BUY_SELL_DETAILS ON BUY_SELL.ORDER_ID = BUY_SELL_DETAILS.ORDER_ID WHERE PRODUCT_ID = '{$product_id}';");
            $product_purchases = mysqli_fetch_array($stmt3);
            
            if(empty($product_purchases))
            {
                ?>
                <p class="text-center" style="color: rgb(0,0,0);"><strong>&nbsp; NO PURCHASES FOUND</strong><br><br></p>
                <?php
            }
            else
            {
                ?>
                <p class="text-center" style="color: rgb(0,0,0);"><strong>&nbsp; <?php echo $product_purchases['AMOUNT'] ?> X PURCHASE ON <?php echo $product_purchases['CREATION_DATE'] ?></strong><br><br></p>
                <?php
                while($product_purchases = mysqli_fetch_array($stmt3))
                {
                    ?>
                    <p class="text-center" style="color: rgb(0,0,0);"><strong>&nbsp; <?php echo $product_purchases['AMOUNT'] ?> X PURCHASE ON <?php echo $product_purchases['CREATION_DATE'] ?></strong><br><br></p>
                    <?php
                }
            }
            ?>


    <div class="row">
        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
        <p><a class="btn btn-danger form-btn" role="button" onclick="deactivateProduct(<?php echo $product['REFLOW_ID'] ?>)">DELETE</a></p>
    </div>
    </div>
    <hr />


<?php while($product = mysqli_fetch_array($stmt2)) { 

    ?>

    <div class="row">
        <div class="col-md-8 col-xxl-12">
        <script>

        document.write('<div data-reflow-type="product" data-reflow-show="media,name,price" data-reflow-product="' + <?php echo $product['REFLOW_ID'] ?> + '"></div>');

        </script>
        </div>
    </div>


    <div class="row">
            <div class="col-sm-2 col-md-12">
                <div class="content-right" style="margin-top: 0px;">
                <table>
                <thead>
                    <tr>
                    <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $product_id = $product['PRODUCT_ID'];

                        $stmt7 = $mysqli->query("SELECT * FROM RATING WHERE PRODUCT_ID = '{$product_id}';");
                        $rating = mysqli_fetch_array($stmt7);
                        $rating_number=0;
                        $i=0;

                        if(!empty($rating))
                        {
                            $rating_number = $rating_number + $rating['RATING'];
                            $i++;
                        }
                        while($rating = mysqli_fetch_array($stmt7)) 
                        { 
                            $rating_number = $rating_number + $rating['RATING'];
                            $i++;
                        }
                        if($i == 0)
                        {
                            $rating_number = 0;
                        }
                        else
                        {
                            $rating_number = $rating_number/$i;
                        }

                        ?>
                    <tr class="product<?php echo $product_id ?>">
                    <td>
                        <div class="stars-outer">
                        <div class="stars-inner">



                        
                            
                        </div>
                        </div>
                        <input type="hidden" id="<?php echo $product['REFLOW_ID'] ?>" value="<?php echo $rating_number ?>" disabled type="text" name="firstname" />
                        <p><a><?php echo $rating_number ?> (By <?php echo $i ?> users)</a></p>

                        <script>
                        const ratings<?php echo $product_id ?> = {
                        product<?php echo $product_id ?> :  <?php echo $rating_number ?>,
                        };

                        // total number of stars


                        for(const rating in ratings<?php echo $product_id ?>) {  
                        const starPercentage = (ratings<?php echo $product_id ?>[rating] / starTotal) * 100;
                        const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
                        document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
                        }
                        </script>

                    </td>
                    </tr>
                </tbody>
                </table>


                </div>
                </div>
            </div>

            <?php


            $stmt3 = $mysqli->query("SELECT * FROM BUY_SELL INNER JOIN BUY_SELL_DETAILS ON BUY_SELL.ORDER_ID = BUY_SELL_DETAILS.ORDER_ID WHERE PRODUCT_ID = '{$product_id}';");
            $product_purchases = mysqli_fetch_array($stmt3);
            
            if(empty($product_purchases))
            {
                ?>
                <p class="text-center" style="color: rgb(0,0,0);"><strong>&nbsp; NO PURCHASES FOUND</strong><br><br></p>
                <?php
            }
            else
            {
                ?>
                <p class="text-center" style="color: rgb(0,0,0);"><strong>&nbsp; <?php echo $product_purchases['AMOUNT'] ?> X PURCHASE ON <?php echo $product_purchases['CREATION_DATE'] ?></strong><br><br></p>
                <?php
                while($product_purchases = mysqli_fetch_array($stmt3))
                {
                    ?>
                    <p class="text-center" style="color: rgb(0,0,0);"><strong>&nbsp; <?php echo $product_purchases['AMOUNT'] ?> X PURCHASE ON <?php echo $product_purchases['CREATION_DATE'] ?></strong><br><br></p>
                    <?php
                }
            }
            ?>
            
    <div class="row">
        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
            <p><a class="btn btn-danger form-btn" role="button" onclick="deactivateProduct(<?php echo $product['REFLOW_ID'] ?>)">DELETE</a></p>
        </div>
    </div>

<hr />

<?php } ?>
</div>



    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>