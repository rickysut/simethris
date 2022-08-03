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
				<?php if(pathinfo(base_url('uploads/file_ktp/'.$user->file_ktp), PATHINFO_EXTENSION)=='pdf'){
					$pregmb3 = '<img width="75px" src="'.base_url('/assets/images/pdf_thumb.png').'" width="200px" alt="current KTP">';
				}else if(pathinfo(base_url('uploads/file_ktp/'.$user->file_ktp), PATHINFO_EXTENSION)=='docx'){
					$pregmb3 = '<img width="75px" src="'.base_url('/assets/images/docx_thumb.png').'" width="200px" alt="current KTP">';
				}else if(pathinfo(base_url('uploads/file_ktp/'.$user->file_ktp), PATHINFO_EXTENSION)=='xlsx'){
					$pregmb3 = '<img width="75px" src="'.base_url('/assets/images/excel_thumb.png').'" width="200px" alt="current KTP">';
				}else{
					$pregmb3 = '<img src="'.base_url('uploads/file_ktp/'.$user->file_ktp).'" width="200px" alt="current KTP">';
				}
				?>
				<p><?php echo $pregmb3 ?></p>
            </div>
			<div class="form-group"><label>Unggah KTP Baru*</label>
				<input type="file" name="file_ktp" id="file_ktp" class="form-control" onchange="ktpPreview(this,'kpreview')"/>
				<p class="help-block">Hasil Pindai KTP Asli </p>
				<b>Preview</b><br>
				<img id="kpreview" width="350px"/>
			</div>
			<div class="form-group"><label>Current Surat Tugas / Surat Kuasa</label>
				<?php if(pathinfo(base_url('uploads/file_sk/'.$user->file_sk), PATHINFO_EXTENSION)=='pdf'){
					$pregmb2 = '<img width="75px" src="'.base_url('/assets/images/pdf_thumb.png').'" width="200px" onClick="ViewAttachmentPdf('."'".base_url('uploads/file_sk/'.$user->file_sk)."'".','."'".pathinfo(base_url('uploads/file_sk/'.$user->file_sk),PATHINFO_FILENAME)."'".');" alt="current SK">';
				}else if(pathinfo(base_url('uploads/file_sk/'.$user->file_sk), PATHINFO_EXTENSION)=='docx'){
					$pregmb2 = '<img width="75px" src="'.base_url('/assets/images/docx_thumb.png').'" width="200px" alt="current SK">';
				}else if(pathinfo(base_url('uploads/file_sk/'.$user->file_sk), PATHINFO_EXTENSION)=='xlsx'){
					$pregmb2 = '<img width="75px" src="'.base_url('/assets/images/excel_thumb.png').'" width="200px" alt="current SK">';
				}else{
					$pregmb2 = '<img src="'.base_url('uploads/file_sk/'.$user->file_sk).'" width="200px" alt="current SK">';
				}
				?>
				<p><?php echo $pregmb2 ?></p>
            </div>
			<div class="form-group"><label>Unggah Surat Tugas / Surat Kuasa Baru*</label>
				  <input type="file" name="file_sk" id="file_sk" class="form-control" onchange="skPreview(this,'spreview')"/>
				  <p class="help-block">Hasil Pindai Surat Tugas / Surat Kuasa</p>
				  <b>Preview</b><br>
				  <img id="spreview" width="350px"/>
			</div>
			<div class="form-group"><label>Current Photo</label>
              
			  <p><img width="75px" src="<?php echo base_url('uploads/user/'.$user->photo) ?>" onClick="ViewAttachmentImage('<?php echo base_url('uploads/user/'.$user->photo) ?>','<?php echo pathinfo(base_url('uploads/user/'.$user->photo),PATHINFO_FILENAME) ?>')" alt="current Photo"></p>
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
              <div class="col-lg-6">
                <div class="form-group"><label>Username (*)</label>
                  <?php echo form_input($username, $user->username) ?>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group"><label>Email (*)</label>
                  <?php echo form_input($email, $user->email) ?>
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
						
						<div class="form-group"><label>Unggah Logo Perusahaan</label>
							<p><img width="75px" src="<?php echo $this->session->logo_perusahaan ?>" onClick="ViewAttachmentImage('<?php echo $this->session->logo_perusahaan ?>','<?php echo pathinfo($this->session->logo_perusahaan,PATHINFO_FILENAME) ?>')" alt="current logo"></p>
						  <input type="file" name="logo_perusahaan" id="logo_perusahaan" class="form-control" onchange="photoPreview(this,'lpreview')"/>
						  <p class="help-block">Maximum file size is 2Mb</p>
						  <b>Logo Preview</b><br>
						  <img id="lpreview" width="350px"/>
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
					  <div class="col-lg-4">
						<div class="form-group"><label>Mulai Masa Berlaku</label>
						  <?php echo form_input($tgl_mulai_berlaku, $user->tgl_akhir_berlaku) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Akhir Masa Berlaku</label>
						  <?php echo form_input($tgl_akhir_berlaku, $user->tgl_akhir_berlaku) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Volume Pengajuan RIPH (ton)</label>
						  <?php echo form_input($v_pengajuan_riph, $user->v_pengajuan_riph) ?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Luas Kewajiban tanam (ha)</label>
						  <?php echo form_input($beban_tanam, $user->beban_tanam) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Kewajiban Produksi (ton)</label>
						   <?php echo form_input($beban_produksi, $user->beban_produksi) ?>
						</div>
					  </div>
					</div>
					<div class="form-group"><label>Current Berkas Surat Penerbitan RIPH</label>
						<?php if(pathinfo(base_url('uploads/file_riph/'.$user->file_riph), PATHINFO_EXTENSION)=='pdf'){
							$pregmb1 = '<img width="75px" src="'.base_url('/assets/images/pdf_thumb.png').'" width="200px" alt="current photo">';
						  }else if(pathinfo(base_url('uploads/file_riph/'.$user->file_riph), PATHINFO_EXTENSION)=='docx'){
							$pregmb1 = '<img width="75px" src="'.base_url('/assets/images/docx_thumb.png').'" width="200px" alt="current photo">';
						  }else if(pathinfo(base_url('uploads/file_riph/'.$user->file_riph), PATHINFO_EXTENSION)=='xlsx'){
							$pregmb1 = '<img width="75px" src="'.base_url('/assets/images/excel_thumb.png').'" width="200px" alt="current photo">';
						  }else{
							$pregmb1 = '<img src="'.base_url('uploads/file_riph/'.$user->file_riph).'" width="200px" alt="current photo">';
						  }
						?>
						<p><?php echo $pregmb1 ?></p>
					</div>
					<div class="form-group"><label>Unggah Berkas Surat Penerbitan RIPH Baru</label>
						<input type="file" name="file_riph" id="file_riph" class="form-control" />
						<p class="help-block">File PDF/JPG/PNG</p>
					</div>
					<div class="form-group"><label>Current Surat pernyataan kesangggupan (Form-5)</label>
					<?php if(pathinfo(base_url('uploads/file_form5/'.$user->file_form5), PATHINFO_EXTENSION)=='pdf'){
						$pregmb = '<img width="75px" src="'.base_url('/assets/images/pdf_thumb.png').'" width="200px" alt="current photo">';
					  }else if(pathinfo(base_url('uploads/file_form5/'.$user->file_form5), PATHINFO_EXTENSION)=='docx'){
						$pregmb = '<img width="75px" src="'.base_url('/assets/images/docx_thumb.png').'" width="200px" alt="current photo">';
					  }else if(pathinfo(base_url('uploads/file_form5/'.$user->file_form5), PATHINFO_EXTENSION)=='xlsx'){
						$pregmb = '<img width="75px" src="'.base_url('/assets/images/excel_thumb.png').'" width="200px" alt="current photo">';
					  }else{
						$pregmb = '<img src="'.base_url('uploads/file_form5/'.$user->file_form5).'" width="200px" alt="current photo">';
					  }
                    ?>
						<p><a href="https://docs.google.com/viewer?url=<?php echo urlencode(base_url('uploads/file_form5/'.$user->file_form5)) ?>"><?php echo $pregmb ?></a></p>
					</div>
					<div class="form-group"><label>Surat pernyataan kesangggupan (Form-5)</label>
						<input type="file" name="file_form5" id="file_form5" class="form-control" />
						<p class="help-block">File PDF/JPG/PNG</p>
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
  <!-- Modal -->
  <div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" width="450px" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModalPdf">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		  <embed id="modalPdf" src="file:///C:/Users/hp/Downloads/sb_finance.pdf" frameborder="0" width="100%" height="400px">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
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
	function ViewAttachmentImage(image_url,imageTitle){
	$('#modelTitle').html(imageTitle); 
	$('#modalImgs').attr('src',image_url);
	$('#myModalImg').modal('show');
	}
	function ViewAttachmentPdf(pdf_url,pdfTitle){
	$('#modelTitle').html(pdfTitle); 
	$('#modalPdf').attr('src',pdf_url);
	$('#myModalPdf').modal('show');
	}
  </script>

</div>
<!-- ./wrapper -->

</body>
</html>
