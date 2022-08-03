<?php $this->load->view('back/template/meta_new'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>

<style>
	
.td-table
{
word-wrap: break-word;
word-break: break-all;  
white-space: normal !important;
text-align: justify;
max-width: 20%;
}

.table thead th,
 .table tfoot th,
 .jsgrid .jsgrid-table thead th {
     border-top: 0;
     border-bottom-width: 1px;
     font-weight: 500;
     font-size: .8rem;
     text-transform: uppercase
 }

 .table td,
 .jsgrid .jsgrid-table td {
     font-size: 0.875rem;
     padding: .875rem 0.9375rem
 }
</style>


<div class="page-wrapper">
	<div class="row page-titles">
        <div class="col-md-5 align-self-center">
			<h3 class="text-themecolor"><?php echo $page_title ?></h3>
			
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $page_title ?></li>
            </ol>
        </div>
    </div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-actions small">
							<i class="fa fa-info-circle"></i> Berkas-berkas yang diperlukan pada pelaksanaan program wajib tanam.
						</div>
						<h4 class="card-titles">Berkas-berkas Pendukung</h4>
					</div>
					<div class="card-body">
						<div class="table table-hover table-responsive">
							<table class="table w-100">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Berkas</th>										
										<th>Jenis Berkas</th>
										<th>Keterangan</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td DIR=LTR ALIGN=RIGHT>1</td>
										<td DIR=LTR ALIGN=LEFT>Form-BA-Kemitraan</td>
										<td DIR=LTR ALIGN=LEFT>Documents</td>
										<td DIR=LTR ALIGN=LEFT>Form Berita Acara Verifikasi Produksi Bawang Putih - Model Kemitraan</td>
										<td DIR=LTR ALIGN=CENTER><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="http://simethris/appl/uploads/attachment/Form-BA-Kemitraan.docx" download><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td DIR=LTR ALIGN=RIGHT>2</td>
										<td DIR=LTR ALIGN=LEFT>Form-BA-Swa</td>
										<td DIR=LTR ALIGN=LEFT>Documents</td>
										<td DIR=LTR ALIGN=LEFT>Form Berita Acara Verifikasi Produksi Bawang Putih - Model Swakelola</td>
										<td DIR=LTR ALIGN=CENTER><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="http://simethris/appl/uploads/attachment/Form-BA-Swa.docx" download><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td DIR=LTR ALIGN=RIGHT>3</td>
										<td DIR=LTR ALIGN=LEFT>Form-LA-Kemitraan</td>
										<td DIR=LTR ALIGN=LEFT>Documents</td>
										<td DIR=LTR ALIGN=LEFT>Form Laporan Akhir Pelaksanaan Pengembangan Kawasan Bawang Putih oleh Importir - Model Kemitraan</td>
										<td DIR=LTR ALIGN=CENTER><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="http://simethris/appl/uploads/attachment/Form-LA-Kemitraan.docx" download><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td DIR=LTR ALIGN=RIGHT>4</td>
										<td DIR=LTR ALIGN=LEFT>Form-LA-Swa</td>
										<td DIR=LTR ALIGN=LEFT>Documents</td>
										<td DIR=LTR ALIGN=LEFT>Form Laporan Akhir Pelaksanaan Pengembangan Kawasan Bawang Putih oleh Importir - Model Swakelola</td>
										<td DIR=LTR ALIGN=CENTER><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="http://simethris/appl/uploads/attachment/Form-LA-Swa.docx" download><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td DIR=LTR ALIGN=RIGHT>5</td>
										<td DIR=LTR ALIGN=LEFT>Form-RPO-Kemitraan</td>
										<td DIR=LTR ALIGN=LEFT>Documents</td>
										<td DIR=LTR ALIGN=LEFT>Form Laporan Realisasi Produksi - Model Kemitraan</td>
										<td DIR=LTR ALIGN=CENTER><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="http://simethris/appl/uploads/attachment/Form-RPO-Kemitraan.docx" download><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td DIR=LTR ALIGN=RIGHT>6</td>
										<td DIR=LTR ALIGN=LEFT>Form-RPO-Swa</td>
										<td DIR=LTR ALIGN=LEFT>Documents</td>
										<td DIR=LTR ALIGN=LEFT>Form Laporan Realisasi Produksi - Model Swakelola</td>
										<td DIR=LTR ALIGN=CENTER><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="http://simethris/appl/uploads/attachment/Form-RPO-Swa.docx" download><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td DIR=LTR ALIGN=RIGHT>7</td>
										<td DIR=LTR ALIGN=LEFT>Form-RTA-Kemitraan</td>
										<td DIR=LTR ALIGN=LEFT>Documents</td>
										<td DIR=LTR ALIGN=LEFT>Form Laporan Realisasi Penanaman Bawang Putih di Dalam Negeri - Model Kemitraan</td>
										<td DIR=LTR ALIGN=CENTER><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="http://simethris/appl/uploads/attachment/Form-RTA-Kemitraan.docx" download><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td DIR=LTR ALIGN=RIGHT>8</td>
										<td DIR=LTR ALIGN=LEFT>Form-RTA-Swa</td>
										<td DIR=LTR ALIGN=LEFT>Documents</td>
										<td DIR=LTR ALIGN=LEFT>Form Laporan Realisasi Penanaman Bawang Putih di Dalam Negeri - Model Swakelola</td>
										<td DIR=LTR ALIGN=CENTER><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="http://simethris/appl/uploads/attachment/Form-RTA-Swa.docx" download><i class="fa fa-download"></i></a></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>No.</th>
										<th>Nama Berkas</th>										
										<th>Jenis Berkas</th>
										<th>Keterangan</th>
										<th style="text-align: center;">Action</th>
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

<?php $this->load->view('back/template/footer_new'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>

<link rel="stylesheet" href="<?php echo base_url('assets/plugins/nested-datatable') ?>/src/styles/style.css?v=cd7a2da0f2f66a8c86379cbde71985cbd9e0c742">