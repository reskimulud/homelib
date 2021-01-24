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
                <li class="active"><?= $title; ?> </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-115 pb-120">
    <div class="container">
        <h3 class="cart-page-title"><?= $title; ?></h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table class="container">
                            <?php foreach ($notifications as $notification) : ?>
                            <tr>
                                <td class="product-subtotal">
                                    <div>
                                        <p><b><?= $notification['title']; ?></b></p>
                                        <p><?= $notification['body']; ?></p>
                                    </div>
                                </td>
                                <td class="product-wishlist-cart">
                                    <a href="<?= base_url('user/deletenotif/' . $notification['id']); ?>"
                                        class="del-btn">hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>