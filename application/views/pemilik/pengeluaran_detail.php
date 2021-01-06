<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Pengeluaran</h2><br>

  <!-- Content Row -->
  <!-- <?php foreach ($pengeluaran as $p) { ?> -->

  <div class="row">

    <div class="col-xl-8 col-lg-7">

      <!-- Area Chart -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Detail Pengeluaran</h6>
        </div>
        <div class="card-body">
          <table>
            <tr>
              <th><i class="fas fa-calendar-week"></i></th>
              <th>Tanggal</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td><?php echo strftime('%A, %d %B %Y', strtotime($p->tanggal)) ?></td>
            </tr>
            <tr>
              <th><i class="fas fa-file-invoice"></i></th>
              <th>Kode Nota</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td><?php echo $p->kode ?></td>
            </tr>
            <tr>
              <th><i class="fas fa-outdent"></i></th>
              <th>Jenis Pengeluaran</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td>
                <?php foreach ($jns_pengeluaran->result() as $jp) : ?>
                  <?php echo $jp->nama_pengeluaran; ?>
                <?php endforeach; ?>
              </td>
            </tr>
            <tr>
              <th><i class="fas fa-dollar-sign"></i></th>
              <th>Biaya</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td>Rp <?php echo number_format($p->biaya, 0, ',', '.') ?></td>
            </tr>
            <tr>
              <th><i class="fas fa-user-alt"></i></th>
              <th>Level</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td>
                <?php foreach ($user->result() as $u) : ?>
                  <?php echo $u->nama_user; ?>
                <?php endforeach; ?>
                <!-- <?php echo $p->nama ?> -->
              </td>
            </tr>
            <tr>
              <th><i class="fas fa-info"></i></th>
              <th>Keterangan</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td><?php echo $p->detail ?></td>
            </tr>
          </table><br>
          <div class="row">
            <div class="col-sm">
              <a href="<?php echo base_url('PengeluaranController/index') ?>" class="btn btn-secondary btn-icon-split" style="margin-top: 2%;">
                <span class="icon text-white-600">
                  <i class="fas fa-chevron-left"></i>
                </span>
                <span class="text">Kembali</span>
              </a>
              <!-- <a href="<?php echo base_url('PengeluaranController/index'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Foto Nota</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <img src="<?php echo base_url('./assets/nota/' . $p->foto) ?>" style="width: 250px; height:250px; display:block; margin:auto">
        </div>
      </div>
    </div>
  </div>

  <!-- <?php
        }
        ?> -->
</div>
<!-- /.container-fluid -->