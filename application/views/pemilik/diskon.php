<div class="container-fluid">

          <!-- Page Heading -->
          <h2 class="h4 text-gray-800">Diskon</h2><br>

          <a href="<?php echo base_url().'DiskonController/tambah'?>" class="btn btn-primary btn-icon-split">
             <span class="icon text-white-600">
             <i class="fas fa-plus"></i>
             </span>
            <span class="text">Tambah Data</span>
          </a>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4" style="margin-top: 5px;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Diskon</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Diskon</th>
                      <th>Potongan Harga</th>
                      <th>Action</th>
                      <!-- <th>Start date</th>
                      <th>Salary</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($diskon as $d){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d->nama_diskon ?></td>
                      <td><?php echo $d->potongan_harga ?></td>
                      <td>
                          <!-- <?php echo anchor('DiskonController/edit/'.$d->id, 'Edit');?>
                          <?php echo anchor('DiskonController/hapus/'.$d->id, 'Hapus');?> -->
                        <a href="<?php echo base_url('DiskonController/edit/'.$d->id);?>" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-100">
                            <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>
                        <a href="<?php echo base_url('DiskonController/hapus/'.$d->id)?>" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-100">
                            <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </a>
                      </td>
                      <!-- <td>2011/04/25</td>
                      <td>$320,800</td> -->
                    </tr>

                    <?php } ?>
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>