<?php
class Editor extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('structure_model');
                $this->load->model('group_model');
                $this->load->model('component_model');
                $this->load->model('defect_model');
                $this->load->model('photo_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $output['structures'] = $this->structure_model->get_structure();
                render('Editor/index', $output); //renders a view from the views folder.
        }

        public function structure($ID = '', $saved = false)
        {
                $output['structure'] = $this->structure_model->get_structure($ID);
                $output['groups'] = $this->group_model->get_group('Structure_ID', $ID);
                render('Editor/structure', $output);

        }

        public function save_structure($data = ''){
                //echo json_encode($this->input->post());
                $this->structure_model->save_structure($this->input->post());
                set_message('Done', 'success', 'Editor/structure/'.$this->input->post('ID'));
        }


        public function group($ID = '', $saved = false){
                $output['group'] = $this->group_model->get_group('ID', $ID);
                $output['structure'] = $this->structure_model->get_structure($output['group']['Structure_ID']);
                $output['components'] = $this->component_model->get_component('Group_ID', $ID);
                // $output['groups'] = $this->group_model->get_group('Structure_ID', $ID);
                //print_r($output);
                render('Editor/group', $output);

        }


        public function save_group($data = ''){
                //echo json_encode($this->input->post());
                $this->group_model->save_group($this->input->post());
                set_message('Done', 'success', 'Editor/group/'.$this->input->post('ID'));
        }

        public function component($ID = '', $saved = false){
                $output['component'] = $this->component_model->get_component('ID', $ID);
                $output['group'] = $this->group_model->get_group('ID', $output['component']['Group_ID']);
                $output['structure'] = $this->structure_model->get_structure($output['group']['Structure_ID']);
                $output['defects'] = $this->defect_model->get_defect('Component_ID', $ID);
                $filter['Master_ID'] = $ID;
                $filter['Master_table'] = 'Components';
                $output['photos'] = $this->photo_model->get_photo($filter);
                // $output['groups'] = $this->group_model->get_group('Structure_ID', $ID);
                // print_r($output);
                render('Editor/component', $output);

        }


        public function save_component($data = ''){
                //echo json_encode($this->input->post());
                $this->component_model->save_component($this->input->post());
                set_message('Done', 'success', 'Editor/component/'.$this->input->post('ID'));
        }

        public function defect($ID = '', $saved = false){
                $output['defect'] = $this->defect_model->get_defect('ID', $ID);
                $output['component'] = $this->component_model->get_component('ID',  $output['defect']['Component_ID']);
                $output['group'] = $this->group_model->get_group('ID', $output['component']['Group_ID']);
                $output['structure'] = $this->structure_model->get_structure($output['group']['Structure_ID']);
                $filter['Master_ID'] = $ID;
                $filter['Master_table'] = 'Defects';
                $output['photos'] = $this->photo_model->get_photo($filter);
                // $output['groups'] = $this->group_model->get_group('Structure_ID', $ID);
                // print_r($output);
                render('Editor/defect', $output);

        }


        public function save_defect($data = ''){
                //echo json_encode($this->input->post());
                $this->defect_model->save_defect($this->input->post());
                set_message('Done', 'success', 'Editor/defect/'.$this->input->post('ID'));
        }
}