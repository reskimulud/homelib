<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>" class="nav-link" target="_blank">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->

        <?php 
        
        $notifications = $this->database->adminNotification();
        $count = 0;

        foreach ($notifications as $notification) {
            if ($notification['is_seen'] == 0) {
                $count += 1;
            }
        }
        
        ?>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"><?= ($count > 0) ? $count : ''; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                <span
                    class="dropdown-item dropdown-header"><?= ($count > 0) ? $count . ' notifikasi' : 'tidak ada notifikasi terbaru'; ?></span>
                <div class="dropdown-divider"></div>
                <?php $i = 1; ?>
                <?php foreach ($notifications as $notification) : ?>
                <?php if ($i <= 3) : ?>
                <?php if ($notification['is_seen'] == 0) : ?>
                <a href="<?= base_url('admin/notification/' . urlencode(str_replace('=', '_', base64_encode($notification['href']))) . '/' . $notification['id']); ?>"
                    class="dropdown-item notification-item bg-gray-light">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-lg-around">
                            <img src="<?= $notification['icon']; ?>" alt="" height="50px">
                        </div>
                        <div class="col-9">
                            <p><b><?= $notification['title']; ?></b></p>
                            <p><small><?= $notification['body']; ?></small></p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <?php else : ?>
                <a href="<?= base_url($notification['href']); ?>" class="dropdown-item notification-item">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-lg-around">
                            <img src="<?= $notification['icon']; ?>" alt="" height="50px">
                        </div>
                        <div class="col-9">
                            <p><b><?= $notification['title']; ?></b></p>
                            <p><small><?= $notification['body']; ?></small></p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <?php endif; ?>
                <?php $i++ ?>
                <?php endif; ?>
                <?php endforeach; ?>
                <a href="<?= base_url('admin/notifikasi'); ?>" class="dropdown-item dropdown-footer">
                    Lihat semua notifikasi

                    <?php if ($count > 3) : ?>
                    <span class="badge badge-danger">+<?= $count - 3; ?></span>
                    <?php endif; ?>

                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="#" role="button"><i
                    class="fas fa-fw fa-sign-out-alt"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                    class="fas fa-th-large"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->