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
								<div class="form-group col-md-6">
									<label for="nomor_riph">Nomor RIPH</label>
									<?php echo form_input($nomor_riph) ?>
									
								</div>
								<div class="form-group col-md-6">
									<label for="jenis_riph">Jenis RIPH</label>
									<?php echo form_input($jenis_riph) ?>
									
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="tgl_mulai_berlaku">Tanggal Terbit</label>
									<?php echo form_input($tgl_mulai_berlaku) ?>
									
								</div>
								<div class="form-group col-md-6">
									<label for="tgl_akhir_berlaku">Tanggal Akhir Berlaku</label>
									<?php echo form_input($tgl_akhir_berlaku) ?>
									
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="v_pengajuan_riph">Volume Pengajuan (Ton)</label>
									<?php echo form_input($v_pengajuan_riph) ?>
									
								</div>
								<div class="form-group col-md-4">
									
									<label for="beban_tanam">Kewajiban Tanam (Ha)</label>
									<?php echo form_input($beban_tanam) ?>
								</div>
								<div class="form-group col-md-4">
									
									<label for="beban_produksi">Kewajiban Produksi (Ton)</label>
									<?php echo form_input($beban_produksi) ?>
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
									<h5>UNGGAH BERKAS </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<div >
										<img id="riphpreview" src="<?php echo base_url('/assets/images/pdf_thumb.png') ?>" width="auto" height="150px"/>
									</div>	
									<div class="custom-file" >
										
										<input type="file" name="file_riph" id="file_riph" class="form-control" onchange="photoPreview(this,'riphpreview', 'labelriph')"/>
										<label id="labelriph" class="custom-file-label" for="file_riph">Berkas Surat Penerbitan RIPH</label>
									</div>
									
								</div>
								<div class="form-group col-md-6">
									<div >
										<img id="f5preview" src="<?php echo base_url('/assets/images/pdf_thumb.png') ?>" width="auto" height="150px"/>
									</div>
									<div class="custom-file" >
										<input type="file" name="file_form5" id="file_form5" class="form-control" onchange="photoPreview(this,'f5preview', 'labelf5')"/>
										<label id='labelf5' class="custom-file-label" for="file_form5">Surat pernyataan kesangggupan (Form-5)</label>
										
									</div>
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
	$("#tgl_mulai_berlaku").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_akhir_berlaku").datepicker('setStartDate', startDate);
        if($("#tgl_mulai_berlaku").val() > $("#tgl_akhir_berlaku").val()){
          $("#tgl_akhir_berlaku").val($("#tgl_mulai_berlaku").val());
        }
    });
    

    function photoPreview(photo,idpreview,idlabel)
    {
		
		var preview=document.getElementById(idpreview);
		var labels=document.getElementById(idlabel);
		//var pdf=document.getElementById(idpdf);
		preview.setAttribute('src', '');
	  if(photo.files[0].size > 2*1024*1024) {
			alert('Error : Ukuran File Lebih Dari 2MB');
			return;
		}
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        
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
		  labels.innerHTML = photo.files[0].name;
        }
		else
		{
		//jika tipe data tidak sesuai
		//alert("Maaf Hanya file berakhiran .png, .gif atau .jpg yang bisa ditampilkan. File PDF dan DOCX tidak bisa di tampilkan tapi tetap tersimpan di database");
		//pdf.setAttribute('src', photo.files[0].name );
		preview.setAttribute('src', '<?php echo base_url('/assets/images/pdf_thumb.png') ?>');
		labels.innerHTML = photo.files[0].name;
		}
      }
    }
  </script>
  <script type="text/javascript">
	function hitung() {
      var txtFirstNumberValue = document.getElementById('v_pengajuan_riph').value;
	  if (!txtFirstNumberValue==0)
	  {
		var tproduksi = ((5/100)*parseFloat(txtFirstNumberValue));
		if (!isNaN(tproduksi)) {
			var ttanam = tproduksi / 6;
			document.getElementById('beban_produksi').value =(Math.round(tproduksi * 100) / 100).toFixed(2);
			document.getElementById('beban_tanam').value = (Math.round(ttanam * 100) / 100).toFixed(2);
		} else {
			document.getElementById('beban_produksi').value ='';
			document.getElementById('beban_tanam').value = '';	
		}
	  } else {
		document.getElementById('beban_produksi').value ='';
		document.getElementById('beban_tanam').value = '';
	  }
	}
	
  </script>
</div>
<!-- ./wrapper -->
</body>
</html>
