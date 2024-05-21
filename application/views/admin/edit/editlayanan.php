
 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Edit Layanan</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Edit Layanan</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <?php foreach($editlayanan as $ec) { ?>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $ec->id ?>" readonly>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Kategori</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="categori" name="categori">
                                                <option selected value="<?= $ec->categori ?>"><?= $ec->categori ?></option>
    <?php foreach($categori as $categori) { ?>
        <option value="<?= $categori->name ?>"><?= $categori->name ?></option>
        <?php } ?>
                                                </select>
                                                <?= form_error('kategori'); ?>
                                            </div>
                                        <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Produk Name<span class="text-danger">*</span></label>
                                                <input type="text" id="produk" name="produk" value="<?= $ec->produk_name ?>" required class="form-control"/>
                                                <?= form_error('produk'); ?>
                                            </div>
                                            <div class="mb-3">
                                                        <label for="example-textarea" class="form-label">Note</label>
                                                        <textarea class="form-control" id="note" name="note" value="<?= $ec->note ?>" rows="4"><?= $ec->note ?></textarea>
                                                        <?= form_error('note'); ?>
                                                      </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Harga<span class="text-danger">*</span></label>
                                                <input type="number" id="harga" name="harga" value="<?= $ec->harga ?>"  required class="form-control" />
                                                <?= form_error('harga'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Min Order<span class="text-danger">*</span></label>
                                                <input type="number" id="min" name="min" value="<?= $ec->min ?>"  required class="form-control" />
                                                <?= form_error('min'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Max Order<span class="text-danger">*</span></label>
                                                <input type="number" id="max" name="max" value="<?= $ec->max ?>"  required class="form-control" />
                                                <?= form_error('max'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Provider ID<span class="text-danger">*</span></label>
                                                <input type="number" id="providerid" name="providerid" value="<?= $ec->provider_id ?>" required class="form-control" />
                                                <?= form_error('providerid'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Provider Produk ID<span class="text-danger">*</span></label>
                                                <input type="text" id="providerprodukid" name="providerprodukid" value="<?= $ec->provider_layanan_id ?>" required class="form-control" />
                                                <?= form_error('providerprodukid'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Status</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="statuss" name="statuss">
                                                <option selected value="<?= $ec->status ?>"><?php 
                                                if($ec->status == '1'){
                                                  echo 'Aktif</option>';
                                                  echo '<option value="0">Tidak Aktif</option>';
                                                }elseif($ec->status == '0'){
                                                  echo 'Tidak Aktif</option>';
                                                  echo '<option value="1">Aktif</option>';
                                                  } ?>
                                                </select>
                                                <?= form_error('statuss'); ?>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                           </div>
                                           <?php } ?>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->