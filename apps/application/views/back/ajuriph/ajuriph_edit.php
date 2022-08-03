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
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><?php echo $module ?></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

      <?php echo form_open_multipart($action) ?>
      <?php echo validation_errors() ?>
	  <div class="box box-success">
          <div class="box-header with-border"><h3 class="box-title">DATA RIPH</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
                    <div class="row">
							  <div class="col-sm-6">
								<div class="form-group"><label>Nomor Penerbitan RIPH (*)</label>
								  <?php echo form_input($nomor_riph, $user->nomor_riph) ?>
								</div>
							  </div>
							  <div class="col-sm-6">
								<div class="form-group"><label>Jenis RIPH</label>
								  <?php echo form_input($jenis_riph, $user->jenis_riph) ?>
								</div>
							  </div>
							</div>
					<div class="row">
					  <div class="col-lg-6">
						<div class="form-group"><label>Mulai Masa Berlaku</label>
						  <?php echo form_input($tgl_mulai_berlaku, $user->tgl_mulai_berlaku) ?>
						</div>
					  </div>
					  <div class="col-lg-6">
						<div class="form-group"><label>Akhir Masa Berlaku</label>
						  <?php echo form_input($tgl_akhir_berlaku, $user->tgl_akhir_berlaku) ?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-lg-4">
						<div class="form-group"><label>Volume Pengajuan RIPH (ton)</label>
						  <?php echo form_input($v_pengajuan_riph, $user->v_pengajuan_riph ) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Luas Kewajiban tanam (ha)</label>
						  <?php echo form_input($beban_tanam, $user->beban_tanam) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Kewajiban Produksi (ton)</label>
						   <?php echo form_input($beban_produksi, $user->beban_produksi) ?>
						</div>
					  </div>
					</div>
					<div class="row">
						<div class="col-lg-6">
						<div class="form-group"><label>Current SP RIPH</label>
							<?php if(pathinfo($user->file_riph, PATHINFO_EXTENSION)=='pdf'){
								  $pregmb = '<a href="'.base_url('/uploads/file_riph/'.$user->file_riph).'"><img width="75px" src="'.base_url('/assets/images/pdf_thumb.png').'"></a>';
							  }else if(pathinfo($user->file_riph, PATHINFO_EXTENSION)=='docx'){
								  $pregmb = '<a href="'.base_url('/uploads/file_riph/'.$user->file_riph).'"><img width="75px" src="'.base_url('/assets/images/docx_thumb.png').'"></a>';
							  }else if(pathinfo($user->file_riph, PATHINFO_EXTENSION)=='xlsx'){
								  $pregmb = '<a href="'.base_url('/uploads/file_riph/'.$user->file_riph).'"><img width="75px" src="'.base_url('/assets/images/excel_thumb.png').'"></a>';
							  }else{
								  $pregmb = '<a href="'.base_url('/uploads/file_riph/'.$user->file_riph).'"><img width="75px" src="'.base_url('/uploads/file_riph/'.$user->file_riph).'"></a>';
							}?>
							<p><?php echo $pregmb;?></p>
						</div>
						</div>
						<div class="col-lg-6">
						<div class="form-group"><label>Current Form-5</label>
							<?php if(pathinfo($user->file_form5, PATHINFO_EXTENSION)=='pdf'){
								  $pregmb = '<a href="'.base_url('/uploads/file_form5/'.$user->file_form5).'"><img width="75px" src="'.base_url('/assets/images/pdf_thumb.png').'"></a>';
							  }else if(pathinfo($user->file_form5, PATHINFO_EXTENSION)=='docx'){
								  $pregmb = '<a href="'.base_url('/uploads/file_form5/'.$user->file_form5).'"><img width="75px" src="'.base_url('/assets/images/docx_thumb.png').'"></a>';
							  }else if(pathinfo($user->file_form5, PATHINFO_EXTENSION)=='xlsx'){
								  $pregmb = '<a href="'.base_url('/uploads/file_form5/'.$user->file_form5).'"><img width="75px" src="'.base_url('/assets/images/excel_thumb.png').'"></a>';
							  }else{
								  $pregmb = '<a href="'.base_url('/uploads/file_form5/'.$user->file_form5).'"><img width="75px" src="'.base_url('/uploads/file_form5/'.$user->file_form5).'"></a>';
							}?>
							<p><?php echo $pregmb;?></p>
						</div>
						</div>
					</div>
					<div class="row">
					<div class="col-lg-6">
					<div class="form-group"><label>Berkas Surat Penerbitan RIPH</label>
						<input type="file" name="file_riph" id="file_riph" class="form-control" onchange="photoPreview(this,'riphpreview')"/>
						<p class="help-block">File PDF/JPG/PNG</p>
						<img id="riphpreview" width="auto" height="250px"/>
					</div>
					</div>
					<div class="col-lg-6">
					<div class="form-group"><label>Surat pernyataan kesangggupan (Form-5)</label>
						<input type="file" name="file_form5" id="file_form5" class="form-control" onchange="photoPreview(this,'f5preview')"/>
						<p class="help-block">File PDF/JPG/PNG</p>
						<img id="f5preview" width="auto" height="250px"/>
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
            alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
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
		 document.getElementById('beban_produksi').value = Math.round(tproduksi);
		 document.getElementById('beban_tanam').value = Math.round(ttanam);
      }
	}
	
  </script>

</div>
<!-- ./wrapper -->

</body>
</html>
