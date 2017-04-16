<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
    $this->load->model('user');
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

 function create(){
 	$user_id = $this->user->create($this->input->post());



    $sess_array = array(
       'id' => $user_id,
       'username' => $this->input->post('username')
     );
     $this->session->set_userdata('logged_in', $sess_array);
     redirect('Bookings', 'refresh');
 }


public function check_unique(){
    // $this->input->post('email');
    // dbg($this->input->post());

    output_json($this->user->check_unique($this->input->post('email')));
}

}

?>