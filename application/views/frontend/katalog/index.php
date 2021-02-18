<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?= base_url(); ?>">Home</a>
                </li>
                <li class="active"><?= $title; ?></li>
            </ul>
        </div>
    </div>
</div>

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<?php if (validation_errors()) : ?>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
<?php endif; ?>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>

<div class="shop-area pt-120 pb-120">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-12">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <div class="view-mode nav">
                            <a class="active" href="#shop-1" data-toggle="tab"><i class="icon-grid"></i></a>
                            <a href="#shop-2" data-toggle="tab"><i class="icon-menu"></i></a>
                        </div>
                        <p>Showing 1 - 20 of 30 results </p>
                    </div>
                </div>

                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                <?php foreach ($products as $product) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="single-product-wrap mb-35">
                                        <div class="product-img product-img-zoom mb-15">
                                            <a href="<?= base_url('katalog/detailproduk/') . $product['id']; ?>">
                                                <img src="<?= base_url('assets/img/product_thumb/small/') . $product['thumb']; ?>"
                                                    alt="">
                                            </a>
                                            <div class="product-action-2 tooltip-style-2">
                                                <?php if ($this->session->userdata('email')) : ?>
                                                <button title="Wishlist"
                                                    onclick="addWishlist(<?= $product['id']; ?>)"><i
                                                        class="icon-heart"></i></button>
                                                <?php else : ?>
                                                <a href="<?= base_url('user/wishlist'); ?>"><button title="Wishlist"><i
                                                            class="icon-heart"></i></button></a>
                                                <?php endif; ?>
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
                                            <h3><a
                                                    href="<?= base_url('katalog/detailproduk/') . $product['id']; ?>"><?= $product['title']; ?></a>
                                            </h3>
                                            <div class="product-price-2">
                                                <span>RP. <?= number_format($product['price'], 0, ',', '.'); ?></span>
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
                                            <h3><a
                                                    href="<?= base_url('katalog/detailproduk/') . $product['id']; ?>"><?= $product['title']; ?></a>
                                            </h3>
                                            <div class="product-price-2">
                                                <span>RP. <?= number_format($product['price'], 0, ',', '.'); ?></span>
                                            </div>

                                            <?php if ($this->session->userdata('email')) : ?>
                                            <div class="pro-add-to-cart">
                                                <button title="Add to Cart"
                                                    onclick="addToCart(<?= $product['id']; ?>)">Tambah ke
                                                    Keranjang</button>
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
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div id="shop-2" class="tab-pane">
                            <?php foreach ($products as $product) : ?>
                            <div class="shop-list-wrap mb-30">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                        <div class="product-list-img">
                                            <a href="<?= base_url('katalog/detailproduk/') . $product['id']; ?>">
                                                <img src="<?= base_url('assets/img/product_thumb/small/') . $product['thumb']; ?>"
                                                    alt="Product Style">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                        <div class="shop-list-content">
                                            <h3><a
                                                    href="<?= base_url('katalog/detailproduk/') . $product['id']; ?>"><?= $product['title']; ?></a>
                                            </h3>
                                            <div class="pro-list-price">
                                                <!-- <span class="new-price">$35.45</span>
                                                <span class="old-price">$45.80</span> -->
                                                <span class="product-price-2">RP.
                                                    <?= number_format($product['price'], 0, ',', '.'); ?></span>
                                            </div>
                                            <div class="product-list-rating-wrap">
                                                <div class="product-list-rating">
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star gray"></i>
                                                    <i class="icon_star gray"></i>
                                                </div>
                                                <span>(3)</span>
                                            </div>
                                            <p><?= $product['product_desc']; ?></p>
                                            <div class="product-list-action">
                                                <?php if ($this->session->userdata('email')) : ?>
                                                <button title="Add To Cart" onclick="addToCart(<?= $product['id']; ?>)"
                                                    class="addToCart"><i class="icon-basket-loaded"></i></button>
                                                <button title="Wishlist"
                                                    onclick="addWishlist(<?= $product['id']; ?>)"><i
                                                        class="icon-heart"></i></button>

                                                <?php else : ?>
                                                <a href="<?= base_url('user/cart'); ?>"><button title="Add To Cart"
                                                        class="addToCart"><i
                                                            class="icon-basket-loaded"></i></button></a>
                                                <a href="<?= base_url('user/wishlist'); ?>"><button title="Wishlist"><i
                                                            class="icon-heart"></i></button></a>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="pro-pagination-style text-center mt-10">
                        <ul>
                            <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>