
                        <div class="container mg-top-90">
                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><i class='fas fa-list'></i> Daftar Layanan</h4>

                                    
                                        <br />
                                        <div class="table-responsive">
                                        <table class="table dt-responsive nowrap w-100 table-bordered" id="basic-datatable">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Categori</th>
                                                 <th>Produk Name</th>
                                                  <th>Note</th>
                                                   <th>Min Pesan</th>
                                                   <th>Max Pesan</th>
                                                   <th>Harga/K</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach($produk as $produk) { ?>
                                            <tr>
                                                <th><?= $produk->id ?></th>
                                                <th><?= $produk->categori ?></th>
                                                 <th><?= $produk->produk_name ?></th>
                                                  <th><?= $produk->note ?></th>
                                                  <th><?= $produk->min ?></th>
                                                  <th><?= $produk->max ?></th>
                                                   <th><?php echo "Rp ". number_format($produk->harga) ?></th>
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
