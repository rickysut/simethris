<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>simeTHRIS</title>
    
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon.ico" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">

    <!-- STYLESHEETS -->
    <style type="text/css">
            [fuse-cloak],
            .fuse-cloak {
                display: none !important;
            }
			
			.fileDiv {
			  position: relative;
			  overflow: hidden;
			}
			.upload_attachmentfile {
			  position: absolute;
			  opacity: 0;
			  right: 0;
			  top: 0;
			}
			.btnFileOpen {margin-top: -50px; }

			.direct-chat-warning .right>.direct-chat-text {
				background: #d2d6de;
				border-color: #d2d6de;
				color: #444;
				text-align: right;
			}
			.direct-chat-primary .right>.direct-chat-text {
				background: #3c8dbc;
				border-color: #3c8dbc;
				color: #fff;
				text-align: right;
			}
			.spiner {}
			.spiner .fa-spin { font-size:24px;}
			.attachmentImgCls{ width:250px; margin-left: 5px; cursor:pointer; }
			.gallery{ width:90%; float:left; }
			.gallery ul{ margin:0; padding:0; list-style-type:none;}
			.gallery ul li{ padding:3px; border:1px solid #ccc; float:left; margin:5px 5px; width:auto; height:auto;}
			#map {
			padding: 0;
			margin: 0;
			height: 100%;
		  }
		  #panel {
			width: 100%;
			font-family: Arial, sans-serif;
			font-size: 13px;
			float: right;
			margin: 10px;
		  }
		  #color-palette {
			clear: both;
		  }
		  .color-button {
			width: 24px;
			height: 24px;
			font-size: 0;
			margin: 2px;
			float: left;
			cursor: pointer;
		  }
		  #delete-button {
			margin-top: 10px;
			float: left;
		  }
		  #footer {
			margin: 5em auto;
			max-width: 90%;
			width: 40em;
			color: #fff;
			margin: 0;
			max-width: 100%;
			padding: 2em;
			text-align: center;
			width: 100%;
		  }

		  #footer img {
			height: 1em;
			border: none;
			vertical-align: middle;
			box-shadow: none;
		  }
    </style>

    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/icons/fuse-icon-font/style.css">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/animate.css/animate.min.css">
    <!-- PNotify -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/pnotify/dist/PNotifyBrightTheme.css">
    <!-- Nvd3 - D3 Charts -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/nvd3/build/nv.d3.min.css" />
	<!-- Chart.JS - Charts -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/chart.js/dist/Chart.min.css" />
    <!-- Perfect Scrollbar -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" />
	<!--script type="text/css" rel="stylesheet" src="<?php echo base_url() ?>assets/node_modules/datatables-bs/css/dataTables.bootstrap.min.css"></script-->
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/fuse-html/fuse-html.min.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css?v=1.01">
    <!-- / STYLESHEETS -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>font-awesome/css/font-awesome.min.css">
	<!--
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/node_modules/') ?>bootstrap/dist/css/bootstrap.min.css">
		
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables-net/DataTables-1.10.20/css/dataTables.bootstrap.min.css">
	-->
    <!-- JAVASCRIPT -->

  	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script-->
  	<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script-->


    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	
	<!-- ajaxfileupload 
	<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/fileupload/ajaxfileupload.js"></script>
    -->
	<!-- Mobile Detect -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/mobile-detect/mobile-detect.min.js"></script>
    
	<!-- Perfect Scrollbar -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    
	<!-- Popper.js -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
    
	<!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Nvd3 - D3 Charts -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/nvd3/build/nv.d3.min.js"></script>
	
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/chart.js/dist/Chart.min.js"></script>
	
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/circles.min.js"></script>
    <!-- DataTables 
	<script type="text/javascript" src="<?php echo base_url('assets/plugins/') ?>Datatables-net/datatables.min.js"></script>
	-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/DataTables-1.10.20/js/dataTables.bootstrap.js"></script>
 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/') ?>datatables-net/datatables.min.css"/>
	<!--
		
	<script type="text/javascript" src="<?php echo base_url('assets/node_modules/') ?>datatables.net/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
	-->
	<script src="<?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
	<!--
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"/>
	-->
	<!--

	<script src="<?php echo base_url('assets/plugins/') ?>datatables-net/DataTables-1.10.20/js/dataTables.bootstrap.min.js"></script>
	-->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	 <!-- PNotify -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotify.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotifyStyleMaterial.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotifyButtons.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotifyCallbacks.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotifyMobile.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotifyHistory.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotifyDesktop.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotifyConfirm.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/pnotify/dist/iife/PNotifyReference.js"></script>
    
	<!-- Fuse Html -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/fuse-html/fuse-html.min.js"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/main.js?v=1.06"></script>
	
	<!-- wait JS -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/bootstrap-waitingfor/build/bootstrap-waitingfor.min.js"></script> 
	
	<script src="https://maps.google.com/maps/api/js?v=3.40&libraries=places,drawing,encoding,geometry&key=AIzaSyC1ea90fk4RXPswzkOJzd17W3EZx_KNB1M"></script>
    
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar layout-below-footer" >
    <main>
        <div id="wrapper">
