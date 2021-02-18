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
                <li class="active">Wishlist </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-115 pb-120">
    <div class="container">
        <h3 class="cart-page-title">Item Daftar Keinginan (wishlist)</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nama Buku</th>
                                    <th>Harga</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($wishlists as $wishlist) : ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img
                                                src="<?= base_url('assets/img/product_thumb/small/' . $wishlist['thumb']); ?>"
                                                alt="" height="80px"></a>
                                    </td>
                                    <td class="product-name"><a href="#"><?= $wishlist['title']; ?></a></td>
                                    <td class="product-price-cart"><span class="amount">Rp.
                                            <?= number_format($wishlist['price'], 0, ',', '.'); ?></span></td>
                                    <td class="product-wishlist-cart">
                                        <a onclick="addToCart(<?= $wishlist['product_id']; ?>)">tambah keranjang</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>