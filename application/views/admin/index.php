<div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                        <div class="col-md-6 col-xl-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                       <h3 style="color:white;">Rp. <?php echo number_format($sumsaldousers,0,',','.'); ?></h3>
                                       <h4 style="color:white;"><b>TOTAL SALDO USER</b></h4>
                                    </div>
                                </div> <!-- end card-->
                                </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                       <h3 style="color:white;">Rp. <?php echo $sumpemesanan ? number_format($sumpemesanan,0,',','.') : '0'; ?> (<?php echo $countpemesanan?>)</h3>
                                       <h4 style="color:white;"><b>TOTAL PEMESANAN</b></h4>
                                    </div>
                                </div> <!-- end card-->
                                </div>
                                <div class="col-md-6 col-xl-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                       <h3 style="color:white;"> Rp. <?php echo $sumdeposit ? number_format($sumdeposit,0,',','.') : '0'; ?> (<?php echo $countdeposit?>)</h3>
                                       <h4 style="color:white;"><b>TOTAL DEPOSIT</b></h4>
                                    </div>
                            </div> <!-- end col -->
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                       <h3 style="color:white;"> <?= $countusers ?></h3>
                                       <h4 style="color:white;"><b>TOTAL USER</b></h4>
                                    </div>
                            </div> <!-- end col -->
                        </div>
                            </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                           
                                        </div>
    
                                        <h4 class="header-title mb-3"><i class="fa fa-info-circle" aria-hidden="true"></i> <b>WEB CONFIG</b></h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Value</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($webconfig as $webconfig) { ?>
                                                <tr>
                                                <td><?= $webconfig->name; ?></td>
      <td><?= $webconfig->value; ?></td>
      <td><h5><a href="<?= base_url('edit/editconfig/'.$webconfig->id ) ?>" class="badge bg-warning"><i class="fa fa-edit"></i> Edit</a></h5></td>
    
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                           
                                        </div>
    
                                        <h4 class="header-title mb-3"><i class="fa fa-info-circle" aria-hidden="true"></i> <b>WEB KONTAK</b></h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Kontak</th>
                                                        <th>Value</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($kontak as $kontak) { ?>
    <tr>
      <td><?= $kontak->name; ?></td>
      <td><?= $kontak->value; ?></td>
      <td><h5><a href="<?= base_url('edit/editkontak/'.$kontak->id ) ?>" class="badge bg-warning"><i class="fa fa-edit"></i> Edit</a></h5></td>
    </tr>
    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->