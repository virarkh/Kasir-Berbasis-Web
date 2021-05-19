<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Suppliers</h2><br>

  <div class="row">
    <div class="col-lg-6">

      <!-- Circle Buttons -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Ubah Suppliers</h6>
        </div>
        <div class="card-body">
          <?php foreach ($suppliers as $s) { ?>

            <form action="<?php echo base_url() . 'SuppliersController/editDataSup' ?>" method="POST">
              <input type="hidden" name="id" , value="<?php echo $s->id ?>">
              <div class="form-group">
                <p>Suppliers
                  <input type="text" name="nama_suppliers" value="<?php echo $s->nama_suppliers ?>" placeholder="Masukan Suppliers" class="form-control" style="margin-top: 5px;" required>
                </p>
              </div>
              <div class="text-center">
                <a href="<?php echo base_url('SuppliersController/indexSup') ?>" class="btn btn-secondary btn-icon-split">
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