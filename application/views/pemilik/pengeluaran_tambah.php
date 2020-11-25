<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Pengeluaran</h2><br>

    <div class="row">
        <div class="col-lg-12">
            
            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengeluaran</h6>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url().'PengeluaranController/simpanData'?>" method="POST">
                        <div class="row form-group">
                            <div class="col">
                                <p>Tanggal
                                    <input type="date" name="tanggal" placeholder="Masukan metode cuci baru" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div>
                            <div class="col">
                                <p>Jenis Pengeluaran
                                    <select name="nama_pengeluaran" class="form-control">
                                        <?php foreach($jenis_pengeluaran as $jp): ?>
                                            <option value="<?php echo $jp->id?>"><?php echo $jp->nama_pengeluaran?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <p>Biaya
                                    <input type="number" name="biaya" placeholder="Masukan biaya pengeluaran" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div>
                            <div class="col">
                                <!-- <p>Bukti Nota <br>
                                    <input type="file" name="foto"  style="margin-top: 5px;">
                                </p> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Detail
                                <textarea name="detail" placeholder="Masukan detail pengeluaran" class="form-control" style="margin-top: 5px;"></textarea>
                            </p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success col-sm-2" style="margin-top: 3%;">Simpan</button>
                        </div>        
                    </form>
                </div>        
            </div>
        </div>
    </div>

</div>