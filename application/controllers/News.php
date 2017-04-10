<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['struct'] = $this->news_model->get_structures();
                $data['title'] = 'Structures';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['structure_item'] = $this->news_model->get_structures($slug);

                if (empty($data['structure_item']))
                {
                        show_404();
                }

                $data['title'] = $data['structure_item']['Structure_ref'];

                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }
}