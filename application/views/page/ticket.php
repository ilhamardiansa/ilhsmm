<div class="container mg-top-90">
 <!-- start page title -->
 <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Tiket</h4>
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
                                        <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Judul<span class="text-danger">*</span></label>
                                                <input type="text" id="judul" name="judul" required placeholder="Judul Tiket..." class="form-control"/>
                                                <?= form_error('judul'); ?>
                                            </div>
                                            <div class="mb-3">
                                                        <label for="example-textarea" class="form-label">Pesan</label>
                                                        <textarea class="form-control" id="pesan" name="pesan" rows="6"></textarea>
                                                    </div>
                                                    <?= form_error('pesan'); ?>
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
                                    <b>Langkah-langkah membuat tiket:</b>
											<ul>
											<li>Masukan Judul.</li>
											Contoh : <b>Permasalahan Order, Order gagal , etc</b>
											<li>Masukan Pesan.</li>
											Jika Tiket tentang permasalahan order sertakan<br /> <b>ID ORDER</b>
											</ul>
											</ul>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                            </div>
                            </div>
                        </div>
                      