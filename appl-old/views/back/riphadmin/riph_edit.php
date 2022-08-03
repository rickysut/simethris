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
								<div class="form-group col-md-4">
									<label class="col-form-label">Tanggal Update</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($tanggal, $user->tanggal) ?>
								</div>
							</div>
						
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($v_pengajuan_import, $user->v_pengajuan_import) ?>
									<label for="v_pengajuan_import" class="col-form-label">Volume Import</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($v_beban_tanam, $user->v_beban_tanam) ?>
									<label for="v_beban_tanam" class="col-form-label">Kewajiban Tanam (ha)</label>
								</div>
								
								<div class="form-group col-md-4">
									<?php echo form_input($v_beban_produksi, $user->v_beban_produksi) ?>
									<label for="v_beban_produksi" class="col-form-label">Kewajiban Produksi (ton)</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($jml_importir, $user->jml_importir) ?>
									<label for="jml_importir" class="col-form-label">Jumlah Importir</label>
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
   
</div>
  <script type="text/javascript">
	function hitung() {
      var txtFirstNumberValue = document.getElementById('v_pengajuan_import').value;
      var tproduksi = ((5/100)*parseFloat(txtFirstNumberValue));
      if (!isNaN(tproduksi)) {
         var ttanam = tproduksi / 6;
		 document.getElementById('v_beban_produksi').value = Math.round(tproduksi);
		 document.getElementById('v_beban_tanam').value = Math.round(ttanam);
      }
	}
  </script>
<!-- ./wrapper -->
</body>
</html>
