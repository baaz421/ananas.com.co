<?php 
$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//echo $actual_link;
require_once "../init.php";
require "includes/controllerUserData.php";
require_once "../langs/" . $_SESSION['lang'] . ".php" ;


if($_SESSION['lang'] == "ar"){
    $langdir ='rtl';
}else{
    $langdir ='ltr';
}

?>

<!DOCTYPE html>
<html lang="en" dir="<?php //echo $langdir; ?> ltr">


<!-- molla/about.html  22 Nov 2019 10:03:51 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">    
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css"> 

    <link rel="stylesheet" href="assets/css/skins/skin-demo-14.css">
    <link rel="stylesheet" href="assets/css/demos/demo-14.css">    
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
    <!-- intltelinput links -->
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>

<body>
    <div class="page-wrapper">
    <!-- =========================header starts here======================-->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <div class="header-dropdown">
                            <a href="#">QAR</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">QAR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->

                        <div>

                                    <?php
                                    if($_SESSION['lang'] == "ar"){
                                        $langname ='<a href="?lang=en">'.$english['english'].'</a>';
                                    }else{
                                        $langname ='<a href="?lang=ar">'.$english['arabic'].'</a>';
                                    }

                                    ?>
                           &nbsp &nbsp &nbsp &nbsp<?php echo $langname; ?>
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#"><?php echo $english['quick_links']; ?></a>
                                <ul>
                                    <li><a href="tel:+97444880655"><i class="icon-phone"></i><?php echo $english['tel']; ?></a></li>
                                    <li><a href="wishlist.php"><i class="icon-heart-o"></i><?php echo $english['wishlist']; ?> <span>(3)</span></a></li>
                                    <li><a href="dashboard.php"><?php echo $english['my_accout']; ?></a></li>
                                    <li><a href="about.php"><?php echo $english['about']; ?></a></li>
                                    <li><a href="contact.php"><?php echo $english['contact']; ?></a></li>
                                <?php 
                                if(@$_SESSION['email'] == false){
                                ?>
                                    <li><a href="login.php?continue=<?php echo $actual_link; ?>"><i class="icon-user"></i><?php echo $english['login']; ?></a></li>
                                    <li><a href="signup.php"><i class="icon-user"></i><?php echo $english['signup']; ?></a></li>
                                    <?php
                                }else{ echo "Hi user";
                                    
                                }
                                ?>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="../"><?php echo $english['home']; ?></a>
                                </li>
                                <li>
                                    <a href="catagories.php" class="sf-with-ul"><?php echo $english['categories']; ?></a>
                                        <ul>
                                            <li><a href="#"><i class="icon-laptop"></i> <?php echo $english['electronics']; ?></a></li>
                                            <li><a href="#"><i class="icon-couch"></i> <?php echo $english['furniture']; ?></a></li>
                                            <li><a href="#"><i class="icon-magic"></i> <?php echo $english['accessoires']; ?></a></li>
                                            <li><a href="#"><i class="icon-tshirt"></i> <?php echo $english['clothing']; ?></a></li>
                                            <li><a href="#"><i class="icon-blender"></i> <?php echo $english['home_appliances']; ?></a></li>
                                            <li><a href="#"><i class="icon-heartbeat"></i> <?php echo $english['healthy_beauty']; ?></a></li>
                                            <li><a href="#"><i class="icon-shoe-prints"></i> <?php echo $english['shoes_boots']; ?></a></li>
                                            <li><a href="#"><i class="icon-map-signs"></i> <?php echo $english['travel_outdoor']; ?></a></li>
                                            <li><a href="#"><i class="icon-mobile-alt"></i> <?php echo $english['smart_phones']; ?></a></li>
                                            <li><a href="#"><i class="icon-tv"></i> <?php echo $english['tv_audio']; ?></a></li>
                                            <li><a href="#"><i class="icon-shopping-bag"></i> <?php echo $english['backpack_bag']; ?></a></li>
                                            <li><a href="#"><i class="icon-music"></i> <?php echo $english['musical_instruments']; ?></a></li>
                                            <li><a href="#"><i class="icon-gift"></i> <?php echo $english['gift_ideas']; ?></a></li>
                                        </ul>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul"><?php echo $english['zones']; ?></a>

                                     <div class="megamenu megamenu-sm">
                                            <div class="row no-gutters">
                                                    <div class="menu col-12 p-4">
                                                        <div class="menu-title w-100"><strong><?php echo $english['product_zone_details']; ?></strong><!-- End .menu-title -->
                                                        <ul class="w-100">
                                                            <li><a href="#" class="bg-danger text-white text-center rounded-lg border border-light mb-1"><?php echo $english['red_zone_products']; ?></a></li>
                                                            <li><a href="#" class="bg-warning text-dark text-center rounded-lg border border-light mb-1"><?php echo $english['orange_zone_products']; ?></a></li>
                                                            <li><a href="#" class="bg-success text-white text-center rounded-lg border border-light mb-1"><?php echo $english['green_zone_products']; ?></a></li>
                                                            <li>
                                                                <a href="#" class="text-white bg-primary text-center rounded-lg border border-light mb-1"><?php echo $english['completed_products_zone']; ?> </a>
                                                            </li>
                                                            <li><a href="#" class="text-white bg-info text-center rounded-lg border border-light"><?php echo $english['incompleted_products_zone']; ?></a></li>
                                                        </ul>
                                                        </div>
                                                    </div><!-- End .menu-col -->
                                                
                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu megamenu-sm -->
                                </li>
                                <li>
                                    <a href="productsvall.php"><?php echo $english['products']; ?></a>
                                </li>
                                <li>
                                    <a href="faq.php"><?php echo $english['faq']; ?></a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only"><?php echo $english['search']; ?></label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <div class="dropdown cart-dropdown">
                            <a href="cart.php" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">2</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Beige knitted elastic runner shoes</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                10 QR
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div><!-- End .product -->

                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Blue utility pinafore denim dress</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                20 QR
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="assets/images/products/cart/product-2.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div><!-- End .product -->
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span><?php echo $english['total']; ?></span>

                                    <span class="cart-total-price">30 QR</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.php" class="btn btn-primary"><?php echo $english['view_holds']; ?></a>
                                    <a href="checkout.php" class="btn btn-outline-primary-2"><span><?php echo $english['participate']; ?></span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
    <!-- =========================header close here======================-->