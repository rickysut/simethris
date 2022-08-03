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
					<?php echo form_dropdown('', $status_lahan_value, '', $status_lahan) ?>
					<?php echo form_dropdown('', $kontur_lahan_value, '', $kontur_lahan) ?>
					<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
					<?php echo form_dropdown('',$get_all_combobox_kabupaten, $user->kabupaten, $kabupaten) ?>
					<?php echo form_dropdown('', $get_all_combobox_kecamatan, $user->kecamatan, $kecamatan) ?>
					<?php echo form_dropdown('', $get_all_combobox_desa, $user->desa, $desa) ?>
					<?php echo form_textarea($address, $user->address) ?>
				</div>
				<div class="col-12">
          <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>DATA PLAKSANA - ID CPCL : <?php echo $user->id_cpcl ?> </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($tgl_produksi, $user->tgl_produksi) ?>
									<label for="name" class="col-form-label">Tanggal Produksi</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($luas_realisasi_tanam, $user->luas_realisasi_tanam, $luas_realisasi_tanam) ?>
									<label for="name" class="col-form-label">Luas Realisasi Tanam (Dalam Satuan Hektar)</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($jml_produksi, $user->jml_produksi, $jml_produksi) ?>
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
									<h5>PETA - ID CPCL : <?php echo $user->id_cpcl ?> </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group">
									<div id="googleMap" style="width:100%;height:380px;"></div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<?php echo form_input($atitude, $user->atitude) ?>
									<label for="atitude" class="col-form-label">Latitude</label>
								</div>
								<div class="form-group col-md-4">
									<?php echo form_input($latitude, $user->latitude) ?>
									<label for="latitude" class="col-form-label">Longitude</label>
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
		<?php echo form_close() ?>
	</div>
   </div>
  </div>

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
  var pos1=document.getElementById("atitude").value;
  var pos2=document.getElementById("latitude").value;
  var peta = new google.maps.Map(document.getElementById('googleMap'), {
		zoom: 13,
		center: new google.maps.LatLng(pos1, pos2),
		mapTypeId: google.maps.MapTypeId.HYBRID,
		zoomControl: true
	  });
  /*var propertiPeta = {
    center:new google.maps.LatLng(pos1,pos2),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);*/
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

//initialize();

</script>
</div>
<!-- ./wrapper -->
</body>
</html>
