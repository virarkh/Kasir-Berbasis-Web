<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Detail Pengeluaran</h2><br>

  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="margin-top: 5px;">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Detail Pengeluaran</h6>
    </div>

    <div class="card-body">
      <!-- <a href="#" data-toggle="modal" data-target="#modal_tambah" class="btn btn-primary btn-icon-split btn-sm">
        <span class="icon text-white-50">
          <i class="fas fa-flag"></i>
        </span>
        <span class="text">Tambah Item</span>
      </a> -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <!-- <table> -->
          <thead>
            <tr>
              <td id="table1">No</td>
              <td id="table2">Kode Nota</td>
              <td id="table3">Nama Item</td>
              <td id="table4">Harga</td>
              <td id="table5">Aksi</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($detail_pengeluaran as $dp) {
            ?>
              <tr>
                <td style="text-align: center;"><?php echo $no++ ?></td>
                <td><?php echo $dp->kode ?></td>
                <td><?php echo $dp->item ?></td>
                <td>Rp. <?php echo number_format($dp->harga, 0, ',', '.') ?></td>
                <td>
                  <a href="<?php echo base_url('DetailController/editItem/' . $dp->id); ?>" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span></a>
                  <a href="<?php echo base_url('DetailController/delAll/' . $dp->id); ?>" class="btn btn-danger btn-icon-split"><span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <!-- </table> -->
        </table>
      </div>
    </div>
  </div>

  <style>
    .table-responsive {
      margin-top: 20px !important;
    }

    #table1 {
      width: 5%;
    }

    #table2 {
      width: 20%;
    }

    #table3 {
      width: 30%;
    }

    #table4 {
      width: 15%;
    }

    #table5 {
      width: 25%;
    }
  </style>
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