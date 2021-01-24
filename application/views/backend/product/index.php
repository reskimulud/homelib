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
                        <button href="" class="btn btn-primary mb-4 " data-toggle="modal" data-target="#newProdukModal"
                            data-popup="tooltip" data-placement="top" title="Tambah Produk">
                            <i class=" fas fa-fw fa-plus-square"></i>
                            Tambah Produk
                        </button>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <ul class="nav nav-pills">
                                <?php $i = 1 ?>
                                <?php foreach ($categories as $category) : ?>
                                <li class="nav-item"><a class="nav-link <?= ($i == 1) ? 'active' : ''; ?>"
                                        href="#category<?= $category['id']; ?>"
                                        data-toggle="tab"><?= $category['category']; ?></a>
                                </li>
                                <?php $i++ ?>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                        <div class="card-body">

                            <div class="tab-content">

                                <?php $i = 1 ?>
                                <?php foreach ($categories as $category) : ?>
                                <div class="tab-pane active" id="category<?= $category['id']; ?>">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-responsive" id="dataTable" width="100%"
                                            cellspacing="0">
                                            <thead align="center">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Thumbnail</th>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Ditambahkan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody align="center">
                                                <?php $i = 1; ?>
                                                <?php foreach ($products as $product) : ?>
                                                <?php if ($product['category_id'] == $category['id']) : ?>
                                                <tr>
                                                    <th scope="row" class="align-middle"><?= $i; ?></th>
                                                    <td class="align-middle">
                                                        <img width="80px"
                                                            src="<?= base_url('assets/img/product_thumb/small/') . $product['thumb']; ?>"
                                                            alt="">
                                                    </td>
                                                    <td class="align-middle"><?= $product['title'] ?></td>
                                                    <td class="align-middle">
                                                        <?= date('d F Y', $product['date_added']) ?></td>
                                                    <td class="align-middle"><?= $product['name'] ?></td>
                                                    <td class="align-middle">
                                                        Rp. <?= number_format($product['price'], 0, ',', '.') ?></td>
                                                    <td class="align-middle">
                                                        <a href="" class="badge badge-secondary m-1"
                                                            data-target="#detailProdukModal<?= $product['id']; ?>"
                                                            data-toggle="modal" data-popup="tooltip"
                                                            data-placement="top" title="Detail Produk"><i
                                                                class="fas fa-fw fa-info"></i> detail</a>
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary btn-sm dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <div class="tooltip-demo dropdown-menu">
                                                                <?php if ($product['thumb'] == 'no_thumb.jpg') : ?>
                                                                <a href="" class="dropdown-item" data-toggle="modal"
                                                                    data-target="#newThumbModal<?= $product['id']; ?>"
                                                                    data-popup="tooltip" data-placement="top"
                                                                    title="Tambah thumb"><i
                                                                        class=" fas fa-fw fa-plus"></i>
                                                                    thumb
                                                                </a>
                                                                <?php else : ?>
                                                                <a href="" class="dropdown-item" data-toggle="modal"
                                                                    data-target="#newThumbModal<?= $product['id']; ?>"
                                                                    data-popup="tooltip" data-placement="top"
                                                                    title="Edit thumb"><i
                                                                        class=" fas fa-fw fa-edit"></i>
                                                                    edit thumb
                                                                </a>
                                                                <a href="<?= base_url('produk/deletethumb/') . $product['id']; ?>"
                                                                    class="dropdown-item del-btn" data-popup="tooltip"
                                                                    data-placement="top" title="Hapus thumb"><i
                                                                        class=" fas fa-fw fa-trash"></i>
                                                                    hapus thumb
                                                                </a>
                                                                <?php endif; ?>
                                                                <div class="dropdown-divider"></div>
                                                                <a href="" class="dropdown-item " data-toggle="modal"
                                                                    data-target="#editProdukModal<?= $product['id'] ?>"
                                                                    data-popup="tooltip" data-placement="top"
                                                                    title="Edit Data"><i class=" fas fa-fw fa-edit"></i>
                                                                    edit</a>
                                                                <a href="<?= base_url('produk/deleteproduk/') . $product['id'] ?>"
                                                                    class="dropdown-item fas del-btn"
                                                                    data-popup="tooltip" data-placement="top"
                                                                    title="Delete Data"><i
                                                                        class="fas fa-fw fa-trash-alt"></i>
                                                                    hapus item</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++ ?>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                <?php endforeach; ?>
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
<div class="modal fade" id="newProdukModal" tabindex="-1" role="dialog" aria-labelledby="newProdukModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="newProdukModal">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nama Produk">
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Deskripsi Produk" type="textarea" class="form-control" id="product_desc"
                            name="product_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="category_id" name="category_id">
                            <option disabled selected>--pilih kategori--</option>
                            <option disabled></option>

                            <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id']; ?>"><?= $category['category']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Harga">
                        <small class="text-muted">Misal: 20000</small>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Berat (gram)">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary editbutton"><i
                            class=" fas fa-fw fa-plus-square"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($products as $product) : ?>

<div class="modal fade" id="editProdukModal<?= $product['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editProdukModal<?= $product['id'] ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="editProdukModal<?= $product['id'] ?>">Edit Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('produk/editproduk'); ?>
            <input type="hidden" name="id" value="<?= $product['id']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" value="<?= $product['title']; ?>" class="form-control" id="title" name="title"
                        placeholder="Nama Produk">
                </div>
                <div class="form-group">
                    <textarea placeholder="Deskripsi Produk" type="textarea" class="form-control" id="product_desc"
                        name="product_desc"><?= $product['product_desc']; ?></textarea>
                </div>

                <div class="form-group">
                    <input type="number" value="<?= $product['price']; ?>" class="form-control" id="price" name="price"
                        placeholder="Harga">
                </div>
                <div class="form-group">
                    <input type="number" value="<?= $product['weight']; ?>" class="form-control" id="weight"
                        name="weight" placeholder="Berat (gram)">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary editbutton"><i
                        class=" fas fa-fw fa-plus-square"></i>Add</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php endforeach; ?>


<?php foreach ($products as $product) : ?>

<div class="modal fade" id="detailProdukModal<?= $product['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="detailProdukModal<?= $product['id'] ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="detailProdukModal<?= $product['id'] ?>">Detail
                    <?= $product['title']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/product_thumb/small/' . $product['thumb']); ?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4><?= $product['title']; ?></h4>
                        <p><?= $product['product_desc']; ?></p>
                        <p><b>Kategori :</b> <?= $product['category']; ?></p>
                        <p><b>Harga :</b> Rp. <?= number_format($product['price'], 0, ',', '.'); ?></p>
                        <p><b>Berat :</b>
                            <?= ($product['weight'] >= 1000) ? $product['weight'] * 0.001 . 'kg' : $product['weight'] . 'gram' ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>

<!-- modal cover -->
<?php foreach ($products as $product) : ?>

<div class="modal fade" id="newThumbModal<?= $product['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="newThumbModal<?= $product['id']; ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="newThumbModal<?= $product['id']; ?>">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('produk/thumb'); ?>
            <input type="hidden" name="id" value="<?= $product['id']; ?>">
            <div class="modal-body">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="thumb" name="thumb" accept="image/*">
                        <label class="custom-file-label" for="thumb">Thumb Produk</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary editbutton"><i
                            class=" fas fa-fw fa-plus-square"></i>Add</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>