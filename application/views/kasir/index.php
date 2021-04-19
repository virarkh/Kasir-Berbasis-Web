<div class="container-fluid">

	<!-- Page Heading -->
	<h2 class="h4 text-gray-800" style="text-align:center">Daftar Transaksi</h2><br>

	<a href="<?php echo base_url() . 'KasirController/addKasir' ?>" class="btn btn-primary btn-icon-split">
		<span class="icon text-white-600">
			<i class="fas fa-plus"></i>
		</span>
		<span class="text">Tambah Data</span>
	</a>

	<!-- DataTales Example -->
	<div class="card shadow mb-4" style="margin-top: 15px;">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
		</div>

		<form method="GET" action="<?php echo base_url('KasirController/indexKasir') ?>">
			<div class="row" style="margin-top: 2%; margin-left:1%">
				<div class="col-md-6 input-group">
					Filter Tanggal &nbsp;
					<input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
					<span class="input-group-addon">&nbsp; s/d &nbsp;</span>
					<input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
				</div>
				<div class="col-md-6">
					<button type="submit" name="filter" value="true" class="btn btn-primary btn-icon-split">
						<span class="icon text-white-600">
							<i class="fas fa-search"></i>
						</span>
						<span class="text">
							Tampilkan
						</span>
					</button>
					<a href="<?php echo $url_cetak ?>" class="btn btn-warning btn-icon-split">
						<span class="icon text-white-600">
							<i class="fas fa-file"></i>
						</span>
						<span class="text">Cetak PDF</span>
					</a>
					<?php
					if (isset($_GET['filter']))
						echo '<a href="' . base_url('KasirController/indexKasir') . '" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-600">
            <i class="fas fa-eraser"></i>
            </span>
            <span class="text">
              Reset
            </span></a>';
					?>
				</div>
			</div>
		</form>

		<p style="text-align:center; margin-bottom: -2%; margin-top:2%"><b><?php echo $label ?></b></p>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr style="text-align:center">
							<th>No</th>
							<th>Invoice</th>
							<th>Tanggal</th>
							<th>Customer</th>
							<th>Kendaraan</th>
							<th>Metode</th>
							<th>Sub Total</th>
							<th>Diskon</th>
							<th>Total</th>
						</tr>
					</thead>
					<?php
					$no = 1;
					foreach ($transaksi as $t) {
						setlocale(LC_ALL, 'id-ID', 'id-ID')
					?>
						<tr>
							<td style="text-align: center;"><?php echo $no++ ?></td>
							<td><?php echo $t->invoice ?></td>
							<td><?php echo strftime('%A,%e-%b-%y %H:%M:%S', strtotime($t->tanggal)) ?></td>
							<td><?php echo $t->nama_customer ?></td>
							<td>
								Rp <?php echo number_format($t->tarif, 0, ',', '.') ?><br>
								<?php echo $t->nama_kendaraan ?>
							</td>
							<td>
								Rp <?php echo number_format($t->tarif_tambahan, 0, ',', '.') ?><br>
								<?php echo $t->nama_metode ?>
							</td>
							<td>Rp <?php echo number_format($t->sub_total, 0, ',', '.') ?></td>
							<td>
								Rp <?php echo number_format($t->potongan_harga, 0, ',', '.') ?><br>
								<?php echo $t->nama_diskon ?>
							</td>
							<td>Rp <?php echo number_format($t->total, 0, ',', '.') ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

</div>

<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom1.js') ?>"></script>
<script>
	$(document).ready(function() {
		setDateRangePicker(".tgl_awal", ".tgl_akhir");
	})
</script>