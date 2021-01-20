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
                                    <th scope="col">No. Transaksi</th>
                                    <th scope="col">Pengguna</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Metode Pembayaran</th>
                                    <th scope="col">Alamat Pengiriman</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php $i = 1; ?>
                                <?php foreach ($transactions as $transaction) : ?>
                                <tr>
                                    <th scope="row" class="align-middle"><?= $i; ?></th>
                                    <td class="align-middle"><?= $transaction['transaction_number']; ?></td>
                                    <td class="align-middle"><?= $transaction['name']; ?></td>
                                    <td class="align-middle">
                                        <small>
                                            <table>
                                                <tr align="center">
                                                    <th>Nama Produk</th>
                                                    <th>Banyaknya</th>
                                                </tr>
                                                <?php $products = json_decode($transaction['product']) ?>
                                                <?php foreach ($products as $product) : ?>
                                                <tr align="center">
                                                    <?php 
                                                    
                                                    $id = $product->product_id;
                                                    $productName = $this->db->get_where('product', ['id' => $id])->row_array();

                                                    ?>
                                                    <td data-popup="tooltip" data-placement="top"
                                                        title="<?= $productName['title']; ?>">
                                                        <?= (strlen($productName['title']) > 30) ? substr($productName['title'], 0, 30) . '...' : $productName['title']; ?>
                                                    </td>
                                                    <td><?= $product->qty; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </small>
                                    </td>
                                    <td class="align-middle"><?= date('d F Y', $transaction['date_created']); ?></td>

                                    <?php if ($transaction['status'] == 0) : ?>
                                    <td class="align-middle"><small class="badge badge-secondary">dibatalkan</small>
                                    </td>
                                    <?php elseif ($transaction['status'] == 1) : ?>
                                    <td class="align-middle"><small class="badge badge-danger">pending</small></td>
                                    <?php elseif ($transaction['status'] == 2) : ?>
                                    <td class="align-middle"><small class="badge badge-warning">diproses</small></td>
                                    <?php elseif ($transaction['status'] == 3) : ?>
                                    <td class="align-middle"><small class="badge badge-success">selesai</small></td>
                                    <?php endif; ?>

                                    <td class="align-middle">
                                        <img src="<?= base_url('assets/img/product_payment/') . $transaction['icon']; ?>"
                                            alt="<?= $transaction['method']; ?>" width="30%">
                                    </td>
                                    <td class="align-middle"><?= $transaction['shipping_address']; ?></td>
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Ubah Status
                                            </button>
                                            <div class="tooltip-demo dropdown-menu">
                                                <a href="<?= base_url('transaksi/edit/1/') . $transaction['id'] ?>"
                                                    class="dropdown-item bg-danger" data-popup="tooltip"
                                                    data-placement="top" title="Edit Data">
                                                    pending</a>
                                                <a href="<?= base_url('transaksi/edit/2/') . $transaction['id'] ?>"
                                                    class="dropdown-item bg-warning" data-popup="tooltip"
                                                    data-placement="top" title="Delete Data">
                                                    diproses</a>
                                                <a href="<?= base_url('transaksi/edit/3/') . $transaction['id'] ?>"
                                                    class="dropdown-item bg-success" data-popup="tooltip"
                                                    data-placement="top" title="Delete Data">
                                                    selesai</a>
                                            </div>
                                        </div>

                                        <div class="tooltip-demo">
                                            <a href="<?= base_url('transaksi/delete/') . $transaction['id'] ?>"
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
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->