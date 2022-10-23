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
            <form class="" action="submit">
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
                                            <option value="">Query seluruh nomor riph</option>
                                            <option value="">Query seluruh nomor riph</option>
                                            <option value="">Query seluruh nomor riph</option>
                                            <option value="">Query seluruh nomor riph</option>
                                        </select>
                                        <small id="provinsiHelpBlock" class="form-text text-muted">Silahkan pilih nomor riph yang sesuai.</small>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input id="id_skl' type=" text" class="form-control" placeholder="Nomor Surat SKL" />
                                        <small id="provinsiHelpBlock" class="form-text text-muted">Silahkan masukkan nomor SKL.</small>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input id="tgl_terbit" type="date" class="form-control" placeholder="tgl_terbit" />
                                        <small id="provinsiHelpBlock" class="form-text text-muted">Silahkan masukkan nomor SKL.</small>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input id="file_skl" type="file" class="form-control" placeholder="Nomor Surat SKL" />
                                        <small id="provinsiHelpBlock" class="form-text text-muted">Silahkan masukkan nomor SKL.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="Simpan" class="btn btn-primary fuse-ripple-ready"><i class="fa fa-save mr-1"></i>Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php $this->load->view('back/template/footer'); ?>
    <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
        <?php $this->load->view('back/template/quickpanel'); ?>
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('#sklList').DataTable({
                "responsive": 'true',
            });
        });
    </script>
</div>

</body>

</html>