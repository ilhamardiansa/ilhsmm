



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> DATA USERS</h4>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                            <h3> <a href="<?= base_url('tambah/addusers') ?>" class="badge bg-success" style="color:white;"><i class="fa fa-plus"></i> Tambah</a></h3>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <br />
                                        <?= $this->session->flashdata('message') ?>
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                            <tr>
                            <th>#</th>
						      <th>Name</th>
						      <th>Saldo</th>
						      <th>Email</th>
						      <th>No HP</th>
						      <th>Api Key</th>
                              <th>Level</th>
                               <th>Status</th>
                              <th>Date Created</th>
                              <th>Action</th>
						    </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                          foreach($users as $as) {
                               ?>
						    <tr>
                            <th scope="row"><?=  $as->id; ?></th>
                            <td><?= $as->name; ?></td>
						      <td><?= $as->saldo; ?></td>
                              <td><?= $as->email; ?></td>
                              <td><?= $as->nohp; ?></td>
                               <td><?= $as->api_key; ?></td>
                              <td>
                                  <?php
                                  if($as->role_id == '1'){
                                      echo 'Admin';
                                  }elseif($as->role_id == '2'){
                                      echo 'Member';
                                  }elseif($as->role_id == '3'){
                                    echo 'Reseller';
                                  }
                              ?>
                              </td>
                               <td>
                                 <span class="badge <?php 
if($as->is_active == '0'){
    echo 'bg-warning';
}elseif($as->is_active == '1'){
    echo 'bg-success';
}
 ?>"><?php 
 if($as->is_active == '0'){
     echo 'Belum Aktif';
 }elseif($as->is_active == '1'){
     echo 'Aktif';
 }
  ?></span>
                              </td>
                                  <td><?= $as->date_created; ?></td>
                              <td><h5><a href="<?= base_url('edit/edituser/').$as->id; ?>" class="badge bg-warning"><i class="fa fa-edit"></i> Edit</a>
                              <a href="<?= base_url('admin/deleteusers/').$as->id; ?>" class="badge bg-danger"><i class="fa fa-trash"></i> Delete</a></h5></td>
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
