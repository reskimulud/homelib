<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container mt-5 pt-5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
                    <?php if (validation_errors()) : ?>
                    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
                    <?php endif; ?>
                    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>

                    <style>
                    .img-circle {
                        border-radius: 50%;
                        height: 90px;
                    }
                    </style>

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
                                    alt="User profile picture">
                            </div>

                            <h4 class="profile-username text-center"><?= $user['name']; ?></h4>

                            <p class="text-muted text-center">@<?= $user['username']; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Dalam Keranjang</b> <a class="float-right">12</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Buku yang disukai</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Transaksi</b> <a class="float-right"><?= count($transactions); ?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9 mt-3">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#transaction"
                                        data-toggle="tab">Transaksi</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#detail" data-toggle="tab">Detail
                                        Profil</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#address" data-toggle="tab">Alamat</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body overflow-auto" style="max-height: 450px;">
                            <!-- detail -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="transaction">
                                    <?php foreach ($transactions as $transaction) : ?>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php $status = 0 ?>
                                                    <h4>No. Transaksi : #<?= $transaction['transaction_number']; ?>
                                                        <?php if ($transaction['status'] == 0) : ?>
                                                        <?php $status = $transaction['status'] ?>
                                                        <span
                                                            class="float-right"><?= date('d-m-Y', $transaction['date_created']); ?>
                                                            <small
                                                                class=" badge badge-secondary badge-pill">dibatalkan</small>
                                                        </span>
                                                        <?php endif; ?>


                                                        <?php if ($transaction['status'] == 1) : ?>
                                                        <?php $status = $transaction['status'] ?>
                                                        <span
                                                            class="float-right"><?= date('d-m-Y', $transaction['date_created']); ?>
                                                            <small class=" badge badge-danger badge-pill">menunggu
                                                                konfirmasi</small>
                                                        </span>
                                                        <?php endif; ?>


                                                        <?php if ($transaction['status'] == 2) : ?>
                                                        <?php $status = $transaction['status'] ?>
                                                        <span
                                                            class="float-right"><?= date('d-m-Y', $transaction['date_created']); ?>
                                                            <small class="badge badge-warning">diproses</small>
                                                        </span>
                                                        <?php endif; ?>


                                                        <?php if ($transaction['status'] == 3) : ?>
                                                        <?php $status = $transaction['status'] ?>
                                                        <span
                                                            class="float-right"><?= date('d-m-Y', $transaction['date_created']); ?>
                                                            <small class="badge badge-success">selesai</small>
                                                        </span>
                                                        <?php endif; ?>
                                                    </h4>

                                                    <?php 
                                                    
                                                    $products   = json_decode($transaction['product'], TRUE);

                                                    ?>

                                                    <?php foreach ($products as $product) : ?>
                                                    <?php $productById = $this->database->getFieldById($product['product_id'], 'title', 'product'); ?>
                                                    <?php $productThumb = $this->database->getFieldById($product['product_id'], 'thumb', 'product'); ?>
                                                    <div class="row d-none d-lg-flex mb-3">
                                                        <div class="col-md-2">
                                                            <img src="<?= base_url('assets/img/product_thumb/small/' . $productThumb['thumb']) ?>"
                                                                width="80px" alt="">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <p class="text-muted">
                                                                <?= $productById['title']; ?><br>
                                                                x<?= $product['qty']; ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="d-lg-none my-4">
                                                        <p class="text-muted">
                                                            <?= $productById['title'] . ' (' . $product['qty'] . '), '; ?>
                                                        </p>
                                                    </div>
                                                    <?php endforeach; ?>

                                                    <div class="mt-4">
                                                        <h5 class="">Total : Rp.
                                                            <?= number_format($transaction['total_fee'], 0, ',', '.'); ?>
                                                        </h5>
                                                    </div>

                                                    <?php $id = $transaction['id']; $invoiceID = $this->db->query("SELECT `id` FROM `transaction_invoice` WHERE `transaction_id` = $id")->row_array(); ?>

                                                    <div class="float-right">
                                                        <?php if ($status == 1) : ?>
                                                        <a
                                                            href="<?= base_url('checkout/confirm/' . $transaction['transaction_number']); ?>">Konfirmasi
                                                            Pembayaran</a> |
                                                        <a
                                                            href="<?= base_url('billing/' . $transaction['transaction_number']); ?>">lihat
                                                            tagihan</a>
                                                        <?php endif; ?>

                                                        <?php if ($status == 2) : ?>
                                                        <a href="<?= base_url('user/print_invoice/' . $invoiceID['id']); ?>"
                                                            target="_blank">cetak
                                                            invoice</a> | <a href="">hubungi admin</a>
                                                        <?php endif; ?>

                                                        <?php if ($status == 3) : ?>
                                                        <a
                                                            href="<?= base_url('user/print_invoice/' . $transaction['id']); ?>">cetak
                                                            invoice</a> | <a href="">beri ulasan</a>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tab-pane" id="detail">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <p class="text-muted">
                                                    <?= $user['username']; ?>
                                                </p>
                                                <!-- <input type="email" class="form-control" id="inputName"
                                                    placeholder="Name"> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <p class="text-muted">
                                                    <?= $user['email']; ?>
                                                </p>
                                                <!-- <input type="email" class="form-control" id="inputEmail"
                                                    placeholder="Email"> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <p class="text-muted">
                                                    <?= $user['name']; ?>
                                                </p>
                                                <!-- <input type="text" class="form-control" id="inputName2"
                                                    placeholder="Name"> -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience"
                                                class="col-sm-2 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <p class="text-muted">
                                                    <?= $user['profession']; ?>
                                                </p>
                                                <!-- <textarea class="form-control" id="inputExperience"
                                                    placeholder="Experience"></textarea> -->
                                            </div>
                                        </div>

                                    </form>

                                    <div class="form-horizontal">
                                        <div class="row">
                                            <div class="offset-sm-2 col">
                                                <a href="<?= base_url('user/edit'); ?>">
                                                    <button class="btn btn-success"><i class="fas fa-fw fa-edit"></i>
                                                        Edit</button>
                                                </a>
                                                <a href="<?= base_url('user/changePassword'); ?>">
                                                    <button class="btn btn-danger"><i class="fas fa-fw fa-key"></i>
                                                        Ubah Password</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <a href="<?= base_url('address'); ?>">
                                        <button class="btn btn-primary my-3">
                                            Tambah Alamat
                                        </button>
                                    </a>

                                    <div class="row overflow-auto" style="max-height: 300px;">
                                        <?php foreach ($address as $addres) : ?>
                                        <div class="col-md">
                                            <div class="card <?= ($user['address_id'] == $addres['id']) ? 'border-success' : ''; ?>"
                                                style="width: 18rem;">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $addres['receiver']; ?></h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        +62<?= $addres['phone']; ?>
                                                    </h6>
                                                    <p class="card-text">
                                                        <?= $addres['address']; ?><br><?= $addres['sub_districts']; ?><br><?= $addres['city_name']; ?><br><?= $addres['postal']; ?>
                                                    </p>
                                                    <a href="<?= base_url('address/edit/' . $addres['id']); ?>"
                                                        class="card-link">Edit</a>
                                                    <?php if ($user['address_id'] != $addres['id']) : ?>
                                                    <a href="<?= base_url('user/default_alamat/' . $addres['id'] . '/' .$user['id']); ?>"
                                                        class="card-link text-success">jadikan Default</a>
                                                    <?php endif; ?>
                                                    <a href="#" class="card-link text-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>

                                    </div>


                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->