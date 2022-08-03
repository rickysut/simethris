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
									<h5>DATA RIPH </h5>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="form-row">
								<?php echo form_input($id_users, $user->id_users) ?>
								<?php echo form_input($id_mst_riph, $user->id_mst_riph) ?>
								<?php $query = $this->db->get_where('users',array('id_users'=>$user->id_users));
								foreach ($query->result() as $value) {
									$nama_lo = $value->name;
									$namaPers = $value->nama_perusahaan;
								}
								?>
								<div class="form-group col-md-6">
									<?php echo form_input($nama_perusahaan, $namaPers) ?>
									<label for="nama_perusahaan" class="col-form-label">Nama Perusahaan</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($name, $nama_lo) ?>
									<label for="name" class="col-form-label">Nama L.O</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($nomor_riph, $user->nomor_riph) ?>
									<label for="nomor_riph" class="col-form-label">Nomor RIPH</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($jenis_riph, $user->jenis_riph) ?>
									<label for="jenis_riph" class="col-form-label">Jenis RIPH</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($tgl_mulai_berlaku, $user->tgl_mulai_berlaku) ?>
									<label for="tgl_mulai_berlaku" class="col-form-label">Tanggal Mulai Berlaku</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($tgl_akhir_berlaku, $user->tgl_akhir_berlaku) ?>
									<label for="tgl_akhir_berlaku" class="col-form-label">Tanggal Akhir Berlaku</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($v_pengajuan_riph, $user->v_pengajuan_riph ) ?>
									<label for="v_pengajuan_riph" class="col-form-label">Volume Pengajuan (Ton)</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($beban_tanam, $user->beban_tanam) ?>
									<label for="beban_tanam" class="col-form-label">Kewajiban Tanam (Ha)</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($beban_produksi, $user->beban_produksi) ?>
									<label for="beban_produksi" class="col-form-label">Kewajiban Produksi (Ton)</label>
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
									<h5>STATUS VERIFIKASI </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<label for="is_verifikasi_1" class="form-control-label">Status Verifikasi:</label>
								<?php echo form_dropdown('', $is_verifikasi_1_value, '', $is_verifikasi_1) ?>
							</div>
							<div class="form-row">
								<label for="keterangan_1" class="form-control-label">Keterangan:</label>
								<?php echo form_textarea($keterangan_1) ?>
							</div>
							
							<div class="form-row">
								<div class="form-group col-md-6">
									<input type="file" name="file_riph" id="file_riph" class="form-control" onchange="photoPreview(this,'riphpreview')"/>
									<p class="help-block">File PDF/JPG/PNG</p>
									<img id="riphpreview" width="auto" height="250px"/>
									<label for="file_form5" class="col-form-label">Berkas Surat Lunas</label>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="btn-group" role="group" aria-label="Default button group">
									<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
									<button class="btn btn-primary" type="reset"><i class="icon-loop"></i> <?php echo $btn_reset ?></button>
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
    $('#tgl_mulai_berlaku').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    });
	$('#tgl_akhir_berlaku').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    });
    

    function photoPreview(photo,idpreview)
    {
	  if(photo.files.size > 2*1024*1024) {
			alert('Error : Ukuran File Lebih Dari 2MB');
			return;
		}
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview=document.getElementById(idpreview);
        var reader = new FileReader();
		
        if (gbPreview.type.match(imageType))
        {
          //jika tipe data sesuai
          preview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(preview);
          //membaca data URL gambar
          reader.readAsDataURL(gbPreview);
        }
          else
          {
            //jika tipe data tidak sesuai
            alert("Maaf Hanya file berakhiran .png, .gif atau .jpg yang bisa ditampilkan. File PDF dan DOCX tidak bisa di tampilkan tapi tetap tersimpan di database");
          }
      }
    }
  </script>
 <script type="text/javascript">
	function hitung() {
      var txtFirstNumberValue = document.getElementById('v_pengajuan_riph').value;
      var tproduksi = ((5/100)*parseFloat(txtFirstNumberValue));
      if (!isNaN(tproduksi)) {
         var ttanam = tproduksi / 6;
		 document.getElementById('beban_produksi').value =(Math.round(tproduksi * 100) / 100).toFixed(2);
		 document.getElementById('beban_tanam').value = (Math.round(ttanam * 100) / 100).toFixed(2);
      }
	}
	
  </script>

</div>
<!-- ./wrapper -->

</body>
</html>
