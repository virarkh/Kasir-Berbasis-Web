<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Diskon</h2><br>

    <div class="row">
        <div class="col-lg-12">
            
            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Daftar Diskon</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($diskon as $d) {?> 
                        <form action="<?php echo base_url(). 'DiskonController/edit_data';?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $d->id ?>"> 
                            <div class="form-group">
                                <p>Nama Diskon
                                    <input type="text" name="nama_diskon" value="<?php echo $d->nama_diskon?>" placeholder="Masukkan nama diskon baru" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div> 
                            <div class="form-group">
                                <p>Potongan Harga
                                    <input type="text" name="potongan_harga" value="<?php echo $d->potongan_harga?>" placeholder="Masukkan potongan harga baru" class="form-control" style="margin-top: 5px;" required>
                                </p>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-success col-sm-2" style="margin-top: 3%;">Simpan</button>
                            </div>
                        </form>
                    <?php } ?>

                    
                    
                </div>
                
            </div>
        </div>
    </div>

</div>