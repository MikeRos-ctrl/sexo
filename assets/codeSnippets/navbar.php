    <!-- NAVBAR SECTION -->
    <nav class="navbar navbar-light navbar-expand-md sticky-top" style="background: rgba(0,0,0,0.69);">
        <div class="container"><a class="navbar-brand" href="index.php" style="color: rgb(255,255,255);font-weight: bold;letter-spacing: 1px;border-style: double;">&nbsp;Pluche LITE&nbsp;</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">

                <ul class="navbar-nav" style="margin-left: 0px;">

                    <!-- <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse" href="index.php" style="color: rgb(255,255,255);margin-right: 0px;"><i class="fas fa-home"></i>&nbsp;HOME</a></li> -->

                    <!-- <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse" href="search.php" style="color: rgb(255,255,255);margin-right: 0px;"><i class="fas fa-search"></i>&nbsp;SEARCH</a></li> -->

                    <?php
                    $stmt0 = $mysqli->query("SELECT * FROM CATEGORIES WHERE ISACTIVE = 1;");
                    $categories = mysqli_fetch_array($stmt0);
                    $category_name = $categories['REFLOW_ID'];

                    ?>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#" style="color: rgb(255,255,255);margin-top: 0px;"><i class="fas fa-store-alt"></i>&nbsp;PRODUCTS&nbsp;</a>
                        <div class="dropdown-menu">

                            <!-- <a class="dropdown-item" href="products.php" style="background: #c2f2cc;">BROWSE ALL</a> -->

                            <a class="dropdown-item" href="search.php?category=<?php echo $category_name ?>"><?php echo $categories['CATEGORY_DESCRIPTION'] ?></a>

                            <?php while ($categories = mysqli_fetch_array($stmt0)) {
                                $category_name = $categories['REFLOW_ID'];
                            ?>
                                <a class="dropdown-item" href="search.php?category=<?php echo $category_name ?>"><?php echo $categories['CATEGORY_DESCRIPTION'] ?></a>
                            <?php } ?>
                        </div>
                    </li>


                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="pulse" href="aboutUs.php" style="color: rgb(255,255,255);margin-right: 0px;"><i class="fas fa-users"></i>&nbsp;ABOUT US</a></li>


                    <li class="nav-item" id="loginNavbar"><a class="nav-link active" data-bss-hover-animate="pulse" id="login" href="logIn.php" style="color: rgb(255,255,255);margin-right: 0px;"><i class="fas fa-key" style="color: rgb(0,240,255);"></i>&nbsp;LOG IN</a></li>


                    <li class="nav-item" id="profile"><a class="nav-link active" data-bss-hover-animate="pulse" href="profile.php" style="color: rgb(255,255,255);margin-right: 0px;"><i class="fas fa-user" style="color: rgb(0,240,255);"></i>&nbsp;PROFILE</a></li>


                    <li class="nav-item" id="cartNavbar"><a class="nav-link active" data-bss-hover-animate="pulse" href="cart.php" style="color: rgb(255,255,255);margin-right: 0px;"><i class="fas fa-shopping-cart" style="color: rgb(0,255,10);"></i>&nbsp;CART</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <?php

    include('phpCookie.php');

    ?>
    <!-- END OF NAVBAR SECTION -->