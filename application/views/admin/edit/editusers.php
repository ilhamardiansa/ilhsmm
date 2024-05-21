
 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Edit Users</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Edit Users</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <?php foreach($edituser as $es) { ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $es->id ?>" readonly>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Username<span class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name" value="<?= $es->name ?>" readonly required class="form-control"/>
                                                <?= form_error('name'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Saldo<span class="text-danger">*</span></label>
                                                <input type="number" id="saldo" name="saldo" value="<?= $es->saldo ?>" required class="form-control" />
                                                <?= form_error('saldo'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Email<span class="text-danger">*</span></label>
                                                <input type="email" id="email" name="email" value="<?= $es->email ?>" readonly required class="form-control" />
                                                <?= form_error('email'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">No hp<span class="text-danger">*</span></label>
                                                <input type="number" id="nohp" name="nohp" value="<?= $es->nohp ?>" readonly required class="form-control" />
                                                <?= form_error('nohp'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">PIN<span class="text-danger">*</span></label>
                                                <input type="number" id="pin" name="pin" value="<?= $es->pin ?>" required class="form-control" />
                                                <?= form_error('pin'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Level</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="role" name="role">
                                                <option selected value="<?= $es->role_id ?>"><?php if($es->role_id == '1'){
      echo 'Admin';
      echo '<option value="0">Member</option>';
    }elseif($es->role_id == '2'){
      echo 'Member';
      echo '<option value="1">Admin</option>';
    } ?></option>
                                                </select>
                                                <?= form_error('role'); ?>
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