<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
	<div class="page-layout simple left-sidebar">
        <aside class="page-sidebar custom-scrollbar" data-fuse-bar="demo-sidebar" data-fuse-bar-media-step="md">
            <div class="demo-sidebar">
                <ul class="nav flex-column">
                    <li class="subheader">Administrator</li>
                    <li class="nav-item">
                         <a href="#Dashboard" class="nav-link">Dashboard</a>
						 <ul class="nav flex-column">
							<li class="nav-item"><a href="#Home" class="nav-link">Home</a></li>
							<li class="nav-item"><a href="#Pemetaan" class="nav-link">Pemetaan</a></li>
							<li class="nav-item"><a href="#DaftarLO" class="nav-link">Daftar L.O</a></li>
						 </ul>
                    </li>
					<md-divider></md-divider>
                    <li class="nav-item">
                        <a href="#Helpdesk" class="nav-link">Help Desk</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">File Manager</a>
						 <ul class="nav flex-column">
							<li class="nav-item"><a href="#Unggahan" class="nav-link">Unggahan</a></li>
							<li class="nav-item"><a href="#Unduhan" class="nav-link">Unduhan</a></li>
						 </ul>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Verifikator</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Data RIPH</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Laporan</a>
                    </li>
                </ul>
				<div class="toolbar-separator"></div>
				<ul class="nav flex-column">
                    <li class="subheader">Operator / L.O</li>
					<li class="nav-item">
                        <a href="#Registrasi" class="nav-link">Registrasi</a>
                    </li>
					<md-divider></md-divider>
                    <li class="nav-item">
                         <a href="#Dashboard" class="nav-link">Dashboard</a>
						 <ul class="nav flex-column">
							<li class="nav-item"><a href="#Home" class="nav-link">Home</a></li>
							<li class="nav-item"><a href="#Pemetaan" class="nav-link">Pemetaan</a></li>
							<li class="nav-item"><a href="#DaftarLO" class="nav-link">Daftar L.O</a></li>
						 </ul>
                    </li>
					<md-divider></md-divider>
                    <li class="nav-item">
                        <a href="#Helpdesk" class="nav-link">Help Desk</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">File Manager</a>
						 <ul class="nav flex-column">
							<li class="nav-item"><a href="#Unggahan" class="nav-link">Unggahan</a></li>
							<li class="nav-item"><a href="#Unduhan" class="nav-link">Unduhan</a></li>
						 </ul>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Verifikator</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Data RIPH</a>
                    </li>
					<md-divider></md-divider>
					<li class="nav-item">
                        <a class="nav-link">Laporan</a>
                    </li>
                </ul>
            </div>
        </aside>
		<div class="page-content-wrapper custom-scrollbar">
                            <!-- HEADER -->
            <div class="page-header bg-primary text-auto p-6">
                <div class="d-flex flex-row align-items-center">
					<button type="button" class="sidebar-toggle-button btn btn-icon d-block d-lg-none mr-2" data-fuse-bar-toggle="demo-sidebar">
                    <i class="icon icon-menu"></i></button>
					<span class="h4">User Guides simeTHRIS</span>
				</div>
            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
            <div class="page-content p-6">

                                <!-- DEMO CONTENT -->
                                <!-- DEMO CONTENT -->
                                <div class="demo-content" id="Dashboard">

                                    <h1>Dashboard</h1>

                                    <img src="./assets/images/userguides/dashboard1.png" class="w-100 mb-4" alt="Dashboar 1">

                                    <h4 class="secondary-text" id="Home">Menu Home</h4>

                                    <p>
                                        Pada Tabular Menu <b>Home</b> kita bisa mengetahui berbagai informasi dalam bentuk grafik/chart. lihat gambar Dashboar 1.
                                    </p>
									
									<img src="./assets/images/userguides/dashboard2.png" class="w-100 mb-4" alt="Dashboard 2">

                                    <h6 class="secondary-text">Keterangan Gambar</h6>
									<ul>
										<li><b>Tombol 1</b>, Berguna untuk mengetahui informasi detail dari Volume Import, Beban Tanam, Beban Produksi dan Perusahaan.</li>
										<li><b>Ket 1</b>, Adalah informasi RIPH yang di entry/input oleh Administrator untuk bahan Crosscheck</li>
										<li><b>Ket 2</b>, Adalah informasi RIPH yang di entry/input oleh Seluruh Importir.</li>
										<li><b>Ket 3</b>, Adalah informasi Persentase dari Jumlah seluruh PKS berbanding dengan jumlah PKS yang sudah diverifikasi, Persentasi dari Jumlah Realisasi tanam berbanding dengan Beban tanam dan Persentase dari Jumlah Produksi berbanding dengan Beban Produksi</li>
									</ul>

                                    <p>
                                        Selanjutnya adalah informasi tentanng jumlah Realisasi tanam dan Jumlah produksi yang dikemas dengan grafik / chart batang. Disini kita dapat mengetahui perkembangan realisasi tanam dan produksi dalam rentang waktu mingguan, Minggu sekarang, satu minggu sebelumnya dan dua minggu sebelumnya.
                                    </p>
									<img src="./assets/images/userguides/dashboard3.png" class="w-100 mb-4" alt="Dashboard 3">
                                    <p>
                                        Dan yang terakhir pada tabular menu home adalah progres Verifikasi, disini kita akan mengetahu progres tiap tahapan verifikasi.
                                    </p>
									<img src="./assets/images/userguides/dashboard4.png" class="w-100 mb-4" alt="Dashboard 4">
									<h4 class="secondary-text" id="Pemetaan">Pemetaan</h4>
									<img src="./assets/images/userguides/dashboard5.png" class="w-100 mb-4" alt="Dashboard 5">
                                    <p>
                                        Untuk mengetahui informasi detail, klik Penanda atau klik Polygon.
                                    </p>
									<p>
                                        Selanjutnya masih di Tabular Menu Pemetaan adalah Tabel Data Sebaran Bawang Putih. Pada tabel ini kita bisa melihat sekaligus eksport data baik itu ke File MS Excel, PDF atau dalam bentuk TEXT/CSV, dan untuk melakuknnya tinggal klik tombol <b>COPY</b>, <b>EXCEL</b>, <b>CSV</b> atau <b>PDF</b>. Tampilannya seperti gambar di bawah ini.
                                    </p>
									<img src="./assets/images/userguides/dashboard6.png" class="w-100 mb-4" alt="Dashboard 6">
									<h4 class="secondary-text" id="DaftarLO">Daftar L.O</h4>
                                    <p>
                                        Daftar L.O adalah Daftar pengguna aplikasi simeTHRIS. disini Administrator juga bisa melakukan aktifasi (Meng-Aktifkan atau Menonaktifkan) USER dengan mengklik Tombol ACTIVE
                                    </p>
									<img src="./assets/images/userguides/dashboard7.png" class="w-100 mb-4" alt="Dashboard 7">
                                    
                                </div>
								
								<div class="demo-content" id="Helpdesk">
									 <h1>Help Desk</h1>
                                    <img src="./assets/images/userguides/helpdesk1.png" class="w-100 mb-4" alt="sunrise">

                                   

                                    
                                    <p>
                                        Halaman ini berguna untuk berkomunikasi online antara user dengan Administrator 
                                    </p>

                                    
                                </div>

            </div>
                            <!-- / CONTENT -->
        </div>
    </div>
  
</div>
<?php $this->load->view('back/template/footer'); ?>

</div>
<!-- ./wrapper -->
</body>
</html>
