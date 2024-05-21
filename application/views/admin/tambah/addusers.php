
 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Tambah Users</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Tambah Users</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Username">
    <?= form_error('name'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Email<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
    <?= form_error('email'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Password<span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
    <?= form_error('password'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Nomer Whatsapp<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP">
    <?= form_error('nohp'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">PIN<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="pin" name="pin" placeholder="PIN">
    <?= form_error('pin'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Level</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="roleid" name="roleid">
                                                <option value="1">Admin</option>
                                                <option value="2">Member</option>
                                                </select>
                                                <?= form_error('role'); ?>
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