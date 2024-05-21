<!-- bill-pay start -->
<div class="bill-pay-area mg-top-90">
        <div class="container">
            <div class="section-title style-three">
                <h3 class="title">Semua Layanan</h3>
            </div>
            <div class="row">
            <?php foreach($categoris as $ct) { ?>
                <a href="<?= base_url('transaksi/order/').$ct->id; ?>" class="col-3">
                    <div class="single-send-money">
                        <img src="<?php echo base_url('assets/img/icon/').$ct->icon; ?>" alt="img" width="40" height="40">
                        <p><?= $ct->name; ?></p>
                    </div>
                </a>
                <?php } ?>
                 <a href="<?= base_url('transaksi/pascabayar') ?>" class="col-3">
                    <div class="single-send-money">
                        <img src="<?php echo base_url('assets/img/icon/19.png') ?>" alt="img" width="40" height="40">
                        <p>Pasca bayar</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- bill-pay End -->