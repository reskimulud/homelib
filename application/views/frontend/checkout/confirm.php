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
                <li class="active">Konfirmasi #<?= $transaction['transaction_number']; ?> </li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-main-area pt-20 pb-120">
    <div class="container">
        <h1>Konfirmasi Pembayaran #<?= $transaction['transaction_number']; ?></h1>

        <div class="row my-5">
            <div class="col-xl-6 col-lg-8 col-md-10 ml-auto mr-auto">
                <div class="order-tracking-content">
                    <div class="order-tracking-form">
                        <form action="<?= base_url('checkout/confirm/' . $transaction['transaction_number']); ?>"
                            method="POST" enctype="multipart/form-data">
                            <p>Upload file bukti pembayaran berupa foto/screenshoot!</p>
                            <input type="hidden" name="transaction_number"
                                value="<?= $transaction['transaction_number']; ?>">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="proof_image" id="proof_image"
                                    accept="image/*" required>
                                <label class="custom-file-label" for="proof_image">Pilih file...</label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-dark btn-block">Konfirmasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>