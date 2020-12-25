<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Diskon</h2><br>

  <a href="<?php echo base_url() . 'DiskonController/tambah' ?>" class="btn btn-primary btn-icon-split">
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
            foreach ($diskon as $d) {
            ?>
              <tr>
                <td style="width: 1%;"><?php echo $no++ ?></td>
                <td><?php echo $d->nama_diskon ?></td>
                <td>Rp. <?php echo $d->potongan_harga ?></td>
                <td style="width: 25%;">
                  <a href="<?php echo base_url('DiskonController/edit/' . $d->id); ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-100">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span>
                  </a>
                  <!-- <button class="btn btn-danger btn-icon-split hapus-diskon" id="id" data-toggle="modal" data-id=".$d->id.">
                            <span class="icon text-white-100">
                            <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hapus</span>
                        </button> -->
                  <a href="<?php echo base_url('DiskonController/hapus/' . $d->id) ?>" class="btn btn-danger btn-icon-split">
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



<script>
  $(document).ready(function() {
    // ini adalah fungsi untuk mengambil data mahasiswa dan di  incluce ke dalam datatable
    var datamahasiswa = $('#datamahasiswa').DataTable({
      "processing": true,
      "ajax": "<?= base_url("index.php/home/datamahasiswa") ?>",
      stateSave: true,
      "order": []
    })

    // fungsi untuk menambah data  
    // pilih selector dari yang id formtambahdatamhs  
    $('#formtambahdatamhs').on('submit', function() {
      var nama = $('#nama').val(); // diambil dari id nama yang ada diform modal
      var alamat = $('#alamat').val(); // diambil dari id alamat yanag ada di form modal 

      $.ajax({
        type: "post",
        url: "<?= base_url('index.php/home/tambahmhs') ?>",
        beforeSend: function() {
          swal({
            title: 'Menunggu',
            html: 'Memproses data',
            onOpen: () => {
              swal.showLoading()
            }
          })
        },
        data: {
          nama: nama,
          alamat: alamat
        }, // ambil datanya dari form yang ada di variabel
        dataType: "JSON",
        success: function(data) {
          datamahasiswa.ajax.reload(null, false);
          swal({
            type: 'success',
            title: 'Tambah Mahasiswa',
            text: 'Anda Berhasil Menambah Mahasiswa'
          })
          // bersihkan form pada modal
          $('#tambahmahasiswa').modal('hide');
          // tutup modal
          $('#nama').val('');
          $('#alamat').val('');

        }
      })
      return false;
    });
    // fungsi untuk edit data
    //pilih selector dari table id datamahasiswa dengan class .ubah-mahasiswa
    $('#datamahasiswa').on('click', '.ubah-mahasiswa', function() {
      // ambil element id pada saat klik ubah
      var id = $(this).data('id');

      $.ajax({
        type: "post",
        url: "<?= base_url('index.php/home/formedit') ?>",
        beforeSend: function() {
          swal({
            title: 'Menunggu',
            html: 'Memproses data',
            onOpen: () => {
              swal.showLoading()
            }
          })
        },
        data: {
          id: id
        },
        success: function(data) {
          swal.close();
          $('#editmahasiswa').modal('show');
          $('#formdatamahasiswa').html(data);

          // proses untuk mengubah data
          $('#formubahdatamhs').on('submit', function() {
            var editnama = $('#editnama').val(); // diambil dari id nama yang ada diform modal
            var editalamat = $('#editalamat').val(); // diambil dari id alamat yanag ada di form modal 
            var id = $('#idmhs').val(); //diambil dari id yang ada di form modal
            $.ajax({
              type: "post",
              url: "<?= base_url('index.php/home/ubahmahasiswa') ?>",
              beforeSend: function() {
                swal({
                  title: 'Menunggu',
                  html: 'Memproses data',
                  onOpen: () => {
                    swal.showLoading()
                  }
                })
              },
              data: {
                editnama: editnama,
                editalamat: editalamat,
                id: id
              }, // ambil datanya dari form yang ada di variabel

              success: function(data) {
                datamahasiswa.ajax.reload(null, false);
                swal({
                  type: 'success',
                  title: 'Update Mahasiswa',
                  text: 'Anda Berhasil Mengubah Data Mahasiswa'
                })
                // bersihkan form pada modal
                $('#editmahasiswa').modal('hide');
              }
            })
            return false;
          });
        }
      });
    });
    // fungsi untuk hapus data
    //pilih selector dari table id datamahasiswa dengan class .hapus-mahasiswa
    $('#datadiskon').on('click', '.hapus-diskon', function() {
      var id = $(this).data('$d->id');
      swal({
        title: 'Konfirmasi',
        text: "Anda ingin menghapus ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Tidak',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?php echo base_url('DiskonController/hapus/' . $d->id) ?>",
            // url:"<?= base_url('index.php/home/hapusmahasiswa') ?>",  
            method: "post",
            beforeSend: function() {
              swal({
                title: 'Menunggu',
                html: 'Memproses data',
                onOpen: () => {
                  swal.showLoading()
                }
              })
            },
            data: {
              id: id
            },
            success: function(data) {
              swal(
                'Hapus',
                'Berhasil Terhapus',
                'success'
              )
              datamahasiswa.ajax.reload(null, false)
            }
          })
        } else if (result.dismiss === swal.DismissReason.cancel) {
          swal(
            'Batal',
            'Anda membatalkan penghapusan',
            'error'
          )
        }
      })
    });

  });
</script>