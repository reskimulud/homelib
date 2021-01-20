<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="col">
        <div class="row">
            <div class="col-lg-8">


                <?= form_open_multipart('admin/userdetail'); ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $users['id']; ?>">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $users['email']; ?>"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Full name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $users['name']; ?>"
                            readonly>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?= $users['username']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-sm-2 col-form-label">Date created</label>
                    <div class="col-sm-10">
                        <input type="datetime" class="form-control" id="date" name="date"
                            value="<?= date('d F Y', $users['date_created']); ?>" readonly disabled>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <?php foreach ($roles as $role) : ?>
                        <caption><?= $role['id'] ?> => <?= $role['role'] ?> |</caption>
                        <?php endforeach; ?>
                        <select name="role" id="role" class="form-control">
                            <option value="" selected><?= $users['role_id'] ?></option>
                            <option value="">----------------</option>
                            <hr>
                            <?php foreach ($roles as $role) : ?>
                            <option value=""><?= $role['id'] ?></option>
                            <?php endforeach; ?>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/') . $users['image']; ?>"
                                    class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?= ($users['password']); ?>" readonly disabled>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
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


    <a class="btn btn-primary" href="<?= base_url('admin/userslist') ?>">&laquo Back to List</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->