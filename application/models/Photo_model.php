<?php
class Photo_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

    public function get_photo($filter = NULL)
    {
        if ($filter === NULL){
            $query = $this->db->get('Photos');
            return $query->result_array();
        }
        if(array_key_exists('ID',$filter)){
            $query = $this->db->get_where('Photos', array('ID' => $filter['ID']));
            return $query->row_array();  
        }

        $query = $this->db->get_where('Photos', $filter);
        return $query->result_array();
    }

	public function save_photo($data){
        // echo json_encode($data);
        $this->db->where('ID', $data['ID']);
        $this->db->update('Photos', $data);
	}
}