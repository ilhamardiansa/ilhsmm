  <div class="container mg-top-90">
                      <!-- start page title -->
 <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Documentasi API</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                      <h4 class="header-title mb-3"><i class="fa fa-info-circle" aria-hidden="true"></i> <b>DOKUMENTASI API</b></h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                   
                                                </thead>
                                                <tbody>
                                               <tr>
                                                   <td>HTTP METHOD</td>
                                                   <td>POST</td>
                                               </tr>
                                                <tr>
                                                   <td>FORMAT RESPON</td>
                                                   <td>JSON</td>
                                               </tr>
                                                <tr>
                                                   <td>API URL</td>
                                                   <td>https://api.ilhsmm.com/json</td>
                                               </tr>
                                                <tr>
                                                   <td>API KEY</td>
                                                   <td><a href="<?php echo base_url('user/profile') ?>">Check Disini</a></td>
                                               </tr>
                                                </tbody>
                                            </table>
                                            <br />
                                            <h3>1. Menampilkan Data Profile</h5>
                                                 <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                   <tr>
                                                   <th>Parameter</th>
                                                   <th>Keterangan</th>
                                               </tr>
                                                </thead>
                                                <tbody>
                                               <tr>
                                                   <td>api_key</td>
                                                   <td>API KEY ANDA.</td>
                                               </tr>
                                                <tr>
                                                   <td>action</td>
                                                   <td>profile</td>
                                               </tr>
                                                </tbody>
                                            </table>
                                            <br />
                                            <h4>Contoh Respon Yang Ditampilkan</h4>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="50%">Resppon Sukses</th>
			<th>Respon Gagal</th>
		</tr>
		<tr>
			<td>
<pre>{
	"status": true,
	"data": [
		{
			"saldo": 10000
		},
	]
}
</pre>
			</td>
			<td>
<pre>{
	"status": false,
	"data": {
		"msg": "API Key salah"
	}
}
</pre>
<b>Kemungkinan pesan yang ditampilkan:</b>
<ul>
	<li>Permintaan tidak sesuai</li>
	<li>API Key salah</li>
</ul>
			</td>
		</tr>
	</table>
</div>
                                            <h3>2. Menampilkan Daftar Layanan</h5>
                                                 <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                   <tr>
                                                   <th>Parameter</th>
                                                   <th>Keterangan</th>
                                               </tr>
                                                </thead>
                                                <tbody>
                                               <tr>
                                                   <td>api_key</td>
                                                   <td>API KEY ANDA.</td>
                                               </tr>
                                                <tr>
                                                   <td>action</td>
                                                   <td>layanan</td>
                                               </tr>
                                                </tbody>
                                            </table>
                                            <br />
                                            <h4>Contoh Respon Yang Ditampilkan</h4>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="50%">Resppon Sukses</th>
			<th>Respon Gagal</th>
		</tr>
		<tr>
			<td>
<pre>{
	"status": true,
	"data": [
		{
			"id": "1",
			"categori": "Instagram Follower No refill",
			"produk_name": "Instagram Followers ILS 1",
			"produk_name": "Instagram Followers ILS 1",
			"harga": "1500",
			"min": "100",
			"max": "1000",
		},
	]
}
</pre>
			</td>
			<td>
<pre>{
	"status": false,
	"data": {
		"msg": "API Key salah"
	}
}
</pre>
<b>Kemungkinan pesan yang ditampilkan:</b>
<ul>
	<li>Permintaan tidak sesuai</li>
	<li>API Key salah</li>
</ul>
			</td>
		</tr>
	</table>
</div>
         <h3>3. Membuat Pesanan</h5>
                                                 <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                   <tr>
                                                   <th>Parameter</th>
                                                   <th>Keterangan</th>
                                               </tr>
                                                </thead>
                                                <tbody>
                                               <tr>
                                                   <td>api_key</td>
                                                   <td>API KEY ANDA.</td>
                                               </tr>
                                                <tr>
                                                   <td>action</td>
                                                   <td>order</td>
                                               </tr>
                                                <tr>
                                                   <td>layanan</td>
                                                   <td>ID LAYANAN</td>
                                               </tr>
                                                <tr>
                                                   <td>data</td>
                                                   <td>data order seperti url/username target.</td>
                                               </tr>
                                                <tr>
                                                   <td>quantity</td>
                                                   <td>Jumlah pesanan</td>
                                               </tr>
                                                </tbody>
                                            </table>
                                            <br />
                                            <h4>Contoh Respon Yang Ditampilkan</h4>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="50%">Resppon Sukses</th>
			<th>Respon Gagal</th>
		</tr>
		<tr>
			<td>
<pre>{
	"status": true,
	"data": [
		{
		"order_id" = "ILH01"
		},
	]
}
</pre>
			</td>
			<td>
<pre>{
	"status": false,
	"data": {
		"msg": "Saldo tidak cukup"
	}
}
</pre>
<b>Kemungkinan pesan yang ditampilkan:</b>
<ul>
	<li>Permintaan tidak sesuai</li>
	<li>API Key salah</li>
		<li>Layanan tidak ditemukan</li>
			<li>Jumlah pesanan tidak sesuai</li>
			<li>Saldo tidak cukup</li>
			<li>Layanan tidak tersedia</li>
</ul>
			</td>
		</tr>
	</table>
</div>

 <h3>4. Cek Status Pesanan</h5>
                                                 <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-nowrap table-centered m-0">
    
                                                <thead class="table-light">
                                                   <tr>
                                                   <th>Parameter</th>
                                                   <th>Keterangan</th>
                                               </tr>
                                                </thead>
                                                <tbody>
                                               <tr>
                                                   <td>api_key</td>
                                                   <td>API KEY ANDA.</td>
                                               </tr>
                                                <tr>
                                                   <td>action</td>
                                                   <td>status</td>
                                               </tr>
                                                <tr>
                                                   <td>order_id</td>
                                                   <td>ORDER ID Pesanan kalian.</td>
                                               </tr>
                                                </tbody>
                                            </table>
                                            <br />
                                            <h4>Contoh Respon Yang Ditampilkan</h4>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="50%">Resppon Sukses</th>
			<th>Respon Gagal</th>
		</tr>
		<tr>
			<td>
<pre>{
	"status": true,
	"data": [
		{
		"status": "Processing",
		"start_count": 199,
		"remains": 0
		},
	]
}
</pre>
			</td>
			<td>
<pre>{
	"status": false,
	"data": {
		"msg": "Pesanan tidak ditemukan"
	}
}
</pre>
<b>Kemungkinan pesan yang ditampilkan:</b>
<ul>
	<li>Permintaan tidak sesuai</li>
	<li>API Key salah</li>
		<li>Pesanan tidak ditemukan</li>
</ul>
			</td>
		</tr>
	</table>
</div>
<br />
<br />
                            </div>
                            </div>