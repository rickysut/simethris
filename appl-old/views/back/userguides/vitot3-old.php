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
			<div class="page-header bg-primary text-auto p-6">
                <div class="d-flex flex-row align-items-center">
					<button type="button" class="sidebar-toggle-button btn btn-icon d-block d-lg-none mr-2" data-fuse-bar-toggle="demo-sidebar">
                    <i class="icon icon-menu"></i></button>
					<span class="h4">User Guides simeTHRIS</span>
				</div>
            </div>
			<div class="page-content p-6">
				<div class="row">
					<div class="card">
						<div class="card-header bg-info">
							Bagian 1
						</div>
						<div class="card-body bg-primary">
							<iframe width="300" height="200" src="https://www.youtube.com/embed/E_3R0LBq7DI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		
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

                                    <img src="./assets/images/userguides/dashboard1.png" class="w-100 mb-4" alt="Dashboar 1">

                                    <h1>Dashboard</h1>

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
									<img src="./assets/images/userguides/dashboard4.png" class="w-100 mb-4" alt="Dashboard 2">
									<h4 class="secondary-text" id="Pemetaan">Pemetaan</h4>
                                    <p>
                                        "How about if I sleep a little bit longer and forget all this nonsense", he thought, but that was something he was unable to do because he was used to sleeping on his right, and in his present state couldn't get into that position. However hard he threw
                                        himself onto his right, he always rolled back to where he was.
                                    </p>

                                    <p>
                                        He must have tried it a hundred times, shut his eyes so that he wouldn't have to look at the floundering legs, and only stopped when he began to feel a mild, dull pain there that he had never felt before. "Oh, God", he thought, "what a strenuous career
                                        it is that I've chosen!
                                    </p>
									<h4 class="secondary-text" id="DaftarLO">Daftar L.O</h4>
                                    <p>
                                        Travelling day in and day out. Doing business like this takes much more effort than doing your own business at home, and on top of that there's the curse of travelling, worries about making train connections, bad and irregular food, contact with different
                                        people all the time so that you can never get to know anyone or become friendly with them.
                                    </p>

                                    <p>
                                        "He felt a slight itch up on his belly; pushed himself slowly up on his back towards the headboard so that he could lift his head better; found where the itch was, and saw that it was covered with lots of little white spots which he didn't know what to
                                        make of; and when he tried to feel the place with one of his legs he drew it quickly back because as soon as he touched it he was overcome by a cold shudder. He slid back into his former position.
                                    </p>

                                    <p>
                                        "Getting up early all the time", he thought, "it makes you stupid. You've got to get enough sleep. Other travelling salesmen live a life of luxury. For instance, whenever I go back to the guest house during the morning to copy out the contract, these
                                        gentlemen are always still sitting there eating their breakfasts. I ought to just try that with my boss; I'd get kicked out on the spot. But who knows, maybe that would be the best thing for me...
                                    </p>
                                </div>
								
								<div class="demo-content" id="Helpdesk">

                                    <img src="./assets/images/userguides/helpdesk1.png" class="w-100 mb-4" alt="sunrise">

                                    <h1>Help Desk</h1>

                                    <h4 class="secondary-text">Demo Content</h4>

                                    <p>
                                        One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches
                                        into stiff sections.
                                    </p>

                                    <blockquote>

                                        <p>
                                            The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.
                                        </p>

                                        <footer>
                                            John Doe
                                        </footer>

                                    </blockquote>

                                    <p>
                                        His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently
                                        cut out of an illustrated magazine and housed in a nice, gilded frame.
                                    </p>

                                    <p>
                                        It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting
                                        the pane, which made him feel quite sad.
                                    </p>

                                    <p>
                                        "How about if I sleep a little bit longer and forget all this nonsense", he thought, but that was something he was unable to do because he was used to sleeping on his right, and in his present state couldn't get into that position. However hard he threw
                                        himself onto his right, he always rolled back to where he was.
                                    </p>

                                    <p>
                                        He must have tried it a hundred times, shut his eyes so that he wouldn't have to look at the floundering legs, and only stopped when he began to feel a mild, dull pain there that he had never felt before. "Oh, God", he thought, "what a strenuous career
                                        it is that I've chosen!
                                    </p>

                                    <p>
                                        Travelling day in and day out. Doing business like this takes much more effort than doing your own business at home, and on top of that there's the curse of travelling, worries about making train connections, bad and irregular food, contact with different
                                        people all the time so that you can never get to know anyone or become friendly with them.
                                    </p>

                                    <p>
                                        "He felt a slight itch up on his belly; pushed himself slowly up on his back towards the headboard so that he could lift his head better; found where the itch was, and saw that it was covered with lots of little white spots which he didn't know what to
                                        make of; and when he tried to feel the place with one of his legs he drew it quickly back because as soon as he touched it he was overcome by a cold shudder. He slid back into his former position.
                                    </p>

                                    <p>
                                        "Getting up early all the time", he thought, "it makes you stupid. You've got to get enough sleep. Other travelling salesmen live a life of luxury. For instance, whenever I go back to the guest house during the morning to copy out the contract, these
                                        gentlemen are always still sitting there eating their breakfasts. I ought to just try that with my boss; I'd get kicked out on the spot. But who knows, maybe that would be the best thing for me...
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
