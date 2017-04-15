<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('users.id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->row_array();
   }
   else
   {
     return false;
   }
 }

  public function get_user($username = FALSE)
    {

          $query = $this->db->get_where('users', array('username' => $username));
          $res = $query->row_array();
          unset($res['password']);
          return $res;
    }

  public function create($data){
    $data['password'] = md5($data['password']);
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }
}
?>