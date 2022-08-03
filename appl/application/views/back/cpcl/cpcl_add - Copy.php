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
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			
         </div>
    <!-- / HEADER -->

    <!-- Main content -->
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
									<h5>DATA PELAKSANA</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
									<div class="form-row">
										<?php echo form_input($id_mst_riph, $user->id_mst_riph) ?>
											<div class="form-group col-md-12">
												<?php echo form_input($no_pks) ?>
												<label for="nama_pelaksana" class="col-form-label">Nomor PKS</label>
											</div>
									</div>
									<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_dropdown('', $type_pelaksana_value, '', $type_pelaksana) ?>
												<label for="name" class="col-form-label">Pelaksana</label>
											</div>
											<div class="form-group col-md-6" id="poktan">
												<?php echo form_input($nama_pelaksana) ?>
												<label for="nama_pelaksana" class="col-form-label">Kelompok Tani</label>
											</div>
									</div>
									<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_input($tgl_rencana_tanam) ?>
												<label for="tgl_rencana_tanam" class="col-form-label">Tgl Rencana Tanam</label>
											</div>
											<div class="form-group col-md-6">
												<?php echo form_input($luas_rencana_tanam) ?>
												<label for="luas_rencana_tanam" class="col-form-label">Rencana Luas Tanam</label>
											</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<div class="custom-file">
												<input type="file" class="form-control" name="lampiran" id="lampiran">
												<small id="PhotoHelpBlock" class="form-text text-muted">Ukuran file tidak boleh lebih dari 2MB</small>
											</div>
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
									<h5>DATA LOKASI</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
									<div class="form-row">
															<div class="form-group col-md-6">
																<?php echo form_dropdown('', $get_all_combobox_provinsi, '', $provinsi) ?>
																<small id="provinsiHelpBlock" class="form-text text-muted">
								Silahkan pilih Provinsi yang sesuai.</small>
															</div>
															<div class="form-group col-md-6">
																<select name="kabupaten" class="form-control" id="kabupaten" onchange="setpetakota(this.options[this.selectedIndex].value)">
																	<option value=''>Pilih Kabupaten</option>
																  </select>
																<small id="kabupatenHelpBlock" class="form-text text-muted">
								Silahkan pilih Kaupaten yang Sesuai.</small>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<select name="kecamatan" class="form-control" id="kecamatan">
																	<option value=''>Pilih Kecamatan</option>
																  </select>
																<small id="kecamatanHelpBlock" class="form-text text-muted">
								Silahkan pilih Kecamatan yang Sesuai.</small>
															</div>
															<div class="form-group col-md-6">
																<select name="desa" class="form-control" id="desa">
																	<option value=''>Pilih desa</option>
																  </select>
																<small id="desaHelpBlock" class="form-text text-muted">
								Silahkan pilih Desa/Kelurahan yang Sesuai.</small>
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
									<h5>PEMETAAN</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
									<div class="form-row align-items-center">
										<div class="col-lg-3">
											<label class="sr-only" for="inlineFormInput">Latitude</label>
											<?php echo form_input($atitude) ?>
										</div>
										<div class="col-lg-3">
											<label class="sr-only" for="inlineFormInput">Longitude</label>
											<?php echo form_input($latitude) ?>
										</div>
										<div class="col-lg-6">
											<label class="sr-only" for="inlineFormInput">Point PKS</label>
											<?php echo form_input($point) ?>
										</div>
									</div>
									<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">Pilih Dari Peta</a>
											</li>
											<li class="nav-item">
												<a class="nav-link btn" id="input-kml-tab" data-toggle="tab" href="#input-kml-tab-pane" role="tab" aria-controls="input-kml-tab-pane">Input KML</a>
											</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
											<div class="widget-group row no-gutters">
												<div class="col-12">
													<div class="card">
														<div class="card-body">
																<div id="googleMap" style="width:100%;height:380px;"></div>
														  </div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade p-3" id="input-kml-tab-pane" role="tabpanel" aria-labelledby="input-kml-tab">
											<div class="widget-group row no-gutters">
												<div class="col-12">
													<div class="card">
														<div class="card-body">
															<div class="form-row">
															<div class="card col-md-8">
																<div id="petaku" style="width:100%;height:380px;"></div>
															</div>
															<div class="card col-md-4 p-3">
																<div class="form-group">
																	<input type="file" class="form-control" id="upload_file" name="upload_Files[]" onchange="peta_awal()"/>
																</div>
																			<div class="contact ripple row p-4 no-gutters align-items-center unread">
																				<div class="col px-4">
																					<span class="name h6">Pilih <span class="pull-right badge bg-blue">Browse</span></span> 
																					<p class="last-message text-truncate text-muted">Untuk Memilih File KML</p>
																				</div>
																			</div>

																			<div class="divider"></div>
																			<div class="contact ripple row p-4 no-gutters align-items-center unread">
																				<div class="col px-4">
																					<span class="name h6">Pilih Marker</span> 
																					<p class="last-message text-truncate text-muted">Untuk Mengisi Latitude dan Longitude</p>
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
									
									
									
									
									
						</div>
						<div class="card-footer">
									<div class="btn-group" role="group" aria-label="Default button group">
										<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
										<button onclick="location.href='<?php echo $listuri ?>'" class="btn btn-primary" type="reset"><i class="icon-loop"></i> Batal -> Back To List</button>
									</div>
						</div>

							</div>
						</div>
					</div>
				</div>
		<?php echo form_close() ?>
	</div>
	</div>
  <!-- /.content-wrapper -->
</div>
<?php $this->load->view('back/template/footer'); ?>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
    $('#tgl_rencana_tanam').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })
	
    function photoPreview(lampiran,idpreview)
    {
      var gb = lampiran.files;
	  if(gb[0].size > 2*1024*1024) {
        alert('Error : Ukuran File Lebih Dari 2MB');
        return;
    }
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
				var myuri = $(this).val().split('|');
				var iduri = myuri[0];
                var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+iduri;
                $('#kabupaten').load(url);
                return false;
            })
			
			$("#kabupaten").change(function (){
				var myuri = $(this).val().split('|');
				var iduri = myuri[0];
                var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+iduri;
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
<!--script google map </script>-->
 <script type="text/javascript" src="<?php echo base_url('assets/plugins/geoxml') ?>/polys/geoxml3.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/plugins/geoxml') ?>/ProjectedOverlay.js"></script>
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
	var marker;
	function taruhMarker(peta, posisiTitik){
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta,
	    draggable : true
      });
	var forpoint = '[' + posisiTitik.lat() +','+ posisiTitik.lng() +'],';
	document.getElementById("point").value += forpoint;
    }
	
	function peta_awal(){
	    var lokasibaru = new google.maps.LatLng(-5.039440, 112.132323);
	    var petaoption = {
	      zoom: 5,
	      center: lokasibaru,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	  
	  peta = new google.maps.Map(document.getElementById("googleMap"),petaoption);
	  
	  tanda = new google.maps.Marker({
	    position: lokasibaru,
	    map: peta,
	    draggable : true
	  });
	  
	  document.getElementById('atitude').value = tanda.getPosition().lat();
	  document.getElementById('latitude').value = tanda.getPosition().lng();

	  google.maps.event.addListener(tanda, 'dragend', function(event){
	      document.getElementById('atitude').value = this.getPosition().lat();
	      document.getElementById('latitude').value = this.getPosition().lng();
	  }); 
	}

	function setpetaprovinsi(lokasi){
	  var koordinat = lokasi.split('|');
	  var x = koordinat[1];
	  var y = koordinat[2];
	  var id = koordinat[0];

	  var lokasibaru = new google.maps.LatLng(x, y);
	  var petaoption = {
	    zoom: 8,
	    center: lokasibaru,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  
	  peta = new google.maps.Map(document.getElementById("googleMap"),petaoption);

	  tanda = new google.maps.Marker({
	    position: lokasibaru,
	    map: peta, draggable : true
	  });

	  document.getElementById('atitude').value = tanda.getPosition().lat();
	  document.getElementById('latitude').value = tanda.getPosition().lng();

	  google.maps.event.addListener(tanda, 'dragend', function(event){
	      document.getElementById('atitude').value = this.getPosition().lat();
	      document.getElementById('latitude').value = this.getPosition().lng();
	  }); 
	}

	function setpetakota(lokasi){
	  var koordinat = lokasi.split('|');
	  var x = koordinat[1];
	  var y = koordinat[2];
	  var id = koordinat[0];
	  
	  var lokasibaru = new google.maps.LatLng(x, y);
	  var petaoption = {
	    zoom: 11,
	    center: lokasibaru,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  
	  peta = new google.maps.Map(document.getElementById("googleMap"),petaoption);

	  tanda = new google.maps.Marker({
	    position: lokasibaru,
	    map: peta, 
		draggable : true
	  });

	  document.getElementById('atitude').value = tanda.getPosition().lat();
	  document.getElementById('latitude').value = tanda.getPosition().lng();

	  google.maps.event.addListener(tanda, 'dragend', function(event){
	      document.getElementById('atitude').value = this.getPosition().lat();
	      document.getElementById('latitude').value = this.getPosition().lng();
	  }); 
	  google.maps.event.addListener(peta, 'click', function(event) {
		taruhMarker(this, event.latLng);
	  });
	}

	google.maps.event.addDomListener(window, 'load', peta_awal);
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
			var forpoint = '[' + mLat +','+ mLng +'],';
			document.getElementById("point").value += forpoint;
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


	<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>