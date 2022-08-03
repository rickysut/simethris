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
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> CP/CL</a></li>
        <li><?php echo $module ?></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

      <div class="box box-primary">
        <div class="box-header"><a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $btn_add ?></a>  <a href="<?php echo $back_action ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> <?php echo $btn_back ?></a></div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Tgl Tanam</th>
                  <th style="text-align: center">Type Kelola</th>
				  <th style="text-align: center">Nama Petani</th>
                  <th style="text-align: center">Provinsi</th>
                  <th style="text-align: center">Kabupaten</th>
                  <th style="text-align: center">Kecamatan</th>
				  <th style="text-align: center">Desa</th>
				  <th style="text-align: center">Luas</th>
                  <th style="text-align: center">Status</th>
                  <th style="text-align: center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($get_all_produksi_byid as $user){
                  // status active
                   // action
				  $new = '<a href="'.base_url('produksi/create/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tambah Data Realisasi" class="btn btn-success"><i class="fa fa-plus-square"></i></a>';
                  $edit = '<a href="'.base_url('produksi/update/'.$user->id_cpcl.'/'.$user->id_realisasi).'" data-toggle="tooltip" title="Edit Realisasi Tanam" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
                  $delete = '<a href="'.base_url('produksi/delete/'.$user->id_produksi).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                ?>
                  <tr>
                    <td style="text-align: center"><?php echo $no++ ?></td>
                    <td style="text-align: left"><?php echo $user->tgl_realisasi_tanam ?></td>
                    <td style="text-align: left"><?php echo $user->namapengelola ?></td>
					<td style="text-align: left"><?php echo $user->nama_pelaksana ?></td>
                    <td style="text-align: left"><?php echo $user->nama_prov ?></td>
                    <td style="text-align: left"><?php echo $user->nama_kab ?></td>
                    <td style="text-align: left"><?php echo $user->nama_kec ?></td>
                    <td style="text-align: left"><?php echo $user->nama_des ?></td>
					<td style="text-align: center"><?php echo $user->luas_realisasi_tanam ?> - H</td>
                    <td style="text-align: center"><?php echo $is_active ?></td>
                    <td style="text-align: center"><?php echo $new ?> <?php echo $edit ?> <?php echo $delete ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Tgl Tanam</th>
                  <th style="text-align: center">Type Kelola</th>
				  <th style="text-align: center">Nama Petani</th>
                  <th style="text-align: center">Provinsi</th>
                  <th style="text-align: center">Kabupaten</th>
                  <th style="text-align: center">Kecamatan</th>
				  <th style="text-align: center">Desa</th>
				  <th style="text-align: center">Luas</th>
                  <th style="text-align: center">Status</th>
                  <th style="text-align: center">Action</th>
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
