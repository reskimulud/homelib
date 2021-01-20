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

            <div class="row ">
                <div class="col-lg-12">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
                    <?php if (validation_errors()) : ?>
                    <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
                    <?php endif; ?>

                    <div class="tooltip-menu">
                        <button href="" class="btn btn-primary mb-4 " data-toggle="modal" data-target="#newSubMenuModal"
                            data-popup="tooltip" data-placement="top" title="New Sub Menu">
                            <i class=" fas fa-fw fa-plus-square"></i>
                            Tambah Submenu
                        </button>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Data Submenu</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-responsive" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Url</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Diperlihatkan?</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($SubMenu as $sm) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $sm['title'] ?></td>
                                            <td><?= $sm['menu'] ?></td>
                                            <td><?= $sm['url'] ?></td>
                                            <td>
                                                <i class="<?= $sm['icon'] ?>"></i>
                                            </td>
                                            <td>
                                                <?php if ($sm['is_show'] == 1) : ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="showed" id="defaultCheck1" checked readonly disabled>
                                                    <label for="showed">Diperlihatkan</label>
                                                </div>
                                                <?php else : ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="showed" id="defaultCheck1" readonly disabled>
                                                    <label for="showed">Disembunyikan</label>
                                                </div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="tooltip-demo">
                                                    <a href="<?= base_url('menu/editsubmenu/') . $sm['id'] ?>"
                                                        class="badge badge-info" data-toggle="modal"
                                                        data-target="#editSubMenuModal<?= $sm['id'] ?>"
                                                        data-popup="tooltip" data-placement="top" title="Edit Data"><i
                                                            class=" fas fa-fw fa-edit"></i> edit</a>
                                                    <a href="<?= base_url('menu/deletesubmenu/') . $sm['id'] ?>"
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModal">Tambah Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="" disabled selected>--pilih menu--</option>
                            <option value="" disabled>
                                <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_show" id="is_show" value="1" class="form-check-input"
                                checked>
                            <label for="is_show" class="form-check-label">Perlihatkan?</label>
                        </div>
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


<?php $i = 1; ?>
<?php foreach ($SubMenu as $sm) : ?>


<!-- Modal -->
<div class="modal fade" id="editSubMenuModal<?= $sm['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editMenuModalLabel<?= $sm['id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="editSubMenuModal<?= $sm['id'] ?>">Edit Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/editsubmenu/') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" readonly value="<?= $sm['id']; ?>" name="id" class="form-control">
                    <div class="form-group">
                        <input type="text" value="<?= $sm['title'] ?>" class="form-control" id="title" name="title"
                            placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($menu as $m) : ?>
                            <?php if ($m['id'] == $sm['menu_id']) : ?>
                            <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                            <?php else : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $sm['url'] ?>" class="form-control" id="url" name="url"
                            placeholder="Url">
                    </div>
                    <div class="form-group">
                        <input type="text" value="<?= $sm['icon'] ?>" class="form-control" id="icon" name="icon"
                            placeholder="Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_show" id="is_show" value="1" class="form-check-input"
                                <?php if ($sm['is_show'] == 1) : ?> checked <?php endif; ?>>
                            <label for="is_show" class="form-check-label">Showed?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary editbutton"><i
                            class=" fas fa-fw fa-edit"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $i++ ?>
<?php endforeach; ?>