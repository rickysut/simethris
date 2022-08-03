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
											<div class="form-group col-md-8">
												<?php echo form_input($no_pks,$user->no_pks) ?>
												<label for="nama_pelaksana" class="col-form-label">Nomor PKS</label>
											</div>
									</div>
									<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_dropdown('', $type_pelaksana_value, $user->type_pelaksana, $type_pelaksana) ?>
												<label for="name" class="col-form-label">Pelaksana</label>
											</div>
											<div class="form-group col-md-6" id="poktan">
												<?php echo form_input($nama_pelaksana,$user->nama_pelaksana) ?>
												<label for="nama_pelaksana" class="col-form-label">Kelompok Tani</label>
											</div>
									</div>
									<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_input($tgl_rencana_tanam,$user->tgl_rencana_tanam) ?>
												<label for="tgl_rencana_tanam" class="col-form-label">Tgl Rencana Tanam</label>
											</div>
											<div class="form-group col-md-6">
												<?php echo form_input($luas_rencana_tanam,$user->luas_rencana_tanam) ?>
												<label for="luas_rencana_tanam" class="col-form-label">Rencana Luas Tanam</label>
											</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
												<?php if(pathinfo($user->lampiran, PATHINFO_EXTENSION)=='pdf'){
													  $pregmb = '<a href="#"><img src="'.base_url('/assets/images/pdf_thumb.png').'" height="75" onClick="ViewAttachmentPdf('."'".base_url('/uploads/pks/'.$user->lampiran)."'".','."'".pathinfo(base_url('/uploads/pks/'.$user->lampiran),PATHINFO_FILENAME)."'".');" alt="current PKS"></a>';
												  }else if(pathinfo($user->lampiran, PATHINFO_EXTENSION)=='docx'){
													  $pregmb = '<a href="'.base_url('/uploads/pks/'.$user->lampiran).'"><img width="75px" src="'.base_url('/assets/images/docx_thumb.png').'"></a>';
												  }else if(pathinfo($user->lampiran, PATHINFO_EXTENSION)=='xlsx'){
													  $pregmb = '<a href="'.base_url('/uploads/pks/'.$user->lampiran).'"><img width="75px" src="'.base_url('/assets/images/excel_thumb.png').'"></a>';
												  }else{
													  $pregmb = '<a href="#"><img src="'.base_url('/uploads/pks/'.$user->lampiran).'" height="75" onClick="ViewAttachmentImage('."'".base_url('/uploads/pks/'.$user->lampiran)."'".','."'".pathinfo(base_url('/uploads/pks/'.$user->lampiran),PATHINFO_FILENAME)."'".');" alt="current PKS"></a>';
												}?>
												<p><?php echo $pregmb;?></p>
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
									<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
									<label for="name" class="col-form-label">Provinsi</label>
								</div>
								<div class="form-group col-md-6">
								<?php $query = $this->db->get_where('wilayah_kabupaten',array('id'=>$user->kabupaten));
									foreach ($query->result() as $value) {
											$datakab = $value->nama;
										}
									?>
									<select name="kabupaten" class="form-control" id="kabupaten" onchange="setpetakota(this.options[this.selectedIndex].value)">
										<option value='<?php echo $user->kabupaten ?>'><?php echo $datakab ?></option>
									</select>
									<label for="name" class="col-form-label">Kabupaten</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
								    <?php $query = $this->db->get_where('wilayah_kecamatan',array('id'=>$user->kecamatan));
									foreach ($query->result() as $value) {
											$datakec = $value->nama;
										}
									?>
									<select name="kecamatan" class="form-control" id="kecamatan">
										<option value='<?php echo $user->kecamatan ?>'><?php echo $datakec ?></option>
									</select>
									<label for="name" class="col-form-label">Kecamatan</label>
								</div>
								<div class="form-group col-md-6">
									<?php $query = $this->db->get_where('wilayah_desa',array('id'=>$user->desa));
									foreach ($query->result() as $value) {
											$datadesa = $value->nama;
										}
									?>
									<select name="desa" class="form-control" id="desa">
										<option value='<?php echo $user->desa ?>'><?php echo $datadesa ?></option>
									</select>
									<label for="name" class="col-form-label">Desa</label>
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
											<?php echo form_input($atitude,$user->atitude) ?>
										</div>
										<div class="col-lg-3">
											<label class="sr-only" for="inlineFormInput">Longitude</label>
											<?php echo form_input($latitude,$user->latitude) ?>
										</div>
										<div class="col-lg-6">
											<label class="sr-only" for="inlineFormInput">Point PKS</label>
											<?php echo form_input($point,$user->point) ?>
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
										<?php 
											foreach($get_all_marker_cpcl as $usermarker){
												$allmarker = $usermarker->point;
											}
											$jmlkarakter = strlen($allmarker)-1;
											$json_array_marker = substr($allmarker,0,$jmlkarakter);
										?>
										<div class="tab-pane fade show active p-0 y-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
											<div class="widget-group row no-gutters">
												<div class="card col-md-9 no-gutters">
													<div id="googleMap" style="width:100%;height:360px;"></div></p>
												</div>
												<div class="card col-md-3 no-gutters">
													<div class="card-header">
														<div class="description">
															<div class="description-text">
																<h5>Keterangan</h5>
															</div>
														</div>
													</div>

													<div class="card-body">
														<div class="form-row">
														<div id="color-palette"></div>
														</div><br>
																	
														<span>
														<button type="button" class="btn btn-secondary" id="delete-button">Hapus  Area</button>
														<button type="button" class="btn btn-secondary" id="calculate" onClick="calcar()">Hitung Area</button>
														</span>
																	
														<div class="form-row">
															<div id="area"></div>	
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
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifikasiModal"
												data-whatever="@getbootstrap">Verifikasi
										</button>
									</div>
						</div>

							</div>
						</div>
					</div>
				</div>
	
	</div>
	
	</div>
  <!-- /.content-wrapper -->
  
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
    $('#tgl_rencana_tanam').datepicker({
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
<script>
	var drawingManager;
	var selectedShape;
	var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
	var selectedColor;
	var colorButtons = {};
	
	function clearSelection() {
	  if (selectedShape) {
		selectedShape.setEditable(false);
		selectedShape = null;
	  }
	}

	function setSelection(shape) {
	  clearSelection();
	  selectedShape = shape;
	  shape.setEditable(true);
	  selectColor(shape.get('fillColor') || shape.get('strokeColor'));
	  google.maps.event.addListener(shape.getPath(), 'set_at', calcar);
	  google.maps.event.addListener(shape.getPath(), 'insert_at', calcar);
	  var mypath = selectedShape.getPath();
	  var encodeString = google.maps.geometry.encoding.encodePath(mypath);
	  document.getElementById('realisasi_polygon').value = encodeString;
	}

	function calcar() {
		var area = google.maps.geometry.spherical.computeArea(selectedShape.getPath())/10000;
		document.getElementById("area").innerHTML = "   Area = <b>" + area.toFixed(2) + "</b> Ha";
	}

	function deleteSelectedShape() {
	  if (selectedShape) {
		selectedShape.setMap(null);
	  }
	}

	function selectColor(color) {
	  selectedColor = color;
	  for (var i = 0; i < colors.length; ++i) {
		var currColor = colors[i];
		colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
	  }

	  // Retrieves the current options from the drawing manager and replaces the
	  // stroke or fill color as appropriate.
	  var polylineOptions = drawingManager.get('polylineOptions');
	  polylineOptions.strokeColor = color;
	  drawingManager.set('polylineOptions', polylineOptions);

	  var rectangleOptions = drawingManager.get('rectangleOptions');
	  rectangleOptions.fillColor = color;
	  drawingManager.set('rectangleOptions', rectangleOptions);

	  var circleOptions = drawingManager.get('circleOptions');
	  circleOptions.fillColor = color;
	  drawingManager.set('circleOptions', circleOptions);

	  var polygonOptions = drawingManager.get('polygonOptions');
	  polygonOptions.fillColor = color;
	  drawingManager.set('polygonOptions', polygonOptions);
	}

	function setSelectedShapeColor(color) {
	  if (selectedShape) {
		if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
		  selectedShape.set('strokeColor', color);
		} else {
		  selectedShape.set('fillColor', color);
		}
	  }
	}

	function makeColorButton(color) {
	  var button = document.createElement('span');
	  button.className = 'color-button';
	  button.style.backgroundColor = color;
	  google.maps.event.addDomListener(button, 'click', function() {
		selectColor(color);
		setSelectedShapeColor(color);
	  });

	  return button;
	}

	function buildColorPalette() {
	  var colorPalette = document.getElementById('color-palette');
	  for (var i = 0; i < colors.length; ++i) {
		var currColor = colors[i];
		var colorButton = makeColorButton(currColor);
		colorPalette.appendChild(colorButton);
		colorButtons[currColor] = colorButton;
	  }
	  selectColor(colors[0]);
	}

	function initialize() {
	  var map = new google.maps.Map(document.getElementById('googleMap'), {
		zoom: 6,
		center: new google.maps.LatLng(-5.039440, 112.132323),
		mapTypeId: google.maps.MapTypeId.HYBRID,
		disableDefaultUI: true,
		zoomControl: true
	  });

	  var polyOptions = {
		strokeWeight: 0,
		fillOpacity: 0.45,
		editable: true
	  };
	  // Creates a drawing manager attached to the map that allows the user to draw
	  // markers, lines, and shapes.
		drawingManager = new google.maps.drawing.DrawingManager({
		drawingMode: google.maps.drawing.OverlayType.MARKER,
		drawingControl: true,
		drawingControlOptions: {
		  position: google.maps.ControlPosition.TOP_CENTER,
		  drawingModes: [
			google.maps.drawing.OverlayType.MARKER,
			google.maps.drawing.OverlayType.CIRCLE,
			google.maps.drawing.OverlayType.POLYGON,
			google.maps.drawing.OverlayType.POLYLINE,
			google.maps.drawing.OverlayType.RECTANGLE
		  ]
		},
		markerOptions: {
		  draggable: true
		},
		polylineOptions: {
		  editable: true
		},
		rectangleOptions: polyOptions,
		circleOptions: polyOptions,
		polygonOptions: polyOptions,
		map: map
	  });
	  
	  var markers = [<?php echo $json_array_marker; ?>];
	  //var markers = [[-6.637690380202891,107.76628175134282],[-6.647238887937613,107.77100243920903],[-6.648176677807621,107.78336205834965]];
		var infowindow = new google.maps.InfoWindow(), marker, i;
		var bounds = new google.maps.LatLngBounds(); // diluar looping
		for (i = 0; i < markers.length; i++) {  
		pos = new google.maps.LatLng(markers[i][0], markers[i][1]);
		bounds.extend(pos); // di dalam looping
		var marker = new google.maps.Marker({
				position: pos,
				map: map
				});
		
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				map.setCenter(marker.getPosition());
				document.getElementById('atitude').value = marker.getPosition().lat();
				document.getElementById('latitude').value = marker.getPosition().lng();
			}
			
		})(marker, i));
		}
	  map.fitBounds(bounds);
	  google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
		if (e.type != google.maps.drawing.OverlayType.MARKER) {
		  // Switch back to non-drawing mode after drawing a shape.
		  drawingManager.setDrawingMode(null);

		  // Add an event listener that selects the newly-drawn shape when the user
		  // mouses down on it.
		  var newShape = e.overlay;
		  newShape.type = e.type;
		  google.maps.event.addListener(newShape, 'click', function() {
			setSelection(newShape);
		  });
		  var area = google.maps.geometry.spherical.computeArea(newShape.getPath())/10000;
		  document.getElementById("area").innerHTML = "   Area = <b>" + area.toFixed(2) + "</b> Ha";
		  setSelection(newShape);
		}
	  });
	  // Clear the current selection when the drawing mode is changed, or when the
	  // map is clicked.
	  google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
	  google.maps.event.addListener(map, 'click', clearSelection);
	  google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

	  buildColorPalette();
	}
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
	<!--- Modal Verifikasi -->
	<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog"
		 aria-labelledby="verifikasiModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="verifikasiModalLabel">Verifikasi PKS - Langkah 1</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<?php echo form_open_multipart($action) ?>
				<?php echo form_input($id_users,$user->id_users) ?>
				<?php $query = $this->db->get_where('users',array('id_users'=>$user->id_users));
				foreach ($query->result() as $value) {
					$nama_lo = $value->name;
				}
				?>
				<?php echo form_input($name,$nama_lo) ?>
				<div class="modal-body">
						<div class="form-row">
							<label for="id_cpcl" class="form-control-label">ID PKS:</label>
							<?php echo form_input($id_cpcl, $user->id_cpcl) ?>
						</div>
						<div class="form-row">
							<label for="nama_perusahaan" class="form-control-label">Nama Perusahaan:</label>
							<?php echo form_input($nama_perusahaan,$user->nama_perusahaan) ?>
						</div>
						<div class="form-row">
							<label for="no_pks" class="form-control-label">No PKS:</label>
							<?php echo form_input($no_pks,$user->no_pks) ?>
						</div>	
						<div class="form-row">
							<label for="is_verifikasi_1" class="form-control-label">Status Verifikasi:</label>
							<?php echo form_dropdown('', $is_verifikasi_1_value, '', $is_verifikasi_1) ?>
						</div>
						<div class="form-row">
							<label for="keterangan_1" class="form-control-label">Keterangan:</label>
							<?php echo form_textarea($keterangan_1) ?>
						</div>
				</div>
				<div class="modal-footer">
					<!--- <a href="<?php echo $action ?>" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus"></i>
					<span><?php echo $btn_submit ?></span>
					</a> -->
					<button type="submit" name="button" class="btn btn-light"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
	<!--- Modal Verifikasi -->
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
          <img id="modalImgs" src="uploads/attachment/21_preview.png" width="100%" height="400px" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
    </main>
</body>
</html>
