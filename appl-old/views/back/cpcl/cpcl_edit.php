<?php $this->load->view('back/template/meta_new'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>

<style>
	
.td-table
{
word-wrap: break-word;
word-break: break-all;  
white-space: normal !important;
text-align: justify;
max-width: 20%;
}

.table thead th,
 .table tfoot th,
 .jsgrid .jsgrid-table thead th {
     border-top: 0;
     border-bottom-width: 1px;
     font-weight: 500;
     font-size: .8rem;
     text-transform: uppercase
 }

 .table td,
 .jsgrid .jsgrid-table td {
     font-size: 0.875rem;
     padding: .875rem 0.9375rem
 }
</style>

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
	<div class="container-fluid">
		<?php echo form_open_multipart($action) ?>
		<?php echo validation_errors() ?>
		<div class="row">
			<div class="col-12">
				<!-- Data PKS -->
				<div class="card">
					<div class="card-header">
						<div class="card-actions small">
							<a class="fa fa-info-circle"></a><i> information:</i>
						</div>
						<h4 class="card-titles">DATA PELAKSANAAN</h4>
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
								<label for="type_pelaksana" class="col-form-label">Pelaksana</label>
							</div>
							<div class="form-group col-md-6" id="poktan">
								<?php echo form_input($nama_pelaksana, $user->nama_pelaksana) ?>
								<label for="nama_pelaksana" class="col-form-label">Kelompok Tani</label>
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
				<!-- Data Domisili -->
				<div class="card">
					<div class="card-header">
						<div class="card-actions small">
							<a class="fa fa-info-circle"></a><i> information:</i>
						</div>
						<h4 class="card-titles">KEWILAYAHAN</h4>
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
				<!-- SARANA PRODUKSI -->
				<div class="card">
					<div class="card-header">
						<div class="card-actions small">
							<a class="btn btn-info btn-sm fuse-ripple-ready text-white" href="javascript:void(0)" id="tombolTambahSaprodi" title="Isi / Tambah Saprodi" onclick="add_saprodi()"><i class="fa fa-plus"></i> Tambah Saprodi</a>
						</div>
						<h4 class="card-titles">SARANA PRODUKSI</h4>
							<a class="fa fa-info-circle"></a><i> information:</i>
					</div>
					<div class="card-body">
						<div class="table table-hover table-responsive">
							<table id="tablesaprodi" class="table w-100">
							  <thead>
								<tr>
								  <th style="text-align: center">NO</th>
								  <th style="text-align: center">KOMPONEN</th>
								  <th style="text-align: center">BANYAK</th>
								  <th style="text-align: center">SATUAN</th>
								  <th style="text-align: center">HARGA</th>
								  <th style="text-align: center">JUMLAH</th>
								  <th style="text-align: center">ACTION</th>
								  <th style="text-align: center">ACTION</th>
								</tr>
							  </thead>
							  <tbody>
								
							  </tbody>
							  <tfoot>
									<tr>
										<th colspan="5" style="text-align:right">Total:</th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				
				<div class="card">
					<div class="card-header">
						<div class="card-actions small">
							<a class="btn btn-info fuse-ripple-ready btn-sm text-white" href="javascript:void(0)" id="tombolTambahpetani" title="Isi / Tambah" onclick="add_person()"><i class="icon-account-plus"></i> Pilih Pengelola/Petani</a>
						</div>
						<h4 class="card-titles">RENCANA PENGELOLA & LOKASI TANAM</h4>
							<a class="fa fa-info-circle"></a><i> information:</i>
					</div>
					<div class="card-body">
						<div class="table-responsive table-hover">
							<table id="table" class="table w-100">
								<thead>
									<tr>
										<th style="text-align: center">NO</th>
										<th style="text-align: center">ID LOKASI</th>
										<th style="text-align: center">ID PETANI</th>
										<th style="text-align: center">NIK</th>
										<th style="text-align: center">NAMA PETANI</th>
										<th style="text-align: center">LUAS</th>
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
				
				<div class="card" id="aju-verifikasi">
					<div class="card-header">
						<h4 class="card-titles">SELESAI - SIMPAN</h4>
							<a class="fa fa-info-circle"></a><i> information:</i>
					</div>
					<div class="card-body">
						<div class="btn-group" role="group" aria-label="Default button group">
							<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close() ?>
	</div>
</div>

<?php $this->load->view('back/template/footer'); ?>
<?php $this->load->view('back/template/endbody'); ?>
<?php $this->load->view('back/template/endscript'); ?>

<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/DataTables-1.10.20/js/dataTables.bootstrap.js"></script>
<script src="https://maps.google.com/maps/api/js?v=3.40&libraries=places,drawing&key=AIzaSyCmByxQYKyC_hhkkoSFCiWM_0TwQjGckLs"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/geoxml') ?>/polys/geoxml3.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/geoxml') ?>/ProjectedOverlay.js"></script>

<script type="text/javascript">
var save_method; //for save method string
var table;
var tablesaprodi;
var idcpcl;

$(document).ready(function(){
	var idcpcl = <?php echo $user->id_cpcl; ?>;	
	$("#provinsi2").change(function (){
		var myuri = $(this).val().split('|');
		var iduri = myuri[0];
        var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+iduri;
        $('#kabupaten2').load(url);
            return false;
    })
			
	$("#kabupaten2").change(function (){
		var myuri = $(this).val().split('|');
		var iduri = myuri[0];
        var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+iduri;
        $('#kecamatan2').load(url);
        return false;
    })
			
	$("#kecamatan2").change(function (){
        var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
        $('#desa2').load(url);
        return false;
    })
	
	$("#petani").change(function (){
		var kodepetani = $(this).val();
        $.ajax({
        url : "<?php echo site_url('cpcl/ajax_edit_petani/')?>/"+kodepetani,
        type: "GET",
        dataType: "JSON",
        success: function(data)
			{
				var mykodeprov = data.provinsi;
				var mykodekab = data.kabupaten;
				var mykodekec = data.kecamatan;
				var mykodedes = data.desa;
				
				//var url1 = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+mykodeprov;
				//$("#kabupaten3").load(url1);
				
				//var url2 = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+mykodekab;
				//$("#kecamatan3").load(url2);
								
				//var url3 = "<?php echo site_url('wilayah/add_ajax_des');?>/"+mykodekec;
				//$("#desa3").load(url3);
				
				var setprov = "<?php echo site_url('wilayah/set_ajax_prov');?>/"+mykodeprov;
				$("#provinsi3").load(setprov);
				
				var setkab = "<?php echo site_url('wilayah/set_ajax_kab');?>/"+mykodekab;
				$("#kabupaten3").load(setkab);
				
				var setkec = "<?php echo site_url('wilayah/set_ajax_kec');?>/"+mykodekec;
				$("#kecamatan3").load(setkec);
				
				var setdes = "<?php echo site_url('wilayah/set_ajax_des');?>/"+mykodedes;
				$("#desa3").load(setdes);
				
				$('[name="id_petani"]').val(data.id_petani);
				$('[name="id_poktan"]').val(data.id_poktan);
				$('[name="nik"]').val(data.nik);
				$('[name="nama_petani"]').val(data.nama_petani);
				$('[name="alamat"]').val(data.alamat);
				$('[name="data-petani"]').show();
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		})
    })
	
	$("#harga").keyup(function (){
		var hargaSatuan = $('#harga').val();
		var qty = $('#qty').val();
		var Total = hargaSatuan * qty;
		$('#total_harga').val(Total);
	})

	tablesaprodi = $('#tablesaprodi').DataTable({ 
		"Retrieve": true,
		"destroy": true,
		"searching": false,
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"info": false,

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
				"visible": false,
				"width": "20%"
			},
			{
				"targets": 7,
				"className": "text-center",
				"width": "10%"
			}
		],
		"footerCallback": function ( row, data, start, end, display ) {
			var api = this.api(), data;
	 
				// Remove the formatting to get integer data for summation
			var intVal = function ( i ) {
				return typeof i === 'string' ?
					i.replace(/[\$,]/g, '')*1 :
					typeof i === 'number' ?
						i : 0;
			};
	 
			// Total over all pages
			total = api
				.column(6)
				.data()
				.reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );
	 
			// Total over this page
			pageTotal = api
				.column(6, { page: 'current'} )
				.data()
				.reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );
	 
			// Update footer
			$( api.column(1).footer() ).html(
				'Total halaman ini : Rp. '+pageTotal +' ( Total Semua : Rp. '+ total +')'
			);
		},
	});
		
	$('#table').DataTable({ 
		"Retrieve": true,
		"destroy": true,
		"searching": true,
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"info": true,

		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": "<?php echo site_url('cpcl/ajax_list_peta/'); ?>"+<?php echo $user->id_cpcl; ?>,
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
				"targets": 1,
				"visible": false,
				"width": "20%"
			},
			{
				"targets": 2,
				"visible": false,
				"width": "20%"
			},
			{
				"targets": 3,
				"visible": false,
				"width": "20%"
			},
			{
				"targets": 5, // your case first column
				"className": "text-right",
				"width": "10%"
			},
		],
	});
	
    if($("#type_pelaksana").val()!='1'){
			var idpoktan = <?php echo $user->id_poktan; ?>;
			var idcpcl = <?php echo $user->id_cpcl; ?>;
			
			$("#for_id_poktan").val(idpoktan);
			$('[name="id_poktan"]').val(idpoktan);
			$('[name="id_cpcl"]').val(idcpcl);
			$('#poktan').hide();
		}
		else
		{
			var idcpcl = <?php echo $user->id_cpcl; ?>;
			var idpoktan = <?php echo $user->id_poktan; ?>;
			var Myurl = "<?php echo site_url('cpcl/add_ajax_petani');?>/"+idpoktan;
			$('[name="petani"]').load(Myurl);
			$('[name="id_cpcl"]').val(idcpcl);
			$('#poktan').show();		
		}
	
	$('#tgl_awal_perjanjian').prop( 'disabled', 'disabled' ).prop( 'readonly', 'readonly' );
	
	$('#tgl_akhir_perjanjian').prop( 'disabled', 'disabled' ).prop( 'readonly', 'readonly' );
	
	$('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "buttom auto",
        todayBtn: true,
        todayHighlight: true,
	  readonly:true,
        zIndexOffset: 9999
    });
	
	$("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
})

function add_person()
	{
		var Pilihanku = document.getElementById("type_pelaksana").value;
		if(Pilihanku == '2'){
			var prov = document.getElementById("provinsi").value;
			var kab = document.getElementById("kabupaten").value;
			var kec = document.getElementById("kecamatan").value;
			var des = document.getElementById("desa").value;
			save_method = 'add';
			$('#form2')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			var setprov = "<?php echo site_url('wilayah/set_ajax_prov');?>/"+prov.substr(0,2);
				$("#provinsi2").load(setprov);
				
				var setkab = "<?php echo site_url('wilayah/set_ajax_kab');?>/"+kab.substr(0,4);
				$("#kabupaten2").load(setkab);
				
				var setkec = "<?php echo site_url('wilayah/set_ajax_kec');?>/"+kec;
				$("#kecamatan2").load(setkec);
				
				var setdes = "<?php echo site_url('wilayah/set_ajax_des');?>/"+des;
				$("#desa2").load(setdes);
			$('[name="id_poktan"]').val(<?php echo $user->id_poktan; ?>);
			$('[name="id_cpcl"]').val(<?php echo $user->id_cpcl; ?>);
			$('#modal_form_petani').modal('show'); // show bootstrap modal
			$('.modal-title').text('Tambah Rencana Tanam'); // Set Title to Bootstrap modal title
		}
		else
		{
			save_method = 'add';
			$('#form3')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			$('[name="id_poktan"]').val($("#nama_pelaksana").val());
			$('[name="id_cpcl"]').val(<?php echo $user->id_cpcl; ?>);
			$('[name="data-petani"]').hide();
			$('#modal_form_petani2').modal('show'); // show bootstrap modal
			$('.modal-title').text('Tambah Rencana Tanam'); // Set Title to Bootstrap modal title
		}
	}
	
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
            $('[name="nik"]').val(data.nik);
            $('[name="nama_petani"]').val(data.nama_petani);
            $('[name="alamat"]').val(data.alamat);
            $('[name="nama_lokasi"]').val(data.nama_lokasi);
            $('[name="tgl_rencana_tanam"]').val(data.tgl_rencana_tanam);
            $('[name="rencana_luas_tanam"]').val(data.rencana_luas_tanam);
            $('[name="id_lokasi"]').val(data.id_lokasi);
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
    });
}

function save2()
{
    $('#btnSave2').text('saving...'); //change button text
    $('#btnSave2').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('cpcl/ajax_add2')?>";
    } else {
        url = "<?php echo site_url('cpcl/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form3').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_petani2').modal('hide');
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
            $('#btnSave2').text('save'); //change button text
            $('#btnSave2').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave2').text('save'); //change button text
            $('#btnSave2').attr('disabled',false); //set button enable 

        }
    });
}

function add_saprodi()
{
    save_method = 'add';
    $('#form-saprodi')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string 
	if(("#type_pelaksana").value != "2"){
		$('[name="id_poktan"]').val($("#nama_pelaksana").val());
	}
	else
	{
		$('[name="id_poktan"]').val(<?php echo $user->id_poktan; ?>);
	}
    $('[name="id_cpcl"]').val(<?php echo $user->id_cpcl; ?>);
	$('[name="btnSaveProdi"]').attr('onclick','save_saprodi()');
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

function save_saprodi()
{
    $('#btnSaveProdi').text('saving...'); //change button text
    $('#btnSaveProdi').attr('disabled',true); //set button disable 
    if(save_method == 'add') {
        url = "<?php echo site_url('cpcl/ajax_add_saprodi')?>";
    } else {
        url = "<?php echo site_url('cpcl/ajax_update_saprodi')?>";
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

function delete_saprodi(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('cpcl/ajax_delete_saprodi')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                //$('#modal_form').modal('hide');
                reload_table_saprodi();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}
	
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
		initializeGMap(Mylat, Mylng);
		$('#location-map').css('width', '100%');
		$('#map_canvas').css('width', '100%');
	});
	$('#modal_form_peta').on('shown.bs.modal', function() {
		google.maps.event.trigger(map, 'resize');
		map.setCenter(myLatlng);
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
			$('[name="id_lokasi"]').val(data.id_lokasi);
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
                    <input type="hidden" name="id_petani" id="id_petani"/> 
					<input type="hidden" name="id_lokasi" id="id_lokasi"/> 
					<input type="hidden" name="id_poktan" id="id_poktan"/> 
						<input type="hidden" name="id_cpcl" id="id_cpcl"/> 
					<input type="hidden" name="nama_poktan"/> 
                    <div class="form-body">
						<div class="form-row">
								<label class="control-label col-md-3">ID</label>
								<div class="col-md-9">
									<input type="" name="id_petani" id="id_petani" class="form-control" readonly />
									<span class="help-block"></span>
								</div>
							</div>
                        <div class="form-row">
                            <label class="control-label col-md-4">Nomor / NIK</label>
                            <div class="col-md-8">
                                <input name="nik" placeholder="NIK" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
						</div>
						<div class="form-row">
							<label class="control-label col-md-4">Nama Petugas / Petani</label>
                            <div class="col-md-8">
                                <input name="nama_petani" placeholder="Nama Petani" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
							<label class="control-label col-md-4">Nama Lokasi</label>
                            <div class="col-md-8">
                                <input name="nama_lokasi" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
                            <label class="control-label col-md-4">Tgl Rencana Tanam</label>
                            <div class="col-md-8">
								<input name="tgl_rencana_tanam" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
						</div>
						<div class="form-row">
							<label class="control-label col-md-4">Luas Rencana Tanam (Ha)</label>
                            <div class="col-md-8">
								
                                <input name="rencana_luas_tanam" class="form-control" type="number" required>
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
                    <input type="hidden" name="id_petani"/> 
					 <input type="hidden" name="id_lokasi"/> 
					<input type="hidden" name="id_poktan"/> 
					<input type="hidden" name="nama_poktan"/> 
                    <div class="form-body">
						<div class="form-row">
                            <label class="control-label col-md-3">ID Lokasi</label>
                            <div class="col-md-3">
                                <input name="id_lokasi" id="id_lokasi" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
							<label class="control-label col-md-3">Nama Petugas / Petani</label>
                            <div class="col-md-3">
                                <input name="nama_petani" placeholder="" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Latitude</label>
                            <div class="col-md-3">
                                <input name="atitude" placeholder="" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
							<label class="control-label col-md-3">Longitude</label>
                            <div class="col-md-3">
                                <input name="latitude" placeholder="" class="form-control" type="text" required>
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

<div class="modal fade" id="modal_form_petani" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Rencana Tanam</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form2" class="form-horizontal">
                    <input type="text" name="id_petani" id="id_petani"/>
					<input type="hidden" name="id_poktan" id="id_poktan"/> 
					<input type="hidden" name="nama_poktan" id="nama_poktan"/> 
					<input type="hidden" name="id_cpcl" id="id_cpcl"/> 
					
                    <div class="form-body">
						<div class="form-row">
							<label class="control-label col-md-3">ID</label>
							<div class="col-md-9">
								<input type="text" name="id_petani" id="id_petani" class="form-control" readonly />
								<span class="help-block"></span>
							</div>
						</div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Nomor / NIK</label>
                            <div class="col-md-9">
                                <input name="nik" id="nik" placeholder="NIK" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Nama Petugas / Petani</label>
                            <div class="col-md-9">
                                <input name="nama_petani" id="nama_petani" placeholder="Nama Petani" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Provinsi</label>
                            <div class="col-md-9">
								<select name="provinsi2" class="form-control" id="provinsi2" >
										<option value=''>Pilih Provinsi</option>
									</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Kabupaten</label>
                            <div class="col-md-9">
									<select name="kabupaten2" class="form-control" id="kabupaten2" >
										<option value=''>Pilih Kabupaten</option>
									</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Kecamatan</label>
                            <div class="col-md-9">
									<select name="kecamatan2" class="form-control" id="kecamatan2">
										<option value=''>Pilih Kecamatan</option>
									</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
                            <label class="control-label col-md-3">Desa</label>
                            <div class="col-md-9">
									<select name="desa2" class="form-control" id="desa2">
										<option value=''>Pilih Desa</option>
									</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input name="alamat" placeholder="Alamat Petani" class="form-control" type="text">
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

<div class="modal fade" id="modal_form_petani2" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Rencana Tanam</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
				<?php $dataprov='';$datakab='';$datakec='';$datadesa=''; ?>
                <form action="" id="form3" method="post" class="form-horizontal">
					<input type="hidden" name="id_poktan" id="id_poktan"/> 
					<input type="hidden" name="id_cpcl" id="id_cpcl"/> 
					<input type="hidden" name="nama_poktan" id="nama_poktan"/>
                    <div class="form-body">
                        <div class="form-row">
                            <label class="control-label col-md-3">Nama Petugas / Petani</label>
                            <div class="col-md-9">
                                <select name="petani" class="form-control" id="petani">
									<option value=''>Pilih Petani</option>
								</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div id="data-petani" name="data-petani">
							<div class="form-row">
								<label class="control-label col-md-3">ID</label>
								<div class="col-md-9">
									<input type="" name="id_petani" id="id_petani" class="form-control" readonly />
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-row">
								<label class="control-label col-md-3">Nomor / NIK</label>
								<div class="col-md-9">
									<input name="nik" id="nik" placeholder="NIK" class="form-control" type="text">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-row">
								<label class="control-label col-md-3">Provinsi</label>
								<div class="col-md-9">
									<select name="provinsi3" class="form-control" id="provinsi3" >
											<option value=''>Pilih Provinsi</option>
										</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-row">
								<label class="control-label col-md-3">Kabupaten</label>
								<div class="col-md-9">
										<select name="kabupaten3" class="form-control" id="kabupaten3" >
											<option value=''>Pilih Kabupaten</option>
										</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-row">
								<label class="control-label col-md-3">Kecamatan</label>
								<div class="col-md-9">
										<select name="kecamatan3" class="form-control" id="kecamatan3">
											<option value=''>Pilih Kecamatan</option>
										</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-row">
								<label class="control-label col-md-3">Desa</label>
								<div class="col-md-9">
										<select name="desa3" class="form-control" id="desa3">
											<option value=''>Pilih Desa</option>
										</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-row">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-9">
									<input name="alamat" placeholder="Alamat Petani" class="form-control" type="text">
									<span class="help-block"></span>
								</div>
							</div>
					    </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave2" onclick="save2()" class="btn btn-primary">Save</button>
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
						<input type="hidden" name="id_poktan" id="id_poktan"/> 
						<input type="hidden" name="id_cpcl" id="id_cpcl"/> 
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
                                <input name="qty" id="qty" placeholder="Jumlah" class="form-control" type="number" required>
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
								<input name="harga" id="harga" placeholder="" class="form-control" type="number" required>
                                <span class="help-block"></span>
                            </div>
						</div>
						<div class="form-row">
							<label class="control-label col-md-3">Total Harga</label>
                            <div class="col-md-6">
								
                                <input name="total_harga" id="total_harga" placeholder="" class="form-control" type="number" required>
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