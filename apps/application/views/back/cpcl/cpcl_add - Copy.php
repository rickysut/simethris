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
				  <div class="box-header with-border"><h3 class="box-title">DATA PELAKSANA</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group" onchange="set_to(this.value)"><label>Pelaksana (*)</label>
						<?php echo form_dropdown('', $type_pelaksana_value, '', $type_pelaksana) ?>
						</div>
					  </div>
					  <div class="col-sm-6" id="poktan">
						<div class="form-group"><label>Nama Kelompok Tani (*)</label>
						<?php echo form_input($nama_pelaksana) ?>
						</div>
					  </div>
					  </div>
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Rencana Tanggal Tanam</label>
						  <?php echo form_input($tgl_rencana_tanam) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Rencana Luas Tanam</label>
						  <?php echo form_input($luas_rencana_tanam) ?>
						</div>
					  </div>
					  <!--
					  <div class="col-lg-4">
						<div class="form-group"><label>Varietas</label>
						  <?php echo form_input($varietas) ?>
						</div>
					  </div> -->
					</div>
					<!--
				    <div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Status Lahan</label>
						<?php echo form_dropdown('', $status_lahan_value, '', $status_lahan) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Kontur Lahan </label>
						<?php echo form_dropdown('', $kontur_lahan_value, '', $kontur_lahan) ?>
						</div>
					  </div>
					  </div> -->
					<div class="form-group"><label>Lampiran</label>
					  <input type="file" name="lampiran" id="lampiran" class="form-control" />
					  <p class="help-block">Maximum file size is 2Mb</p>
					</div>
				  </div>
				</div>
				<div class="box box-success">
				  <div class="box-header with-border"><h3 class="box-title">RENCANA LOKASI</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Provinsi</label>
							<?php echo form_dropdown('', $get_all_combobox_provinsi, '', $provinsi) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Kabupaten</label>
						  <select name="kabupaten" class="form-control" id="kabupaten">
							<option value=''>Pilih Kabupaten</option>
						  </select>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Kecamatan</label>
						  <select name="kecamatan" class="form-control" id="kecamatan">
							<option>Select Kecamatan</option>
						  </select>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Desa</label>
						  <select name="desa" class="form-control" id="desa">
							<option>Select Desa</option>
						  </select>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				<div class="box box-primary">
				  <div class="box-header with-border"><h3 class="box-title">PEMETAAN</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Latitude</label>
						  <?php echo form_input($atitude) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Longitude</label>
						  <?php echo form_input($latitude) ?>
						</div>
					  </div>
					</div>
					<div class="form-group">
						
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs pull-right">
							  <li><a href="#tab_1-1" data-toggle="tab">Input File KML</a></li>
							  <li class="active"><a href="#tab_2-2" data-toggle="tab">Input Dari Peta</a></li>
							  <li class="pull-left header"><i class="fa fa-th"></i> Input Latitude, Longitude</li>
							</ul>
							<div class="tab-content">
							  <div class="tab-pane" id="tab_1-1">
									<div class="form-group">
										<input type="file" class="form-control" id="upload_file" name="upload_Files[]" onchange="peta_awal()" multiple />
									</div>
									<div class="box-body no-padding">
										
											<div id="petaku" style="width:100%;height:380px;"></div>
										
									</div>
								</div>
							  <!-- /.tab-pane -->
							  <div class="tab-pane active" id="tab_2-2">
								
									<div id="googleMap" style="width:100%;height:380px;"></div>
								
							  </div>
							  <!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
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
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url('assets/plugins/') ?>smart-wizard/js/jquery.smartWizard.js"></script>

  <script type="text/javascript">
    $('#tgl_rencana_tanam').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })
	
    $("#data_access_id").select2({
      placeholder: "- Please Choose Data Access -",
      theme: "flat"
    });

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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<script src="<?php echo base_url('assets/plugins/geoxml') ?>/polys/geoxml3.js"></script>
<script src="<?php echo base_url('assets/plugins/geoxml') ?>/ProjectedOverlay.js"></script>
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
  var propertiPeta = {
    center:new google.maps.LatLng(-6.6596049400201425,107.71690192236417),
	//center: 'indonesia';
    zoom:9,
    mapTypeId:google.maps.MapTypeId.SATELLITE
  };
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta); 
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });
}
// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
	var petakml;
	var geoXml;
	var markerKML;
	function simpanMarker(petakml, posisiMarker){
    
    if( markerKML ){
      // pindahkan marker
      markerKML.setPosition(posisiMarker);
    } else {
      // buat marker baru
      markerKML = new google.maps.Marker({
        position: posisiMarker,
        map: petakml
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("atitude").value = posisiMarker.lat();
    document.getElementById("latitude").value = posisiMarker.lng();
    
	}
	
	function peta_awal(){
		 var total_file=document.getElementById("upload_file").files.length;
		 for(var i=0;i<total_file;i++)
		 {
			var filekml = URL.createObjectURL(event.target.files[i]);
		 }
		var jawa_barat = new google.maps.LatLng(-7.090911,107.668887);
		var petaoption = {
			zoom: 9,
			mapTypeControl: true,
			mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
			navigationControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		petakml = new google.maps.Map(document.getElementById("petaku"),petaoption);
		/** disini kita panggil function dari geoXML3 untuk memparsing file kml */
		geoXml = new geoXML3.parser({map: petakml, processStyles: true, singleInfoWindow: true});
		/** letak file kml */
		geoXml.parse(filekml);
		google.maps.event.addListener(geoXml, 'click', function(event){
			simpanMarker(this, event.latLng);
		});
		//google.maps.event.addListener(petakml,'click',function(event){
		// 	simpanMarker(this, event.latLng);
		//});
	}; 
</script>
</div>
<!-- ./wrapper -->
</body>
</html>
