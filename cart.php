<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php');
    session_start();
    $iduser = $_SESSION["Id_User"];


    //traer el carrito del user
    $stmt5 = $mysqli->query("SELECT * FROM LISTS WHERE LIST_OWNER = '{$iduser}' AND IS_ACTIVE = 1;");
    $lists = mysqli_fetch_array($stmt5);

    //traer los elementos del carrito del user
    $stmt6 = $mysqli->query("SELECT * FROM LISTS_LINK WHERE LIST_ID = '{$lists['LIST_ID']}'");



    ?>
    <title>My Cart</title>

</head>

<script>
    $(document).ready(function() {

        if (isLogged == false) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You need to log in to proceed with the purchase',
                footer: '<a href="register.php">Register now!</a>'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */

                if (result.isConfirmed) {
                    window.location.href = "logIn.php";
                } else {
                    window.location.href = "logIn.php";
                }
            })
        }
    });

    function functionToRun() {
        alert('ARTICULO COMPRADO :)');
    }
</script>

<body>
    <?php include('assets/codeSnippets/navbar.php'); ?>

    <div class="container" data-aos="fade-up" data-aos-duration="500" style="margin-bottom: 200px;">
        <div class="row profile-row" style="background: rgba(255,255,255,0.37);">
            <div class="col-md-8 col-xxl-12">
                <div class="row">

                    <?php
                    while ($product = mysqli_fetch_assoc($stmt6)) {
                        //get the product given the id
                        // echo '<h3>' . $product['PRODUCT_ID'] . '</h3>';
                        $productXD = $mysqli->query("SELECT * FROM PRODUCT WHERE PRODUCT_ID = '{$product['PRODUCT_ID']}';");
                        $PRODUCTS = mysqli_fetch_array($productXD);

                        echo '<div class="col-md-4 mb-4">'; // Each product in a column of size 4
                        echo '<div class="card" style="width: 18rem;">';
                        echo '<img class="card-img-top" src="' . $PRODUCTS['IMAGE_BLOB'] . '" alt="' . $PRODUCTS['PRODUCT_TITLE'] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $PRODUCTS['PRODUCT_TITLE'] . '</h5>';
                        // echo '<p class="card-text">' . $PRODUCTS['EXCERPT'] . '</p>';
                        echo '<p class="card-price">' . $PRODUCTS['PRODUCT_PRICE'] . '</p>';

                        //<<   echo '<a onclick="addProduct(' . $PRODUCTS['PRODUCT_ID'] . ')" class="btn btn-primary">Añadir al carrito</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="functionToRun()">COMPRAR</button>

    </div>


    <?php include('assets/codeSnippets/footer.php'); ?>
    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>