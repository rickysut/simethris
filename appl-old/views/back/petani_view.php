<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-3 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			<div class="btn-group" role="group" aria-label="Petani">
				<button class="btn btn-light fuse-ripple-ready" onclick="add_person()"><i class="icon-account-plus"></i> Tambah Petani</button>
				<button class="btn btn-light fuse-ripple-ready" onclick="reload_table()"><i class="icon-refresh"></i> Reload</button>
			</div>

         </div>
		 <div class="page-content p-3">
					<div class="col-12">
                        <div class="card p-3">
						  <div class="table-responsive">
							<table id="table" class="table">
							  <thead>
								 <tr>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">No</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">NIK</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">ID Poktan</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama Petani</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Alamat</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Action</span>
										</div>
									</th>
								</tr>
							</thead>
                
							  <tbody>
							  </tbody>
							<tfoot>
								<tr>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">No</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">NIK</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">ID Poktan</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama Petani</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Alamat</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Action</span>
										</div>
									</th>
								</tr>
							</tfoot>
						</table>
						  </div>
						</div>
        <!-- /.box-body -->
					</div>
		</div>
	</div>
	  
      <!-- /.box -->
    </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
  </div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/DataTables-1.10.20/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('petani/ajax_list/').$user->id_poktan; ?>",
            "type": "POST",
			"data": {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
			"cache":false,
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable,
			"width": "8%"
        },
			{
				"targets": 1,
				"width": "15%"
			},
			{
				"targets": 2,
				"visible": false,
				"width": "20%"
			},
			{
				"targets": 3,
				"width": "20%"
			},
			{
				"targets": 4,
				"width": "40%"
			}
        ],

    });

    //datepicker
    //$('.datepicker').datepicker({
    //    autoclose: true,
    //    format: "yyyy-mm-dd",
    //    todayHighlight: true,
    //    orientation: "top auto",
    //    todayBtn: true,
    //    todayHighlight: true,  
    //});

    //set input/textarea/select event when change value, remove class error and remove text help block 
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

});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Petani'); // Set Title to Bootstrap modal title
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('petani/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="id_petani"]').val(data.id_petani);
            $('[name="id_poktan"]').val(data.id_poktan);
            $('[name="nik"]').val(data.nik);
            $('[name="nama_petani"]').val(data.nama_petani);
            $('[name="provinsi"]').val(data.provinsi);
            $('[name="kabupaten"]').val(data.kabupaten);
            $('[name="kecamatan"]').val(data.kecamatan);
            $('[name="desa"]').val(data.desa);
            $('[name="alamat"]').val(data.alamat);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
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
        url = "<?php echo site_url('petani/ajax_add')?>";
    } else {
        url = "<?php echo site_url('petani/ajax_update')?>";
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

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('petani/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

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
                var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>

<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

	<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Person Form</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_petani"/> 
					<input type="hidden" value="<?php echo $user->id_poktan; ?>" name="id_poktan"/> 
					<input type="hidden" value="<?php echo $user->nama_poktan; ?>" name="nama_poktan"/> 
                    <div class="form-body">
                        <div class="form-row">
                            <label class="control-label col-md-3">NIK</label>
                            <div class="col-md-9">
                                <input name="nik" placeholder="NIK" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Nama Petani</label>
                            <div class="col-md-9">
                                <input name="nama_petani" placeholder="Nama Petani" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Provinsi</label>
                            <div class="col-md-9">
                                <?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Kabupaten</label>
                            <div class="col-md-9">
                                <?php $query = $this->db->get_where('wilayah_kabupaten',array('id'=>$user->kabupaten));
									foreach ($query->result() as $value) {
											$datakab = $value->nama;
										}
									?>
									<select name="kabupaten" class="form-control" id="kabupaten" >
										<option value='<?php echo $user->kabupaten ?>'><?php echo $datakab ?></option>
									</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="control-label col-md-3">Kecamatan</label>
                            <div class="col-md-9">
                                <?php $query = $this->db->get_where('wilayah_kecamatan',array('id'=>$user->kecamatan));
									foreach ($query->result() as $value) {
											$datakec = $value->nama;
										}
									?>
									<select name="kecamatan" class="form-control" id="kecamatan">
										<option value='<?php echo $user->kecamatan ?>'><?php echo $datakec ?></option>
									</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-row">
                            <label class="control-label col-md-3">Desa</label>
                            <div class="col-md-9">
                                <?php $query = $this->db->get_where('wilayah_desa',array('id'=>$user->desa));
									foreach ($query->result() as $value) {
											$datadesa = $value->nama;
										}
									?>
									<select name="desa" class="form-control" id="desa">
										<option value='<?php echo $user->desa ?>'><?php echo $datadesa ?></option>
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
    </main>
</body>
</html>