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
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Data User</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive md-12" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image Profile</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <!-- <th scope="col">Password</th> -->
                                        <th scope="col">Role</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <?php $i = 1; ?>
                                    <?php foreach (array_reverse($list) as $li) : ?>
                                    <tr>
                                        <th scope="row" class="align-middle"><?= $i; ?></th>
                                        <td class="align-middle">
                                            <img class="img-fluid rounded mx-auto d-block"
                                                src="<?= base_url('assets/img/profile/') . $li['image'] ?>"
                                                alt="profile" width="80px">
                                        </td>
                                        <td class="align-middle"><?= $li['name'] ?></td>
                                        <td class="align-middle"><?= $li['email'] ?></td>
                                        <!-- <td>?= $li['password'] ?></td> -->
                                        <td class="align-middle"><?= $li['role'] ?></td>
                                        <?php if ($li['is_active'] == 1) : ?>
                                        <td class="align-middle">Yes</td>
                                        <?php else : ?>
                                        <td class="align-middle">Not yet</td>
                                        <?php endif; ?>
                                        <td class="align-middle"><?= date('d F Y', $li['date_registered']) ?></td>
                                        <td class="align-middle">
                                            <div class="tooltip-demo">
                                                <a href="<?= base_url('admin/userdetail/') . $li['id'] ?>"
                                                    class="badge badge-info" data-popup="tooltip" data-placement="top"
                                                    title="Detail"><i class=" fas fa-fw fa-info-circle"></i> detail</a>
                                                <a href="<?= base_url('admin/deleteuser/') . $li['id'] ?>"
                                                    class="badge badge-secondary fas del-btn" data-popup="tooltip"
                                                    data-placement="top" title="Delete Data"><i
                                                        class="fas fa-fw fa-trash-alt"></i> delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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