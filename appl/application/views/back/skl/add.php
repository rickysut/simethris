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
            </div>
            <!-- Page Content -->
            <?php echo form_open_multipart($action) ?>
		    <?php echo validation_errors() ?>
                <div class="page-content p-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6>Data Wajib Tanam Produksi</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <select name="nomor_riph" id="nomor_riph" class="form-control" autocomplete="off" value="">
                                            <option value="" hidden>- pilih no. RIPH</option>
                                            <?php foreach($riph_data as $data) { ?>
                                                <option value="<?= $data->id_mst_riph ?>"><?= $data->nomor_riph ?></option>
                                            <?php } ?>
                                            
                                            
                                        </select>
                                        <small id="provinsiHelpBlock" class="form-text text-muted">Silahkan pilih nomor riph yang sesuai.</small>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <?php echo form_input($no_skl) ?>
                                        <small id="provinsiHelpBlock" class="form-text text-muted">Silahkan masukkan nomor SKL.</small>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <?php echo form_input($tgl_terbit) ?>
                                        <small id="provinsiHelpBlock" class="form-text text-muted">Silahkan masukkan nomor SKL.</small>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <?php echo form_input($file_skl) ?>
                                        <small id="provinsiHelpBlock" class="form-text text-muted">Silahkan pilih file.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="container">
                                    <div class="btn-group" role="group" aria-label="Default button group">
                                        <button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
                                        <button class="btn btn-primary" type="reset"><i class="icon-loop"></i> <?php echo $btn_reset ?></button>
                                    </div>
                                </div>
						    </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <?php $this->load->view('back/template/footer'); ?>
    <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
        <?php $this->load->view('back/template/quickpanel'); ?>
    </div>
    
</div>

</body>

</html>