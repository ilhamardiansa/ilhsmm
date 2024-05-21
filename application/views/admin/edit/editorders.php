
 
 
 <div class="container mg-top-90">
 <!-- start page title -->
  <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                    </div>
                                    <h4 class="page-title">Edit Informasi</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title"><b>Edit Informasi</b></h4>
                                        <?= $this->session->flashdata('message') ?>
                                        <form action="" class="parsley-examples" method="post">
                                        <?php foreach($editorders as $ec) { ?>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $ec->id ?>" readonly>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                                        <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Status</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="statuss" name="statuss">
                                                <option selected value="<?= $ec->status ?>"><?php 

if($ec->status == 'Pending'){
    echo '<h5><span class="badge bg-primary">Pending</span></h5>';
    echo '<option value="Processing">Processing</option>';
    echo '<option value="Partial">Partial</option>';
    echo '<option value="Success">Success</option>';
    echo '<option value="Error">Error</option>';
}elseif($ec->status == 'Success'){
    echo '<h5><span class="badge bg-success">Success</span></h5>';
    echo '<option value="Pending">Pending</option>';
    echo '<option value="Processing">Processing</option>';
    echo '<option value="Partial">Partial</option>';
    echo '<option value="Error">Error</option>';
}elseif($ec->status == 'Error'){
  echo '<h5><span class="badge bg-danger">Error</span></h5>';
  echo '<option value="Pending">Pending</option>';
  echo '<option value="Processing">Processing</option>';
  echo '<option value="Partial">Partial</option>';
  echo '<option value="Success">Success</option>';
}elseif($ec->status == 'Partial'){
  echo '<h5><span class="badge bg-danger">Partial</span></h5>';
  echo '<option value="Pending">Pending</option>';
  echo '<option value="Processing">Processing</option>';
  echo '<option value="Success">Success</option>';
  echo '<option value="Error">Error</option>';
}elseif($ec->status == 'Processing'){
  echo '<h5><span class="badge bg-primary">Processing</span></h5>';
  echo '<option value="Pending">Pending</option>';
  echo '<option value="Partial">Partial</option>';
  echo '<option value="Success">Success</option>';
  echo '<option value="Error">Error</option>';
} ?></option>
                                                </select>
                                                <?= form_error('statuss'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <p class="mb-1 fw-bold text-muted">Refund</p>
                                                <select class="form-control" data-toggle="select2" data-width="100%" id="refund" name="refund">
                                                <option selected value="<?= $ec->is_refund ?>"><?php if( $ec->is_refund == '1'){
      echo 'YA';
      echo '<option value="0">Tidak</option>';
    }elseif( $ec->is_refund == '0'){
      echo 'Tidak';
      echo '<option value="1">Ya</option>';
    } ?></option>
                                                </select>
                                                <?= form_error('refund'); ?>
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

    <!-- balance start -->
    <div class="balance-area mg-top-90">
        <div class="container">
               
        </div>
    </div>
    <!-- balance End -->

<!-- Form Start -->
<br>
<div class="card m-4">
  <div class="card-body">
  <h3 class="card-title">Edit Orders</h3>
  <form class="contact-form-wrap" method="post" action="">
  <?= $this->session->flashdata('message') ?>
  <?php foreach($editorders as $ec) { ?>
  <input type="hidden" class="form-control" id="id" name="id" value="<?= $ec->id ?>" readonly>
   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <select class="form-control" id="status" name="status">
        
    <option selected value="<?= $ec->status ?>"><?php 

if($ec->status == 'Pending'){
    echo '<h5><span class="badge badge-primary">Pending</span></h5>';
    echo '<option value="Sukses">Success</option>';
    echo '<option value="Gagal">Cancel</option>';
}elseif($ec->status == 'Sukses'){
    echo '<h5><span class="badge badge-success">Success</span></h5>';
    echo '<option value="Pending">Proses</option>';
    echo '<option value="Gagal">Cancel</option>';
}elseif($ec->status == 'Gagal'){
  echo '<h5><span class="badge badge-danger">Cancel</span></h5>';
  echo '<option value="Pending">Proses</option>';
  echo '<option value="Sukses">Success</option>';
} ?></option>
    </select>
    <?= form_error('status'); ?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Refund</label>
    <select class="form-control" id="refund" name="refund">
    <option selected value="<?= $ec->is_refund ?>"><?php if( $ec->is_refund == '1'){
      echo 'YA';
      echo '<option value="0">Tidak</option>';
    }elseif( $ec->is_refund == '0'){
      echo 'Tidak';
      echo '<option value="1">Ya</option>';
    } ?></option>
    </select>
    <?= form_error('refund'); ?>
  </div>
  <button type="submit" class="btn-large btn-blue w-100">Submit</button>
  </div>
</div>
<?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- navbar end -->