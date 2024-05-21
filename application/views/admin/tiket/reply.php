



                        <div class="container mg-top-90">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Reply Tiket</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row my-2 justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="float-end">
                                           
                                        </div> <!-- end dropdown-->

                                        <h4 class="mb-4 mt-0 font-16"><b>Judul : <?php echo $tiket['judul'] ?></b></h4>
                                        <div class="clerfix"></div>
                                        <div class="d-flex align-items-start">
                                            <img class="me-2 rounded-circle" src="https://avataaars.io/?avatarStyle=Circle&topType=ShortHairDreads01&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Happy&eyebrowType=Default&mouthType=Smile&skinColor=Light"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="mt-0 mb-1"><?= $join['name'] ?> <br /><small class="text-muted float-start"><?= $join['create_at'] ?></small></h5><br />
                                            <?= $join['pesan'] ?>
                                                <br/>
                                                <br/>
                                            </div>
                                        </div>
                                        <?php foreach($replys as $replys) { ?>
                                            <div class="d-flex align-items-start">
                                            <img class="me-2 rounded-circle" src="<?php if($replys->is_admin == 0) { echo "https://avataaars.io/?avatarStyle=Circle&topType=ShortHairDreads01&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Happy&eyebrowType=Default&mouthType=Smile&skinColor=Light"; }elseif($replys->is_admin == 1){ echo "https://avataaars.io/?avatarStyle=Circle&topType=Hat&accessoriesType=Prescription01&facialHairType=Blank&clotheType=Hoodie&clotheColor=PastelGreen&eyeType=Happy&eyebrowType=Default&mouthType=Default&skinColor=Light";}?>"
                                                alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="mt-0 mb-1"><?php $name = $join['name']; if($replys->is_admin == 0) { echo "$name"; }elseif($replys->is_admin == 1){ echo "Admin";}?><br /> <small class="text-muted float-start"><?= $replys->create_at ?></small></h5><br />
                                            <?= $replys->pesan ?>
                                                <br/>
                                                <br/>
                                            </div>
                                        </div>
                                            <?php } ?>

                                        <div class="border rounded mt-4">
                                            <form action="" method="post" class="comment-area-box">
                                            <input type="hidden" name="id" id="id" value="<?= $tiket['id'] ?>">
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                                <textarea rows="3" id="pesan" name="pesan" class="form-control border-0 resize-none" placeholder="Your message..."></textarea>
                                                <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                                    <div>
                                                       
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Submit</button>
                                                </div>
                                            </form>
                                        </div> <!-- end .border-->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> 
                        </div> 
                        <!-- end row-->


