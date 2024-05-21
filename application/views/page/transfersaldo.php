 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Transfer Saldo</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Transfer Saldo</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Email Penerima<span class="text-danger">*</span></label>
                                                <input type="email" name="email" id="email" required placeholder="Masukan Email Penerima" class="form-control"/>
                                                <?= form_error('email'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Jumlah<span class="text-danger">*</span></label>
                                                <input type="number" name="jumlah" id="jumlah" placeholder="Masukan Jumlah Transfer" required class="form-control" />
                                                <?= form_error('jumlah'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">PIN<span class="text-danger">*</span></label>
                                                <input type="number" id="pin" name="pin" placeholder="Masukan PIN Anda" required class="form-control" />
                                                <?= form_error('pin'); ?>
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