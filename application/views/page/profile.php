



<div class="container mg-top-90">
 <!-- start page title -->
 <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Pengaturan Profile</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
   <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                    <?= $this->session->flashdata('message') ?>
                                        <form action="#" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id'] ?>">
                                      <div class="mb-3">
                                                <label for="pass1" class="form-label">Nama<span class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name" value="<?= $user['name'] ?>" class="form-control" readonly/>
                                                <?= form_error('name'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Email<span class="text-danger">*</span></label>
                                                <input type="email" id="email" name="email" value="<?= $user['email'] ?>" class="form-control" readonly/>
                                                <?= form_error('email'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">No Whatsapp<span class="text-danger">*</span></label>
                                                <input type="number" id="nohp" name="nohp" value="<?= $user['nohp'] ?>" class="form-control" />
                                                <?= form_error('nohp'); ?>
                                            </div>
                                            <div class="form-group">
                 <label for="exampleInputEmail1">Api Key</label>
               <div class="input-group mb-4">
   <input type="text" class="form-control" id="apikey" name="apikey" value="<?= $user['api_key'] ?>" aria-describedby="basic-addon2" readonly>
  <div class="input-group-append">
    <a href="<?php echo base_url('user/apigenerate') ?>" class="btn btn-success" type="button" role="button"><i class="fa fa-random"></i></a>
  </div>
</div>
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