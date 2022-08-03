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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

	<section class="content">
	<?php echo $this->session->flashdata('statusMsg'); ?>
	<?php echo form_open_multipart() ?>
      <?php echo validation_errors() ?>
	<div class="box box-primary">
        <!-- /.box-header -->
		<div class="box-header">
			<a href="<?php echo $back_action2 ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> <?php echo $btn_back2 ?></a>
		</div>
        <div class="box-body">
		<div role="navigation" class="navbar navbar-default navbar-static-top">
		  <div class="container">
			<div class="navbar-header">
			  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div>
		  </div>
		</div>
		<div class="container" style="min-height:500px;">
		<div class=''></div>
		
				<div class="row ">			
					<form enctype="multipart/form-data" action="" method="post">
					<div class="form-group  col-sm-3">
						<label>Choose Files</label>
						<input type="file" class="form-control" name="upload_Files[]" multiple/>				
					</div>   
					<div class="form-group  col-sm-6">		
						<input  type="submit" class="btn btn-default" name="submitForm" id="submitForm" value="Upload" />	
					</div>		
				</div> 	
				<div class="container">
				<div class="row">
					<div class="gallery">
						<ul>
							<?php if(!empty($gallery)): foreach($gallery as $file): ?>
							<li>
								<img width="200" height="125" src="<?php echo base_url('uploads/realisasi/'.$file['file_data']); ?>" alt="" >
								<p>di Upload Pada <?php echo date("j M Y",strtotime($file['file_tanggal'])); ?></p>
							</li>
							<?php endforeach; else: ?>
							<p>No File uploaded.....</p>
							<?php endif; ?>
						</ul>
					</div>
				</div>
		</div>
		</div>
		</div>
		</div>
		</div>
	</section>
  </div>

  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
  </div>
</body>
</html>