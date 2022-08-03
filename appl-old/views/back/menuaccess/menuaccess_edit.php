<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Edit Menu Akses</h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			<a href="<?php echo $add_action ?>" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus"></i>
            <span><?php echo $btn_add ?></span>
            </a>

         </div>
		 <div class="page-content p-6">
			<div class="content container">
            <div class="row">
				<div class="col-12">
                    <div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Akses Menu </h5>
                            </div>
                        </div>
						<div class="source-preview-wrapper">
                            <div class="preview">
								<?php echo validation_errors() ?>
                                <div class="preview-elements">
								<?php echo form_open($action) ?>
								<div class="container">
									<div class="form-group">
										<?php echo form_dropdown('', $get_all_combobox_usertype, $menuaccess->usertype_id, $usertype_id) ?>
										<small id="usertypeHelpBlock" class="form-text text-muted">
				Silahkan pilih Type User.</small>
									</div>
									<div class="form-group">
										<?php echo form_dropdown('', $get_all_combobox_menu, $menuaccess->menu_id, $menu_id) ?>
										<small id="menuHelpBlock" class="form-text text-muted">
				Silahkan pilih Menu Utama.</small>
									</div>
									<div class="form-group">
										<?php echo form_dropdown('', $get_all_combobox_submenu, $menuaccess->submenu_id, $submenu_id) ?>
										<small id="submenuHelpBlock" class="form-text text-muted">
				Silahkan pilih Sub Menu.</small>
									</div>
									<div class="form-group">
										<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
										<button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
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
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
  <script type="text/javascript">
    function showSubmenu()
    {
      menu_id = document.getElementById("menu_id").value;
      $.ajax({
        url: "<?php echo base_url() ?>submenu/choose_submenu/"+menu_id+"",
        success: function(response){
          $("#submenu_id").html(response);
        },
        dataType: "html"
      });
      return false;
    }
  </script>
<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>
