<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function login()
 {
 	if($this->session->userdata('logged_in')){
 		dbg('logged_in');
 	}
 	else{
 		$this->load->helper(array('form'));
		render('Login/login');
 	}
 }



 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('', 'refresh');
 }

}

?>