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
				  <div class="box-header with-border"><h3 class="box-title">DATA PELAKSANA - ID CPCL : <?php echo $user->id_cpcl ?> - PELAKSANA :  <?php echo $user->nama_pelaksana ?></h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
						<div id="notampil" style="display: none;">
						<?php echo form_input($id_cpcl, $user->id_cpcl) ?>
						<?php echo form_input($id_realisasi, $user->id_realisasi) ?>
						<?php echo form_input($id_users, $user->id_users) ?>
						<?php echo form_dropdown('', $type_pelaksana_value, $user->type_pelaksana, $type_pelaksana) ?>
						<?php echo form_input($nama_pelaksana, $user->nama_pelaksana) ?> 
						<?php echo form_dropdown('', $status_lahan_value, '', $status_lahan) ?>
						<?php echo form_dropdown('', $kontur_lahan_value, '', $kontur_lahan) ?>
						<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
						<?php echo form_dropdown('',$get_all_combobox_kabupaten, $user->kabupaten, $kabupaten) ?>
						<?php echo form_dropdown('', $get_all_combobox_kecamatan, $user->kecamatan, $kecamatan) ?>
						<?php echo form_dropdown('', $get_all_combobox_desa, $user->desa, $desa) ?>
						<?php echo form_textarea($address, $user->address) ?>
						</div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Tanggal Tanam</label>
						  <?php echo form_input($tgl_realisasi_tanam, $user->tgl_realisasi_tanam) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Tanggal Panen / Produksi</label>
						  <?php echo form_input($tgl_produksi) ?>
						</div>
					  </div>
					</div>  
					  <div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Realisasi Luas Tanam</label>
						  <?php echo form_input($luas_realisasi_tanam, $user->luas_realisasi_tanam, $luas_realisasi_tanam) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Jumlah Panen d.s Ton</label>
						  <?php echo form_input($jml_produksi) ?>
						</div>
					  </div>
					  </div>
				  </div>
				</div>
				<div class="box box-success">
				  <div class="box-header with-border"><h3 class="box-title">UNGGAH BERKAS LAMPIRAN</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
					  <div class="col-lg-4">
						<div class="form-group"><label>Judul Kegiatan</label>
						  <?php echo form_input($file_judul1) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Deskripsi Kegiatan</label>
						  <?php echo form_input($file_deskripsi1) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Unggah Photo *</label>
							  <input type="file" name="kegiatan1" id="kegiatan1" class="form-control" onchange="kegiatan1Preview(this,'k1preview')"/>
							  <p class="help-block">Photo Kegiatan </p>
							  <b>Preview</b><br>
							  <img id="k1preview" width="250px"/>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-lg-4">
						<div class="form-group"><label>Judul Kegiatan</label>
						  <?php echo form_input($file_judul2) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Deskripsi Kegiatan</label>
						  <?php echo form_input($file_deskripsi2) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Unggah Photo * *</label>
							  <input type="file" name="kegiatan2" id="kegiatan2" class="form-control" onchange="kegiatan2Preview(this,'k2preview')"/>
							  <p class="help-block">Photo Kegiatan</p>
							  <b>Preview</b><br>
							  <img id="k2preview" width="250px"/>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-lg-4">
						<div class="form-group"><label>Judul Kegiatan</label>
						  <?php echo form_input($file_judul3) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Deskripsi Kegiatan</label>
						  <?php echo form_input($file_deskripsi3) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Unggah Photo * *</label>
							  <input type="file" name="kegiatan3" id="kegiatan3" class="form-control" onchange="kegiatan3Preview(this,'k3preview')"/>
							  <p class="help-block">Photo Kegiatan</p>
							  <b>Preview</b><br>
							  <img id="k3preview" width="250px"/>
						</div>
					  </div>
					  </div>
					  <div class="row">
					  <div class="col-lg-4">
						<div class="form-group"><label>Judul Kegiatan</label>
						  <?php echo form_input($file_judul4) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Deskripsi Kegiatan</label>
						  <?php echo form_input($file_deskripsi4) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Unggah Photo * *</label>
							  <input type="file" name="kegiatan4" id="kegiatan4" class="form-control" onchange="kegiatan4Preview(this,'k4preview')"/>
							  <p class="help-block">Photo Kegiatan</p>
							  <b>Preview</b><br>
							  <img id="k4preview" width="250px"/>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				<div class="box box-primary">
				  <div class="box-header with-border"><h3 class="box-title">PETA LOKASI</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Atitude</label>
						  <?php echo form_input($atitude, $user->atitude) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Latitude</label>
						  <?php echo form_input($latitude, $user->latitude) ?>
						</div>
					  </div>
					</div>
					<div class="form-group"><label>Peta</label>
						<div id="googleMap" style="width:100%;height:380px;"></div>
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
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
   
  <script type="text/javascript">
    $('#tgl_produksi').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })

    function photoPreview(lampiran,idpreview)
    {
      var gb = lampiran.files;
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
  <script>
function kegiatan1Preview(kegiatan1,idpreview)
    {
      var gb = kegiatan1.files;
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
	function kegiatan2Preview(kegiatan2,idpreview)
    {
      var gb = kegiatan2.files;
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
	function kegiatan3Preview(kegiatan3,idpreview)
    {
      var gb = kegiatan3.files;
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
	function kegiatan4Preview(kegiatan4,idpreview)
    {
      var gb = kegiatan4.files;
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
<!--script google map-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&key=AIzaSyCkQkJ319YpiVABFKwvI23zFA6i4cg30S0"></script>
<script>
        $(document).ready(function(){
            $("#type_pelaksana").change(function (){
				if(this.value == "2")
                {
					$('#poktan').hide();
				}
				else
				{
					$('#poktan').show();
				}
            })
        });
</script>
<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("atitude").value = posisiTitik.lat();
    document.getElementById("latitude").value = posisiTitik.lng();
    
}
  
function initialize() {
  var pos1=document.getElementById("atitude").value
  var pos2=document.getElementById("latitude").value
  var propertiPeta = {
    center:new google.maps.LatLng(pos1,pos2),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng(pos1,pos2),
      map: peta
  });
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>
</div>
<!-- ./wrapper -->
</body>
</html>
