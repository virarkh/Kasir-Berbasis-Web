<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Pengeluaran</h2><br>

  <a href="<?php echo base_url() . 'PengeluaranController/tambahData' ?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-600">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
  </a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="margin-top: 5px;">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Pengeluaran</h6>
    </div>

    <form method="GET" action="<?php echo base_url('PengeluaranController/index') ?>">
      <div class="row" style="margin-top: 2%; margin-left:1%">
        <div class="col-md-6 input-group">
          Filter Tanggal &nbsp;
          <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
          <span class="input-group-addon">&nbsp; s/d &nbsp;</span>
          <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
        </div>
        <div class="col-md-6">
          <button type="submit" name="filter" value="true" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-600">
              <i class="fas fa-search"></i>
            </span>
            <span class="text">
              Tampilkan
            </span>
          </button>
          <a href="<?php echo $url_cetak ?>" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-600">
              <i class="fas fa-file"></i>
            </span>
            <span class="text">Cetak PDF</span>
          </a>
          <?php
          if (isset($_GET['filter']))
            echo '<a href="' . base_url('PengeluaranController/index') . '" class="btn btn-default">Reset</a>';
          ?>
        </div>
      </div>
    </form>

    <p style="text-align:center; margin-bottom: -2%; margin-top:2%"><b><?php echo $label ?></b></p>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Nota</th>
              <th>Tanggal</th>
              <th>Pengeluaran</th>
              <th>Biaya</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($pengeluaran as $p) {
              setlocale(LC_ALL, 'id-ID', 'id_ID');
            ?>
              <tr>
                <td style="width: 1%; text-align:center"><?php echo $no++ ?></td>
                <td><?php echo $p->kode ?></td>
                <td><?php echo strftime('%a, %d %b %Y', strtotime($p->tanggal)) ?></td>
                <td><?php echo $p->nama_pengeluaran ?></td>
                <td>Rp <?php echo number_format($p->biaya, 0, ',', '.') ?></td>
                <td style="width: 35%;">

                  <a href="<?php echo base_url('PengeluaranController/detail/' . $p->id); ?>" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-100">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Detail</span>
                  </a>
                  <a href="<?php echo base_url('PengeluaranController/edit/' . $p->id) ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-100">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span>
                  </a>
                  <a href="<?php echo base_url('PengeluaranController/delete/' . $p->id) ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-100">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                  </a>
                </td>
              </tr>
            <?php } ?>

          </tbody>

        </table>
      </div>
    </div>
  </div>

</div>

<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>

<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom1.js') ?>"></script>
<script>
  $(document).ready(function() {
    setDateRangePicker(".tgl_awal", ".tgl_akhir");
  })
</script>