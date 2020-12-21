<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Pengeluaran</h2><br>

    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengeluaran</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($pengeluaran as $p) { ?>

                        <form enctype="multipart/form-data" action="<?php echo base_url() . 'PengeluaranController/edit_data' ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $p->id ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Tanggal
                                        <input type="date" name="tanggal" value="<?php echo $p->tanggal ?>" placeholder="Masukan metode cuci baru" class="form-control" style="margin-top: 5px;" required>
                                    </p>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <p>Kode Nota
                                        <input type="text" name="kode" value="<?php echo $p->kode ?>" placeholder="Masukkan Kode Nota" class="form-control" style="margin-top: 5px;">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Jenis Pengeluaran
                                        <select name="nama_pengeluaran" class="form-control">
                                            <?php foreach ($jenis_pengeluaran as $jp) : ?>
                                                <option value="<?php echo $jp->id ?>"><?php echo $jp->nama_pengeluaran ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>Biaya
                                        <input type="number" name="biaya" value="<?php echo $p->biaya ?>" placeholder="Masukan biaya pengeluaran" class="form-control" required>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Bukti Nota <br>
                                        <input type="file" name="foto">
                                    </p>
                                </div>
                                <div class="col">
                                    <p>Yang bersangkutan<br>
                                        <select name="user_id" class="form-control">
                                            <?php foreach ($user as $u) : ?>
                                                <option value="<?php echo $u->id ?>"><?php echo $u->nama_user ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col">
                                    <p>Detail<br>
                                        <textarea name="detail" class="form-control" style="margin-top: 5px;" required></textarea>
                                    </p>
                                </div>
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