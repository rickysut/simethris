<?php

class My404 extends CI_Controller

{

   public function __construct()

   {

       parent::__construct();
	   
	$this->load->model('r_verifikasi');
	$this->load->model('ChatModel');

   }



   public function index()

   {

       $this->output->set_status_header('404');

       $this->load->view('back/dashboard/myp404');    
	   }

}