<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('assets/codeSnippets/header.php');

    $cookie_name = "user";
    $product_reflow_id = $_GET['product'];

    echo ($_GET['productxdxd']);

    if (isset($_COOKIE[$cookie_name])) {
        $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
        $users = mysqli_fetch_array($stmt);
        $username_id = $users['USERNAME_ID'];
    } else {
        $username_id = 0;
    }


    $stmt2 = $mysqli->query("SELECT * FROM PRODUCT WHERE REFLOW_ID = '{$product_reflow_id}';");
    $product = mysqli_fetch_array($stmt2);


    $product_id = $product['PRODUCT_ID'];
    $product_owner_id = $product['OWNED_BY'];




    $stmt3 = $mysqli->query("SELECT * FROM COMMENTS WHERE PRODUCT_ID = '{$product_id}';");
    $comments = mysqli_fetch_array($stmt3);


    //$productId = $order_details['PRODUCT_ID'];


    //$stmt4 = $mysqli->query("SELECT * FROM PRODUCT WHERE PRODUCT_ID = '{$productId}';");
    //$product = mysqli_fetch_array($stmt4);

    ?>

    <script>

        function addComment() {

            var phpComment = $('#phpComment').val();
            var phpUserId = $('#phpUserId').val();
            var phpProductId = $('#phpProductId').val();

            var parametros = {
                "phpComment": phpComment,
                "phpUserId": phpUserId,
                "phpProductId": phpProductId
            };


            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: 'assets/phpEngine/addComment.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your comment has been sent',
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

        function addToList() {


            var e = document.getElementById("phpListId");
            var phpListId = e.value;

            var phpProductId = $('#phpProductId').val();


            var parametros = {
                "phpProductId": phpProductId,
                "phpListId": phpListId
            };


            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: 'assets/phpEngine/addProductToList.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your product has been added to the list',
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
        

        function addRating() {
            var e = document.getElementById("phpRating");
            var phpRating = e.value;

            var phpUserId = $('#phpUserId').val();
            var phpProductId = $('#phpProductId').val();


            var parametros = {
                "phpProductId": phpProductId,
                "phpUserId": phpUserId,
                "phpRating": phpRating

            };


            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: 'assets/phpEngine/addRating.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your product has been rated',
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


        function updateRating() {
            var e = document.getElementById("phpRating");
            var phpRating = e.value;

            var phpUserId = $('#phpUserId').val();
            var phpProductId = $('#phpProductId').val();


            var parametros = {
                "phpProductId": phpProductId,
                "phpUserId": phpUserId,
                "phpRating": phpRating

            };


            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: 'assets/phpEngine/updateRating.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    //$("#resultado").html("Procesando, espere por favor...");
                },
                success: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your rating has been updated',
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

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>






    <div class="container" data-aos="fade-up" data-aos-duration="550" style="margin-top: 68px;">

        <?php if ($product['AUCTION'] == 1) {    ?>
            <h1>AUCTION PRODUCT</h1>
        <?php } ?>
        <div class="content-right" style="margin-top: 0px;">

            <?php
            $stmt6 = $mysqli->query("SELECT * FROM USERS WHERE USERNAME_ID = '{$product_owner_id}';");
            $product_owner_data = mysqli_fetch_array($stmt6);
            ?>


            <div class="col-sm-1 col-md-2">

                <a href="otherProfile.php?id=<?php echo $product_owner_id ?>"><?php echo $product_owner_data['USERNAME'] ?></a>
            </div>
            <div class="col-sm-1 col-md-0">
                <img src="<?php echo $product_owner_data['AVATAR_BLOB'] ?>" alt="avatar" width="50" height="50" />
            </div>



        </div>
        <div class="col-md-8 col-xxl-12" data-reflow-type="product" data-reflow-shoppingcart-url="./cart.php" data-reflow-category-link="./product.php?category={id}"></div>



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
                            <tr class="hotel_a">
                                <td>
                                    <div class="stars-outer">
                                        <div class="stars-inner">



                                            <?php
                                            $stmt7 = $mysqli->query("SELECT * FROM RATING WHERE PRODUCT_ID = '{$product_id}';");
                                            $rating = mysqli_fetch_array($stmt7);
                                            $rating_number = 0;
                                            $i = 1;

                                            if (!empty($rating)) {
                                                $rating_number = $rating_number + $rating['RATING'];
                                            }


                                            while ($rating = mysqli_fetch_array($stmt7)) {
                                                $rating_number = $rating_number + $rating['RATING'];
                                                $i++;
                                            }
                                            $rating_number = $rating_number / $i;
                                            ?>

                                            <input type="hidden" id="ratingNumber" value="<?php echo $rating_number ?>" disabled type="text" name="firstname" />

                                        </div>
                                    </div>
                                    <p><a><?php echo $rating_number ?> (By <?php echo $i ?> users)</a></p>

                                    <?php
                                    $stmt8 = $mysqli->query("SELECT * FROM RATING WHERE PRODUCT_ID = '{$product_id}' AND USERNAME_ID = '{$username_id}';");
                                    $has_user_rated = mysqli_fetch_array($stmt8);
                                    $stmt9 = $mysqli->query("SELECT * FROM BUY_SELL INNER JOIN BUY_SELL_DETAILS ON BUY_SELL.ORDER_ID = BUY_SELL_DETAILS.ORDER_ID WHERE BUYER_ID = '{$username_id}' AND PRODUCT_ID = '{$product_id}';");
                                    $has_user_bought = mysqli_fetch_array($stmt9);

                                    if (!empty($has_user_bought)) {
                                        if (empty($has_user_rated)) {
                                    ?>
                                            <p><a class="btn btn-secondary hero-button plat" role="button" onclick="addRating()">RATE</a></p>
                                        <?php
                                        } else {
                                        ?>

                                            <p><a id="changeRating" class="btn btn-secondary hero-button plat" role="button" onclick="updateRating()">CHANGE RATING</a></p>

                                        <?php
                                        }
                                        ?>

                                        <select id="phpRating" class="form-select fa-apply" aria-label="Default select example">
                                            <option selected="selected" value="1">&#xf005 1</option>
                                            <option value="2">&#xf005 2</option>
                                            <option value="3">&#xf005 3</option>
                                            <option value="4">&#xf005 4</option>
                                            <option value="5">&#xf005 5</option>
                                        </select>
                                    <?php

                                    }
                                    ?>








                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>



        <div class="col-sm-2 col-md-12">

            <div class="content-right" style="margin-top: 0px;">



                <p><a id="addToList" class="btn btn-primary hero-button plat" onclick="addToList()" role="button">ADD TO LIST</a></p>
            </div>

        </div>

        <div class="content-right col-md-4" style="margin-top: 28px;">
            <select id="phpListId" class="form-select" aria-label="Default select example">

                <?php

                $stmt5 = $mysqli->query("SELECT * FROM LISTS WHERE LIST_OWNER = '{$username_id}' AND IS_ACTIVE = 1;");
                $lists = mysqli_fetch_array($stmt5);

                ?>
                <option value="<?php echo $lists['LIST_ID'] ?>"><?php echo $lists['LIST_NAME'] ?></option>


                <?php while ($lists = mysqli_fetch_array($stmt5)) { ?>

                    <option value="<?php echo $lists['LIST_ID'] ?>"><?php echo $lists['LIST_NAME'] ?></option>

                <?php } ?>
            </select>
        </div>

    </div>




    <div id="profile-2" class="container profile profile-view" data-aos="fade-up" data-aos-duration="450">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>



        <form>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37); margin-bottom:130px">
                <div class="col-md-8 col-xxl-12">
                    <h1>COMMENTS</h1>


                    <hr />


                    <div class="row">
                        <div class="col-sm-12 col-md-12">


                            <!--COMMENT BEGIN-->

                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 col-lg-6">
                                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                        <div class="card-body p-4">
                                            <div class="form-outline mb-4">
                                                <input type="hidden" id="phpUserId" value="<?php echo $username_id ?>" disabled type="text" name="firstname" />
                                                <input type="hidden" id="phpProductId" value="<?php echo $product_id ?>" disabled type="text" name="firstname" />
                                                <?php
                                                if (!empty($has_user_bought)) {
                                                ?>
                                                    <input type="text" id="phpComment" class="form-control" placeholder="Type comment..." required />
                                                    <p><a class="btn btn-secondary hero-button plat" role="button" onclick="addComment()">ADD COMMENT</a></p>
                                                <?php
                                                }
                                                ?>
                                                <?php if (($product['AUCTION'] == 1) && ($username_id != 0)) {
                                                ?>
                                                    <input type="text" id="phpComment" class="form-control" placeholder="Type comment..." required />
                                                    <p><a class="btn btn-secondary hero-button plat" role="button" onclick="addComment()">ADD COMMENT</a></p>
                                                <?php } ?>
                                            </div>


                                            <?php
                                            if (!empty($comments)) {
                                            ?>

                                                <div class="card mb-4">
                                                    <div class="card-body">

                                                        <p><?php echo $comments['USER_COMMENT'] ?></p>

                                                        <?php
                                                        $comment_user_id = $comments['USERNAME_ID'];

                                                        $stmt4 = $mysqli->query("SELECT * FROM USERS WHERE USERNAME_ID = '{$comment_user_id}';");
                                                        $comment_user_details = mysqli_fetch_array($stmt4);

                                                        ?>


                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <img src="<?php echo $comment_user_details['AVATAR_BLOB'] ?>" alt="avatar" width="25" height="25" />
                                                                <a href="otherProfile.php?id=<?php echo $comment_user_id ?>"><?php echo $comment_user_details['USERNAME'] ?></a>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>



                                            <?php while ($comments = mysqli_fetch_array($stmt3)) { ?>

                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <p><?php echo $comments['USER_COMMENT'] ?></p>

                                                        <?php
                                                        $comment_user_id = $comments['USERNAME_ID'];

                                                        $stmt4 = $mysqli->query("SELECT * FROM USERS WHERE USERNAME_ID = '{$comment_user_id}';");
                                                        $comment_user_details = mysqli_fetch_array($stmt4);

                                                        ?>

                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <img src="<?php echo $comment_user_details['AVATAR_BLOB'] ?>" alt="avatar" width="25" height="25" />

                                                                <a href="otherProfile.php?id=<?php echo $comment_user_id ?>"><?php echo $comment_user_details['USERNAME'] ?></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--COMMENT END-->



                        </div>
                    </div>
                    <div class="row">

                    </div>

                    <div class="row">

                    </div>



                </div>
            </div>
        </form>
    </div>


    <script>
        const ratings = {
            hotel_a: $('#ratingNumber').val(),
        };

        // total number of stars
        const starTotal = 5;

        for (const rating in ratings) {
            const starPercentage = (ratings[rating] / starTotal) * 100;
            const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
            document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;
        }
    </script>

    <?php include('phpCookie.php'); ?>

    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>
</body>

</html>