<?php $this->load->view('back/template/meta'); ?>

<?php $this->load->view('back/template/sidebar'); ?>

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
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-titles">Daftar Pengajuan Verifikasi</h4>
					</div>
					<div class="card-body">
						<?php
							$json_table = json_encode($data_for_table, true);
							$json_table1 = $json_table;
						?>
						<div id="datatableku" class='display table-bordered table-striped'></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('back/template/footer'); ?>


<link rel="stylesheet" href="<?php echo base_url('assets/plugins/nested-datatable') ?>/src/styles/style.css?v=cd7a2da0f2f66a8c86379cbde71985cbd9e0c742">
<script src="<?php echo base_url('assets/plugins/nested-datatable') ?>/dist/nested.tables.min.js"></script>
  <script>
 //var dataInJson = [{
 var dataInJson = [<?php echo $data_for_table ?>];
 var settings = {
  "iDisplayLength": 20,
  "bLengthChange": false,
  "bFilter": false,
  "bSort": false,
  "bInfo": false
};
	var table = new nestedTables.TableHierarchy("datatableku", dataInJson, settings);
	table.initializeTableHierarchy();
  </script>