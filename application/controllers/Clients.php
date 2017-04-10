<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {


    public function __construct()
    {
            parent::__construct();
            $this->load->model('records_model');
            $this->load->helper('url_helper');
    }


	public function index()
	{
		//$this->load->view('welcome_message');
		redirect('Clients/search', 'refresh');
	}

	public function search()
	{
		//$this->load->view('welcome_message');
		$output['records'] = $this->records_model->get_record(true);
		render('Clients/search', $output);
	}

	public function add()
	{
		//$this->load->view('welcome_message');
		$output['record'] = $this->records_model->get_record(true, 'new');
		render('Clients/add', $output);
	}

	public function edit($ID = '')
	{
		//$this->load->view('welcome_message');
		$output['record'] = $this->records_model->get_record(true, $ID);
		if($output['record']){
			render('Clients/add', $output);
		} else {
			redirect('Clients/search', 'refresh');
		}
	}

	public function save()
	{
		$this->records_model->save_record(true, $this->input->post());
        set_message('Done', 'success', 'Clients/search');
	}
}
