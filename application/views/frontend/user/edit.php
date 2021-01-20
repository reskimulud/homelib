<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container pt-5 mt-5">
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

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
            <?php if (validation_errors()) : ?>
            <div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
            <?php endif; ?>


            <div class="row mb-5 d-flex justify-content-center">
                <div class="col-lg-10">

                    <div class="card p-5">
                        <div class="form-group row">
                            <div class="col-sm-2 d-flex align-items-center">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src=" <?= base_url('assets/img/profile/') . $user['image']; ?>"
                                            class="img-thumbnail">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="col">
                                            <div class="col-1 mb-1">
                                                <button href="" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#image" data-popup="tooltip" data-placement="top"
                                                    title="Change Picture" onclick="img()">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="col-1">
                                                <?php if ($user['image'] != 'default.jpg') : ?>
                                                <a href="<?= base_url('user/del_img/') . $user['image']; ?>"
                                                    data-popup="tooltip" data-placement="top" title="Delete Image"
                                                    class="btn btn-secondary del-btn"><i
                                                        class="fas fa-fw fa-trash-alt"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>

                        <?= form_open_multipart('user/edit'); ?>
                        <input type="hidden" name="role_id" value="<?= $user['role_id'] ?>">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <div class="form-group row mt-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="<?= $user['username']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?= $user['email']; ?>" required>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-2 ">
                                <p class="text-danger small pt-2">)* Use for login</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?= $user['name']; ?>" required>
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profession" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="profession" name="profession"
                                    value="<?= ($user['profession']) ? $user['profession'] : ''; ?>" required>
                                <?= form_error('profession', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label class="col col-form-label">Informasi Kontak dan Sosial Media</label>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">No. HP / WA</label>
                            <div class="input-group col-sm-10">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+62</div>
                                </div>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="<?= ($user['phone']) ? $user['phone'] : ''; ?>">
                            </div>
                        </div>


                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>

                        </form>
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
<div class="modal fade" id="image" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Change Image Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="mb-4">
                        <strong>Select Image:</strong>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="upload" name="upload" accept="image/*">
                            <label class="custom-file-label" for="name">Choose file</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="upload-demo" style="width:350px"></div>
                    </div>
                    <!-- <div class="mt-4">
                        <div id="upload-demo-i"></div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary upload-result" style="display:none;">Save Change</button>
            </div>
        </div>
    </div>
</div>