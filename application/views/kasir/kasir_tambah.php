<?php
setlocale(LC_ALL, 'id-ID', 'id_ID');
// $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'))
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800" style="text-align: center;">Tambah Transaksi</h2><br>

    <div class="row">
        <div class="container col-lg-9" style="position: relative;">
            <div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="<?php echo base_url() . 'KasirController/addDataKasir' ?>" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- value="<?php echo strftime('%a, %d %B %Y, %H:%M:%S') ?>" -->
                                    <!-- <?= date('l, j F Y H:i:s') ?> -->
                                    Tanggal :
                                    <input type="text" name="tanggal" value="<?= date('Y-m-j H:i:s') ?>" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    Invoice :
                                    <input type="text" name="invoice" value="<?php echo $invoice ?>" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    Kasir :
                                    <input type="text" name="user_id" class="form-control" value="<?php echo $this->session->userdata('id') ?>" hidden readonly>
                                    <input class="form-control" value="<?php echo $this->session->userdata('nama_user') ?>" readonly>
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
                                            <input type="text" name="nama_customer" id="nama_customer" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Jenis Kendaraan
                                        </div>
                                        <div class="col-md-7">
                                            <select name="jenis_id" id="jenis_kendaraan" class="form-control" required>
                                                <option value="" disabled selected style="display:none">Pilih Jenis Kendaraan</option>
                                                <?php foreach ($jenis_kendaraan as $jns_kendaraan) : ?>
                                                    <option value="<?php echo $jns_kendaraan->id ?>"><?php echo $jns_kendaraan->nama_kendaraan ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Tarif
                                        </div>
                                        <div class="col-md-7" id="tarif" style="text-align: right; padding-right:30px">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Metode Cuci
                                        </div>
                                        <div class="col-md-7">
                                            <select name="metode_id" id="metode_mencuci" class="form-control" required>
                                                <option value="" disabled selected style="display:none">Pilih Metode Mencuci</option>
                                                <?php foreach ($metode_mencuci as $metode) : ?>
                                                    <option value="<?php echo $metode->id ?>"><?php echo $metode->nama_metode ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Tarif Tambahan
                                        </div>
                                        <div class="col-md-7" id="tarif_tambahan" style="text-align: right; padding-right:30px">

                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Sub Total
                                        </div>
                                        <div class="col-md-7">
                                            <input name="sub_total" id="sub_total" class="form-control" readonly style="text-align: right; font-weight:bold">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Diskon
                                        </div>
                                        <div class="col-md-7">
                                            <select name="diskon_id" id="diskon" class="form-control" required>
                                                <option value="" disabled selected style="display:none">Pilih Diskon</option>
                                                <?php foreach ($diskon as $d) : ?>
                                                    <option value="<?php echo $d->id ?>"><?php echo $d->nama_diskon ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Potongan Harga
                                        </div>
                                        <div class="col-md-7" id="potongan_harga" style="text-align: right; padding-right:30px">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            Total
                                        </div>
                                        <div class="col-md-7">
                                            <input name="total" id="total" class="form-control" style="text-align: right; font-weight:bold" readonly>
                                        </div>
                                    </div>

                                    <!-- <div class="row form-group">
                                    <div class="col-md-4">
                                        Bayar
                                    </div>
                                    <div class="col-md-7">
                                        <input name="bayar" id="bayar" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4">
                                        Kembalian
                                    </div>
                                    <div class="col-md-7">
                                        <input name="kembalian" id="kembalian" class="form-control" readonly>
                                    </div>
                                </div> -->
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-7">
                                            <a href="<?php echo base_url('KasirController/indexKasir') ?>" class="btn btn-secondary btn-icon-split">
                                                <span class="icon text-white-600">
                                                    <i class="far fa-window-close"></i>
                                                </span>
                                                <span class="text">Batal</span>
                                            </a>
                                            <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-600">
                                                    <i class="fas fa-receipt"></i>
                                                </span>
                                                <span class="text">Bayar</span></button>
                                            <!-- <button class="btn btn-success col-sm-4">Simpan</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

<script text="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
<!-- <script text="text/javascript">
    function total() {
        alert('Halo');
    }
</script> -->

<script>
    $(document).ready(function() {
        $('#jenis_kendaraan').change(function() {
            pil_jenis();
        });
    });

    function pil_jenis() {
        var jenis_kendaraan = $('#jenis_kendaraan').val();
        var metode_mencuci = $('#metode_mencuci').val();
        var diskon = $('#diskon').val();

        $.ajax({
            url: "<?php echo base_url('KasirController/jenis_kendaraan') ?>",
            type: "GET",
            data: {
                jenis_kendaraan: jenis_kendaraan,
                metode_mencuci: metode_mencuci,
                diskon: diskon
            },

            success: function(data) {
                $('#tarif').html(data);
                // $('#total').val(data);
            }
        })

        $.ajax({
            url: "<?php echo base_url('KasirController/subtotal') ?>",
            // type: "GET",
            data: {
                jenis_kendaraan: jenis_kendaraan,
                metode_mencuci: metode_mencuci,
                diskon: diskon
            },

            success: function(data) {
                $('#sub_total').val(data);
            }
        });

        $.ajax({
            url: "<?php echo base_url('KasirController/total') ?>",
            // type: "GET",
            data: {
                jenis_kendaraan: jenis_kendaraan,
                metode_mencuci: metode_mencuci,
                diskon: diskon
            },

            success: function(data) {
                $('#total').val(data);
            }
        });
    }

    $(document).ready(function() {
        $('#metode_mencuci').change(function() {
            metode();
        });
    });

    function metode() {
        var jenis_kendaraan = $('#jenis_kendaraan').val();
        var metode_mencuci = $('#metode_mencuci').val();
        var diskon = $('#diskon').val();

        $.ajax({
            url: "<?php echo base_url('KasirController/metode_mencuci') ?>",
            type: "GET",
            data: {
                jenis_kendaraan: jenis_kendaraan,
                metode_mencuci: metode_mencuci,
                diskon: diskon
            },

            success: function(data) {
                $('#tarif_tambahan').html(data);
                // $('#total').val(data);
            }
        })

        $.ajax({
            url: "<?php echo base_url('KasirController/subtotal') ?>",
            // type: "GET",
            data: {
                jenis_kendaraan: jenis_kendaraan,
                metode_mencuci: metode_mencuci,
                diskon: diskon
            },

            success: function(data) {
                $('#sub_total').val(data);
            }
        });

        $.ajax({
            url: "<?php echo base_url('KasirController/total') ?>",
            // type: "GET",
            data: {
                jenis_kendaraan: jenis_kendaraan,
                metode_mencuci: metode_mencuci,
                diskon: diskon
            },

            success: function(data) {
                // $('#tarif_tambahan').val(data);
                $('#total').val(data);
            }
        });
    }

    $(document).ready(function() {
        $('#diskon').change(function() {
            diskon();
        })
    });

    function diskon() {
        var jenis_kendaraan = $('#jenis_kendaraan').val();
        var metode_mencuci = $('#metode_mencuci').val();
        var diskon = $('#diskon').val();

        $.ajax({
            url: "<?php echo base_url('KasirController/diskon') ?>",
            type: "GET",
            data: {
                jenis_kendaraan: jenis_kendaraan,
                metode_mencuci: metode_mencuci,
                diskon: diskon
            },

            success: function(data) {
                $('#potongan_harga').html(data);
                // $('#total').val(data);
            }
        })

        $.ajax({
            url: "<?php echo base_url('KasirController/total') ?>",
            // type: "GET",
            data: {
                jenis_kendaraan: jenis_kendaraan,
                metode_mencuci: metode_mencuci,
                diskon: diskon
            },

            success: function(data) {
                $('#total').val(data);
            }
        });

    }
</script>