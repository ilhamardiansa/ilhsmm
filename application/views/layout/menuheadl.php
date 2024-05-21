
<nav class="navbar navbar-light navbar-expand-lg topnav-menu">

<div class="collapse navbar-collapse" id="topnav-menu-content">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("user"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <?php 
        $linkadmin = base_url('admin');
        if($user['role_id'] == '1') { 
            echo "<li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle arrow-none' href='".$linkadmin."' style='color:grey;' aria-haspopup='true' aria-expanded='false'>
                <i class='fa fa-user'></i> Admin
            </a>
        </li>";
        } ?>
          <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color:grey;">
                                        <i class="fa fa-user"></i> Profile 
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                        <a href="<?= base_url('user/profile') ?>" class="dropdown-item" style="color:grey;">Pengaturan Profile</a>
                                        <a href="<?= base_url('user/changePassword') ?>" class="dropdown-item" style="color:grey;">Change Password</a>
                                        <a href="<?= base_url('user/changepin') ?>" class="dropdown-item" style="color:grey;">Change PIN</a>
                                    </div>
                                </li>
        <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color:grey;">
                                        <i class="fa fa-shopping-cart"></i> Pemesanan
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                        <a href="<?= base_url('transaksi/order') ?>" class="dropdown-item" style="color:grey;">Pesan Baru</a>
                                        <a href="<?= base_url('transaksi/histori') ?>" class="dropdown-item" style="color:grey;">Riwayat</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color:grey;">
                                        <i class="fa fa-envelope"></i> Tiket
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                        <a href="<?= base_url('user/tiket') ?>" class="dropdown-item" style="color:grey;">Tiket Baru</a>
                                        <a href="<?= base_url('user/historitiket') ?>" class="dropdown-item" style="color:grey;">Riwayat</a>
                                    </div>
                                </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("user/deposit"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-money"></i> Deposit
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url('user/produk') ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-list"></i> Layanan
            </a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url('user/dokumentasi') ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-code"></i> API
            </a>
        </li>
        <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color:grey;">
                                        <i class="fa fa-file"></i> Log
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                        <a href="<?= base_url('user/iplog') ?>" class="dropdown-item" style="color:grey;">Log Login</a>
                                        <a href="<?= base_url('user/balance_logs') ?>" class="dropdown-item" style="color:grey;">Penggunaan Saldo</a>
                                    </div>
                                </li>
        <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color:grey;">
                                        <i class="fa fa-file"></i> Halaman 
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                        <a href="<?= base_url('web/ketentuan') ?>" class="dropdown-item" style="color:grey;">Ketentuan Layanan</a>
                                        <a href="<?= base_url('web/pertanyaan') ?>" class="dropdown-item" style="color:grey;">Pertanyaan Umum</a>
                                        <a href="<?= base_url('web/kontak') ?>" class="dropdown-item" style="color:grey;">Hubungi Kami</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url('auth/logout') ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </li>
       
    </ul> <!-- end navbar-->
</div> <!-- end .collapsed-->
</nav>
    
</div> <!-- end container-fluid -->
            </div> <!-- end topnav-->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        