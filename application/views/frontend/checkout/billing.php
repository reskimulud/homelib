<?php 

$webInfo = web_info();

?>

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<?php if (validation_errors()) : ?>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
<?php endif; ?>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>

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
                <li class="active">Tagihan #<?= $transaction['transaction_number']; ?> </li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-main-area pt-20 pb-120">
    <div class="container">
        <h1>Tagihan #<?= $transaction['transaction_number']; ?></h1>
        <div class="card d-flex align-items-center my-5">
            <div class="card-body">
                <h4 class="text-danger">Lakukan konfirmasi sebelum :
                    <?= date('d F Y H:i', ($transaction['date_created'] + (3600 * 24))); ?>
                </h4>
            </div>
        </div>
        <p>
            <b>Transaksi anda telah berhasil dibuat!,</b> silahkan lakukan konfirmasi pembayaran untuk melanjutkan
            transaksi.
            Jumlah yang harus dibayar sebesar <b>Rp. <?= number_format($transaction['total_fee'], 0, ',', '.'); ?></b>.
            Lakukan pembayaran via <b><?= $transaction['method']; ?></b> <img
                src="<?= base_url('assets/img/product_payment/') . $transaction['icon']; ?>" height="50px" alt=""> ke
            No.
            Rekening <b><?= $method['number']; ?></b>
            paling lambat tanggal <b><?= date('d F Y H:i', ($transaction['date_created'] + (3600 * 24))); ?></b>
        </p>
        <div class="row d-flex justify-content-around align-items-center my-5">
            <div class="card p-3">
                <div class="card-body">
                    <div class="d-flex justify-content-lg-around align-items-lg-center"><img
                            src="<?= base_url('assets/img/product_payment/' . $transaction['icon']); ?>" height="100px"
                            alt="">
                        <h2 class="ml-3 my-2"><?= $transaction['method']; ?></h2>
                    </div>
                    <div class="text-center">
                        <h4>No. <?= $method['number']; ?></h4>
                        <h4>an. <?= $method['account_holder']; ?></h4>
                        <h4>Rp. <?= number_format($transaction['total_fee'], 0, ',', '.'); ?></h4>
                    </div>
                    <div class="text-center">
                        <a href="<?= base_url('checkout/confirm/' . $transaction['transaction_number']); ?>">
                            <button class="btn btn-danger">Konfirmasi Pembayaran</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>