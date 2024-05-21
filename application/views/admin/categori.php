



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> DATA CATEGORI</h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                            <h3> <a href="<?= base_url('tambah/addcategori') ?>" class="badge bg-success" style="color:white;"><i class="fa fa-plus"></i> Tambah</a></h3>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <br />
                                        <?= $this->session->flashdata('message') ?>
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                            <tr>
                            <th>#</th>
						      <th>Categori Name</th>
                              <th>Action</th>
						    </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                          foreach($categori as $cg) {
                               ?>
						    <tr>
                            <th scope="row"><?= $cg->id; ?></th>
                            <td><?= $cg->name; ?></td>
                              <td><h5><a href="<?= base_url('admin/deletecat/').$cg->id; ?>" class="badge bg-danger"><i class="fa fa-trash"></i> Delete</a></h5></td>
						    </tr>
                            <?php } ?>
                                            </tbody>
                                        </table>
                                        </div> 
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> 
                        </div> 
                        <!-- end row-->