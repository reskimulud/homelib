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
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Dtambahkan oleh</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Tanggal Ditambahkan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php $i = 1; ?>
                                        <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td class="align-middle">
                                                <img width="80px"
                                                    src="<?= base_url('assets/img/product_product/small/') . $product['image']; ?>"
                                                    alt="">
                                            </td>
                                            <td class="align-middle"><?= $product['name'] ?></td>
                                            <td class="align-middle"><?= $product['title'] ?></td>
                                            <td class="align-middle"><?= date('d F Y', $product['date_added']) ?></td>
                                            <td class="align-middle">
                                                <div class="tooltip-demo">
                                                    <a href="<?= base_url('produk/deletegaleri/') . $product['id'] ?>"
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