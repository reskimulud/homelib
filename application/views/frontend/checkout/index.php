<?php 

$webInfo = web_info();

?>

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
                <li class="active">Checkout </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-main-area pt-120 pb-120">
    <div class="container">
        <div class="customer-zone mb-20">
            <p class="cart-page-title">Anda memiliki kupon? <a class="checkout-click3" href="#">Tekan untuk memasukan
                    kupon</a></p>
            <div class="checkout-login-info3">
                <form action="#">
                    <input type="text" placeholder="Coupon code">
                    <input type="submit" value="Apply Coupon">
                </form>
            </div>
        </div>
        <div class="checkout-wrap pt-30">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <?php $city_id = 0 ?>
                        <?php foreach ($addresses as $address) : ?>
                        <?php $city_id = $address['city_id'] ?>
                        <?php if ($user['address_id'] == $address['id']) : ?>
                        <div class="col-md">
                            <div class="card <?= ($user['address_id'] == $address['id']) ? 'border-success' : ''; ?>"
                                style="width: 18rem;">
                                <div class="card-header">
                                    <h4>Alamat Pengiriman</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $address['receiver']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        +62<?= $address['phone']; ?>
                                    </h6>
                                    <p class="card-text" id="shipping_address">
                                        <?= $address['address']; ?><br><?= $address['sub_districts']; ?><br><?= $address['city_name']; ?><br><?= $address['postal']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>

                        <div class="col-md">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    <h4>Ekspedisi</h4>
                                </div>
                                <div class="card-body row">
                                    <div class="col-3">
                                        <img src="<?= base_url('assets/img/jne.png'); ?>" width="60px" alt="">
                                    </div>
                                    <div class="col-9">
                                        <h5 class="card-title">Pengimiran dengan JNE</h5>
                                        <small>*Buku dikirim langsung dari Suplier (Jakarta Barat)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="your-order-area">
                        <h3>Pesanan Anda</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-info-wrap">
                                <div class="your-order-info">
                                    <ul>
                                        <li>Buku <span>Total</span></li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <?php 
                                    
                                    $subTotal   = 0;
                                    $weight     = 0;
                                    
                                    ?>
                                    <ul>
                                        <?php foreach ($products as $product) : ?>
                                        <?php $weight += $product['weight'] * $product['qty'] ?>
                                        <li><?= $product['title']; ?> <b>X <?= $product['qty']; ?></b>
                                            <?php $total = $product['price'] * $product['qty'] ?>
                                            <span>Rp. <?= number_format($total, 0, ',', '.'); ?> </span>
                                        </li>
                                        <?php $subTotal += $total ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="your-order-info order-subtotal">
                                    <ul>
                                        <li>Subtotal <span>Rp. <?= number_format($subTotal, 0, ',', '.'); ?> </span>
                                        </li>
                                    </ul>
                                </div>

                                <?php 
                
                                // API
                                $url        = 'https://api.rajaongkir.com/starter/cost';
                                $header     = ['key: 12f7bb3d216d18280b421a0cd0c3c7ef'];
                                $postField  = ['origin' => 151, 'destination' => $city_id, 'weight' => $weight, 'courier' => 'jne'];

                                $request    = $this->api->post($url, $postField, $header);
                                
                                if (isset($request['error'])) {

                                    $shipment = ['value' => 20000, 'etd' => '<b class="text-danger">API terputus</b>'];
                                } else {

                                    $shipment   = $request['rajaongkir']['results'][0]['costs'][1]['cost'][0];
                                }
                                
                                
                                ?>

                                <div class="your-order-info order-shipping">
                                    <ul>
                                        <li>Pengiriman <span>Rp.
                                                <?= number_format($shipment['value'], 0, ',','.'); ?></span>
                                        </li>
                                        <li class="float-right"><small>Estimasi : <?= $shipment['etd']; ?> hari</small>
                                        </li>
                                    </ul>
                                </div>
                                <div class="your-order-info order-total">
                                    <?php $total = $subTotal + $shipment['value']; ?>
                                    <div class="d-none" id="total-fee"><?= $total; ?></div>
                                    <ul>
                                        <li>Total <span>Rp.
                                                <?= number_format($total, 0, ',', '.'); ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <form action="<?= base_url('checkout/order'); ?>" id="order-form" method="POST">
                                    <?php $i = 1 ?>
                                    <?php foreach ($payments as $payment) : ?>
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_<?= $i; ?>" class="input-radio" type="radio"
                                            value="<?= $payment['id']; ?>" name="method_id"
                                            <?= ($i == 1) ? 'checked' : ''; ?>>
                                        <label for="payment_method_<?= $i; ?>"><img
                                                src="<?= base_url('assets/img/product_payment/') . $payment['icon']; ?>"
                                                height="30px" alt=""></label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Metode pembayaran dengan <b><?= $payment['method']; ?></b></p>
                                        </div>
                                    </div>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                </form>
                            </div>
                        </div>

                        <?php if (isset($_GET['idC'])) : ?>
                        <div id="idC" class="d-none"><?= $_GET['idC']; ?></div>
                        <?php endif; ?>

                        <div class="Place-order" id="place-order">
                            <a href="">Buat Pesanan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>