@@ -0,0 +1,164 @@
<?php
setlocale(LC_ALL, 'id-ID', 'id_ID');
// $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'))
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800" style="text-align: center;">Detail Transaksi</h2><br>

    <div class="row">
        <div class="container col-lg-9" style="position: relative;">
            <div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <!-- <form action="<?php echo base_url() . 'KasirController/simpanData' ?>" method="POST"> -->
                        <?php foreach ($transaksi as $t) { ?>
                            <div class="row">
                                <div class="col-md-4">
                                    Tanggal :
                                    <p class="form-control"><?php echo strftime('%a, %d %b %Y %H:%M:%S', strtotime($t->tanggal)) ?></p>
                                </div>
                                <div class="col-md-4">
                                    Invoice :
                                    <p class="form-control"><?php echo $t->invoice ?></p>
                                </div>
                                <div class="col-md-4">
                                    Kasir :
                                    <p class="form-control">
                                        <?php foreach ($user->result() as $u) : ?>
                                            <?php echo $u->nama_user; ?>
                                        <?php endforeach; ?></p>
                                </div>
                            </div>
                            <br>

                            <div class="row">

                                <div class="col-sm">
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Nama Customer
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control"><?php echo $t->nama_customer ?></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Jenis Kendaraan
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">
                                                <?php foreach ($jenis_kendaraan->result() as $jk) : ?>
                                                    <?php echo $jk->nama_kendaraan; ?>
                                                <?php endforeach; ?></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Tarif
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">Rp
                                                <?php foreach ($jenis_kendaraan->result() as $jk) : ?>
                                                    <?php echo number_format($jk->tarif, 0, ',', '.'); ?>
                                                <?php endforeach; ?></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Metode Cuci
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">
                                                <?php foreach ($metode_mencuci->result() as $mm) : ?>
                                                    <?php echo $mm->nama_metode; ?>
                                                <?php endforeach; ?></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Tarif Tambahan
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">Rp
                                                <?php foreach ($metode_mencuci->result() as $mm) : ?>
                                                    <?php echo number_format($mm->tarif_tambahan, 0, ',', '.') ?>
                                                <?php endforeach; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <iv class="col-sm">

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Diskon
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">
                                                <?php foreach ($diskon->result() as $d) : ?>
                                                    <?php echo $d->nama_diskon; ?>
                                                <?php endforeach; ?></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Potongan Harga
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">Rp
                                                <?php foreach ($diskon->result() as $d) : ?>
                                                    <?php echo number_format($d->potongan_harga, 0, ',', '.'); ?>
                                                <?php endforeach; ?></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Total
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">Rp <?php echo number_format($t->total, 0, ',', '.') ?></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Bayar
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">Rp <?php echo number_format($t->bayar, 0, ',', '.') ?></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Kembalian
                                        </div>
                                        <div class="col-md-7">
                                            <p class="form-control">Rp <?php echo number_format($t->kembalian, 0, ',', '.') ?></p>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <a href="<?php echo base_url('KasirController/index'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                                </div>
                            </div>

                        <?php } ?>

                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>