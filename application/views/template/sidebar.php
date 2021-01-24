<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('favicon.ico'); ?>" alt="MankArt Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bolder">Project KWU</span>
    </a>

    <!-- QUERRY MENU -->
    <?php

    $role_id    = $this->session->userdata('role_id');
    $queryMenu  = "SELECT    `user_menu`.`id` , `menu`, `icon`, `has_sub_menu`, `url`
                            FROM `user_menu` JOIN `user_access_menu` 
                              ON `user_menu`.`id`               = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id`   = $role_id
                             AND `is_show`                      = 1
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";

    $menu       = $this->db->query($queryMenu)->result_array();

    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('user'); ?>" target="blank" class="d-block"><?= $user['name']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 pb-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <?php 
                                    
                $countPending = 0;
                $transactions = $this->database->getTransaction();
                
                foreach ($transactions as $transaction) {
                    if ($transaction['status'] == 1) {
                        $countPending += 1;
                    }
                }

                $countConfirm = 0;
                $confirms = $this->db->get('transaction_confirm')->result_array();

                foreach ($confirms as $confirm) {
                    if ($confirm['is_confirmed'] == 0) {
                        $countConfirm += 1;
                    }
                }

                $countTransaction = $countConfirm + $countPending;
                
                ?>

                <?php foreach ($menu as $m) : ?>
                <?php $menu = strtolower($m['menu']); ?>

                <?php if ($m['has_sub_menu'] == 1) : ?>
                <li class="nav-item has-treeview <?= ($this->uri->segment(1) == $menu) ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($this->uri->segment(1) == $menu) ? 'active' : '' ?>">
                        <i class="nav-icon <?= $m['icon']; ?>"></i>
                        <p>
                            <?= $m['menu']; ?>
                            <i class="right fas fa-angle-left"></i>
                            <?php if ($m['menu'] == 'Transaksi') : ?>
                            <span
                                class="right badge badge-danger"><?= ($countTransaction) ? $countTransaction: ''; ?></span>
                            <?php endif; ?>
                        </p>
                    </a>

                    <!-- SUBMENU SESUAI MENU -->
                    <?php
                            $menuId         = $m['id'];
                            $querySubMenu   = "SELECT `user_sub_menu`.*, `user_menu`.`id`
                                FROM `user_sub_menu` JOIN `user_menu`
                                  ON `user_sub_menu`.`menu_id`      = `user_menu`.`id`
                               WHERE `user_sub_menu`.`menu_id`      = $menuId
                                 AND `user_sub_menu`.`is_show`      = 1
                            ";
                            $subMenu   = $this->db->query($querySubMenu)->result_array();
                            ?>

                    <?php foreach ($subMenu as $sm) : ?>
                    <ul class="nav nav-treeview active">
                        <li class="nav-item">
                            <a href="<?= base_url() . $sm['url']; ?>"
                                <?= ($sm['menu_id'] == 2) ? 'target="blank"' : ''; ?>
                                class="nav-link <?= ($sm['title'] == $title) ? 'active' : ''; ?>">
                                <i class="<?= $sm['icon']; ?> nav-icon" style="font-size: 10px;"></i>
                                <p><?= $sm['title']; ?>
                                    <?php if ($sm['title'] == 'Transaksi') : ?>
                                    <span
                                        class="right badge badge-danger"><?= ($countPending) ? $countPending : ''; ?></span>
                                    <?php endif; ?>
                                    <?php if ($sm['title'] == 'Konfirmasi Pembayaran') : ?>
                                    <span
                                        class="right badge badge-danger"><?= ($countConfirm) ? $countConfirm : ''; ?></span>
                                    <?php endif; ?>
                                </p>
                            </a>
                        </li>
                    </ul>
                    <?php endforeach; ?>
                </li>
                <?php else : ?>

                <li class="nav-item">
                    <a href="<?= base_url() . $m['url']; ?>"
                        class="nav-link <?= ($m['menu'] == $title) ? 'active' : ''; ?>">
                        <i class="nav-icon <?= $m['icon']; ?>"></i>
                        <p>
                            <?= $m['menu']; ?>
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>