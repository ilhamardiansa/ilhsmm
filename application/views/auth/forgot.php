


                    <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-lg-6">

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-lock'></i> <b>Lupa Password</b></h4>
                                        <p class="text-muted font-14">
                                         Masukan Email untuk reset password.
                                        </p>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="<?= base_url('auth/forgotpassword'); ?>" class="parsley-examples" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                            <div class="mb-3">
                                                <label for="emailAddress" class="form-label">Email address<span class="text-danger">*</span></label>
                                                <input type="email" name="email" id="email" required placeholder="Enter email" class="form-control"/>
                                                <?= form_error('email'); ?>
                                            </div>
                                        
                                            <div class="text-center d-grid">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>
                                    <br />
                                         <a href="<?= base_url("auth"); ?>" class="text-center">Back to login </a>
                                      
                                        </form>
                                    </div>
                                </div> <!-- end card -->
                            </div>
                            <!-- end col -->
                            </div>
                            </div>
                        <!-- end row -->