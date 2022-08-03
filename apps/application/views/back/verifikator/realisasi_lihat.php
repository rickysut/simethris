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

      <?php echo form_open_multipart() ?>
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
				<div class="box-header with-border"><h3 class="box-title">DAFTAR PHOTO / LAMPIRAN</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				<!-- /.box-header -->
				<div class="box-body">
				  <div class="table-responsive">
					<table id="dataTable" class="table table-bordered table-striped">
					  <thead>
							<tr>
							  <th>No</th>
							  <th>Files</th>
							  <th>Deskripsi</th>
							  <th>Tanggal</th>
							  <th>Preview</th>
							  <th>Pengunggah</th>
							</tr>
						  </thead>
						  <tbody>
						  <?php $no = 1; foreach($get_all_file_realisasi as $row){
							?>
							<tr>
							  <td style="text-align: center"><?php echo $no++;?></td>
							  <td style="text-align: left"><?php echo $row->file_judul;?></td>
							  <td style="text-align: left"><?php echo $row->file_deskripsi;?></td>
							  <td style="text-align: center"><?php echo $row->file_tanggal;?></td>
							  <td style="text-align: center"><img width='300px' src="<?= base_url('/uploads/realisasi/'.$row->file_data) ?>" alt="" id="myImg"></td>
							  <td style="text-align: left"><?php echo $row->file_oleh;?></td>
							  </tr>
						 <?php } ?>
						  </tbody>
					  <tfoot>
						<tr>
							  <th>No</th>
							  <th>Files</th>
							  <th>Deskripsi</th>
							  <th>Tanggal</th>
							  <th>Preview</th>
							  <th>Pengunggah</th>
							</tr>
					  </tfoot>
					</table>
				  </div>
				</div>
				<!-- /.box-body -->
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
								<div id="map_canvas" style="width:100%;height:380px;"></div>
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
					<a href="<?php echo $back_action ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> <?php echo $btn_back ?></a>
				  </div>
				</div>
        <?php echo form_close() ?>

    </section>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Modal title</h4>
		  </div>
		  <div class="modal-body">
			<img id="img01">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
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
<!--script google map-->
<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyCkQkJ319YpiVABFKwvI23zFA6i4cg30S0"></script>
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

function encodePolygon(polygon)
    {
        //This variable gets all bounds of polygon.
        var path = polygon.getPath();

        var encodeString = google.maps.geometry.encoding.encodePath(path);
		document.getElementById("realisasi_polygon").value = encodeString;
        /* store encodeString in database */
    }
	
function DrawPolygon(encodedString){
   google.maps.geometry.encoding.decodePath(encodedString);

            var polygon = new google.maps.Polygon({
                paths: decodedPolygon,
                editable: false,
                strokeColor: '#FFFF',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FFFF',
                fillOpacity: 0.35
            });
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
<script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
  } );
  </script>
</div>
<!-- ./wrapper -->
</body>
</html>
