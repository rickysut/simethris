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

      <div class="box box-primary">
        <div class="box-header"><a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $btn_add ?></a> </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">ID RIPH</th>
                  <th style="text-align: center">NO RIPH</th>
                  <th style="text-align: center">TANGGAL BERLAKU</th>
                  <th style="text-align: center">V PENGAJUAN</th>
                  <th style="text-align: center">BEBAN TANAM</th>
                  <th style="text-align: center">BEBAN PRODUKSI</th>
                  <th style="text-align: center">STATUS</th>
                  <th style="text-align: center">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($get_all as $user){
                  // status active
                  if($user->is_active == '0'){$is_active = '<a href="#" class="btn btn-xs btn-success">ACTIVE</a>';}
                  else{$is_active = '<a href="#" class="btn btn-xs btn-danger">INACTIVE</a>';}
                  if($user->sts_lunas == '1'){$is_lunas = '<a href="#" class="btn btn-xs btn-success">LUNAS</a>';}
                  else{$is_lunas = '<a href="#" class="btn btn-xs btn-danger">BL LUNAS</a>';}
                  // action
                  $edit = '<a href="'.base_url('ajuriph/update/'.$user->id_mst_riph).'" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
                  //$delete = '<a href="'.base_url('ajuriph/delete/'.$user->id_mst_riph).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
                ?>
                  <tr>
                    <td style="text-align: center"><?php echo $no++ ?></td>
                    <td style="text-align: left"><?php echo $user->id_mst_riph ?></td>
                    <td style="text-align: center"><?php echo $user->nomor_riph ?></td>
                    <td style="text-align: center"><?php echo date('d-m-Y', strtotime($user->tgl_mulai_berlaku)).' s.d '.date('d-m-Y', strtotime($user->tgl_akhir_berlaku)) ?></td>
                    <td style="text-align: center"><?php echo $user->v_pengajuan_riph ?></td>
                    <td style="text-align: center"><?php echo $user->beban_tanam ?></td>
                    <td style="text-align: center"><?php echo $user->beban_produksi ?></td>
                    <td style="text-align: center"><?php echo $is_active ?> <?php echo $is_lunas ?></td>
                    <td style="text-align: center"><?php echo $edit ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">ID RIPH</th>
                  <th style="text-align: center">NO RIPH</th>
                  <th style="text-align: center">TANGGAL BERLAKU</th>
                  <th style="text-align: center">V PENGAJUAN</th>
                  <th style="text-align: center">BEBAN TANAM</th>
                  <th style="text-align: center">BEBAN PRODUKSI</th>
                  <th style="text-align: center">STATUS</th>
                  <th style="text-align: center">ACTION</th>
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
