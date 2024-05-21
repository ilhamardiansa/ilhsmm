 
  



<div class="container mg-top-90">
 <!-- start page title -->
 <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Change PIN</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
   <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                    <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id'] ?>">
                                      <div class="mb-3">
                                                <label for="pass1" class="form-label">New PIN<span class="text-danger">*</span></label>
                                                <input type="number" name="pin" id="pin" class="form-control" placeholder="Masukan New PIN"/>
                                                <?= form_error('pin'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Konfirmasi New PIN<span class="text-danger">*</span></label>
                                                <input type="number" name="pin2" id="pin2" class="form-control" placeholder="Konfirmasi New PIN"/>
                                                <?= form_error('pin2'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">PIN Lama<span class="text-danger">*</span></label>
                                                <input type="number" name="pinold" id="pinold" class="form-control" placeholder="Masukan PIN LAMA"/>
                                                <?= form_error('pinold'); ?>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                           </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- end row -->