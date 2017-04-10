<?php
class Sites_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	public function get_sites_with_status()
	{
        $query = $this->db->get('vw_site_status');
        return $query->result_array();

	}
}