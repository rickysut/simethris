<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
	<div class="page-layout simple left-sidebar">
        <aside class="page-sidebar custom-scrollbar" data-fuse-bar="demo-sidebar" data-fuse-bar-media-step="md">
            <div class="demo-sidebar">
                <ul class="nav flex-column">
                    <li class="subheader">Administrator</li>
                    <li class="nav-item">
                         <a href="#Dashboard" class="nav-link">Dashboard</a>
                    </li>
					<md-divider></md-divider>
                    <li class="nav-item">
                        <a href="#Helpdesk" class="nav-link">Help Desk</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">File Manager</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Verifikator</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Data RIPH</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Laporan</a>
                    </li>
                </ul>
				<div class="toolbar-separator"></div>
            </div>
        </aside>
		<div class="page-content-wrapper custom-scrollbar">
                            <!-- HEADER -->
            <div class="page-header bg-primary text-auto p-6">
                <div class="d-flex flex-row align-items-center">
					<button type="button" class="sidebar-toggle-button btn btn-icon d-block d-lg-none mr-2" data-fuse-bar-toggle="demo-sidebar">
                    <i class="icon icon-menu"></i></button>
					<span class="h4">Video Tutorial simeTHRIS</span>
				</div>
            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
            <div class="page-content p-6">

                                <!-- DEMO CONTENT -->
                                <!-- DEMO CONTENT -->
                                <div class="demo-content" id="Dashboard">

                                    <h1>Dashboard</h1>
									<p style="text-align:center"><iframe width="560" height="315" src="https://www.youtube.com/embed/tZVASnbGH2Q" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
                                    
                                </div>
								
								<div class="demo-content" id="Helpdesk">

                                    <h1>Help Desk</h1>

                                    
                                </div>

            </div>
                            <!-- / CONTENT -->
        </div>
    </div>
  
</div>
<?php $this->load->view('back/template/footer'); ?>

</div>
<!-- ./wrapper -->
</body>
</html>
