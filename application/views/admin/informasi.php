



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> DATA DEPOSIT</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <h3> <a href="<?= base_url('tambah/addinformasi') ?>" class="badge bg-success"><i class="fa fa-plus"></i> Tambah</a></h3>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <br />
                                        <?= $this->session->flashdata('message') ?>
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                            <tr>
                            <th>Date</th>
						      <th>Tipe</th>
						      <th>Isi</th>
                  <th>Action</th>
						    </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                          foreach($informasi as $s) {
                               ?>
						    <tr>
                            <td><?= $s->date; ?></td> 
                            <td><?= $s->tipe; ?></td> 
                            <td><?= $s->isi; ?></td> 
                            <td><h5><a href="<?= base_url('edit/editinformasi/').$s->id; ?>" class="badge bg-warning"><i class="fa fa-edit"></i> Edit</a> 
                              <a href="<?= base_url('admin/deleteinformasi/').$s->id; ?>" class="badge bg-danger"><i class="fa fa-trash"></i> Delete</a></h5></td>
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