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
  <!-- Include SmartWizard CSS 
  <link href="<?php echo base_url('assets/plugins/') ?>smart-wizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />  
  <link href="<?php echo base_url('assets/plugins/') ?>smart-wizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" /> -->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/') ?>Datatables-net/datatables.min.css"/>
 
<script type="text/javascript" src="<?php echo base_url('assets/plugins/') ?>Datatables-net/datatables.min.js"></script>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/company/'.$company_data->company_photo_thumb) ?>" />
<script src="<?php echo base_url('assets/plugins/jquery/dist') ?>/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
<style type="text/css">
td.details-control {
    background: url('<?php echo base_url('assets/images/') ?>details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('<?php echo base_url('assets/images/') ?>details_close.png') no-repeat center center;
}
.container {
    width: 40%;
    margin: 15px auto;
}
</style>
	<?php echo $map['js']; ?>
</head>
<body class="<?php echo $skins_template->value ?> sidebar-mini <?php echo $layout_template->value ?>">
