
                    <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-lg-6">

                                <div class="card">
                                    <div class="card-body">
                                      <h2 class="text-center">INFORMASI PEMBAYARAN</h2>
                                      <?php foreach($depositmethod as $row) { ?>
       <h5>Metode : <p><?= $row->name; ?></p></h5>
       <h5>No Rekening : <p><?= $row->norek; ?></p></h5>
        <h5>Note : <p><?= $row->note; ?></p></h5>
       <?php } ?>
        <?php foreach($deposits as $row2) { ?>
       <h5>Total Transfer : <p>Rp <?php echo number_format($row2->amount,0,',','.'); ?></p></h5>
       <?php } ?>
       <small>Informasi Penting : <p>Setelah transfer berhasil pembayaran akan automatis di proses oleh sistem kami. <br> Transfer Uang Sesuai Nominal Yang Tertera Beserta 3 digit angka terakhir.</p></small>
<center><a href="<?php echo base_url('user/deposit'); ?>"><i class="fa fa-arrow-left"></i>Kembali Ke halaman sebelumnya</a></center>
</div>
                                    </div>
                                </div> <!-- end card -->
                            </div>
                            <!-- end col -->
                            </div>
                            </div>