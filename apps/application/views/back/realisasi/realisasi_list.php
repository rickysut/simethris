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
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> REALISASI</a></li>
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
                  <th style="text-align: center">Realisasi</th>				  
                  <th style="text-align: center">Produksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($get_all_realisasi_by_idcpcl as $user){
                  // status active
                  if($user->is_active == '1'){$is_active = '<a href="'.base_url('realisasi/deactivate/'.$user->id_cpcl).'" data-toggle="tooltip" title="Aktif" class="btn btn-xs btn-success"><span class="badge">A</span></a>';}
                  else{$is_active = '<a href="'.base_url('realisasi/activate/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tidak Aktif" class="btn btn-xs btn-danger"><span class="badge">-</span></a>';}
				  if($user->is_produksi == '1'){
					  $is_produksi = '<button type="button" data-toggle="tooltip" title="Sudah Produksi" class="btn btn-xs btn-success"><span class="badge">P</span></button>';
					  $new = '<a href="'.base_url('produksi/update/'.$user->id_cpcl.'/'.$user->id_realisasi).'" data-toggle="tooltip" title="Edit Produksi" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
				  }
				  else{
					  $is_produksi = '<button type="button" data-toggle="tooltip" title="Belum Produksi" class="btn btn-xs btn-danger"><span class="badge">X</span></button>';
					  $new = '<a href="'.base_url('produksi/create/'.$user->id_realisasi).'" data-toggle="tooltip" title="Tambah Data Produksi" class="btn btn-xs btn-success"><i class="fa fa-plus-square"></i></a>';
				  }
				  if($user->is_verifikasi == '1'){$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Terverifikasi" class="btn btn-xs btn-success"><span class="badge">V</span></button>';}
				  else{$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Belum Terverifikasi" class="btn btn-xs btn-danger"><span class="badge">U</span></button>';}
                  // action
                  $edit = '<a href="'.base_url('realisasi/update/'.$user->id_cpcl.'/'.$user->id_realisasi).'" data-toggle="tooltip" title="Edit Realisasi Tanam" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>';
                  $delete = '<a href="'.base_url('realisasi/delete/'.$user->id_realisasi).'" onClick="return confirm(\'Are you sure?\');" data-toggle="tooltip" title="Hapus Realisasi Tanam" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
				  $edit2 = '<a href="'.base_url('updatemingguan/index/'.$user->id_users.'/'.$user->id_realisasi).'" data-toggle="tooltip" title="Update Mingguan" class="btn btn-xs btn-warning"><i class="fa fa-camera"></i></a>';
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
                    <td style="text-align: center"><?php echo $is_active ?><?php echo $is_produksi ?><?php echo $is_verifikasi ?></td>
                    <td style="text-align: center"><?php echo $edit ?><?php echo $delete?><?php echo $edit2?></td>
					<td style="text-align: center"><?php echo $new ?></td>
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
                  <th style="text-align: center">Realisasi</th>
				  <th style="text-align: center">Produksi</th>
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
