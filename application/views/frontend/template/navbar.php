<div class="main-wrapper">
    <?php 
    
    $webInfo = web_info(); 
    $notifications = $this->database->userNotification();

    $count = 0;

    foreach ($notifications as $notification) {
        if ($notification['is_seen'] == 0) {
            $count += 1;
        }
    }

    ?>
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
                                    <a href="<?= base_url(); ?>"><img
                                            src="<?= base_url('assets/'); ?>images/logo/logo.png" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div
                                    class="main-menu main-menu-padding-1 main-menu-lh-3 main-menu-hm4 main-menu-center">
                                    <nav>
                                        <ul>
                                            <li><a class="<?= ($this->uri->segment(1) == NULL) ? 'active' : ''; ?>"
                                                    href="<?= base_url(); ?>">HOME </a></li>
                                            <li><a class="<?= ($this->uri->segment(1) == 'katalog') ? 'active' : ''; ?>"
                                                    href="<?= base_url('katalog'); ?>">KATALOG BUKU </a></li>
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

                                    <?php $carts = $this->database->getCartByUser() ?>
                                    <?php if ($this->session->userdata('email')) : ?>

                                    <div class="same-style-2 same-style-2-font-inc dropdown">
                                        <a class="active d-flex align-content-around dropdown-toggle" href=""
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <p class="d-inline mr-2">
                                                <?= $user['username']; ?></p><i class="icon-user"></i>
                                        </a>
                                        <div class="dropdown-menu text-small" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?= base_url('user'); ?>">Profile</a>
                                            <a class="dropdown-item" href="<?= base_url('user/edit'); ?>">Edit
                                                Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-toggle="modal"
                                                data-target="#logoutModal">Logout</a>
                                        </div>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc dropdown">
                                        <a class="active d-flex align-content-around dropdown-toggle" href=""
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="icon-bell"></i>
                                            <?php if ($count > 0) : ?>
                                            <span class="pro-count black"><?= $count; ?></span>
                                            <?php endif; ?>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right text-small"
                                            aria-labelledby="dropdownMenuButton">

                                            <div class="dropdown-divider"></div>
                                            <?php foreach ($notifications as $notification) : ?>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="<?= base_url($notification['href']); ?>"
                                                        class="dropdown-item notification-item">
                                                        <div class="col">
                                                            <p><b><?= $notification['title']; ?></b></p>
                                                            <p><?= $notification['body']; ?></p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a href="<?= base_url('user/wishlist'); ?>"><i class="icon-heart"></i><span
                                                class="pro-count black">03</span></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc header-cart">
                                        <a class="cart-active" href="#">
                                            <i class="icon-basket-loaded"></i><span class="pro-count black count-cart"
                                                id="count-cart"><?= count($carts); ?></span>
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
                            <a href="<?= base_url(); ?>">
                                <img alt="" src="<?= base_url('assets/'); ?>images/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="header-action header-action-flex">
                            <?php if ($this->session->userdata('email')) : ?>
                            <div class="same-style-2 same-style-2-font-inc dropdown">
                                <a class="active d-flex align-content-around dropdown-toggle" href=""
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <p class="d-inline mr-2">
                                        <?= $user['username']; ?></p><i class="icon-user"></i>
                                </a>
                                <div class="dropdown-menu text-small" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?= base_url('user'); ?>">Profile</a>
                                    <a class="dropdown-item" href="<?= base_url('user/edit'); ?>">Edit
                                        Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">Logout</a>
                                </div>
                            </div>
                            <div class="same-style-2 same-style-2-font-inc dropdown">
                                <a class="active d-flex align-content-around dropdown-toggle" href=""
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-bell"></i>
                                    <?php if ($count > 0) : ?>
                                    <span class="pro-count black"><?= $count; ?></span>
                                    <?php endif; ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right text-small"
                                    aria-labelledby="dropdownMenuButton">

                                    <div class="dropdown-divider"></div>
                                    <?php foreach ($notifications as $notification) : ?>
                                    <div class="row dropdown-item">
                                        <div class="col">
                                            <a href="<?= base_url($notification['href']); ?>" class="notification-item">
                                                <p><b><?= $notification['title']; ?></b></p>
                                                <p class="text-wrap"><?= $notification['body']; ?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="same-style-2 same-style-2-font-inc">
                                <a href="<?= base_url('user/wishlist'); ?>"><i class="icon-heart"></i><span
                                        class="pro-count black">03</span></a>
                            </div>
                            <div class="same-style-2 same-style-2-font-inc header-cart">
                                <a class="cart-active" href="#">
                                    <i class="icon-basket-loaded"></i><span
                                        class="pro-count black count-cart"><?= count($carts); ?></span>
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
                    <p class="black"><?= $webInfo['description']; ?></p>
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
                                <a href="<?= base_url(); ?>">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="<?= base_url('katalog'); ?>">Katalog Buku</a>
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
                <h3>Keranjang Belanja</h3>
                <ul>
                    <?php 
                                
                    $total = 0;
                    $productJSON = [];
                    $idCart = [];
                    $i = 0;
                    
                    ?>

                    <?php $total = 0 ?>
                    <?php foreach ($carts as $cart) : ?>
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="<?= base_url('katalog/detailproduk/' . $cart['id']); ?>"><img
                                    src="<?= base_url('assets/img/product_thumb/small/' . $cart['thumb']); ?>" alt=""
                                    width="50px"></a>
                        </div>
                        <div class="cart-title">
                            <h4><a
                                    href="<?= base_url('katalog/detailproduk/' . $cart['id']); ?>"><?= $cart['title']; ?></a>
                            </h4>
                            <span> <?= $cart['cart']['qty']; ?> × Rp. <?= number_format($cart['price'], 0, ',', '.'); ?>
                            </span>
                        </div>
                        <div class="cart-delete">
                            <a href="<?= base_url('user/deleteCart/' . $cart['cart']['rowid']); ?>">×</a>
                        </div>
                    </li>
                    <?php 
                    
                    $total += $cart['price'] * $cart['cart']['qty'];
                    
                    $qty    = $cart['cart']['qty'];
                    $productJSON[$i]['product_id']  = $cart['id'];
                    $productJSON[$i]['qty']         = "$qty";

                    $idCart[$i] = $cart['cart']['rowid'];
                    
                    $i++;
                    ?>
                    <?php endforeach; ?>

                </ul>
                <div class="cart-total">
                    <h4>Total: <span>Rp. <?= number_format($total, 0, ',', '.'); ?></span></h4>
                </div>
                <div class="cart-checkout-btn">
                    <a class="btn-hover cart-btn-style" href="<?= base_url('user/cart'); ?>">view cart</a>

                    <?php 

                    $json   = json_encode($productJSON);
                    $json   = base64_encode($json);
                    $json   = str_replace('=', '_', $json);
                    $json   = urlencode($json);

                    $idCart   = json_encode($idCart);
                    $idCart   = base64_encode($idCart);
                    $idCart   = str_replace('=', '_', $idCart);
                    $idCart   = urlencode($idCart);
                    
                    ?>

                    <a class="no-mrg btn-hover cart-btn-style"
                        href="<?= base_url('checkout?idC=' . $idCart . '&p=' . $json) ?>">checkout</a>
                </div>
            </div>
        </div>
    </div>