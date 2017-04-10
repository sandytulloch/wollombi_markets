<?php
class Group_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

    public function get_group($field = FALSE, $value = FALSE)
    {
        if ($field === FALSE || $value === FALSE){
            $query = $this->db->get('Groups');
            return $query->result_array();
        }
        if($field === 'ID'){
            $query = $this->db->get_where('Groups', array($field => $value));
            return $query->row_array();  
        }

        $this->db->order_by('Type', 'asc');
        $this->db->order_by('Index', 'asc');
        $query = $this->db->get_where('Groups', array($field => $value));
        return $query->result_array();
    }

	public function save_group($data){
        // echo json_encode($data);
        $this->db->where('ID', $data['ID']);
        $this->db->update('Groups', $data);
	}
}