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
            <h1 class="doc-title h4" id="content">DATA RENCANA TANAM</h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			
         </div>
    <!-- / HEADER -->

    <!-- Main content -->
	<div class="page-content p-3">
		<?php echo form_open_multipart($action) ?>
		<?php echo validation_errors() ?>
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
										<?php echo form_input($id_cpcl, $user->id_cpcl) ?>
										<?php echo form_input($id_poktan, $user->id_poktan) ?>
											<div class="form-group col-md-12">
												<?php echo form_input($no_pks,$user->no_pks) ?>
												<label for="no_pks" class="col-form-label">Nomor PKS</label>
											</div>
									</div>
									<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_dropdown('', $type_pelaksana_value, $user->type_pelaksana, $type_pelaksana) ?>
												<label for="type_pelaksana" id="type_pelaksana" class="col-form-label">Pelaksana</label>
											</div>
											<div class="form-group col-md-6" id="poktan">
												<?php echo form_input($nama_pelaksana,$user->nama_pelaksana) ?>
												<label for="nama_pelaksana" id="nama_pelaksana" class="col-form-label">Kelompok Tani</label>
											</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<?php echo form_input($tgl_awal_perjanjian, $user->tgl_awal_perjanjian) ?>
											<label for="tgl_awal_perjanjian" class="col-form-label">Tgl Perjanjian</label>
										</div>
										<div class="form-group col">
											<?php echo form_input($tgl_akhir_perjanjian, $user->tgl_akhir_perjanjian) ?>
											<label for="tgl_akhir_perjanjian" class="col-form-label">Tgl Akhir</label>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<?php echo form_input($luas_rencana_tanam, $user->luas_rencana_tanam) ?>
											<label for="luas_rencana_tanam" class="col-form-label">Rencana Luas Tanam (Ha)</label>
										</div>
										<div class="form-group col">
											<?php echo form_input($rencana_produksi, $user->rencana_produksi) ?>
											<label for="rencana_produksi" class="col-form-label">Rencana Produksi (Ton)</label>
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
				
				<div class="col-12" id="daftar-saprodi">
                    <div class="card">
						<div class="card-header">
							<div class="row no-gutters align-items-center justify-content-between">
								<div class="description">
									<div class="description-text">
										<h5>SARANA PRODUKSI</h5>
									</div>
								</div>
								<!-- Tambah Saprodi -->
								<!-- <div class="btn-group" role="group" aria-label="saprodi">
									<a class="btn btn-primary fuse-ripple-ready" href="javascript:void(0)" title="Isi / Tambah Saprodi" onclick="add_saprodi(document.getElementById('nama_pelaksana').value)"><i class="icon-account-plus"></i> Tambah Saprodi</a>
								</div> -->
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="tablesaprodi" class="table table-bordered table-striped">
								  <thead>
									<tr>
									  <th style="text-align: center">NO</th>
									  <th style="text-align: center">KOMPONEN</th>
									  <th style="text-align: center">BANYAK</th>
									  <th style="text-align: center">SATUAN</th>
									  <th style="text-align: center">HARGA</th>
									  <th style="text-align: center">JUMLAH</th>
									  <th style="text-align: center">ACTION</th>
									</tr>
								  </thead>
								  <tbody>
									
								  </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-12" id="daftar-petani">
                    <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>DAFTAR RENCANA TANAM</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="table" class="table table-striped dt-responsive display nowrap" style="width:100%">
								  <thead>
									<tr>
									  <th style="text-align: center">NO</th>
									  <th style="text-align: center">ID POKTAN</th>
									  <th style="text-align: center">ID PETANI</th>
									  <th style="text-align: center">NIK</th>
									  <th style="text-align: center">NAMA PETANI</th>
									  <th style="text-align: center">LATITUDE</th>
									  <th style="text-align: center">LONGITUDE</th>
									  <th style="text-align: center">File KML</th>
									  <th style="text-align: center">ACTION</th>
									</tr>
								  </thead>
								  <tbody>
									
								  </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-12">
                    <div class="card">
					<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>UNGGAH DATA DUKUNG</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<div class="custom-file">
												<input type="file" class="form-control" name="lampiran" id="lampiran">
												<small id="PhotoHelpBlock" class="form-text text-muted">Ukuran file tidak boleh lebih dari 2MB</small>
									</div>
								</div>
								<div class="form-group col-md-6">
									<div class="custom-file">
												<input type="file" class="form-control" name="lampiran2" id="lampiran2">
												<small id="PhotoHelpBlock" class="form-text text-muted">Ukuran file tidak boleh lebih dari 2MB</small>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
									<div class="btn-group" role="group" aria-label="Default button group">
										<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> Ajukan </button>
									</div>
						</div>

							</div>
						</div>
					</div>
				</div>
		<?php echo form_close() ?>
	</div>
	</div>
  <!-- /.content-wrapper -->
</div>
<?php $this->load->view('back/template/footer'); ?>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!--
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/DataTables-1.10.20/js/dataTables.bootstrap.js"></script>
  <script google map </script>-->
 <script type="text/javascript" src="<?php echo base_url('assets/plugins/geoxml') ?>/polys/geoxml3.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/plugins/geoxml') ?>/ProjectedOverlay.js"></script>

<script type="text/javascript">
var save_method; //for save method string
var table;
var tablesaprodi;
var idpoktan = <?php echo $user->id_cpcl ?>;
$(document).ready(function(){
	var idpoktan2 = document.getElementById("id_poktan").value;
			table = $('#table').DataTable({ 
				"Retrieve": true,
				"destroy": true,
				"searching": false,
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				"order": [], //Initial no order.
                "scrollX": true,
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('cpcl/ajax_list_peta/'); ?>"+<?php echo $user->id_cpcl; ?>,
					"type": "POST",
					"cache":false,
				},

                "columns": [
                    { data: 'no' },
                    { data: 'id_poktan', visible: false },
                    { data: 'id_petani', visible: false },
                    { data: 'nik', visible: false },
                    { className: 'dt-left', data: 'nama_petani' },
                    { className: 'dt-right', data: 'atitude' },
                    { className: 'dt-right', data: 'latitude' },
                    { data: 'file_kml' },
                    { className: 'dt-center', data: 'action', 'orderable': false },
                ]
				
			});
			tablesaprodi = $('#tablesaprodi').DataTable({ 
				"Retrieve": true,
				"destroy": true,
				"searching": false,
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('cpcl/ajax_list_saprodi/'); ?>"+<?php echo $user->id_cpcl; ?>,
				"type": "POST",
				"cache":false,
			},

			//Set column definition initialisation properties.
			"columnDefs": [
			{ 
				"targets": [ -1 ], //last column
				"orderable": false, //set not orderable
			},
			{
				"targets": 0, // your case first column
				"className": "text-center",
				"width": "4%"
			},
			{
				"targets": 1, // your case first column
				"className": "text-left",
				"width": "35%"
			},
			{
				"targets": 2, // your case first column
				"className": "text-right",
				"width": "10%"
			},
			{
				"targets": 3, // your case first column
				"className": "text-center",
				"width": "6%"
			},
			{
				"targets": 4, // your case first column
				"className": "text-right",
				"width": "15%"
			},
			{
				"targets": 5,
				"className": "text-right",
				"width": "20%"
			},
			{
				"targets": 6,
				"className": "text-center",
				"width": "10%"
			}
			],

			});
	$("#type_pelaksana").change (function (){
		if(this.value == "2")
		{
			$('#poktan').hide();
			$('#daftar-petani').hide();
			$('#daftar-saprodi').hide();
		}
		else
		{
			$('#poktan').show();
			$('#daftar-petani').show();
			$('#daftar-saprodi').show();
			
		}
    })
    
	$('#tgl_awal_perjanjian').datepicker({
      autoclose: true,
	  format: "yyyy-mm-dd",
	  todayHighlight: true,
      orientation: "top auto",
      todayBtn: true,
      todayHighlight: true,  
      zIndexOffset: 9999
    })
	$('#tgl_akhir_perjanjian').datepicker({
      autoclose: true,
	  format: "yyyy-mm-dd",
	  todayHighlight: true,
      orientation: "top auto",
      todayBtn: true,
      todayHighlight: true,  
      zIndexOffset: 9999
    })
	$('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "buttom auto",
        todayBtn: true,
        todayHighlight: true,
        zIndexOffset: 9999
    })
});
</script>
<script>
function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
	
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('cpcl/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="id_petani"]').val(data.id_petani);
            $('[name="id_poktan"]').val(data.id_poktan);
            $('[name="nik"]').val(data.nik);
            $('[name="nama_lokasi"]').val(data.nama_lokasi);
            $('[name="nama_petani"]').val(data.nama_petani);
            $('[name="tgl_rencana_tanam"]').datepicker('update',data.tgl_rencana_tanam);
            $('[name="rencana_luas_tanam"]').val(data.rencana_luas_tanam);
            $('[name="alamat"]').val(data.alamat);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Petani'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    })
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('cpcl/ajax_add')?>";
    } else {
        url = "<?php echo site_url('cpcl/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    })
}
</script>
<script>
function add_saprodi(id)
{
    save_method = 'add';
    $('#form-saprodi')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('[name="id_poktan"]').val(id);
	$('[name="btnSaveProdi"]').attr('onclick','save_saprodi('+id+')');
    $('#modal_form_saprodi').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Saprodi'); // Set Title to Bootstrap modal title
}

function edit_saprodi(id)
{
    save_method = 'update';
    $('#form-saprodi')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('cpcl/ajax_edit_saprodi')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="id_saprodi"]').val(data.id_saprodi);
            $('[name="id_poktan"]').val(data.id_poktan);
            $('[name="komponen"]').val(data.komponen);
            $('[name="qty"]').val(data.qty);
            $('[name="satuan"]').val(data.satuan);
            $('[name="harga"]').val(data.harga);
			TotalHarga = data.qty * data.harga;
            $('[name="total_harga"]').val(TotalHarga);
            $('#modal_form_saprodi').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Petani'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    })
}

function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		upiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function reload_table_saprodi()
{
    tablesaprodi.ajax.reload(null,false); //reload datatable ajax 
}

function save_saprodi(id)
{
    $('#btnSaveProdi').text('saving...'); //change button text
    $('#btnSaveProdi').attr('disabled',true); //set button disable 
    if(save_method == 'add') {
        url = "<?php echo site_url('cpcl/ajax_add_saprodi')?>/" + id;
    } else {
        url = "<?php echo site_url('cpcl/ajax_update_saprodi')?>/" + id;
    }
	// alert(url);
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form-saprodi').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_saprodi').modal('hide');
                reload_table_saprodi();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSaveProdi').text('save'); //change button text
            $('#btnSaveProdi').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSaveProdi').text('save'); //change button text
            $('#btnSaveProdi').attr('disabled',false); //set button enable 

        }
    })
}
</script>
  <script type="text/javascript">
	
    function photoPreview(lampiran,idpreview)
    {
      var gb = lampiran.files;
	  if(gb[0].size > 2*1024*1024) {
        alert('Error : Ukuran File Lebih Dari 2MB');
        return;
    }
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
	function edit_personPeta(id,Mylat,Mylng)
{
	save_method = 'update';
    $('#form_peta')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
	
    var map = null;
	var myMarker;
	var myLatlng;
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
		$('[name="atitude"]').val(posisiTitik.lat());
		$('[name="latitude"]').val(posisiTitik.lng());
    }

	function initializeGMap(lat, lng) {
		myLatlng = new google.maps.LatLng(lat, lng);
		var myOptions = {
			zoom: 10,
			zoomControl: true,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
		};

		map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
	}
	$('#modal_form_peta').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget);
        if (document.getElementById('atitude').value == '') {
			$('[name="atitude"]').val(-0.789275);
			
		};
		if (document.getElementById('latitude').value == '') {
			$('[name="latitude"]').val(113.92132700000002);
		}
        var lat = parseFloat(document.getElementById('atitude').value);
    	var lng = parseFloat(document.getElementById('latitude').value);
		initializeGMap(lat, lng);
		$('#location-map').css('width', '100%');
		$('#map_canvas').css('width', '100%');
	});
	$('#modal_form_peta').on('shown.bs.modal', function() {
		google.maps.event.trigger(map, 'resize');
		map.setCenter(myLatlng);
        if (myLatlng.lat() != -0.789275 ){
			taruhMarker(map, myLatlng);
		}  else {
			map.setZoom(5);
		}
        
		google.maps.event.addListener(map, 'click', function(event) {
		taruhMarker(this, event.latLng);
	  });
	});   
	$.ajax({
        url : "<?php echo site_url('cpcl/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="id_petani"]').val(data.id_petani);
            $('[name="id_poktan"]').val(data.id_poktan);
            $('[name="nama_petani"]').val(data.nama_petani);
            $('[name="atitude"]').val(data.atitude);
            $('[name="latitude"]').val(data.latitude);
            $('[name="file_kml"]').val(data.file_kml);
            $('#modal_form_peta').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Peta Lokasi'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    })
}
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function savePeta()
{
    $('#btnSavep').text('saving...'); //change button text
    $('#btnSavep').attr('disabled',true); //set button disable 
    var url;
	url = "<?php echo site_url('cpcl/ajax_update_peta')?>";
	Myform = $('#form_peta').serialize();
    // ajax adding data to database
	event.preventDefault();
    $.ajax({
        url : url,
        type: "POST",
		fileElementId :"file_kml",
        data: Myform,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_peta').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSavep').text('save'); //change button text
            $('#btnSavep').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSavep').text('save'); //change button text
            $('#btnSavep').attr('disabled',false); //set button enable 

        }
    })
}
</script>
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
				var myuri = $(this).val().split('|');
				var iduri = myuri[0];
                var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+iduri;
				//var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"<?php echo $user->kecamatan ?>;
                $('#desa').load(url);
                return false;
            })
        });
    </script>
<!--script google map </script>
 <script type="text/javascript" src="<?php echo base_url('assets/plugins/geoxml') ?>/polys/geoxml3.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/plugins/geoxml') ?>/ProjectedOverlay.js"></script> -->

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
	//var total_file=document.getElementById("upload_file").files.length;
	var filekml=$('#file_kml')[0].files[0];
	//for(var i=0;i<total_file;i++)
	//{
	var myfilekml = URL.createObjectURL(filekml);
	//}
    //alert(myfilekml);
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
	geoXml.parse(myfilekml);
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
			$('[name="atitude"]').val(mLat);
			$('[name="latitude"]').val(mLng);
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
		
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Petani</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_petani"/> 
					<input type="hidden" value="" name="id_poktan"/> 
					<input type="hidden" value="" name="nama_poktan"/> 
                    <div class="form-body">
                        <div class="form-row">
                            <label class="control-label col-md-4">NIK</label>
                            <div class="col-md-8">
                                <input name="nik" placeholder="NIK" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
						</div>
						<div class="form-row">
							<label class="control-label col-md-4">Nama Petani</label>
                            <div class="col-md-8">
                                <input name="nama_petani" placeholder="Nama Petani" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
							<label class="control-label col-md-4">Nama Lokasi</label>
                            <div class="col-md-8">
                                <input name="nama_lokasi" placeholder="" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
                            <label class="control-label col-md-4">Tgl Rencana Tanam</label>
                            <div class="col-md-8">
								<input name="tgl_rencana_tanam" placeholder="dd-mm-yyyy" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
						</div>
						<div class="form-row">
							<label class="control-label col-md-4">Luas Rencana Tanam (Ha)</label>
                            <div class="col-md-8">
								
                                <input name="rencana_luas_tanam" placeholder="" class="form-control" type="number" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
							<label class="control-label col-md-4">Alamat</label>
                            <div class="col-md-8">
								
                                <input name="alamat" placeholder="" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_form_peta" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Peta Lokasi</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_peta" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id_petani"/> 
					<input type="hidden" value="" name="id_poktan"/> 
					<input type="hidden" value="" name="nama_poktan"/> 
                    <div class="form-body">
						<div class="form-row">
                            <label class="control-label col-md-3">ID Petani</label>
                            <div class="col-md-3">
                                <input name="id_petani" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
							<label class="control-label col-md-3">Nama Petani</label>
                            <div class="col-md-3">
                                <input name="nama_petani" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Latitude</label>
                            <div class="col-md-3">
                                <input name="atitude" id="atitude" placeholder="" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
							<label class="control-label col-md-3">Longitude</label>
                            <div class="col-md-3">
                                <input name="latitude" id="latitude" placeholder="" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="col-12">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link btn active" id="manual-tab" data-toggle="tab" href="#manual" role="tab" aria-controls="manual" aria-expanded="true">PETA MANUAL</a>
										</li>
										<li class="nav-item">
											<a class="nav-link btn" id="filekml-tab" data-toggle="tab" href="#filekml" role="tab" aria-controls="filekml">FILE KML</a>
										</li>
								</ul>
								<div class="tab-content" id="myTabContent">

										<div role="tabpanel" class="tab-pane fade show active" id="manual" aria-labelledby="manual-tab">
											<div class="modal_body_map">
											  <div class="location-map" id="location-map">
												<div style="width: 100%; height: 300px;" id="map_canvas"></div>
											  </div>
											</div>
										</div>

										<div class="tab-pane fade" id="filekml" role="tabpanel" aria-labelledby="filekml-tab">
											<div class="form-row">
												<div class="card col-md-8">
													<div id="petaku" style="width:100%;height:300px;"></div>
												</div>
												<div class="card col-md-4 p-3">
													<div class="form-group">
														<input type="file" class="form-control" id="file_kml" name="file_kml" onchange="peta_awal()"/>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" name="btnSavep" onclick="savePeta()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_form_saprodi" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Saprodi</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form-saprodi" class="form-horizontal">
                    <div class="form-body">
						<div class="form-row">
                            <label class="control-label col-md-3">ID Poktan</label>
                            <div class="col-md-9">
                                <input id="id_poktan" name="id_poktan" placeholder="ID Poktan" class="form-control" type="text"> 
                                <span class="help-block"></span>
                            </div>
						</div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Komponen</label>
                            <div class="col-md-9">
                                <input name="komponen" placeholder="Komponen" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
						</div>
						<div class="form-row">
							<label class="control-label col-md-3">Jumlah</label>
                            <div class="col-md-3">
                                <input name="qty" placeholder="Jumlah" class="form-control" type="number" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
							<label class="control-label col-md-3">Satuan</label>
                            <div class="col-md-3">
                                <input name="satuan" placeholder="" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-6">
								<input name="harga" placeholder="" class="form-control" type="number" required>
                                <span class="help-block"></span>
                            </div>
						</div>
						<div class="form-row">
							<label class="control-label col-md-3">Total Harga</label>
                            <div class="col-md-6">
								
                                <input name="total_harga" placeholder="" class="form-control" type="number" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" name="btnSaveProdi" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    </main>
</body>
</html>
