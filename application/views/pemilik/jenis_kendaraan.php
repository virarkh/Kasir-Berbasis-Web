<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Jenis Kendaraan</h2><br>

  <a href="<?php echo base_url() . 'JenisKendaraanController/tambah' ?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-600">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
  </a>
  <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="margin-top: 5px;">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Jenis Kendaraan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis Kendaraan</th>
              <th>Tarif</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($jenis_kendaraan as $jnskendaraan) { ?>
              <tr>
                <td style="width: 1%;"><?php echo $no++ ?></td>
                <td><?php echo $jnskendaraan->nama_kendaraan ?></td>
                <td>Rp. <?php echo $jnskendaraan->tarif ?></td>
                <td style="width: 25%;">
                  <!-- <?php echo anchor('JenisKendaraanController/edit/' . $jnskendaraan->id, 'Edit'); ?>
                            <?php echo anchor('JenisKendaraanController/hapus/' . $jnskendaraan->id, 'Hapus'); ?> -->
                  <a href="<?php echo base_url('JenisKendaraanController/edit/' . $jnskendaraan->id); ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-100">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span>
                  </a>
                  <a href="<?php echo base_url('JenisKendaraanController/hapus/' . $jnskendaraan->id); ?>" class="btn btn-danger btn-icon-split">
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