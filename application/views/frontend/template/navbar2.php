<!--Navbar Start-->
<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
  <div class="container">
    <!-- LOGO -->
    <a class="navbar-brand logo text-uppercase" href="<?= base_url(); ?>">
      <img src="<?= base_url('assets/'); ?>images/logo-dark.png" alt="" height="22">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <i class="mdi mdi-menu"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">

        <li class="nav-item">
          <a href="<?= ($this->uri->segment(1) != '') ? base_url() : '#home'; ?>" class="nav-link smoothlink"><i
              class="mdi mdi-home" style="font-size: 1.5em;"></i></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link smoothlink"><i class="mdi mdi-cart" style="font-size: 1.5em;"></i></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link smoothlink"><i class="mdi mdi-heart text-danger"
              style="font-size: 1.5em;"></i></a>
        </li>
      </ul>

      <ul class="navbar-nav navbar-center">
        <?php if ($this->session->userdata('email')) : ?>
        <li class="nav-item dropdown no-arrow mr-4">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img class="img-profile rounded-circle" width="35px"
              src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right animated-grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item navku" href="<?= base_url() ?>">
              <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
              Beranda
            </a>
            <a class="dropdown-item navku" href="<?= base_url('user') ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profil Saya
            </a>
            <a class="dropdown-item navku" href="<?= base_url('user/edit') ?>">
              <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
              Sunting Profil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item navku" href="<?= base_url('auth/logout') ?>" data-toggle="modal"
              data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Keluar
            </a>
          </div>
        </li>
        <?php endif; ?>
      </ul>
      <?php if (!$this->session->userdata('email')) : ?>
      <div class="navbar-button d-none d-lg-inline-block">
        <a href="<?= base_url('auth'); ?>" class="btn btn-sm btn-soft-primary btn-round">Masuk</a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</nav>
<!-- Navbar End -->