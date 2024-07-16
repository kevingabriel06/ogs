<?php
class Login_model extends CI_Model
{
 function can_login($student_id, $password)
 {
  $this->db->where('student_id', $student_id);
  $query = $this->db->get('student');
  if($query->num_rows() > 0)
  {
    foreach ($query->result() as $row) {
        if (password_verify($password, $row->password)) {
            $this->session->set_userdata('id', $row->id);
        } else {
            return 'Wrong Password';
        }
    }
  }
  else
  {
   return 'Wrong Email Address';
  }
 }
}
