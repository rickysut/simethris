<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
	<?php 
		$chartRW = array();$jmlR = array();$jmlverif =0;$jmlunverif =0;$jmlchartPKS=0;$jmlverifw1 =0;$jmlunverifw1 =0;$jmlchartPKSw1=0;$jmlverifw2=0;$jmlunverifw2=0;$jmlchartPKSw2=0;
		$jmlchartrealisasi=0;$jmlchartrealisasiw1=0;$jmlchartrealisasiw2=0;$jmlchartproduksi=0;$jmlchartproduksiw1=0;$jmlchartproduksiw2=0;
		$jmlbrealisasi=0;$jmlbrealisasiw1=0;$jmlbrealisasiw2=0;$jmlbproduksi=0;$jmlbproduksiw1=0;$jmlbproduksiw2=0;
		$hari[1] = "Sen";$hari[2] = "Sel";$hari[3] = "Rab";$hari[4] = "Kam";$hari[5] = "Jum";$hari[6] = "Sab";$hari[7] = "Min";
		foreach($get_chart_beban as $getchartbeban){if (is_null($getchartbeban->bebantanam)){$jmlbrealisasi=0;}else{$jmlbrealisasi=$getchartbeban->bebantanam;}
		if (is_null($getchartbeban->bebanproduksi)){$jmlbproduksi=0;}else{$jmlbproduksi=$getchartbeban->bebanproduksi;}}
		foreach($get_chart_beban_w1 as $getchartbebanw1){if (is_null($getchartbebanw1->bebantanam)){$jmlbrealisasiw1=0;}else{$jmlbrealisasiw1=$getchartbebanw1->bebantanam;}
		if (is_null($getchartbebanw1->bebanproduksi)){$jmlbproduksiw1=0;}else{$jmlbproduksiw1=$getchartbebanw1->bebanproduksi;}}
		foreach($get_chart_beban_w2 as $getchartbebanw2){if (is_null($getchartbebanw2->bebantanam)){$jmlbrealisasiw2=0;}else{$jmlbrealisasiw2=$getchartbebanw2->bebantanam;}
		if (is_null($getchartbebanw2->bebanproduksi)){$jmlbproduksiw2=0;}else{$jmlbproduksiw2=$getchartbebanw2->bebanproduksi;}}
		foreach($get_chart_jmlrealisasi as $getchartrealisasi){if (is_null($getchartrealisasi->jumlah_realisasi)){$jmlchartrealisasi=0;}else{$jmlchartrealisasi=$getchartrealisasi->jumlah_realisasi;}}
		foreach($get_chart_jmlrealisasi_w1 as $getchartrealisasiw1){if (is_null($getchartrealisasiw1->jumlah_realisasi)){$jmlchartrealisasiw1=0;}else{$jmlchartrealisasiw1=$getchartrealisasiw1->jumlah_realisasi;}}
		foreach($get_chart_jmlrealisasi_w2 as $getchartrealisasiw2){if (is_null($getchartrealisasiw2->jumlah_realisasi)){$jmlchartrealisasiw2=0;}else{$jmlchartrealisasiw2=$getchartrealisasiw2->jumlah_realisasi;}}		
		foreach($get_chart_jmlproduksi as $getchartproduksi){if (is_null($getchartproduksi->jumlah_produksi)){$jmlchartproduksi=0;}else{$jmlchartproduksi=$getchartproduksi->jumlah_produksi;}}
		foreach($get_chart_jmlproduksi_w1 as $getchartproduksiw1){if (is_null($getchartproduksiw1->jumlah_produksi)){$jmlchartproduksiw1=0;}else{$jmlchartproduksiw1=$getchartproduksiw1->jumlah_produksi;}}
		foreach($get_chart_jmlproduksi_w2 as $getchartproduksiw2){if (is_null($getchartproduksiw2->jumlah_produksi)){$jmlchartproduksiw2=0;}else{$jmlchartproduksiw2=$getchartproduksiw2->jumlah_produksi;}}	
		foreach($get_chart_realisasi as $chartRealisasiM){
			$harike = intval($chartRealisasiM->harike);
			for($i = 1; $i < 8; $i++){
				if ($i == $harike) {
					$datadmp = array("x" => $hari[$i],"y" => number_format($chartRealisasiM->jumlah_tanam,0));
					array_push($chartRW, $datadmp);
				}
				else
				{
					$datadmp = array("x" => $hari[$i],"y" => 0);
					array_push($chartRW, $datadmp);
				}
			}
		}
		$jsonchartRW = json_encode($chartRW, true);
		
		$chartPW = array();
		foreach($get_chart_produksi as $chartProduksiM){
			$harike = intval($chartProduksiM->harike);
			$jmlP[$chartProduksiM->harike] = $chartProduksiM->jumlah_produksi;
			for($i = 1; $i < 8; $i++){
				if ($i == $harike) {
					array_push($chartPW, array("x" => $hari[$i],"y" => number_format($jmlP[$i],0)));
				}
				else
				{
					array_push($chartPW, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$jsonchartPW = json_encode($chartPW, true);
		
		$chartRW1 = array();
		foreach($get_chart_realisasi_w1 as $chartRealisasiM1){
			$harikew1 = intval($chartRealisasiM1->harike);
			$jmlRw1[$chartRealisasiM1->harike] = $chartRealisasiM1->jumlah_tanam;
			for($i = 1; $i < 8; $i++){
				if ($i == $harikew1) {
					array_push($chartRW1, array("x" => $hari[$i],"y" => $jmlRw1[$i]));
				}
				else
				{
					array_push($chartRW1, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$jsonchartRW1 = json_encode($chartRW1, true);
		
		$chartPW1 = array();
		foreach($get_chart_produksi_w1 as $chartProduksiM1){
			$hariP1ke = intval($chartProduksiM1->harike);
			$jmlP1[$chartProduksiM1->harike] = $chartProduksiM1->jumlah_produksi;
			for($i = 1; $i < 8; $i++){
				if ($i == $hariP1ke) {
					array_push($chartPW1, array("x" => $hari[$i],"y" => $jmlP1[$i]));
				}
				else
				{
					array_push($chartPW1, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$jsonchartPW1 = json_encode($chartPW1, true);
		///-----
		$chartRW2 = array();
		foreach($get_chart_realisasi_w2 as $chartRealisasiM2){
			$harikew2 = intval($chartRealisasiM2->harike);
			$jmlRw2[$chartRealisasiM2->harike] = $chartRealisasiM2->jumlah_tanam;
			for($i = 1; $i < 8; $i++){
				if ($i == $harikew2) {
					array_push($chartRW2, array("x" => $hari[$i],"y" => $jmlRw2[$i]));
				}
				else
				{
					array_push($chartRW2, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$jsonchartRW2 = json_encode($chartRW2, true);
		
		$chartPW2 = array();
		foreach($get_chart_produksi_w2 as $chartProduksiM2){
			$hariP2ke = intval($chartProduksiM2->harike);
			$jmlP2[$chartProduksiM2->harike] = $chartProduksiM2->jumlah_produksi;
			for($i = 1; $i < 8; $i++){
				if ($i == $hariP2ke) {
					array_push($chartPW2, array("x" => $hari[$i],"y" => $jmlP2[$i]));
				}
				else
				{
					array_push($chartPW2, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$jsonchartPW2 = json_encode($chartPW2, true);
	?>
	
	<?php
		$tampilPersentaseproduksi ="";
		$tampilPersentasetanam ="";
		if(is_null($get_jml_tanam->jmltanam)){
			$getRealTanam = 0;
		}else{
			$getRealTanam = intval($get_jml_tanam->jmltanam);
		};
		if(is_null($get_jml_beban_tanam->jmlbeban)){
			$getBebanTanam = 0;
		}else{
			$getBebanTanam = intval($get_jml_beban_tanam->jmlbeban);
		};
		if(is_null($get_jml_beban_produksi->jmlbeban)){
			$jbebanProduksi=0;
			$getjmlBebanProduksi = 0;
		}else{
			$jbebanProduksi = intval($get_jml_beban_produksi->jmlbeban);
			$getjmlBebanProduksi = intval($get_jml_beban_produksi->jmlbeban);
		}
		if(is_null($get_jml_produksi->jmlproduksi)){
			$getjmlProduksi = 0;
		}
		else
		{
			$getjmlProduksi = intval($get_jml_produksi->jmlproduksi);
		}
		$PersentaseTanam = ($getRealTanam!=0)?@($getRealTanam/$getBebanTanam)*100:0;
		$PersentaseProduksi = ($getjmlProduksi!=0)?@($getjmlProduksi/$getjmlBebanProduksi)*100:0;
		if($PersentaseTanam != 0){
			$tampilPersentasetanam = round($PersentaseTanam,0,PHP_ROUND_HALF_UP)." %";
		}else{
			$tampilPersentasetanam = "Belum Ada Penanaman";
		} 
		if($PersentaseProduksi != 0){
			$tampilPersentaseproduksi = round($PersentaseProduksi,0,PHP_ROUND_HALF_UP)." %";
		}else{
			$tampilPersentaseproduksi = "Belum Ada Produksi";
		} 
	?>
	<?php foreach($get_all_pengumuman as $pengumuman){
		$JudulPengumuman = $pengumuman->judul;
		$IsiPengumuman = $pengumuman->pengumuman;
	}
	?>

                    <div id="project-dashboard" class="page-layout simple right-sidebar">

                        <div class="page-content-wrapper custom-scrollbar">

                            <!-- HEADER -->
                            <div class="page-header bg-primary text-auto d-flex flex-column justify-content-between px-6 pt-4 pb-0">

                                <div class="row no-gutters align-items-start justify-content-between flex-nowrap">
									<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                                    <div>
                                        <span class="h2">Welcome back, <?php echo $this->session->name ?>!</span>
                                    </div>

                                    <button type="button" class="sidebar-toggle-button btn btn-icon d-block d-xl-none" data-fuse-bar-toggle="dashboard-project-sidebar" aria-label="Toggle sidebar">
                                        <i class="icon icon-menu"></i>
                                    </button>
                                </div>

                                <div class="row no-gutters align-items-center project-selection">

                                    <div class="selected-project h6 px-4 py-2">simeTHRIS. Backend App</div>

                                    <div class="project-selector">
                                        <button type="button" class="btn btn-icon">
                                            <i class="icon icon-dots-horizontal"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
                            <div class="page-content">
								<div class="col-12 p-3">
									<div class="card border-secondary mb-3">
										<div class="card-header text-secondary">
											<?php echo $JudulPengumuman; ?>
										</div>
										<div class="card-body text-secondary">
											<?php echo $IsiPengumuman; ?>
										</div>
									</div>
								</div>

                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="budget-summary-tab" data-toggle="tab" href="#budget-summary-tab-pane" role="tab" aria-controls="budget-summary-tab-pane">Pemetaan</a>
                                    </li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">

                                        <!-- WIDGET GROUP -->
                                        <div class="widget-group row no-gutters">

                                            <!-- WIDGET 1 -->
                                            <div class="col-12 col-sm-6 col-xl-4 p-3">

                                                <div class="widget widget1 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <span class="h6">Volume RIPH</span>


                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
														<span class="text-muted"><?php echo date('d-m-Y h:i:s') ?></span>
                                                        <div class="title text-secondary"><?php echo number_format($get_jml_import->vimport, 0, ".", ".") ?></div><span><sup style="font-size: 10px"> Ton</sup></span>

                                                    </div>

                                                    <div class="widget-footer p-4 bg-light row no-gutters align-items-center">

                                                        <span class="text-muted"></span>

                                                        <span class="ml-2"></span>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 1 -->

                                            <!-- WIDGET 2 -->
                                            <div class="col-12 col-sm-6 col-xl-4 p-3">

                                                <div class="widget widget3 card">

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
                                                        
															<div id="donut-chart2">
																<svg></svg>
																<div style="text-align:center"><span class="text-muted">Realisasi Tanam : </span>
														<span class="ml-2"><?php echo $getRealTanam ?> Ha</span></div>
																<div style="text-align:center"><span class="text-muted">Beban Tanam : </span>
														<span class="ml-2"><?php echo $getBebanTanam ?> Ha</span></div>
															</div>	
													</div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 2 -->

                                            <!-- WIDGET 3 -->
                                            <div class="col-12 col-sm-6 col-xl-4 p-3">

                                                <div class="widget widget3 card">


													<div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
														
															<div id="donut-chart3">
																<svg></svg>
																
															<div style="text-align:center"><span class="text-muted">Realisasi Produksi : </span>
															<span class="ml-2"><?php echo $getjmlProduksi ?> Ton</span></div>
															<div style="text-align:center"><span class="text-muted">Beban Produksi : </span>
															<span class="ml-2"><?php echo $getjmlBebanProduksi ?> Ton</span></div>
															</div>	
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 3 -->

                                            <!-- WIDGET 4 -->
                                            
                                            <!-- / WIDGET 4 -->

                                            <!-- WIDGET 5 -->
                                            <div class="col-12 p-3">

                                                <div class="widget widget5 card">

                                                    <div class="widget-header px-4 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Realisasi & Produksi</span>
                                                        </div>

                                                        <div>

                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="TW">
                                                                Minggu  Ini
                                                            </button>

                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="LW">
                                                                Minggu Lalu
                                                            </button>

                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="2W">
                                                                2 Minggu Lalu
                                                            </button>

                                                        </div>
                                                    </div>

                                                    <div class="widget-content p-4">

                                                        <div class="row">

                                                            <div class="col-12 col-lg-6">

                                                                <div id="widget5-main-chart">
                                                                    <svg></svg>
                                                                </div>

                                                            </div>

                                                            <div class="col-12 col-lg-6">

                                                                <div id="widget5-supporting-charts" class="row">

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-pks-chart">
                                                                            <div class="h6 text-muted">PKS</div>
                                                                            <div class="h2 count"><?php echo intval($jmlchartPKS); ?></div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-pksterverifikasi-chart">
                                                                            <div class="h6 text-muted">TERVERIFIKASI</div>
                                                                            <div class="h2 count"><?php echo intval($jmlverif); ?></div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-realisasi-chart">
                                                                            <div class="h6 text-muted">REALISASI</div>
                                                                            <div class="h2 count"><?php echo intval($jmlchartrealisasi); ?></div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-beban-tanam-chart">
                                                                            <div class="h6 text-muted">BEBAN TANAM</div>
                                                                            <div class="h2 count"><?php echo intval($jmlbrealisasi); ?></div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-produksi-chart">
                                                                            <div class="h6 text-muted">PRODUKSI</div>
                                                                            <div class="h2 count"><?php echo intval($jmlchartproduksi); ?></div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-beban-produksi-chart">
                                                                            <div class="h6 text-muted">BEBAN PRODUKSI</div>
                                                                            <div class="h2 count"><?php echo intval($jmlbproduksi); ?></div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 5 -->
											
											<div class="col-12 p-3">

                                                <div class="widget widget5 card">

                                                    <div class="widget-header px-4 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Progress Verifikasi</span>
                                                        </div>
                                                    </div>

                                                    <div class="widget-content p-4">

                                                        <div class="row">

                                                            <div class="widget-content table-responsive">

                                                                <table id="dataTable" class="table table-striped table-bordered dt-responsive">
																  <thead>
																	<tr>
																	  <!-- <th style="text-align: center"></th> -->
																	  <th style="text-align: center;background-color:#03a9f4;vertical-align:middle"><font color="white">NO</th>
																	  <th style="text-align: center;background-color:#03a9f4;vertical-align:middle"><font color="white">Nama Perusahaan</th>
																	  <th style="text-align: center;background-color:#03a9f4;vertical-align:middle"><font color="white">No. RIPH</th>
																	  <th style="text-align: center;background-color:#03a9f4"><font color="white">Tahap 1 <br><sup style="font-size: 10px">(Pengajuan)</sup></th>
																	  <th style="text-align: center;background-color:#03a9f4"><font color="white">Tahap 2 <br><sup style="font-size: 10px">(Verif Tanam)</sup></th>
																	  <th style="text-align: center;background-color:#03a9f4"><font color="white">Tahap 3 <br><sup style="font-size: 10px">(verif Produksi)</sup></th>
																	  <th style="text-align: center;background-color:#03a9f4"><font color="white">Tahap 4 <br><sup style="font-size: 10px">(Ket. Lunas)</sup></th>
																	  <th style="text-align: center;background-color:#03a9f4"><font color="white">Tahapan <br><sup style="font-size: 10px">Status</sup></th>
																	</tr>
																  </thead>
																  <tbody>
																	<?php $no = 1; foreach($get_all_cpclc as $user){
																	?>
																	
																	  <tr>
																		<!-- <td style="text-align: center" class="details-control"></td> -->
																		<td style="text-align: center"><?php echo $no++ ?></td>
																		<td style="text-align: left"><?php echo $user->nama_perusahaan ?></td>
																		<td style="text-align: left"><?php echo $user->nomor_riph ?></td>
																		<?php if($user->ststahap1 == '1'){$gaya1='style="text-align: center;background-color:forestgreen"';$myicon='<i class="icon icon-check-circle-outline"></i>';$tahap=1;$statusna=true;}
																		else if($user->ststahap1 == '2'){$gaya1='style="text-align: center;background-color:darkorange"';$myicon='<i class="icon icon-triangle-outline"></i>';$tahap=1;$statusna=false;}
																		else if($user->ststahap1 == '3'){$gaya1='style="text-align: center;background-color:red"';$myicon='<i class="icon-close-circle-outline"></i>';$tahap=1;$statusna=false;}
																		else if($user->ststahap1 == '0'){$gaya1='style="text-align: center;background-color:#03A9F4"';$myicon='<i class="icon icon-timer-sand"></i>';$tahap=1;$statusna=false;}
																		else{$gaya1='style="text-align: center;background-color:white"';$myicon='<i class=""></i>';$tahap=1;$statusna=false;}
																		?>
																		<td <?php echo $gaya1 ?>><font color="white"><?php if(!is_null($user->tgl_aju_verif_th1)){echo $myicon.' '.date("d-m-Y",strtotime($user->tgl_aju_verif_th1));} ?><br><sup style="font-size: 10px"><?php if(!is_null($user->tgl_aju_verif_th1)){echo date("H:i:s",strtotime($user->tgl_aju_verif_th1));} ?></sup></td>
																		<?php if($user->ststahap2 == '1'){$gaya2='style="text-align: center;background-color:forestgreen"';$myicon='<i class="icon icon-check-circle-outline"></i>';$tahap=2;$statusna=true;}
																		else if($user->ststahap2 == '2'){$gaya2='style="text-align: center;background-color:darkorange"';$myicon='<i class="icon icon-triangle-outline"></i>';$tahap=1;$statusna=false;}
																		else if($user->ststahap2 == '3'){$gaya2='style="text-align: center;background-color:red"';$myicon='<i class="icon-close-circle-outline"></i>';$tahap=1;$statusna=false;}
																		else if($user->ststahap2 == '0'){$gaya2='style="text-align: center;background-color:#03A9F4"';$myicon='<i class="icon icon-timer-sand"></i>';$tahap=1;$statusna=false;}
																		else{$gaya2='style="text-align: center;background-color:white"';$myicon='<i class=""></i>';$tahap=1;$statusna=false;}
																		?>
																		<td <?php echo $gaya2 ?>><font color="white"><?php if(!is_null($user->tgl_aju_verif_th2)){echo $myicon.' '.date("d-m-Y",strtotime($user->tgl_aju_verif_th2));} ?><br><sup style="font-size: 10px"><?php if(!is_null($user->tgl_aju_verif_th2)){echo date("H:i:s",strtotime($user->tgl_aju_verif_th2));} ?></sup></td>
																		<?php if($user->ststahap3 == '1'){$gaya3='style="text-align: center;background-color:forestgreen"';$myicon='<i class="icon icon-check-circle-outline"></i>';$tahap=3;$statusna=true;}
																		else if($user->ststahap3 == '2'){$gaya3='style="text-align: center;background-color:darkorange"';$myicon='<i class="icon icon-triangle-outline"></i>';$tahap=2;$statusna=false;}
																		else if($user->ststahap3 == '3'){$gaya3='style="text-align: center;background-color:red"';$myicon='<i class="icon-close-circle-outline"></i>';$tahap=2;$statusna=false;}
																		else if($user->ststahap3 == '0'){$gaya3='style="text-align: center;background-color:#03A9F4"';$myicon='<i class="icon icon-timer-sand"></i>';$tahap=2;$statusna=false;}
																		else{$gaya3='style="text-align: center;background-color:white"';$myicon='<i class=""></i>';$tahap=2;$statusna=false;}
																		?>
																		<td <?php echo $gaya3 ?>><font color="white"><?php if(!is_null($user->tgl_aju_verif_th3)){echo $myicon.' '.date("d-m-Y",strtotime($user->tgl_aju_verif_th3));} ?><br><sup style="font-size: 10px"><?php if(!is_null($user->tgl_aju_verif_th3)){echo date("H:i:s",strtotime($user->tgl_aju_verif_th3));} ?></sup></td>
																		<?php if($user->ststahap4 == '1'){$gaya4='style="text-align: center;background-color:forestgreen"';$myicon='<i class="icon icon-check-circle-outline"></i>';$tahap=4;$statusna=true;}
																		else if($user->ststahap4 == '0'){$gaya4='style="text-align: center;background-color:#03A9F4"';$myicon='<i class="icon icon-timer-sand"></i>';$tahap=3;$statusna=false;}
																		else{$gaya4='style="text-align: center;background-color:white"';$myicon='<i class=""></i>';$tahap=3;$statusna=false;}
																		?>
																		<td <?php echo $gaya4 ?>><font color="white"><?php echo $myicon; ?></td>
																		<?php if($statusna and $tahap=3){$gaya='style="text-align: center;background-color:forestgreen"';$tahapan=$tahap;}
																			else if($statusna and $tahap=2){$gaya='style="text-align: center;background-color:forestgreen"';$tahapan=$tahap;}
																			else if($statusna and $tahap=1){$gaya='style="text-align: center;background-color:forestgreen"';$tahapan=$tahap;}
																			else{$tahapan=$tahap-1;
																			if($tahapan=1){$gaya=$gaya1;}
																			else if($tahapan=2){$gaya=$gaya2;}
																			else if($tahapan=3){$gaya=$gaya3;}
																			else if($tahapan=4){$gaya=$gaya3;}
																			}
																		?>
																		<td <?php echo $gaya ?>><font color="white"><h4><?php echo $tahapan ?></h4></td>
																	  </tr>
																	<?php } ?>
																  </tbody>
																  <tfoot>
																	<tr>
																	  <!-- <th style="text-align: center"></th> 
																	  <th style="text-align: center">No</th>
																	  <th style="text-align: center">Rencana Tanam</th>
																	  <th style="text-align: center">Type Kelola</th>
																	  <th style="text-align: center">Nama Pengelola/Poktan</th>
																	  <th style="text-align: center">Provinsi</th>
																	  <th style="text-align: center">Kabupaten</th>
																	  <th style="text-align: center">Kecamatan</th>
																	  <th style="text-align: center">Status</th>-->
																	</tr>
																  </tfoot>
																</table>
															
                                                            </div>
                                                        </div>
														
                                                    </div>
													<div class="widget-content p-4">
														<div class="form-row">
															<div class="col-sm-3 col-xs-6 text-white">
															<div style="background:forestgreen; text-align: center;">
															  <div class="description-block border-right">
																<span class="description-percentage text-white"><i class="icon icon-check-circle-outline text-white"></i></span>
																<span class="description-text">TERVERIFIKASI</span>
															  </div>
															  </div>
															</div>
															
															<div class="col-sm-3 col-xs-6 text-white">
															  <div style="background:darkorange; text-align: center;">
															  <div class="description-block border-right">
																<span class="description-percentage text-white"><i class="icon icon-triangle-outline text-white"></i></span>
																<span class="description-text">PENDING</span>
															  </div>
															  </div>
															  
															</div>
															
															<div class="col-sm-3 col-xs-6 text-white">
															  <div style="background:red; text-align: center;">
															  <div class="description-block border-right">
																<span class="description-percentage"><i class="icon icon-close-circle-outline text-white"></i></span>
																<span class="description-text">DITOLAK</span>
															  </div>
															 </div>
															</div>
															
															<div class="col-sm-3 col-xs-6 text-white">
															  <div style="background:#03A9F4; text-align: center;">
															  <div class="description-block border-right">
																<span class="description-percentage"><i class="icon icon-timer-sand text-white"></i></span>
																<span class="description-text">DALAM PROSES</span>
															  </div>
															</div> 
															</div>
														  </div>
													</div>
                                                </div>
                                            </div>
											
                                        </div>
                                        <!-- / WIDGET GROUP -->
                                    </div>
                                    <div class="tab-pane fade p-3" id="budget-summary-tab-pane" role="tabpanel" aria-labelledby="budget-summary-tab">

                                        <!-- WIDGET GROUP -->
                                        <div class="widget-group row no-gutters">

                                            <!-- WIDGET 8 -->
                                            <div class="col-12 p-3">

                                                <div class="widget widget8 card">

                                                    <div class="widget-header px-4 row no-gutters align-items-center justify-content-between">
                                                        <div class="col">
                                                            <span class="h6">Pemetaan</span>
                                                        </div>
                                                    </div>

                                                    <div class="card-body">
														<?php 
																		$allmarker=array();
																		foreach($myMarker as $usermarker){
																		$myinfo = '<b>'.$usermarker->nama_perusahaan.'</b><br>Luas Tanam : '.$usermarker->luas_realisasi_tanam.' Ha<br>Pengelola : '.$usermarker->namapengelola.'<br>Alamat : '.$usermarker->nama_kab.' Kec. '.$usermarker->nama_kec.' Desa '.$usermarker->nama_des;
																		$allmarker[] = array($myinfo,$usermarker->atitude,$usermarker->latitude,$usermarker->is_active,$usermarker->is_produksi);
																		}
																		$json_array_marker = json_encode($allmarker);
																	?>
																	<?php 
																		$allpoly=array();$allinfo=array();
																		foreach($polygonKu as $user){
																		$allpoly[] = $user->realisasi_polygon;
																		$allinfo[] = 'Perusahaan : <b>'.$user->nama_perusahaan.'</b><br>Pengelolaan : '.$user->namapengelola.' <br>Pelaksana/Petani : '.$user->nama_pelaksana.'<br>Luas : '.$user->luas_realisasi_tanam.' Ha<br>Alamat : '.$user->nama_prov.'-'.$user->nama_kab.'-'.$user->nama_kec.'-'.$user->nama_des;
																		}
																		$json_array = json_encode($allpoly);
																		$json_arrayinfo = json_encode($allinfo);
																	?>
																	
																	<div id="map-canvas" style="width:100%;height:380px;"></div> 
																	<div class="btn-group" role="group" aria-label="Basic example">
																		<button type="button" class="btn "><span><img src="./assets/icons/myiconrencana.ico" width="16px"> Tanam</span></button>
																		<button type="button" class="btn "><span><img src="./assets/icons/myiconproduksi.ico" width="16px"> Produksi</span></button>
																		<button type="button" class="btn "><span><img src="./assets/icons/myiconnotactive.ico" width="16px"> Tidak Aktif</span></button>
																	</div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 8 -->

                                            <!-- WIDGET 10 -->
                                            <div class="col-12 p-3">

                                                <div class="widget widget10 card">

                                                    
                                                </div>
                                            </div>
                                            <!-- / WIDGET 10 -->
                                        </div>
                                        <!-- / WIDGET GROUP -->
                                    </div>
                                </div>

                            </div>
                            <!-- / CONTENT -->

                        </div>

                        <aside class="page-sidebar custom-scrollbar" data-fuse-bar="dashboard-project-sidebar" data-fuse-bar-media-step="lg" data-fuse-bar-position="right">
                            <!-- WIDGET GROUP -->
                            <div class="widget-group">
								<div class="widget widget-logo">
										<div class="user-info flex-column row flex-lg-row align-items-center no-gutters pl-4 py-8">
											<img style="position: relative; display: inline-block; left: 50%; transform: translate(-50%);" class="profile-image avatar huge mr-6" src="<?php echo $this->session->logo_perusahaan ?>" width="150px">
										</div>
									
								</div>
                                <!-- NOW WIDGET -->
                                <div class="widget widget-now">

                                    <div class="widget-header row no-gutters align-items-center justify-content-between pl-4 py-4">

                                        <div class="h6"><?php
											$tgl=date('d-m-Y');
											$bln=date('mm');
											$thn=date('Y');
											$tgls=date('d');
											$day = date('D', strtotime($tgl));
											$dayList = array(
												'Sun' => 'Minggu',
												'Mon' => 'Senin',
												'Tue' => 'Selasa',
												'Wed' => 'Rabu',
												'Thu' => 'Kamis',
												'Fri' => 'Jumat',
												'Sat' => 'Sabtu'
											);
											 $bulan = array(
											'01' => 'JANUARI',
											'02' => 'FEBRUARI',
											'03' => 'MARET',
											'04' => 'APRIL',
											'05' => 'MEI',
											'06' => 'JUNI',
											'07' => 'JULI',
											'08' => 'AGUSTUS',
											'09' => 'SEPTEMBER',
											'10' => 'OKTOBER',
											'11' => 'NOVEMBER',
											'12' => 'DESEMBER',
											);
											echo $dayList[$day].", ".$tgl;
										?></div>

                                        <button type="button" class="btn btn-icon" aria-label="Options">
                                            <i class="icon icon-dots-vertical"></i>
                                        </button>
                                    </div>

                                    <div class="widget-content d-flex flex-column align-items-center justify-content-center p-4 pb-6">
                                        <div class="month text-muted"><?php echo $bulan[date('m')] ?></div>
                                        <div class="day text-muted"><?php echo $tgls ?></div>
                                        <div class="year text-muted"><?php echo $thn ?></div>
                                    </div>

                                </div>
                                <!-- / NOW WIDGET -->

                                <div class="divider"></div>

                                <!-- WEATHER WIDGET -->
                                <div class="widget widget-weather">
                                    <div id="jam-digital">
										<div id="hours"><p id="jam"></p></div>
										<div id="minute"><p id="menit"></p></div>
										<div id="second"><p id="detik"></p></div>
									</div>
                                </div>
                                <!-- / WEATHER WIDGET -->

                                <div class="divider"></div>
                            </div>
                            <!-- / WIDGET GROUP -->
                        </aside>
                    </div>


                </div>
                

  <?php $this->load->view('back/template/footer'); ?>

	</div>
            <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
            </div>

        </div>
    </main>
	<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyCmByxQYKyC_hhkkoSFCiWM_0TwQjGckLs"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables/Buttons-1.6.2/css/buttons.dataTables.min.css">
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/JSZip-2.5.0/jszip.min.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/Buttons-1.6.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript">
		$.extend( true, $.fn.dataTable.defaults, {
		"searching": false,
		"ordering": false
		} );
		 
		 
		$(document).ready(function() {
			$('#dataTable').DataTable({
			"responsive": true,
			"scrollY": 250,
			"scrollX": true,
			"dom": "Btif"
			});
		});
	</script>
	<script type="text/javascript">
	var map;
	var infoWindow;
	var decodedPolygon = [];
	
	function initialize() {
		var mapOptions = {
			zoom: 5,
			center: new google.maps.LatLng(-0.789275, 113.92132700000002),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: [
			  {"elementType": "geometry","stylers": [{"color": "#212121"}]},
			  {"elementType": "labels.icon","stylers": [{"visibility": "off"}]},
			  {"elementType": "labels.text.fill","stylers": [{"color": "#757575"}]},
			  {"elementType": "labels.text.stroke","stylers": [{"color": "#212121"}]},
			  {"featureType": "administrative","elementType": "geometry","stylers": [{"color": "#757575"}]},
			  {"featureType": "administrative.country","elementType": "labels.text.fill","stylers": [{"color": "#9e9e9e"}]},
			  {"featureType": "administrative.land_parcel","stylers": [{"visibility": "off"}]},
			  {"featureType": "administrative.locality","elementType": "labels.text.fill","stylers": [{"color": "#bdbdbd"}]},
			  {"featureType": "poi","elementType": "labels.text.fill","stylers": [{"color": "#757575"}]},
			  {"featureType": "poi.park","elementType": "geometry","stylers": [{"color": "#181818"}]},
			  {"featureType": "poi.park","elementType": "labels.text.fill","stylers": [{"color": "#616161"}]},
			  {"featureType": "poi.park","elementType": "labels.text.stroke","stylers": [{"color": "#1b1b1b"}]},
			  {"featureType": "road","elementType": "geometry.fill","stylers": [{"color": "#2c2c2c"}]},
			  {"featureType": "road","elementType": "labels.text.fill","stylers": [{"color": "#8a8a8a"}]},
			  {"featureType": "road.arterial","elementType": "geometry","stylers": [{"color": "#373737"}]},
			  {"featureType": "road.highway","elementType": "geometry","stylers": [{"color": "#3c3c3c"}]},
			  {"featureType": "road.highway.controlled_access","elementType": "geometry","stylers": [{"color": "#4e4e4e"}]},
			  {"featureType": "road.local","elementType": "labels.text.fill","stylers": [{"color": "#616161"}]},
			  {"featureType": "transit","elementType": "labels.text.fill","stylers": [{"color": "#757575"}]},
			  {"featureType": "water","elementType": "geometry","stylers": [{"color": "#000000"}]},
			  {"featureType": "water","elementType": "labels.text.fill","stylers": [{"color": "#3d3d3d"}]}
			]
		};

		map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);
		var markerspoly = <?php echo $json_array; ?>;
		var infoWindowContent = <?php echo $json_arrayinfo; ?>;
		var bounds = new google.maps.LatLngBounds();
		for (var i = 0; i < markerspoly.length; i++) {
			var encodedPath = markerspoly[i];
			var info = infoWindowContent[i];
			decodedPolygon = google.maps.geometry.encoding.decodePath(encodedPath);
			for (var j = 0; j < decodedPolygon.length; j++) {
				bounds.extend(decodedPolygon[j]);
			}
			var dataPolygon = new google.maps.Polygon({
				paths: decodedPolygon,
				strokeColor: '#FF0000',
				strokeOpacity: 0.8,
				strokeWeight: 1,
				fillColor: '#FF0000',
				fillOpacity: 0.35
			});

			dataPolygon.setMap(map);
			attachPolygonInfoWindow(dataPolygon, decodedPolygon, info);
		}
		//map.fitBounds(bounds);
		//google.maps.event.addListener(dataPolygon, 'click', showArrays);
		//infoWindow = new google.maps.InfoWindow();
		var markers = <?php echo $json_array_marker; ?>;
		var infowindow = new google.maps.InfoWindow(), marker, i;
		var bounds = new google.maps.LatLngBounds(); // diluar looping
		for (i = 0; i < markers.length; i++) {  
		pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
		bounds.extend(pos); // di dalam looping
		if (markers[i][3]==1) {
			if (markers[i][4]==0) {
				var marker = new google.maps.Marker({
				icon: './assets/icons/myiconrencana.ico',
				position: pos,
				map: map
				});
				
			}else{
				var marker = new google.maps.Marker({
				icon: './assets/icons/myiconproduksi.ico',
				position: pos,
				map: map
				});
				
			}
		} else {
			var marker = new google.maps.Marker({
			icon: './assets/icons/myiconnotactive.ico',
			position: pos,
			map: map
			});
		}
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(markers[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
		google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
			return function() {
				infowindow.setContent(markers[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
		}
	}

	/** @this {google.maps.Polygon} */
	function attachPolygonInfoWindow(polygon, coors, html)
        {

            polygon.infoWindow = new google.maps.InfoWindow({
                content: html
            });
			
            google.maps.event.addListener(polygon, 'click', function (event) {
				polygon.infoWindow.setPosition(event.latLng);
                polygon.infoWindow.open(map, polygon);
            });
        }

	function downloadUrl(url, callback) {
		var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;

		request.onreadystatechange = function () {
			if (request.readyState == 4) {
				request.onreadystatechange = doNothing;
				callback(request, request.status);
			}
		};

		request.open('GET', url, true);
		request.send(null);
	}

	function doNothing() {}

	google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <script>
 /**
     * Widget 5
     */
	var donutChart2 = {
        options: {
            chart: {
                type      : 'pieChart',
                donut     : true,
                x         : function (d)
                {
                    return d.key;
                },
                y         : function (d)
                {
                    return d.y;
                },
                showLabels: false,

                pie               : {
                    startAngle: function (d)
                    {
                        return d.startAngle - Math.PI;
                    },
                    endAngle  : function (d)
                    {
                        return d.endAngle - Math.PI ;
                    }
                },
                transitionDuration: 325,
                legend            : {
                    margin: {
                        top   : 5,
                    }
                }
            }
        },

        data: [
            {
                key: 'Realisasi',
                y  : <?php echo $getRealTanam ?>
            },
            {
                key: 'Beban',
                y  : <?php echo $getBebanTanam ?>
            }
        ]

    };
	var donutChart3 = {
        options: {
            chart: {
                type      : 'pieChart',
                donut     : true,
                x         : function (d)
                {
                    return d.key;
                },
                y         : function (d)
                {
                    return d.y;
                },
                showLabels: false,

                pie               : {
                    startAngle: function (d)
                    {
                        return d.startAngle - Math.PI;
                    },
                    endAngle  : function (d)
                    {
                        return d.endAngle - Math.PI ;
                    }
                },
                transitionDuration: 500,
                legend            : {
                    margin: {
                        top   : 5
                    }
                }
            }
        },

        data: [
            {
                key: 'Produksi',
                y  : <?php echo $getjmlProduksi ?>
            },
            {
                key: 'Beban',
                y  : <?php echo $getjmlBebanProduksi ?>
            }
        ]

    };
	
	var data = {
        "widget5"      : {
            "title"     : "Realisasi dan Produksi",
            "ranges"    : {
                "TW": "Minggu Ini",
                "LW": "Minggu Lalu",
                "2W": "2 Minggu Lalu"
            },
            "mainChart" : {
                "2W": [
                    {
                        "key"   : "Tanam",
                        "values": <?php echo $jsonchartRW2; ?> 
                    },
                    {
                        "key"   : "Produksi",
                        "values": <?php echo $jsonchartPW2; ?>
                    }
                ],
                "LW": [
                    {
                        "key"   : "Tanam",
                        "values": <?php echo $jsonchartRW1; ?> 
                    },
                    {
                        "key"   : "Produksi",
                        "values": <?php echo $jsonchartPW1; ?> 
                    }
                ],
                "TW": [
                    {
                        "key"   : "Tanam",
                        "values": <?php echo $jsonchartRW; ?> 
                    },
                    {
                        "key"   : "Produksi",
                        "values": <?php echo $jsonchartPW; ?> 
                    }
                ]
            },
            "supporting": {
                "pks"   : {
                    "label": "PKS",
                    "count": {
                        "2W": <?php echo intval($jmlchartPKSw2); ?>,
                        "LW": <?php echo intval($jmlchartPKSw1); ?>,
                        "TW": <?php echo intval($jmlchartPKS); ?>
                    },
                    "chart": {
                        "2W": [
                            {
                                "key"   : "PKS",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 5
                                    },
                                    {
                                        "x": 1,
                                        "y": 8
                                    },
                                    {
                                        "x": 2,
                                        "y": 5
                                    },
                                    {
                                        "x": 3,
                                        "y": 6
                                    },
                                    {
                                        "x": 4,
                                        "y": 7
                                    },
                                    {
                                        "x": 5,
                                        "y": 8
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ],
                        "LW": [
                            {
                                "key"   : "PKS",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 3
                                    },
                                    {
                                        "x": 2,
                                        "y": 7
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 5
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ],
                        "TW": [
                            {
                                "key"   : "PKS",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 3
                                    },
                                    {
                                        "x": 1,
                                        "y": 2
                                    },
                                    {
                                        "x": 2,
                                        "y": 1
                                    },
                                    {
                                        "x": 3,
                                        "y": 4
                                    },
                                    {
                                        "x": 4,
                                        "y": 8
                                    },
                                    {
                                        "x": 5,
                                        "y": 8
                                    },
                                    {
                                        "x": 6,
                                        "y": 4
                                    }
                                ]
                            }
                        ]
                    }
                },
                "pksterverifikasi"    : {
                    "label": "TERVERIFIKSI",
                    "count": {
                        "2W": <?php echo intval($jmlverifw2); ?>,
                        "LW": <?php echo intval($jmlverifw1); ?>,
                        "TW": <?php echo intval($jmlverif); ?>
                    },
                    "chart": {
                        "2W": [
                            {
                                "key"   : "PKS Terverifikasi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 3
                                    },
                                    {
                                        "x": 1,
                                        "y": 2
                                    },
                                    {
                                        "x": 2,
                                        "y": 1
                                    },
                                    {
                                        "x": 3,
                                        "y": 4
                                    },
                                    {
                                        "x": 4,
                                        "y": 8
                                    },
                                    {
                                        "x": 5,
                                        "y": 8
                                    },
                                    {
                                        "x": 6,
                                        "y": 4
                                    }
                                ]
                            }
                        ],
                        "LW": [
                            {
                                "key"   : "PKS Terverifikasi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 5
                                    },
                                    {
                                        "x": 2,
                                        "y": 4
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 7
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ],
                        "TW": [
                            {
                                "key"   : "PKS Terverifikasi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 3
                                    },
                                    {
                                        "x": 2,
                                        "y": 7
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 5
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ]
                    }
                },
                "realisasi" : {
                    "label": "REALISASI TANAM",
                    "count": {
                        "2W": <?php echo intval($jmlchartrealisasiw2); ?>,
                        "LW": <?php echo intval($jmlchartrealisasiw1); ?>,
                        "TW": <?php echo intval($jmlchartrealisasi); ?>
                    },
                    "chart": {
                        "2W": [
                            {
                                "key"   : "Re-Tanam",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 3
                                    },
                                    {
                                        "x": 2,
                                        "y": 7
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 5
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ],
                        "LW": [
                            {
                                "key"   : "Re-Tanam",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 5
                                    },
                                    {
                                        "x": 1,
                                        "y": 7
                                    },
                                    {
                                        "x": 2,
                                        "y": 8
                                    },
                                    {
                                        "x": 3,
                                        "y": 8
                                    },
                                    {
                                        "x": 4,
                                        "y": 6
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 1
                                    }
                                ]
                            }
                        ],
                        "TW": [
                            {
                                "key"   : "Re-Tanam",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 3
                                    },
                                    {
                                        "x": 1,
                                        "y": 2
                                    },
                                    {
                                        "x": 2,
                                        "y": 1
                                    },
                                    {
                                        "x": 3,
                                        "y": 4
                                    },
                                    {
                                        "x": 4,
                                        "y": 8
                                    },
                                    {
                                        "x": 5,
                                        "y": 8
                                    },
                                    {
                                        "x": 6,
                                        "y": 4
                                    }
                                ]
                            }
                        ]
                    }
                },
                "beban-tanam"  : {
                    "label": "BEBAN TANAM",
                    "count": {
                        "2W": <?php echo intval($jmlbrealisasiw2); ?>,
                        "LW": <?php echo intval($jmlbrealisasiw1); ?>,
                        "TW": <?php echo intval($jmlbrealisasi); ?>
                    },
                    "chart": {
                        "2W": [
                            {
                                "key"   : "Beban Tanam",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 5
                                    },
                                    {
                                        "x": 1,
                                        "y": 7
                                    },
                                    {
                                        "x": 2,
                                        "y": 4
                                    },
                                    {
                                        "x": 3,
                                        "y": 6
                                    },
                                    {
                                        "x": 4,
                                        "y": 5
                                    },
                                    {
                                        "x": 5,
                                        "y": 3
                                    },
                                    {
                                        "x": 6,
                                        "y": 2
                                    }
                                ]
                            }
                        ],
                        "LW": [
                            {
                                "key"   : "Beban Tanam",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 3
                                    },
                                    {
                                        "x": 2,
                                        "y": 7
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 5
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ],
                        "TW": [
                            {
                                "key"   : "Beban Tanam",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 5
                                    },
                                    {
                                        "x": 2,
                                        "y": 4
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 7
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ]
                    }
                },
                "produksi": {
                    "label": "PRODUKSI",
                    "count": {
                        "2W": <?php echo intval($jmlchartproduksiw2); ?>,
                        "LW": <?php echo intval($jmlchartproduksiw1); ?>,
                        "TW": <?php echo intval($jmlchartproduksi); ?>
                    },
                    "chart": {
                        "2W": [
                            {
                                "key"   : "Produksi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 5
                                    },
                                    {
                                        "x": 2,
                                        "y": 4
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 7
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ],
                        "LW": [
                            {
                                "key"   : "Produksi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 5
                                    },
                                    {
                                        "x": 1,
                                        "y": 7
                                    },
                                    {
                                        "x": 2,
                                        "y": 8
                                    },
                                    {
                                        "x": 3,
                                        "y": 8
                                    },
                                    {
                                        "x": 4,
                                        "y": 6
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 1
                                    }
                                ]
                            }
                        ],
                        "TW": [
                            {
                                "key"   : "Produksi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 3
                                    },
                                    {
                                        "x": 2,
                                        "y": 7
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 5
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ]
                    }
                },
                "beban-produksi"     : {
                    "label": "beban-produksi",
                    "count": {
                        "2W": <?php echo intval($jmlbproduksiw2); ?>,
                        "LW": <?php echo intval($jmlbproduksiw1); ?>,
                        "TW": <?php echo intval($jmlbproduksi); ?>
                    },
                    "chart": {
                        "2W": [
                            {
                                "key"   : "beban-produksi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 5
                                    },
                                    {
                                        "x": 1,
                                        "y": 7
                                    },
                                    {
                                        "x": 2,
                                        "y": 8
                                    },
                                    {
                                        "x": 3,
                                        "y": 8
                                    },
                                    {
                                        "x": 4,
                                        "y": 6
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 1
                                    }
                                ]
                            }
                        ],
                        "LW": [
                            {
                                "key"   : "beban-produksi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 5
                                    },
                                    {
                                        "x": 2,
                                        "y": 4
                                    },
                                    {
                                        "x": 3,
                                        "y": 5
                                    },
                                    {
                                        "x": 4,
                                        "y": 7
                                    },
                                    {
                                        "x": 5,
                                        "y": 4
                                    },
                                    {
                                        "x": 6,
                                        "y": 7
                                    }
                                ]
                            }
                        ],
                        "TW": [
                            {
                                "key"   : "beban-produksi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 5
                                    },
                                    {
                                        "x": 1,
                                        "y": 7
                                    },
                                    {
                                        "x": 2,
                                        "y": 4
                                    },
                                    {
                                        "x": 3,
                                        "y": 6
                                    },
                                    {
                                        "x": 4,
                                        "y": 5
                                    },
                                    {
                                        "x": 5,
                                        "y": 3
                                    },
                                    {
                                        "x": 6,
                                        "y": 2
                                    }
                                ]
                            }
                        ]
                    }
                }
            }
        }
    };
    var widget5Option = 'TW';
    // Main Chart
    nv.addGraph(function ()
    {
        var chart = nv.models.multiBarChart()
            .options(
                {
                    color       : ['#03a9f4', '#b3e5fc'],
                    margin      : {
                        top   : 50,
                        right : 10,
                        bottom: 16,
                        left  : 60
                    },
                    clipEdge    : true,
                    groupSpacing: 0.3,
                    reduceXTicks: false,
                    stacked     : false,
                    duration    : 250,
                    x           : function (d)
                    {
                        return d.x;
                    },
                    y           : function (d)
                    {
                        return d.y;
                    },
                    yTickFormat : function (d)
                    {
                        return d;
                    }
                }
            );

        var chartd3 = d3.select('#widget5-main-chart svg')
        var chartData;

        initChart();

        nv.utils.windowResize(chart.update);

        $(window).bind('update:widget5', function ()
        {

            initChart();
        })

        function initChart()
        {
            chartData = data.widget5.mainChart[widget5Option];
            chartd3.datum(chartData).call(chart);
        }

        return chart;
    });

    // Supporting Charts
    $.each(['pks', 'pksterverifikasi', 'realisasi', 'beban-tanam', 'produksi', 'beban-produksi'], function (index, id)
    {
        nv.addGraph(function ()
        {
            var chart = nv.models.lineChart()
                .options(
                    {
                        color                  : ['#03A9F4'],
                        height                 : 50,
                        margin                 : {
                            top   : 8,
                            right : 0,
                            bottom: 0,
                            left  : 0
                        },
                        isArea                 : true,
                        interpolate            : 'cardinal',
                        clipEdge               : true,
                        duration               : 500,
                        showXAxis              : false,
                        showYAxis              : false,
                        showLegend             : false,
                        useInteractiveGuideline: true,
                        x                      : function (d)
                        {
                            return d.x;
                        },
                        y                      : function (d)
                        {
                            return d.y;
                        },
                        yDomain                : [0, 9]
                    }
                );

            var chartd3 = d3.select('#widget5-' + id + '-chart svg');
            var chartData;

            initChart();

            nv.utils.windowResize(chart.update);

            $(window).bind('update:widget5', function ()
            {

                initChart();
                $('#widget5-' + id + '-chart .count').text(data.widget5.supporting[id].count[widget5Option]);
            })

            function initChart()
            {
                chartData = data.widget5.supporting[id].chart[widget5Option];
                chartd3.datum(chartData).call(chart);
            }

            return chart;
        });
    });

    $('.widget5-option-change-btn').on('click', function (ev)
    {
        console.log($(ev.target).data('interval'));
        widget5Option = $(ev.target).data('interval');
        $(window).trigger('update:widget5');
    });
	nv.addGraph(function ()
    {
        var chart = nv.models.pieChart()
            .options({
                type              : 'pieChart',
                donut             : true,
                x                 : function (d)
                {
                    return d.key;
                },
                y                 : function (d)
                {
                    return d.y;
                },
                showLabels        : false,
                transitionDuration: 200
            });

        chart.legend.margin({
                top   : 5,
            }
        );

        

        var chartd3 = d3.select('#donut-chart2 svg')
		function centerText2() {
			return function() {
			var svg2 = d3.select('#donut-chart2 svg');

			var donut2 = svg2.selectAll("g.nv-slice").filter(
			  function (d, i) {
				return i == 0;
			  }
			);
			
			// Insert first line of text into middle of donut pie chart
			donut2.insert("text", "g")
				.text("<?php echo round($tampilPersentasetanam,0,PHP_ROUND_HALF_UP) ?> %")
				.attr("class", "middle")
				.attr("text-anchor", "middle")
					.attr("dy", "0em")
					.style("fill", "#000");
		  }
		}
        var chartData;

        initChart();

        nv.utils.windowResize(chart.update);

        function initChart()
        {
            chartData = donutChart2.data;
            chartd3.datum(chartData).call(chart);
			chartd3.call(centerText2());
        }

        return chart;
    });
	nv.addGraph(function ()
    {
        var chart = nv.models.pieChart()
            .options({
                type              : 'pieChart',
                donut             : true,
                x                 : function (d)
                {
                    return d.key;
                },
                y                 : function (d)
                {
                    return d.y;
                },
                showLabels        : false,
                transitionDuration: 200
            });

        chart.legend.margin({
                top   : 5,
            }
        );

        

        var chartd3 = d3.select('#donut-chart3 svg')
		function centerText3() {
			return function() {
			var svg3 = d3.select('#donut-chart3 svg');

			var donut3 = svg3.selectAll("g.nv-slice").filter(
			  function (d, i) {
				return i == 0;
			  }
			);
			
			// Insert first line of text into middle of donut pie chart
			donut3.insert("text", "g")
				.text("<?php echo round($tampilPersentaseproduksi,0,PHP_ROUND_HALF_UP) ?> %")
				.attr("class", "middle")
				.attr("text-anchor", "middle")
					.attr("dy", "0em")
					.style("fill", "#000");
		  }
		}
        var chartData;

        initChart();

        nv.utils.windowResize(chart.update);

        function initChart()
        {
            chartData = donutChart3.data;
            chartd3.datum(chartData).call(chart);
			chartd3.call(centerText3());
        }

        return chart;
    });
</script>
<style>
    #jam-digital{overflow:hidden; width:250px}
    #hours{float:left; width:70px; height:90px; margin-right:20px}
    #minute{float:left; width:70px; height:90px; }
    #second{float:right; width:70px; height:90px;  margin-left:10px}
    #jam-digital p{color:#A5B1CB; font-size:60px; text-align:center; margin-top:4px}
	#donut-chart3 svg {
	  height: 200px;
	}
	#donut-chart2 svg {
	  height: 200px;
	}
</style>
<script type="text/javascript">
    window.setTimeout("waktu()",1000);
    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()",1000);
        document.getElementById("jam").innerHTML = tanggal.getHours();
        document.getElementById("menit").innerHTML = tanggal.getMinutes();
        document.getElementById("detik").innerHTML = tanggal.getSeconds();
    }
</script>
</body>

</html>
