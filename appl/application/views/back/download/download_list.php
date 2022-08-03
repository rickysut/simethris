<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">

                    <div id="file-manager" class="page-layout simple right-sidebar">

                        <div class="page-content-wrapper custom-scrollbar">

                            <!-- HEADER -->
                            <div class="page-header bg-primary text-auto p-6">

                                <!-- HEADER CONTENT-->
                                <div class="header-content d-flex flex-column justify-content-between">

                                    <!-- TOOLBAR -->
                                    <div class="toolbar row no-gutters justify-content-between">
										
                                        

                                        <div class="right-side row no-gutters">

                                         <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>   
											

                                        </div>

                                    </div>
                                    <!-- / TOOLBAR -->

                                    <!-- BREADCRUMB -->
                                    <div class="breadcrumb text-truncate row no-gutters align-items-center pl-0 pl-sm-20">

                                        <span class="h5"></i> Dashboard</span>
										<i class="icon-chevron-right separator"></i>
										<span class="h5"><i class="icon icon-file-document-box"></i> File Manager</span>
										<i class="icon-chevron-right separator"></i>
										<span class="h5"><i class="icon icon-box-upload"></i> Download</span>
                                    </div>
                                    <!-- / BREADCRUMB -->

                                </div>
                                <!-- / HEADER CONTENT -->

                                <!-- ADD FILE BUTTON -->

								<div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
								  
								</div>
								
                                <!-- / ADD FILE BUTTON -->

                            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
                            <div class="page-content custom-scrollbar">
								<!-- Tabed -->
								
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">Dokumen SK</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="budget-summary-tab" data-toggle="tab" href="#budget-summary-tab-pane" role="tab" aria-controls="budget-summary-tab-pane">Dokumen KTP</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="team-members-tab" data-toggle="tab" href="#team-members-tab-pane" role="tab" aria-controls="team-members-tab-pane">Dokumen Perusahaan</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
										<div class="widget-group row no-gutters">

                                            <!-- WIDGET 1 -->
                                            <div class="col-12">

                                                <div class="card">

                                                    <div class="widget-content table-responsive">
														<!-- LIST VIEW -->
														<table id="file-sk-data-table" class="table list-view">

															<thead>

																<tr>
																	<th></th>
																	<th>Nama Pengunggah</th>
																	<th class="d-none d-md-table-cell">Nama Perusahaan</th>
																	<th class="d-none d-sm-table-cell">Nama File</th>
																	<th class="d-none d-sm-table-cell">Preview</th>
																	<th class="d-none d-sm-table-cell">Action</th>
																	<th class="d-table-cell d-xl-none"></th>
																</tr>

															</thead>
															<tbody>
														 	  
 															  <?php 
															   		$no = 1; 
																	   if (!$get_all_files_sk) exit;
																	   foreach($get_all_files_sk as $row){
																  // action
																  //$edit = '<a href="'.base_url('upload/update/'.$row->file_id).'" data-toggle="tooltip" title="Edit File" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
																  //$delete = '<a href="'.base_url('upload/delete/'.$row->file_id).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
																  if(pathinfo($row->file_sk, PATHINFO_EXTENSION)=='pdf'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/pdf_thumb.png').'"';
																  }else if(pathinfo($row->file_sk, PATHINFO_EXTENSION)=='docx'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
																  }else if(pathinfo($row->file_sk, PATHINFO_EXTENSION)=='doc'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
																  }else{
																	  $gmbthumb = 'src="'.base_url('/uploads/file_sk/'.$row->file_sk).'"';
																	}
																	  $Cariektensi = explode(".", $row->file_sk);	
																	  $ektensi = $Cariektensi[1];
																	  if($ektensi == "pdf"){
																		  $iconfile = '<i class="icon-file-pdf"></i>';
																	  }
																	  elseif($ektensi == "docx"){
																		  $iconfile = '<i class="icon-file-word"></i>';
																	  }
																	  elseif($ektensi == "xlsx"){
																		  $iconfile = '<i class="icon-spreadsheet"></i>';
																	  }
																	  elseif($ektensi == "pptx"){
																		  $iconfile = '<i class="icon-file-powerpoint"></i>';
																	  }
																	  else{
																		  $iconfile = '<i class="icon-file-image"></i>';
																	  }
																  
																?>
																<tr>
																	<td class="file-icon">
																		<?php echo $iconfile; ?>
																	</td>
																	<td class="name"><?php echo $row->name;?></td>
																	<td class="type d-none d-md-table-cell"><?php echo $row->nama_perusahaan;?></td>
																	<td class="tanggal d-none d-sm-table-cell"><?php echo $row->file_sk;?></td>
																	<td class="gmb d-none d-sm-table-cell"><?php echo $gmbthumb;?></td>
																	<td class="gmb d-none d-sm-table-cell"><a href="<?php echo site_url('download/get_file/'.$row->file_sk);?>" class="btn btn-info">Download</a></td>
																	<td class="d-table-cell d-xl-none">
																		<button type="button" class="btn btn-icon" data-fuse-bar-toggle="file-manager-info-sidebar">
																			<i class="icon icon-information-outline"></i>
																		</button>
																	</td>
																</tr>
																<?php } ?>
															</tbody>
														</table>
														<!-- / LIST VIEW -->
													</div>
                                                </div>
                                            </div>
                                            <!-- WIDGET 1 -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-3" id="budget-summary-tab-pane" role="tabpanel" aria-labelledby="budget-summary-tab">
											<div class="widget-group row no-gutters">

                                            <!-- WIDGET 1 -->
                                            <div class="col-12">

                                                <div class="card">

                                                    <div class="widget-content table-responsive">
														<!-- LIST VIEW -->
														<table id="file-ktp-data-table" class="table list-view">

															<thead>

																<tr>
																	<th></th>
																	<th>Nama Pengunggah</th>
																	<th class="d-none d-md-table-cell">Nama Perusahaan</th>
																	<th class="d-none d-sm-table-cell">Nama File</th>
																	<th class="d-none d-sm-table-cell">Preview</th>
																	<th class="d-none d-sm-table-cell">Download</th>
																	<th class="d-table-cell d-xl-none"></th>
																</tr>

															</thead>
															<tbody>
															  <?php $no = 1; foreach($get_all_files_ktp as $row){
																  // action
																  //$edit = '<a href="'.base_url('upload/update/'.$row->file_id).'" data-toggle="tooltip" title="Edit File" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
																  //$delete = '<a href="'.base_url('upload/delete/'.$row->file_id).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
																  if(pathinfo($row->file_ktp, PATHINFO_EXTENSION)=='pdf'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/pdf_thumb.png').'"';
																  }else if(pathinfo($row->file_ktp, PATHINFO_EXTENSION)=='docx'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
																  }else if(pathinfo($row->file_ktp, PATHINFO_EXTENSION)=='doc'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
																  }else{
																		  $gmbthumb = 'src="'.base_url('/uploads/file_ktp/'.$row->file_ktp).'"';
																	  }
																	  $Cariektensi = explode(".", $row->file_ktp);	
																	  $ektensi = $Cariektensi[1];
																	  if($ektensi == "pdf"){
																		  $iconfile = '<i class="icon-file-pdf"></i>';
																	  }
																	  elseif($ektensi == "docx"){
																		  $iconfile = '<i class="icon-file-word"></i>';
																	  }
																	  elseif($ektensi == "xlsx"){
																		  $iconfile = '<i class="icon-spreadsheet"></i>';
																	  }
																	  elseif($ektensi == "pptx"){
																		  $iconfile = '<i class="icon-file-powerpoint"></i>';
																	  }
																	  else{
																		  $iconfile = '<i class="icon-file-image"></i>';
																	  }
																  
																?>
																<tr>
																	<td class="file-icon">
																		<?php echo $iconfile; ?>
																	</td>
																	<td class="name"><?php echo $row->name;?></td>
																	<td class="type d-none d-md-table-cell"><?php echo $row->nama_perusahaan;?></td>
																	<td class="tanggal d-none d-sm-table-cell"><?php echo $row->file_ktp;?></td>
																	<td class="gmb d-none d-sm-table-cell"><?php echo $gmbthumb;?></td>
																	<td class="gmb d-none d-sm-table-cell"><a href="<?php echo site_url('download/get_file/'.$row->file_ktp);?>" class="btn btn-info">Download</a></td>
																	
																	<!-- <td class="last-modified d-none d-lg-table-cell"> </td> -->
																	<td class="d-table-cell d-xl-none">
																		<button type="button" class="btn btn-icon" data-fuse-bar-toggle="file-manager-info-sidebar">
																			<i class="icon icon-information-outline"></i>
																		</button>
																	</td>
																</tr>
																<?php } ?>
															</tbody>
														</table>
														<!-- / LIST VIEW -->
													</div>
                                                </div>
                                            </div>
                                            <!-- WIDGET 1 -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-6" id="team-members-tab-pane" role="tabpanel" aria-labelledby="team-members-tab">
                                        <!-- WIDGET GROUP -->
                                        <div class="widget-group row no-gutters">

                                            <!-- WIDGET 1 -->
                                            <div class="col-12">

                                                <div class="card">
                                                    <div class="widget-content table-responsive">
														<!-- LIST VIEW -->
														<table id="file-data-table" class="table list-view">

															<thead>

																<tr>
																	<th></th>
																	<th>Judul</th>
																	<th class="d-none d-md-table-cell">Deskripsi</th>
																	<th class="d-none d-sm-table-cell">Tanggal</th>
																	<th class="d-none d-sm-table-cell">Preview</th>
																	<th class="d-none d-sm-table-cell">Pengunggah</th>
																	<th class="d-none d-sm-table-cell">Perusahaan</th>
																	<th class="d-none d-sm-table-cell">download</th>
																	<th class="d-table-cell d-xl-none"></th>
																</tr>

															</thead>
															<tbody>
															  <?php $no = 1; foreach($get_all_files as $row){
																  // action
																  $edit = '<a href="'.base_url('upload/update/'.$row->file_id).'" data-toggle="tooltip" title="Edit File" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
																  $delete = '<a href="'.base_url('upload/delete/'.$row->file_id).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
																  if(pathinfo($row->file_data, PATHINFO_EXTENSION)=='pdf'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/pdf_thumb.png').'"';
																  }else if(pathinfo($row->file_data, PATHINFO_EXTENSION)=='docx'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
																  }else if(pathinfo($row->file_data, PATHINFO_EXTENSION)=='doc'){
																	  $gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
																  }else{
																	  if($row->file_type == 'USER'){
																		  $gmbthumb = 'src="'.base_url('/uploads/user/'.$row->file_data).'"';
																	  }
																	  else if($row->file_type == 'REALISASI'){
																		  $gmbthumb = 'src="'.base_url('/uploads/realisasi/'.$row->file_data).'"';
																	  }
																	  else if($row->file_type == 'PRODUKSI'){
																		  $gmbthumb = 'src="'.base_url('/uploads/produksi/'.$row->file_data).'"';
																	  }
																	  else if($row->file_type == 'PKS'){
																		  $gmbthumb = 'src="'.base_url('/uploads/pks/'.$row->file_data).'"';
																	  }
																	  else if($row->file_type == 'KTP'){
																		  $gmbthumb = 'src="'.base_url('/uploads/file_ktp/'.$row->file_data).'"';
																	  }
																	  else if($row->file_type == 'FORM5'){
																		  $gmbthumb = 'src="'.base_url('/uploads/file_form5/'.$row->file_data).'"';
																	  }
																	  else if($row->file_type == 'RIPH'){
																		  $gmbthumb = 'src="'.base_url('/uploads/file_riph/'.$row->file_data).'"';
																	  }
																	  else if($row->file_type == 'SK'){
																		  $gmbthumb = 'src="'.base_url('/uploads/file_sk/'.$row->file_data).'"';
																	  }
																	  else{
																		  $gmbthumb = 'src="'.base_url('/uploads/user/'.$row->file_data).'"';
																	  }
																	  }
																	  $Cariektensi = explode(".", $row->file_data);	
																	  $ektensi = $Cariektensi[1];
																	  if($ektensi == "pdf"){
																		  $iconfile = '<i class="icon-file-pdf"></i>';
																	  }
																	  elseif($ektensi == "docx"){
																		  $iconfile = '<i class="icon-file-word"></i>';
																	  }
																	  elseif($ektensi == "xlsx"){
																		  $iconfile = '<i class="icon-spreadsheet"></i>';
																	  }
																	  elseif($ektensi == "pptx"){
																		  $iconfile = '<i class="icon-file-powerpoint"></i>';
																	  }
																	  else{
																		  $iconfile = '<i class="icon-file-image"></i>';
																	  }
																  
																?>
																<tr>
																	<td class="file-icon">
																		<?php echo $iconfile; ?>
																	</td>
																	<td class="name"><?php echo $row->file_judul;?></td>
																	<td class="type d-none d-md-table-cell"><?php echo $row->file_deskripsi;?></td>
																	<td class="tanggal d-none d-sm-table-cell"><?php echo $row->tanggal;?></td>
																	<td class="gmb d-none d-sm-table-cell"><?php echo $gmbthumb;?></td>
																	<td class="oleh d-none d-sm-table-cell"><?php echo $row->file_oleh;?></td>
																	<td class="oleh d-none d-sm-table-cell"><?php echo $row->nama_perusahaan;?></td>
																	<td class="gmb d-none d-sm-table-cell"><a href="<?php echo site_url('download/get_file/'.$row->file_id);?>" class="btn btn-info">Download</a></td>
																	<!-- <td class="last-modified d-none d-lg-table-cell"> </td> -->
																	<td class="d-table-cell d-xl-none">
																		<button type="button" class="btn btn-icon" data-fuse-bar-toggle="file-manager-info-sidebar">
																			<i class="icon icon-information-outline"></i>
																		</button>
																	</td>
																</tr>
																<?php } ?>
															</tbody>
														</table>
														<!-- / LIST VIEW -->
													</div>
                                                </div>
                                            </div>
                                            <!-- WIDGET 1 -->
                                        </div>
                                    </div>
                                </div>

								<!-- / Tabed -->
                            </div>
                            <!-- / CONTENT -->
                        </div>
						<aside class="page-sidebar custom-scrollbar" data-fuse-bar="file-manager-info-sidebar" data-fuse-bar-position="right" data-fuse-bar-media-step="lg">
                            <!-- SIDEBAR HEADER -->
                            <div class="header bg-secondary text-auto d-flex flex-column justify-content-between p-6">

                                <!-- TOOLBAR -->
                                <div class="toolbar row no-gutters align-items-center justify-content-end">
									
									
                                    <div id="download"></div>
									
                                    <button type="button" class="btn btn-icon">
                                        <i class="icon icon-dots-vertical"></i>
                                    </button>

                                </div>
                                <!-- / TOOLBAR -->

                                <!-- INFO -->
                                <div>

                                    <div id="namafile"></div>

                                    <div class="subtitle text-muted">
                                        <div id="tglunggah"></div>
                                    </div>

                                </div>
                                <!-- / INFO-->

                            </div>
                            <!-- / SIDEBAR HEADER -->

                            <!-- SIDENAV CONTENT -->
                            <div class="content">

                                <div class="file-details">

                                    <div class="preview file-icon row no-gutters align-items-center justify-content-center">
                                        <div id="gambar"></div>
                                    </div>
                                    <div class="title px-6 py-4">Info</div>

                                    <table class="table">

                                        <tr class="type">
                                            <th class="pl-6">Desc</th>
                                            <td><div id="deskripsi"></div></td>
                                        </tr>

                                        <tr class="size">
                                            <th class="pl-6">Size</th>
                                            <td>-</td>
                                        </tr>

                                        <tr class="location">
                                            <th class="pl-6">Location</th>
                                            <td><div id="lokasifile"></div></td>
                                        </tr>

                                        <tr class="owner">
                                            <th class="pl-6">Owner</th>
                                            <td><div id="owner"></div></td>
                                        </tr>

                                        
                                    </table>
                                </div>
                            </div>
                            <!-- / SIDENAV CONTENT -->
                        </aside>
					</div>
		</div>				

  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
</div>
<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
        <?php $this->load->view('back/template/quickpanel'); ?>
    </div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
<script>
	$(document).ready(function() {
		$('#file-data-table').DataTable( {
        "columnDefs": [
			{
                "targets": [ 4 ],
                "visible": false
            },
			{
                "targets": [ 7 ],
                "visible": false
            }
        ],
		responsive: true,
        dom       : 'frt<"dataTables_footer"ip>'
    });
    var table = $('#file-data-table').DataTable();
     
    $('#file-data-table tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
		 $('#namafile').html('<div class="title mb-2">'+data[1]+'</div>');
		 $('#gambar').html('<img width="250px" '+data[4]+'>');
		 $('#tglunggah').html('<span>di unggah</span>: '+data[3]);
		 var Alamatdownload = $(data[7]).attr('href');
		 $('#download').html('<a type="button" href="'+Alamatdownload+'" class="btn btn-icon"><i class="icon-download"></i></a>');
		 $('#deskripsi').html(data[2]);
		 $('#owner').html(data[5]);
		 $('#lokasifile').html(data[4]);
		 
    });
	
	$('#file-sk-data-table').DataTable( {
		"columnDefs": [
			{
                "targets": [ 4 ],
                "visible": false
            },
			{
                "targets": [ 5 ],
                "visible": false
            }
        ],
		responsive: true,
        dom       : 'frt<"dataTables_footer"ip>'
    });
    var tablesk = $('#file-sk-data-table').DataTable();
     
    $('#file-sk-data-table tbody').on('click', 'tr', function () {
        var datask = tablesk.row( this ).data();
		 $('#namafile').html('<div class="title mb-2">'+datask[3]+'</div>');
		 $('#gambar').html('<img width="250px" '+datask[4]+'>');
		 $('#tglunggah').html('<span>di unggah -</span>: ');
		 var Alamatdownload = $(datask[5]).attr('href');
		 $('#download').html('<a type="button" href="'+Alamatdownload+'" class="btn btn-icon"><i class="icon-download"></i></a>');
		 $('#deskripsi').html('<span>Scan SK Petugas</span>: ');
		 $('#owner').html(datask[1]);
		 $('#lokasifile').html(datask[3]);
		 
    });
	
	$('#file-ktp-data-table').DataTable( {
		"columnDefs": [
			{
                "targets": [ 4 ],
                "visible": false
            },
			{
                "targets": [ 5 ],
                "visible": false
            }
        ],
		responsive: true,
        dom       : 'frt<"dataTables_footer"ip>'
    });
    var tablektp = $('#file-ktp-data-table').DataTable();
     
    $('#file-ktp-data-table tbody').on('click', 'tr', function () {
        var dataktp = table.row( this ).data();
		 $('#namafile').html('<div class="title mb-2">'+dataktp[3]+'</div>');
		 $('#gambar').html('<img width="250px" '+dataktp[4]+'>');
		 $('#tglunggah').html('<span>di unggah -</span>: ');
		 var Alamatdownload = $(dataktp[5]).attr('href');
		 $('#download').html('<a type="button" href="'+Alamatdownload+'" class="btn btn-icon"><i class="icon-download"></i></a>');
		 $('#deskripsi').html('<span>Scan SK Petugas</span>: ');
		 $('#owner').html(dataktp[1]);
		 $('#lokasifile').html(dataktp[3]);
		 
    });
});
</script>
</div>
    </main>
</body>

</html>