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

                    <div class="tooltip-demo">
                        <button class="btn btn-primary mb-4 addmenu" data-toggle="modal" data-target="#newMenuModal"
                            data-popup="tooltip" data-placement="top" title="Add Data">
                            <i class=" fas fa-fw fa-plus-square"></i>
                            Tambah Menu
                        </button>
                    </div>
                    <!-- data table -->
                    <div>
                        <div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Data Menu
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive dt-responsive lg-12">
                                        <table class="table table-hover table-responsive" id="dataTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Menu</th>
                                                    <th scope="col">Icon</th>
                                                    <th scope="col">Perlihatkan?</th>
                                                    <th scope="col">URL</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($menu as $m) : ?>
                                                <tr class="odd gradeX">
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $m['menu'] ?></td>
                                                    <td><i class="<?= $m['icon'] ?>"></i></td>
                                                    <td>
                                                        <?php if ($m['is_show'] == 1) : ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                name="showed" id="defaultCheck1" checked readonly
                                                                disabled>
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
                                                    <td><?= ($m['url']) ? $m['url'] : '<small class="text-danger">Memiliki Sub Menu</small>' ?>
                                                    </td>
                                                    <td>
                                                        <div class="tooltip-demo">
                                                            <a href="<?= base_url('menu/editmenu/') . $m['id'] ?>"
                                                                data-toggle="modal"
                                                                data-target="#editMenuModal<?= $m['id'] ?>"
                                                                class="badge badge-info" data-popup="tooltip"
                                                                data-placement="top" title="Edit Data"><i
                                                                    class=" fas fa-fw fa-edit"></i> edit</a>
                                                            <a href="<?= base_url('menu/deletemenu/') . $m['id'] ?>"
                                                                class=" badge badge-secondary fas del-btn"
                                                                data-popup="tooltip" data-placement="top"
                                                                title="Delete Data"><i
                                                                    class=" fas fa-fw fa-trash-alt"></i> delete</a>
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
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="newMenuModal">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Menu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="is_show" id="is_show" value="1" class="form-check-input"
                                checked>
                            <label for="is_show" class="form-check-label">Perlihatkan?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="has_sub_menu" id="has-sub-menu" value="1"
                                class="form-check-input" checked>
                            <label for="has-sub-menu" class="form-check-label">Memiliki Sub Menu?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control menu-url" id="url" name="url" style="display: none;"
                            placeholder="Menu URL">
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


<!-- End of Main Content -->

<?php $i = 1; ?>
<?php foreach ($menu as $m) : ?>


<!-- Modal -->
<div class="modal fade" id="editMenuModal<?= $m['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="editMenuModalLabel<?= $m['id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title edittitle" id="editMenuModal<?= $m['id'] ?>">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/editmenu/') ?>" method="POST">
                <div class="modal-body">


                    <div class="form-group">
                        <input type="hidden" readonly value="<?= $m['id']; ?>" name="id" class="form-control">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name"
                            value="<?= $m['menu'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Menu icon"
                            value="<?= $m['icon'] ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="is_show" id="is_show" value="1" class="form-check-input"
                                <?php if ($m['is_show'] == 1) : ?> checked <?php endif; ?>>
                            <label for="is_show" class="form-check-label">Showed?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="has_sub_menu" id="edit-has-sub-menu<?= $i; ?>" value="1"
                                class="form-check-input" <?= ($m['has_sub_menu'] == 1) ? 'checked' : ''; ?>>
                            <label for="edit-has-sub-menu<?= $i; ?>" class="form-check-label">Memiliki Sub Menu?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control menu-url" id="url"
                            value="<?= ($m['has_sub_menu'] != 1) ? $m['url'] : ''; ?>" name="url"
                            placeholder="Menu URL (Tanpa memiliki Sub Menu)">
                        <small class="text-danger">Jangan centang Memiliki Sub Menu jika ingin menambahkan
                            url</small>
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