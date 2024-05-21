
 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Edit Deposit</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Edit Deposit</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <?php foreach($editdeposit as $edp) { ?>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $edp->id ?>" readonly>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Status</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="statuss" name="statuss">
                                                <option selected value="<?= $edp->status ?>"><?php 

if($edp->status == 'pending'){
    echo '<h5><span class="badge badge-primary">Pending</span></h5>';
    echo '<option value="sukses">Success</option>';
    echo '<option value="cancel">Cancel</option>';
}elseif($edp->status == 'sukses'){
    echo '<h5><span class="badge badge-success">Success</span></h5>';
    echo '<option value="pending">Pending</option>';
    echo '<option value="cancel">Cancel</option>';
}elseif($edp->status == 'cancel'){
  echo '<h5><span class="badge badge-danger">Cancel</span></h5>';
  echo '<option value="pending">Pending</option>';
  echo '<option value="sukses">Success</option>';
} ?></option>
                                                </select>
                                                <?= form_error('statuss'); ?>
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

    <!-- balance start -->