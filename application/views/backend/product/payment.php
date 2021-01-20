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
                <div class="col-lg-12">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
                    <?php if (validation_errors()) : ?>
                    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
                    <?php endif; ?>
                    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>

                    <div class="tooltip-menu">
                        <button href="" class="btn btn-primary mb-4 " data-toggle="modal" data-target="#newPaymentModal"
                            data-popup="tooltip" data-placement="top" title="New Sub Menu">
                            <i class=" fas fa-fw fa-plus-square"></i>
                            Tambah Metode Pembayaran
                        </button>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Data Kategori Buku
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-responsive" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nomor</th>
                                            <th scope="col">Pemegang Akun</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php $i = 1; ?>
                                        <?php foreach ($payments as $payment) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td class="align-middle">
                                                <img width="80%px"
                                                    src="<?= base_url('assets/img/product_payment/') . $payment['icon']; ?>"
                                                    alt="">
                                            </td>
                                            <td class="align-middle"><?= $payment['method'] ?></td>
                                            <td class="align-middle"><?= $payment['number'] ?></td>
                                            <td class="align-middle"><?= $payment['account_holder'] ?></td>
                                            <td class="align-middle">
                                                <div class="tooltip-demo">
                                                    <a href="" class="badge badge-primary" data-toggle="modal"
                                                        data-target="#editPaymentModal<?= $payment['id']; ?>"
                                                        data-popup="tooltip" data-placement="top" title="Edit Data"><i
                                                            class="fas fa-fw fa-edit"></i> edit</a>
                                                    <a href="<?= base_url('produk/deletepembayaran/') . $payment['id'] ?>"
                                                        class="badge badge-secondary fas del-btn" data-popup="tooltip"
                                                        data-placement="top" title="Delete Data"><i
                                                            class="fas fa-fw fa-trash-alt"></i> delete</a>
                                                </div>
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
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="newPaymentModal" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="newPaymentModal">Tambah Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('produk/pembayaran'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="method" name="method" placeholder="Nama Metode">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="number" name="number" placeholder="Nomer Pembayaran">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="account_holder" name="account_holder"
                        placeholder="Pemegang Akun">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="icon" name="icon" accept="image/png">
                        <label class="custom-file-label" for="icon">Gambar Produk</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary editbutton"><i
                        class=" fas fa-fw fa-plus-square"></i>Tambah</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>


<?php foreach ($payments as $payment) : ?>
<div class="modal fade" id="editPaymentModal<?= $payment['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="editPaymentModal<?= $payment['id']; ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="editPaymentModal<?= $payment['id']; ?>">Edit Metode Pembayaran
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('produk/editpembayaran'); ?>
            <input type="hidden" name="id" value="<?= $payment['id']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" value="<?= $payment['method']; ?>" class="form-control" id="method" name="method"
                        placeholder="Nama Metode">
                </div>
                <div class="form-group">
                    <input type="number" value="<?= $payment['number']; ?>" class="form-control" id="number"
                        name="number" placeholder="Nomer Pembayaran">
                </div>
                <div class="form-group">
                    <input type="text" value="<?= $payment['account_holder']; ?>" class="form-control"
                        id="account_holder" name="account_holder" placeholder="Pemegang Akun">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="icon" name="icon" accept="image/png">
                        <label class="custom-file-label" for="icon">Gambar Produk</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary editbutton"><i class=" fas fa-fw fa-edit"></i>Edit</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?php endforeach; ?>