<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?= base_url(); ?>">Home</a>
                </li>
                <li>
                    <a href="<?= base_url('user'); ?>"><?= $user['name']; ?></a>
                </li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>
</div>

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<?php if (validation_errors()) : ?>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
<?php endif; ?>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>

<div class="cart-main-area pt-115 pb-120">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Thumb</th>
                                    <th>Nama Buku</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $total = 0;
                                $productJSON = [];
                                $idCart = [];
                                $i = 0;
                                $productCategory    = $this->database->getProductCategory();
                                $categoryNum = 0;
                                
                                ?>

                                <?php foreach ($productCategory as $key => $category) : ?>

                                <?php if ($key <= $categoryNum) : ?>
                                <tr align="left">
                                    <td colspan="6" class="mt-3"><?= $category['category']; ?></td>
                                </tr>
                                <?php endif; ?>


                                <?php if (is_array($products) && count($products) > 0) : ?>
                                <?php foreach ($products as $key => $product) : ?>
                                <?php if ($product['category_id'] == $category['id']) : ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="<?= base_url('katalog/detailproduk/' . $product['id']); ?>"><img
                                                src="<?= base_url('assets/img/product_thumb/small/' . $product['thumb']); ?>"
                                                alt="" width="60px"></a>
                                    </td>
                                    <td class="product-name"><a
                                            href="<?= base_url('katalog/detailproduk/' . $product['id']); ?>"><?= $product['title']; ?></a>
                                    </td>
                                    <td class="product-price-cart"><span class="amount">Rp.
                                            <?= number_format($product['price'], 0, ',', '.'); ?></span></td>
                                    <td class="product-quantity pro-details-quality">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                value="<?= $product['cart']['qty']; ?>">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">Rp.
                                        <?= number_format(($product['cart']['subtotal'] * $product['cart']['qty']), 0, ',', '.'); ?>
                                    </td>
                                    <td class="product-remove">
                                        <a href="<?= base_url('user/deleteCart/' . $product['cart']['rowid']); ?>"><i
                                                class="icon_close"></i></a>
                                    </td>
                                </tr>
                                <?php if ($category) {$categoryNum++;} ?>
                                <?php 

                                $qty    = $product['cart']['qty'];
                                $total += $product['cart']['subtotal'] * $qty;
                                $productJSON[$i]['product_id']  = $product['id'];
                                $productJSON[$i]['qty']         = "$qty";

                                $idCart[$i] = $product['cart']['rowid'];
                                
                                $i++;
                                ?>
                                <?php else  : NULL; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <tr>
                                    <td colspan="6" align="center">Belum ada buku yang ditambahkan</td>
                                </tr>
                                <?php endif; ?>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="<?= base_url('katalog'); ?>">Lanjutkan Belanja</a>
                                </div>
                                <?php if (count($products) > 0) : ?>
                                <div class="cart-clear">
                                    <button>Perbarui Keranjang</button>
                                    <a href="<?= base_url('user/clearCart/' . $user['id']); ?>"
                                        class="del-btn">Bersihkan Keranjang</a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if (count($products) > 0) : ?>
                <div class="row">
                    <div class="col-lg-4 col-md-6"></div>
                    <div class="col-lg-4 col-md-6">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text" required="" name="name">
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>

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

                    <div class="col-lg-4 col-md-12">
                        <div class="grand-totall">
                            <h4 class="grand-totall-title">Total Harga <span>Rp.
                                    <?= number_format($total, 0, ',', '.'); ?></span></h4>
                            <a href="<?= base_url('checkout?idC=' . $idCart . '&p=' . $json) ?>">Lanjutkan ke
                                Checkout</a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>