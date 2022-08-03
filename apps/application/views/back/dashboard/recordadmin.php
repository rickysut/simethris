<!-- Small boxes (Stat box) -->
<section class="content">
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
			$bpersen = ($bltanam/$bttanam)*100;
		}else{
			$bpersen = 0;
		}
	?>
	
	<?php if($get_jml_realisasi_verifikasi->jml_verifikasi !=0){
			$jproduksi=$get_jml_realisasi_verifikasi->jml_verifikasi;
	}else{
		$jproduksi=0;
	}
		$bproduksi=$get_jml_realisasi_blverifikasi->jml_verifikasi;
		if($bproduksi != 0)
		{
		$ppersen = ($jproduksi/$bproduksi)*100;
		}else{
		$ppersen = 0;
		}
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
		$mydata = array();
		$data = array("value" => intval($get_jml_real_tanam->jmlluas),"label" => "Ha Realisasi Tanam", "color"=>'#07f53b',"highlight"=>'#28802e');
		$data1 = array("value" => intval($get_jml_beban_tanam->jmlbeban),"label" => "Ha Beban Realisasi Tanam", "color"=>'#91cf95',"highlight"=>'#9be8a1');
		array_push($mydata,array($data),array($data1));
		$json_donat2 = json_encode($mydata, true);
		$hasiljson_donat2 = str_replace('[', '', $json_donat2);
		$hasiljson_donat3 = str_replace(']', '', $hasiljson_donat2);
	?>
	<?php
		$mydata1 = array();
		if(intval($get_jml_beban_produksi->jmlbeban) !=0){
			$jbebanProduksi = intval($get_jml_beban_produksi->jmlbeban);
		}else{
			$jbebanProduksi=0;
		}
		if($jbebanProduksi != 0){
			$persentasejbeban = (intval($get_jml_all_produksi->jmlproduksi)/$jbebanProduksi)*100;
		}
		$datapersenproduksi=0;
		$data1 = array("value" => intval($get_jml_all_produksi->jmlproduksi),"label" => " Ton Sudah Produksi", "color"=>'#00ff11',"highlight"=>'#28802e') ;
		$data11 = array("value" => intval($get_jml_beban_produksi->jmlbeban),"label" => " Ton Beban Produksi", "color"=>'#91cf95',"highlight"=>'#9be8a1');
		array_push($mydata1,array($data1),array($data11));
		$json_donat21 = json_encode($mydata1, true);
		$hasiljson_donat21 = str_replace('[', '', $json_donat21);
		$hasiljson_donat31 = str_replace(']', '', $hasiljson_donat21);
	?>
	<?php
		$mydatatnam = array();
		$datatnam = array("value" => intval($bttanam),"label" => "PKS Terverifikasi", "color"=>'#00ff11',"highlight"=>'#28802e');
		$data1tnam = array("value" => intval($bltanam),"label" => "PKS Belum Terverifikasi", "color"=>'#91cf95',"highlight"=>'#9be8a1');
		array_push($mydatatnam,array($datatnam),array($data1tnam));
		$json_donattnam2 = json_encode($mydatatnam, true);
		$hasiljson_donattnam2 = str_replace('[', '', $json_donattnam2);
		$hasiljson_donattnam3 = str_replace(']', '', $hasiljson_donattnam2);
	?>
	<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo number_format($get_jml_import->vimport, 0, ".", ".") ?><sup style="font-size: 14px"> Ton</sup></h3>

              <p>Volume Import</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="data_perusahaan" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo number_format($get_jml_real_tanam->jmlluas, 0, ".", ".") ?><sup style="font-size: 14px"> Ha</sup></h3>

              <p>Realisasi Tanam</p>
            </div>
            <div class="icon">
              <i class="ion ion-map"></i>
            </div>
            <a href="listrealisasi" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo number_format($get_jml_all_produksi->jmlproduksi, 0, ".", ".") ?><sup style="font-size: 14px"> Ton</sup></h3>

              <p>Realisasi Produksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-leaf"></i>
            </div>
            <a href="listproduksi" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>65</h3>

              <p>Perusahaan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="data_perusahaan" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
	<div class="row">
	<div class="col-md-12">
		<div class="box">
		     <div class="box box-success">
				<div class="box-header with-border">
					  <h3 class="box-title">Grafik Perbandingan</h3>
					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					  </div>
				</div>
			   <div class="box-body no-padding">
                 <div class="row">
					<div class="col-lg-3 text-center" style="border-right: 0px solid #f4f4f4">
						<h4 align="center">PKS Terverifikasi</h4>
						<p align="center"><canvas id="pieChart2" ></canvas></p>
						<button type="button" class="btn btn-outline-success btn-sm"><?php echo intval($bltanam)?> PKS</button><button type="button" class="btn btn-success btn-sm"><?php echo intval($bttanam)?> PKS</button>
					</div>
						
					<div class="col-lg-2 text-center" style="border-right: 0px solid #f4f4f4">
						<h4 align="center">Realisasi Tanam</h4>
						<p align="center"><canvas id="pieChart" ></canvas></p>
						<button type="button" class="btn btn-outline-success btn-sm"><?php echo intval($get_jml_beban_tanam->jmlbeban)?> Ha</button><a  href="listrealisasi" class="btn btn-success btn-sm"><?php echo intval($get_jml_real_tanam->jmlluas)?> Ha</a>
					</div>
						
					<div class="col-lg-3 text-center" style="border-right: 0px solid #f4f4f4">
						<h4 align="center">Produksi</h4>
						<p align="center"><canvas id="pieChart3" align="center" ></canvas></p>
						<button type="button" class="btn btn-outline-success btn-sm"><?php echo intval($get_jml_beban_produksi->jmlbeban)?> Ton</button><a  href="listproduksi" class="btn btn-success btn-sm"><?php echo intval($get_jml_all_produksi->jmlproduksi)?> Ton</a>
					</div>
										
					<div class="col-lg-4 col-sm-4">
						<div class="pad box-pane-right bg-green" style="min-height: 250px">
							<div class="box box-success box-solid">
								<div class="box-header with-border">
								  <h3 class="box-title">DATA RIPH</h3>

								  <div class="box-tools pull-right">
									<a href="#" class="small-box-footer">
									  <i class="fa fa-arrow-circle-right"></i>
									</a>
								  </div>
								  <!-- /.box-tools -->
								</div>
								<!-- /.box-header -->
								<div class="box-footer no-padding">
								  <ul class="nav nav-stacked">
									<li><a href="#">Jumlah Pengajuan RIPH <span class="pull-right badge bg-blue"><?php echo number_format($get_jml_riph->jmlpengajuan, 0, ".", ".") ?> Ton</span></a></li>
									<li><a href="#">Jumlah Kewajiban Tanam <span class="pull-right badge bg-aqua"><?php echo number_format($get_jml_riph->jmltargettanam, 0, ".", ".") ?> Ha</span></a></li>
									<li><a href="#">Jumlah Kewajiban Produksi <span class="pull-right badge bg-green"><?php echo number_format($get_jml_riph->jmltargetproduksi, 0, ".", ".") ?> Ton</span></a></li>
									<li><a href="#">Jumlah Perusahaan Penerima <span class="pull-right badge bg-red"><?php echo number_format($get_jml_riph->jmlperusahaan, 0, ".", ".") ?></span></a></li>
								  </ul>
								</div>
							</div>
							
						</div>
					</div>
				 </div>
				</div>
            </div>
            </div>
		</div>
	</div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Lengkap Bulanan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Grafik Produksi</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="min-height:250px"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Penyelesaian Sasaran</strong>
                  </p>
				  <?php $j_cpcl_verif=$get_jml_cpcl_verifikasi->jml_verifikasi;
						$j_cpcl_bverif=$get_jml_cpcl_blverifikasi->jml_verifikasi;
						$j_total= $j_cpcl_verif + $j_cpcl_bverif;
						if($j_total != 0)
						{
							$bpersen = ($j_cpcl_verif/$j_total)*100;
						}else{
							$ppersen = 0;
						}
				  ?>
                  <div class="progress-group">
                    <span class="progress-text">PKS Terverifikasi</span>
                    <span class="progress-number"><b><?php echo $j_cpcl_verif ?></b>/<?php echo $j_total ?></span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: <?php echo $bpersen ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
				  <?php $j_r_verif=$get_jml_realisasi_verifikasi->jml_verifikasi;
						$j_r_bverif=$get_jml_realisasi_blverifikasi->jml_verifikasi;
						$j_rtotal= $j_r_verif + $j_r_bverif;
						if($j_rtotal != 0)
						{
							$brpersen = ($j_r_verif/$j_rtotal)*100;
						}else{
							$brpersen = 0;
						}
				  ?>
                  <div class="progress-group">
                    <span class="progress-text">Realisasi Tanam Terverifikasi</span>
                    <span class="progress-number"><b><?php echo $j_r_verif ?></b>/<?php echo $j_rtotal ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?php echo $brpersen ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
				  <?php $j_p_verif=$get_jml_produksi_verifikasi->jml_verifikasi;
						$j_p_bverif=$get_jml_produksi_blverifikasi->jml_verifikasi;
						$j_ptotal= $j_p_verif + $j_p_bverif;
						if($j_ptotal != 0)
						{
							$bppersen = ($j_p_verif/$j_ptotal)*100;
						}else{
							$bppersen = 0;
						}
				  ?>
                  <div class="progress-group">
                    <span class="progress-text">Produksi Terverifikasi</span>
                    <span class="progress-number"><b><?php echo $j_p_verif ?></b>/<?php echo $j_ptotal ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?php echo $bppersen ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group 
                  <div class="progress-group">
                    <span class="progress-text">Belum Terverifikasi</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div> -->
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
	  <div class="row">
        <div class="col-md-12">
          <div class="box">
              <div class="box-header with-border">
              <h3 class="box-title">DATA SEBARAN PRODUKSI BAWANG PUTIH</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="panel-body">
                <form id="form-filter" class="form-horizontal">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group"><label>Provinsi</label>
							<?php echo form_dropdown('', $get_all_combobox_provinsi, '', $provinsi) ?>
						</div>
					  </div>
					  <div class="col-sm-4">
						<div class="form-group"><label>Kabupaten</label>
						  <select name="kabupaten" class="form-control" id="kabupaten">
							<option value=''>Pilih Kabupaten</option>
						  </select>
						</div>
					  </div>
					  <div class="col-sm-4">
						<div class="form-group"><label>Kecamatan</label>
						  <select name="kecamatan" class="form-control" id="kecamatan">
							<option>Select Kecamatan</option>
						  </select>
						</div>
					  </div>
					</div>
					<div class="form-group">
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
					</form>
            </div>
			
             <table id="table" class="table table-striped table-bordered compact" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="text-align: center"></th>
					<th style="text-align: center">No</th>
                    <th style="text-align: center">Nama Perusahaan</th>
                    <th style="text-align: center">Provinsi</th>
                    <th style="text-align: center">Kabupaten</th>
                    <th style="text-align: center">Kecamatan</th>
                    <th style="text-align: center">Desa</th>
                    <th style="text-align: center">Nama Kontak</th>
					<th style="text-align: center">Telp Kontak</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    
                </tr>
            </tfoot>
        </table>
            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Lokasi Tanam</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="nav-tabs-custom">
						<ul class="nav nav-tabs pull-right">
						  <li class="active"><a href="#tab_1-1" data-toggle="tab">Penanda / Marker</a></li>
						  <li><a href="#tab_2-2" data-toggle="tab">Polygon</a></li>
						  <li class="pull-left header"><i class="fa fa-map"></i> Marker & Polygon</li>
						</ul>
						<div class="tab-content">
						  <div class="tab-pane active" id="tab_1-1" height="350px">
							<?php echo $map['html']; ?>
						  </div>
						  <!-- /.tab-pane -->
						  <div class="tab-pane" id="tab_2-2">
							<?php 
							    $allpoly=array();
								foreach($polygonKu as $user){
								$allpoly[] = $user->realisasi_polygon;
								$allinfo[] = 'Perusahaan : <b>'.$user->nama_perusahaan.'</b><br>Pengelolaan : '.$user->namapengelola.' <br>Pelaksana/Petani : '.$user->nama_pelaksana.' <br>Alamat : '.$user->nama_prov.'-'.$user->nama_kab.'-'.$user->nama_kec.'-'.$user->nama_des;
								}
								$json_array = json_encode($allpoly);
								$json_arrayinfo = json_encode($allinfo);
							?>
							<div class="form-group">
								<!-- <?php echo form_input($mypoly, $allpoly) ?> -->
								<div id="map-canvas" style="width:100%;height:380px;"></div>
								<div id="info"></div>
							</div>
						  </div>
						  <!-- /.tab-pane -->
						  <!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Progress Verifikasi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered dt-responsive">
              <thead>
                <tr>
				  <!-- <th style="text-align: center"></th> -->
                  <th style="text-align: center;background-color:#0080ff;vertical-align:middle"><font color="white">NO</th>
                  <th style="text-align: center;background-color:#0080ff;vertical-align:middle"><font color="white">Nama Perusahaan</th>
                  <th style="text-align: center;background-color:#0080ff"><font color="white">Tahap 1 <br><sup style="font-size: 10px">(Pengajuan)</sup></th>
				  <th style="text-align: center;background-color:#0080ff"><font color="white">Tahap 2 <br><sup style="font-size: 10px">(Verif Tanam)</sup></th>
                  <th style="text-align: center;background-color:#0080ff"><font color="white">Tahap 3 <br><sup style="font-size: 10px">(verif Produksi)</sup></th>
                  <th style="text-align: center;background-color:#0080ff"><font color="white">Tahap 4 <br><sup style="font-size: 10px">(Ket. Lunas)</sup></th>
                  <th style="text-align: center;background-color:#0080ff"><font color="white">Tahapan <br><sup style="font-size: 10px">Status</sup></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($get_all_cpcl_admin as $user){
                ?>
				
                  <tr>
					<!-- <td style="text-align: center" class="details-control"></td> -->
                    <td style="text-align: center"><?php echo $no++ ?></td>
                    <td style="text-align: left"><?php echo $user->nama_perusahaan ?></td>
					<?php if($user->ststahap1 == '1'){$gaya1='style="text-align: center;background-color:forestgreen"';$myicon='<i class="fa fa-check-square-o"></i>';$tahap=1;$statusna=true;}
					else if($user->ststahap1 == '2'){$gaya1='style="text-align: center;background-color:darkorange"';$myicon='<i class="fa fa-exclamation-triangle"></i>';$tahap=1;$statusna=false;}
					else if($user->ststahap1 == '3'){$gaya1='style="text-align: center;background-color:red"';$myicon='<i class="fa fa-times-circle"></i>';$tahap=1;$statusna=false;}
					else if($user->ststahap1 == '0'){$gaya1='style="text-align: center;background-color:#0080ff"';$myicon='<i class="fa fa-hourglass-half"></i>';$tahap=1;$statusna=false;}
					else{$gaya1='style="text-align: center;background-color:white"';$myicon='<i class=""></i>';$tahap=1;$statusna=false;}
					?>
                    <td <?php echo $gaya1 ?>><font color="white"><?php if(!is_null($user->tgltahap1)){echo $myicon.' '.date("d-m-Y",strtotime($user->tgltahap1));} ?><br><sup style="font-size: 10px"><?php if(!is_null($user->tgltahap1)){echo date("H:i:s",strtotime($user->tgltahap1));} ?></sup></td>
					<?php if($user->ststahap2 == '1'){$gaya2='style="text-align: center;background-color:forestgreen"';$myicon='<i class="fa fa-check-square-o"></i>';$tahap=2;$statusna=true;}
					else if($user->ststahap2 == '2'){$gaya2='style="text-align: center;background-color:darkorange"';$myicon='<i class="fa fa-exclamation-triangle"></i>';$tahap=1;$statusna=false;}
					else if($user->ststahap2 == '3'){$gaya2='style="text-align: center;background-color:red"';$myicon='<i class="fa fa-times-circle"></i>';$tahap=1;$statusna=false;}
					else if($user->ststahap2 == '0'){$gaya2='style="text-align: center;background-color:#0080ff"';$myicon='<i class="fa fa-hourglass-half"></i>';$tahap=1;$statusna=false;}
					else{$gaya2='style="text-align: center;background-color:white"';$myicon='<i class=""></i>';$tahap=1;$statusna=false;}
					?>
					<td <?php echo $gaya2 ?>><font color="white"><?php if(!is_null($user->tgltahap2)){echo $myicon.' '.date("d-m-Y",strtotime($user->tgltahap2));} ?><br><sup style="font-size: 10px"><?php if(!is_null($user->tgltahap2)){echo date("H:i:s",strtotime($user->tgltahap2));} ?></sup></td>
					<?php if($user->ststahap3 == '1'){$gaya3='style="text-align: center;background-color:forestgreen"';$myicon='<i class="fa fa-check-square-o"></i>';$tahap=3;$statusna=true;}
					else if($user->ststahap3 == '2'){$gaya3='style="text-align: center;background-color:darkorange"';$myicon='<i class="fa fa-exclamation-triangle"></i>';$tahap=2;$statusna=false;}
					else if($user->ststahap3 == '3'){$gaya3='style="text-align: center;background-color:red"';$myicon='<i class="fa fa-times-circle"></i>';$tahap=2;$statusna=false;}
					else if($user->ststahap3 == '0'){$gaya3='style="text-align: center;background-color:#0080ff"';$myicon='<i class="fa fa-hourglass-half"></i>';$tahap=2;$statusna=false;}
					else{$gaya3='style="text-align: center;background-color:white"';$myicon='<i class=""></i>';$tahap=2;$statusna=false;}
					?>
					<td <?php echo $gaya3 ?>><font color="white"><?php if(!is_null($user->tgltahap3)){echo $myicon.' '.date("d-m-Y",strtotime($user->tgltahap3));} ?><br><sup style="font-size: 10px"><?php if(!is_null($user->tgltahap3)){echo date("H:i:s",strtotime($user->tgltahap3));} ?></sup></td>
                    <td style="text-align: left">-</td>
					<?php if($statusna and $tahap=3){$gaya='style="text-align: center;background-color:green"';$tahapan=$tahap;}
						else if($statusna and $tahap=2){$gaya='style="text-align: center;background-color:green"';$tahapan=$tahap;}
						else if($statusna and $tahap=1){$gaya='style="text-align: center;background-color:green"';$tahapan=$tahap;}
						else{$tahapan=$tahap-1;
						if($tahapan=1){$gaya=$gaya1;}
						else if($tahapan=2){$gaya=$gaya2;}
						else if($tahapan=3){$gaya=$gaya3;}
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
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
			<div class="box-footer with-border">
              <div class="row">
				
                <div class="col-sm-3 col-xs-6">
				<div style="background:forestgreen; text-align: center;"><font color="white">
                  <div class="description-block border-right">
                    <span class="description-percentage text-white"><i class="fa fa-check-square-o"></i></span>
                    <h5 class="description-header">Status</h5>
                    <span class="description-text">TERVERIFIKASI</span>
                  </div>
                  </div>
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div style="background:darkorange; text-align: center;"><font color="white">
                  <div class="description-block border-right">
                    <span class="description-percentage text-white"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="description-header">Status</h5>
                    <span class="description-text">PENDING</span>
                  </div>
                  </div>
                  
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div style="background:red; text-align: center;"><font color="white">
                  <div class="description-block border-right">
                    <span class="description-percentage text-white"><i class="fa fa-times-circle"></i></span>
                    <h5 class="description-header">Status</h5>
                    <span class="description-text">DITOLAK</span>
                  </div>
                 </div>
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div style="background:#0080ff; text-align: center;"><font color="white">
                  <div class="description-block border-right">
                    <span class="description-percentage text-white"><i class="fa fa-hourglass-half"></i></span>
                    <h5 class="description-header">Status</h5>
                    <span class="description-text">DALAM PROSES</span>
                  </div>
                </div> 
				</div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
	<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyCkQkJ319YpiVABFKwvI23zFA6i4cg30S0"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> 
    <!--	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/') ?>Datatables-net/datatables.min.css"/>
  <script type="text/javascript" src="<?php echo base_url('assets/plugins/') ?>Datatables-net/datatables.min.js"></script> -->
	<script>
  $(document).ready( function () {
    $('#dataTable').DataTable({
		"scrollX": false,
	});
  });
  </script>
  <script type="text/javascript">
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="10" cellspacing="15" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td style="text-align: center">Volume Import</td>'+'<td style="text-align: center">Beban Tanam</td>'+'<td style="text-align: center">Luas Tanam</td>'+ '<td style="text-align: center">Kewajiban Produksi</td>'+'<td style="text-align: center">Jumlah Produksi</td>'+
            
        '</tr>'+
        '<tr>'+
            '<td style="text-align: right">'+d[8]+' Ton</td>'+'<td style="text-align: right">'+d[9]+' Ha</td>'+'<td style="text-align: right">'+d[10]+' Ha</td>'+'<td style="text-align: right">'+d[12]+' Ton</td>'+'<td style="text-align: right">'+d[13]+' Ton</td>'+			
        '</tr>'+
    '</table>';
}

var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 
		//"scrollX": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
		
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('dashboard/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.nama_prov = $('#provinsi').val();
                data.nama_kab = $('#kabupaten').val();
                data.nama_kec = $('#kecamatan').val();
            }
        },
		"columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
			{ "data": [0] },
            { "data": [1] },
            { "data": [2] },
            { "data": [3] },
            { "data": [4] },
			{ "data": [5] },
			{ "data": [6] },
			{ "data": [7] }
        ],
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 1 ], //first column / numbering column
            "orderable": false //set not orderable
        },
        ]
    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });

 $('#table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
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
			mapTypeId: google.maps.MapTypeId.HYBRID
		};

		map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);
		var markers = <?php echo $json_array; ?>;
		var infoWindowContent = <?php echo $json_arrayinfo; ?>;
		var bounds = new google.maps.LatLngBounds();
		for (var i = 0; i < markers.length; i++) {
			var encodedPath = markers[i];
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
  $(function () {
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [<?php echo $hasiljson_donat3; ?>];
  var pieOptions     = {
    segmentShowStroke    : true,
    segmentStrokeColor   : '#fff',
    segmentStrokeWidth   : 1,
    percentageInnerCutout: 50, 
    animationSteps       : 100,
    animationEasing      : 'easeOutBounce',
    animateRotate        : true,
    animateScale         : false,
    responsive           : true,
    maintainAspectRatio  : false,
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    tooltipTemplate      : '<%=value %> <%=label%>'
  };
  pieChart.Doughnut(PieData, pieOptions);
});
</script>
<script type="text/javascript">
  $(function () {
  var pieChartCanvas = $('#pieChart2').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [<?php echo $hasiljson_donattnam3; ?>];;
  var pieOptions     = {
    segmentShowStroke    : true,
    segmentStrokeColor   : '#fff',
    segmentStrokeWidth   : 1,
    percentageInnerCutout: 50,
    animationSteps       : 100,
    animationEasing      : 'easeOutBounce',
    animateRotate        : true,
    animateScale         : false,
    responsive           : true,
    maintainAspectRatio  : false,
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    tooltipTemplate      : '<%=value %> <%=label%>'
  };
  pieChart.Doughnut(PieData, pieOptions);
});
</script>
<script>
  $(function () {
  var pieChartCanvas = $('#pieChart3').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [<?php echo $hasiljson_donat31; ?>];
  var pieOptions     = {
    segmentShowStroke    : true,
    segmentStrokeColor   : '#fff',
    segmentStrokeWidth   : 1,
    percentageInnerCutout: 50,
    animationSteps       : 100,
    animationEasing      : 'easeOutBounce',
    animateRotate        : true,
    animateScale         : false,
    responsive           : true,
    maintainAspectRatio  : false,
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    tooltipTemplate      : '<%=value %> <%=label%>'
  };
  pieChart.Doughnut(PieData, pieOptions);
});
</script>
<script>
        $(document).ready(function(){
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
 var densityCanvas = document.getElementById("salesChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 14;

var realisasiData = {
  label: 'Realisasi Tanam (Ha)',
  data: [<?php
                if (count($get_jml_tanam)>0) {
                   foreach ($get_jml_tanam as $data2) {
                    echo $data2->jmltanam . ", ";
                  }
                }
              ?>],
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var produksiData = {
  label: 'Produksi (Ton)',
  data: [<?php
                if (count($get_jml_produksi)>0) {
                   foreach ($get_jml_produksi as $data1) {
                    echo $data1->jmlproduksi . ", ";
                  }
                }
              ?>],
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var BawangData = {
  labels: [<?php
			for($i = 1; $i < 13; $i++){
				echo "'" .bulan($i) ."',";
			}
          ?>],
  datasets: [realisasiData, produksiData]
};

var chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: BawangData,
  options: chartOptions
});
  </script>