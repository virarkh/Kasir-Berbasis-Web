<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Daftar Pengguna</h2><br>

  <!-- Content Row -->
  <?php foreach ($user as $u) { ?>

    <div class="row">

      <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4" id="body">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Profil</h6>
          </div>
          <div class="card-body">
            <div class="row no-gutters">
              <!-- GAK JADI -->
              <!-- <div class="view overlay zoom">
                <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(131).jpg" class="img-fluid " alt="smaple image">
                <div class="mask flex-center">
                  <p class="white-text">Zoom effect</p>
                </div>
              </div> -->
              <div class="col-md-4">
                <img src="<?php echo base_url('./assets/profil/' . $u->foto_profil) ?>" class="card-img">
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-7">
                <h4 style="text-align: center;"><b><?php echo $u->nama_user ?></b></h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th><span><i class="far fa-user"></i></span>&nbsp; Username</th>
                      <td>: <?php echo $u->username ?></td>
                    </tr>
                    <tr>
                      <th><span><i class="fas fa-phone"></i></span>&nbsp; No Handphone</th>
                      <td>: <?php echo $u->no_hp ?></td>
                    </tr>
                    <tr>
                      <th><span><i class="fas fa-envelope"></i></span>&nbsp; Email</th>
                      <td>: <?php echo $u->email ?></td>
                    </tr>
                    <tr>
                      <th><span><i class="fas fa-user-tag"></i></span>&nbsp; Sebagai</th>
                      <td>:
                        <?php foreach ($role->result() as $r) : ?>
                          <?php echo $r->nama; ?>
                        <?php endforeach; ?>
                      </td>
                    </tr>
                    <tr>
                      <th><span><i class="fas fa-home"></i></span>&nbsp; Alamat</th>
                      <td>: <?php echo $u->alamat ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <a href="<?php echo base_url('AuthController/daftar') ?>" class="btn btn-secondary btn-icon-split" style="text-align:center">
              <span class="icon text-white-600">
                <i class="fas fa-chevron-left"></i>
              </span>
              <span class="text">Kembali</span>
            </a>

          </div>
        </div>
      </div>
    </div>

  <?php
  }
  ?>

</div>
<!-- /.container-fluid -->

<style>
  .card-img {
    transition: transform .2s;
    position: relative;
  }

  .card-img:hover {
    transform: scale(1.5);
  }

  /* .card-body {}

  .card-img {
    background-position: center;
    transition: 1s;
    cursor: zoom-in;
  }

  .card-img :hover {
    background-size: 150% !important;
    backgrousnd-position: center;
  } */

  #magnifying_area {
    /* width: 800px;
    height: 500px; */
    overflow: hidden;
    /* border: 3px solid #fff; */
    position: relative;
    /* display: flex; */
  }

  #magnifying_img {
    /* max-width: 100%;
    min-width: 100%; */
    /* position: absolute; */
    /* left: 50%;
    top: 50%; */
    /* transform: translate(-50%, -50%) */
    position: relative;
    transform: translate(0%, -50%);
    top: 49%;
    pointer-events: none;
  }
</style>

<script src="<?php echo base_url() ?>assets/js/zoom.js"></script>

<script>
  // var magnifying_area = document.getElementById("magnifying_area");
  // var magnifying_img = document.getElementById("magnifying_img");

  // magnifying_area.addEventListener("mousemove", function() {

  //   magnifying_img.style.transform = 'translate(-0%, -50%) scale(2)'

  // });

  // magnifying_area.addEventListener("mouseleave", function() {

  //   magnifying_img.style.transform = 'translate(-0%, -50%) scale(1)'

  // });
  // var options = {
  //   width: 400,
  //   height: 250,
  //   zoomWidth: 500,
  //   offset: {
  //     vertical: 0,
  //     horizontal: 10
  //   },
  //   scale: 1.5,
  //   zoomPosition: original
  // }

  // new ImageZoom(document.getElementById("img-zoom"), options);
</script>