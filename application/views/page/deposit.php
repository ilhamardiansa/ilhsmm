
<div class="container mg-top-90">
 <!-- start page title -->
 <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Deposit</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
   <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                    <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <input type="hidden" class="form-control" id="min" name="min" readonly>
                                        <input type="hidden" class="form-control" id="id" name="id" readonly>
                                        <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Tipe Pembayaran</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="type" name="type">
                                                <option disabled selected>Pilih Tipe</option>
                                                <option value='auto'>AUTO</option>
                                                <option value='manual'>MANUAL</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Jenis Pembayaran</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="payment" name="payment">
                                                    <option selected disabled>Pilih Layanan</option>
                                                    <option value='bank'>Bank</option>
                                                    <option value='pulsa'>Pulsa</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Metode Pembayaran</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="metode" name="metode">
                                                <option disabled selected>Pilih Metode</option>
                                                </select>
                                            </div>
                                        <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Jumlah<span class="text-danger">*</span></label>
                                                <input type="number" id="jumlah" name="jumlah" required placeholder="Masukan Jumlah Deposit..." class="form-control"/>
                                                <small style="color:red">* Minimal : Rp 10.000</small>
                                                <?= form_error('jumlah'); ?>
                                            </div>
                                           
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                           </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mb-3"><i class="fa fa-info-circle" aria-hidden="true"></i> <b>INFORMASI</b></h4>
                                    <ul>
    <li>Anda hanya dapat memiliki maksimal 1 permintaan deposit Pending, jadi jangan melakukan spam dan segera lunasi pembayaran.</li>
    <li>Setelah melakukan submit deposit silakan klik action bayar yang terdapat pada table deposit dibawah.</li>
    <li>Transfer Uang Sesuai Nominal Yang Tertera Beserta 3 digit angka terakhir</li>
    <li>Proses Deposit Membutuhkan Waktu 5-10 Menit</li>
    </ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                            </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-history'></i> RIWAYAT DEPOSIT</h4>
                                        <br />
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                                <tr>
                                                <th>Date / Time</th>
						      <th>Method</th>
						      <th>Jumlah Transfer</th>
                              <th>Saldo Didapat</th>
                  <th>Status</th>
                  <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($deposits as $sd){ ?>
						    <tr>
                  <td><?= $sd->create_at; ?></td>
                  <td><?= $sd->method_name; ?></td>
						      <td>Rp <?php echo number_format($sd->amount,0,',','.'); ?></td>
                              <td>Rp <?php echo number_format($sd->postamount,0,',','.'); ?></td>
                  <td><span class="badge <?php 
if($sd->status == 'pending'){
    echo 'bg-warning';
}elseif($sd->status == 'sukses'){
    echo 'bg-success';
}elseif($sd->status == 'cancel'){
    echo 'bg-danger';
}
 ?>"><?php 
 if($sd->status == 'pending'){
     echo 'Pending';
 }elseif($sd->status == 'sukses'){
     echo 'Success';
 }elseif($sd->status == 'cancel'){
     echo 'Cancel';
 }
  ?></span></td>
  <td><?php 
 if($sd->status == 'pending'){
   $delete = base_url('user/deletedeposit/').$sd->id;
    $bayar = base_url('user/bayar/').$sd->id;
     echo '<h4><a href='.$bayar.' class="badge bg-warning"><i class="fa fa-money"></i> Bayar</a></h4>';
     echo "<h4><a href=".$delete." class='badge bg-danger'><i class='fa fa-trash'></i> Batalkan</a></h4>";
 }else{
   echo '';
 }
  ?></td>
                  <?php } ?> 
                </tr>
                                            </tbody>
                                        </table>
                                        </div> 
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> 
                        </div> 
                        <!-- end row-->

  <script type="text/javascript">
       $(document).ready(function(){
        $('#payment').change(function(){
               let type = $('#type').val();
               let payment = $('#payment').val();
               $.ajax({
                url : "<?= base_url("transaksi/getmethod") ?>",
                   method : "POST",
                   data : "payment=" + payment + "&type=" + type,
                   async : true,
                   dataType : 'json',
                   success : function(data){
                    var html = '<option disabled selected>Pilih Metode</option>';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].name+' data-id='+data[i].id+' data-min='+data[i].min_amount+'>'+data[i].name+'</option>';
                        }
                       $('#metode').html(html);
                   }
               });
          });
        });
    </script>
<script type="text/javascript">
       $('#metode').on('change', function(){
  const min = $('#metode option:selected').data('min');
  const id = $('#metode option:selected').data('id');
  $('[name=min]').val(min);
  $('[name=id]').val(id);
});

function copytextbox() {
document.getElementById('saldo').value = document.getElementById('jumlah').value;
}
    </script>