<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('asset/') ?>images/favicon.png">
    <title>simeTHRIS - Sistem Monitoring Wajib Tanam Hortikultura Strategis</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('asset/') ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url('asset/') ?>plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url('asset/') ?>plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?php echo base_url('asset/') ?>plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url('asset/') ?>plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Vector CSS 
    <link href="<?php echo base_url('asset/') ?>plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />-->
    <!-- Custom CSS -->
    <link href="<?php echo base_url('asset/template/back/') ?>css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url('asset/template/back/') ?>css/colors/blue.css" id="theme" rel="stylesheet">
    
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
	<script type="text/css" rel="stylesheet" src="<?php echo base_url() ?>assets/node_modules/datatables-bs/css/dataTables.bootstrap.min.css"></script>
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/fuse-html/fuse-html.min.css" />
	
	
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css">
    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
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
    <!-- Data tables -->
    <!--<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-bs/js/dataTables.bootstrap.min.js"></script>-->
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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/main.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/bootstrap-waitingfor/build/bootstrap-waitingfor.min.js"></script> 
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->