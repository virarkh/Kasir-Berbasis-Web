<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Jenis Kendaraan</h2><br>

    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Jenis Kendaraan</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($jenis_kendaraan as $jnskendaraan) { ?>
                        <form action="<?php echo base_url() . 'JenisKendaraanController/edit_data' ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $jnskendaraan->id ?>">
                            <div class="form-group">
                                <p>Jenis Kendaraan
                                    <input type="text" name="nama_kendaraan" value="<?php echo $jnskendaraan->nama_kendaraan ?>" placeholder="Masukkan Jenis Kendaraan" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div>
                            <div class="form-group">
                                <p>Tarif
                                    <input type="number" name="tarif" value="<?php echo $jnskendaraan->tarif ?>" placeholder="Masukkan Tarif" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success col-sm-2" style="margin-top:3%">Simpan</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>