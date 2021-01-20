<div class="main-wrapper">
    <?php $webInfo = web_info(); ?>
    <header class="header-area">
        <div class="header-large-device section-padding-2">
            <div class="header-top header-top-ptb-3 bg-black">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-3">
                            <div class="header-quick-contect">
                                <ul>
                                    <li><i class="icon-phone "></i> +62<?= $webInfo['telp']; ?></li>
                                    <li><i class="icon-envelope-open "></i> <?= $webInfo['email']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="header-top-right">
                                <div class="social-hm4-wrap">
                                    <span>Ikuti kami</span>
                                    <div class="social-style-1 social-style-1-white">
                                        <a href="<?= $webInfo['twitter']; ?>"><i class="icon-social-twitter"></i></a>
                                        <a href="<?= $webInfo['facebook']; ?>"><i class="icon-social-facebook"></i></a>
                                        <a href="<?= $webInfo['instagram']; ?>"><i
                                                class="icon-social-instagram"></i></a>
                                        <a href="<?= $webInfo['github']; ?>"><i class="icon-social-github"></i></a>
                                        <a href="<?= $webInfo['pinterest']; ?>"><i
                                                class="icon-social-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container-fluid">
                    <div class="border-bottom-6">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div
                                    class="main-menu main-menu-padding-1 main-menu-lh-3 main-menu-hm4 main-menu-center">
                                    <nav>
                                        <ul>
                                            <li><a class="active" href="<?= base_url(); ?>">HOME </a></li>
                                            <li><a href="<?= base_url('katalog'); ?>">KATALOG BUKU </a></li>
                                            <li><a href="contact.html">CONTACT </a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3">
                                <div class="header-action header-action-flex header-action-mrg-right pt-3">
                                    <div class="same-style-2 header-search-1">
                                        <a class="search-toggle" href="#">
                                            <i class="icon-magnifier s-open"></i>
                                            <i class="icon_close s-close"></i>
                                        </a>
                                        <div class="search-wrap-1">
                                            <form action="#">
                                                <input placeholder="Search products…" type="text">
                                                <button class="button-search"><i class="icon-magnifier"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <?php if ($this->session->userdata('email')) : ?>

                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a class="active d-flex align-content-around" href="<?= base_url('user'); ?>">
                                            <p class="d-inline mr-2">
                                                <?= $user['username']; ?></p><i class="icon-user"></i>
                                        </a>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a href="<?= base_url('user/wishlist'); ?>"><i class="icon-heart"></i><span
                                                class="pro-count black">03</span></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc header-cart">
                                        <a class="cart-active" href="#">
                                            <i class="icon-basket-loaded"></i><span class="pro-count black">02</span>
                                        </a>
                                    </div>
                                    <?php else : ?>
                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a href="<?= base_url('auth'); ?>"><i class="icon-user"></i></a>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-small-device small-device-ptb-1 border-bottom-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5">
                        <div class="mobile-logo">
                            <a href="index.html">
                                <img alt="" src="<?= base_url('assets/'); ?>images/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="header-action header-action-flex">
                            <?php if ($this->session->userdata('email')) : ?>
                            <div class="same-style-2 same-style-2-font-inc">
                                <a class="active d-flex align-content-around" href="<?= base_url('user'); ?>">
                                    <p class="d-inline mr-2">
                                        <?= $user['username']; ?></p><i class="icon-user"></i>
                                </a>
                            </div>
                            <div class="same-style-2 same-style-2-font-inc">
                                <a href="<?= base_url('user/wishlist'); ?>"><i class="icon-heart"></i><span
                                        class="pro-count black">03</span></a>
                            </div>
                            <div class="same-style-2 same-style-2-font-inc header-cart">
                                <a class="cart-active" href="#">
                                    <i class="icon-basket-loaded"></i><span class="pro-count black">02</span>
                                </a>
                            </div>
                            <div class="same-style-2 main-menu-icon">
                                <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                            </div>
                            <?php else : ?>
                            <div class="same-style-2 same-style-2-font-inc">
                                <a href="<?= base_url('auth'); ?>"><i class="icon-user"></i></a>
                            </div>
                            <div class="same-style-2 main-menu-icon">
                                <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mobile header start -->
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="clickalbe-sidebar-wrap">
            <a class="sidebar-close"><i class="icon_close"></i></a>
            <div class="mobile-header-content-area">
                <div class="header-offer-wrap-3 mobile-header-padding-border-4">
                    <p class="black">Free shipping worldwide for orders over $99 <a href="#">Learn More</a></p>
                </div>
                <div class="mobile-search mobile-header-padding-border-1">
                    <form class="search-form" action="#">
                        <input type="text" placeholder="Search here…">
                        <button class="button-search"><i class="icon-magnifier"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-padding-border-2">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="menu-item-has-children "><a href="#">shop</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><a href="#">shop layout</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">standard style</a></li>
                                            <li><a href="shop-list.html">shop list style</a></li>
                                            <li><a href="shop-fullwide.html">shop fullwide</a></li>
                                            <li><a href="shop-no-sidebar.html">grid no sidebar</a></li>
                                            <li><a href="shop-list-no-sidebar.html">list no sidebar</a></li>
                                            <li><a href="shop-right-sidebar.html">shop right sidebar</a></li>
                                            <li><a href="store-location.html">store location</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Products Layout</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">tab style 1</a></li>
                                            <li><a href="product-details-2.html">tab style 2</a></li>
                                            <li><a href="product-details-sticky.html">sticky style</a></li>
                                            <li><a href="product-details-gallery.html">gallery style </a></li>
                                            <li><a href="product-details-affiliate.html">affiliate style</a></li>
                                            <li><a href="product-details-group.html">group style</a></li>
                                            <li><a href="product-details-fixed-img.html">fixed image style </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="about-us.html">about us </a></li>
                                    <li><a href="cart.html">cart page</a></li>
                                    <li><a href="checkout.html">checkout </a></li>
                                    <li><a href="my-account.html">my account</a></li>
                                    <li><a href="wishlist.html">wishlist </a></li>
                                    <li><a href="compare.html">compare </a></li>
                                    <li><a href="contact.html">contact us </a></li>
                                    <li><a href="order-tracking.html">order tracking</a></li>
                                    <li><a href="login-register.html">login / register </a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html">blog standard </a></li>
                                    <li><a href="blog-no-sidebar.html">blog no sidebar </a></li>
                                    <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-contact-info mobile-header-padding-border-4">
                    <ul>
                        <li><i class="icon-phone "></i> +62<?= $webInfo['telp']; ?></li>
                        <li><i class="icon-envelope-open "></i> <?= $webInfo['email']; ?></li>
                        <li><i class="icon-home"></i> <?= $webInfo['address']; ?></li>
                    </ul>
                </div>
                <div class="mobile-social-icon">
                    <a class="facebook" href="<?= $webInfo['facebook']; ?>"><i class="icon-social-facebook"></i></a>
                    <a class="twitter" href="<?= $webInfo['twitter']; ?>"><i class="icon-social-twitter"></i></a>
                    <a class="pinterest" href="<?= $webInfo['pinterest']; ?>"><i class="icon-social-pinterest"></i></a>
                    <a class="instagram" href="<?= $webInfo['instagram']; ?>"><i class="icon-social-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- mini cart start -->
    <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
            <a class="cart-close" href="#"><i class="icon_close"></i></a>
            <div class="cart-content">
                <h3>Shopping Cart</h3>
                <ul>
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="#"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="#">Simple Black T-Shirt</a></h4>
                            <span> 1 × $49.00 </span>
                        </div>
                        <div class="cart-delete">
                            <a href="#">×</a>
                        </div>
                    </li>
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="#"><img src="assets/images/cart/cart-2.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="#">Norda Backpack</a></h4>
                            <span> 1 × $49.00 </span>
                        </div>
                        <div class="cart-delete">
                            <a href="#">×</a>
                        </div>
                    </li>
                </ul>
                <div class="cart-total">
                    <h4>Subtotal: <span>$170.00</span></h4>
                </div>
                <div class="cart-checkout-btn">
                    <a class="btn-hover cart-btn-style" href="<?= base_url('user/cart'); ?>">view cart</a>
                    <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
                </div>
            </div>
        </div>
    </div>