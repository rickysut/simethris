<?php $this->load->view('back/template/meta_new'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>

<div class="page-wrapper">
	<div class="row page-titles">
        <div class="col-md-5 align-self-center">
			<h3 class="text-themecolor"><?php echo $page_title ?></h3>
			<span><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?></span>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $page_title ?></li>
            </ol>
        </div>
    </div>
	<div class="container-fluid">
		<?php echo form_open_multipart($action) ?>
		<?php echo validation_errors() ?>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-actions small">
							<a class="fa fa-info-circle"></a><i> Data ini diisi berdasarkan Surat Penerbitan Rekomendasi Import Produk Hortikultura</i>
						</div>
						<h4 class="card-titles">DATA RIPH</h4>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="form-group col-md-6">
								<?php echo form_input($nomor_riph) ?>
								<label for="nomor_riph" class="col-form-label">Nomor RIPH</label>
							</div>
							<div class="form-group col-md-6">
								<?php echo form_input($jenis_riph) ?>
								<label for="jenis_riph" class="col-form-label">Jenis RIPH</label>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<?php echo form_input($tgl_mulai_berlaku) ?>
								<label for="tgl_mulai_berlaku" class="col-form-label">Tanggal Terbit</label>
							</div>
							<div class="form-group col-md-6">
								<?php echo form_input($tgl_akhir_berlaku) ?>
								<label for="tgl_akhir_berlaku" class="col-form-label">Tanggal Akhir Berlaku</label>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<?php echo form_input($v_pengajuan_riph) ?>
								<label for="v_pengajuan_riph" class="col-form-label">Volume Pengajuan (Ton)</label>
							</div>
							<div class="form-group col-md-4">
								<?php echo form_input($beban_tanam) ?>
								<label for="beban_tanam" class="col-form-label">Kewajiban Tanam (Ha)</label>
							</div>
							<div class="form-group col-md-4">
								<?php echo form_input($beban_produksi) ?>
								<label for="beban_produksi" class="col-form-label">Kewajiban Produksi (Ton)</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-actions small">
							<a class="fa fa-info-circle"></a><i> Unggah salinan berkas yang telah dipindai dengan ekstensi pdf, jpg, png. Ukuran berkas tidak lebih dari 2mb.</i>
						</div>
						<h4 class="card-titles">UNGGAH BERKAS</h4>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="file_riph" class="col-form-label">Surat Penerbitan RIPH</label>
								<input type="file" name="file_riph" id="file_riph" class="form-control" onchange="photoPreview(this,'riphpreview')"/>
								<p class="help-block small text-danger">salinan Surat Penerbitan Rekomendasi Impor Produk Hortikultura.</p>
								<img id="riphpreview" class="img-thumbnail" width="auto" height="250px"/>
								
							</div>
							<div class="form-group col-md-6">
								<label for="file_form5" class="col-form-label">Surat Pernyataan Kesanggupan</label>
								<input type="file" name="file_form5" id="file_form5" class="form-control" onchange="photoPreview(this,'f5preview')"/>
								<p class="help-block small text-danger">salinan Surat Pernyataan Kesanggupan model Form-5.</p>
								<img id="f5preview" class="img-thumbnail" width="auto" height="250px"/>
								
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<?php echo form_close() ?>
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-titles">Selesai</h4>
					</div>
					<div class="card-body">
						<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
						<button class="btn btn-primary" type="reset"><i class="icon-loop"></i> <?php echo $btn_reset ?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('back/template/footer_new'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>


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
    

    function photoPreview(photo,idpreview)
    {
	  if(photo.files[0].size > 2*1024*1024) {
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
