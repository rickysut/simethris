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
				<div class="box box-primary">
				  <div class="box-header with-border"><h3 class="box-title">DESKRIPSI FILE</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Judul File</label>
						  <?php echo form_input($file_judul,$user->file_judul) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Deskripsi File</label>
						  <?php echo form_input($file_deskripsi,$user->file_deskripsi) ?>
						</div>
					  </div>
					</div> 
					<div class="form-group"><label>Current Photo</label>
						<?php {
						  // action
						  if($user->file_type == 'USER'){
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/user/'.$user->file_data).'">';
						  }
						  else if($user->file_type == 'REALISASI'){
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/realisasi/'.$user->file_data).'" alt="">';
						  }
						  else if($user->file_type == 'PRODUKSI'){
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/produksi/'.$user->file_data).'" alt="">';
						  }
						  else if($user->file_type == 'PKS'){
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/pks/'.$user->file_data).'" alt="">';
						  }
						  else if($user->file_type == 'KTP'){
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/file_ktp/'.$user->file_data).'" alt="">';
						  }
						  else if($user->file_type == 'FORM5'){
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/file_form5/'.$user->file_data).'" alt="">';
						  }
						  else if($user->file_type == 'RIPH'){
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/file_riph/'.$user->file_data).'" alt="">';
						  }
						  else if($user->file_type == 'SK'){
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/file_sk/'.$user->file_data).'" alt="">';
						  }
						  else{
							  $gmbthumb = '<img width="175px" src="'.base_url('/uploads/user/'.$user->file_data).'" alt="">';
						  }
						}?>
						<p><?php echo $gmbthumb ?></p>
					</div>
					<div class="form-group"><label>File</label>
					  <input type="file" name="file_data" id="file_data" onchange="photoPreview(this,'preview')" />
					  <p class="help-block">Maximum file size is 2Mb</p>
					  <img id="preview" width="200px"/>
				  </div>
				  </div>
				  
				  <div class="box-footer">
					<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
					<button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
				  </div>
				</div>
				
        <?php echo form_close() ?>

    </section>
	</div>
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
  <script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
</div>
<!-- ./wrapper -->
<script type="text/javascript">
    function photoPreview(file_data,idpreview)
    {
      var gb = file_data.files;
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
</body>
</html>
