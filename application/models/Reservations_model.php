<?php
class Reservations_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	public function new_reservation()
	{
        
		$this->db->set('reserve_finish_time', 'NOW()', false);
		$this->db->where('user_id = '.get_user('id'));
		$this->db->where('reserve_finish_time = 0');
		$this->db->update('reservations');


        $this->db->set('id', '');
		$this->db->set('user_id', get_user('id'));
		$this->db->set('reserve_start_time', 'NOW()', false);
		$this->db->insert('reservations');
	}

	public function get_current_reservation(){
		$this->db->where('user_id = '.get_user('id'));
		$this->db->where('reserve_finish_time = 0');
		$query = $this->db->get('reservations');
		return $query->row_array();
	}


}