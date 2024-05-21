



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-history'></i> RIWAYAT PEMESANAN</h4>
                                        <br />
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                                <tr>
                                                <th>Order ID</th>
                                                <th>Tanggal/Waktu</th>
                                                 <th>Layanan</th>
                                                  <th>Data</th>
                                                   <th>Jumlah</th>
                                                   <th>Start Count</th>
                                                   <th>Remains</th>
                                                   <th>Harga</th>
                                                   <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach($histori as $hst) { ?>
                                            <tr>
                                                <th><?= $hst->order_id ?></th>
                                                <th><?= $hst->create_at ?></th>
                                                 <th><?= $hst->produk_name ?></th>
                                                  <th><?= $hst->data ?></th>
                                                  <th><?= $hst->quantity ?></th>
                                                  <th><?= $hst->start_count ?></th>
                                                  <th><?= $hst->remains ?></th>
                                                  <th><?php echo "Rp ". number_format($hst->harga) ?></th>
                                                   <th><span class="badge <?php 
if($hst->status == 'Pending'){
    echo 'bg-warning';
}elseif($hst->status == 'Processing'){
    echo 'bg-primary';
}elseif($hst->status == 'Success'){
    echo 'bg-success';
}elseif($hst->status == 'Error'){
    echo 'bg-danger';
}elseif($hst->status == 'Partial'){
    echo 'bg-danger';
}
 ?>"><?php 
 if($hst->status == 'Pending'){
     echo 'Pending';
 }elseif($hst->status == 'Processing'){
    echo 'Proses';
}elseif($hst->status == 'Success'){
     echo 'Success';
 }elseif($hst->status == 'Error'){
     echo 'Error';
 }elseif($hst->status == 'Partial'){
    echo 'Partial';
}
  ?></span></th>
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


