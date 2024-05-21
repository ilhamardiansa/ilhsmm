
 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Tambah Metode Deposit</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Tambah Metode Deposit</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Payment</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="payment" name="payment">
                                              <option value="bank">BANK</option>
                                              <option value="pulsa">PULSA</option>
                                                </select>
                                                <?= form_error('payment'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Type</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="type" name="type">
                                              <option value="auto">AUTO</option>
                                              <option value="manual">MANUAL</option>
                                                </select>
                                                <?= form_error('type'); ?>
                                            </div>
                                        <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Deposit Name">
                                                <?= form_error('name'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Bank</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="bank" name="bank">
                                              <option value="bca">BCA</option>
                                              <option value="bri">BRI</option>
                                              <option value="bni">BNI</option>
                                              <option value="mandiri">MANDIRI</option>
                                              <option value="ewallet">EWALLET</option>
                                                </select>
                                                <?= form_error('type'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Nomer Rekening<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="norek" name="norek" placeholder="Nomer Rekening">
                                                <?= form_error('norek'); ?>
                                            </div>
                                            <div class="mb-3">
                                                        <label for="example-textarea" class="form-label">Note</label>
                                                        <textarea class="form-control" id="note" name="note" rows="4"></textarea>
                                                        <?= form_error('note'); ?>
                                                      </div>
                                                      <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Minimal Deposit<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="min" name="min" placeholder="Minimal Deposit">
                                                <?= form_error('min'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Rate<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate Deposit. Contoh : 1.12">
                                                <?= form_error('rate'); ?>
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