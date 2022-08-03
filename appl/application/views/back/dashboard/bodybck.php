<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
	<!-- Main Chart -->
	<?php 
		$bebanTanamNasional =0;$bebanProduksiNasional=0;
		if(empty($get_jml_riph_admin->v_beban_tanam)){$bebanTanamNasional=0;}else{$bebanTanamNasional=$get_jml_riph_admin->v_beban_tanam;} 
		if(empty($get_jml_riph_admin->v_beban_produksi)){$bebanProduksiNasional=0;}else{$bebanProduksiNasional=$get_jml_riph_admin->v_beban_produksi;} 
		$chartRW = array();$jmlR = array();$jmlverif =0;$jmlunverif =0;$jmlchartPKS=0;$jmlverifw1 =0;$jmlunverifw1 =0;$jmlchartPKSw1=0;$jmlverifw2=0;$jmlverifw3=0;$jmlunverifw2=0;$jmlunverifw3=0;$jmlchartPKSw2=0;$jmlchartPKSw3=0;
		$jmlchartrealisasi=0;$jmlchartrealisasiw1=0;$jmlchartrealisasiw2=0;$jmlchartrealisasiw3=0;$jmlchartproduksi=0;$jmlchartproduksiw1=0;$jmlchartproduksiw2=0;$jmlchartproduksiw3=0;
		$jmlbrealisasi=0;$jmlbrealisasiw1=0;$jmlbrealisasiw2=0;$jmlbrealisasiw3=0;$jmlbproduksi=0;$jmlbproduksiw1=0;$jmlbproduksiw2=0;$jmlbproduksiw3=0;
		$hari[1] = "Sen";$hari[2] = "Sel";$hari[3] = "Rab";$hari[4] = "Kam";$hari[5] = "Jum";$hari[6] = "Sab";$hari[7] = "Min";
		foreach($get_chart_verifikasi as $getVerif){if (is_null($getVerif->jumlah_verif)){$jmlverif=0;}else{$jmlverif=$getVerif->jumlah_verif;}}
		foreach($get_chart_unverifikasi as $getunVerif){if (is_null($getunVerif->jumlah_unverif)){$jmlunverif=0;}else{$jmlunverif=$getunVerif->jumlah_unverif;}}
		foreach($get_chart_verifikasi_w1 as $getVerifw1){if (is_null($getVerifw1->jumlah_verif)){$jmlverifw1=0;}else{$jmlverifw1=$getVerifw1->jumlah_verif;}}
		foreach($get_chart_unverifikasi_w1 as $getunVerifw1){if (is_null($getunVerifw1->jumlah_unverif)){$jmlunverifw1=0;}else{$jmlunverifw1=$getunVerifw1->jumlah_unverif;}}
		foreach($get_chart_verifikasi_w2 as $getVerifw2){if (is_null($getVerifw2->jumlah_verif)){$jmlverifw2=0;}else{$jmlverifw2=$getVerifw2->jumlah_verif;}}
		foreach($get_chart_unverifikasi_w2 as $getunVerifw2){if (is_null($getunVerifw2->jumlah_unverif)){$jmlunverifw2=0;}else{$jmlunverifw2=$getunVerifw2->jumlah_unverif;}}
		foreach($get_chart_verifikasi_w3 as $getVerifw3){if (is_null($getVerifw3->jumlah_verif)){$jmlverifw3=0;}else{$jmlverifw3=$getVerifw3->jumlah_verif;}}
		foreach($get_chart_unverifikasi_w3 as $getunVerifw3){if (is_null($getunVerifw3->jumlah_unverif)){$jmlunverifw3=0;}else{$jmlunverifw3=$getunVerifw3->jumlah_unverif;}}
		$jmlchartPKSw3 = $jmlverifw3 + $jmlunverifw3;$jmlchartPKSw2 = $jmlverifw2 + $jmlunverifw2;$jmlchartPKSw1 = $jmlverifw1 + $jmlunverifw1;$jmlchartPKS = $jmlverif + $jmlunverif;
		foreach($get_chart_beban as $getchartbeban){if (is_null($getchartbeban->bebantanam)){$jmlbrealisasi=0;}else{$jmlbrealisasi=$getchartbeban->bebantanam;}
		if (is_null($getchartbeban->bebanproduksi)){$jmlbproduksi=0;}else{$jmlbproduksi=$getchartbeban->bebanproduksi;}}
		foreach($get_chart_beban_w1 as $getchartbebanw1){if (is_null($getchartbebanw1->bebantanam)){$jmlbrealisasiw1=0;}else{$jmlbrealisasiw1=$getchartbebanw1->bebantanam;}
		if (is_null($getchartbebanw1->bebanproduksi)){$jmlbproduksiw1=0;}else{$jmlbproduksiw1=$getchartbebanw1->bebanproduksi;}}
		foreach($get_chart_beban_w2 as $getchartbebanw2){if (is_null($getchartbebanw2->bebantanam)){$jmlbrealisasiw2=0;}else{$jmlbrealisasiw2=$getchartbebanw2->bebantanam;}
		if (is_null($getchartbebanw2->bebanproduksi)){$jmlbproduksiw2=0;}else{$jmlbproduksiw2=$getchartbebanw2->bebanproduksi;}}
		foreach($get_chart_beban_w3 as $getchartbebanw3){if (is_null($getchartbebanw3->bebantanam)){$jmlbrealisasiw3=0;}else{$jmlbrealisasiw3=$getchartbebanw3->bebantanam;}
		if (is_null($getchartbebanw3->bebanproduksi)){$jmlbproduksiw3=0;}else{$jmlbproduksiw3=$getchartbebanw3->bebanproduksi;}}
		foreach($get_chart_jmlrealisasi as $getchartrealisasi){if (is_null($getchartrealisasi->jumlah_realisasi)){$jmlchartrealisasi=0;}else{$jmlchartrealisasi=$getchartrealisasi->jumlah_realisasi;}}
		foreach($get_chart_jmlrealisasi_w1 as $getchartrealisasiw1){if (is_null($getchartrealisasiw1->jumlah_realisasi)){$jmlchartrealisasiw1=0;}else{$jmlchartrealisasiw1=$getchartrealisasiw1->jumlah_realisasi;}}
		foreach($get_chart_jmlrealisasi_w2 as $getchartrealisasiw2){if (is_null($getchartrealisasiw2->jumlah_realisasi)){$jmlchartrealisasiw2=0;}else{$jmlchartrealisasiw2=$getchartrealisasiw2->jumlah_realisasi;}}
		foreach($get_chart_jmlrealisasi_w3 as $getchartrealisasiw3){if (is_null($getchartrealisasiw3->jumlah_realisasi)){$jmlchartrealisasiw3=0;}else{$jmlchartrealisasiw3=$getchartrealisasiw3->jumlah_realisasi;}}		
		foreach($get_chart_jmlproduksi as $getchartproduksi){if (is_null($getchartproduksi->jumlah_produksi)){$jmlchartproduksi=0;}else{$jmlchartproduksi=$getchartproduksi->jumlah_produksi;}}
		foreach($get_chart_jmlproduksi_w1 as $getchartproduksiw1){if (is_null($getchartproduksiw1->jumlah_produksi)){$jmlchartproduksiw1=0;}else{$jmlchartproduksiw1=$getchartproduksiw1->jumlah_produksi;}}
		foreach($get_chart_jmlproduksi_w2 as $getchartproduksiw2){if (is_null($getchartproduksiw2->jumlah_produksi)){$jmlchartproduksiw2=0;}else{$jmlchartproduksiw2=$getchartproduksiw2->jumlah_produksi;}}
		foreach($get_chart_jmlproduksi_w3 as $getchartproduksiw3){if (is_null($getchartproduksiw3->jumlah_produksi)){$jmlchartproduksiw3=0;}else{$jmlchartproduksiw3=$getchartproduksiw3->jumlah_produksi;}}	
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
		
		$chartRW3 = array();
		foreach($get_chart_realisasi_w3 as $chartRealisasiM3){
			$harikew3 = intval($chartRealisasiM3->harike);
			$jmlRw3[$chartRealisasiM3->harike] = $chartRealisasiM3->jumlah_tanam;
			for($i = 1; $i < 8; $i++){
				if ($i == $harikew3) {
					array_push($chartRW3, array("x" => $hari[$i],"y" => $jmlRw3[$i]));
				}
				else
				{
					array_push($chartRW3, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$jsonchartRW3 = json_encode($chartRW3, true);
		
		$chartPW3 = array();
		foreach($get_chart_produksi_w3 as $chartProduksiM3){
			$hariP3ke = intval($chartProduksiM3->harike);
			$jmlP3[$chartProduksiM3->harike] = $chartProduksiM3->jumlah_produksi;
			for($i = 1; $i < 8; $i++){
				if ($i == $hariP3ke) {
					array_push($chartPW3, array("x" => $hari[$i],"y" => $jmlP3[$i]));
				}
				else
				{
					array_push($chartPW3, array("x" => $hari[$i],"y" => 0));
				}
			}
		}
		$jsonchartPW3 = json_encode($chartPW3, true);
	?>
	<!-- Main Chart -->				
						
	<?php $no = 1; $bulan=array();$jmlpro=array();foreach($get_jml_produksi as $jml_produksi){
		$bl = bulan($jml_produksi->bulanproduksi);
		$jmlp = $jml_produksi->jmlproduksi;
		array_push($bulan,$bl);
		array_push($jmlpro,$jmlp);
    } 
	$json_bulan = json_encode($bulan, true);
	$json_jmlpro = json_encode($jmlpro, true);
	?>
	<?php if($get_jml_cpcl_verifikasi->jml_verifikasi != 0){
		$bltanam=$get_jml_cpcl_verifikasi->jml_verifikasi;
	}else{
		$bltanam=0;
	}
		$bttanam=$get_jml_cpcl_blverifikasi->jml_verifikasi;
		if($bttanam != 0)
		{
			$bpersen = ($bltanam!=0)?($bltanam/$bttanam)*100:0;
		}else{
			$bpersen = 0;
		}
	$jmlPKS = intval($bltanam) + intval($bttanam);	
	?>
	
	<?php if($get_jml_realisasi_verifikasi->jml_verifikasi !=0){
			$jproduksi=$get_jml_realisasi_verifikasi->jml_verifikasi;
	}else{
		$jproduksi=0;
	}
		$bproduksi=$get_jml_realisasi_blverifikasi->jml_verifikasi;
		if($bproduksi != 0)
		{
		$ppersen = ($jproduksi!=0)?($jproduksi/$bproduksi)*100:0;
		}else{
		$ppersen = 0;
		}
	$jmlRealisasi = intval($jproduksi) + intval($bproduksi);
	?>
	
	<?php if($get_jml_produksi_verifikasi->jml_verifikasi !=0){
			$jproduksi2=$get_jml_produksi_verifikasi->jml_verifikasi;
	}else{
		$jproduksi2=0;
	}
		$bproduksi2=$get_jml_produksi_blverifikasi->jml_verifikasi;
		if($bproduksi2 != 0)
		{
		$ppersen2 = ($jproduksi2/$bproduksi2)*100;
		}else{
		$ppersen2 = 0;
		}
	?>
	<?php
		$getRealTanam = intval($get_jml_real_tanam->jmlluas);
		$getBebanTanam = intval($get_jml_beban_tanam->jmlbeban);
		$getjmlProduksi = intval($get_jml_all_produksi->jmlproduksi);
		$getjmlBebanProduksi = intval($get_jml_beban_tanam->jmlbeban);
		$PersentaseTanam = ($getRealTanam!=0)?($getRealTanam/$getBebanTanam)*100:0;
		$PersentaseProduksi = ($getjmlProduksi!=0)?($getjmlProduksi/$getjmlBebanProduksi)*100:0;
		$JmlrencanaTanam = intval($get_jml_rencana_tanam->luas_rencana_tanam);
		$JmlBebanRIPH = intval($get_jml_riph_admin->v_beban_tanam);
		$PersentaseCPCL = ($JmlrencanaTanam!=0)?($JmlrencanaTanam/$JmlBebanRIPH)*100:0;
		$persentaseDonutTanam = ($JmlrencanaTanam!=0)?($JmlrencanaTanam/$bebanTanamNasional)*100:0;
		$persentaseDonutProduksi = ($getjmlProduksi!=0)?($getjmlProduksi/$bebanProduksiNasional)*100:0;
		//$PersentaseTanam = ($getRealTanam/$getBebanTanam)*100;
		//$PersentaseProduksi = ($getjmlProduksi/$getjmlBebanProduksi)*100;
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

                                    
                                </div>

                                <div class="row no-gutters align-items-center project-selection">

                                    <div class="selected-project h6 px-4 py-2">simeTHRIS. Backend App</div>

                                    

                                </div>

                            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
                            <div class="page-content">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="budget-summary-tab" data-toggle="tab" href="#budget-summary-tab-pane" role="tab" aria-controls="budget-summary-tab-pane">Pemetaan</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="team-members-tab" data-toggle="tab" href="#team-members-tab-pane" role="tab" aria-controls="team-members-tab-pane">Daftar L.O</a>
                                    </li>
									
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">

                                        <!-- WIDGET GROUP -->
                                        <div class="widget-group row no-gutters">
											<!-- WIDGET 4 -->
                                            <div class="col-12 col-sm-6 col-xl-3 p-3">

                                                <div class="widget widget4 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Perusahaan</span>
                                                        </div>
														
														<a href="data_perusahaan" type="button" class="btn btn-icon">
                                                            <i class="icon icon-alert-circle-outline"></i>
                                                        </a>

                                                        
                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
														<span class="text-muted"><?php if(empty($get_jml_riph_admin->tanggal)){
														echo '-';}else{echo date('d-m-Y h:i:sa',strtotime($get_jml_riph_admin->tanggal));} ?></span>
                                                        <div class="sub-title h3 text-danger"><?php if(empty($get_jml_riph_admin->jml_importir)){
														echo '0';}else{echo number_format($get_jml_riph_admin->jml_importir, 0, ".", ".");} ?><span><sup style="font-size: 10px"> Pers</sup></span></div>
                                                        
                                                        
                                                    </div>
													<div class="widget-footer p-1 bg-light row no-gutters align-items-center">
                                                        <span class="text-muted">Terlaporkan :</span>
                                                        <span class="h5"> <?php echo $get_all_lo2->jml_lo;?><span><sup style="font-size: 10px"> Perusahaan</sup></span></span>
                                                    </div>
										
                                                </div>
                                            </div>
                                            <!-- / WIDGET 4 -->
                                            <!-- WIDGET 1 -->
                                            <div class="col-12 col-sm-6 col-xl-3 p-3">

                                                <div class="widget widget1 card">
                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">
                                                        <div class="col">
                                                            <span class="h6">Volume RIPH</span>
                                                        </div>
														<a href="data_import" type="button" class="btn btn-icon">
                                                            <i class="icon icon-alert-circle-outline"></i>
                                                        </a>
                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
														<span class="text-muted"><?php if(empty($get_jml_riph_admin->tanggal)){
														echo '-'; }else{echo date('d-m-Y h:i:sa',strtotime($get_jml_riph_admin->tanggal));} ?></span>
                                                        <div class="sub-title h3 text-secondary"><?php if(empty($get_jml_riph_admin->v_pengajuan_import)){
														echo '0';}else{echo number_format($get_jml_riph_admin->v_pengajuan_import, 0, ".", ".");} ?><span><sup style="font-size: 10px"> Ton</sup></span></div>
                                                    </div>
													<div class="widget-footer p-1 bg-light row no-gutters align-items-center">
                                                        <span class="text-muted">Terlaporkan : </span>
                                                        <span class="h5"> <?php if(empty($get_jml_import->vimport)){
														echo '0';}else{echo number_format($get_jml_import->vimport, 0, ".", ".");} ?><span><sup style="font-size: 10px"> Ton</sup></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 1 -->

                                            <!-- WIDGET 2 -->
                                            <div class="col-12 col-sm-6 col-xl-3 p-3">

                                                <div class="widget widget2 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Beban Tanam</span>
                                                        </div>
														<a href="listrealisasi" type="button" class="btn btn-icon">
                                                            <i class="icon icon-alert-circle-outline"></i>
                                                        </a>

                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
														<span class="text-muted"><?php if(empty($get_jml_riph_admin->tanggal)){
														echo '-';}else{echo date('d-m-Y h:i:sa',strtotime($get_jml_riph_admin->tanggal));} ?></span>
                                                        <div class="sub-title h3 text-danger"><?php if(empty($get_jml_riph_admin->v_beban_tanam)){
														echo '0';}else{echo number_format($get_jml_riph_admin->v_beban_tanam, 0, ".", ".");} ?><span><sup style="font-size: 10px"> Ton</sup></span></div>
                                                        
                                                    </div>
													<div class="widget-footer p-1 bg-light row no-gutters align-items-center">
                                                        <span class="text-muted">Terlaporkan :</span>
                                                        <span class="h5"> <?php if(empty($get_jml_real_tanam->jmlluas)){
														echo '0';}else{echo number_format($get_jml_real_tanam->jmlluas, 0, ".", ".");} ?><span><sup style="font-size: 10px"> Ha</sup></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 2 -->

                                            <!-- WIDGET 3 -->
                                            <div class="col-12 col-sm-6 col-xl-3 p-3">

                                                <div class="widget widget3 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Beban Produksi</span>
                                                        </div>

                                                        <a href="listproduksi" type="button" class="btn btn-icon">
                                                            <i class="icon icon-alert-circle-outline"></i>
                                                        </a>

                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
														<span class="text-muted"><?php if(empty($get_jml_riph_admin->tanggal)){
														echo '-';}else{echo date('d-m-Y h:i:sa',strtotime($get_jml_riph_admin->tanggal));} ?></span>
                                                        <div class="sub-title h3 text-danger"><?php if(empty($get_jml_riph_admin->v_beban_produksi)){
														echo '0';}else{echo number_format($get_jml_riph_admin->v_beban_produksi, 0, ".", ".");} ?><span><sup style="font-size: 10px"> Ton</sup></span></div>
                                                        
                                                    </div>
													<div class="widget-footer p-1 bg-light row no-gutters align-items-center">
                                                        <span class="text-muted">Terlaporkan :</span>
                                                        <span class="h5"> <?php if(empty($get_jml_all_produksi->jmlproduksi)){
														echo '0';}else{echo number_format($get_jml_all_produksi->jmlproduksi, 0, ".", ".");} ?><span><sup style="font-size: 10px"> Ton</sup></span></span>
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                            <!-- / WIDGET 3 -->

                                            
											<div class="col-12 p-3">
                                                <div class="widget widget13 card">
												
													<div class="widget-content p-4 align-items-center justify-content-center">
														<div class="row">
															<div class="col text-center">
																<div class="col">
																	<span class="h6">Verifikasi PKS</span>
																</div>
																<div id="donut-chart">
																	<svg></svg>
																</div>
																<div class="col">
																	<!-- <span class="h6">Persentase Verifikasi <?php echo round($bpersen,0,PHP_ROUND_HALF_UP) ?>%<div class="progress">
																		<div class="progress-bar" role="progressbar" style="width: <?php echo round($bpersen,0,PHP_ROUND_HALF_UP) ?>%;" aria-valuenow="<?php echo round($bpersen,0,PHP_ROUND_HALF_UP) ?>"
																			 aria-valuemin="0" aria-valuemax="100">
																		</div> 
																	</div></span> -->
																</div>
															</div>
															
															<div class="col text-center">
																<div class="col">
																	<span class="h6">Rencana/Beban Tanam</span>
																</div>
																<div id="donut-chart4">
																	<svg></svg>
																</div>
																<div class="col">
																	<!-- <span class="h6">Persentase Tanam <?php echo round($PersentaseTanam,0,PHP_ROUND_HALF_UP) ?>%<div class="progress">
																		<div class="progress-bar" role="progressbar" style="width: <?php echo round($PersentaseTanam,0,PHP_ROUND_HALF_UP) ?>%;" aria-valuenow="<?php echo round($PersentaseTanam,0,PHP_ROUND_HALF_UP) ?>"
																			 aria-valuemin="0" aria-valuemax="100">
																		</div> 
																	</div></span> -->
																</div>
															</div>
																
															<div class="col text-center">
																<div class="col">
																	<span class="h6">Realisasi/Beban Tanam</span>
																</div>
																<div id="donut-chart2">
																	<svg></svg>
																</div>
																<div class="col">
																	<!-- <span class="h6">Persentase Tanam <?php echo round($PersentaseTanam,0,PHP_ROUND_HALF_UP) ?>%<div class="progress">
																		<div class="progress-bar" role="progressbar" style="width: <?php echo round($PersentaseTanam,0,PHP_ROUND_HALF_UP) ?>%;" aria-valuenow="<?php echo round($PersentaseTanam,0,PHP_ROUND_HALF_UP) ?>"
																			 aria-valuemin="0" aria-valuemax="100">
																		</div> 
																	</div></span> -->
																</div>
															</div>
																
															<div class="col text-center">
																<div class="col">
																	<span class="h6">Produksi/Beban Produksi</span>
																</div>
																<div id="donut-chart3">
																	<svg></svg>
																</div>
																<div class="col">
																	<!-- <span class="h6">Persentase Produksi <?php echo round($PersentaseProduksi,0,PHP_ROUND_HALF_UP) ?>%<div class="progress">
																		<div class="progress-bar" role="progressbar" style="width: <?php echo round($PersentaseProduksi,0,PHP_ROUND_HALF_UP) ?>%;" aria-valuenow="<?php echo round($PersentaseProduksi,0,PHP_ROUND_HALF_UP) ?>"
																			 aria-valuemin="0" aria-valuemax="100">
																		</div> 
																	</div></span> -->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>	
                                            <!-- WIDGET 5 -->
                                            <div class="col-12 p-3">

                                                <div class="widget widget5 card">

                                                    <div class="widget-header px-4 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Realisasi & Produksi</span>
                                                        </div>

                                                        <div>
															
															<select name="bln" id="bln">
																<?php
																$bulan=array("JANUARI","FEBRUARI","MARET","APRIL","MEI","JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER","NOVEMBER","DESEMBER");
																$jlh_bln=count($bulan);
																for($c=0; $c<$jlh_bln; $c+=1){
																	if($c == date('m')-1){
																		echo "<option value=$c selected> $bulan[$c] </option>";
																	}
																	else
																	{
																		echo "<option value=$c> $bulan[$c] </option>";
																	}
																	
																}
																?>
															</select>
                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="TW">
                                                                Mng  Ini
                                                            </button>

                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="LW">
                                                                Mng Lalu
                                                            </button>

                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="2W">
                                                                2 Mng Lalu
                                                            </button>
															
															<button type="button" class="widget5-option-change-btn btn btn-link" data-interval="3W">
                                                                3 Mng Lalu
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
																<table id="dataTable" class="table table-striped dt-responsive display nowrap" style="width:100%">
																	<thead>
																		<tr>
																			<!-- <th style="text-align: center"></th> -->
																			<th style="text-align: center;background-color:#03a9f4;vertical-align:middle"><font color="white">NO</th>
																			<th style="text-align: center;background-color:#03a9f4;vertical-align:middle"><font color="white">Nama Perusahaan</th>
																			<th style="text-align: center;background-color:#03a9f4;vertical-align:middle"><font color="white">Nomor RIPH</th>
																			<th style="text-align: center;background-color:#03a9f4"><font color="white">Tahap 1 <br><sup style="font-size: 10px">(Renc. Tanam)</sup></th>
																			<th style="text-align: center;background-color:#03a9f4"><font color="white">Tahap 2 <br><sup style="font-size: 10px">(Verif Tanam)</sup></th>
																			<th style="text-align: center;background-color:#03a9f4"><font color="white">Tahap 3 <br><sup style="font-size: 10px">(verif Produksi)</sup></th>
																			<th style="text-align: center;background-color:#03a9f4"><font color="white">Tahap 4 <br><sup style="font-size: 10px">(Ket. Lunas)</sup></th>
																			<th style="text-align: center;background-color:#03a9f4"><font color="white">Tahapan <br><sup style="font-size: 10px">Status</sup></th>
																		</tr>
																	</thead>
																	<tbody>
																	<?php $no = 1; $persentaseLangkah=0;$langkah=0;foreach($get_all_table_steps as $user){
																	?>
																		<tr>
																			<td style="text-align: center"><?php echo $no++ ?></td>
																			<td style="text-align: left"><?php echo $user->nama_perusahaan ?></td>
																			<td style="text-align: left"><?php echo $user->nomor_riph ?></td>
																			<?php $diterimapks = $this->db->where(['is_verifikasi'=>'1'])->where(['id_mst_riph'=>$user->id_mst_riph])->count_all_results("cpcl");
																				$allpks = $this->db->where(['id_mst_riph'=>$user->id_mst_riph])->count_all_results("cpcl");
																				$persentaseVerif = ($diterimapks!=0)?($diterimapks/$allpks)*100:0;
																				$langkah = $persentaseVerif;
																			?>
																			<td>
																				<div class="progress" style="height: 15px;">
																					  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $persentaseVerif; ?>"
																					  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persentaseVerif; ?>%">
																						<span><?php echo $persentaseVerif; ?>%</span>
																					  </div>
																				</div>
																			</td>
																			<?php $diterimarealisasi=0;$allrealisasi=0;$query = $this->db->get_where('cpcl',array('id_mst_riph'=>$user->id_mst_riph));
																			foreach ($query->result() as $value) {
																					$diterimarealisasi += $this->db->where(['is_verifikasi'=>'1'])->where(['id_cpcl'=>$value->id_cpcl])->count_all_results("realisasi");
																					$allrealisasi += $this->db->where(['id_cpcl'=>$value->id_cpcl])->count_all_results("realisasi");
																				}
																				$persentaseVRealisasi = ($diterimarealisasi!=0)?($diterimarealisasi/$allrealisasi)*100:0;
																				$langkah += $persentaseVRealisasi;
																			?>
																			<td>
																				<div class="progress" style="height: 15px;">
																					  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $persentaseVRealisasi; ?>"
																					  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persentaseVRealisasi; ?>%">
																						<span><?php echo $persentaseVRealisasi; ?>%</span>
																					  </div>
																				</div>
																			</td>
																			<?php $diterimaproduksi=0;$allproduksi=0;$query = $this->db->get_where('cpcl',array('id_mst_riph'=>$user->id_mst_riph));
																			foreach ($query->result() as $value) {
																					$diterimaproduksi += $this->db->where(['is_verifikasi'=>'1'])->where(['id_cpcl'=>$value->id_cpcl])->count_all_results("produksi");
																					$allproduksi += $this->db->where(['id_cpcl'=>$value->id_cpcl])->count_all_results("produksi");
																				}
																				$persentaseVProduksi = ($diterimaproduksi!=0)?($diterimaproduksi/$allproduksi)*100:0;
																				$langkah += $persentaseVProduksi;
																			?>
																			<td>
																				<div class="progress" style="height: 15px;">
																					  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $persentaseVProduksi; ?>"
																					  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persentaseVProduksi; ?>%">
																						<span><?php echo $persentaseVProduksi; ?>%</span>
																					  </div>
																				</div>
																			</td>
																			<?php $persentaseLangkah = ($langkah!=0)?($langkah/300)*100:0;
																			?>
																			<td>
																				<div class="progress" style="height: 15px;">
																					  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $persentaseLangkah; ?>"
																					  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $persentaseLangkah; ?>%">
																						<span><?php echo $persentaseLangkah; ?>%</span>
																					  </div>
																				</div>
																			</td>
																			<td></td>
																		</tr>
																	<?php } ?>
																	</tbody>
																</table>
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
												<div class="widget widget9 card">
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

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h5">Tabel Sebaran Bawang Putih</span>
                                                        </div>

                                                        <button type="button" class="btn btn-icon">
                                                            <i class="icon icon-dots-vertical"></i>
                                                        </button>

                                                    </div>
													
                                                    <div class="widget-content p-3">

                                                        <table id="table-data" class="table">

                                                            <thead>
																<tr>
																	<th style="text-align: center">No</th>
																	<th style="text-align: center">Nama Perusahaan</th>
																	<th class="d-none d-md-table-cell">Provinsi</th>
																	<th class="d-none d-md-table-cell">Kabupaten</th>
																	<th class="d-none d-md-table-cell">Kecamatan</th>
																	<th class="d-none d-md-table-cell">Desa</th>
																	<th class="d-none d-md-table-cell">Nama Kontak</th>
																	<th class="d-none d-md-table-cell">Telp Kontak</th>
																	<th class="d-none d-md-table-cell">V RIPH</th>
																	<th class="d-none d-md-table-cell">Wajib Tanam</th>
																	<th class="d-none d-md-table-cell">Luas Tanam</th>
																	<th class="d-none d-md-table-cell">Selisih</th>
																	<th class="d-none d-md-table-cell">Wajib Produksi</th>
																	<th class="d-none d-md-table-cell">Jml Produksi</th>
																	<th class="d-none d-md-table-cell">Selisih</th>
																	<th class="d-table-cell d-xl-none"></th>
																</tr>
															</thead>

                                                            <tbody>
															<?php $no = 1; foreach($rekapdataPerusahaan as $user){
																  $luastanam = intval($user->luas_tanam);
																  $selisihtanam = intval($user->luas_tanam)-intval($user->kewajiban_tanam);
																  $jumlahproduksi = intval($user->jmlproduksi);
																  $selisihproduksi = intval($user->jmlproduksi)-intval($user->kewajiban_produksi);
																?>
																<tr>
																	<td style="text-align: center"><?php echo $no++ ?></td>
																	<td style="text-align: left"><?php echo $user->nama_perusahaan; ?></td>
																	<td style="text-align: left"><?php echo $user->nama_prov; ?></td>
																	<td style="text-align: left"><?php echo $user->nama_kab; ?></td>
																	<td style="text-align: left"><?php echo $user->nama_kec; ?></td>
																	<td style="text-align: left"><?php echo $user->nama_des; ?></td>
																	<td style="text-align: left"><?php echo $user->nama_kontak; ?></td>
																	<td style="text-align: left"><?php echo $user->hp_kontak; ?></td>
																	<td style="text-align: left"><?php echo intval($user->volume); ?></td>
																	<td style="text-align: left"><?php echo intval($user->kewajiban_tanam); ?></td>
																	<td style="text-align: left"><?php echo $luastanam; ?></td>
																	<td style="text-align: left"><?php echo $selisihtanam; ?></td>
																	<td style="text-align: left"><?php echo intval($user->kewajiban_produksi); ?></td>
																	<td style="text-align: left"><?php echo intval($user->jmlproduksi); ?></td>
																	<td style="text-align: left"><?php echo $selisihproduksi; ?></td>
																	<td class="d-table-cell d-xl-none">
																		<button type="button" class="btn btn-icon" data-fuse-bar-toggle="file-manager-info-sidebar">
																			<i class="icon icon-information-outline"></i>
																		</button>
																	</td>
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
                                            <!-- / WIDGET 10 -->
                                        </div>
                                        <!-- / WIDGET GROUP -->
                                    </div>
                                    <div class="tab-pane fade p-6" id="team-members-tab-pane" role="tabpanel" aria-labelledby="team-members-tab">

                                        <!-- WIDGET GROUP -->
                                        <div class="widget-group row no-gutters">

                                            <!-- WIDGET 1 -->
                                            <div class="col-12">

                                                <div class="card">

                                                    <div class="widget-header px-4 py-6 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h5">Daftar L.O</span>
                                                        </div>

                                                        <div>
                                                            <span class="badge badge-danger"><?php $jmlUser=count($get_all_lo);echo $jmlUser?> members</span>
                                                        </div>

                                                    </div>

                                                    <div class="divider"></div>

                                                    <div class="widget-content table-responsive">

                                                        <table class="table">

                                                            <thead>
                                                                <tr>
                                                                    <th></th>
																	<th>NAMA</th>
																	<th>PERUSAHAAN</th>
																	<th>E-Mail</th>
																	<th>HANDPHONE</th>
																	<th>STATUS</th>
																</tr>
                                                            </thead>
															<tbody>
															<?php $no = 1; foreach($get_all_lo as $user){
															  // status active
															  if($user->is_active == '1'){$is_active = '<a href="'.base_url('auth/deactivate/'.$user->id_users).'" class="btn btn-xs btn-success">ACTIVE</a>';}
															  else{$is_active = '<a href="'.base_url('auth/activate/'.$user->id_users).'" class="btn btn-xs btn-danger">INACTIVE</a>';}
															?>
																<tr>
																<td><img class="avatar" src="<?php echo base_url('uploads/user/'.$user->photo) ?>"></td>
																<td><span><?php echo $user->name ?></span></td>
																<td><span><?php echo $user->nama_perusahaan ?></span></td>
																<td><span><?php echo $user->email ?></span></td>
																<td><span><?php echo $user->phone ?></span></td>
																<td><span><?php echo $is_active ?></span></td>
                                                                </tr>
																<?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- WIDGET 1 -->
                                        </div>
                                    </div>
									
									
                                </div>

                            </div>
                            <!-- / CONTENT -->

                        </div>

                        <!--aside class="page-sidebar custom-scrollbar" data-fuse-bar="dashboard-project-sidebar" data-fuse-bar-media-step="lg" data-fuse-bar-position="right">
                            < !-- WIDGET GROUP -- >
                            <div class="widget-group">
								<div class="widget widget-logo">
										<div class="user-info flex-column row flex-lg-row align-items-center no-gutters pl-4 py-8">
											<img style="position: relative; display: inline-block; left: 50%; transform: translate(-50%);" class="profile-image avatar huge mr-6" src="<?php echo $this->session->logo_perusahaan ?>" width="150px">
										</div>
									
								</div>
                                < !-- NOW WIDGET -- >
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
                                < !-- / NOW WIDGET -- >

                                <div class="divider"></div>

                                < !-- WEATHER WIDGET -- >
                                <div class="widget widget-weather">
									<div id="jam-digital">
										<div id="hours"><p id="jam"></p></div>
										<div id="minute"><p id="menit"></p></div>
										<div id="second"><p id="detik"></p></div>
									</div>
                                </div>
                                < !-- / WEATHER WIDGET -- >

                                <div class="divider"></div>
                            </div>
                            < !-- / WIDGET GROUP -- >
                        </aside-->
                    </div>

                     <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/apps/dashboard/project.js"></script> -->

                </div>
                

  <?php $this->load->view('back/template/footer'); ?>
	
	</div>
            <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
            </div>

        </div>
	 <!-- <script type="text/javascript" src="<?php echo base_url('assets/node_modules/') ?>datatables.net/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/') ?>datatables-responsive/js/dataTables.responsive.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables/dataTables.min.css"> -->
	  
	  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables/Buttons-1.6.2/css/buttons.dataTables.min.css">
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/JSZip-2.5.0/jszip.min.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
	  <script src="<?php echo base_url('assets/plugins/') ?>datatables/Buttons-1.6.2/js/buttons.html5.min.js"></script>
	  <script type="text/javascript">
        $(document).ready(function(){
			$("#bln").change(function (){
				var selBulan = $(this).val();
				$.ajax({
				url : "<?php echo site_url('dashboard/ajax_grafik_bulanan');?>/"+selBulan,
				type: "GET",
				dataType: "JSON",
				success: function(data)
					{
						var data = {
							"widget5"      : {
								"title"     : "Realisasi dan Produksi",
								"ranges"    : {
									"TW": "Minggu Ini",
									"LW": "Minggu Lalu",
									"2W": "2 Minggu Lalu",
									"3W": "3 Minggu Lalu"
								},
								"mainChart" : {
									"3W": [
										{
											"key"   : "Tanam",
											"values": data.jsonchartRW3
										},
										{
											"key"   : "Produksi",
											"values": data.jsonchartPW3
										}
									],
									"2W": [
										{
											"key"   : "Tanam",
											"values": data.jsonchartRW2
										},
										{
											"key"   : "Produksi",
											"values": data.jsonchartPW2
										}
									],
									"LW": [
										{
											"key"   : "Tanam",
											"values": data.jsonchartRW1 
										},
										{
											"key"   : "Produksi",
											"values": data.jsonchartPW1 
										}
									],
									"TW": [
										{
											"key"   : "Tanam",
											"values": data.jsonchartRW 
										},
										{
											"key"   : "Produksi",
											"values": data.jsonchartPW 
										}
									]
								},
								"supporting": {
									"pks"   : {
										"label": "PKS",
										"count": {
											"3W": data.jmlchartPKSw3,
											"2W": data.jmlchartPKSw2,
											"LW": data.jmlchartPKSw1,
											"TW": data.jmlchartPKS
										},
										"chart": {
											"3W": [
												{
													"key"   : "PKS",
													"values": [
														{
															"x": 0,
															"y": 3
														},
														{
															"x": 1,
															"y": 8
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
											"3W": data.jmlverifw3,
											"2W": data.jmlverifw2,
											"LW": data.jmlverifw1,
											"TW": data.jmlverif
										},
										"chart": {
											"3W": [
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
											"3W": data.jmlchartrealisasiw3,
											"2W": data.jmlchartrealisasiw2,
											"LW": data.jmlchartrealisasiw1,
											"TW": data.jmlchartrealisasi
										},
										"chart": {
											"3W": [
												{
													"key"   : "Re-Tanam",
													"values": [
														{
															"x": 0,
															"y": 2
														},
														{
															"x": 1,
															"y": 3
														},
														{
															"x": 2,
															"y": 8
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
											"3W": data.jmlbrealisasiw3,
											"2W": data.jmlbrealisasiw2,
											"LW": data.jmlbrealisasiw1,
											"TW": data.jmlbrealisasi
										},
										"chart": {
											"3W": [
												{
													"key"   : "Beban Tanam",
													"values": [
														{
															"x": 0,
															"y": 2
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
															"y": 8
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
											"3W": data.jmlchartproduksiw3,
											"2W": data.jmlchartproduksiw2,
											"LW": data.jmlchartproduksiw1,
											"TW": data.jmlchartproduksi
										},
										"chart": {
											"3W": [
												{
													"key"   : "Produksi",
													"values": [
														{
															"x": 0,
															"y": 6
														},
														{
															"x": 1,
															"y": 2
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
															"y": 6
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
											"3W": data.jmlbproduksiw3,
											"2W": data.jmlbproduksiw2,
											"LW": data.jmlbproduksiw1,
											"TW": data.jmlbproduksi
										},
										"chart": {
											"3W": [
												{
													"key"   : "beban-produksi",
													"values": [
														{
															"x": 0,
															"y": 2
														},
														{
															"x": 1,
															"y": 7
														},
														{
															"x": 2,
															"y": 6
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
					
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error get data from ajax');
					}
				})
			})
			
			
            $("#provinsi").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })
			
			$("#kabupaten").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+$(this).val();
                $('#kecamatan').load(url);
                return false;
            })
			
			$("#kecamatan").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
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
				map.setZoom(12);
				map.setCenter(marker.getPosition());
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
	<script type="text/javascript">
	$.extend( true, $.fn.dataTable.defaults, {
    "searching": false,
    "ordering": false
	} );
	 
	 
	$(document).ready(function() {
		$('#dataTable').DataTable({
		//"responsive": true,
        scrollX: true,
		});
	});
	
	$(document).ready(function() {
    $('#table-data').DataTable( {
		scrollX: true,
        responsive: true,
        dom: 'Brtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
		} );
	} );
	
</script>
<script>
 /**
     * Widget 5
     */
	 var donutChart = {
        options: {
            chart: {
                type      : 'pieChart',
                height    : 300,
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
                transitionDuration: 400,
                legend            : {
                    margin: {
                        top   : 5
                    }
                }
            }
        },

        data: [
            {
                key: 'Verified',
                y  : <?php echo intval($bltanam) ?>
            },
            {
                key: 'UnVerified',
                y  : <?php echo intval($bttanam) ?>
            }
        ]

    };
	var donutChart2 = {
        options: {
            chart: {
                type      : 'pieChart',
                height    : 300,
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
                transitionDuration: 350,
                legend            : {
                    margin: {
                        top   : 5
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
				y  : <?php if(empty($get_jml_riph_admin->v_beban_tanam)){echo '0';}else{echo $get_jml_riph_admin->v_beban_tanam;} ?>
            }
        ]

    };
	var donutChart3 = {
        options: {
            chart: {
                type      : 'pieChart',
                height    : 300,
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
                transitionDuration: 350,
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
                y  : <?php if(empty($get_jml_riph_admin->v_beban_produksi)){echo '0';}else{echo $get_jml_riph_admin->v_beban_produksi;} ?>
            }
        ]

    };
	
	var donutChart4 = {
        options: {
            chart: {
                type      : 'pieChart',
                height    : 300,
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
                transitionDuration: 350,
                legend            : {
                    margin: {
                        top   : 5
                    }
                }
            }
        },

        data: [
            {
                key: 'Rencana',
                y  : <?php echo $JmlrencanaTanam ?>
            },
            {
                key: 'Beban',
                y  : <?php echo $JmlBebanRIPH ?>
            }
        ]

    };
	
	var data = {
        "widget5"      : {
            "title"     : "Realisasi dan Produksi",
            "ranges"    : {
                "TW": "Minggu Ini",
                "LW": "Minggu Lalu",
                "2W": "2 Minggu Lalu",
                "3W": "3 Minggu Lalu"
            },
            "mainChart" : {
                "3W": [
                    {
                        "key"   : "Tanam",
                        "values": <?php echo $jsonchartRW3; ?> 
                    },
                    {
                        "key"   : "Produksi",
                        "values": <?php echo $jsonchartPW3; ?>
                    }
                ],
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
                        "3W": <?php echo intval($jmlchartPKSw3); ?>,
                        "2W": <?php echo intval($jmlchartPKSw2); ?>,
                        "LW": <?php echo intval($jmlchartPKSw1); ?>,
                        "TW": <?php echo intval($jmlchartPKS); ?>
                    },
                    "chart": {
						"3W": [
                            {
                                "key"   : "PKS",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 3
                                    },
                                    {
                                        "x": 1,
                                        "y": 8
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
                        "3W": <?php echo intval($jmlverifw3); ?>,
                        "2W": <?php echo intval($jmlverifw2); ?>,
                        "LW": <?php echo intval($jmlverifw1); ?>,
                        "TW": <?php echo intval($jmlverif); ?>
                    },
                    "chart": {
                        "3W": [
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
                        "3W": <?php echo intval($jmlchartrealisasiw3); ?>,
                        "2W": <?php echo intval($jmlchartrealisasiw2); ?>,
                        "LW": <?php echo intval($jmlchartrealisasiw1); ?>,
                        "TW": <?php echo intval($jmlchartrealisasi); ?>
                    },
                    "chart": {
                        "3W": [
                            {
                                "key"   : "Re-Tanam",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 2
                                    },
                                    {
                                        "x": 1,
                                        "y": 3
                                    },
                                    {
                                        "x": 2,
                                        "y": 8
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
                        "3W": <?php echo intval($jmlbrealisasiw3); ?>,
                        "2W": <?php echo intval($jmlbrealisasiw2); ?>,
                        "LW": <?php echo intval($jmlbrealisasiw1); ?>,
                        "TW": <?php echo intval($jmlbrealisasi); ?>
                    },
                    "chart": {
                        "3W": [
                            {
                                "key"   : "Beban Tanam",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 2
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
                                        "y": 8
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
                        "3W": <?php echo intval($jmlchartproduksiw3); ?>,
                        "2W": <?php echo intval($jmlchartproduksiw2); ?>,
                        "LW": <?php echo intval($jmlchartproduksiw1); ?>,
                        "TW": <?php echo intval($jmlchartproduksi); ?>
                    },
                    "chart": {
                        "3W": [
                            {
                                "key"   : "Produksi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 6
                                    },
                                    {
                                        "x": 1,
                                        "y": 2
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
                                        "y": 6
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
                        "3W": <?php echo intval($jmlbproduksiw3); ?>,
                        "2W": <?php echo intval($jmlbproduksiw2); ?>,
                        "LW": <?php echo intval($jmlbproduksiw1); ?>,
                        "TW": <?php echo intval($jmlbproduksi); ?>
                    },
                    "chart": {
                        "3W": [
                            {
                                "key"   : "beban-produksi",
                                "values": [
                                    {
                                        "x": 0,
                                        "y": 2
                                    },
                                    {
                                        "x": 1,
                                        "y": 7
                                    },
                                    {
                                        "x": 2,
                                        "y": 6
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
                height            : 175,
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
                showLegend        : false,
                transitionDuration: 250
            });

        chart.legend.margin({
                top   : 5,
            }
        );
		
		function centerText() {
			return function() {
			var svg = d3.select("svg");

			var donut = svg.selectAll("g.nv-slice").filter(
			  function (d, i) {
				return i == 0;
			  }
			);
			
			// Insert first line of text into middle of donut pie chart
			donut.insert("text", "g")
				.text("<?php echo round($bpersen,0,PHP_ROUND_HALF_UP) ?> %")
				.attr("class", "middle")
				.attr("text-anchor", "middle")
					.attr("dy", "0em")
					.style("fill", "#000");
		  }
		}
		
        var chartd3 = d3.select('#donut-chart svg')
        var chartData;

        initChart();

        nv.utils.windowResize(chart.update);

        function initChart()
        {
            chartData = donutChart.data;
            chartd3.datum(chartData).call(chart);
			chartd3.call(centerText());
        }

        return chart;
    });
	
	nv.addGraph(function ()
    {
        var chart = nv.models.pieChart()
            .options({
                type              : 'pieChart',
                height            : 175,
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
                showLegend        : false,
                transitionDuration: 250
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
				.text("<?php echo round($persentaseDonutTanam,0,PHP_ROUND_HALF_UP) ?> %")
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
                height            : 175,
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
                showLegend        : false,
                transitionDuration: 250
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
				.text("<?php echo round($persentaseDonutProduksi,0,PHP_ROUND_HALF_UP) ?> %")
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
	
	nv.addGraph(function ()
    {
        var chart = nv.models.pieChart()
            .options({
                type              : 'pieChart',
                height            : 175,
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
                showLegend        : false,
                transitionDuration: 250
            });

        chart.legend.margin({
                top   : 5,
            }
        );

        

        var chartd4 = d3.select('#donut-chart4 svg')
		function centerText4() {
			return function() {
			var svg4 = d3.select('#donut-chart4 svg');

			var donut4 = svg4.selectAll("g.nv-slice").filter(
			  function (d, i) {
				return i == 0;
			  }
			);
			
			// Insert first line of text into middle of donut pie chart
			donut4.insert("text", "g")
				.text("<?php echo round($PersentaseCPCL,0,PHP_ROUND_HALF_UP) ?> %")
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
            chartData = donutChart4.data;
            chartd4.datum(chartData).call(chart);
			chartd4.call(centerText4());
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
    </main>
</body>

</html>
