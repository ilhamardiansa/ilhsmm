



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> DATA DEPOSIT</h4>
                                        <br />
                                        <?= $this->session->flashdata('message') ?>
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                            <tr>
                            <th>#</th>
						      <th>Type</th>
						      <th>Amount</th>
                              <th>Note</th>
                              <th>Date</th>
						    </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                          foreach($logs as $logs) {
                               ?>
						    <tr>
                            <th scope="row"><?= $logs->id; ?></th>
                            <td><?php if($logs->type == 'plus'){
                                echo 'PLUS';
                            }else{
                                echo 'MINUS';
                            } ?></td>
                            <td>Rp <?= number_format($logs->amount,0,',','.'); ?></td>
                            <td><?= $logs->note; ?></td>
                            <td><?= $logs->create_at; ?></td>
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