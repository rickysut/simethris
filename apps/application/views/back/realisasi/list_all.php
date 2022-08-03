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
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> List Realisasi</a></li>
        <li><?php echo $module ?></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

      <div class="box box-primary">
        <div class="box-header"></div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Tgl Tanam</th>
                  <th style="text-align: center">Perusahaan</th>
				  <th style="text-align: center">Pengelolaan</th>
				  <th style="text-align: center">Petani</th>
                  <th style="text-align: center">Provinsi</th>
                  <th style="text-align: center">Kabupaten</th>
                  <th style="text-align: center">Kecamatan</th>
				  <th style="text-align: center">Desa</th>
				  <th style="text-align: center">Jumlah</th>
                  <th style="text-align: center">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($get_all_realisasi as $user){
                  // status active
                   // action
				  if($user->is_active == '1'){$is_active = '<a href="" data-toggle="tooltip" title="Aktif"  class="btn btn-xs btn-success"><span class="badge">A</span></a>';}
                  else{$is_active = '<a href="" data-toggle="tooltip" title="Tidak Aktif" class="btn btn-xs btn-danger"><span class="badge">N</span></a>';}
				
                ?>
                  <tr>
                    <td style="text-align: center"><?php echo $no++ ?></td>
                    <td style="text-align: left"><?php echo $user->tgl_realisasi_tanam ?></td>
					<td style="text-align: left"><?php echo $user->nama_perusahaan ?></td>
                    <td style="text-align: left"><?php echo $user->namapengelola ?></td>
					<td style="text-align: left"><?php echo $user->nama_pelaksana ?></td>
                    <td style="text-align: left"><?php echo $user->nama_prov ?></td>
                    <td style="text-align: left"><?php echo $user->nama_kab ?></td>
                    <td style="text-align: left"><?php echo $user->nama_kec ?></td>
                    <td style="text-align: left"><?php echo $user->nama_des ?></td>
					<td style="text-align: right"><?php echo $user->luas_realisasi_tanam ?></td>
                    <td style="text-align: center"><?php echo $is_active ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
            <tr>
                <th colspan="10" style="text-align:right">Total:</th>
                <th></th>
            </tr>
        </tfoot>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
   <!-- DataTables
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables-bs/css/dataTables.bootstrap.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/plugins/') ?>datatables-bs/js/dataTables.bootstrap.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/') ?>Datatables-net/datatables.min.css"/>
  <script type="text/javascript" src="<?php echo base_url('assets/plugins/') ?>Datatables-net/datatables.min.js"></script>
  
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
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
                .column(9)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column(9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column(1).footer() ).html(
                'Total halaman ini : '+pageTotal +' Ha ( Total Semua : '+ total +' Ha)'
            );
        },
		"dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ]
    } );
} );
</script>
</div>
<!-- ./wrapper -->

</body>
</html>
