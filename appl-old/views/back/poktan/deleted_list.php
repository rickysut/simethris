<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

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
	<div class="row page-titles m-b-0">
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
</div>

<?php $this->load->view('back/template/footer'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>