<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Transaksi Customer</h2><br>

  <a href="<?php echo base_url() . 'TransaksiController/addTransaksi' ?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-600">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
  </a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="margin-top: 5px;">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
    </div>

    <form method="GET" action="<?php echo base_url('TransaksiController/indexTransaksi') ?>">
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
            echo '<a href="' . base_url('TransaksiController/indexTransaksi') . '" class="btn btn-danger btn-icon-split">
          <span class="icon text-white-600">
          <i class="fas fa-eraser"></i>
          </span>
          <span class="text">
            Reset
          </span></a>';
          // echo '<a href="' . base_url('PengeluaranController/index') . '" class="btn btn-default">Reset</a>';
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
              <th style="width: 1%;">No</th>
              <th>Tanggal</th>
              <th>Invoice</th>
              <th>Nama Customer</th>
              <th style="text-align: center;">Total</th>
              <!-- <th></th> -->
              <th style=" text-align: center; width:25%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($transaksi as $t) {
              setlocale(LC_ALL, 'id-ID', 'id_ID');
            ?>
              <tr>
                <td style="text-align:center"><?php echo $no++ ?></td>
                <td><?php echo strftime('%A, %e %B %Y, %H:%M:%S', strtotime($t->tanggal)) ?></td>
                <td><?php echo $t->invoice ?></td>
                <!-- <td><?php echo $t->nama_kendaraan ?></td> -->
                <td><?php echo $t->nama_customer ?></td>
                <!-- <td style="border-right: hidden;">Rp </td> -->
                <td>Rp <?php echo number_format($t->total, 0, ',', '.') ?></td>
                <td style="text-align: center;">
                  <a href="<?php echo base_url('TransaksiController/detailTransaksi/' . $t->id); ?>" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-100">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Detail</span>
                  </a>
                  <a href="<?php echo base_url('TransaksiController/delTransaksi/' . $t->id); ?>" class="btn btn-danger btn-icon-split">
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