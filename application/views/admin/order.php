



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> DATA ORDER</h4>
                                        <br />
                                        <?= $this->session->flashdata('message') ?>
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                            <tr>
                            <th>Order Id</th>
						      <th>Produk Name</th>
                              <th>Users ID</th>
						      <th>Data</th>
                              <th>Quantity</th>
						      <th>Harga</th>
                              <th>Start Count</th>
                              <th>Remains</th>
                              <th>Provider ID</th>
                              <th>Api</th>
                              <th>Status</th>
                              <th>Refund</th>
                              <th>Date</th>
                              <th>Action</th>
						    </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                          foreach($orders as $odr) {
                               ?>
						    <tr>
                            <th scope="row"><?= $odr->order_id; ?></th>
						      <td><?= $odr->produk_name; ?></td>
                              <td><?= $odr->users_id; ?></td>
                              <td><?= $odr->data; ?></td>
                              <td><?= $odr->quantity; ?></td>
                              <td><?= $odr->harga; ?></td>
                              <td><?= $odr->start_count; ?></td>
                              <td><?= $odr->remains; ?></td>
                              <td><?= $odr->provider_id; ?></td>
                              <td><?= $odr->api; ?></td>
                              <td><h5><span class="badge <?php 
if($odr->status == 'Pending'){
    echo 'bg-warning';
}elseif($odr->status == 'Processing'){
    echo 'bg-primary';
}elseif($odr->status == 'Success'){
    echo 'bg-success';
}elseif($odr->status == 'Error'){
    echo 'bg-danger';
}elseif($odr->status == 'Partial'){
    echo 'bg-danger';
}
 ?>"><?php 
 if($odr->status == 'Pending'){
     echo 'Pending';
 }elseif($odr->status == 'Processing'){
    echo 'Proses';
}elseif($odr->status == 'Success'){
     echo 'Success';
 }elseif($odr->status == 'Error'){
     echo 'Error';
 }elseif($odr->status == 'Partial'){
    echo 'Partial';
}
  ?></span></h5></td>
                                  <td><?php
                                  if($odr->is_refund == '0'){
                                      echo '<h5><span class="badge bg-primary">TIDAK</span></h5>';
                                  }else{
                                      echo '<h5><span class="badge bg-success">Ya</span></h5>';
                                  }
                              ?></td>
                               <td><?= $odr->create_at; ?></td>
                              <td><h5><a href="<?= base_url('edit/editorders/').$odr->id; ?>" class="badge bg-warning"><i class="fa fa-edit"></i> Edit</a> 
                              <a href="<?= base_url('admin/deleteorder/').$odr->id; ?>" class="badge bg-danger"><i class="fa fa-trash"></i> Delete</a> <a href="<?= base_url('transaksi/mutasiorder')."/".$odr->order_id ?>" class="badge badge-info"><i class="fa fa-file"></i> Mutasi</a></h5></td>
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