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
                        <button href="" class="btn btn-primary mb-4 " data-toggle="modal"
                            data-target="#newCategoryModal" data-popup="tooltip" data-placement="top"
                            title="New Sub Menu">
                            <i class=" fas fa-fw fa-plus-square"></i>
                            Tambah Kategori
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
                                            <th scope="col">Nama Kategori</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php $i = 1; ?>
                                        <?php foreach ($categories as $category) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td class="align-middle"><?= $category['category'] ?></td>
                                            <td>
                                                <div class="tooltip-demo">
                                                    <a href="<?= base_url('produk/deletekategori/') . $category['id'] ?>"
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
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="newCategoryModal">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('produk/kategori'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="category" name="category" placeholder="Nama Kategori">
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