<?php $this->load->view('back/template/meta_new'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>

<div class="page-wrapper">
	<div class="row page-titles">
        <div class="col-md-5 align-self-center">
			<h3 class="text-themecolor"><?php echo $page_title ?></h3>
			<span><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?></span>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $page_title ?></li>
            </ol>
        </div>
    </div>
	<?php echo form_open_multipart($action) ?>
	<?php echo validation_errors() ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-titles">Data RIPH Periode Baru</h4>
					</div>
					<div class="card-body">
						<div class="alert alert-info"><small><i>Data RIPH ini diisi dan diperbarui setiap periode.</i></small></div>
						<div class="form-row">
							<div class="form-group has-success col-lg-6 col-sm-12">
								<label class="control-label">Tanggal Update</label>
								<?php echo form_input($tanggal) ?>
							</div>
							<div class="form-group has-success col-lg-6 col-sm-12">
								<label class="control-label">Periode</label>
								<input data-toggle="tooltip" title="kolom ini sedang dalam pengembangan" type="text" id="noPKS" class="form-control" placeholder="contoh: 2021" readonly />
							</div>
						</div>
						<div class="form-row">
							<div class="form-group has-success col-lg-3 col-sm-12">
								<label for="v_pengajuan_import" class="control-label">Volume Import <sup>ton</sup></label>
								<?php echo form_input($v_pengajuan_import) ?>
							</div>
							<div class="form-group has-success col-lg-3 col-sm-12">
								<label for="v_beban_tanam" class="control-label">Kewajiban Tanam <sup>ha</sup></label>
								<?php echo form_input($v_beban_tanam) ?>
							</div>
							<div class="form-group has-success col-lg-3 col-sm-12">
								<label for="v_beban_produksi" class="control-label">Kewajiban Produksi <sup>ton</sup></label>
								<?php echo form_input($v_beban_produksi) ?>
							</div>
							<div class="form-group has-success col-lg-3 col-sm-12">
								<label for="jml_importir" class="control-label">Jumlah Importir</label>
								<?php echo form_input($jml_importir) ?>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-info btn-sm" type="submit"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
						<button class="btn btn-warning btn-sm" type="reset"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('back/template/footer_new'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>

<script type="text/javascript">
	function hitung() {
		var txtFirstNumberValue = document.getElementById('v_pengajuan_import').value;
		var tproduksi = ((5/100)*parseFloat(txtFirstNumberValue));
		if (!isNaN(tproduksi)) {
			var ttanam = tproduksi / 6;
			document.getElementById('v_beban_produksi').value = Math.round(tproduksi);
			document.getElementById('v_beban_tanam').value = Math.round(ttanam);
		}
	}
</script>