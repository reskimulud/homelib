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

            <div class="row mb-5">
                <div class="col-md-7 embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item m-2"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15842.285254548873!2d106.9712794!3d-6.9417254999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6848818c4edeb3%3A0x2cdd2cb6e3f10c73!2zNsKwNTcnMDIuOCJTIDEwNsKwNTcnNTMuNSJF!5e0!3m2!1sid!2sid!4v1588811908425!5m2!1sid!2sid"
                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-5">
                    <!-- contact -->
                    <div class="contact" id="contact">

                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="card p-2 m-1">
                                <form>
                                    <div class="form-group">
                                        <label for="nama">Name</label>
                                        <input type="text" id="name" class="form-control"
                                            placeholder="insert your  name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control"
                                            placeholder="insert your email">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">Phone Number</label>
                                        <input type="tel" id="telp" class="form-control" value="+62">
                                    </div>
                                    <div class="form-group">
                                        <label for="pesan">Pesan</label>
                                        <textarea class="form-control" rows="4" placeholder="your  message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir contact -->
                </div>
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->