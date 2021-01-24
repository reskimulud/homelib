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
                                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                                <button title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModal<?= $product['id']; ?>"><i
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
                                            <div class="pro-add-to-cart">
                                                <button title="Add to Cart" onclick="addToCart(<?= $product['id']; ?>)"
                                                    class="addToCart">Tambah ke
                                                    Keranjang</button>
                                            </div>
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
                                            <div class="product-list-quickview">
                                                <button title="Quick View" data-toggle="modal"
                                                    data-target="#exampleModal<?= $product['id']; ?>"><i
                                                        class="icon-size-fullscreen icons"></i></button>
                                            </div>
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
                                                <button title="Add To Cart" onclick="addToCart(<?= $product['id']; ?>)"
                                                    class="addToCart"><i class="icon-basket-loaded"></i></button>
                                                <button title="Wishlist"><i class="icon-heart"></i></button>
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


<?php foreach ($products as $product) : ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $product['id']; ?>" tabindex="-1" role="dialog">
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
                                <img src="<?= base_url('assets/img/product_thumb/small/') . $product['thumb']; ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                        <div class="product-details-content quickview-content">
                            <h2><?= $product['title']; ?></h2>
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
                            <p><?= $product['product_desc']; ?></p>
                            <div class="pro-details-price">
                                <span class="new-price">Rp. <?= number_format($product['price'], 0, ',', '.'); ?></span>
                                <!-- <span class="old-price">$95.72</span> -->
                            </div>
                            <div class="pro-details-size">
                                <span>Berat:</span>
                                <div class="pro-details-size-content">
                                    <?= ($product['weight'] >= 1000) ? $product['weight'] * 0.001 . 'kg' : $product['weight'] . 'gram'; ?>
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
                                    <li><span>Kategori:</span> <?= $product['category']; ?></li>
                                </ul>
                            </div>
                            <div class="pro-details-action-wrap">
                                <div class="pro-details-add-to-cart">
                                    <a title="Add to Cart" onclick="addToCart(<?= $product['id']; ?>)" class="addToCart"
                                        href="#">Tambah ke
                                        Keranjang</a>
                                </div>
                                <div class="pro-details-action">
                                    <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- Modal end -->