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
									<h5>DATA POKTAN </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($id_poktan, $user->id_poktan) ?>
									<?php echo form_input($no_poktan, $user->no_poktan) ?>
									<label for="no_poktan" class="col-form-label">Nomor Poktan</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($nama_poktan, $user->nama_poktan) ?>
									<label for="nama_poktan" class="col-form-label">Nama Kelompok Tani</label>
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
									<h5>DATA LOKASI</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
									<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
									<label for="name" class="col-form-label">Provinsi</label>
								</div>
								<div class="form-group col-md-6">
								<?php $query = $this->db->get_where('wilayah_kabupaten',array('id'=>$user->kabupaten));
									foreach ($query->result() as $value) {
											$datakab = $value->nama;
										}
									?>
									<select name="kabupaten" class="form-control" id="kabupaten" onchange="setpetakota(this.options[this.selectedIndex].value)">
										<option value='<?php echo $user->kabupaten ?>'><?php echo $datakab ?></option>
									</select>
									<label for="name" class="col-form-label">Kabupaten</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
								    <?php $query = $this->db->get_where('wilayah_kecamatan',array('id'=>$user->kecamatan));
									foreach ($query->result() as $value) {
											$datakec = $value->nama;
										}
									?>
									<select name="kecamatan" class="form-control" id="kecamatan">
										<option value='<?php echo $user->kecamatan ?>'><?php echo $datakec ?></option>
									</select>
									<label for="name" class="col-form-label">Kecamatan</label>
								</div>
								<div class="form-group col-md-6">
									<?php $query = $this->db->get_where('wilayah_desa',array('id'=>$user->desa));
									foreach ($query->result() as $value) {
											$datadesa = $value->nama;
										}
									?>
									<select name="desa" class="form-control" id="desa">
										<option value='<?php echo $user->desa ?>'><?php echo $datadesa ?></option>
									</select>
									<label for="name" class="col-form-label">Desa</label>
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
											<label class="sr-only" for="inlineFormInput">Jumlah Anggota</label>
											<?php echo form_input($jml_anggota, $user->jml_anggota) ?>
										</div>
										<div class="col-lg-6">
											<label class="sr-only" for="inlineFormInput">Luas Lahan</label>
											<?php echo form_input($luas_lahan, $user->luas_lahan) ?>
										</div>
									</div>
						</div>
						<div class="card-footer">
									<div class="btn-group" role="group" aria-label="Default button group">
										<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
										<button onclick="location.href='<?php echo $listuri ?>'" class="btn btn-primary" type="reset"><i class="icon-loop"></i> Batal -> Back To List</button>
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

</div>
</body>
</html>
