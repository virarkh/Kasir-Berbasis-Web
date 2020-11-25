<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Transaksi Customer</h2><br>

    <div class="row">
        <div class="col-lg-12">
            
            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi Customer</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row form-group">
                            <div class="col-md-2" id="input">
                                Tanggal
                            </div>
                            <div class="col-md-4" >
                                <input type="date" id="input" name="tanggal" class="form-control"  required> 
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-2" id="input">
                                Diskon
                            </div>
                            <div class="col-md-4">
                                <select name="diskon" id="input select" class="form-control" required >
                                    <option>Diskon 1</option>
                                    <option>Diskon 1</option>
                                    <option>Diskon 1</option>
                                </select>
                                <!-- <input type="text" name="nama_metode" placeholder="Masukan metode cuci baru" class="form-control"  required>  -->
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2" id="input">
                                Nama Customer
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="input" name="nama_customer" placeholder="Masukan nama customer" class="form-control" required> 
                            </div>
                            <div class="col-md-2" id="input">
                                Potongan
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="input" name="nama_metode" class="form-control" readonly required> 
                            </div>
                        </div> 
                        <div class="row form-group">
                            <div class="col-md-2" id="input">
                                Jenis Kendaraan
                            </div>
                            <div class="col-md-4">
                                <select name="jenis_kendaraan" id="input" class="form-control" required >
                                    <option>Diskon 1</option>
                                    <option>Diskon 1</option>
                                    <option>Diskon 1</option>
                                </select>
                                <!-- <input type="text" id="input" name="nama_metode" placeholder="Masukan metode cuci baru" class="form-control" required>  -->
                            </div> 
                            <div class="col-md-2" id="input">
                                Total
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="input" name="nama_metode" class="form-control" readonly required> 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2" id="input">
                                Tarif
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="input" name="nama_metode" class="form-control" readonly required> 
                            </div>
                            <div class="col-md-2" id="input">
                                Bayar
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="input" name="nama_metode" placeholder="Besar uang yang diterima" class="form-control" required> 
                            </div> 
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2" id="input">
                                Metode Cuci
                            </div>
                            <div class="col-md-4">
                                <select name="jenis_kendaraan" id="input" class="form-control" required >
                                    <option>Diskon 1</option>
                                    <option>Diskon 1</option>
                                    <option>Diskon 1</option>
                                </select>
                                <!-- <input type="text" id="input" name="nama_metode" placeholder="Masukan metode cuci baru" class="form-control" required>  -->
                            </div>
                            <div class="col-md-2" id="input">
                                Kembalian
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="input" name="nama_metode" class="form-control" readonly required> 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2" id="input">
                                Tarif Tambahan
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="input" name="nama_metode" class="form-control" readonly required> 
                            </div>  
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2" id="input">
                                Sub Total
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="input" name="nama_metode" class="form-control" readonly required> 
                            </div>  
                            <div class="col-md text-right">
                                <button class="btn btn-success col-sm-4" style="margin-top: 3%;">Simpan</button>
                            </div>
                        </div>
                        
                                
                    </form>
                </div>        
            </div>
        </div>
    </div>

</div>

<style>
    #input{
        margin-top: 5px;
        height: 35px;
    }

</style>