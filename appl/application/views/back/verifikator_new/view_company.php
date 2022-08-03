<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>
<div class="content-wrapper">
    <?php $this->load->view('back/template/navbar_new'); ?>
    <div class="content custom-scrollbar">
        <!-- Main content -->
        <div class="doc data-table-doc page-layout simple full-width">
            <div class="page-header bg-primary text-auto p-3 row no-gutters align-items-left justify-content-between">
                <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                </a>

            </div>
            <div class="page-content p-1">
                <div class="content container">
                    <div class="row">
                        
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="description-text">
                                                <h6 id="namapt">Nama :</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="description-text">
                                                <h6 id="noriph">No. RIPH :</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="description-text">
                                                <h6 id="tglawal">Tgl Awal :</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="description-text">
                                                <h6 id="tglakhir">Tgl Akhir :</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="description-text">
                                                <h6 id="vimport">Vol. Import :</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="description-text">
                                                <h6 id="btanam">Beban Tanam :</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="description-text">
                                                <h6 id="bproduksi">Beban Produksi :</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="description-text">
                                                <h6 id="ltanam">Luas Tanam :</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="description-text">
                                                <h6 id="jumprod">Jumlah Produksi :</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="action" class="description-text">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-striped dt-responsive display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th style="text-align: left">ID PKS</th>
                                            <th style="text-align: left">Nama Pelaksana</th>
                                            <th style="text-align: left">Kabupaten</th>
                                            <th style="text-align: left">Kecamatan</th>
                                            <th style="text-align: left">Desa</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Action</th>
                                            <th style="text-align: center">Realisasi Lahan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                        </tbody>
                                        
                                        </table>
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
    <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
        <?php $this->load->view('back/template/quickpanel'); ?>
    </div>
    <script>
        var table;
        $(document).ready( function () {

            $.ajax({
                url: '<?=base_url()?>verifikator_new/ajaxriphdata/<?=$companyid?>/<?=$period_year?>',
                type: 'get',
                dataType: 'JSON',
                success: function(response){
                    if (response.length > 0){
                    $('#namapt').text('Nama : ' + response[0].nama_perusahaan);
                    $('#noriph').text('No. RIPH : ' + response[0].nomor_riph);
                    $('#tglawal').text('Tgl Awal : ' + response[0].tgl_awal);
                    $('#tglakhir').text('Tgl Akhir : ' + response[0].tgl_akhir);
                    $('#vimport').text('Vol. Import : ' + response[0].vol_import);
                    $('#btanam').text('Beban Tanam : ' + response[0].beban_tanam);
                    $('#bproduksi').text('Beban Produksi : ' + response[0].beban_produksi);
                    $('#ltanam').text('Luas Tanam: ' + response[0].luas_tanam);
                    $('#jumprod').text('Jumlah Produksi : ' + response[0].jml_produksi);
                    $('#action').html(response[0].action);
                    }
                }
            });

            table = $('#dataTable').DataTable({ 
                'processing': true,
                'serverSide': true,
                'dom' : '<l<t>ip>',
                'order': [],
                'scrollX': true,
                'ajax': {
                    'url':'<?=base_url()?>verifikator_new/ajaxpkslist/<?=$companyid?>/<?=$period_year?>',
                    "type": "POST"
                },
                'columns': [
                    { data: 'id_pks' },
                    { data: 'nama_pelaksana' },
                    { data: 'kabupaten' },
                    { data: 'kecamatan' },
                    { data: 'desa' },
                    { className: 'dt-center', data: 'status' },
                    { className: 'dt-center', data: 'action' },
                    { className: 'dt-center', data: 'realisasi' },
                ]
            });

            $("#date-dropdown").change(function(){
		        var thn = $(this).val();
		        table.ajax.url('<?=base_url()?>verifikator_new/ajaxpkslist/<?=$companyid?>/' + thn).load();
                $.ajax({
                    url: '<?=base_url()?>verifikator_new/ajaxriphdata/<?=$companyid?>/' + thn,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(response){
                        if (response.length > 0){
                        $('#namapt').text('Nama : ' + response[0].nama_perusahaan);
                        $('#noriph').text('No. RIPH : ' + response[0].nomor_riph);
                        $('#tglawal').text('Tgl Awal : ' + response[0].tgl_awal);
                        $('#tglakhir').text('Tgl Akhir : ' + response[0].tgl_akhir);
                        $('#vimport').text('Vol. Import : ' + response[0].vol_import);
                        $('#btanam').text('Beban Tanam : ' + response[0].beban_tanam);
                        $('#bproduksi').text('Beban Produksi : ' + response[0].beban_produksi);
                        $('#ltanam').text('Luas Tanam: ' + response[0].luas_tanam);
                        $('#jumprod').text('Jumlah Produksi : ' + response[0].jml_produksi);
                        $('#action').html(response[0].action);
                        }
                    }
                });
  	        });
        });
    </script>
</div>
<!-- ./wrapper -->

</body>
</html>