<?php
class Sites_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
           		 $this->load->model('reservations_model');
        }

	public function get_sites_with_status()
	{
        $query = $this->db->get('vw_site_status');
        return $query->result_array();

	}

	public function updateReservedStatus($site, $status)
	{
		$response = "";
		if($status == 'true'){
			$query = $this->db->get_where('vw_site_status', array('id'=>$site));
			if($query->row_array()['Status'] != 'Empty'){
				$response = "Site Already Reserved";
			} else {
				$this->db->where('reservation_id', $this->reservations_model->get_current_reservation()['id']);
				$this->db->where('site_id', $site);
				$this->db->delete('site_reservations');

				$this->db->set('reservation_id', $this->reservations_model->get_current_reservation()['id']);
				$this->db->set('site_id', $site);
				$this->db->insert('site_reservations'); 
			}
		} else {
			$this->db->where('reservation_id', $this->reservations_model->get_current_reservation()['id']);
			$this->db->where('site_id', $site);
			$this->db->delete('site_reservations');
			//dbg($this->db->last_query());
		}
		return $response;
	}
}