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
          <table style="font-size: 13pt;">
            <tr>
              <th><i class="fas fa-calendar-week"></i></th>
              <th>Tanggal</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td><?php echo $p->tanggal ?></td>
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
                <!-- <?php echo $p->nama_pengeluaran ?> -->
              </td>
            </tr>
            <tr>
              <th><i class="fas fa-dollar-sign"></i></th>
              <th>Biaya</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td><?php echo $p->biaya ?></td>
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
            <!-- <tr>
               <th><span><i class="fas fa-user-tag"></i></span>&nbsp; Sebagai</th>
               <td></td>
               <td>:</td>
               <td></td>
               <td><?php echo $u->nama ?></td>
            </tr> -->
            <tr>
              <th><i class="fas fa-info"></i></th>
              <th>Keterangan</th>
              <td></td>
              <td>:</td>
              <td></td>
              <td><?php echo $p->detail ?></td>
            </tr>
          </table>
        </div>

        <a class="btn btn-secondary col-sm-2" style="margin-left:20px; margin-top: 50px; margin-bottom: 10px" href="<?php echo base_url() . 'AuthController/daftar' ?>"><span><i class="fas fa-chevron-left"></i></span>&nbsp; Kembali</a>

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