<?php
setlocale(LC_ALL, 'id-ID', 'id_ID');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="mb-4 text-gray-800">Detail Transaksi</h4>
    <?php foreach ($transaksi as $t) { ?>

        <div class="row">
            <div class="col-lg-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <!-- <p><b>Tanggal</b> &nbsp;: <?php echo strftime('%A, %d %B %Y %H:%M:%S', strtotime($t->tanggal)) ?></p> -->
                        <!-- <p><b>Tanggal</b> &nbsp;: <?php echo strftime('%A, %d %B %Y %H:%M:%S', strtotime($t->tanggal)) ?></p>
                        <p><b>Kasir</b> &nbsp;: <?php foreach ($user->result() as $u) : ?>
                                <?php echo $u->nama_user; ?>
                            <?php endforeach; ?>
                        </p> -->
                        <table>
                            <tr>
                                <td><b>Tanggal</b></td>
                                <td>&nbsp; : &nbsp;</td>
                                <td><?php echo strftime('%A, %d %B %Y %H:%M:%S', strtotime($t->tanggal)) ?></td>
                            </tr>
                            <tr>
                                <td><b>Kasir</b></td>
                                <td>&nbsp; : &nbsp;</td>
                                <td>
                                    <?php foreach ($user->result() as $u) : ?>
                                        <?php echo $u->nama_user; ?>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        </table>

                        <br>

                        <table class="table table-bordered" style="border: 2;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>Invoice</th>
                                    <th>Nama Customer</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Metode Mencuci</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="text-align: center;">
                                    <td><?php echo $t->invoice ?></td>
                                    <td><?php echo $t->nama_customer ?></td>
                                    <td>Rp
                                        <?php foreach ($jenis_kendaraan->result() as $jk) : ?>
                                            <?php echo number_format($jk->tarif, 0, ',', '.'); ?>
                                        <?php endforeach; ?><br>
                                        <?php foreach ($jenis_kendaraan->result() as $jk) : ?>
                                            <?php echo $jk->nama_kendaraan; ?>
                                        <?php endforeach; ?><br>
                                    </td>
                                    <td>Rp
                                        <?php foreach ($metode_mencuci->result() as $mm) : ?>
                                            <?php echo number_format($mm->tarif_tambahan, 0, ',', '.'); ?>
                                        <?php endforeach; ?><br>
                                        <?php foreach ($metode_mencuci->result() as $mm) : ?>
                                            <?php echo $mm->nama_metode; ?>
                                        <?php endforeach; ?><br>
                                    </td>
                                    <td style="text-align: right;"><b>Rp <?php echo number_format($t->sub_total, 0, ',', '.') ?></b></td>
                                </tr>
                                <tr>
                                    <th colspan="4" style="text-align: right; border:0">Diskon</th>
                                    <td style="text-align: right">Rp
                                        <?php foreach ($diskon->result() as $d) : ?>
                                            <?php echo number_format($d->potongan_harga, 0, ',', '.'); ?>
                                        <?php endforeach; ?><br>
                                    </td>
                                </tr>
                                <tr style="text-align: right;">
                                    <th colspan="4">Total</th>
                                    <td><b>Rp <?php echo number_format($t->total, 0, ',', '.') ?></b></td>
                                </tr>
                                <!-- <tr style="text-align: right;">
                                    <th colspan="4">Bayar</th>
                                    <td>Rp <?php echo number_format($t->bayar, 0, ',', '.') ?></td>
                                </tr>
                                <tr style="text-align: right;">
                                    <th colspan="4">Kembalian</th>
                                    <td>Rp <?php echo number_format($t->kembalian, 0, ',', '.') ?></td>
                                </tr> -->
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-sm">
                                <a href="<?php echo base_url('TransaksiController/indexTransaksi') ?>" class="btn btn-secondary btn-icon-split" style="margin-top: 2%;">
                                    <span class="icon text-white-600">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                                <!-- <a href="<?php echo base_url('PengeluaranController/index'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    <?php
    }
    ?>


</div>
<!-- /.container-fluid -->