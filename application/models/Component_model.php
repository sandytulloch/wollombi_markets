<?php
class Component_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

    public function get_component($field = FALSE, $value = FALSE)
    {
        if ($field === FALSE || $value === FALSE){
            $query = $this->db->get('Components');
            return $query->result_array();
        }
        if($field === 'ID'){
            //Get standard component
            $query = $this->db->get_where('Components', array($field => $value));
            $component = $query->row_array();
            //Get measurement
            $this->db->select('Standards_Components.Measurement');
            $this->db->from('Components');
            $this->db->join('Groups', 'Groups.ID = Components.Group_ID');
            $this->db->join('Structures', 'Structures.ID = Groups.Structure_ID');
            $this->db->join('Standards_Structures', 'Standards_Structures.Name = Structures.Category');
            $this->db->join('Standards_Structure_Groups', 'Standards_Structure_Groups.Structure_ID = Standards_Structures.ID');
            $this->db->join('Standards_Groups', 'Standards_Structure_Groups.Group_ID = Standards_Groups.ID AND Standards_Groups.Name = Groups.Type'); //Unsure about AND
            $this->db->join('Standards_Group_Components', 'Standards_Group_Components.Group_ID = Standards_Groups.ID');
            $this->db->join('Standards_Components', 'Standards_Components.ID = Standards_Group_Components.Component_ID AND Standards_Components.Name = Components.Type'); //Unsure about AND
            $this->db->where('Components.ID', $component['ID']);
            $query = $this->db->get();
            $res = $query->row_array();
            
            //Combine the two
            if($res['Measurement']){
                $component['QuantitySpecificMeasurement'] = $res['Measurement'];
            } else {
                $component['QuantitySpecificMeasurement'] = 'each';
            }
            return $component;  
        }
        $this->db->order_by('Type', 'asc');
        $this->db->order_by('Index', 'asc');
        $query = $this->db->get_where('Components', array($field => $value));
        return $query->result_array();
    }

	public function save_component($data){
        // echo json_encode($data);
        $this->db->where('ID', $data['ID']);
        $this->db->update('Components', $data);
	}
}