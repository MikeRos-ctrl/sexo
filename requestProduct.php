<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include('assets/codeSnippets/header.php');

    $cookie_name = "user";
    $stmt = $mysqli->query("SELECT * FROM USERS WHERE EMAIL = '{$_COOKIE[$cookie_name]}';");
    $users = mysqli_fetch_array($stmt);
    $username_id = $users['USERNAME_ID'];


    ?>
    <title>REQUEST PRODUCT</title>

</head>

<body>

    <?php include('assets/codeSnippets/navbar.php'); ?>

    <script>
        var idxd = 17546960;

        $(document).ready(function() {
            // Add change event listener to the select element
            $('#phpCategoryId').change(function() {
                // Get the selected option
                var selectedOption = $(this).find(':selected');

                // Get and log the 'xd' attribute value
                var xdValue = selectedOption.attr('xd');
                //console.log('xd value:', xdValue);
                idxd = xdValue
            });

            // Your existing code for the requestProduct function...
        });

        function requestProduct() {

            parametros = new FormData(document.getElementById('requestProduct'));

            var phpCategoryId = $('#phpCategoryId').val();
            parametros.append('phpCategoryId', phpCategoryId);

            parametros.append('REFLOW', idxd);



            var phpOwnedById = $('#phpOwnedById').val();
            parametros.append('phpOwnedById', phpOwnedById);


            // var e = document.getElementById("phpCategoryId");
            //var phpCategoryId = e.value;


            if ($('#phpAuction').is(":checked")) {
                parametros.append('phpAuction', '1');
            } else {
                parametros.append('phpAuction', '0');
            }

            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: 'assets/phpEngine/addProduct.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                contentType: false,
                processData: false,
                beforeSend: function() {
                    //$("#registerFormresultado").html("Procesando, espere por favor...");
                },
                success: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your product has been requested',
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
    </script>

    <div id="profile-2" class="container profile profile-view" data-aos="fade-up" data-aos-duration="450">
        <div class="row">
            <div class="col-md-12 alert-col relative">

            </div>
        </div>

        <form id="requestProduct" enctype="multipart/form-data">
            <div class="row profile-row" style="background: rgba(255,255,255,0.37); margin-bottom:130px">
                <div class="col-md-8 col-xxl-12">
                    <h1>REQUEST PRODUCT</h1>

                    <hr />

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <input class="form-control" disabled required value="<?php echo $username_id ?>" type="hidden" name="phpOwnedById" id="phpOwnedById" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Product Name</label><input class="form-control" required type="text" name="phpProductTitle" /></div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Product Description</label><input class="form-control" required type="text" name="phpProductDescription" /></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Product Price</label><input class="form-control" required type="number" name="phpProductPrice" minlength="1" maxlength="3" /></div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" id="phpAuction" type="checkbox" value="1" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Auction
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    <select id="phpCategoryId" class="form-select" aria-label="Default select example" style="margin-bottom: 20px;">
                        <?php

                        $stmt2 = $mysqli->query("SELECT * FROM CATEGORIES WHERE ISACTIVE = 1;");
                        $categories = mysqli_fetch_array($stmt2);

                        ?>
                        <option xd="<?php echo $categories['REFLOW_ID'] ?>" value="<?php echo $categories['CATEGORY_ID'] ?>"><?php echo $categories['CATEGORY_DESCRIPTION'] ?></option>

                        <?php while ($categories = mysqli_fetch_array($stmt2)) { ?>
                            <option xd="<?php echo $categories['REFLOW_ID'] ?>" value="<?php echo $categories['CATEGORY_ID'] ?>"><?php echo $categories['CATEGORY_DESCRIPTION'] ?></option>
                        <?php } ?>
                    </select>


                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <label class="form-check-label" for="flexRadioDefault2">Select Product Picture:</label>
                            <input type="file" id="phpImage" name="phpImage" required><br>
                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <label class="form-check-label" for="flexRadioDefault2">Select Product Video:</label>
                            <input type="file" id="phpVideo" name="phpVideo" required><br>
                        </div>
                    </div>
                    <br>


                    <hr />
                    <div class="row">
                        <div class="col-md-12 content-right" style="margin-bottom: 19px;">
                            <p><a class="btn btn-primary hero-button plat" role="button" onclick="requestProduct()">REQUEST</a></p>

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