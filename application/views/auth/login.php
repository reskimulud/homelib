<div class="account-home-btn d-none d-sm-block">
    <a href="<?= base_url(); ?>" class="text-primary"><i class="mdi mdi-home h1"></i></a>
</div>

<section class="bg-account-pages vh-100">
    <div class="display-table">
        <div class="display-table-cell">
            <div class="container">
                <div class="row no-gutters align-items-center">

                    <div class="col-lg-12">
                        <div class="login-box">
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-6">
                                    <div class="bg-light">

                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">

                                                <div class="home-img login-img text-center d-none d-lg-inline-block">

                                                    <div class="animation-2"></div>
                                                    <div class="animation-3"></div>


                                                    <img src="assets/images/features/img-4.png" class="img-fluid"
                                                        alt="">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-lg-6">

                                    <div class="row justify-content-center">
                                        <div class="col-lg-11">

                                            <div class="p-4">
                                                <div class="text-center mt-3">
                                                    <a href="index-1.html"><img src="assets/images/logo-dark.png" alt=""
                                                            height="22"></a>
                                                    <p class="text-muted mt-3">Sign in to continue to Drift Art.</p>
                                                </div>
                                                <div class="p-3 custom-form">
                                                    <?= $this->session->flashdata('message'); ?>

                                                    <?php if ($this->uri->segment(3)) : ?>
                                                    <div class="alert alert-danger notification" role="alert">
                                                        Anda harus masuk dulu!
                                                    </div>
                                                    <?php endif; ?>

                                                    <form action="<?= base_url('auth'); ?>" method="POST" id="login">
                                                        <?php if ($this->uri->segment(3)) : ?>
                                                        <input type="hidden" name="products"
                                                            value="<?= $this->uri->segment(3); ?>">
                                                        <?php endif; ?>
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="email" id="email"
                                                                class="form-control" placeholder="Email"
                                                                value="<?= set_value('email'); ?>">
                                                            <div>
                                                                <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="password" name="password" id="password"
                                                                class="form-control" placeholder="Password"
                                                                value="<?= set_value('password'); ?>">
                                                            <div>
                                                                <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- /.col -->
                                                            <div class="col-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-block g-recaptcha"
                                                                    data-action="login-DriftArt">Sign
                                                                    In</button>
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                    </form>

                                                    <div class="mt-4 pt-1 mb-0 text-center">
                                                        <a href="<?= base_url('auth/forgot'); ?>" class="text-dark"><i
                                                                class="mdi mdi-lock"></i>
                                                            Forgot your
                                                            password?</a>
                                                    </div>
                                                    <div class="mb-0 text-center">
                                                        <p class="mb-0">Don't have an account ? <a
                                                                href="<?= ($this->uri->segment(3)) ? base_url('auth/registration/' . $this->uri->segment(3)) : base_url('auth/registration'); ?>"
                                                                class="text-success">Sign
                                                                up</a></p>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>



                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</section>
<!-- end account-pages  -->