<div class="container-fluid">

          <!-- Page Heading -->
          <h2 class="h4 text-gray-800">Daftar Pengguna</h2><br>

          <a href="<?php echo base_url().'AuthController/tambah'?>" class="btn btn-primary btn-icon-split">
             <span class="icon text-white-600">
             <i class="fas fa-plus"></i>
             </span>
            <span class="text">Tambah Data</span>
          </a>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4" style="margin-top: 5px;">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="text-align: center;" >No</th>
                      <th>Foto Profil</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Action</th>
                      <!-- <th>Start date</th>
                      <th>Salary</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($user as $u){
                    ?>
                    <tr>
                        <td style="text-align: center;" ><?php echo $no++ ?></td>
                        <td style="text-align: center;" >
                        <?php if ($u->foto_profil == '') {
                          } else { ?>
                          <img src="<?php echo base_url('./profil/' . $u->foto_profil) ?>" / style="width:100px; border-radius:0%"></td>
                        <?php } ?>
                        </td>
                        <!-- <td><img src="<?php echo base_url()?>$u->foto_profil?>"></td> -->
                        <td><?php echo $u->nama_user ?></td>
                        <td><?php echo $u->username ?></td>
                        <td><?php echo $u->nama?></td>
                        <td>
                            <a href="<?php echo base_url('AuthController/detail/'.$u->id);?>" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-100">
                                  <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Detail</span>
                            </a>

                            <a href="<?php echo base_url('AuthController/edit/'.$u->id);?>" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-100">
                                <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            
                            <a href="<?php echo base_url('AuthController/hapus/'.$u->id);?>" class="btn btn-danger btn-icon-split">
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



<script>
      $(document).ready(function () {
        // ini adalah fungsi untuk mengambil data mahasiswa dan di  incluce ke dalam datatable
          var datamahasiswa = $('#datamahasiswa').DataTable({
                  "processing": true,
                  "ajax": "<?=base_url("index.php/home/datamahasiswa")?>",
                  stateSave: true,
                  "order": []
          })
            
          // fungsi untuk menambah data  
          // pilih selector dari yang id formtambahdatamhs  
          $('#formtambahdatamhs').on('submit', function () {
            var nama = $('#nama').val(); // diambil dari id nama yang ada diform modal
            var alamat = $('#alamat').val(); // diambil dari id alamat yanag ada di form modal 

            $.ajax({
              type: "post",
              url: "<?=base_url('index.php/home/tambahmhs')?>",
              beforeSend :function () {
                swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                      swal.showLoading()
                    }
                  })      
                },
              data: {nama:nama,alamat:alamat}, // ambil datanya dari form yang ada di variabel
              dataType: "JSON",
              success: function (data) {
                datamahasiswa.ajax.reload(null,false);
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
          $('#datamahasiswa').on('click','.ubah-mahasiswa', function () {
            // ambil element id pada saat klik ubah
            var id =  $(this).data('id');
            
            $.ajax({
              type: "post",
              url: "<?=base_url('index.php/home/formedit')?>",
              beforeSend :function () {
                swal({
                    title: 'Menunggu',
                    html: 'Memproses data',
                    onOpen: () => {
                      swal.showLoading()
                    }
                  })      
                },
              data: {id:id},
              success: function (data) {
                swal.close();
                $('#editmahasiswa').modal('show');
                $('#formdatamahasiswa').html(data);
                
                // proses untuk mengubah data
                $('#formubahdatamhs').on('submit', function () {
                    var editnama = $('#editnama').val(); // diambil dari id nama yang ada diform modal
                    var editalamat = $('#editalamat').val(); // diambil dari id alamat yanag ada di form modal 
                    var id = $('#idmhs').val(); //diambil dari id yang ada di form modal
                    $.ajax({
                      type: "post",
                      url: "<?=base_url('index.php/home/ubahmahasiswa')?>",
                      beforeSend :function () {
                        swal({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                              swal.showLoading()
                            }
                          })      
                        },
                      data: {editnama:editnama,editalamat:editalamat,id:id}, // ambil datanya dari form yang ada di variabel
                      
                      success: function (data) {
                        datamahasiswa.ajax.reload(null,false);
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
          $('#datadiskon').on('click','.hapus-diskon', function () {
            var id =  $(this).data('$d->id');
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
                    url:"<?php echo base_url('DiskonController/hapus/'.$d->id)?>",
                    // url:"<?=base_url('index.php/home/hapusmahasiswa')?>",  
                    method:"post",
                    beforeSend :function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                          swal.showLoading()
                        }
                      })      
                    },    
                    data:{id:id},
                    success:function(data){
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