<div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Balance Log</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> lOG PENGGUNAAN SALDO</h4>
                                        <br />
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Tanggal/Waktu</th>
                                                 <th>Type</th>
                                                  <th>Note</th>
                                                   <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach($logs as $logs) { ?>
                                            <tr>
                                                <th><?= $logs->id ?></th>
                                                <th><?= $logs->create_at ?></th>
                                                 <th><?php if($logs->type == 'plus'){
                                echo 'PLUS';
                            }else{
                                echo 'MINUS';
                            } ?></th>
                                                  <th><?= $logs->note ?></th>
                                                  <th><?php echo "Rp ". number_format($logs->amount) ?></th>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        </div> 
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> 
                        </div> 
                        <!-- end row-->
                        </div>   