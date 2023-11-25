<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('assets/codeSnippets/header.php'); ?>

    <title>Welcome to Pluche LITE</title>


</head>


<body>
    
   


    <?php 
        //echo($_COOKIE["user"]);
    include('assets/codeSnippets/navbar.php'); ?>

    


    <!-- CARROUSEL SECTION -->
    <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="false" data-bs-pause="false" data-bs-wrap="false" data-bs-keyboard="false" data-aos="fade-up" data-aos-delay="350" id="carousel-1" style="background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);margin-bottom: 116px;">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);">
            <img class="w-100 d-block pulse animated" alt="Slide Image" style="background: url(&quot;assets/img/header-bg.jpg&quot;);" src="assets/img/TEDDY2.png" loading="lazy"></div>
        </div>
    </div>
     <!-- END OF CARROUSEL SECTION -->


     <!-- AS EASY AS 1 2 3 SECTION -->
    <h2 class="display-4 text-center" data-aos="fade-up" data-aos-delay="350" style="margin-bottom: 53px;">AS EASY AS 1, 2, 3...</h2>


    <!-- STEP 1 -->
    <section data-aos="fade-up" data-aos-delay="350">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-thumbnail img-fluid" src="assets/img/pexels-eduardo-dutra-2115217.jpg"></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">1 - CREATE AN ACCOUNT</h2>
                        <p style="color: rgb(125,125,125);">Sign up here to create an account so you can join our members.</p>
                        <div style="text-align: center;"><a class="btn btn-primary hero-button plat" role="button" href="login.php">SIGN UP</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- STEP 2 -->
    <section data-aos="fade-up" data-aos-delay="350">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5"><img class="img-thumbnail img-fluid" src="assets/img/pexels-andrea-piacquadio-919436.jpg"></div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <h2 class="display-4">2 - select your products</h2>
                        <p style="color: rgb(125,125,125);">In our PRODUCTS tab in the top menu, select the item and once in your CART; proceed to checkout with your preferred payment method.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- STEP 3 -->
    <section data-aos="fade-up" data-aos-delay="350">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-thumbnail img-fluid" src="assets/img/pexels-kindel-media-6868185.jpg"></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">3 - ENJOY YOUSELF</h2>
                        <p style="color: rgb(125,125,125);"> Once the package starts shipping, stay pending on your e-mail address for an update on your shipping and payment method.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section data-aos="fade-up" data-aos-delay="350" id="services" style="background: #818181;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading" style="color: rgb(255,255,255);">Services</h2>
                    <h3 class="section-subheading" style="color: rgb(255,255,255);">COMPROMISED WITH YOUR SECURITY</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-shopping-cart fa-stack-1x fa-inverse" style="color: rgb(0,255,255);"></i></span>
                    <h4 class="section-heading" style="color: rgb(255,255,255);">E-Commerce</h4>
                    <p class="section-heading" style="color: rgb(255,255,255);">Order from anywhere in the world, enter your address once you pay.</p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-star fa-stack-1x fa-inverse" style="color: rgb(255,229,0);"></i></span>
                    <h4 class="section-heading" style="color: rgb(255,255,255);">WORLD CLASS QUALITY</h4>
                    <p class="section-heading" style="color: rgb(255,255,255);">Our best engineers in charge of providing the best quality of materials to our consumers.</p>
                </div>
                <div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-lock fa-stack-1x fa-inverse" style="color: rgb(255,69,69);"></i></span>
                    <h4 class="section-heading" style="color: rgb(255,255,255);">Web Security</h4>
                    <p class="section-heading" style="color: rgb(255,255,255);">Create a safe account and use the best payment technology to assure a safe transaction.</p>

                </div>
            </div>
        </div>
    </section>
    

    <!-- <div class="container shadow-lg" data-aos="fade-up" data-aos-duration="350" data-aos-delay="500" style="background: linear-gradient(var(--bs-pink) 0%, white 23%), #ffffff;border-style: ridge;margin-top: 68px;">
        <h2 class="display-4 text-center" data-aos="fade-up" data-aos-duration="350" style="margin-bottom: 105px;margin-top: 76px;">Newest Items</h2>
        <div 
        data-reflow-type="product-list" 
        data-reflow-layout="cards" 
        data-reflow-perpage="4" 
        data-reflow-order="date_desc" 
        data-reflow-product-link="product.php?product={id}" 
        data-reflow-category="17546960" 
        data-reflow-show="image,name,excerpt,price">
        </div>
    </div>

    <div class="container shadow-lg" data-aos="fade-up" data-aos-duration="350" data-aos-delay="500" id="fences" style="border-style: ridge;margin-top: 68px;background: linear-gradient(var(--bs-cyan) 0%, #ffffff 27%), #ffffff;">
        <h2 class="display-4 text-center" data-aos="fade-up" data-aos-duration="350" style="margin-bottom: 105px;margin-top: 76px;">CHEAP AND READY</h2>
        <div 
        data-reflow-type="product-list" 
        data-reflow-layout="cards" 
        data-reflow-perpage="4" 
        data-reflow-order="price_asc" 
        data-reflow-product-link="product.php?product={id}" 
        data-reflow-show="image,name,excerpt,price">
        </div>
    </div> -->


  <!-- OFFICIAL PARTNERS -->
    <h2 class="display-4 text-center" data-aos="fade-up" data-aos-delay="350" style="margin-bottom: 130px;margin-top: 130px;">OUR&nbsp; OFFICIAL PARTNERS</h2>


     <!-- FOOTER SECTION -->
    <section data-aos="fade-up" data-aos-delay="350" class="py-5" style="margin-bottom: 0px;margin-top: 13px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3"><a><img class="img-fluid d-block mx-auto" src="assets/img/clients/creative-market.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a><img class="img-fluid d-block mx-auto" src="assets/img/clients/designmodo.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a><img class="img-fluid d-block mx-auto" src="assets/img/clients/envato.jpg"></a></div>
                <div class="col-sm-6 col-md-3"><a><img class="img-fluid d-block mx-auto" src="assets/img/clients/themeforest.jpg"></a></div>
            </div>
        </div>
    </section>


    <?php include('assets/codeSnippets/footer.php'); ?>
    <?php include('assets/codeSnippets/footerInclude.php'); ?>
</body>

</html>