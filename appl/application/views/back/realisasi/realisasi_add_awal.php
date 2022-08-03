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
					  </div> <!--
				    <div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Status Lahan</label>
						<?php echo form_dropdown('', $status_lahan_value, '', $status_lahan) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Kontur Lahan </label>
						<?php echo form_dropdown('', $kontur_lahan_value, '', $kontur_lahan) ?>
						</div>
					  </div>
					  </div> -->
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
				<div class="box box-primary">
				  <div class="box-header with-border"><h3 class="box-title">PEMETAAN</h3>
					<div class="box-tools pull-right">
					  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				  </div>
				  <div class="box-body">
					<div class="row">
					  <div class="col-sm-6">
						<div class="form-group"><label>Latitude</label>
						  <?php echo form_input($atitude) ?>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group"><label>Longitude</label>
						  <?php echo form_input($latitude) ?>
						</div>
					  </div>
					</div>
					<div class="form-group"><label>Peta</label>
						<div id="googleMap" style="width:100%;height:380px;"></div>
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

  <script type="text/javascript">
    $('#tgl_realisasi_tanam').datepicker({
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
  var propertiPeta = {
    center:new google.maps.LatLng(-6.6596049400201425,107.71690192236417),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.SATELLITE
  };
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta); 
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });
}
// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
        $(document).ready(function(){
            
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                                            .attr('id','btn-finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ 
                                                    
                                                });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ 
                                                    $('#smartwizard').smartWizard("reset");  
                                                });                         
            
            
            
            // Smart Wizard
            $('#smartwizard').smartWizard({ 
                    selected: 0, 
                    theme: 'dots',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });
            
            $("#btn-finish").addClass('disabled');
             $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                   //alert("You are on step "+stepNumber+" now");
                   if(stepPosition == 'first'){
                       $("#prev-btn").addClass('disabled');
                       $("#btn-finish").addClass('disabled');
                   }else if(stepPosition == 'final'){
                       $("#next-btn").addClass('disabled');
                       $("#btn-finish").removeClass('disabled');
                   }else{
                       $("#prev-btn").removeClass('disabled');
                       $("#next-btn").removeClass('disabled');
                       $("#btn-finish").addClass('disabled');
                   }
                });                               
            
        });   
    </script>  
</div>
<!-- ./wrapper -->
</body>
</html>
