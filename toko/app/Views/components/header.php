<?php
$session = session();
$uri = service('uri');
?>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    hello.colorlib@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +65 11.188.888
                </div>
            </div>
            <div class="ht-right">
                <?php if ($session->get('isLoggedIn')) : ?>
                    <a href="<?= site_url('logout') ?>" class="login-panel"><i class="fa fa-user"></i>Logout ( <?= $session->get('username') ?> )</a>
                <?php else : ?>
                    <a href="<?= site_url('login') ?>" class="login-panel"><i class="fa fa-user"></i>Login</a>
                <?php endif ?>
                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="<?= base_url('fashi-master/img/flag-1.jpg') ?>" data-imagecss="flag yt" data-title="English">English</option>
                        <option value='yu' data-image="<?= base_url('fashi-master/img/flag-2.jpg') ?>" data-imagecss="flag yu" data-title="Bangladesh">German </option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="<?= base_url('fashi-master/img/logo.png') ?>" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All categories</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="<?= site_url('shop/categories/2') ?>">Women’s Clothing</a></li>
                        <li><a href="<?= site_url('shop/category/1') ?>">Men’s Clothing</a></li>
                        <li><a href="<?= site_url('shop/category/3') ?>">Kid's Clothing</a></li>
                        <!-- <li><a href="#">Underwear</a></li>
                        <li><a href="#">Brand Fashion</a></li>
                        <li><a href="#">Accessories/Shoes</a></li>
                        <li><a href="#">Luxury Brands</a></li>
                        <li><a href="#">Brand Outdoor Apparel</a></li> -->
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li <?= ($uri->getSegment(1) == '') ? 'class="active"' : '' ?>><a href="<?= site_url('/') ?>">Home</a></li>
                    <li <?= ($uri->getSegment(1) == 'shop') ? 'class="active"' : '' ?>><a href="<?= site_url('shop') ?>">Shop</a></li>
                    <!-- <li><a href="#">Collection</a>
                        <ul class="dropdown">
                            <li><a href="#">Men's</a></li>
                            <li><a href="#">Women's</a></li>
                            <li><a href="#">Kid's</a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="">Shop</a></li> -->
                    <li <?= ($uri->getSegment(1) == 'contact') ? 'class="active"' : '' ?>><a href="<?= site_url('contact') ?>">Contact</a></li>

                    <?php if ($session->get('isLoggedIn')) : ?>
                        <li <?= ($uri->getSegment(1) == 'transaction') ? 'class="active"' : '' ?>><a href="<?= site_url('transaction') ?>">Transaction</a></li>
                    <?php endif ?>
                    <!-- <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="./blog-details.html">Blog Details</a></li>
                            <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                            <li><a href="./check-out.html">Checkout</a></li>
                            <li><a href="./faq.html">Faq</a></li>
                            <li><a href="./register.html">Register</a></li>
                            <li><a href="./login.html">Login</a></li>
                        </ul>
                    </li> -->
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->