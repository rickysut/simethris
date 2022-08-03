<?php $this->load->view('back/template/meta_new'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>

<div class="page-wrapper">
	<div class="row page-titles">
        <div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Selamat datang, <?php echo $this->session->name ?>!</h3>
			<span><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?></span>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $page_title ?></li>
            </ol>
        </div>
    </div>
	
	<?php echo validation_errors() ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-titles"></h4>
					</div>
					<div class="card-body">
						<div class="alert alert-info"><small><i>news</i></small></div>
						
					</div>
					<div class="card-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('back/template/footer_new'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>