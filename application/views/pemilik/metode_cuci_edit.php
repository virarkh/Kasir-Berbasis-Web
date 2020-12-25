<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Metode Cuci</h2><br>

    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Metode Cuci</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($metode_mencuci as $mc) { ?>

                        <form action="<?php echo base_url() . 'MetodeController/edit_data' ?>" method="POST">
                            <input type="hidden" name="id" , value="<?php echo $mc->id ?>">
                            <div class="form-group">
                                <p>Metode Cuci
                                    <input type="text" name="nama_metode" value="<?php echo $mc->nama_metode ?>" placeholder="Masukan Metode Cuci" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div>
                            <div class="form-group">
                                <p>Tarif Tambahan
                                    <input type="number" name="tarif_tambahan" value="<?php echo $mc->tarif_tambahan ?>" placeholder="Masukan Tarif Tambahan" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success col-sm-2" style="margin-top: 3%;">Simpan</button>
                            </div>
                        </form>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</div>