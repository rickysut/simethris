<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="doc forms-doc page-layout simple full-width">
    <!-- Content Header (Page header) -->
	<!-- HEADER -->
    <div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
        <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
		<span><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?></span>
    </div>
	<div class="page-content p-3">
			<div class="row">
				<div class="col-12">
                    <div class="card">
						<div class="card-body">
							<form method="get" action="">
								<div class="form-row">
									<div class="form-group col-md-3">
										<select class="form-control" name="filter" id="filter">
											<option value="">Pilih</option>
											<option value="1">Per Tanggal</option>
											<option value="2">Per Bulan</option>
											<option value="3">Per Tahun</option>
										</select>
										<label for="filter" class="col-form-label">Filter Berdasarkan</label>
									</div>
									<div class="form-group col-md-3" id="form-tanggal">
										<input type="text" name="tanggal" class="input-tanggal" />
										<label for="tanggal" class="col-form-label">Tanggal</label>
									</div>
									
									<div class="form-group col-md-3" id="form-bulan">
										<select name="bulan">
											<option value="">Pilih</option>
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
										<label for="bulan" class="col-form-label">Bulan</label>
									</div>
									<div class="form-group col-md-3" id="form-tahun">
										<select name="tahun">
											<option value="">Pilih</option>
											<?php
											foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
												echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
											}
											?>
										</select>
										<label for="tahun" class="col-form-label">Tahun</label>
									</div>
								</div>
								<div class="form-row">
									<button type="submit" class="btn btn-primary"><i class="icon-eye"></i>Tampilkan</button>
									<a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="icon-loop"></i>Reset Filter</a>
								</div>
							</form>
							<hr />
							
							<b><?php echo $ket; ?></b><br /><br />
							<a href="<?php echo $url_cetak; ?>" class="btn btn-primary"><i class="icon-printer"></i>CETAK PDF</a><br /><br />

							<table border="1" cellpadding="8">
							<tr>
								<th>TGL RIPH</th>
								<th>Nama Perusahaan</th>
								<th>Nama Kontak</th>
								<th>Telp Kontak</th>
								<th>Telp Perusahaan</th>
								<th>Volume Pengajuan</th>
								<th>Kewajiban Tanam</th>
								<th>Kewajiban Produksi</th>
								<th>Realisasi Tanam</th>
								<th>Jumlah Produksi</th>
							</tr>
							<?php
							if( ! empty($transaksi)){
								$no = 1;
								foreach($transaksi as $data){
									$tgl = date('d-m-Y', strtotime($data->tgl_awal_riph));
									
									echo "<tr>";
									echo "<td>".$tgl."</td>";
									echo "<td>".$data->nama_perusahaan."</td>";
									echo "<td>".$data->nama_kontak."</td>";
									echo "<td>".$data->hp_kontak."</td>";
									echo "<td>".$data->telp_perusahaan."</td>";
									echo "<td>".$data->volume."</td>";
									echo "<td>".$data->kewajiban_tanam."</td>";
									echo "<td>".$data->kewajiban_produksi."</td>";
									echo "<td>".$data->luas_tanam."</td>";
									echo "<td>".$data->jmlproduksi."</td>";
									echo "</tr>";
									$no++;
								}
							}
							?>
							
							</table>
						</div>
					</div>
				</div>
		</div>
	</div>
	</div>
	</div>
	<?php $this->load->view('back/template/footer'); ?>
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>

</div>
</body>
</html>
