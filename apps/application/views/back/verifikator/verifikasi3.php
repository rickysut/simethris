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
						<div class="form-group"><label>User ID</label>
						    <?php echo form_input($id_r_verifikasi, $user->id_r_verifikasi) ?>
							<?php echo form_input($id_users,$user->id_users) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Nama User</label>
							<?php echo form_input($name,$user->name) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Nama User</label>
							<?php echo form_input($nama_perusahaan,$user->nama_perusahaan) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>ID Verifikasi</label>
							<?php echo form_input($id_verifikasi_3,$user->id_r_jverifikasi) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group" ><label>Status Verifikasi</label>
							<?php echo form_dropdown('', $is_verifikasi_3_value, '', $is_verifikasi_3) ?>
						</div>
					  </div>
					 </div>
					  <div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Keterangan</label>
							<?php echo form_textarea($keterangan_3) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Unggah Bukti *</label>
							  <input type="file" name="bukti3" id="bukti3" class="form-control"/>
							  <p class="help-block">Hasil Scan atau file pdf Bukti Verifikasi</p>
						</div>  
					  </div>
					</div>
				  </div>
					  
				 <div class="box-footer">
					<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
					<button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
					<a href="<?php echo $back_action ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> <?php echo $btn_back ?></a>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
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
    mapTypeId:google.maps.MapTypeId.SATELLITE
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
