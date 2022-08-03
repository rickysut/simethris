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
					  <div class="col-sm-6">
						<div class="form-group" onchange="set_to(this.value)"><label>Pelaksana (*)</label>
						<?php echo form_input($id_cpcl, $user->id_cpcl) ?>
						<?php echo form_dropdown('', $type_pelaksana_value, $user->type_pelaksana, $type_pelaksana) ?>
						</div>
					  </div>
					  <div class="col-sm-6" id="poktan">
						<div class="form-group"><label>Nama Pelaksana / Petani (*)</label>
						<?php echo form_input($nama_pelaksana) ?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Rencana Tanggal Tanam</label>
						  <?php echo form_input($tgl_rencana_tanam, $user->tgl_rencana_tanam) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Realisasi Tanggal Tanam</label>
						  <?php echo form_input($tgl_realisasi_tanam) ?>
						</div>
					  </div>
					</div>  
					  <div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Rencana Luas Tanam</label>
						  <?php echo form_input($luas_rencana_tanam, $user->luas_rencana_tanam) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Realisasi Luas Tanam</label>
						  <?php echo form_input($luas_realisasi_tanam) ?>
						</div>
					  </div>
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
							<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Kabupaten</label>
						  <?php echo form_dropdown('',$get_all_combobox_kabupaten, $user->kabupaten, $kabupaten) ?>
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
					<div class="form-group"><label>Address</label>
						<?php echo form_textarea($address) ?>
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
					<div role="navigation" class="navbar navbar-default navbar-static-top">
					<div class="container">
						<div class="navbar-header">
						  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>
					  </div>
					</div>
					<div class="container" style="min-height:500px;">
					<div class=''></div>
					
							<div class="row ">			
								<form enctype="multipart/form-data" action="" method="post">
								<div class="form-group  col-sm-3">
									<div class="filearray">  
									</div>
									<label>Choose Files</label>
									<input type="file" class="form-control" id="upload_file" name="upload_Files[]" onchange="preview_image()" multiple />				
								</div>   
								<div class="form-group  col-sm-6">		
									<input  type="submit" class="btn btn-success" name="submitForm" id="submitForm" value="Upload" />	
								</div>		
							</div> 	
							<div class="container">
							<div class="row">
								<div class="gallery">
									<ul>
										<?php if(!empty($gallery)): foreach($gallery as $file): ?>
										<li>
											<img width="200" height="125" src="<?php echo base_url('uploads/realisasi/'.$file['file_data']); ?>" alt="" >
											<p>di Upload Pada <?php echo date("j M Y",strtotime($file['file_tanggal'])); ?></p>
										</li>
										<?php endforeach; else: ?>
										<p>No File uploaded.....</p>
										<?php endif; ?>
									</ul>
								</div>
								<div id="image_preview"></div>
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
					  <div class="col-lg-4">
						<div class="form-group"><label>Latitude</label>
						  <?php echo form_input($atitude) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Longitude</label>
						  <?php echo form_input($latitude) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Polygon</label>
						  <?php echo form_input($realisasi_polygon) ?>
						</div>
					  </div>
					</div>
				  <div class="row">
					  <div class="col-md-12">
						<div class="card">
						  <!-- /.card-header -->
						  <div class="card-body">
							<div class="row">
							  <div class="col-md-8">
								<p class="text-center">
								<div id="map" style="width:100%;height:380px;"></div></p>
								</div>
								<!-- /.chart-responsive -->
							  
							  <!-- /.col -->
							  <div class="col-md-4">
								<p class="text-center">
								  <strong>Keterangan</strong>
								</p>

								<div id="panel" style="width:100%;height:380px;">
											  <p class="text-left"><div id="color-palette"></div></p><br>
											  <div>
												<p class="text-left"><button id="delete-button">Hapus Bidang yang dipilih</button></p>
											  </div><br><br><br>
											<div id="curpos"></div>
											<div id="cursel"></div>
											<div id="note"><small>Catatan: <b>markers</b> dapat dipilih, tetapi tidak ditunjukkan secara grafis; dapat dihapus, tetapi warnanya tidak dapat diubah.</small></div>
											</div>
											<input id="pac-input" type="text" placeholder="Search Box">
							  </div>
							  <!-- /.col -->
							</div>
							<!-- /.row -->
						  </div>
						  <!-- ./card-body -->
						  <div class="card-footer">
							<div class="row">
							 	  
							  
							</div>
							<!-- /.row -->
						  </div>
						  <!-- /.card-footer -->
						</div>
						<!-- /.card -->
					  </div>
					  <!-- /.col -->
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
  <script src="http://maps.google.com/maps/api/js?sensor=false&v=3.21.5a&libraries=drawing&signed_in=true&libraries=places,drawing?key=AIzaSyDaMs21-YdoTeAAuxFInk6F4lks9t8TRRs"></script>
<script >
      var drawingManager;
      var selectedShape;
      var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
      var selectedColor;
      var colorButtons = {};

      function clearSelection() {
        if (selectedShape) {
          if (typeof selectedShape.setEditable == 'function') {
            selectedShape.setEditable(false);
          }
          selectedShape = null;
        }
        curseldiv.innerHTML = "<b>cursel</b>:";
      }

      function updateCurSelText(shape) {
        posstr = "" + selectedShape.position;
		if (typeof selectedShape.position == 'object') {
          posstr = selectedShape.position.toUrlValue();
		  var latUrl = parseFloat(posstr.split(',', 2)[0]);
		  var lngUrl = parseFloat(posstr.split(',', 2)[1]);
		  document.getElementById('atitude').value = latUrl;
		  document.getElementById('latitude').value = lngUrl;
        }
        pathstr = "" + selectedShape.getPath;
        if (typeof selectedShape.getPath == 'function') {
          pathstr = "[[";
          for (var i = 0; i < selectedShape.getPath().getLength(); i++) {
            // .toUrlValue(5) limits number of decimals, default is 6 but can do more
            pathstr += selectedShape.getPath().getAt(i).toUrlValue() + "] , [";
          }
          pathstr += "]]";
		  var mypath = selectedShape.getPath();
		  var encodeString = google.maps.geometry.encoding.encodePath(mypath);
		  document.getElementById('realisasi_polygon').value = encodeString;
        }
        bndstr = "" + selectedShape.getBounds;
        cntstr = "" + selectedShape.getBounds;
        if (typeof selectedShape.getBounds == 'function') {
          var tmpbounds = selectedShape.getBounds();
          cntstr = "" + tmpbounds.getCenter().toUrlValue();
          bndstr = "[NE: " + tmpbounds.getNorthEast().toUrlValue() + " SW: " + tmpbounds.getSouthWest().toUrlValue() + "]";
        }
        cntrstr = "" + selectedShape.getCenter;
        if (typeof selectedShape.getCenter == 'function') {
          cntrstr = "" + selectedShape.getCenter().toUrlValue();
        }
        radstr = "" + selectedShape.getRadius;
        if (typeof selectedShape.getRadius == 'function') {
          radstr = "" + selectedShape.getRadius();
        }
		//var posisititik = str.split(",",2)
        curseldiv.innerHTML = "<b>cursel</b>: " + selectedShape.type + " " + selectedShape + "; <i>pos</i>: " + posstr + " ; <i>path</i>: " + pathstr + " ; <i>bounds</i>: " + bndstr + " ; <i>Cb</i>: " + cntstr + " ; <i>radius</i>: " + radstr + " ; <i>Cr</i>: " + cntrstr;
		//var coord = pathstr;
		var coord = [[0.485108,114.566087] , [-0.393789,113.379564] , [-1.404394,114.038743] , [-0.481677,116.939134]];
		var turf_polygon = turf.polygon([coord]);
		var turf_area = turf.area(turf_polygon);
		if ((turf_area / 10000).toFixed(2) <= 1) {
		  alert("Luas Area : " + (turf_area).toFixed(2) + " m2")
		} else {
		  alert("Luas Area : " + (turf_area / 10000).toFixed(2) + " ha")
		}
      }

      function setSelection(shape, isNotMarker) {
        clearSelection();
        selectedShape = shape;
        if (isNotMarker)
          shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
        updateCurSelText(shape);
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

      /////////////////////////////////////
      var map; //= new google.maps.Map(document.getElementById('map'), {
      // these must have global refs too!:
      var placeMarkers = [];
      var input;
      var searchBox;
      var curposdiv;
      var curseldiv;

      function deletePlacesSearchResults() {
        for (var i = 0, marker; marker = placeMarkers[i]; i++) {
          marker.setMap(null);
        }
        placeMarkers = [];
        input.value = ''; // clear the box too
      }

      /////////////////////////////////////
      function initialize() {
        map = new google.maps.Map(document.getElementById('map'), { //var
          zoom: 5,//10,
          center: new google.maps.LatLng(-0.789275, 113.92132700000002),//(22.344, 114.048),
          mapTypeId: google.maps.MapTypeId.SATELLITE,
          disableDefaultUI: false,
          zoomControl: true
        });
        curposdiv = document.getElementById('curpos');
        curseldiv = document.getElementById('cursel');

        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.POLYGON,
          markerOptions: {
            draggable: true,
            editable: true,
          },
          polylineOptions: {
            editable: true
          },
          rectangleOptions: polyOptions,
          circleOptions: polyOptions,
          polygonOptions: polyOptions,
          map: map
        });

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
          //~ if (e.type != google.maps.drawing.OverlayType.MARKER) {
            var isNotMarker = (e.type != google.maps.drawing.OverlayType.MARKER);
            // Switch back to non-drawing mode after drawing a shape.
            drawingManager.setDrawingMode(null);

            // Add an event listener that selects the newly-drawn shape when the user
            // mouses down on it.
            var newShape = e.overlay;
            newShape.type = e.type;
            google.maps.event.addListener(newShape, 'click', function() {
              setSelection(newShape, isNotMarker);
            });
            google.maps.event.addListener(newShape, 'drag', function() {
              updateCurSelText(newShape);
            });
            google.maps.event.addListener(newShape, 'dragend', function() {
              updateCurSelText(newShape);
            });
            setSelection(newShape, isNotMarker);
          //~ }// end if
        });

        // Clear the current selection when the drawing mode is changed, or when the
        // map is clicked.
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(map, 'click', clearSelection);
        google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

        buildColorPalette();

        //~ initSearch();
        // Create the search box and link it to the UI element.
         input = /** @type {HTMLInputElement} */( //var
            document.getElementById('pac-input'));
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        //
        var DelPlcButDiv = document.createElement('div');
        //~ DelPlcButDiv.style.color = 'rgb(25,25,25)'; // no effect?
        DelPlcButDiv.style.backgroundColor = '#fff';
        DelPlcButDiv.style.cursor = 'pointer';
        DelPlcButDiv.innerHTML = 'DEL';
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(DelPlcButDiv);
        google.maps.event.addDomListener(DelPlcButDiv, 'click', deletePlacesSearchResults);

        searchBox = new google.maps.places.SearchBox( //var
          /** @type {HTMLInputElement} */(input));

        // Listen for the event fired when the user selects an item from the
        // pick list. Retrieve the matching places for that item.
        google.maps.event.addListener(searchBox, 'places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }
          for (var i = 0, marker; marker = placeMarkers[i]; i++) {
            marker.setMap(null);
          }

          // For each place, get the icon, place name, and location.
          placeMarkers = [];
          var bounds = new google.maps.LatLngBounds();
          for (var i = 0, place; place = places[i]; i++) {
            var image = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            var marker = new google.maps.Marker({
              map: map,
              icon: image,
              title: place.name,
              position: place.geometry.location
            });

            placeMarkers.push(marker);

            bounds.extend(place.geometry.location);
          }

          map.fitBounds(bounds);
        });

        // Bias the SearchBox results towards places that are within the bounds of the
        // current map's viewport.
        google.maps.event.addListener(map, 'bounds_changed', function() {
          var bounds = map.getBounds();
          searchBox.setBounds(bounds);
          curposdiv.innerHTML = "<b>curpos</b> Z: " + map.getZoom() + " C: " + map.getCenter().toUrlValue();
        }); //////////////////////
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	
  <script type="text/javascript">
    $('#tgl_realisasi_tanam').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })
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
function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
	
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width=200 height=125>&nbsp;");
 }
}
</script>
</script>

</div>
<!-- ./wrapper -->
</body>
</html>
