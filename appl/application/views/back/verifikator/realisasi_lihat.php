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
								<div class="form-group col-md-6">
									<?php echo form_input($id_cpcl, $user->id_cpcl) ?>
									<?php echo form_input($id_realisasi, $user->id_realisasi) ?>
									<?php echo form_dropdown('', $type_pelaksana_value, '', $type_pelaksana) ?>
									<label for="name" class="col-form-label">Pelaksana</label>
								</div>
								<div class="form-group col-md-6" id="poktan">
									<?php echo form_input($nama_pelaksana,$user->nama_pelaksana) ?>
									<label for="name" class="col-form-label">Kelompok Tani</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($tgl_realisasi_tanam,date('d-m-Y',strtotime($user->tgl_realisasi_tanam))) ?>
									<label for="name" class="col-form-label">Tanggal Realisasi Tanam</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($luas_realisasi_tanam,$user->luas_realisasi_tanam) ?>
									<label for="name" class="col-form-label">Luas Realisasi Tanam</label>
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
									<h5>DATA DOMISILI - ID CPCL : <?php echo $user->id_cpcl ?> - PELAKSANA :  <?php echo $user->nama_pelaksana ?></h5>
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
									<h5>DAFTAR LAMPIRAN / PHOTO </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
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
				<div class="col-12">
                    <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>PEMETAAN </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">Penanda / Marker</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="imput-manual-tab" data-toggle="tab" href="#input-manual-tab-pane" role="tab" aria-controls="input-manual-tab-pane">Polygon</a>
                                    </li>
                            </ul>
							<div class="tab-content">
								<div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
									<div class="widget-group row no-gutters">
                                        <div class="col-12">
											<div class="card">
												<div class="card-body">
													<div class="form-row">
													  <div class="card col-md-12">
														<div id="googleMap" style="width:100%;height:360px;"></div></p>
														</div>
														<!-- /.chart-responsive -->
													  
													  <!-- /.col -->
													 
													  <!-- /.col -->
													</div>
													<!-- /.row -->
												  </div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade p-3" id="input-manual-tab-pane" role="tabpanel" aria-labelledby="input-manual-tab">
									<div class="widget-group row no-gutters">
                                        <div class="col-12">
											<div class="card">
												<div class="card-body">
												<div class="form-row">
													<div class="card col-md-12">
														<div id="map_canvas" style="width:100%;height:360px;"></div>
													</div>
												</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row p-3">
								<div class="form-group col-md-4">
									<?php echo form_input($atitude,$user->atitude) ?>
									<label for="atitude" class="col-form-label">Latitude</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($latitude,$user->latitude) ?>
									<label for="latitude" class="col-form-label">Longitude</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($realisasi_polygon, $user->realisasi_polygon) ?>
									<label for="realisasi_polygon" class="col-form-label">Polygon</label>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="container">
								<div class="btn-group" role="group" aria-label="Default button group">
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
  </div>
  </div>
 </div>
  <?php $this->load->view('back/template/footer'); ?>
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
   decodedPolygon = google.maps.geometry.encoding.decodePath(encodedString);

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
    petaku = new google.maps.Map(
    document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(-6.6596049400201425, 107.71690192236417),
        zoom: 10,
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
   	
		var mypoly = [document.getElementById("realisasi_polygon").value];
		var bounds = new google.maps.LatLngBounds();
		for (var i = 0; i < mypoly.length; i++) {
			// var encodedPath = mypoly[i].getAttribute("coords");

			// var encodedPath = "yzocFzynhVq}@n}@o}@nzD";
			var encodedPath = mypoly[i];
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

			dataPolygon.setMap(petaku);
			bounds.extend(decodedPolygon);
		}
    google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {
        encodePolygon(polygon);
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
  function ViewAttachmentImage(image_url,imageTitle){
	$('#modelTitle').html(imageTitle); 
	$('#modalImgs').attr('src',image_url);
	$('#myModalImg').modal('show');
}

  </script>
</div>
<!--- Modal Verifikasi -->
	<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog"
		 aria-labelledby="verifikasiModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="verifikasiModalLabel">Verifikasi PKS - Langkah 2</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<?php echo form_open_multipart($action) ?>
				<?php echo form_input($id_users,$user->id_users) ?>
				<?php $query = $this->db->get_where('users',array('id_users'=>$user->id_users));
				foreach ($query->result() as $value) {
					$nama_lo = $value->name;
					$namaPers = $value->nama_perusahaan;
				}
				?>
				<?php echo form_input($name,$nama_lo) ?>
				<?php echo form_input($id_realisasi, $user->id_realisasi) ?>
				<div class="modal-body">
						<div class="form-row">
							<label for="id_cpcl" class="form-control-label">Nama Perusahaan:</label>
							<?php echo form_input($nama_perusahaan, $namaPers) ?>
						</div>
						<div class="form-row">
							<label for="nama_pelaksana" class="form-control-label">Nama Pelaksana:</label>
							<?php echo form_input($nama_pelaksana,$user->nama_pelaksana) ?>
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
</body>
</html>
