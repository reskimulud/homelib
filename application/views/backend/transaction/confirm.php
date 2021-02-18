<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
                    <?php if (validation_errors()) : ?>
                    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
                    <?php endif; ?>
                    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
                    <div class="toast" data-toast="<?= $this->session->flashdata('toast') ?>"></div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Data Kontrak User
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-responsive" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Bukti</th>
                                    <th scope="col">No. Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Dikonfirmasi?</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php $i = 1; ?>
                                <?php foreach (array_reverse($confirms) as $confirm) : ?>
                                <tr>
                                    <th class="align-middle" scope="row"><?= $i; ?></th>
                                    <td class="align-middle">
                                        <img src="<?= base_url('assets/img/transaction_confirm/' . $confirm['proof_image']); ?>"
                                            alt="" width="100px">
                                    </td>
                                    <td class="align-middle"><?= $confirm['transaction_number']; ?></td>
                                    <td class="align-middle"><?= date('d F Y', $confirm['date_created']); ?></td>
                                    <td class="align-middle">
                                        <i
                                            class="fas fa-fw <?= ($confirm['is_confirmed'] == 1) ? 'text-success fa-check-circle' : 'text-secondary fa-times-circle' ?>">
                                        </i>
                                    </td>
                                    <td class="align-middle">
                                        <?php if ($confirm['is_confirmed'] == 0) : ?>
                                        <a href="<?= base_url('transaksi/confirm/' . $confirm['transaction_number']); ?>"
                                            class="badge badge-success">
                                            <i class="fas fa-fw fa-check-circle"></i> konfirmasi
                                        </a>
                                        <?php endif; ?>
                                        <a href="" data-target="#detailConfirmModal<?= $confirm['id']; ?>"
                                            data-toggle="modal" class=" badge badge-primary" data-popup="tooltip"
                                            data-placement="top" title="Detail Konfirmasi"><i
                                                class=" fas fa-fw fa-info"></i> detail</a>
                                        <a href="<?= base_url('transaksi/deletekonfirmasi') . $confirm['id'] ?>"
                                            class=" badge badge-secondary fas del-btn" data-popup="tooltip"
                                            data-placement="top" title="Delete Data"><i
                                                class=" fas fa-fw fa-trash-alt"></i> delete</a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<?php foreach ($confirms as $confirm) : ?>
<div class="modal fade" id="detailConfirmModal<?= $confirm['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="detailConfirmModal<?= $confirm['id']; ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="detailConfirmModal<?= $confirm['id']; ?>">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6  mb-3">
                        <img src="<?= base_url('assets/img/transaction_confirm/' . $confirm['proof_image']); ?>"
                            class="img-thumbnail" alt="">
                    </div>
                    <div class="col-md-6">
                        <h3 class="mb-3">Detail transaksi</h3>
                        <p><b>No. Transaksi : </b>#<?= $confirm['transaction_number']; ?></p>
                        <p><b>User : </b><?= $confirm['name']; ?></p>
                        <p><b>Metode Pembayaran : </b><img
                                src="<?= base_url('assets/img/product_payment/' . $confirm['icon']); ?>" height="20px"
                                alt=""> (<?= $confirm['number']; ?>)</p>
                        <div class="card p-2 text-center">
                            <h4>Harga yang Harus Dibayar :
                                Rp. <?= number_format($confirm['total_fee'], 0, ',', '.'); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>