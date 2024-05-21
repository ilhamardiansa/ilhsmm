



                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> DATA LAYANAN</h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                            <h3> <a href="<?= base_url('tambah/addlayanan') ?>" class="badge bg-success" style="color:white;"><i class="fa fa-plus"></i> Tambah</a></h3>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <br />
                                        <?= $this->session->flashdata('message') ?>
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                            <tr>
                            <th>#</th>
						      <th>Categori</th>
						      <th>Produk Name</th>
						      <th>note</th>
						      <th>Harga</th>
                              <th>Min</th>
                              <th>Max</th>
                              <th>Status</th>
                              <th>Provider ID</th>
                              <th>Provider Layanan ID</th>
                              <th>Action</th>
						    </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                          foreach($layanan as $lyn) {
                               ?>
						    <tr>
                            <th scope="row"><?= $lyn->id; ?></th>
                            <td><?= $lyn->categori; ?></td>
						      <td><?= $lyn->produk_name; ?></td>
                              <td><?= $lyn->note; ?></td>
                              <td><?= $lyn->harga; ?></td>
                              <td><?= $lyn->min; ?></td>
                              <td><?= $lyn->max; ?></td>
                              <td>
                                  <?php
                                  if($lyn->status == '1'){
                                      echo '<span class="badge bg-success">Aktif</span>';
                                  }elseif($lyn->status == '0'){
                                      echo '<span class="badge bg-danger">Tidak Aktif</span>';
                                  }
                              ?>
                              </td>
                                  <td><?= $lyn->provider_id; ?></td>
                                  <td><?= $lyn->provider_layanan_id; ?></td>
                              <td><h5><a href="<?= base_url('edit/editlayanan/').$lyn->id; ?>" class="badge bg-warning"><i class="fa fa-edit"></i> Edit</a> 
                              <a href="<?= base_url('admin/deletelayanan/').$lyn->id; ?>" class="badge bg-danger"><i class="fa fa-trash"></i> Delete</a></h5></td>
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