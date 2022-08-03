<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function initialize_elfinder($value=''){
	$CI =& get_instance();
	$CI->load->helper('path');
	$opts = array(
	    //'debug' => true, 
	    'roots' => array(
	      array( 
	        'driver' => 'LocalFileSystem', 
	        'path'   => './files/', 
	        'URL'    => site_url('files').'/'
	        // more elFinder options here
	      ) 
	    )
	);

	return $opts;
}
?>