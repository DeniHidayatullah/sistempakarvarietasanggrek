<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?= base_url('Admin'); ?>" class="site_title"><i class="fa fa-desktop"></i> <span>Sistem
                            Pakar</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?= base_url('assets/images/') . $user['image']; ?>" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Selamat Datang</span>
                        <h2 style="font-weight: bold;"><?= $user['nama_user']; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->



                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="<?= base_url('Admin'); ?>"><i class="fa fa-fw fa-home"></i> Dashboard</a></li>
                            <li><a href="<?= base_url('Karakteristik'); ?>"><i class="fa fa-fw fa-edit"></i>
                                    Karakteristik</a></li>
                            <li><a href="<?= base_url('Varietas'); ?>"><i class="fa fa-fw fa-desktop"></i>Varietas</a>
                            </li>
                            <li><a href="<?= base_url('DataLatih'); ?>"><i class="fa fa-fw fa-table"></i>Data
                                    Latih</a>
                            </li>
                            <!-- <li><a href="<?= base_url('Pengetahuan'); ?>"><i class="fa fa-fw fa-table"></i> Basis
                                    Pengetahuan</a></li>
                            <li><a href="<?= base_url('Laporan'); ?>"><i class="fa fa-fw fa-bar-chart-o"></i>
                                    Laporan</a></li> -->
                            <li onclick="return confirm('Yakin Keluar?');"><a href="<?= base_url('auth/logout'); ?>"><i
                                        class="fa fa-fw fa-sign-out" aria-hidden="true"></i> Logout </a></li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->
            </div>
        </div>