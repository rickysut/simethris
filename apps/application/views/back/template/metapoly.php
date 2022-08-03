<!DOCTYPE html>
<html>
<head>
  <title><?php echo $page_title.' | '.$company_data->company_name ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/back/') ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/back/') ?>dist/css/skins/_all-skins.min.css">
  <!-- Include Bootstrap CSS 
  <link rel="stylesheet" href="css/bootstrap.css"> -->
  <!-- Include SmartWizard CSS -->
  <link href="<?php echo base_url('assets/plugins/') ?>smart-wizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />  
  <!-- Optional SmartWizard theme -->
  <link href="<?php echo base_url('assets/plugins/') ?>smart-wizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/company/'.$company_data->company_photo_thumb) ?>" />
<script src="<?php echo base_url('assets/plugins/jquery/dist') ?>/jquery.min.js"></script>
<script src="<?php echo base_url('assets/plugins/nested-datatable') ?>/nested.tables.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">	

    <style type="text/css">
      #map, html, body {
        padding: 0;
        margin: 0;
        height: 100%;
      }

      #panel {
        width: 200px;
        font-family: Arial, sans-serif;
        font-size: 13px;
        float: right;
        margin: 10px;
      }

      #color-palette {
        clear: both;
      }

      .color-button {
        width: 14px;
        height: 14px;
        font-size: 0;
        margin: 2px;
        float: left;
        cursor: pointer;
      }

      #delete-button {
        margin-top: 5px;
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
	.spiner{}
	.spiner .fa-spin { font-size:24px;}
	.attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
	.col-sm-3{padding-left:0px;}
	.col-sm-6{padding-top:22px;}
	.gallery{ width:90%; float:left; }
	.gallery ul{ margin:0; padding:0; list-style-type:none;}
	.gallery ul li{ padding:3px; border:1px solid #ccc; float:left; margin:5px 5px; width:auto; height:auto;}
    </style>
    
</head>
<body class="<?php echo $skins_template->value ?> sidebar-mini <?php echo $layout_template->value ?>">
