<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800" style="text-align: center;">Ganti Password</h2><br>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="container col-md-6" style="position: relative;">
            <div>
                <div class="card shadow">
                    <div class="card-body">

                        <form action="<?php echo base_url('KasirController/ganti_pass') ?>" method="POST">
                            <div class="form-group row">
                                <label for="current_password" class="col-sm-4 col-form-label">Current Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="current_password" id="current_password">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password1" class="col-sm-4 col-form-label">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="new_password1" id="new_password1">
                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password2" class="col-sm-4 col-form-label">Repeat Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="new_password2" id="new_password2">
                                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $($this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>