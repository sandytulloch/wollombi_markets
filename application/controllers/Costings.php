<?php
class Costings extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
        }

        public function index()
        {
                render('test/test'); //renders a view from the views folder.
        }

/*        public function structure($ID = '', $saved = false)
        {
                $output['structure'] = $this->structure_model->get_structure($ID);
                $output['groups'] = $this->group_model->get_group('Structure_ID', $ID);
                render('structure', $output);

        }*/

}