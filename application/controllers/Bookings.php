<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */



    public function __construct()
    {
            parent::__construct();
            $this->load->model('sites_model');
            $this->load->model('reservations_model');
            $this->load->model('user');
            $this->load->helper('url_helper');
    }


	public function index()
	{
		//$this->load->view('welcome_message');
		// dbg($_SESSION);

 		requires_login();
 		render('bookings/landing');
	}

	public function create_new(){
		$this->reservations_model->new_reservation();
		$this->create();

	}

	public function create(){
		// $output['data']['user'] = get_user('username');
		$output['data']['reservation'] = $this->reservations_model->get_current_reservation();
		$output['data']['user'] = $this->user->get_user(get_user('username'));
		$output['data']['sites'] = $this->sites_model->get_sites_with_status();
		render('bookings/create', $output);
	}

	public function updateSites(){
		$updated = $this->sites_model->get_sites_with_status();
		$output = array();
		foreach($updated as $site){
			$output[$site['id']] = $site;
		}
		output_json($output);
	}

	public function updateReservedStatus($site, $status){
		output_json(array('result'=>$this->sites_model->updateReservedStatus($site, $status)));
	}
}