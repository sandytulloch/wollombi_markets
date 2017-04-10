<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	public function get_structures($slug = FALSE)
	{
        if ($slug === FALSE)
        {
            $query = $this->db->get('Structures');
            return $query->result_array();
        }

        $query = $this->db->get_where('Structures', array('ID' => $slug));
        return $query->row_array();
	}
}