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
						<div class="form-group" onchange="set_to(this.value)"><label>Pelaksana (*)</label>
							<?php echo form_input($id_cpcl, $user->id_cpcl) ?>
							<?php echo form_input($id_realisasi, $user->id_realisasi) ?>
							<?php echo form_dropdown('', $type_pelaksana_value, $user->type_pelaksana, $type_pelaksana) ?>
						</div>
					  </div>
					  <div class="col-sm-6" id="poktan">
						<div class="form-group"><label>Nama Pelaksana / Petani (*)</label>
							<?php echo form_input($nama_pelaksana,$user->nama_pelaksana) ?>
						</div>
					  </div>
					  </div>
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Realisasi Tanggal Tanam</label>
						  <?php echo form_input($tgl_realisasi_tanam,$user->tgl_realisasi_tanam) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Realisasi Luas Tanam</label>
						  <?php echo form_input($luas_realisasi_tanam,$user->luas_realisasi_tanam) ?>
						</div>
					  </div>
					</div> <!--
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Status Lahan</label>
						<?php echo form_dropdown('', $status_lahan_value, $user->status_lahan, $status_lahan) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Kontur Lahan </label>
						<?php echo form_dropdown('', $kontur_lahan_value, $user->kontur_lahan, $kontur_lahan) ?>
						</div>
					  </div>
					  </div>	-->
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
						<?php echo form_textarea($address, $user->address) ?>
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
						  <?php echo form_input($atitude,$user->atitude) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Longitude</label>
						  <?php echo form_input($latitude,$user->latitude) ?>
						</div>
					  </div>
					  <div class="col-lg-4">
						<div class="form-group"><label>Polygon</label>
						  <?php echo form_input($realisasi_polygon, $user->realisasi_polygon) ?>
						</div>
					  </div>
					</div>
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs pull-right">
						  <li class="active"><a href="#tab_1-1" data-toggle="tab">Penanda / Marker</a></li>
						  <li><a href="#tab_2-2" data-toggle="tab">Polygon</a></li>
						  <li><a href="#tab_3-3" data-toggle="tab">Input KML File</a></li>
						  <li class="pull-left header"><i class="fa fa-map"></i> Marker & Polygon</li>
						</ul>
						<div class="tab-content">
						  <div class="tab-pane active" id="tab_1-1" height="350px">
							<div id="googleMap" style="width:100%;height:380px;"></div>
						  </div>
						  <!-- /.tab-pane -->
						  <div class="tab-pane" id="tab_2-2">
							<div class="form-group">
								<div id="map-canvas" style="width:100%;height:380px;"></div>
								<div id="info"></div>
							</div>
						  </div>
						  <div class="tab-pane" id="tab_3-3">
							<div class="form-group">
								<div id="map_canvas" style="width:100%;height:380px;"></div>
								<div id="info"></div>
							</div>
						  </div>
						  <!-- /.tab-pane -->
						  <!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					  </div>
				  </div>
				  <div class="box-footer">
					<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
					<button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
					<a href="<?php echo $back_action2 ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> <?php echo $btn_back2 ?></a>
				  </div>
				</div>
        <?php echo form_close() ?>

    </section>
	</div>
    <!-- /.content -->
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
	<!--script google map-->
<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing?key=AIzaSyDaMs21-YdoTeAAuxFInk6F4lks9t8TRRs"></script>
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
	var map;
	var infoWindow;
	var decodedPolygon = [];
	var posisi1=document.getElementById('atitude').value;
	var posisi2=document.getElementById('latitude').value;

	function initialize() {
		var mapOptions = {
			zoom: 12,
			center: new google.maps.LatLng(posisi1, posisi2),
			mapTypeId: google.maps.MapTypeId.HYBRID
		};

		map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);

		// downloadUrl("polygon_xml.php", function(data) {
		// var xml = data.responseXML;
		// var markers = xml.documentElement.getElementsByTagName("marker");
		//var bounds = new google.maps.LatLngBounds();

		// 1. {zzfIsjmu@kHuczRrg{NxcsO}t{GtczR 
		// 2. a}~cIqcskBu|sEov{OoxNel}AfccMwfzG~q|@nknX}u~GvczR 
		// 3. cljkHmfoQl|J{hrV~syGzhrV
		///var markers = ["{zzfIsjmu@kHuczRrg{NxcsO}t{GtczR",
		///	"a}~cIqcskBu|sEov{OoxNel}AfccMwfzG~q|@nknX}u~GvczR",
		///	"cljkHmfoQl|J{hrV~syGzhrV"];
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
			//bounds.extend(decodedPolygon);
		}
		map.fitBounds(bounds);
		// })

		//alert2(decodedPolygon);
		// Construct the polygon.


		// Add a listener for the click event.
		google.maps.event.addListener(dataPolygon, 'click', showArrays);

		infoWindow = new google.maps.InfoWindow();
	}

	/** @this {google.maps.Polygon} */
	function showArrays(event) {

		// Since this polygon has only one path, we can call getPath()
		// to return the MVCArray of LatLngs.
		var vertices = this.getPath();

		var contentString = '<b>Realisasi Tanam </b><br>' +
			'Lokasi: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
			'<br>';

		// Iterate over the vertices.
		for (var i = 0; i < vertices.getLength(); i++) {
			var xy = vertices.getAt(i);
			contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' + xy.lng();
		}

		// Replace the info window's content and position.
		infoWindow.setContent(contentString);
		infoWindow.setPosition(event.latLng);

		infoWindow.open(map);
	}

	function downloadUrl(url, callback) {
		var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;

		request.onreadystatechange = function () {
			if (request.readyState == 4) {
				request.onreadystatechange = doNothing;
				callback(request, request.status);
			}
		};

		request.open('GET', url, true);
		request.send(null);
	}

	function doNothing() {}

	google.maps.event.addDomListener(window, 'load', initialize);
  </script>

  <script type="text/javascript">
    $('#renc_tgl_tanam').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })
	
	$('#real_tgl_tanam').datepicker({
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
var geocoder;
var petaku;
var polygonArray = [];
var marker;
  
function taruhMarker(petaku, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: petaku
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("atitude").value = posisiTitik.lat();
    document.getElementById("latitude").value = posisiTitik.lng();
    
}

function initialize() {
	var mypoly = document.getElementById("realisasi_polygon").value;
    petaku = new google.maps.Map(
    document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(-6.6596049400201425, 107.71690192236417),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.POLYGON,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [
            google.maps.drawing.OverlayType.POLYGON]
        },
        markerOptions: {
            icon: 'images/car-icon.png'
        },
        circleOptions: {
            fillColor: '#ffff00',
            fillOpacity: 1,
            strokeWeight: 5,
            clickable: false,
            editable: true,
            zIndex: 1
        },
        polygonOptions: {
            fillColor: '#BCDCF9',
            fillOpacity: 0.5,
            strokeWeight: 2,
            strokeColor: '#57ACF9',
            clickable: false,
            editable: false,
            zIndex: 1
        }
    });
    console.log(drawingManager)
	DrawPolygon(mypoly)
    drawingManager.setMap(petaku)

    google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {
        encodePolygon(polygon);
    });
	google.maps.event.addListener(petaku, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}
google.maps.event.addDomListener(window, "load", initialize);
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
