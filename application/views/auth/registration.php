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


                                                    <img src="<?= base_url('assets/'); ?>images/features/img-4.png"
                                                        class="img-fluid" alt="">
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
                                                    <a href="index.php"><img
                                                            src="<?= base_url('assets/'); ?>images/logo-dark.png" alt=""
                                                            height="22"></a>
                                                    <p class="text-muted mt-3">Sign up for a new Account

                                                    </p>
                                                </div>
                                                <div class="p-3 custom-form">
                                                    <form action="<?= base_url('auth/registration') ?>" method="POST">
                                                        <?php if ($this->uri->segment(3)) : ?>
                                                        <input type="hidden" name="products"
                                                            value="<?= $this->uri->segment(3); ?>">
                                                        <?php endif; ?>
                                                        <div class="form-group mb-3">
                                                            <input type="text" id="username" name="username"
                                                                class="form-control" placeholder="Username"
                                                                value="<?= set_value('username'); ?>">
                                                            <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" placeholder="Full name"
                                                                value="<?= set_value('name'); ?>">
                                                            <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <input type="text" id="email" name="email"
                                                                class="form-control" placeholder="Email"
                                                                value="<?= set_value('email'); ?>">
                                                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <input type="password" id="password1" name="password1"
                                                                class="form-control" placeholder="Password"
                                                                value="<?= set_value('password1'); ?>">
                                                            <?= form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <input type="password" id="password2" name="password2"
                                                                class="form-control" placeholder="Retype password"
                                                                value="<?= set_value('password2'); ?>">
                                                            <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="col-8">
                                                                <div class="icheck-primary">
                                                                    <input type="checkbox" id="agreeTerms"
                                                                        class="agreeTerms" name="terms" value="agree">
                                                                    <label for="agreeTerms">
                                                                        I agree to the <a href="" data-toggle="modal"
                                                                            data-target="#terms">terms</a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-block regis"
                                                                    disabled>Register</button>
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                    </form>
                                                    <div class="mt-4 mb-0 text-center">
                                                        <p class="mb-0">Have an account ? <a
                                                                href="<?= base_url('auth'); ?>"
                                                                class="text-success">Sign
                                                                in</a></p>
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