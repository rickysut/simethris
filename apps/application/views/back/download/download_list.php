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
        <div class="box-header"></div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                    <tr>
                      <th>No</th>
                      <th>Files</th>
					  <th>Deskripsi</th>
                      <th>Tanggal</th>
                      <th>Preview</th>
                      <th>Pengunggah</th>
                      <th style="text-align:right;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $no = 1; foreach($get_all_files as $row){
					  if(pathinfo($row->file_data, PATHINFO_EXTENSION)=='pdf'){
						  $pregmb = '<img width="75px" src="'.base_url('/assets/images/pdf_thumb.png').'">';
					  }else if(pathinfo($row->file_data, PATHINFO_EXTENSION)=='docx'){
						  $pregmb = '<img width="75px" src="'.base_url('/assets/images/docx_thumb.png').'">';
					  }else{
						  if($row->file_type == 'USER'){
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/user/'.$row->file_data).'">';
						  }
						  else if($row->file_type == 'REALISASI'){
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/realisasi/'.$row->file_data).'" alt="">';
						  }
						  else if($row->file_type == 'PRODUKSI'){
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/produksi/'.$row->file_data).'" alt="">';
						  }
						  else if($row->file_type == 'PKS'){
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/pks/'.$row->file_data).'" alt="">';
						  }
						  else if($row->file_type == 'KTP'){
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/file_ktp/'.$row->file_data).'" alt="">';
						  }
						  else if($row->file_type == 'FORM5'){
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/file_form5/'.$row->file_data).'" alt="">';
						  }
						  else if($row->file_type == 'RIPH'){
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/file_riph/'.$row->file_data).'" alt="">';
						  }
						  else if($row->file_type == 'SK'){
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/file_sk/'.$row->file_data).'" alt="">';
						  }
						  else{
							  $pregmb = '<img width="75px" src="'.base_url('/uploads/user/'.$row->file_data).'" alt="">';
						  }
					  }
                    ?>
                    <tr>
                      <td style="text-align: center"><?php echo $no++;?></td>
                      <td style="text-align: left"><?php echo $row->file_judul;?></td>
                      <td style="text-align: left"><?php echo $row->file_deskripsi;?></td>
                      <td style="text-align: center"><?php echo $row->tanggal;?></td>
					  <td style="text-align: center"><?php echo $pregmb;?></td>
                      <td style="text-align: left"><?php echo $row->file_oleh;?></td>
                      <td style="text-align:right;"><a href="<?php echo site_url('download/get_file/'.$row->file_id);?>" class="btn btn-info">Download</a></td>
                    </tr>
                 <?php } ?>
                  </tbody>
              <tfoot>
                <tr>
                      <th>No</th>
                      <th>Files</th>
					  <th>Deskripsi</th>
                      <th>Tanggal</th>
                      <th>Preview</th>
                      <th>Pengunggah</th>
                      <th style="text-align:right;">Aksi</th>
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
