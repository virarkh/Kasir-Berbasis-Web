<div class="container-fluid">

          <!-- Page Heading -->
          <h2 class="h4 text-gray-800">Transaksi Customer</h2><br>

          <a href="<?php echo base_url().'TransaksiController/tambah' ?>" class="btn btn-primary btn-icon-split">
             <span class="icon text-white-600">
             <i class="fas fa-plus"></i>
             </span>
            <span class="text">Tambah Data</span>
          </a>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4" style="margin-top: 5px;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Metode Cuci</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nama Customer</th>
                      <th>Jenis Kendaraan</th>
                      <!-- <th>Metode Cuci</th>
                      <th>Diskon</th> -->
                      <th>Total</th>
                      <th style="text-align: center;">Action</th>
                      <!-- <th>Start date</th>
                      <th>Salary</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach($transaksi as $t){
                  ?> 
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $t->tanggal?></td>
                        <td><?php echo $t->nama_customer?></td>
                        <td><?php echo $t->nama_kendaraan?></td>
                        <td><?php echo $t->total?></td>
                        <!-- <td>#</td>
                        <td>#</td> -->
                        <td style="text-align: center;">
                          <a href="#" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-100">
                              <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">Detail</span>
                          </a>
                          <a href="#" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-100">
                              <i class="fas fa-edit"></i>
                              </span>
                              <span class="text">Edit</span>
                          </a>
                          <a href="#" class="btn btn-danger btn-icon-split">
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