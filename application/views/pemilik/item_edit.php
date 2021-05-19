<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Item</h2><br>

  <div class="row">
    <div class="col-lg-6">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Edit Daftar Item</h6>
        </div>
        <div class="card-body">
          <?php foreach ($detail_pengeluaran as $d) { ?>
            <form action="<?php echo base_url() . 'DetailController/editDataItem'; ?>" method="POST">
              <input type="hidden" name="id" value="<?php echo $d->id ?>">
              <div class="form-group" hidden>
                <p>Kode Nota
                  <input type="text" name="id_pengeluaran" value="<?php echo $d->id_pengeluaran ?>" class="form-control" style="margin-top: 5px;" required>
                </p>
              </div>
              <div class="form-group">
                <p>Nama Item
                  <input type="text" name="item" value="<?php echo $d->item ?>" placeholder="Masukkan Nama Item" class="form-control" style="margin-top: 5px;" required>
                </p>
              </div>
              <div class="form-group">
                <p>Harga
                  <input type="number" name="harga" value="<?php echo $d->harga ?>" placeholder="Masukkan Harga" class="form-control" style="margin-top: 5px;" required>
                </p>
              </div>

              <div class="text-center">
                <a href="<?php echo base_url('DetailController/indexDetail') ?>" class="btn btn-secondary btn-icon-split">
                  <span class="icon text-white-600">
                    <i class="far fa-window-close"></i>
                  </span>
                  <span class="text">Batal</span>
                </a>&nbsp;
                <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-600">
                    <i class="far fa-check-square"></i>
                  </span>
                  <span class="text">Simpan</span></button>
                <!-- <button type="submit" class="btn btn-success col-sm-2" style="margin-top: 3%;">Simpan</button> -->
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>