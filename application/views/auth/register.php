 

                    <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-lg-6">

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class="fa fa-user-plus"></i> <b>REGISTER</b></h4>
                                        <p class="text-muted font-14">
                                        Silakan Register dengan data yang benar.
                                        </p>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Username<span class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name" required placeholder="Enter Username" class="form-control"/>
                                                <?= form_error('name'); ?>
                                            </div>
                                        <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Email address<span class="text-danger">*</span></label>
                                                <input type="email" name="email" id="email" required placeholder="Enter email" class="form-control"/>
                                                <?= form_error('email'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Nomer WhatsApp<span class="text-danger">*</span></label>
                                                <input type="number" id="nohp" name="nohp" required placeholder="Enter Nomer Whatsapp" class="form-control"/>
                                                <?= form_error('nohp'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">PIN<span class="text-danger">*</span></label>
                                                <input type="number" id="pin" name="pin" required placeholder="Enter PIN" class="form-control"/>
                                                <?= form_error('pin'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Password<span class="text-danger">*</span></label>
                                                <input type="password" name="password" id="password" placeholder="Password" required class="form-control" />
                                                <?= form_error('password'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass1" class="form-label">Konfirmasi Password<span class="text-danger">*</span></label>
                                                <input type="password" id="password2" name="password2" placeholder="Konfirmasi Password" required class="form-control" />
                                            </div>
                                        
                                        
                                            <div class="text-center d-grid">
                                        <button class="btn btn-primary" type="submit"> Register </button>
                                    </div>
                                    <br />
                                    <p>Sudah Punya Account ? <a href="<?= base_url("auth"); ?>">Sign In</a></p>
                                        </form>
                                    </div>
                                </div> <!-- end card -->
                            </div>
                            <!-- end col -->
                            </div>
                            </div>
                        <!-- end row -->
