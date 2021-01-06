<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Jenis Pengeluaran</h2><br>

    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Jenis Pengeluaran</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($jenis_pengeluaran as $jp) { ?>

                        <form action="<?php echo base_url() . 'JenisPengeluaranController/edit_data' ?>" method="POST">
                            <input type="hidden" name="id" , value="<?php echo $jp->id ?>">
                            <div class="form-group">
                                <p>Jenis Pengeluaran
                                    <input type="text" name="nama_pengeluaran" value="<?php echo $jp->nama_pengeluaran ?>" placeholder="Masukan Jenis Pengeluaran" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div>
                            <div class="text-center">
                                <a href="<?php echo base_url('JenisPengeluaranController/index') ?>" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-600">
                                        <i class="far fa-window-close"></i>
                                    </span>
                                    <span class="text">Batal</span>
                                </a>&nbsp;
                                <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-600">
                                        <i class="far fa-check-square"></i>
                                    </span>
                                    <span class="text">Simpan</span></button>
                                <!-- <button class="btn btn-success col-sm-2" style="margin-top: 3%;">Simpan</button> -->
                            </div>
                        </form>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</div>