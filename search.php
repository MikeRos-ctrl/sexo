<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php');
    session_start();

    if (!empty($_GET['category'])) {
        $category = $_GET['category'];

        //echo ($category);

        //traer products of that category
        $stmt0 = $mysqli->query("SELECT * FROM PRODUCT WHERE REFLOW_ID = $category;");
        $PRODUCTS = mysqli_fetch_array($stmt0);

        // echo ($PRODUCTS['PRODUCT_TITLE']);

        // while ($PRODUCTS = mysqli_fetch_array($stmt0)) {

        //     echo "Product ID: " . $PRODUCTS['PRODUCT_ID'] . "<br>";
        //     echo "Product Name: " . $PRODUCTS['PRODUCT_TITLE'] . "<br>";
        //     // Add more fields as needed...

        //     echo "<hr>"; // Add a horizontal line to separate each product
        // }
    }

    $cookie_name = "user";
    if (isset($_COOKIE[$cookie_name])) {
        $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
        $users = mysqli_fetch_array($stmt);
        $username_id = $users['USERNAME_ID'];
        //echo ($username_id);

        $_SESSION["Id_User"] = $username_id;
    } else {
        $username_id = 0;
    }
    ?>
    <title>SEARCH</title>

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>

    <script>
        var search = "searchText";
        var category = "misc";

        $(document).ready(function() {
            $('#list-0').show();
            $('#list-1').hide();
            $('#list-2').hide();
            $('#list-3').hide();
            $('#list-4').hide();
            $('#list-5').hide();
            $('#list-6').hide();
            var search = $('#searchText').val();
        });

        function redirect() {
            window.location.href = 'search.php?search=' + search + '&' + 'category=' + category + '';

        }

        function changeSort(opt) {
            switch (opt) {
                case 0:
                    $('#list-0').show();
                    $('#list-1').hide();
                    $('#list-2').hide();
                    $('#list-3').hide();
                    $('#list-4').hide();
                    $('#list-5').hide();
                    $('#list-6').hide();
                    break;
                case 1:
                    $('#list-0').hide();
                    $('#list-1').show();
                    $('#list-2').hide();
                    $('#list-3').hide();
                    $('#list-4').hide();
                    $('#list-5').hide();
                    $('#list-6').hide();
                    break;
                case 2:
                    $('#list-0').hide();
                    $('#list-1').hide();
                    $('#list-2').show();
                    $('#list-3').hide();
                    $('#list-4').hide();
                    $('#list-5').hide();
                    $('#list-6').hide();
                    break;
                case 3:
                    $('#list-0').hide();
                    $('#list-1').hide();
                    $('#list-2').hide();
                    $('#list-3').show();
                    $('#list-4').hide();
                    $('#list-5').hide();
                    $('#list-6').hide();
                    break;
                case 4:
                    $('#list-0').hide();
                    $('#list-1').hide();
                    $('#list-2').hide();
                    $('#list-3').hide();
                    $('#list-4').show();
                    $('#list-5').hide();
                    $('#list-6').hide();
                    break;
                case 5:
                    $('#list-0').hide();
                    $('#list-1').hide();
                    $('#list-2').hide();
                    $('#list-3').hide();
                    $('#list-4').hide();
                    $('#list-5').show();
                    $('#list-6').hide();
                    break;
                case 6:
                    $('#list-0').hide();
                    $('#list-1').hide();
                    $('#list-2').hide();
                    $('#list-3').hide();
                    $('#list-4').hide();
                    $('#list-5').hide();
                    $('#list-6').show();
                    break;
                default:
            }
        }

        function addProduct(productoId) {

            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'assets/phpEngine/nepe.php',
                data: {
                    productoId: productoId,
                }
            }).done(function(data) {
                alert(data)
                console.log(data);
            }).fail(function(xhr, status, error) {
                console.log("Error status: " + status);
                console.log("Error details: " + error);
                console.log("XHR object: ", xhr);
            });



        }
    </script>

    <div id="profile-2" class="container profile profile-view" data-aos="fade-up" data-aos-duration="450">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>
        <form>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
                <div class="col-md-8 col-xxl-12">
                    <h1>Find Your Favorite</h1>

                    <hr />

                </div>
            </div>
        </form>
    </div>


    <div id="list-0" class="container profile profile-view">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>
        <form>

            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
                <div class="col-md-8 col-xxl-12">
                    <div class="row">
                        
                        <?php
                        $stmt0 = $mysqli->query("SELECT * FROM PRODUCT WHERE REFLOW_ID = $category;");
                        $count = 0; // To keep track of the number of products in the current row

                        while ($PRODUCTS = mysqli_fetch_array($stmt0)) {
                            // Open a new row every three products
                            if ($count % 3 == 0) {
                                echo '<div class="row">';
                            }

                            echo '<div class="col-md-4 mb-4">'; // Each product in a column of size 4
                            echo '<div class="card" style="width: 18rem;">';
                            echo '<img class="card-img-top" src="' . $PRODUCTS['IMAGE_BLOB'] . '" alt="' . $PRODUCTS['PRODUCT_TITLE'] . '">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $PRODUCTS['PRODUCT_TITLE'] . '</h5>';
                            // echo '<p class="card-text">' . $PRODUCTS['EXCERPT'] . '</p>';
                            echo '<p class="card-price">' . $PRODUCTS['PRODUCT_PRICE'] . '</p>';


                            echo '<a onclick="addProduct(' . $PRODUCTS['PRODUCT_ID'] . ')" class="btn btn-primary">Añadir al carrito</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';



                            $count++;

                            // Close the row every three products
                            if ($count % 3 == 0) {
                                echo '</div>';
                            }
                        }

                        // If the last row is not complete, close it
                        if ($count % 3 != 0) {
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>



            </div>
        </form>
    </div>



    <div id="list-1" class="container profile profile-view">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>
        <form>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
                <div class="col-md-8 col-xxl-12">

                    <div data-reflow-type="product-list" data-reflow-product-link="product.php?product={id}" data-reflow-show="image, name, excerpt, price, pagination" data-reflow-order="date_asc" style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"></div>

                </div>
            </div>
        </form>
    </div>




    <div id="list-2" class="container profile profile-view">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>
        <form>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
                <div class="col-md-8 col-xxl-12">

                    <div data-reflow-type="product-list" data-reflow-product-link="product.php?product={id}" data-reflow-show="image, name, excerpt, price, pagination" data-reflow-order="date_desc" style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"></div>

                </div>
            </div>
        </form>
    </div>


    <div id="list-3" class="container profile profile-view">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>
        <form>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
                <div class="col-md-8 col-xxl-12">

                    <div data-reflow-type="product-list" data-reflow-product-link="product.php?product={id}" data-reflow-show="image, name, excerpt, price, pagination" data-reflow-order="price_asc" style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"></div>

                </div>
            </div>
        </form>
    </div>



    <div id="list-4" class="container profile profile-view">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>
        <form>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
                <div class="col-md-8 col-xxl-12">

                    <div data-reflow-type="product-list" data-reflow-product-link="product.php?product={id}" data-reflow-show="image, name, excerpt, price, pagination" data-reflow-order="price_desc" style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"></div>

                </div>
            </div>
        </form>
    </div>


    <div id="list-5" class="container profile profile-view">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>
        <form>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
                <div class="col-md-8 col-xxl-12">

                    <div data-reflow-type="product-list" data-reflow-product-link="product.php?product={id}" data-reflow-show="image, name, excerpt, price, pagination" data-reflow-order="name_asc" style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"></div>

                </div>
            </div>
        </form>
    </div>


    <div id="list-6" class="container profile profile-view">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>
        <form>
            <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
                <div class="col-md-8 col-xxl-12">

                    <div data-reflow-type="product-list" data-reflow-product-link="product.php?product={id}" data-reflow-show="image, name, excerpt, price, pagination" data-reflow-order="name_desc" style="margin-top: 20px;margin-right: 10px;margin-left: 10px;padding-bottom: 40px;"></div>

                </div>
            </div>
        </form>
    </div>

    <?php include('assets/codeSnippets/footer.php'); ?>

    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>