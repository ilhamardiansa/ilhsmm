



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
						      <th>Users ID</th>
						      <th>Payment</th>
                              <th>Type</th>
                              <th>Method</th>
                              <th>Amount</th>
                              <th>Post amount</th>
                              <th>Method ID</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Action</th>
						    </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                          foreach($deposit as $dpt) {
                               ?>
						    <tr>
                            <th><?= $dpt->id; ?></th>
                            <td><?= $dpt->users_id; ?></td>
                            <td><?= $dpt->payment; ?></td>
                            <td><?= $dpt->type; ?></td>
                            <td><?= $dpt->method_name; ?></td>
                            <td><?= $dpt->amount; ?></td>
                             <td><?= $dpt->postamount; ?></td>
                            <td><?= $dpt->deposit_method_id; ?></td>
                            <td><span class="badge <?php 
if($dpt->status == 'pending'){
    echo 'bg-warning';
}elseif($dpt->status == 'sukses'){
    echo 'bg-success';
}elseif($dpt->status == 'cancel'){
    echo 'bg-danger';
}
 ?>"><?php 
 if($dpt->status == 'pending'){
    echo 'Pending';
}elseif($dpt->status == 'sukses'){
     echo 'Success';
 }elseif($dpt->status == 'cancel'){
     echo 'Cancel';
 }
  ?></span></td>
                            <td><?= $dpt->create_at; ?></td>
                            <td><h5><a href="<?= base_url('edit/editdeposit/').$dpt->id; ?>" class="badge bg-warning"><i class="fa fa-edit"></i> Edit</a>
                            <a href="<?= base_url('admin/deletedeposit/').$dpt->id; ?>" class="badge bg-danger"><i class="fa fa-trash"></i> Delete</a></h5></td>
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