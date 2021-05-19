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
          <!-- <form action="<?php echo base_url() . 'PengeluaranController/simpanData' ?>" method="POST"> -->
          <?php echo form_open_multipart('PengeluaranController/addDataPengeluaran/'); ?>
          <div class="row">
            <div class="col-md-3">
              <p>Tanggal
                <input type="date" name="tanggal" placeholder="Masukan metode cuci baru" class="form-control" style="margin-top: 5px;" required>
              </p>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <p>Kode Nota
                <input type="text" name="kode" placeholder="Masukkan Kode Nota" class="form-control" style="margin-top: 5px;">
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p>Suppliers
                <select name="nama_suppliers" class="form-control">
                  <option value="" disabled selected style="display:none">Pilih Suppliers</option>
                  <?php foreach ($suppliers as $s) : ?>
                    <option value="<?php echo $s->id ?>"><?php echo $s->nama_suppliers ?></option>
                  <?php endforeach; ?>
                </select>
              </p>
            </div>
            <div class="col-md-6">
              <p>Biaya
                <input type="number" name="biaya" placeholder="Masukan biaya pengeluaran" class="form-control" required>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              Bukti Nota
              <div class="input-group mb-2">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fotoNota" aria-describedby="descFoto" name="foto">
                  <label class="custom-file-label" for="fotoNota">Choose File</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <p>Yang bersangkutan<br>
                <select name="user_id" class="form-control">
                  <?php foreach ($user as $u) : ?>
                    <option value="<?php echo $u->id ?>"><?php echo $u->nama_user ?></option>
                  <?php endforeach; ?>
                </select>
              </p>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-12">
              <p>Detail
                <textarea id="ckeditor" name="detail" placeholder="Masukan detail pengeluaran" class="form-control"></textarea>
              </p>
            </div>
          </div> -->

          <div class="text-center">
            <a href="<?php echo base_url('PengeluaranController/indexPengeluaran') ?>" class="btn btn-secondary btn-icon-split">
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
          <!-- </form> -->
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <script type="application/javascript">
    $('#fotoNota').on('change', function() {
      // ambil nama file
      let fileName = $(this).val().split('\\').pop();
      // ubah CHOOSE FILE sesuai dengan nama file yang di upload
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>

  <script>
    var ckeditor = CKEDITOR.replace('ckeditor', {
      // height: '0px'
    });


    // CKEDITOR.disableAutoInline = true;
    // CKEDITOR.inline('editable');
  </script>

  <style>
    #ckeditor {
      font-size: 20px;
      line-height: 1.0;
    }
  </style>

</div>