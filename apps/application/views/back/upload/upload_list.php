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
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Upload</a></li>
        <li><?php echo $module ?></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

      <div class="box box-primary">
        <div class="box-header"><a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $btn_add ?></a></div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Judul</th>
                  <th style="text-align: center">Deskripsi</th>
                  <th style="text-align: center">Tanggal</th>
                  <th style="text-align: center">Preview</th>
                  <th style="text-align: center">Penggunggah</th>
                  <th style="text-align: center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($get_by_username as $row){
                  // action
				  $edit = '<a href="'.base_url('upload/update/'.$row->file_id).'" data-toggle="tooltip" title="Edit File" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
                  $delete = '<a href="'.base_url('upload/delete/'.$row->file_id).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
				  if($row->file_type == 'USER'){
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/user/'.$row->file_data).'">';
				  }
				  else if($row->file_type == 'REALISASI'){
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/realisasi/'.$row->file_data).'" alt="">';
				  }
				  else if($row->file_type == 'PRODUKSI'){
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/produksi/'.$row->file_data).'" alt="">';
				  }
				  else if($row->file_type == 'PKS'){
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/pks/'.$row->file_data).'" alt="">';
				  }
				  else if($row->file_type == 'KTP'){
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/file_ktp/'.$row->file_data).'" alt="">';
				  }
				  else if($row->file_type == 'FORM5'){
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/file_form5/'.$row->file_data).'" alt="">';
				  }
				  else if($row->file_type == 'RIPH'){
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/file_riph/'.$row->file_data).'" alt="">';
				  }
				  else if($row->file_type == 'SK'){
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/file_sk/'.$row->file_data).'" alt="">';
				  }
				  else{
					  $gmbthumb = '<img width="75px" src="'.base_url('/uploads/user/'.$row->file_data).'" alt="">';
				  }
                ?>
                  <tr>
                    <td style="text-align: center"><?php echo $no++ ?></td>
                      <td style="text-align: left"><?php echo $row->file_judul;?></td>
                      <td style="text-align: left"><?php echo $row->file_deskripsi;?></td>
                      <td style="text-align: center"><?php echo $row->tanggal;?></td>
					  <td style="text-align: center"><?php echo $gmbthumb ?></td>
                      <td style="text-align: left"><?php echo $row->file_oleh;?></td>
                    <td style="text-align: center"><?php echo $edit ?> <?php echo $delete ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Judul</th>
                  <th style="text-align: center">Deskripsi</th>
                  <th style="text-align: center">Tanggal</th>
                  <th style="text-align: center">Preview</th>
                  <th style="text-align: center">Penggunggah</th>
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
