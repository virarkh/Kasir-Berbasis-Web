<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Pengeluaran</h2><br>

  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Detail Pengeluaran</h6>
        </div>
        <div class="card-body">
          <div class="row no-gutters">
            <div class="col-md-4">
              <!-- <img src="<?php echo base_url('./assets/nota/' . $p->foto) ?>" class="card-img" style="position: relative; transform:translate(0, -50%); top:49%"> -->
              <img src="<?php echo base_url(); ?>//assets/nota/<?php echo $pengeluaran[0]->foto; ?>" class="card-img" style="position: relative; transform:translate(0, -50%); top:49%">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="border-color:white">Tanggal</th>
                    <td style="border-color:white;">: &nbsp; <?php echo strftime('%A, %d %B %Y', strtotime($pengeluaran[0]->tanggal)) ?></td>
                  </tr>
                  <tr>
                    <th>Kode Nota</th>
                    <td>: &nbsp; <?php echo $pengeluaran[0]->kode ?></td>
                  </tr>
                  <tr>
                    <th>Suppliers</th>
                    <td>: &nbsp; <?php echo $pengeluaran[0]->nama_suppliers ?>
                    </td>
                  </tr>
                  <!-- <tr>
                      <th>Biaya</th>
                      <td>: &nbsp; Rp <?php echo number_format($p->biaya, 0, ',', '.') ?></td>
                    </tr>
                    <tr> -->
                  <th>Level</th>
                  <td>: &nbsp; <?php echo $pengeluaran[0]->nama_user ?>
                  </td>
                  </tr>
                  <!-- <tr>
                    <th>Keterangan</th>
                    <td>: &nbsp;
                      <?php
                      foreach ($detailItem as $dp) {
                      ?>
                        <?php echo $dp->item; ?>
                        <?php echo $dp->harga; ?>
                      <?php
                      }
                      ?>
                    </td>
                  </tr> -->
                </table>
              </div>
            </div>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>Nama Item</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($detail_pengeluaran as $dp) {
                ?>
                  <tr>
                    <td style="width: 1%; text-align:center"><?php echo $no++ ?></td>
                    <td><?php echo $dp->item ?></td>
                    <td style="text-align: right; width:30%">Rp <?php echo number_format($dp->harga, 0, ',', '.') ?></td>
                  </tr>
                <?php
                }
                ?>
                <tr style="text-align: right; font-weight:bold">
                  <td colspan="2">Total</td>
                  <td>Rp <?php echo number_format($pengeluaran[0]->biaya, 0, ',', '.') ?></td>
                </tr>


              </tbody>
            </table>
          </div>


          <!-- <a href="<?php echo base_url('PengeluaranController/indexPengeluaran') ?>" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-600">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Kembali</span>
          </a> -->
        </div>
      </div>
    </div>
  </div>

  <style>
    .table-responsive {
      margin-top: 20px !important;
    }

    #table1 {
      width: 2%;
    }

    #table2 {
      width: 30%;
    }

    #table3 {
      width: 30%;
    }

    #table4 {
      width: 20%;
    }
  </style>