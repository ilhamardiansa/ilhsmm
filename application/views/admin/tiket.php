



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> DATA TIKET</h4>
                                        <br />
                                        <?= $this->session->flashdata('message') ?>
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                                <tr>
                                                <th>ID</th>
                                                <th>Users ID</th>
                                                 <th>Judul</th>
                                                   <th>Status</th>
                                                   <th>Tanggal/Waktu</th>
                                                   <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach($tiket as $hst) { ?>
                                            <tr>
                                                <th><?= $hst->id ?></th>
                                                <th><?= $hst->users_id ?></th>
                                                 <th><?= $hst->judul ?></th>
                                                  <th><span class="badge <?php 
if($hst->status == 'Pending'){
    echo 'bg-warning';
}elseif($hst->status == 'Reply'){
    echo 'bg-primary';
}elseif($hst->status == 'CustomerReply'){
    echo 'bg-primary';
}elseif($hst->status == 'Closed'){
    echo 'bg-danger';
}
 ?>"><?php 
 if($hst->status == 'Pending'){
     echo 'Pending';
 }elseif($hst->status == 'Reply'){
    echo 'Reply';
}elseif($hst->status == 'CustomerReply'){
     echo 'Customer Reply';
 }elseif($hst->status == 'Closed'){
     echo 'Closed';
 }
  ?></span></th>
                                                  <th><?= $hst->create_at ?></th>
                                                  <th>
                                                   <?php if($hst->status != 'Closed') {
                                                    $link = base_url('admin/ubahstatustiket/').$hst->id;
                                                    $link2 = base_url('admin/replytiket/').$hst->id;
                                                    echo "<h4><a href='$link2' class='badge bg-warning'><i class='fa fa-edit'></i> Reply</a> <a href='$link' class='badge bg-danger'><i class='fa fa-edit'></i> Close Tiket</a></h4></th>";
                                                   }else{
                                                   echo " ";
                                                   }?>
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


