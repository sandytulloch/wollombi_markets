<?php
class Structure_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

    public function get_structure($ID = FALSE)
    {
        if ($ID === FALSE)
        {
            $query = $this->db->get('Structures');
            return $query->result_array();
        }

        $query = $this->db->get_where('Structures', array('ID' => $ID));
        return $query->row_array();
    }

	public function save_structure($data){
        // echo json_encode($data);
        $this->db->where('ID', $data['ID']);
        $this->db->update('Structures', $data);
	}
}