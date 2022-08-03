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
          <div class="box-header with-border"><h3 class="box-title">PERSONAL</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group"><label>Full Name (*)</label>
                  <?php echo form_input($name, $user->name, $user->name) ?>
                </div>
              </div>
			  <div class="col-sm-6">
                <div class="form-group"><label>Phone No.</label>
                  <?php echo form_input($phone, $user->phone) ?>
                </div>
              </div>
            </div>
            
				<div class="form-group"><label>Address</label>
					<?php echo form_textarea($address, $user->address) ?>
				</div>
         
			<div class="form-group"><label>Current ktp</label>
              <p><img src="<?php echo base_url('.uploads/user/'.$user->file_ktp) ?>" width="200px" alt="current photo"></p>
            </div>
			<div class="form-group"><label>Unggah KTP Baru*</label>
				<input type="file" name="file_ktp" id="file_ktp" class="form-control" onchange="ktpPreview(this,'kpreview')"/>
				<p class="help-block">Hasil Pindai KTP Asli </p>
				<b>Preview</b><br>
				<img id="kpreview" width="350px"/>
			</div>
			<div class="form-group"><label>Current Surat Tugas / Surat Kuasa</label>
              <p><img src="<?php echo base_url('.uploads/user/'.$user->file_sk) ?>" width="200px" alt="current SK"></p>
            </div>
			<div class="form-group"><label>Unggah Surat Tugas / Surat Kuasa Baru*</label>
				  <input type="file" name="file_sk" id="file_sk" class="form-control" onchange="skPreview(this,'spreview')"/>
				  <p class="help-block">Hasil Pindai Surat Tugas / Surat Kuasa</p>
				  <b>Preview</b><br>
				  <img id="spreview" width="350px"/>
			</div>
			<div class="form-group"><label>Current Photo</label>
              <p><img src="<?php echo base_url('.uploads/user/'.$user->photo_thumb) ?>" width="200px" alt="current photo"></p>
            </div>
			<div class="form-group"><label>Unggah Foto (Close up)*</label>
				  <input type="file" name="photo" id="photo" class="form-control" onchange="photoPreview(this,'ppreview')"/>
				  <p class="help-block">Maximum file size is 2Mb</p>
				  <b>Photo Preview</b><br>
				  <img id="ppreview" width="350px"/>
			</div>
          </div>
          <div class="box-footer">
            <button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
            <button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
          </div>
        </div>

        <div class="box box-success">
          <div class="box-header with-border"><h3 class="box-title">AUTH</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group"><label>Username (*)</label>
                  <?php echo form_input($username, $user->username) ?>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group"><label>Email (*)</label>
                  <?php echo form_input($email, $user->email) ?>
                </div>
              </div>
            </div>            
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group"><label>Usertype (*)</label>
                  <?php echo form_dropdown('', $get_all_combobox_usertype, $user->usertype, $usertype) ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group"><label>Current Data Access (*)</label>
                  <p>
                    <?php
                    if($get_all_data_access_old == NULL)
                    {
                      echo '<button class="btn btn-sm btn-danger">No Data</button>';
                    }
                    else
                    {
                      foreach($get_all_data_access_old as $data_access)
                      {
                        $string = chunk_split($data_access->data_access_name, 9, "</button> ");
                        echo '<button class="btn btn-sm btn-success">'.$string;
                      }
                    }
                    ?>
                  </p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group"><label>New Data Access (*)</label>
                  <?php echo form_dropdown('', $get_all_combobox_data_access, '', $data_access_id) ?>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_input($id_users, $user->id_users) ?>
          <div class="box-footer">
            <button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
            <button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
          </div>
        </div>
		
		<div class="box box-primary">
          <div class="box-header with-border"><h3 class="box-title">DATA PERUSAHAAN</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
				<div class="row">
                        <div class="col-sm-6">
                        <div class="form-group"><label>Nama Perusahaan</label>
							<?php echo form_input($nama_perusahaan, $user->nama_perusahaan) ?>
						</div>
                    </div>
				</div>
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Provinsi</label>
							<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Kabupaten</label>
						  <<?php echo form_dropdown('',$get_all_combobox_kabupaten, $user->kabupaten, $kabupaten) ?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Kecamatan</label>
						  <?php echo form_dropdown('', $get_all_combobox_kecamatan, $user->kecamatan, $kecamatan) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Desa</label>
						  <?php echo form_dropdown('', $get_all_combobox_desa, $user->desa, $desa) ?>
						</div>
					  </div>
					</div>
					<div class="form-group"><label>Alamat Detail</label>
						<?php echo form_textarea($alamat, $user->alamat) ?>
					</div>
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>No Telp.  Perusahaan</label>
						  <?php echo form_input($phone_number, $user->phone_number) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Kode POS</label>
						   <?php echo form_input($kode_pos, $user->kode_pos) ?>
						</div>
					  </div>
					</div>
						<!--
						<div class="row">
						  <div class="col-sm-6">
							<div class="form-group"><label>Usertype (*)</label>
							  <?php echo form_dropdown('', $get_all_combobox_usertype, '', $usertype) ?>
							</div>
						  </div>
						  <div class="col-sm-6">
							<div class="form-group"><label>Data Access (*)</label>
							  <?php echo form_dropdown('', $get_all_combobox_data_access, '', $data_access_id) ?>
							</div>
						  </div>
						</div>
						-->
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
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

   <script type="text/javascript">
    $('#birthdate').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })
	$('#tgl_mulai_berlaku').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })
	$('#tgl_akhir_berlaku').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })

    $("#data_access_id").select2({
      placeholder: "- Please Choose Data Access -",
      theme: "flat"
    });

    function photoPreview(photo,idpreview)
    {
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var ppreview=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        {
          //jika tipe data sesuai
          ppreview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(ppreview);
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
	function skPreview(file_sk,idpreview)
    {
      var gb = file_sk.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var spreview=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        {
          //jika tipe data sesuai
          spreview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(spreview);
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
	function ktpPreview(file_ktp,idpreview)
    {
      var gb = file_ktp.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var kpreview=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        {
          //jika tipe data sesuai
          kpreview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(kpreview);
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
  <script>
        $(document).ready(function(){
            $("#provinsi").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })
			
			$("#kabupaten").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+$(this).val();
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
