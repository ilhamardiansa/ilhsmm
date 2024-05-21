
<nav class="navbar navbar-light navbar-expand-lg topnav-menu">

<div class="collapse navbar-collapse" id="topnav-menu-content">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("admin"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("user"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> User
            </a>
        </li>
        <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color:grey;">
                                        <i class="fa fa-list"></i> Data 
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                        <a href="<?= base_url('admin/datausers') ?>" class="dropdown-item" style="color:grey;">Data Users</a>
                                        <a href="<?= base_url('admin/datalayanan') ?>" class="dropdown-item" style="color:grey;">Data Layanan</a>
                                        <a href="<?= base_url('admin/datacategori') ?>" class="dropdown-item" style="color:grey;">Data Categori</a>
                                        <a href="<?= base_url('admin/datadeposit') ?>" class="dropdown-item" style="color:grey;">Data Deposit</a>
                                        <a href="<?= base_url('admin/dataorder') ?>" class="dropdown-item" style="color:grey;">Data Orders</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("admin/metodedeposit"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-list"></i> Metode Deposit
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("admin/tiket"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i> Tiket
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("admin/datainformasi"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-info-circle"></i> Informasi
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("admin/transfer"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-money"></i> Transfer Saldo
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url("admin/balance_logs"); ?>" style="color:grey;" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-history"></i> Balance Logs
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
                        