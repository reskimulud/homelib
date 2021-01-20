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


                          <img src="<?= base_url('assets/'); ?>images/features/img-4.png" class="img-fluid" alt="">
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
                          <a href="index-1.html"><img src="<?= base_url('assets/'); ?>images/logo-dark.png" alt=""
                              height="22"></a>
                          <p class="text-muted mt-3">Reset Password</p>
                        </div>
                        <div class="p-3 custom-form">

                          <div class="alert alert-success bg-soft-primary text-primary border-0   text-center"
                            role="alert">
                            Enter your email address and we'll send you an email with
                            instructions to reset your
                            password.
                          </div>

                          <form>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="password" class="form-control" id="email" placeholder="Enter Email">
                              <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>

                            <div class="mt-3">
                              <button type="submit" class="btn btn-primary btn-block">Reset your
                                Password</button>
                            </div>
                          </form>
                          <div class="mt-3 mb-0 text-center">
                            <p class="mb-0">Cancel ? <a href="<?= base_url('auth'); ?>" class="text-success">Kembali</a>
                            </p>
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