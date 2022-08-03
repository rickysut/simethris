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
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> PKS</a></li>
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
                  <th style="text-align: center">Rencana Tanam</th>
                  <th style="text-align: center">Type Kelola</th>
				  <th style="text-align: center">Nama Pengelola</th>
                  <th style="text-align: center">Provinsi</th>
                  <th style="text-align: center">Kabupaten</th>
                  <th style="text-align: center">Kecamatan</th>
				  <th style="text-align: center">Realisasi Tanam</th>
				  <th style="text-align: center">Produksi</th>
                  <th style="text-align: center">Status</th>
                  <th style="text-align: center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($get_all_cpcl_by_iduser as $user){
                  // status active
                  if($user->is_active == '1'){$is_active = '<a href="#" data-toggle="tooltip" title="Aktif"  class="btn btn-xs btn-success"><span class="badge">A</span></a>';}
                  else{$is_active = '<a href="#" data-toggle="tooltip" title="Tidak Aktif" class="btn btn-xs btn-danger"><span class="badge">N</span></a>';}
				  if($user->is_verifikasi == '1'){$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Sudah Terverifikasi" class="btn btn-xs btn-success"><span class="badge">V</span></button>';}
				  else{$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Belum Terverifikasi" class="btn btn-xs btn-danger"><span class="badge">X</span></button>';}
                  // action
				  $new = '<a href="'.base_url('realisasi/daftarrealisasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tambah Data Realisasi" class="btn btn-xs btn-success"><span class="badge"><i class="fa fa-list"></i></span></a>';
                  $edit = '<a href="'.base_url('cpcl/update/'.$user->id_cpcl).'" data-toggle="tooltip" title="Edit PKS" class="btn btn-xs btn-warning"><span class="badge"><i class="fa fa-pencil"></i></span></a>';
                  $delete = '<a href="'.base_url('cpcl/delete/'.$user->id_cpcl).'" data-toggle="tooltip" title="Hapus PKS" onClick="return confirm(\'Are you sure?\');" class="btn btn-xs btn-danger"><span class="badge"><i class="fa fa-trash"></i></span></a>';
                ?>
				
                  <tr>
                    <td style="text-align: center"><?php echo $no++ ?></td>
                    <td style="text-align: center"><?php echo $user->tgl_rencana_tanam ?></td>
                    <td style="text-align: left"><?php echo $user->namapengelola ?></td>
					<td style="text-align: left"><?php echo $user->nama_pelaksana ?></td>
                    <td style="text-align: left"><?php echo $user->nama_prov ?></td>
                    <td style="text-align: left"><?php echo $user->nama_kab ?></td>
                    <td style="text-align: left"><?php echo $user->nama_kec ?></td>
					<td style="text-align: left"><?php echo $user->jmlrealisasi ?> - H</td>
					<td style="text-align: left"><?php echo $user->jmlproduksi ?> - Ton</td>
                    <td style="text-align: center"><?php echo $is_active ?><?php echo $is_verifikasi ?></td>
                    <td style="text-align: center"><?php echo $new ?><?php echo $edit ?><?php echo $delete ?></td>
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
