<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="doc forms-doc page-layout simple full-width">
    <!-- Content Header (Page header) -->
	<!-- HEADER -->
    <div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
        <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
		<span><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?></span>
		<!-- <nav class="breadcrumb">
			<a class="breadcrumb-item" href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
			<a class="breadcrumb-item" href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i><?php echo $module ?></a>
			<a class="breadcrumb-item" href="<?php echo $page_title ?>"></a>
		</nav> -->
    </div>
	<div class="page-content p-3">
		<?php echo form_open_multipart($action) ?>
		<?php echo validation_errors() ?>
        <div class="content container">
			<div class="row">
				<div class="col-12">
                    <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>ENTRY DATA RIPH</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($no_riph) ?>
									<label for="no_riph" class="col-form-label">Nomor RIPH</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($nama_perusahaan) ?>
									<label for="nama_perusahaan" class="col-form-label">Nama Perusahaan</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($tgl_terbit_riph) ?>
									<label for="tgl_terbit_riph" class="col-form-label">Tanggal Mulai Berlaku RIPH</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($tgl_max_lunas) ?>
									<label for="tgl_max_lunas" class="col-form-label">Tanggal Akhir Berlaku RIPH</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($v_pengajuan) ?>
									<label for="v_pengajuan" class="col-form-label">Volume Import</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($target_tanam) ?>
									<label for="target_tanam" class="col-form-label">Kewajiban Tanam (ha)</label>
								</div>
								
								<div class="form-group col-md-4">
									<?php echo form_input($target_produksi) ?>
									<label for="target_tanam" class="col-form-label">Kewajiban Produksi (ton)</label>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="container">
								<div class="btn-group" role="group" aria-label="Default button group">
									<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
									<button class="btn btn-primary" type="reset"><i class="icon-loop"></i> <?php echo $btn_reset ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close() ?>
	</div>
	</div>
	</div>

  <?php $this->load->view('back/template/footer'); ?>
  <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
            </div>
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
    $('#tgl_terbit_riph').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })
	
	$('#tgl_max_lunas').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })
	
	function hitung() {
      var txtFirstNumberValue = document.getElementById('v_pengajuan').value;
      var tproduksi = ((5/100)*parseFloat(txtFirstNumberValue));
      if (!isNaN(tproduksi)) {
         var ttanam = tproduksi / 6;
		 document.getElementById('target_produksi').value = Math.round(tproduksi);
		 document.getElementById('target_tanam').value = Math.round(ttanam);
      }
	}
	
  </script>
</div>
<!-- ./wrapper -->
</body>
</html>
