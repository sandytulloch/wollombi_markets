<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal extends CI_Controller {


    public function __construct()
    {
            parent::__construct();
            $this->load->model('records_model');
            $this->load->helper('url_helper');
    }


	public function index()
	{
		//$this->load->view('welcome_message');
		redirect('Internal/search', 'refresh');
	}

	public function search()
	{
		//$this->load->view('welcome_message');
		$output['records'] = $this->records_model->get_record(false);
		render('Internal/search', $output);
	}

	public function add()
	{
		//$this->load->view('welcome_message');
		$output['record'] = $this->records_model->get_record(false, 'new');
		render('Internal/add', $output);
	}

	public function edit($ID = '')
	{
		//$this->load->view('welcome_message');
		$output['record'] = $this->records_model->get_record(false, $ID);
		//die($this->db->last_query());
		if($output['record']){
			render('Internal/add', $output);
		} else {
			redirect('Internal/search', 'refresh');
		}
	}

	public function save()
	{
		$this->records_model->save_record(false, $this->input->post());
        set_message('Done', 'success', 'Internal/search');
	}
}
