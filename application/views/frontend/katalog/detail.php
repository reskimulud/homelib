<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?= base_url(); ?>">Home</a>
                </li>
                <li>
                    <a href="<?= base_url('katalog'); ?>">Katalog</a>
                </li>
                <li class="active"><?= $title; ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="product-details-area pt-120 pb-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-fixed-img">
                    <div class="easyzoom-style">
                        <div class="easyzoom easyzoom--overlay">
                            <a href="<?= base_url('assets/img/product_thumb/large/') . $product['thumb']; ?>">
                                <img src="<?= base_url('assets/img/product_thumb/medium/') . $product['thumb']; ?>"
                                    alt="">
                            </a>
                        </div>
                        <a class="easyzoom-pop-up img-popup"
                            href="<?= base_url('assets/img/product_thumb/large/') . $product['thumb']; ?>"><i
                                class="icon-size-fullscreen"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content pro-details-content-mrg">
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
                            <span>Terjual: <?= $product['sold']; ?></span>
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
                            <input class="cart-plus-minus-box" id="qtybutton" type="text" name="qtybutton" value="1">
                        </div>
                    </div>
                    <div class="product-details-meta">
                        <ul>
                            <li><span>Kategori:</span> <?= $product['category']; ?></li>
                        </ul>
                    </div>
                    <input type="hidden" id="product-id" value="<?= $product['id']; ?>">
                    <form action="<?= base_url('checkout'); ?>" method="post" id="purchase-now"></form>
                    <div class="pro-details-action-wrap mb-1">
                        <div class="pro-details-add-to-cart mr-2">
                            <a title="Purchase Now" href="" id="click-purchase">Pesan Sekarang</a>
                        </div>
                    </div>

                    <div class="pro-details-action-wrap">
                        <div class="pro-details-add-to-cart">
                            <a title="Add to Cart" id="addToCartProduct">Tambah
                                ke Keranjang</a>
                        </div>
                        <div class=" pro-details-action">
                            <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-wrapper pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dec-review-topbar nav mb-45">
                    <a class="active" data-toggle="tab" href="#des-details4">Rating dan Ulasan</a>
                </div>
                <div class="tab-content dec-review-bottom">
                    <div id="des-details4" class="tab-pane active">
                        <div class="review-wrapper">
                            <h2>1 ulasan untuk <?= $product['title']; ?></h2>
                            <div class="single-review">
                                <div class="review-img">
                                    <img src="assets/images/product-details/client-1.png" alt="">
                                </div>
                                <div class="review-content">
                                    <div class="review-top-wrap">
                                        <div class="review-name">
                                            <h5><span>John Snow</span> - March 14, 2019</h5>
                                        </div>
                                        <div class="review-rating">
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                        </div>
                                    </div>
                                    <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna
                                        molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam
                                        egestas libero ac turpis pharetra, in vehicula lacus scelerisque</p>
                                </div>
                            </div>
                        </div>
                        <div class="ratting-form-wrapper">
                            <span>Add a Review</span>
                            <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                            <div class="ratting-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <label>Name <span>*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <label>Email <span>*</span></label>
                                                <input type="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="star-box-wrap">
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style mb-20">
                                                <label>Your review <span>*</span></label>
                                                <textarea name="Your Review"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit">
                                                <input type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related-product pb-115">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>Produk Terkait</h2>
        </div>
        <div class="related-product-active">
            <?php foreach ($products as $produc) : ?>
            <?php if ($produc['title'] != $product['title']) : ?>
            <div class="product-plr-1">
                <div class="single-product-wrap">
                    <div class="product-img product-img-zoom mb-15">
                        <a href="<?= base_url('katalog/detailproduk/' . $produc['id']); ?>">
                            <img src="<?= base_url('assets/img/product_thumb/small/') . $produc['thumb']; ?>" alt="">
                        </a>
                        <div class="product-action-2 tooltip-style-2">
                            <button title="Wishlist"><i class="icon-heart"></i></button>
                            <button title="Quick View" data-toggle="modal"
                                data-target="#exampleModal<?= $produc['id']; ?>"><i
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
                                href="<?= base_url('katalog/detailproduk/' . $produc['id']); ?>"><?= $produc['title']; ?></a>
                        </h3>
                        <div class="product-price-2">
                            <span>RP. <?= number_format($produc['price'], 0, ',', '.'); ?></span>
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
                        <h3><a href="product-details.html"><?= $produc['title']; ?></a></h3>
                        <div class="product-price-2">
                            <span>RP. <?= number_format($produc['price'], 0, ',', '.'); ?></span>
                        </div>
                        <div class="pro-add-to-cart">
                            <button title="Add to Cart">Tambah ke Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php foreach ($products as $produc) : ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $produc['id']; ?>" tabindex="-1" role="dialog">
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
                                <img src="<?= base_url('assets/img/product_thumb/small/') . $produc['thumb']; ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                        <div class="product-details-content quickview-content">
                            <h2><?= $produc['title']; ?></h2>
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
                            <p><?= $produc['product_desc']; ?></p>
                            <div class="pro-details-price">
                                <span class="new-price">Rp. <?= number_format($produc['price'], 0, ',', '.'); ?></span>
                                <!-- <span class="old-price">$95.72</span> -->
                            </div>
                            <div class="pro-details-size">
                                <span>Berat:</span>
                                <div class="pro-details-size-content">
                                    <?= ($produc['weight'] >= 1000) ? $produc['weight'] * 0.001 . 'kg' : $produc['weight'] . 'gram'; ?>
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
                                    <li><span>Kategoti:</span> <?= $produc['category']; ?></li>
                                </ul>
                            </div>
                            <div class="pro-details-action-wrap">
                                <div class="pro-details-add-to-cart">
                                    <a title="Add to Cart" href="#">Tambah ke Keranjang</a>
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