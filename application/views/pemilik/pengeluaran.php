<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Pengeluaran</h2><br>

  <a href="<?php echo base_url() . 'PengeluaranController/tambahData' ?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-600">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
  </a>
  <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

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
        <!-- <div class="col-md-3">
          
        </div>
        <div class="col-md-2">
          
        </div>
        <div class="col-md-1">
          
        </div> -->

      </div>
    </form>
    <!-- <div class="row">
        <div class="col-sm-12 col-md-12">
          <div class="form-group">
            <label>Filter Tanggal</label>
            <div class="input-group">
              <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
              <span class="input-group-addon">s/d</span>
              <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
            </div>
          </div>
        </div>
      </div>

      <button type="submit" name="filter" value="true" class="btn btn-primary">Tampilkan</button>

      <?php
      if (isset($_GET['filter']))
        echo '<a href="' . base_url('PengeluaranController/index') . '" class="btn btn-default">Reset</a>';

      ?> -->



    <p style="text-align:center; margin-bottom: -2%; margin-top:2%"><b><?php echo $label ?></b></p>
    <!-- <a href=" <?php echo base_url('PengeluaranController/cetak'); ?>">Cetak</a> -->
    <!-- <a href="<?php echo $url_cetak ?>" class="btn btn-warning"><i class="fa fa-filel">Cetak PDF</i></a> -->

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
              <!-- <th>Start date</th>
                      <th>Salary</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($pengeluaran as $p) {
            ?>
              <tr>
                <td style="width: 1%;"><?php echo $no++ ?></td>
                <td><?php echo $p->kode ?></td>
                <td><?php echo date('d F Y', strtotime($p->tanggal)) ?></td>
                <td><?php echo $p->nama_pengeluaran ?></td>
                <td>Rp. <?php echo $p->biaya ?></td>
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
            <!-- // if (empty($pengeluaran)) {
            // echo "<tr>
              <td colspan='5'>Data Tidak Ada</td>
            </tr>";
            // } else {
            // foreach ($pengeluaran as $p) {
            // $tanggal = date('d-m-Y', strtotime($p->tanggal));
            // echo "<tr>";
              // echo "<td>" . $no++ . "</td>";
              // echo "<td>" . $p->kode . "</td>";
              // echo "<td>" . $p->tanggal . "</td>";
              // echo "<td>" . $p->nama_pengeluaran . "</td>";
              // echo "<td>" . $p->biaya . "</td>";
              // echo "
            <tr>";
              // }
              // } -->

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