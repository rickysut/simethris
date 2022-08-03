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
	<?php if($get_all_jumlah_realisasi->luas_tanam != 0){
		$bltanam=$get_all_jumlah_realisasi->luas_tanam;
	}else{
		$bltanam=0;
	}
		if(isset($get_target_tanam_user->beban_tanam) and !is_null($get_target_tanam_user->beban_tanam)){
			$bttanam=$get_target_tanam_user->beban_tanam;
		}else{
			$bttanam = 0;
		}
		if($bttanam != 0)
		{
			$bpersen = ($bltanam/$bttanam)*100;
		}else{
			$bpersen = 0;
		}
	?>
	
	<?php if($jumlah_produksi->jml_produksi !=0){
			$jproduksi=$jumlah_produksi->jml_produksi;
	}else{
		$jproduksi=0;
	}
		if(isset($get_target_produksi_user->beban_produksi) and !is_null($get_target_produksi_user->beban_produksi)){
			$bproduksi=$get_target_produksi_user->beban_produksi;
		}else{
			$bproduksi=0;
		}
		if($bproduksi != 0)
		{
		$ppersen = ($jproduksi/$bproduksi)*100;
		}else{
		$ppersen = 0;
		$bproduksi = 0;
		}
	?>
	<?php
		$mydata = array();
		$data = array("value" => intval($bproduksi),"label" => "Beban Produksi","color"=>'#91cf95',"highlight"=>'#9be8a1' );
		$data1 = array("value" => intval($jproduksi),"label" => "Jumlah Produksi", "color"=>'#07f53b',"highlight"=>'#28802e');
		array_push($mydata,array($data),array($data1));
		$json_donat2 = json_encode($mydata, true);
		$hasiljson_donat2 = str_replace('[', '', $json_donat2);
		$hasiljson_donat3 = str_replace(']', '', $hasiljson_donat2);
	?>
	<?php
		$mydatatnam = array();
		$datatnam = array("value" => intval($bttanam),"label" => "Beban Tanam", "color"=>'#91cf95',"highlight"=>'#9be8a1');
		$data1tnam = array("value" => intval($bltanam),"label" => "Realisasi Tanam", "color"=>'#07f53b',"highlight"=>'#28802e');
		array_push($mydatatnam,array($datatnam),array($data1tnam));
		$json_donattnam2 = json_encode($mydatatnam, true);
		$hasiljson_donattnam2 = str_replace('[', '', $json_donattnam2);
		$hasiljson_donattnam3 = str_replace(']', '', $hasiljson_donattnam2);
	?>
	<div class="row">
	<div class="col-md-12">
		<div class="box">
		     <div class="box box-success">
				<div class="box-header with-border">
					  <h3 class="box-title">Garfik Perbandingan</h3>
					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					  </div>
				</div>
			   <div class="box-body no-padding">
                 <div class="row">
				 <div class="col-lg-4 text-center" style="border-right: 0px solid #f4f4f4">
					<h4 align="center">Realisasi Tanam</h4>
                  <p align="center"><canvas id="pieChart2"></canvas></p>
				  <button type="button" class="btn btn-outline-success btn-sm"><?php echo intval($bttanam)?> Ha</button><a  href="listproduksi" class="btn btn-success btn-sm"><?php echo intval($bltanam)?> Ha</a>
                </div>
                <div class="col-lg-4 text-center" style="border-right: 0px solid #f4f4f4">
				<h4 align="center">Realisasi Produksi</h4>
                  <p align="center"><canvas id="pieChart"></canvas></p>
				  <button type="button" class="btn btn-outline-success btn-sm"><?php echo intval($bproduksi)?> Ton</button><a  href="listproduksi" class="btn btn-success btn-sm"><?php echo intval($jproduksi)?> Ton</a>
                </div>
				<div class="col-lg-4 col-sm-4">
						<div class="pad box-pane-right bg-green" style="min-height: 250px">
							<div class="box box-success box-solid">
								<div class="box-header with-border">
								  <h3 class="box-title">DATA RIPH PUSAT</h3>

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
             <!-- <div class="box-header with-border">
              <h3 class="box-title">Laporan Lengkap Bulanan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">CP/CL</a></li>
                    <li><a href="#">Realisasi</a></li>
                    <li><a href="#">Produksi</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Kewajiban</a></li>
                  </ul>
                </div>
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
				  
                  <div class="progress-group">
                    <span class="progress-text">Realisasi Tanam</span>
                    <span class="progress-number"><b><?php echo $bltanam ?></b>/<?php echo $bttanam ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: <?php echo $bpersen ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
				  
                  <div class="progress-group">
                    <span class="progress-text">Realisasi Produksi</span>
                    <span class="progress-number"><b><?php echo $jproduksi ?></b>/<?php echo $bproduksi ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?php echo $ppersen ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group 
                  <div class="progress-group">
                    <span class="progress-text">Terverifikasi</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  
                  <div class="progress-group">
                    <span class="progress-text">Belum Terverifikasi</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                   -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
				<!--
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REALISASI</span>
                  </div>
                  
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL PRODUKSI</span>
                  </div>
                  
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL POKTAN</span>
                  </div>
                 
                </div>
                
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">120</h5>
                    <span class="description-text">TOTAL PETANI</span>
                  </div>
                  
                </div> -->
              </div>
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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
								$allpoly[] = $user->realisasi_polygon;}
								$json_array = json_encode($allpoly);
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
                <table id="dataTable" class="table table-bordered table-striped">
              <thead>
                <tr>
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
                <?php $no = 1; foreach($get_all_cpclc as $user){
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
	<script>
  function format ( d ) {
    console.log(d.product);
    var trs='';
    $.each($(d.product),function(key,value){
    	trs+='<tr><td>'+value+'</td><td>'+d.price[key]+'</td></tr>';
    })
    // `d` is the original data object for the row
    return '<table class="table table-border table-hover">'+
           '<thead>'+
              '<th>Product</th>'+
            	'<th>Price</th>'+  
           '</thead><tbody>' +
           	
           trs+
        '</tbody></table>';
	}
  $(document).ready( function () {
    $('#dataTable').DataTable();
  });
  $('#dataTable tbody').on('click', 'td.details-control', function () {
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
  </script>
  
  <script type="text/javascript">
	var map;
	var infoWindow;
	var decodedPolygon = [];
	
	function initialize() {
		var mapOptions = {
			zoom: 5,
			center: new google.maps.LatLng(-0.789275, 113.92132700000002),
			mapTypeId: google.maps.MapTypeId.SATELITE
		};

		map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);
		var markers = <?php echo $json_array; ?>;
		var bounds = new google.maps.LatLngBounds();
		for (var i = 0; i < markers.length; i++) {
			var encodedPath = markers[i];
			decodedPolygon = google.maps.geometry.encoding.decodePath(encodedPath);
			
			for (var j = 0; j < decodedPolygon.length; j++) {
				bounds.extend(decodedPolygon[j]);
			}
			var dataPolygon = new google.maps.Polygon({
				paths: decodedPolygon,
				strokeColor: '#FF0000',
				strokeOpacity: 0.8,
				strokeWeight: 2,
				fillColor: '#FF0000',
				fillOpacity: 0.35
			});

			dataPolygon.setMap(map);
		}
		//map.fitBounds(bounds);
		
		google.maps.event.addListener(dataPolygon, 'click', showArrays);

		infoWindow = new google.maps.InfoWindow();
	}

	/** @this {google.maps.Polygon} */
	function showArrays(event) {

		// Since this polygon has only one path, we can call getPath()
		// to return the MVCArray of LatLngs.
		var vertices = this.getPath();

		var contentString = '<b>Realisasi Tanam </b><br>' +
			'Lokasi: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
			'<br>';

		// Iterate over the vertices.
		for (var i = 0; i < vertices.getLength(); i++) {
			var xy = vertices.getAt(i);
			contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' + xy.lng();
		}

		// Replace the info window's content and position.
		infoWindow.setContent(contentString);
		infoWindow.setPosition(event.latLng);

		infoWindow.open(map);
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
    tooltipTemplate      : '<%=value %> <%=label%> users'
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
    tooltipTemplate      : '<%=value %> <%=label%> users'
  };
  pieChart.Doughnut(PieData, pieOptions);
});
</script>
<script>
  $(function () {
  var pieChartCanvas = $('#pieChart3').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [
    {
      value    : 800,
      color    : '#f39c12',
      highlight: '#f39c12',
      label    : 'FireFox'
    },
    {
      value    : 600,
      color    : '#00c0ef',
      highlight: '#00c0ef',
      label    : 'Safari'
    }
  ];;
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
    tooltipTemplate      : '<%=value %> <%=label%> users'
  };
  pieChart.Doughnut(PieData, pieOptions);
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
 
  </script>