<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Pengeluaran</h2><br>

  <!-- Content Row -->
  <!-- <?php foreach ($pengeluaran as $p) { ?> -->

  <div class="row">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Detail Pengeluaran</h6>
        </div>
        <div class="card-body">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="<?php echo base_url('./assets/nota/' . $p->foto) ?>" class="card-img" style="position: relative; transform:translate(0, -50%); top:49%">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="border-color:white">Tanggal</th>
                    <td style="border-color:white;">: &nbsp; <?php echo strftime('%A, %d %B %Y', strtotime($p->tanggal)) ?></td>
                  </tr>
                  <tr>
                    <th>Kode Nota</th>
                    <td>: &nbsp; <?php echo $p->kode ?></td>
                  </tr>
                  <tr>
                    <th>Pengeluaran</th>
                    <td>: &nbsp;
                      <?php foreach ($jns_pengeluaran->result() as $jp) : ?>
                        <?php echo $jp->nama_pengeluaran; ?>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Biaya</th>
                    <td>: &nbsp; Rp <?php echo number_format($p->biaya, 0, ',', '.') ?></td>
                  </tr>
                  <tr>
                    <th>Level</th>
                    <td>: &nbsp;
                      <?php foreach ($user->result() as $u) : ?>
                        <?php echo $u->nama_user; ?>
                      <?php endforeach; ?>
                      <!-- <?php echo $p->nama ?> -->
                    </td>
                  </tr>
                  <tr>
                    <th>Keterangan</th>
                    <td>: &nbsp; <?php echo $p->detail ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <a href="<?php echo base_url('PengeluaranController/indexPengeluaran') ?>" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-600">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Kembali</span>
          </a>
        </div>
      </div>
    </div>
    <!-- <?php
        }
          ?> -->
  </div>