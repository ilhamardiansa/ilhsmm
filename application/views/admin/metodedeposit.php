



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> METODE DEPOSIT</h4>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                            <h3> <a href="<?= base_url('tambah/addmetode') ?>" class="badge bg-success" style="color:white;"><i class="fa fa-plus"></i> Tambah</a></h3>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <br />
                                        <?= $this->session->flashdata('message') ?>
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                            <tr>
                            <th>#</th>
						      <th>Payment</th>
						      <th>Type</th>
                              <th>Bank</th>
                              <th>Nomer Rekening</th>
						      <th>Name</th>
						      <th>Note</th>
						      <th>Min Amount</th>
                              <th>Rate</th>
                               <th>Status</th>
                               <th>Action</th>
						    </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                          foreach($method as $as) {
                               ?>
						    <tr>
                            <th scope="row"><?= $as->id; ?></th>
                            <td><?= $as->payment; ?></td>
						      <td><?= $as->type; ?></td>
                              <td><?= $as->bank; ?></td>
                              <td><?= $as->norek; ?></td>
                              <td><?= $as->name; ?></td>
                              <td><?= $as->note; ?></td>
                               <td><?= $as->min_amount; ?></td>
                               <td><?= $as->rate; ?></td>
                               <td>
                                 <span class="badge <?php 
if($as->status == '0'){
    echo 'bg-danger';
}elseif($as->status == '1'){
    echo 'bg-success';
}
 ?>"><?php 
 if($as->status == '0'){
     echo 'Tidak Aktif';
 }elseif($as->status == '1'){
     echo 'Aktif';
 }
  ?></span>
                              </td>
                              <td><h5><a href="<?= base_url('edit/editmetode/').$as->id; ?>" class="badge bg-warning"><i class="fa fa-edit"></i> Edit</a>
                              <a href="<?= base_url('admin/deletemetode/').$as->id; ?>" class="badge bg-danger"><i class="fa fa-trash"></i> Delete</a></h5></td>
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
