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
										<span class="h5"><i class="icon icon-box-upload"></i> Upload</span>
                                    </div>
                                    <!-- / BREADCRUMB -->

                                </div>
                                <!-- / HEADER CONTENT -->

                                <!-- ADD FILE BUTTON -->

								<div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
								  <a id="add-file-button" href="<?php echo $add_action ?>" class="btn btn-danger btn-fab">
									<i class="icon icon-plus"></i>
								  </a>
								</div>
								
                                <!-- / ADD FILE BUTTON -->

                            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
                            <div class="page-content custom-scrollbar">
                                <!-- LIST VIEW -->
								
                                <table id="file-data-table" class="table list-view">

                                    <thead>

                                        <tr>
                                            <th></th>
                                            <th>Judul</th>
                                            <th class="d-none d-md-table-cell">Deskripsi</th>
                                            <th class="d-none d-sm-table-cell">Tanggal</th>
                                            <th class="d-none d-sm-table-cell">Pengunggah</th>
											<th class="d-none d-sm-table-cell">Preview</th>
											<th class="d-none d-sm-table-cell">Edit</th>
											<th class="d-none d-sm-table-cell">Delete</th>
											<th class="d-none d-sm-table-cell">Download</th>
                                            <th class="d-table-cell d-xl-none"></th>
                                        </tr>

                                    </thead>

                                    <tbody>
										<?php $query = $this->db->get_where('users',array('id_users'=>$this->session->userdata('id_users')));
										foreach ($query->result() as $value) {
											$edit = '<a href="'.base_url('upload/update/'.$value->photo).'" data-toggle="tooltip" title="Edit File" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
										    $delete = '<a href="'.base_url('upload/delete/'.$value->photo).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
										    $almDownload = '<a href="'.base_url('/uploads/user/'.$value->photo).'"</a>';
											if(pathinfo($value->photo, PATHINFO_EXTENSION)=='pdf'){
												$gmbthumb = 'src="'.base_url('/assets/images/pdf_thumb.png').'"';
											}else if(pathinfo($value->photo, PATHINFO_EXTENSION)=='docx'){
												$gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
											}else{
												$gmbthumb = 'src="'.base_url('/uploads/user/'.$value->photo).'"';
												
											} 
											$Cariektensi = explode(".", $value->photo);	
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
											  }?>
											<tr>
												<td class="file-icon">
													<?php echo $iconfile; ?>
												</td>
												<td class="name">Photo User / L.O</td>
												<td class="type d-none d-md-table-cell">Photo User / L.O</td>
												<td class="tanggal d-none d-sm-table-cell"><?php echo $value->created_at;?></td>
												<td class="oleh d-none d-sm-table-cell"><?php echo $value->username;?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $gmbthumb;?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $edit; ?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $delete; ?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $almDownload; ?></td>
												<!-- <td class="last-modified d-none d-lg-table-cell"> </td> -->
												<td class="d-table-cell d-xl-none">
													<button type="button" class="btn btn-icon" data-fuse-bar-toggle="file-manager-info-sidebar">
														<i class="icon icon-information-outline"></i>
													</button>
												</td>
											</tr>
											<?php if($this->session->usertype==3){
											    if(pathinfo($value->file_sk, PATHINFO_EXTENSION)=='pdf'){
													$gmbthumb = 'src="'.base_url('/assets/images/pdf_thumb.png').'"';
												}else if(pathinfo($value->file_sk, PATHINFO_EXTENSION)=='docx'){
													$gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
												}else{
													$gmbthumb = 'src="'.base_url('/uploads/file_sk/'.$value->file_sk).'"';
													
												} 
												$edit = '<a href="'.base_url('upload/update/'.$value->file_sk).'" data-toggle="tooltip" title="Edit File" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
										        $delete = '<a href="'.base_url('upload/delete/'.$value->file_sk).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
												$almDownload = '<a href="'.base_url('/uploads/file_sk/'.$value->file_sk).'"</a>';
												$Cariektensi = explode(".", $value->file_sk);	
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
											}
											?>
											<tr>
												<td class="file-icon">
													<?php echo $iconfile; ?>
												</td>
												<td class="name">SK User</td>
												<td class="type d-none d-md-table-cell">Surat Keterangan / Surat Tugas L.O</td>
												<td class="tanggal d-none d-sm-table-cell"><?php echo $value->created_at;?></td>
												<td class="oleh d-none d-sm-table-cell"><?php echo $value->username;?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $gmbthumb;?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $edit; ?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $delete; ?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $almDownload; ?></td>
												<!-- <td class="last-modified d-none d-lg-table-cell"> </td> -->
												<td class="d-table-cell d-xl-none">
													<button type="button" class="btn btn-icon" data-fuse-bar-toggle="file-manager-info-sidebar">
														<i class="icon icon-information-outline"></i>
													</button>
												</td>
											</tr>
											<?php if($this->session->usertype==3){
												if(pathinfo($value->file_ktp, PATHINFO_EXTENSION)=='pdf'){
													$gmbthumb = 'src="'.base_url('/assets/images/pdf_thumb.png').'"';
												}else if(pathinfo($value->file_ktp, PATHINFO_EXTENSION)=='docx'){
													$gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
												}else{
													$gmbthumb = 'src="'.base_url('/uploads/file_ktp/'.$value->file_ktp).'"';
												} 
												$edit = '<a href="'.base_url('upload/update/'.$value->file_ktp).'" data-toggle="tooltip" title="Edit File" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
										        $delete = '<a href="'.base_url('upload/delete/'.$value->file_ktp).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
												$almDownload = '<a href="'.base_url('/uploads/file_ktp/'.$value->file_ktp).'"</a>';
												$Cariektensi = explode(".", $value->file_ktp);	
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
											}
											?>
											<tr>
												<td class="file-icon">
													<?php echo $iconfile; ?>
												</td>
												<td class="name">KTP User</td>
												<td class="type d-none d-md-table-cell">File KTP User / L.O</td>
												<td class="tanggal d-none d-sm-table-cell"><?php echo $value->created_at;?></td>
												<td class="oleh d-none d-sm-table-cell"><?php echo $value->username;?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $gmbthumb;?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $edit; ?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $delete; ?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $almDownload; ?></td>
												<!-- <td class="last-modified d-none d-lg-table-cell"> </td> -->
												<td class="d-table-cell d-xl-none">
													<button type="button" class="btn btn-icon" data-fuse-bar-toggle="file-manager-info-sidebar">
														<i class="icon icon-information-outline"></i>
													</button>
												</td>
											</tr>
										<?php } ?>
										<?php $query = $this->db->get_where('cpcl',array('id_users'=>$this->session->userdata('id_users')));
										foreach ($query->result() as $value) {
											if(pathinfo($value->lampiran, PATHINFO_EXTENSION)=='pdf'){
												$gmbthumb = 'src="'.base_url('/assets/images/pdf_thumb.png').'"';
											}else if(pathinfo($value->lampiran, PATHINFO_EXTENSION)=='docx'){
												$gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
											}else{
												$gmbthumb = 'src="'.base_url('/uploads/pks/'.$value->lampiran).'"';
											} 
											$almDownload = '<a href="'.base_url('/uploads/pks/'.$value->lampiran).'"</a>';
											$Cariektensi = explode(".", $value->lampiran);	
											  $ektensi = $Cariektensi[0];
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
											  }?>
											<tr>
												<td class="file-icon">
													<?php echo $iconfile; ?>
												</td>
												<td class="name">PKS</td>
												<td class="type d-none d-md-table-cell">Lampiran / Surat Perjanjian PKS</td>
												<td class="tanggal d-none d-sm-table-cell"><?php echo $value->created_at;?></td>
												<td class="oleh d-none d-sm-table-cell"><?php echo $value->id_users;?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $gmbthumb;?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $edit; ?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $delete; ?></td>
												<td class="gmb d-none d-sm-table-cell"><?php echo $almDownload; ?></td>
												<!-- <td class="last-modified d-none d-lg-table-cell"> </td> -->
												<td class="d-table-cell d-xl-none">
													<button type="button" class="btn btn-icon" data-fuse-bar-toggle="file-manager-info-sidebar">
														<i class="icon icon-information-outline"></i>
													</button>
												</td>
											</tr>
										<?php } ?>
										<?php $no = 1; foreach($get_by_username as $row){
										  // action
										  $edit = '<a href="'.base_url('upload/update/'.$row->file_id).'" data-toggle="tooltip" title="Edit File" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
										  $delete = '<a href="'.base_url('upload/delete/'.$row->file_id).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
										  if(pathinfo($row->file_data, PATHINFO_EXTENSION)=='pdf'){
											  $gmbthumb = 'src="'.base_url('/assets/images/pdf_thumb.png').'"';
										  }else if(pathinfo($row->file_data, PATHINFO_EXTENSION)=='docx'){
											  $gmbthumb = 'src="'.base_url('/assets/images/docx_thumb.png').'"';
										  }else{
											  if($row->file_type == 'USER'){
												  $gmbthumb = 'src="'.base_url('/uploads/user/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/user/'.$row->file_data).'"</a>';
											  }
											  else if($row->file_type == 'REALISASI'){
												  $gmbthumb = 'src="'.base_url('/uploads/realisasi/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/realisasi/'.$row->file_data).'"</a>';
											  }
											  else if($row->file_type == 'PRODUKSI'){
												  $gmbthumb = 'src="'.base_url('/uploads/produksi/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/produksi/'.$row->file_data).'"</a>';
											  }
											  else if($row->file_type == 'PKS'){
												  $gmbthumb = 'src="'.base_url('/uploads/pks/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/pks/'.$row->file_data).'"</a>';
											  }
											  else if($row->file_type == 'KTP'){
												  $gmbthumb = 'src="'.base_url('/uploads/file_ktp/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/file_ktp/'.$row->file_data).'"</a>';
											  }
											  else if($row->file_type == 'FORM5'){
												  $gmbthumb = 'src="'.base_url('/uploads/file_form5/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/file_form5/'.$row->file_data).'"</a>';
											  }
											  else if($row->file_type == 'RIPH'){
												  $gmbthumb = 'src="'.base_url('/uploads/file_riph/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/file_riph/'.$row->file_data).'"</a>';
											  }
											  else if($row->file_type == 'SK'){
												  $gmbthumb = 'src="'.base_url('/uploads/file_sk/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/file_sk/'.$row->file_data).'"</a>';
											  }
											  else{
												  $gmbthumb = 'src="'.base_url('/uploads/user/'.$row->file_data).'"';
												  $almDownload = '<a href="'.base_url('/uploads/user/'.$row->file_data).'"</a>';
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
                                            <td class="oleh d-none d-sm-table-cell"><?php echo $row->file_oleh;?></td>
											<td class="gmb d-none d-sm-table-cell"><?php echo $gmbthumb;?></td>
											<td class="gmb d-none d-sm-table-cell"><?php echo $edit; ?></td>
											<td class="gmb d-none d-sm-table-cell"><?php echo $delete; ?></td>
											<td class="gmb d-none d-sm-table-cell"><?php echo $almDownload; ?></td>
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
                            <!-- / CONTENT -->
                        </div>
						<aside class="page-sidebar custom-scrollbar" data-fuse-bar="file-manager-info-sidebar" data-fuse-bar-position="right" data-fuse-bar-media-step="lg">
                            <!-- SIDEBAR HEADER -->
                            <div class="header bg-secondary text-auto d-flex flex-column justify-content-between p-6">

                                <!-- TOOLBAR -->
                                <div class="toolbar row no-gutters align-items-center justify-content-end">
									<div id="download"></div>
									
                                    <div id="hapus"></div>
									
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
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 5 ],
                "visible": false
            },
			{
                "targets": [ 6 ],
                "visible": false
            },
			{
                "targets": [ 7 ],
                "visible": false
            },
			{
                "targets": [ 8 ],
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
		 $('#gambar').html('<img width="250px" '+data[5]+'>');
		 $('#tglunggah').html('<span>di unggah</span>: '+data[3]);
		 var AlamatEdit = $(data[6]).attr('href');
		 var AlamatHapus = $(data[7]).attr('href');
		 var AlamatDownload = $(data[8]).attr('href');
		 $('#download').html('<a type="button" href="'+AlamatDownload+'" class="btn btn-icon"><i class="icon-download"></i></a>');
		 $('#hapus').html('<a type="button" href="'+AlamatHapus+'" class="btn btn-icon"><i class="icon-delete"></i></a>');
		 $('#deskripsi').html(data[2]);
		 $('#owner').html(data[4]);
		 $('#lokasifile').html(data[5]);
		 
    });

});
</script>
</div>
    </main>
</body>

</html>