<?php
class Records_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	public function get_record($ext = FALSE, $ID = FALSE)
	{
        if ($ID === FALSE){
            $query = $this->db->get_where('records', array('External' => $ext, 'Deleted' => 0));
            return $query->result_array();
        } else if ($ID == 'new') {
            $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'archives' AND TABLE_NAME = 'records'";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $empty = null;
            foreach($result as $field){
                $empty[$field['COLUMN_NAME']] = null;
            }
            return $empty;

        }

        $query = $this->db->get_where('records', array('ID' => $ID, 'External' => $ext, 'Deleted' => 0));
        return $query->row_array();
	}

    public function save_record($ext = FALSE, $data){
        //echo json_encode($data);
        //echo '<br/>';
        //convert boolean to ONE/ZERO
            $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'archives' AND TABLE_NAME = 'records' AND DATA_TYPE = 'tinyint'";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            foreach($result as $field){
                if(isset($data[$field['COLUMN_NAME']])){
                    switch($data[$field['COLUMN_NAME']]){
                        // case TRUE:
                        case 'TRUE':
                        case 'true':
                        case '1':
                        case 1:
                            $data[$field['COLUMN_NAME']] = 1;
                            break;
                        default:
                            $data[$field['COLUMN_NAME']] = 0;
                    }
                }
                $empty[$field['COLUMN_NAME']] = null;
            }


       //die(json_encode($data));
        unset($data['Contents']);
        if(isset($data['deleted'])){
            $data['deleted'] = 1;
        }
        if(isset($data['ID']) && $data['ID']){

            
            

            $this->db->where('ID', $data['ID']);
            $this->db->update('records', $data);
        } else {
            $data['External'] = $ext;
            $this->db->insert('records', $data); 
        }
        //die($this->db->last_query());
        // echo json_encode($data);
    }

}