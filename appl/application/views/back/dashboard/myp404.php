<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
		

                    <div id="error-404" class="d-flex flex-column align-items-center justify-content-center">

                        <div class="content">

                            <div class="error-code display-1 text-center">404</div>

                            <div class="message h4 text-center text-muted">Sorry but we couldn’t find the page you are looking for</div>

                            <div class="search md-elevation-1 row no-gutters align-items-center mt-12 mb-4 bg-white text-auto">
                                <i class="col-auto icon-magnify s-6 mx-4"></i>
                                <input class="col" type="text" placeholder="Search for anything">
                            </div>


                        </div>
                    </div>

     
                
	</div>
  <?php $this->load->view('back/template/footer'); ?>
	
	</div>
            <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
            </div>

        </div>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
	
    </main>
</body>

</html>
