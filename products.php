<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('assets/codeSnippets/header.php'); ?>
    <title>Our store!</title>

</head>

<body style="background: rgb(255,255,255);">

    <?php include('assets/codeSnippets/navbar.php'); ?>

    <!-- 
    <section data-aos="fade-up" data-aos-duration="350" id="carousel">
        <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item" style="background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);">
                    <div class="bg-light border rounded border-light pulse animated hero-photography carousel-hero jumbotron py-5 px-4">
                        <h1 class="hero-title">Gates made by the best FOR THE BEST</h1>
                        <p class="hero-subtitle" style="color: rgb(255,255,255);background: rgba(0,0,0,0.54);">In Pluche LITE, we are compromised to give you the best materials from our best engineers.</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="aboutUs.php">Learn more</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="bg-light border rounded border-light pulse animated hero-technology carousel-hero jumbotron py-5 px-4" style="background: url(&quot;assets/img/pexels-photo-213029.jpeg&quot;) center / cover repeat;">
                        <h1 class="hero-title">A NEW AGE OF PROTECTION</h1>
                        <p class="hero-subtitle" >Order our fences from anywhere in the world, create an account now to start shopping world-class fences.</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="register.php">SIGN UP</a></p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="bg-light border rounded border-light pulse animated hero-nature carousel-hero jumbotron py-5 px-4" style="background: url(&quot;assets/img/contact.jpg&quot;) center / cover;">
                        <h1 class="hero-title">24/7 SUPPORT</h1>
                        <p class="hero-subtitle" style="color: #ffffff;background: rgba(0,0,0,0.54);">Feel free to contact our support center at&nbsp;<br><strong>+1 555 123456</strong><br></p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="#footer" style="background: rgb(4, 143, 131);">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-bs-target="#carousel-1" data-bs-slide-to="0"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="2" class="active"></li>
            </ol>
        </div>
    </section> -->


    <h2 class="display-4 text-center" data-aos="fade-up" data-aos-duration="350" style="margin-bottom: 105px;margin-top: 76px;">OUR NEWEST ITEMS!</h2>

    <?php

    $stmt = $mysqli->query("SELECT * FROM CATEGORIES WHERE ISACTIVE = 1;");
    $categories = mysqli_fetch_array($stmt);

    echo ($categories[0]);

    //Peluches para Jovenes
    $stmt2 = $mysqli->query("SELECT * FROM PRODUCT WHERE CATEGORY = 1;");
    $products1 = mysqli_fetch_array($stmt);
    ?>
    <!-- 
    <div class="container shadow-lg" data-aos="fade-up" data-aos-duration="350" data-aos-delay="500" style="border-style: ridge;margin-top: 68px;">

        <h2 class="display-4 text-center" data-aos="fade-up" data-aos-duration="350" style="margin-bottom: 105px;margin-top: 76px;"><?php echo $categories['CATEGORY_DESCRIPTION'] ?></h2>
        
        <div data-reflow-type="product-list" data-reflow-layout="cards" data-reflow-perpage="4" data-reflow-order="date_asc" data-reflow-category="<?php echo $categories['REFLOW_ID'] ?>" 
        data-reflow-show="image,name,excerpt,price"></div>
        
        
        <div style="text-align: right;"><a class="btn btn-primary" role="button" style="margin-bottom: 15px;" href="search.php?category=<?php echo $categories['REFLOW_ID'] ?>">VIEW more +</a></div>
    </div> -->


    <?php while ($categories = mysqli_fetch_array($stmt)) { ?>


        <h5>nepe</h5>

        <!-- <div class="container shadow-lg" data-aos="fade-up" data-aos-duration="350" data-aos-delay="500" style="border-style: ridge;margin-top: 68px;">
            <h2 class="display-4 text-center" data-aos="fade-up" data-aos-duration="350" style="margin-bottom: 105px;margin-top: 76px;"><?php echo $categories['CATEGORY_DESCRIPTION'] ?></h2>
            
            <div data-reflow-type="product-list" data-reflow-layout="cards" data-reflow-perpage="4" data-reflow-order="date_asc" data-reflow-product-link="product.php?category=<?php echo $categories['REFLOW_ID'] ?>&product={id}" data-reflow-category="<?php echo $categories['REFLOW_ID'] ?>" data-reflow-show="image,name,excerpt,price">
            </div>
            
            <div style="text-align: right;"><a class="btn btn-primary" role="button" style="margin-bottom: 15px;" href="search.php?category=<?php echo $categories['REFLOW_ID'] ?>">VIEW more +</a></div>
        </div> -->

    <?php } ?>





    <?php include('assets/codeSnippets/footer.php'); ?>


    <?php include('assets/codeSnippets/footerInclude.php'); ?>

</body>

</html>