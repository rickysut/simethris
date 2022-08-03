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
		<span><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?></span>
    </div>
	<div class="page-content p-3">
		<?php echo form_open_multipart($action) ?>
		<?php echo validation_errors() ?>
        <div class="content container">
			<div class="row">
				<div id="notampil" style="display: none;">
					<?php echo form_input($id_cpcl, $user->id_cpcl) ?>
					<?php echo form_input($id_realisasi, $user->id_realisasi) ?>
					<?php echo form_input($id_users, $user->id_users) ?>
					<?php echo form_dropdown('', $type_pelaksana_value, $user->type_pelaksana, $type_pelaksana) ?>
					<?php echo form_input($nama_pelaksana, $user->nama_pelaksana) ?> 
					<?php echo form_input($nama_petugas, $user->nama_petugas) ?> 
					<?php echo form_dropdown('', $status_lahan_value, '', $status_lahan) ?>
					<?php echo form_dropdown('', $kontur_lahan_value, '', $kontur_lahan) ?>
				</div>
				<div class="col-12">
                    <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>DATA PELAKSANA - PETUGAS / PETANI : <?php echo $user->nama_petugas ?> </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($id_cpcl, $user->id_cpcl) ?>
									<?php echo form_input($tgl_realisasi_tanam, $user->tgl_realisasi_tanam) ?>
									<label for="name" class="col-form-label">Tanggal Tanam</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($tgl_produksi) ?>
									<label for="name" class="col-form-label">Tanggal Produksi</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($luas_realisasi_tanam, $user->luas_realisasi_tanam, $luas_realisasi_tanam) ?>
									<label for="name" class="col-form-label">Luas Realisasi Tanam (Dalam Satuan Hektar)</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($jml_produksi) ?>
									<label for="name" class="col-form-label">Jumlah Panen (Dalam Satuan Ton)</label>
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
									<h5>DATA DOMISILI - PELAKSANA :  <?php echo $user->nama_pelaksana ?></h5>
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
									<select name="kabupaten" class="form-control" id="kabupaten" >
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
							<div class="form-row">
									<div class="form-group col-md-12">
										<?php echo form_textarea($address, $user->address) ?>
										<label for="address" class="col-form-label">Alamat</label>
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
									<h5>UNGGAH PHOTO - ID CPCL : <?php echo $user->id_cpcl ?> </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($file_judul1) ?>
									<label for="file_judul1" class="col-form-label">Judul Kegiatan</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($file_deskripsi1) ?>
									<label for="file_deskripsi1" class="col-form-label">Deskripsi Kegiatan</label>
								</div>
								<div class="form-group col-md-4">
									<input type="file" name="kegiatan1" id="kegiatan1" class="form-control" onchange="kegiatan1Preview(this,'k1preview')"/>
									  <p class="help-block">Photo Kegiatan </p>
									  <b>Preview</b><br>
									  <img id="k1preview" width="250px"/>
									<label for="kegiatan1" class="col-form-label">Unggah Photo *</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($file_judul2) ?>
									<label for="file_judul2" class="col-form-label">Judul Kegiatan</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($file_deskripsi2) ?>
									<label for="file_deskripsi2" class="col-form-label">Deskripsi Kegiatan</label>
								</div>
								<div class="form-group col-md-4">
									<input type="file" name="kegiatan2" id="kegiatan1" class="form-control" onchange="kegiatan2Preview(this,'k2preview')"/>
									  <p class="help-block">Photo Kegiatan </p>
									  <b>Preview</b><br>
									  <img id="k2preview" width="250px"/>
									<label for="kegiatan2" class="col-form-label">Unggah Photo *</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($file_judul3) ?>
									<label for="file_judul3" class="col-form-label">Judul Kegiatan</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($file_deskripsi3) ?>
									<label for="file_deskripsi3" class="col-form-label">Deskripsi Kegiatan</label>
								</div>
								<div class="form-group col-md-4">
									<input type="file" name="kegiatan3" id="kegiatan3" class="form-control" onchange="kegiatan3Preview(this,'k3preview')"/>
									  <p class="help-block">Photo Kegiatan </p>
									  <b>Preview</b><br>
									  <img id="k3preview" width="250px"/>
									<label for="kegiatan3" class="col-form-label">Unggah Photo *</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($file_judul4) ?>
									<label for="file_judul4" class="col-form-label">Judul Kegiatan</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($file_deskripsi4) ?>
									<label for="file_deskripsi4" class="col-form-label">Deskripsi Kegiatan</label>
								</div>
								<div class="form-group col-md-4">
									<input type="file" name="kegiatan4" id="kegiatan4" class="form-control" onchange="kegiatan4Preview(this,'k4preview')"/>
									  <p class="help-block">Photo Kegiatan </p>
									  <b>Preview</b><br>
									  <img id="k4preview" width="250px"/>
									<label for="kegiatan4" class="col-form-label">Unggah Photo *</label>
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
									<h5>PEMETAAN - PELAKSANA :  <?php echo $user->nama_pelaksana ?></h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<?php 
								$allmarker = '';
								foreach($get_all_marker_cpcl as $usermarker){
									$allmarker = $usermarker->point;
								}
								$jmlkarakter = strlen($allmarker)-1;
								$json_array_marker = substr($allmarker,0,$jmlkarakter);
							?>
							<ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">Pilih Dari Peta</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link btn" id="input-kml-tab" data-toggle="tab" href="#input-kml-tab-pane" role="tab" aria-controls="input-kml-tab-pane">Input KML</a>
                                    </li>
                            </ul>
							<div class="tab-content">
								<div class="tab-pane fade show active p-0 y-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
									<div class="widget-group row no-gutters">
										<div class="card col-md-9 no-gutters">
											<div id="map-canvas" style="width:100%;height:360px;"></div></p>
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
								
								<div class="tab-pane fade p-0 y-3" id="input-kml-tab-pane" role="tabpanel" aria-labelledby="input-kml-tab">
									<div class="widget-group row no-gutters">
										<div class="card col-md-9 no-gutters">
											<div id="petaku" style="width:100%;height:360px;"></div></p>
										</div>
										<div class="card col-md-3 no-gutters">
											<div class="form-group">
												<input type="file" class="form-control" id="upload_files" name="upload_Files[]" onchange="peta_awal()"/>
											</div>
											<div class="contact ripple row p-0 no-gutters align-items-center unread">
												<div class="col px-1">
													<span class="name h6">Pilih <span class="badge bg-blue">Browse</span></span> 
													<p class="last-message text-truncate text-muted">Untuk Memilih File KML</p>
												</div>
											</div>

											<div class="divider"></div>
											<div class="contact ripple row p-0 no-gutters align-items-center unread">
												<div class="col px-1">
													<span class="name h6">Pilih Marker</span> 
													<p class="last-message text-truncate text-muted">Untuk Mengisi Latitude dan Longitude</p>
												</div>
											</div>
										
										</div>
                                        
									</div>
								</div>
							</div>
							<div class="divider"></div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($atitude, $user->atitude) ?>
									<label for="atitude" class="col-form-label">Latitude</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($latitude, $user->latitude) ?>
									<label for="latitude" class="col-form-label">Longitude</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($realisasi_polygon, $user->realisasi_polygon) ?>
									<label for="realisasi_polygon" class="col-form-label">Polygon</label>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="btn-group" role="group" aria-label="Default button group">
									<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
									<button class="btn btn-primary" type="reset"><i class="icon-loop"></i> <?php echo $btn_reset ?></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   </div>
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
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
<!--script google map-->
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
<script type="text/javascript">
	var drawingManager;
	var selectedShape;
	var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
	var selectedColor;
	var colorButtons = {};
	var map;
	var infoWindow;
	var decodedPolygon = [];
	var posisi1=document.getElementById('atitude').value;
	var posisi2=document.getElementById('latitude').value;
	
	
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
		var map = new google.maps.Map(document.getElementById('map-canvas'), {
		zoom: 13,
		center: new google.maps.LatLng(posisi1, posisi2),
		mapTypeId: google.maps.MapTypeId.HYBRID,
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
		drawingMode: google.maps.drawing.OverlayType.POLYGON,
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

		var markers = [document.getElementById('realisasi_polygon').value];
		var bounds = new google.maps.LatLngBounds();
		for (var i = 0; i < markers.length; i++) {
			// var encodedPath = markers[i].getAttribute("coords");

			// var encodedPath = "yzocFzynhVq}@n}@o}@nzD";
			var encodedPath = markers[i];
			decodedPolygon = google.maps.geometry.encoding.decodePath(encodedPath);
			
			for (var j = 0; j < decodedPolygon.length; j++) {
				bounds.extend(decodedPolygon[j]);
			}
			var dataPolygon = new google.maps.Polygon({
				paths: decodedPolygon,
				strokeColor: '#FF0000',
				strokeOpacity: 0.8,
				strokeWeight: 3,
				fillColor: '#FF0000',
				fillOpacity: 0.35
			});

			dataPolygon.setMap(map);

			//alert1(decodedPolygon);
			bounds.extend(decodedPolygon);
		}
		 var tanda = [[posisi1,posisi2]];
	  //var markers = [[-6.637690380202891,107.76628175134282],[-6.647238887937613,107.77100243920903],[-6.648176677807621,107.78336205834965]];
		var infowindow = new google.maps.InfoWindow(), marker, i;
		var bounds = new google.maps.LatLngBounds(); // diluar looping
		for (i = 0; i < tanda.length; i++) {  
		pos = new google.maps.LatLng(tanda[i][0], tanda[i][1]);
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
	<script>
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
	var total_file=document.getElementById("upload_files").files.length;
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

</div>
<!-- ./wrapper -->
</body>
</html>
