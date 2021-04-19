<?php if ($this->session->has_userdata('success')) { ?>
	<div class="alert alert-success alert-dismissible responsive">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<i class="icon fa fa-check"></i>
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php } ?>