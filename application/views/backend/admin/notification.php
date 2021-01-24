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
                    <?php foreach ($notifications as $notification) : ?>
                    <div class="row mb-1">
                        <div class="col">
                            <div class="row">
                                <div class="col-2 d-flex justify-content-md-center">
                                    <img src="<?= $notification['icon']; ?>" alt="" height="50px">
                                </div>
                                <div class="col-9">
                                    <a href="<?= base_url($notification['href']); ?>">
                                        <h5><b><?= $notification['title']; ?></b></h5>
                                        <p><small><?= $notification['body']; ?></small></p>
                                    </a>
                                </div>
                                <div class="col-1 d-flex justify-content-md-center align-items-center">
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('admin/deletenotif/' . $notification['id']); ?>"
                                                    class=" badge badge-secondary fas del-btn" data-popup="tooltip"
                                                    data-placement="top" title="Delete Data"><i
                                                        class=" fas fa-fw fa-trash-alt"></i>
                                                    delete</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->