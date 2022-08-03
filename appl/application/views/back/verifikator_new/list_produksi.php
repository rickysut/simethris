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
                                        <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th style="text-align: left">Nama Pelaksana</th>
                                            <th style="text-align: left">Nama Petani</th>
                                            <th style="text-align: left">Alamat</th>
                                            <th style="text-align: left">Tgl Produksi</th>
                                            <th style="text-align: center">Kapasitas</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            
                                            foreach($dataproduksi as $produksi){
                                            // button edit
                                            if($produksi->is_verifikasi == '1'){$is_verifikasi_p = '<a title="Produksi Sudah Diverifikasi" ><i style="color: green"  class="icon-checkbox-marked-circle-outline"></i></a>';}
                                            elseif($produksi->is_verifikasi == '2'){$is_verifikasi_p = '<a title="Produksi Sudah Diverifikasi Status Pending" ><i style="color: #ff9800" class="icon-delta"></i></a>';}
                                            elseif($produksi->is_verifikasi == '3'){$is_verifikasi_p = '<a title="Produksi Sudah Diverifikasi Status Ditolak" ><i style="color: red" class="icon-cancel"></i></a>';}
                                            else{$is_verifikasi_p = '<a title="produksi Belum Diverifikasi" ><i style="color: #1c1e26" class="icon-close-circle"></i></a>';}
                                            
                                            $lihat_p = '<a href="'.base_url('Verifikator_new/lihatproduksi/'.$produksi->id_produksi.'/'.$companyid.'/'.$period_year).'"  title="Lihat Untuk Diverifikasi" ><i class="fa fa-eye"></i></a>';
                                            $verifikasi_p = '<a href="'.base_url('Verifikator_new/createverifikasi4/'.$produksi->id_produksi.'/'.$companyid.'/'.$period_year).'"  title="Verifikasi Langsung" onclick="return confirm(\'Yakin mau diverifikasi?\')"><i class="fa fa-check"></i></a>';
                                            
                                            $is_action = $lihat_p .$verifikasi_p;
                                            
                                            ?>
                                            <tr>
                                                <td style="text-align: left"><?php echo $produksi->nama_pelaksana ?></td>
                                                <td style="text-align: left"><?php echo $produksi->nama_petugas ?></td>
                                                <td style="text-align: left"><?php echo $produksi->address ?></td>
                                                <td style="text-align: left"><?php echo $produksi->tgl_produksi ?></td>
                                                <td style="text-align: center"><?php echo $produksi->jml_produksi ?></td>
                                                <td style="text-align: center"><?php echo $is_verifikasi_p?></td>
                                                <td style="text-align: center"><?php echo $is_action ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            
                                            </tr>
                                        </tfoot>
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
    $(document).ready( function () {
        $.ajax({
            url: '<?=base_url()?>verifikator_new/ajaxriphdata/<?=$datariph[0]->id_users?>/<?=$period_year?>',
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
        $('#dataTable').DataTable({ 
            scrollX: true,
            responsive: true,
            dom       : '<lf<t>ip>'
        });
    });
    </script>
</div>
<!-- ./wrapper -->

</body>
</html>