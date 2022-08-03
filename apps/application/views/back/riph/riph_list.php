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
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><?php echo $module ?></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

      <div class="box box-primary">
        <div class="box-header"><a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $btn_add ?></a> </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Nama Perusahaan</th>
                  <th style="text-align: center">No RIPH</th>
				  <th style="text-align: center">TGL Terbit RIPH</th>
                  <th style="text-align: center">TGL Maks Pelunasan</th>
                  <th style="text-align: center">Volume Pengajuan</th>
                  <th style="text-align: center">Target Produksi</th>
				  <th style="text-align: center">Target Tanam</th>
                  <th style="text-align: center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($get_all_riph as $user){
                  // status active
                  $edit = '<a href="'.base_url('riph/update/'.$user->id_riph).'" data-toggle="tooltip" title="Edit Data RIPH" class="btn btn-xs btn-warning"><span class="badge"><i class="fa fa-pencil"></i></span></a>';
                  $delete = '<a href="'.base_url('riph/delete/'.$user->id_riph).'" data-toggle="tooltip" title="Hapus Data RIPH" onClick="return confirm(\'Are you sure?\');" class="btn btn-xs btn-danger"><span class="badge"><i class="fa fa-trash"></i></span></a>';
                ?>
				
                  <tr>
                    <td style="text-align: center"><?php echo $no++ ?></td>
                    <td style="text-align: left"><?php echo $user->nama_perusahaan ?></td>
                    <td style="text-align: left"><?php echo $user->no_riph ?></td>
                    <td style="text-align: left"><?php echo date('d-m-Y',strtotime($user->tgl_terbit_riph)) ?></td>
					<td style="text-align: left"><?php echo date('d-m-Y',strtotime($user->tgl_max_lunas)) ?></td>
                    <td style="text-align: right"><?php echo $user->v_pengajuan ?></td>
                    <td style="text-align: right"><?php echo $user->target_produksi ?></td>
                    <td style="text-align: right"><?php echo $user->target_tanam ?></td>
                    <td style="text-align: center"><?php echo $edit ?><?php echo $delete ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  
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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables-bs/css/dataTables.bootstrap.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/plugins/') ?>datatables-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
  } );
  </script>

</div>
<!-- ./wrapper -->

</body>
</html>
