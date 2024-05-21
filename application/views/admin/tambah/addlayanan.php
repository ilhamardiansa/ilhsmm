
 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Tambah Layanan</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Tambah Layanan</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Categori</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="categori" name="categori">
                                                <?php foreach($subcat as $subcat) { ?>
    <option value="<?= $subcat->name ?>"><?= $subcat->name ?></option>
    <?php } ?>
                                                </select>
                                                <?= form_error('categori'); ?>
                                            </div>
                                        <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Produk Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="produk" name="produk" placeholder="Produk Name">
    <?= form_error('produk'); ?>
                                            </div>
                                            <div class="mb-3">
                                                        <label for="example-textarea" class="form-label">Note</label>
                                                        <textarea class="form-control" id="note" name="note" rows="4"></textarea>
                                                        <?= form_error('note'); ?>
                                                      </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Harga<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
    <?= form_error('harga'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">MIN<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="min" name="min" placeholder="Minimal Order">
    <?= form_error('min'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">MAX<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="max" name="max" placeholder="Maximal Order">
    <?= form_error('max'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Provider ID<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="providerid" name="providerid" placeholder="Provider ID">
    <?= form_error('providerid'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Provider Layanan ID<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="providerprodukid" name="providerprodukid" placeholder="Provider Layanan ID">
    <?= form_error('providerprodukid'); ?>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                           </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
