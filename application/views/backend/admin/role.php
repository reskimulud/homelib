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
                <div class="col-lg-7 tooltip-demo">

                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
                    <?php if (validation_errors()) : ?>
                    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
                    <?php endif; ?>


                    <a href="" class="btn btn-primary mb-4 " data-toggle="modal" data-target="#newRoleModal"
                        data-popup="tooltip" data-placement="top" title="Add Role">
                        <span class=" fas fa-fw fa-plus-square"></span>
                        Add a New Role
                    </a>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Data Role</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive md-12" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $r['role'] ?></td>
                                        <td>
                                            <div class="tooltip-demo">
                                                <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>"
                                                    class="badge badge-warning " data-popup="tooltip"
                                                    data-placement="top" title="Access"><i
                                                        class="fas fa-fw fa-universal-access"></i> access</a>
                                                <a href="<?= base_url('admin/roleedit/') . $r['id'] ?>"
                                                    data-toggle="modal" data-target="#editRoleModal<?= $r['id'] ?>"
                                                    class="badge badge-info" data-popup="tooltip" data-placement="top"
                                                    title="Edit Data"><i class="fas fa-fw fa-edit"></i> edit</a>
                                                <a href="<?= base_url('admin/roledelete/') . $r['id'] ?>"
                                                    class=" badge badge-secondary fas del-btn" data-popup="tooltip"
                                                    data-placement="top" title="Delete Data"><i
                                                        class="fas fa-fw fa-trash-alt"></i>
                                                    delete</a>
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
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModal">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus-square"></i> Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $i = 1; ?>
<?php foreach ($role as $r) : ?>

<!-- Modal -->
<div class="modal fade" id="editRoleModal<?= $r['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editRoleModalLabel<?= $r['id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleModal<?= $r['id'] ?>">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/roleedit') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" readonly value="<?= $r['id']; ?>" name="id" class="form-control">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name"
                            value="<?= $r['role'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $i++ ?>
<?php endforeach; ?>