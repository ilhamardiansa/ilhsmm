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
                                <div class="widget-rounded-circle card bg-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-lg">
                                                    <img src="https://avataaars.io/?avatarStyle=Circle&topType=ShortHairDreads01&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Happy&eyebrowType=Default&mouthType=Smile&skinColor=Light" class="img-fluid rounded-circle img-thumbnail" alt="user-img">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="mb-1 mt-2 text-white font-16"><?= $user['name'] ?></h5>
                                                <p class="mb-2 text-white-50">Saldo : <?php echo "Rp " . number_format($user['saldo']); ?></p>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                       <h3 style="color:white;">Rp. <?php if ($sumtransaksi) { echo number_format($sumtransaksi,0,',','.'); } else { echo '0';} ?> (<?php echo $counttransaksi?>)</h3>
                                       <h4 style="color:white;"><b>PESANAN SAYA</b></h4>
                                    </div>
                                </div> <!-- end card-->
                                </div>
                                <div class="col-md-6 col-xl-3">
                                <div class="card bg-primary">
                                    <div class="card-body text-center">
                                       <h3 style="color:white;">Rp. <?php if ($sumdeposit) { echo number_format($sumdeposit,0,',','.'); } else { echo '0';} ?> (<?php echo $countdeposit?>)</h3>
                                       <h4 style="color:white;"><b>DEPOSIT SAYA</b></h4>
                                    </div>
                            </div> <!-- end col -->
                          
                        </div>
                            </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                           
                                        </div>
    
                                        <h4 class="header-title mb-3"><i class="fa fa-info-circle" aria-hidden="true"></i> <b>5 Informasi Terbaru</b></h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Tanggal / Waktu</th>
                                                        <th>Tipe</th>
                                                        <th>ISI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($informasi as $informasi) { ?>
                                                <tr>
                                                        <th><?= $informasi->date ?></th>
                                                        <th><?= $informasi->tipe ?></th>
                                                        <th><?= $informasi->isi ?></th>
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
                 