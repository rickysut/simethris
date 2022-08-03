<?php $this->load->view('back/template/meta'); ?>
<div class="wrapper">

  <?php $this->load->view('back/template/navbar'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $page_title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><?php echo $module ?></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

      <?php echo form_open_multipart($action) ?>
      <?php echo validation_errors() ?>

				<div class="box box-primary">
				  <div class="box-header with-border"><h3 class="box-title">DATA RIPH</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
						<div class="form-group">
						  <label for="no_riph" class="col-lg-4 control-label">Nomor RIPH</label>

						  <div class="col-lg-4">
							<?php echo form_input($no_riph) ?>
						  </div>
						</div>
					</div><p>
					<div class="row">
						<div class="form-group">
						  <label for="nama_perusahaan" class="col-lg-4 control-label">Nama Perusahaan</label>

						  <div class="col-lg-8">
							<?php echo form_input($nama_perusahaan) ?>
						  </div>
						</div>
					</div><p>
					<div class="row">
						<div class="form-group">
						  <label for="tgl_terbit_riph" class="col-lg-4 control-label">Tanggal Terbit RIPH</label>

						  <div class="col-lg-2">
							<?php echo form_input($tgl_terbit_riph) ?>
						  </div>
						</div>
					</div><p>
					<div class="row">
						<div class="form-group">
						  <label for="tgl_max_lunas" class="col-lg-4 control-label">Tanggal Maksimal Pelunasan</label>

						  <div class="col-lg-2">
							<?php echo form_input($tgl_max_lunas) ?>
						  </div>
						</div>
					</div><p>
					<div class="row">
						<div class="form-group">
						  <label for="v_pengajuan" class="col-lg-4 control-label">Volume Pengajuan RIPH (Ton)</label>

						  <div class="col-lg-2">
							<?php echo form_input($v_pengajuan) ?>
						  </div>
						</div>
					</div><p>
					<div class="row">
						<div class="form-group">
						  <label for="target_produksi" class="col-lg-4 control-label">Target Produksi (Ton)</label>

						  <div class="col-lg-2">
							<?php echo form_input($target_produksi) ?>
						  </div>
						</div>
					</div><p>
					<div class="row">
						<div class="form-group">
						  <label for="target_tanam" class="col-lg-4 control-label">Target Tanam (Ha)</label>

						  <div class="col-lg-2">
							<?php echo form_input($target_tanam) ?>
						  </div>
						</div>
					</div>
				  </div>
				  <div class="box-footer">
					<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
					<button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
				  </div>
				</div>

        <?php echo form_close() ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
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
