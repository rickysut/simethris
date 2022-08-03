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
	<?php echo form_open_multipart($action) ?>
	<?php echo validation_errors() ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-titles">Data RIPH</h4>
						
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="alert alert-danger col-12"><small><i>Data ini berisi data Ringkasan RIPH sebagai data acuan (baseline). <b>Dev Note: mohon agar data dapat dihubungkan.</b></i></small></div>
						</div>
						<div class="form-body">
							<div class="row p-t-5">
								<div class="col-lg-6 col-sm-12">
									<ul class="list-group">
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span>No. RIPH</span>
											<span>xxx/PP.240/D/mm/yyyy</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span>Periode</span>
											<span>2021</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span>Tanggal Terbit</span>
											<span>31/01/2021</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span>Tanggal Akhir</span>
											<span>31/12/2021</span>
										</li>
									</ul>
								</div>
								<div class="col-lg-6 col-sm-12">
									<ul class="list-group">
										<li class="list-group-item d-flex justify-content-between align-items-center">
											<span>Volume RIPH <sup>(ton)</sup></span>
											<span>100.000</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center" data-toggle="tooltip" title="Beban Tanam = (Vol. RIPH x 5%)/6">
											<span>Beban Tanam <sup>(ha)</sup></span>
											<span>833.3</span>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center" data-toggle="tooltip" title="Beban Produksi = Vol. RIPH x 5%">
											<span>Beban Produksi <sup>(ton)</sup></span>
											<span>5.000</span>
										</li>
									</ul>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="card">
					<div class="card-header">
						<h4 class="card-titles">Rencana Pelaksanaan</h4>
					</div>
					<div class="card-body">
						<div class="form-body">
							<div class="alert alert-info"><small><i>Bagian ini merupakan Ringkasan Perjanjian Kerjasama Kemitraan/Swakelola.</i></small></div>
							<div class="row">
								<div class="col-lg-6 col-sm-12">
									<div class="form-group has-success">
										<label class="control-label">Nomor Rencana/PKS</label>
										<?php echo form_input($no_pks,$user->no_pks) ?>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12">
									<div class="form-group has-success">
										<label class="control-label">Lampiran Berkas PKS</label>
										<?php if(pathinfo($user->lampiran, PATHINFO_EXTENSION)=='pdf'){
										  $pregmb = '<a href="#"><img src="'.base_url('/assets/images/pdf_thumb.png').'" height="35px" onClick="ViewAttachmentPdf('."'".base_url('/uploads/pks/'.$user->lampiran)."'".','."'".pathinfo(base_url('/uploads/pks/'.$user->lampiran),PATHINFO_FILENAME)."'".');" alt="current PKS"></a>';
										  }else if(pathinfo($user->lampiran, PATHINFO_EXTENSION)=='docx'){
										  $pregmb = '<a href="'.base_url('/uploads/pks/'.$user->lampiran).'"><img width="25px" src="'.base_url('/assets/images/docx_thumb.png').'"></a>';
										  }else if(pathinfo($user->lampiran, PATHINFO_EXTENSION)=='xlsx'){
										  $pregmb = '<a href="'.base_url('/uploads/pks/'.$user->lampiran).'"><img width="25px" src="'.base_url('/assets/images/excel_thumb.png').'"></a>';
										  }else{
										  $pregmb = '<a href="#"><img src="'.base_url('/uploads/pks/'.$user->lampiran).'" height="25px" onClick="ViewAttachmentImage('."'".base_url('/uploads/pks/'.$user->lampiran)."'".','."'".pathinfo(base_url('/uploads/pks/'.$user->lampiran),PATHINFO_FILENAME)."'".');" alt="current PKS"></a>';
										}?>
										<p><?php echo $pregmb;?></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-sm-12">
									<div class="form-group has-success">
										<label class="control-label">Pola Pelaksanaan</label>
										<?php echo form_dropdown('', $type_pelaksana_value, $user->type_pelaksana, $type_pelaksana) ?>
									</div>
									<div class="form-group has-success">
										<label class="control-label">Pengelola</label>
										<?php echo form_input($nama_pelaksana,$user->nama_pelaksana) ?>
									</div>
								</div>
								<div class="col-lg-4 col-sm-12">
									<div class="form-group has-success">
										<label class="control-label">Mulai Berlaku PKS</label>
										<?php echo form_input($tgl_awal_perjanjian,$user->tgl_awal_perjanjian) ?>
									</div>
									<div class="form-group has-success">
										<label class="control-label">Akhir Berlaku PKS</label>
										<?php echo form_input($tgl_awal_perjanjian,$user->tgl_akhir_perjanjian) ?>
									</div>
								</div>
								
								<div class="col-lg-4 col-sm-12">
									<div class="form-group has-success">
										<label class="control-label">Rencana Luas (ha)</label>
										<?php echo form_input($luas_rencana_tanam,$user->luas_rencana_tanam) ?>
									</div>
									<div class="form-group has-success">
										<label class="control-label">Rencana Produksi (ton)</label>
										<?php echo form_input($rencana_produksi,$user->rencana_produksi) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						
							<button class="btn btn-info" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
							<button class="btn btn-warning" type="reset"><i class="icon-loop"></i> <?php echo $btn_reset ?></button>
					</div>
				</div>
				
				<div class="card">
					<div class="card-header">
						<h4 class="card-titles">Data Saprodi</h4>
					</div>
					<div class="card-body">
						<div class="form-body">
							<div class="alert alert-danger"><small><i>Bagian ini berisi Daftar Sarana Produksi yang dilaporkan oleh Importir. <b>Dev Note: mohon agar data dapat dihubungkan.</b></i></small></div>
							<div class="row">
								<div class="col-12">
									Tabel Saprodi PKS
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="card">
					<div class="card-header">
						<h4 class="card-titles">Petugas Pengelola & Rencana Lokasi Tanam</h4>
					</div>
					<div class="card-body">
						<div class="form-body">
							<div class="alert alert-info"><small><i>Data Petugas/Petani Pengelola Lahan Wajib Tanam. Untuk Kelompok Tani, daftarkan nama-nama petani terlebih dahulu di menu Poktan. <b>Dev Note: mohon agar tabel petugas pelaksana dan lokasi dapat dihubungkan.</b></i></small></div>
							
							<div class="card card-body form-body">
								<h4 class="card-title text-info font-bold">Domisili</h4>
								<div class="row">
									<div class="col-lg-3 col-sm-12">
										<div class="form-group has-success">
											<label class="control-label">Provinsi</label>
											<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
										</div>
									</div>
									<div class="col-lg-3 col-sm-12">
										<div class="form-group has-success">
											<label class="control-label">Kab/Kota</label>
											<?php $query = $this->db->get_where('wilayah_kabupaten',array('id'=>$user->kabupaten));
										foreach ($query->result() as $value) {
												$datakab = $value->nama;
											}
										?>
										<select disabled name="kabupaten" class="bg-white form-control" id="kabupaten" onchange="setpetakota(this.options[this.selectedIndex].value)">
											<option value='<?php echo $user->kabupaten ?>'><?php echo $datakab ?></option>
										</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-12">
										<div class="form-group has-success">
											<label class="control-label">Kecamatan</label>
											<?php $query = $this->db->get_where('wilayah_kecamatan',array('id'=>$user->kecamatan));
											foreach ($query->result() as $value) {
													$datakec = $value->nama;
												}
											?>
											<select disabled name="kecamatan" class="bg-white form-control" id="kecamatan">
												<option value='<?php echo $user->kecamatan ?>'><?php echo $datakec ?></option>
											</select>
										</div>
									</div>										
									<div class="col-lg-3 col-sm-12">
										<div class="form-group has-success">
											<label class="control-label">Desa</label>
											<?php $query = $this->db->get_where('wilayah_desa',array('id'=>$user->desa));
											foreach ($query->result() as $value) {
													$datadesa = $value->nama;
												}
											?>
											<select disabled name="desa" class="bg-white form-control" id="desa">
												<option value='<?php echo $user->desa ?>'><?php echo $datadesa ?></option>
											</select>
										</div>
									</div>
									
								</div>
							</div>
							<div class="card card-body form-body m-t-15">
								<h4 class="card-title text-info font-bold">Petugas Pelaksana dan Lokasi Tanam</h4>
								<div class="row">								
									<div class="col-lg-3 col-sm-12">
										<div class="form-group has-success">
											<label class="control-label" >Latitude</label>
											<?php echo form_input($latitude,$user->latitude) ?>
										</div>
									</div>
									<div class="col-lg-3 col-sm-12">
										<div class="form-group has-success">
											<label class="control-label" >Longitude</label>
											<?php echo form_input($latitude,$user->atitude) ?>
										</div>
									</div>
									<div class="col-lg-6 col-sm-12">
										<div class="form-group has-success">
											<label class="control-label" >Marker</label>
											<?php echo form_input($point,$user->point) ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-sm-12">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">Pilih Dari Peta</a>
											</li>
											<li class="nav-item">
												<a class="nav-link btn" id="input-kml-tab" data-toggle="tab" href="#input-kml-tab-pane" role="tab" aria-controls="input-kml-tab-pane">Input KML</a>
											</li>
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

<?php $this->load->view('back/template/footer_new'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>


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
<script src="https://maps.google.com/maps/api/js?v=3.40&libraries=places,drawing&key=AIzaSyCmByxQYKyC_hhkkoSFCiWM_0TwQjGckLs"></script>
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
	  if(photo.files.size > 2*1024*1024) {
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



<!-- Modal Verifikasi -->

<!-- End Modal Verifikasi -->


<!-- Modal view PDF & Image -->
<div class="modal fade" id="mymodalpdf" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalTitle">Header</h4>
				<button type="button" class="close" data-dismiss="modal">@times;<button>
			</div>
			<div class="modal-body">
				<div class="modal-body">
					<embed id="modalPdf" src="file:///C:/Users/hp/Downloads/sb_finance.pdf" frameborder="0" width="100%" height="400px">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Verifikasi -->