<?php if ($this->session->has_userdata('warning')) { ?>
	<div class="alert alert-danger alert-dismissible responsive">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		<i class="icon fa fa-exclamation"></i>
		<?php echo $this->session->flashdata('warning'); ?>
	</div>
<?php } ?>