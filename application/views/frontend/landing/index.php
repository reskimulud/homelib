<!-- END HOME -->
<?php $webInfo = web_info(); ?>
<div class="slider-area">
    <div class="hero-slider-active-1 nav-style-1 dot-style-2 dot-style-2-position-2 dot-style-2-active-black">
        <div class="single-hero-slider single-animation-wrap slider-height-2 custom-d-flex custom-align-item-center bg-img hm2-slider-bg res-white-overly-xs"
            style="background-image:url(assets/images/slider/hm-4-slider-1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-content-4 slider-animated-1">
                            <h4 class="animated">Lookbook</h4>
                            <h1 class="animated">Denim Mixed <br>Layering Combine <br>collect</h1>
                            <p class="animated">We love seeing how our Raifa wearers like to wear their Norda
                            </p>
                            <div class="btn-style-1">
                                <a class="animated btn-1-padding-1" href="product-details.html">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-hero-slider single-animation-wrap slider-height-2 custom-d-flex custom-align-item-center bg-img hm2-slider-bg res-white-overly-xs "
            style="background-image:url(assets/images/slider/hm-4-slider-2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-content-4 slider-animated-1">
                            <h4 class="animated">Lookbook</h4>
                            <h1 class="animated">Denim Mixed <br>Layering Combine <br>collect</h1>
                            <p class="animated">We love seeing how our Raifa wearers like to wear their Norda
                            </p>
                            <div class="btn-style-1">
                                <a class="animated btn-1-padding-1" href="product-details.html">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pt-115 pb-80">
    <div class="container">
        <div class="section-title-tab-wrap mb-55">
            <div class="section-title-4">
                <h2>Buku <i>Best-Seller</i></h2>
            </div>
            <div class="tab-btn-wrap-2">
                <div class="tab-style-5 nav">
                    <?php $i = 1 ?>
                    <?php foreach ($categories as $category) : ?>
                    <a class="<?= ($i == 1) ? 'active' : ''; ?>" href="#product<?= $category['id']; ?>"
                        data-toggle="tab"><?= $category['category']; ?></a>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                    <div class="btn-style-6 ml-60">
                        <a href="<?= base_url('katalog'); ?>">Semua Buku</a>
                    </div>
                </div>
            </div>
            <div class="tab-content jump mt-3">
                <?php $i = 1 ?>
                <?php foreach ($categories as $category) : ?>
                <div id="product<?= $category['id']; ?>" class="tab-pane <?= ($i == 1) ? 'active' : ''; ?>">
                    <div class="row">

                        <?php $p = 1 ?>
                        <?php foreach ($products as $product) : ?>
                        <?php if ($p <= 8) : ?>
                        <?php if ($product['category_id'] == $category['id']) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="single-product-wrap mb-35">
                                <div class="product-img product-img-zoom mb-15">
                                    <a href="product-details.html">
                                        <img src="<?= base_url('assets/img/product_thumb/small/' . $product['thumb']); ?>"
                                            alt="">
                                    </a>
                                    <div class="product-action-2 tooltip-style-2">
                                        <button title="Wishlist"><i class="icon-heart"></i></button>
                                        <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-size-fullscreen icons"></i></button>
                                    </div>
                                </div>
                                <div class="product-content-wrap-2 text-center">
                                    <div class="product-rating-wrap">
                                        <div class="product-rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star gray"></i>
                                        </div>
                                        <span>(2)</span>
                                    </div>
                                    <h3><a href="product-details.html"><?= $product['title']; ?></a></h3>
                                    <div class="product-price-2">
                                        <span>Rp. <?= number_format($product['price'], 0, ',', '.'); ?></span>
                                    </div>
                                </div>
                                <div class="product-content-wrap-2 product-content-position text-center">
                                    <div class="product-rating-wrap">
                                        <div class="product-rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star gray"></i>
                                        </div>
                                        <span>(2)</span>
                                    </div>
                                    <h3><a href="product-details.html"><?= $product['title']; ?></a></h3>
                                    <div class="product-price-2">
                                        <span>Rp. <?= number_format($product['price'], 0, ',', '.'); ?></span>
                                    </div>

                                    <?php if ($this->session->userdata('email')) : ?>
                                    <div class="pro-add-to-cart">
                                        <button title="Add to Cart" onclick="addToCart(<?= $product['id']; ?>)">Tambah
                                            ke Keranjang</button>
                                    </div>

                                    <?php else : ?>
                                    <div class="pro-add-to-cart">
                                        <a href="<?= base_url('user/cart'); ?>">
                                            <button title="Add to Cart">Tambah ke Keranjang</button>
                                        </a>
                                    </div>
                                    <?php endif; ?>


                                </div>
                            </div>
                        </div>
                        <?php $p++ ?>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach ?>


                    </div>
                </div>
                <?php $i++ ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="banner-area section-padding-2 pb-85">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-wrap mb-30">
                        <div class="banner-img banner-img-zoom">
                            <a href="product-details.html"><img src="assets/images/banner/banner-8.jpg" alt=""></a>
                        </div>
                        <div class="banner-content-9">
                            <span>new arrivals <br>women</span>
                            <h2>Minimalist <br>Blazer</h2>
                            <p>A collection in minilaist style for basic blazer</p>
                            <div class="btn-style-1">
                                <a class="btn-1-padding-3 bg-white banner-btn-res" href="product-details.html">SHOP
                                    NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-wrap mb-30">
                        <div class="banner-img banner-img-zoom">
                            <a href="product-details.html"><img src="assets/images/banner/banner-9.jpg" alt=""></a>
                        </div>
                        <div class="banner-content-10">
                            <span>mega sale</span>
                            <h2><span>50%</span> OFF <br>for Autumn</h2>
                            <p>Backpack BYORK, don’t miss out in this mage sale</p>
                            <div class="btn-style-1">
                                <a class="btn-1-padding-3 bg-white banner-btn-res" href="product-details.html">SHOP
                                    NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area">
        <div class="container">
            <div class="border-bottom-7 hm4-pb-100">
                <div class="section-title-tab-wrap mb-55">
                    <div class="section-title-4">
                        <h2>new arrivals</h2>
                    </div>
                    <div class="tab-btn-wrap-2">
                        <div class="tab-style-5 nav">
                            <?php $i = 1 ?>
                            <?php foreach ($categories as $category) : ?>
                            <a class="<?= ($i == 1) ? 'active' : ''; ?>" href="#productB<?= $category['id']; ?>"
                                data-toggle="tab"><?= $category['category']; ?></a>
                            <?php $i++ ?>
                            <?php endforeach; ?>
                            <div class="btn-style-6 ml-60">
                                <a href="<?= base_url('katalog'); ?>">Semua Buku</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content jump">
                    <?php $i = 1 ?>
                    <?php foreach ($categories as $category) : ?>
                    <div id="productB<?= $category['id']; ?>" class="tab-pane <?= ($i == 1) ? 'active' : ''; ?>">
                        <div class="row">

                            <?php $p = 1 ?>
                            <?php foreach ($products as $product) : ?>
                            <?php if ($p <= 4) : ?>
                            <?php if ($product['category_id'] == $category['id']) : ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="single-product-wrap mb-35">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="product-details.html">
                                            <img src="<?= base_url('assets/img/product_thumb/small/' . $product['thumb']); ?>"
                                                alt="">
                                        </a>
                                        <div class="product-action-2 tooltip-style-2">
                                            <button title="Wishlist"><i class="icon-heart"></i></button>
                                            <button title="Quick View" data-toggle="modal"
                                                data-target="#exampleModal"><i
                                                    class="icon-size-fullscreen icons"></i></button>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-2 text-center">
                                        <div class="product-rating-wrap">
                                            <div class="product-rating">
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star gray"></i>
                                            </div>
                                            <span>(2)</span>
                                        </div>
                                        <h3><a href="product-details.html"><?= $product['title']; ?></a></h3>
                                        <div class="product-price-2">
                                            <span>Rp. <?= number_format($product['price'], 0, ',', '.'); ?></span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap-2 product-content-position text-center">
                                        <div class="product-rating-wrap">
                                            <div class="product-rating">
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star gray"></i>
                                            </div>
                                            <span>(2)</span>
                                        </div>
                                        <h3><a href="product-details.html"><?= $product['title']; ?></a></h3>
                                        <div class="product-price-2">
                                            <span>Rp. <?= number_format($product['price'], 0, ',', '.'); ?></span>
                                        </div>

                                        <?php if ($this->session->userdata('email')) : ?>
                                        <div class="pro-add-to-cart">
                                            <button title="Add to Cart"
                                                onclick="addToCart(<?= $product['id']; ?>)">Tambah ke Keranjang</button>
                                        </div>

                                        <?php else : ?>
                                        <div class="pro-add-to-cart">
                                            <a href="<?= base_url('user/cart'); ?>">
                                                <button title="Add to Cart">Tambah ke Keranjang</button>
                                            </a>
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                            <?php $p++ ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endforeach ?>


                        </div>
                    </div>
                    <?php $i++ ?>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                            <div class="tab-content quickview-big-img">
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img src="assets/images/product/product-1.jpg" alt="">
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="assets/images/product/product-3.jpg" alt="">
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    <img src="assets/images/product/product-6.jpg" alt="">
                                </div>
                                <div id="pro-4" class="tab-pane fade">
                                    <img src="assets/images/product/product-3.jpg" alt="">
                                </div>
                            </div>
                            <div class="quickview-wrap mt-15">
                                <div class="quickview-slide-active nav-style-6">
                                    <a class="active" data-toggle="tab" href="#pro-1"><img
                                            src="assets/images/product/quickview-s1.jpg" alt=""></a>
                                    <a data-toggle="tab" href="#pro-2"><img src="assets/images/product/quickview-s2.jpg"
                                            alt=""></a>
                                    <a data-toggle="tab" href="#pro-3"><img src="assets/images/product/quickview-s3.jpg"
                                            alt=""></a>
                                    <a data-toggle="tab" href="#pro-4"><img src="assets/images/product/quickview-s2.jpg"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                            <div class="product-details-content quickview-content">
                                <h2>Simple Black T-Shirt</h2>
                                <div class="product-ratting-review-wrap">
                                    <div class="product-ratting-digit-wrap">
                                        <div class="product-ratting">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        </div>
                                        <div class="product-digit">
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    <div class="product-review-order">
                                        <span>62 Reviews</span>
                                        <span>242 orders</span>
                                    </div>
                                </div>
                                <p>Seamlessly predominate enterprise metrics without performance based process
                                    improvements.</p>
                                <div class="pro-details-price">
                                    <span class="new-price">$75.72</span>
                                    <span class="old-price">$95.72</span>
                                </div>
                                <div class="pro-details-color-wrap">
                                    <span>Color:</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li><a class="dolly" href="#">dolly</a></li>
                                            <li><a class="white" href="#">white</a></li>
                                            <li><a class="azalea" href="#">azalea</a></li>
                                            <li><a class="peach-orange" href="#">Orange</a></li>
                                            <li><a class="mona-lisa active" href="#">lisa</a></li>
                                            <li><a class="cupid" href="#">cupid</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size:</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="#">XS</a></li>
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <span>Quantity:</span>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                    </div>
                                </div>
                                <div class="product-details-meta">
                                    <ul>
                                        <li><span>Categories:</span> <a href="#">Woman,</a> <a href="#">Dress,</a>
                                            <a href="#">T-Shirt</a>
                                        </li>
                                        <li><span>Tag: </span> <a href="#">Fashion,</a> <a href="#">Mentone</a> , <a
                                                href="#">Texas</a></li>
                                    </ul>
                                </div>
                                <div class="pro-details-action-wrap">
                                    <div class="pro-details-add-to-cart">
                                        <a title="Add to Cart" onclick="addToCart(<?= $product['id']; ?>)" href="#">Add
                                            To Cart </a>
                                    </div>
                                    <div class="pro-details-action">
                                        <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                        <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                                        <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                        <div class="product-dec-social">
                                            <a class="facebook" title="Facebook" href="#"><i
                                                    class="icon-social-facebook"></i></a>
                                            <a class="twitter" title="Twitter" href="#"><i
                                                    class="icon-social-twitter"></i></a>
                                            <a class="instagram" title="Instagram" href="#"><i
                                                    class="icon-social-instagram"></i></a>
                                            <a class="pinterest" title="Pinterest" href="#"><i
                                                    class="icon-social-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->