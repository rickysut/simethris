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
							  <li><a href="#tab_3-3" data-toggle="tab">Input Manual</a></li>
							  <li class="pull-left header"><i class="fa fa-th"></i> Input Latitude, Longitude</li>
							</ul>
							<div class="tab-content">
							  <div class="tab-pane" id="tab_1-1">
								<div class="row">
								<div class="col-md-12">
									<div class="box">
										 <div class="box-header">
											<div class="form-group">
												<input type="file" class="form-control" id="upload_file" name="upload_Files[]" onchange="peta_awal()" multiple />
											</div>
										 </div>
										 <div class="box-body no-padding">
										 <div class="row">
											<div class="col-lg-9 text-center">
												<div id="petaku" style="width:100%;height:500px;"></div>
											</div>
											<div class="col-lg-3">
												<div class="pad box-pane-right bg-green" style="width:100%;height:500px">
													<div class="box box-success box-solid">
														<div class="box-header with-border">
														  <h3 class="box-title">PETUNJUK</h3>

														  <div class="box-tools pull-right">
															<a href="#" class="small-box-footer">
															  <i class="fa fa-arrow-circle-right"></i>
															</a>
														  </div>
														  <!-- /.box-tools -->
														</div>
														<!-- /.box-header -->
														<div class="box-footer no-padding">
														  <ul class="nav nav-stacked">
															<li><a href="#">Silahkan Pilih <span class="pull-right badge bg-blue">Choose File</span> Untuk Memili File KML</a></li>
															<li><a href="#">Pilih Marker <span class="pull-right badge bg-aqua"><i class="fa fa-map-marker"></i></span> Untuk Mengisi Latitude dan Longitude</a></li>
															
														  </ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										</div>
									</div>
								</div>
								</div>
							  </div>
							  <!-- /.tab-pane -->
							  <div class="tab-pane active" id="tab_2-2">
								<div class="box">
								<div class="box-body no-padding">
									<div id="googleMap" style="width:100%;height:500px;"></div>
								</div>
								</div>
							  </div>
							  <!-- /.tab-pane -->
							  <div class="tab-pane" id="tab_3-3">
								<div class="col-sm-4">	
									<div class="form-group">
									  <input id="myInput2" type="text" class="form-control" placeholder="Latitude">
									</div>
								</div>
								<div class="col-sm-4">	
									<div class="form-group">
									  <input id="myInput" type="text" class="form-control" placeholder="Longitude">
									</div>
								</div>
								<div class="col-sm-4">	
									<div class="form-group">
									  <button id="myBtn" type="button" class="btn btn-primary" onclick="javascript:prosesPeta();">
										<i class="fa fa-refresh"></i>  Sync Peta
									  </button>
									</div>
								</div>
								<div id="petamanual" style="width:100%;height:500px;"></div>
								</div>
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
	<!--script google map -->
<script async
    src="https://maps.googleapis.com/maps/api/js?v=weekly
        &key=AIzaSyDaMs21-YdoTeAAuxFInk6F4lks9t8TRRs&callback=initMap">
</script> 
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaMs21-YdoTeAAuxFInk6F4lks9t8TRRs"></script> -->
<script src="<?php echo base_url('assets/plugins/geoxml') ?>/polys/geoxml3.js"></script>
<script src="<?php echo base_url('assets/plugins/geoxml') ?>/ProjectedOverlay.js"></script>

  <script type="text/javascript">
    var input = document.getElementById("myInput");
	input.addEventListener("keyup", function(event) {
	  if (event.keyCode === 13) {
	   event.preventDefault();
	   document.getElementById("myBtn").click();
	  }
	});
	
    $('#tgl_rencana_tanam').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    });
	
    $("#data_access_id").select2({
      placeholder: "- Please Choose Data Access -",
      theme: "flat"
    });
	
	function prosesPeta(){
		var myLat = document.getElementById("myInput2").value;
		var myLng = document.getElementById("myInput").value;
		var myLatlng = new google.maps.LatLng(myLat,myLng);
		var mapOptions = {
		  zoom: 12,
		  center: myLatlng,
		  mapTypeId:google.maps.MapTypeId.SATELLITE
		}
		var map = new google.maps.Map(document.getElementById("petamanual"), mapOptions);

		var marker = new google.maps.Marker({
			position: myLatlng,
			title:"CPCL Baru"
		});

		// To add the marker to the map, call setMap();
		marker.setMap(map);
		document.getElementById("atitude").value = myLat;
		document.getElementById("latitude").value = myLng;
	};
	
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
var markero;
  
function taruhMarker(peta, posisiTitik){
    
    if( markero ){
      // pindahkan marker
      markero.setPosition(posisiTitik);
    } else {
      // buat marker baru
      markero = new google.maps.Marker({
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
    geocoder = new google.maps.Geocoder();
    var geoXml = null;
    var geoXmlDoc = null;
    var map = null;
    var myLatLng = null;
    var myGeoXml3Zoom = true;
    var marker = [];
    var polyline;

  function peta_awal() {
	directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer({suppressInfoWindows :true}); 
	geocoder = new google.maps.Geocoder();
	infowindow = new google.maps.InfoWindow({size: new google.maps.Size(150,50) }); 
    //var latlng = new google.maps.LatLng(32.5890, -96.308871);
	var total_file=document.getElementById("upload_file").files.length;
	for(var i=0;i<total_file;i++)
	{
		var filekml = URL.createObjectURL(event.target.files[i]);
	}
    
	var myOptions = {
        zoom: 10,
    //    center: latlng,
	mapTypeControl: true,
    	mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    	navigationControl: true,
	mapTypeId: google.maps.MapTypeId.SATELLITE
    }
	map = new google.maps.Map(document.getElementById("petaku"),myOptions);
    infowindow = new google.maps.InfoWindow({}); 
    geoXml = new geoXML3.parser({map: map,infoWindow: infowindow,singleInfoWindow: true,zoom: myGeoXml3Zoom, markerOptions: {optimized: false},createMarker: createMarker});
	geoXml.parse(filekml);
  }
  var createMarker = function (placemark, doc) {

        var markerOptions = geoXML3.combineOptions(geoXml.options.markerOptions, {
          map:      geoXml.options.map,
          position: new google.maps.LatLng(placemark.Point.coordinates[0].lat, placemark.Point.coordinates[0].lng),
          title:    placemark.name,
         zIndex:   Math.round(placemark.Point.coordinates[0].lat * -100000)<<5,
         icon:     placemark.style.icon,
         shadow:   placemark.style.shadow 
        });

        // Create the marker on the map
        var marker = new google.maps.Marker(markerOptions);
        if (!!doc) {
        doc.markers.push(marker);
        }

        // Set up and create the infowindow if it is not suppressed
        if (!geoXml.options.suppressInfoWindows) {
          var infoWindowOptions = geoXML3.combineOptions(geoXml.options.infoWindowOptions, {
            content: '<div class="geoxml3_infowindow"><h3>' + placemark.name + 
                     '</h3><div>' + placemark.description + '</div></div>',
            pixelOffset: new google.maps.Size(0, 2)
          });
          if (geoXml.options.infoWindow) {
            marker.infoWindow = geoXml.options.infoWindow;
          } else {
            marker.infoWindow = new google.maps.InfoWindow(infoWindowOptions);
          }
          marker.infoWindowOptions = infoWindowOptions;

          // Infowindow-opening event handler
          google.maps.event.addListener(marker, 'click', function() 
        {            
			
            var mLat = placemark.Point.coordinates[0].lat;   
			var mLng = placemark.Point.coordinates[0].lng;  
			document.getElementById("atitude").value = mLat;
			document.getElementById("latitude").value = mLng;
            this.infoWindow.close();
            marker.infoWindow.setOptions(this.infoWindowOptions);
            this.infoWindow.open(this.map, this);

          });
        }
        placemark.marker = marker;
        return marker;
      };

</script>
</div>
<!-- ./wrapper -->
</body>
</html>
