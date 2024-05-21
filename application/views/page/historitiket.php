                     <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-history'></i> RIWAYAT TIKET</h4>
                                        <br />
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                                <tr>
                                                <th>ID</th>
                                                 <th>Judul</th>
                                                   <th>Status</th>
                                                   <th>Tanggal/Waktu</th>
                                                   <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach($tiket as $hst) { ?>
                                            <tr>
                                                <th><?= $hst->id ?></th>
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
                                                  <th><?php if($hst->status == 'Reply' || $hst->status == 'CustomerReply' || $hst->status == 'Pending') {
                                                    $s = base_url('tiket/reply/').$hst->id;
                                                    echo "<h4><a href='$s' class='badge bg-warning'><i class='fa fa-edit'></i> Reply</a></h4>";
                                                  }?></th>
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


