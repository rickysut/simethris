<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			<a href="<?php echo $back_action2 ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> <?php echo $btn_back2 ?></a>
        </div>
		<div class="page-content p-3">
			<div class="content container">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<div class="description">
									<div class="description-text">
										<h5>UPDATE HARIAN</h5>
									</div>
								</div>
							</div>
							<div class="card-body">
								<?php echo $this->session->flashdata('statusMsg'); ?>
								<?php echo form_open_multipart() ?>
								<?php echo validation_errors() ?>
								<div class="row ">			
									<form enctype="multipart/form-data" action="" method="post">
									<div class="form-group  col-lg-6">
										<label>Choose Files</label>
										<input type="file" class="form-control" name="upload_Files[]" multiple/>				
									</div>   
									<div class="form-group  col-lg-6">		
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
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
	
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
  </div>
</body>
</html>