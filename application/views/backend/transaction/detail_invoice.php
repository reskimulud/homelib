<?php 

$webInfo = web_info();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Info:</h5>
                        Halaman ini dapat dicetak. Tekan tombol print untuk mencetak halaman ini!
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="<?= base_url('assets/images/logo-dark.png'); ?>" height="45"
                                        alt="<?= $webInfo['name']; ?>">
                                    <small class="float-right">Tanggal:
                                        <?= date('d/m/Y', $detail['date_created']); ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Dari :
                                <address>
                                    <strong><?= $webInfo['name']; ?></strong><br>
                                    <?= $webInfo['address']; ?><br>
                                    No. Telp: +62<?= $webInfo['telp']; ?><br>
                                    Email: <?= $webInfo['email']; ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Tujuan :
                                <address>
                                    <strong><?= $detail['name']; ?></strong><br>
                                    <?= $detail['shipping_address']; ?><br>
                                    No. Telp: +62<?= $detail['phone']; ?><br>
                                    Email: <?= $detail['email']; ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>No. Invoice #<?= $detail['invoice_number']; ?></b><br>
                                <br>
                                <b>No. Transaksi :</b> <?= $detail['transaction_number']; ?><br>
                                <b>Tanggal Pembayaran :</b> <?= date('d/m/Y', $detail['date_created']); ?><br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <?php $subtotalProduct = 0 ?>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Jml</th>
                                            <th>Produk</th>
                                            <th>Harga Satuan</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?= $product->qty; ?></td>
                                            <?php 
                                            
                                            $productName = $this->db->get_where('product', ['id' => $product->product_id])->row_array();
                                            
                                            ?>
                                            <td><?= $productName['title']; ?></td>
                                            <td>Rp. <?= number_format($productName['price'], 0, ',', '.'); ?></td>
                                            <?php $subtotal = $product->qty * $productName['price']; $subtotalProduct += $subtotal; ?>
                                            <td>Rp. <?= number_format($subtotal, 0, ',', '.'); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Metode Pembayaran :</p>
                                <img src="<?= base_url('assets/img/product_payment/') . $detail['icon']; ?>"
                                    height="40px" alt="<?= $detail['method']; ?>">
                                <p class="text-bold lead"><?= $detail['method']; ?></p>

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    A/C : <?= $detail['number']; ?> <br>
                                    A/N : <?= $detail['account_holder']; ?>
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Jumlah yang harus dibayar</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>Rp. <?= number_format($subtotalProduct, 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Biaya Pengiriman</th>
                                            <td>Rp.
                                                <?= number_format($detail['total_fee'] - $subtotalProduct, 0, ',', '.'); ?>
                                            </td>
                                        </tr>
                                        <tr class="table-secondary mt-1">
                                            <th>Total:</th>
                                            <th>Rp. <?= number_format($detail['total_fee'], 0, ',', '.'); ?>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print mt-4">
                            <div class="col-12">
                                <a href="<?= base_url('transaksi/print_invoice/') . $detail['id']; ?>" target="_blank"
                                    class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <a href="<?= base_url('transaksi/invoice'); ?>">
                                    <button type="button" class="btn btn-success float-right"><i
                                            class="far fa-back"></i>
                                        Kembali
                                    </button>
                                </a>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->