<div class="container mg-top-90">
 <!-- start page title -->
 <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Pesananan Baru</h4>
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
                                        <input type="hidden" class="form-control" id="orderid" name="orderid" value="<?= $kode ?>" readonly>
                                          <input type="hidden" class="form-control" id="posiid" name="posiid" readonly>
                                        <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Kategori</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="kategori" name="kategori">
                                                    <option selected disabled>Pilih Kategori</option>
                                                    <?php 
                                                    foreach($categoris as $ss) {  ?>
                                                    <option value="<?= $ss->name; ?>"><?= $ss->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?= form_error('kategori'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Layanan</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="produk" name="produk">
                                                    <option selected disabled>Pilih Layanan</option>
                                                </select>
                                                <?= form_error('produk'); ?>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                <label for="inputCity" class="form-label">Harga/K</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-text">Rp.</div>
                                                        <input type="text" class="form-control" id="harga" name="harga" placeholder="0" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="inputCity" class="form-label">Min</label>
                                                    <input type="text" class="form-control" id="min" name="min" placeholder="0" readonly>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="inputZip" class="form-label">Max</label>
                                                    <input type="text" class="form-control" id="max" name="max" placeholder="0" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                        <label for="example-textarea" class="form-label">Note</label>
                                                        <textarea class="form-control" id="note" name="note" rows="4" readonly></textarea>
                                                    </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Data<span class="text-danger">*</span></label>
                                                <input type="text" id="data" name="data" required placeholder="Masukan Target Data..." class="form-control"/>
                                                <?= form_error('data'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Jumlah Pesanan<span class="text-danger">*</span></label>
                                                <input type="number" id="jumlah" name="jumlah" placeholder="Jumlah Pesananan" required class="form-control" />
                                                <?= form_error('jumlah'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Total Harga<span class="text-danger">*</span></label>
                                                <input type="number" id="totalharga" name="totalharga" placeholder="Total" required class="form-control" readonly/>
                                                <?= form_error('totalharga'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">PIN<span class="text-danger">*</span></label>
                                                <input type="password" id="pin" name="pin" placeholder="Masukan PIN..." required class="form-control" />
                                                <?= form_error('pin'); ?>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Pesan</button>
                                           </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title mb-3"><i class="fa fa-info-circle" aria-hidden="true"></i> <b>INFORMASI</b></h4>
                                    <b>Langkah-langkah membuat pesanan baru:</b>
											<ul style="font-size:10px;">
											<li>Pilih salah satu Kategori.</li>
											<li>Pilih salah satu Layanan yang ingin dipesan.</li>
											<li>Masukkan Target pesanan sesuai ketentuan yang diberikan layanan tersebut.</li>
											<li>Masukkan Jumlah Pesanan yang diinginkan.</li>
											<li>Klik Submit untuk membuat pesanan baru.</li>
											</ul>
											<b>Ketentuan membuat pesanan baru:</b>
											<ul>
											<li>Tidak ada reffund jika ada kesalahan order.</li>
											<li>Silahkan membuat pesanan sesuai langkah-langkah diatas.</li>
											<li>Jika ingin membuat pesanan dengan Target yang sama dengan pesanan yang sudah pernah dipesan sebelumnya, mohon menunggu sampai pesanan sebelumnya selesai diproses.</li>
											<li>Jika terjadi kesalahan / mendapatkan pesan gagal yang kurang jelas, silahkan hubungi Admin untuk informasi lebih lanjut.</li>
											</ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                            </div>
                            </div>
                        </div>
                        <!-- end row -->
    <script type="text/javascript">
        $(document).ready(function(){
           $('#kategori').change(function(){
               var id = $(this).val();
               $.ajax({
                   url : "<?= base_url("transaksi/produkid") ?>",
                   method : "POST",
                   data : {id: id},
                   async : true,
                   dataType : 'json',
                   success : function(data){
                       var html = '<option disabled selected>Pilih Layanan</option>';
                       var i;
                       for(i=0; i<data.length; i++){
                           html += '<option value='+data[i].id+'>'+data[i].produk_name+', Harga : Rp '+data[i].harga+'</option>';
                        }
                       $('#produk').html(html);
                   }
               });
           });

       $('#produk').on('change', function(){
        var id = $(this).val();
        $.ajax({
            url : "<?= base_url("transaksi/dataproduk") ?>",
        	data: "id=" + id,
            async : true,
            dataType : 'json',
            success : function(data){
                for(i=0; i<data.length; i++){
                $('[name=harga]').val(data[i].harga);
                $('[name=min]').val(data[i].min);
                $('[name=max]').val(data[i].max);
                $('[name=note]').html(data[i].note);
                 $('[name=posiid]').html(data[i].provider_layanan_id);
            }
            }
        });

});
$('#jumlah').keyup(function() {
		var jumlah = $('#jumlah').val(), harga = $('#harga').val();
      var rate = harga/1000;
		$('#totalharga').val(jumlah * rate);
	});
});
    </script>