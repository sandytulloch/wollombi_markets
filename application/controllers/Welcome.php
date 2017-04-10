<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //we need to call PHP's session object to access it through CI
class Welcome extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->helper('form');
   $this->load->helper('url');
 }
 
 function index()
 {
 	// dbg(get_user());
 	render('Welcome/home');
 	// dbg('yay');
 }

 function hidden_page(){
 	requires_login();
 	dbg('yay');
 }

 
}
 
?>