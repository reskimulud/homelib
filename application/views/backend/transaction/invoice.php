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
                                    <th scope="col">No. Invoice</th>
                                    <th scope="col">Order Oleh</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">No. Transaksi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php $i = 1; ?>
                                <?php foreach ($invoicies as $invoice) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td class="align-middle"><?= $invoice['invoice_number'] ?></td>
                                    <td class="align-middle"><?= $invoice['name']; ?></td>
                                    <td class="align-middle"><?= date('d F Y', $invoice['date_created']); ?></td>
                                    <td class="align-middle"><?= $invoice['transaction_number']; ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksi/detail_invoice/') . $invoice['id'] ?>"
                                            class=" badge badge-primary" data-popup="tooltip" data-placement="top"
                                            title="Detail Invoice"><i class=" fas fa-fw fa-info"></i> detail</a>
                                        <a href="<?= base_url('transaksi/deleteinvoice/') . $invoice['id'] ?>"
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