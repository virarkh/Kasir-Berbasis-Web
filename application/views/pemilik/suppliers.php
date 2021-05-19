<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Suppliers</h2><br>

  <a href="<?php echo base_url() . 'SuppliersController/addSup' ?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-600">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
  </a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="margin-top: 5px;">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Suppliers</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Suppliers</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($suppliers as $s) {
            ?>
              <tr>
                <td style="width: 1%; text-align:center"><?php echo $no++ ?></td>
                <td><?php echo $s->nama_suppliers ?></td>
                <td style="width: 25%;">
                  <a href="<?php echo base_url('SuppliersController/editSup/' . $s->id); ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-100">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span>
                  </a>
                  <a href="<?php echo base_url('SuppliersController/delSup/' . $s->id); ?>" class="btn btn-danger btn-icon-split">
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