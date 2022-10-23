<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<div class="content-wrapper">
    <?php $this->load->view('back/template/navbar'); ?>
    <div class="content custom-scrollbar">
        <div class="doc data-table-doc page-layout simple full-width">
            <!-- Page HEADER -->
            <div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
                <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
                <?php if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                } ?>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="<?php echo $add_action ?>" class="btn btn-light fuse-ripple-ready"><i class="icon-plus"></i>
                        <span><?php echo $btn_add ?></span>
                    </a>
                </div>
            </div>
            <!-- Page Content -->
            <div class="page-content p-3">
                <div class="col-12">
                    <div class="card p-3 ">
                        <!-- mohon ditambahkan button untuk eksport dan print -->
                        <div class="table-responsive">
                            <table id="sklList" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No. SKL</th>
                                        <th>No. RIPH</th>
                                        <th>Perusahaan</th>
                                        <th>Tanggal Terbit</th>
                                        <th>berkas</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <a href="<?php echo $edit_action ?>" class="badge btn-sm btn-info" action="edit_action" role="button" title="Edit/Ubah"><i class="fa fa-edit"></i></a>
                                            <a class="badge btn-sm btn-danger" action="delete" role="button" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>	  
	<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/Buttons-1.6.1/js/buttons.html5.min.js"></script>	  
	<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/Buttons-1.6.1/js/buttons.print.min.js"></script>	 
    <script>
    $(document).ready(function() {
        
        var tbl= $('#sklList').DataTable({
            dom: 
            "<'row mb-3'<'col-sm-12 col-md-4 d-flex align-items-center justify-content-start'l><'col-sm-12 col-md-2 d-flex align-items-center justify-content-start'B><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                'copy', 'csv',  'print'
            ]

        });
    });
    </script>
</div>

</body>

</html>