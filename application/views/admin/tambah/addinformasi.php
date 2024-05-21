
 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Tambah Informasi</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Tambah Informasi</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Tipe</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="tipe" name="tipe">
                                                <option value="INFO">INFO</option>
                                                <option value="LAYANAN">LAYANAN</option>
                                                <option value="EVENT">EVENT</option>
                                                <option value="BONUS">BONUS</option>
                                                </select>
                                                <?= form_error('tipe'); ?>
                                            </div>
                                        <div class="mb-3">
                                                        <label for="example-textarea" class="form-label">Note</label>
                                                        <textarea class="form-control" id="isi" name="isi"rows="5"></textarea>
                                                        <?= form_error('isi'); ?>
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