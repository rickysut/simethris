<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="doc forms-doc page-layout simple full-width">
    <!-- Content Header (Page header) -->
	<!-- HEADER -->
    <div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
        <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

    </div>

    <!-- Main content -->
	<div class="page-content p-6">
        <div class="content container">
            <div class="row">
				<div class="col-12">
					<div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Data Personal</h5>
                            </div>
                        </div>
						<div class="source-preview-wrapper">
                            <div class="preview">
								<?php echo validation_errors() ?>
                                <div class="preview-elements">
								<?php echo form_open($action) ?>
								<div class="container">
									<?php if(is_superadmin()){ ?>
										<div class="form-group">
											<?php echo form_dropdown('', $get_all_users, '', $user_id) ?>
											<label for="name" class="col-form-label">User *</label>
										</div>
									<?php } ?>
									<div class="form-row">
										<div class="form-group col-md-6">
											<?php echo form_password($new_password) ?>
											<label for="username" class="col-form-label">Password Baru *</label>
											<small id="passwordHelpBlock" class="form-text text-muted">
					Password anda harus terdiri dari 8-20 Karakter, Huruf dan angka, Jangan memasukan spasi, spesial karakter atau emoji
					</small>
										</div>
										<div class="form-group col-md-6">
											<?php echo form_password($confirm_new_password) ?>
											<label for="password_confirm" class="col-form-label">Konfirmasi Password</label>
											<small id="passwordHelpBlock" class="form-text text-muted">
					Konfirmasi password harus sama dengan password yang anda masukan pertama kali.</small>
										</div>
									</div>
									<div class="form-row">
										<button type="submit" name="button" class="btn btn-success"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
										<button type="reset" name="button" class="btn btn-danger"><i class="icon-backup-restore"></i> <?php echo $btn_reset ?></button>
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
	</div>
  </div>
  </div>

  <?php $this->load->view('back/template/footer'); ?>


	<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>
