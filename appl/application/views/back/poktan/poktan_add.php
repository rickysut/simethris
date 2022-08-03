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
									<h5>DATA KELOMPOK TANI </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($no_poktan) ?>
									<label for="no_poktan" class="col-form-label">Nomor POKTAN</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($nama_poktan) ?>
									<label for="nama_poktan" class="col-form-label">Nama POKTAN</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
                    <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>DATA DOMISILI</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
									<div class="form-row">
															<div class="form-group col-md-6">
																<?php echo form_dropdown('', $get_all_combobox_provinsi, '', $provinsi) ?>
																<small id="provinsiHelpBlock" class="form-text text-muted">
								Silahkan pilih Provinsi yang sesuai.</small>
															</div>
															<div class="form-group col-md-6">
																<select name="kabupaten" class="form-control" id="kabupaten">
																	<option value=''>Pilih Kabupaten</option>
																  </select>
																<small id="kabupatenHelpBlock" class="form-text text-muted">
								Silahkan pilih Kaupaten yang Sesuai.</small>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<select name="kecamatan" class="form-control" id="kecamatan">
																	<option value=''>Pilih Kecamatan</option>
																  </select>
																<small id="kecamatanHelpBlock" class="form-text text-muted">
								Silahkan pilih Kecamatan yang Sesuai.</small>
															</div>
															<div class="form-group col-md-6">
																<select name="desa" class="form-control" id="desa">
																	<option value=''>Pilih desa</option>
																  </select>
																<small id="desaHelpBlock" class="form-text text-muted">
								Silahkan pilih Desa/Kelurahan yang Sesuai.</small>
															</div>
														</div>
								</div>
					</div>
				</div>
				<div class="col-12">
                    <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>KEANGGOTAAN</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
									<div class="form-row align-items-center">
										<div class="col-lg-6">
											<label for="jml_anggota" class="col-form-label">Jumlah Anggota (Orang)</label>
											<?php echo form_input($jml_anggota) ?>
										</div>
										<div class="col-lg-6">
											<label for="luas_lahan" class="col-form-label">Luas Lahan (Ha)</label>
											<?php echo form_input($luas_lahan) ?>
										</div>
									</div>
						</div>
						<div class="card-footer">
									<div class="btn-group" role="group" aria-label="Default button group">
										<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
										<button onclick="location.href='<?php echo base_url('poktan'); ?>'" class="btn btn-primary" type="reset"><i class="icon-loop"></i> Batal -> Back To List</button>
									</div>
						</div>

							</div>
						</div>
			</div>
		</div>
      <?php echo form_close() ?>
	</div>
  </div>
  <?php $this->load->view('back/template/footer'); ?>
  <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
       <?php $this->load->view('back/template/quickpanel'); ?>
  </div>
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
        $(document).ready(function(){
            $("#provinsi").change(function (){
				var myuri = $(this).val().split('|');
				var iduri = myuri[0];
                var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+iduri;
                $('#kabupaten').load(url);
                return false;
            })
			
			$("#kabupaten").change(function (){
				var myuri = $(this).val().split('|');
				var iduri = myuri[0];
                var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+iduri;
                $('#kecamatan').load(url);
                return false;
            })
			
			$("#kecamatan").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>
</div>
<!-- ./wrapper -->
</body>
</html>
