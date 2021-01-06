<!-- Modal untuk tambah data mahasiswa -->
<div class="modal fade" id="detaildata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formtambahdata">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="inputPassword">Tanggal</label>
                        </div>
                        <div class="col-sm-9">
                            <input type=datetime-local class="form-control" id="tanggal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="inputPassword">Customer</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_customer" placeholder="Masukkan Jenis Kendaraan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="jenis_kendaraan">Kendaraan</label>
                        </div>
                        <div class="col-sm-5">
                            <select name="jenis_kendaraan" id="input" class="form-control" required>
                                <option>Diskon 1</option>
                                <option>Diskon 1</option>
                                <option>Diskon 1</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="nama_customer" placeholder="Masukkan Jenis Kendaraan" required> -->
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama_customer" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="jenis_kendaraan">Cuci</label>
                        </div>
                        <div class="col-sm-5">
                            <select name="jenis_kendaraan" id="input" class="form-control" required>
                                <option>Diskon 1</option>
                                <option>Diskon 1</option>
                                <option>Diskon 1</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="nama_customer" placeholder="Masukkan Jenis Kendaraan" required> -->
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama_customer" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="jenis_kendaraan">Sub Total</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_customer" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="jenis_kendaraan">Diskon</label>
                        </div>
                        <div class="col-sm-5">
                            <select name="jenis_kendaraan" id="input" class="form-control" required>
                                <option>Diskon 1</option>
                                <option>Diskon 1</option>
                                <option>Diskon 1</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="nama_customer" placeholder="Masukkan Jenis Kendaraan" required> -->
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama_customer" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="jenis_kendaraan">Total</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_customer" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="jenis_kendaraan">Bayar</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_customer" placeholder="Masukkan Jenis Kendaraan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="jenis_kendaraan">Kembalian</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_customer" readonly>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // ini adalah fungsi untuk mengambil data mahasiswa dan di  incluce ke dalam datatable
        var datamahasiswa = $('#tambahdata').DataTable({
            "processing": true,
            "ajax": "<?= base_url("index.php/home/datamahasiswa") ?>",
            stateSave: true,
            "order": []
        })

        // fungsi untuk menambah data  
        // pilih selector dari yang id formtambahdatamhs  
        $('#formtambahdata').on('submit', function() {
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
                    $('#tambahdata').modal('hide');
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
        $('#datamahasiswa').on('click', '.hapus-mahasiswa', function() {
            var id = $(this).data('id');
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
                        url: "<?= base_url('index.php/home/hapusmahasiswa') ?>",
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