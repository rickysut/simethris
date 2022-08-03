<?php $this->load->view('back/template/meta'); ?>
<div class="wrapper">

  <?php $this->load->view('back/template/navbar'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $page_title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Verifikator</a></li>
        <li><?php echo $module ?></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
		
	  <div class="box box-primary">
        <div class="box-header"><h3>Daftar PKS Untuk Diverifikasi</h3></div>
        <!-- /.box-header -->
		<?php
			$json_table = json_encode($data_for_table, true);
			$json_table1 = $json_table;
		?>
        <div class="box-body">
		   <!-- <p><?php echo $data_for_table ?></p>    -->
			<div id="datatableku" class='table table-bordered table-striped'></div>
		</div>
	  </div>
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('back/template/footer'); ?>
  
  <script>
 //var dataInJson = [{
 var dataInJson = [<?php echo $data_for_table ?>];

 //var dataInJson = [
 //{"data":{"Nama Perusahaan":"PT. GARIS LINTANG","Provinsi":"Jawa Barat","Kabupaten":"Kab. Subang","Kecamatan":" Cijambe","Desa":"Cijambe","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E"},
 //"kids":[
 //{"data":{"ID PKS":"14","Nama Pelaksana":"GARIS SEJAHTERA","Kabupaten":"Kab. Subang","Kecamatan":" Cijambe","Desa":"Cijambe", "Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-success\"\u003Everified \u003Cspan class=\"badge\"\u003EV\u003C\/span\u003E\u003C\/button\u003E", "Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi4\/14\" data-toggle=\"tooltip\" title=\"Verifikasi PKS\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},
 //"kids":[
 //{"data":{"ID Realisasi":"33////1","Nama Pelaksana":"BUDI MULYANA","TGL Realisasi":"2020-06-01 00:00:00","Luas":"100","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-success\"\u003Everified \u003Cspan class=\"badge\"\u003EV\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/33\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/33\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[{"data":{"ID Produksi":"8","Nama Pelaksana":"BUDI MULYANA","TGL Produksi":"2020-08-30 00:00:00","Jumlah":"8000"},"kids":[]}]},
 //{"data":{"ID Realisasi":"34////2","Nama Pelaksana":"Budi Sudarsono","TGL Realisasi":"2020-06-01 00:00:00","Luas":"10","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/34\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/34\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[]},
 //{"data":{"ID Realisasi":"35////1","Nama Pelaksana":"Sento","TGL Realisasi":"2020-06-02 00:00:00","Luas":"10","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/35\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/35\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[]},
 //{"data":{"ID Realisasi":"36////1","Nama Pelaksana":"Apen","TGL Realisasi":"2020-06-02 00:00:00","Luas":"10","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/36\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/36\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[]},
 //{"data":{"ID Realisasi":"37////1","Nama Pelaksana":"Apay","TGL Realisasi":"2020-06-02 00:00:00","Luas":"10","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/37\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/37\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[]},
 //{"data":{"ID Realisasi":"38////1","Nama Pelaksana":"Yus Yunus","TGL Realisasi":"2020-06-02 00:00:00","Luas":"12","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/38\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/38\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[]},
 //{"data":{"ID Realisasi":"39////1","Nama Pelaksana":"Ajook","TGL Realisasi":"2020-06-02 00:00:00","Luas":"15","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/39\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/39\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[]}]}]},
 //{"data":{"Nama Perusahaan":"PT. Lumbung Makmur","Provinsi":"Jawa Barat","Kabupaten":"Kab. Subang","Kecamatan":" Cijambe","Desa":"Gunungtua","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E"},
 //"kids":[
 //{"data":{"ID PKS":"12","Nama Pelaksana":"Mustika Tani","Kabupaten":"Kab. Subang","Kecamatan":" Tanjungsiang","Desa":"Kawungluwuk", "Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-success\"\u003Everified \u003Cspan class=\"badge\"\u003EV\u003C\/span\u003E\u003C\/button\u003E", "Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi4\/12\" data-toggle=\"tooltip\" title=\"Verifikasi PKS\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[]},
 //{"data":{"ID PKS":"13","Nama Pelaksana":"Lumbung Makmur","Kabupaten":"Kab. Subang","Kecamatan":" Tanjungsiang","Desa":"Cimeuhmal", "Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-danger\"\u003EUnverified \u003Cspan class=\"badge\"\u003EX\u003C\/span\u003E\u003C\/button\u003E", "Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi4\/13\" data-toggle=\"tooltip\" title=\"Verifikasi PKS\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[]}]},
 //{"data":{"Nama Perusahaan":"Sedap Agro Makmur","Provinsi":"Dki Jakarta","Kabupaten":"Kota Jakarta Selatan","Kecamatan":" Pasar Minggu","Desa":"Pasar Minggu","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-success\"\u003Everified \u003Cspan class=\"badge\"\u003EV\u003C\/span\u003E\u003C\/button\u003E"},
 //"kids":[
 //{"data":{"ID PKS":"9","Nama Pelaksana":"Maju Jaya","Kabupaten":"Kab. Malang","Kecamatan":" Pujon","Desa":"Tawangsari", "Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-success\"\u003Everified \u003Cspan class=\"badge\"\u003EV\u003C\/span\u003E\u003C\/button\u003E", "Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi4\/9\" data-toggle=\"tooltip\" title=\"Verifikasi PKS\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},
 //"kids":[
 //{"data":{"ID Realisasi":"25////1","Nama Pelaksana":"Ardi","TGL Realisasi":"2020-02-12 00:00:00","Luas":"60","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-success\"\u003Everified \u003Cspan class=\"badge\"\u003EV\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/25\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/25\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[{"data":{"ID Produksi":"6","Nama Pelaksana":"Ardi","TGL Produksi":"2020-02-20 14:41:53","Jumlah":"600"},"kids":[]}]},
 //{"data":{"ID Realisasi":"26////2","Nama Pelaksana":"Dedi","TGL Realisasi":"2020-02-13 11:20:22","Luas":"25","Status":"\u003Cbutton type=\"button\" class=\"btn btn-xs btn-success\"\u003Everified \u003Cspan class=\"badge\"\u003EV\u003C\/span\u003E\u003C\/button\u003E", "Lihat":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/lihatrealisasi\/26\" data-toggle=\"tooltip\" title=\"Lihat Realisasi\" class=\"btn btn-xs btn-success\"\u003E\u003Ci class=\"fa fa-eye\"\u003E\u003C\/i\u003E\u003C\/a\u003E","Verifikasi":"\u003Ca href=\"http:\/\/localhost\/simethris\/apps\/verifikator\/createverifikasi2\/26\" data-toggle=\"tooltip\" title=\"Verifikasi Realisasi Tanam\" class=\"btn btn-xs btn-warning\"\u003E\u003Ci class=\"fa fa-pencil\"\u003E\u003C\/i\u003E\u003C\/a\u003E"},"kids":[{"data":{"ID Produksi":"7","Nama Pelaksana":"Dedi","TGL Produksi":"2020-03-23 14:45:06","Jumlah":"250"},"kids":[]}]}]}]}]; 
  var settings = {
  "iDisplayLength": 20,
  "bLengthChange": false,
  "bFilter": false,
  "bSort": false,
  "bInfo": false
};
	var table = new nestedTables.TableHierarchy("datatableku", dataInJson, settings);
	table.initializeTableHierarchy();
  </script>
</div>
<!-- ./wrapper -->

</body>
</html>
