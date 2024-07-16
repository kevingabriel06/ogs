<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function can_login($staff_id, $password)
    {
        $this->db->where('staff_id', $staff_id);
        $query = $this->db->get('teacher');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            if (password_verify($password, $row->password)) {
                $this->session->set_userdata(array(
                    'teacher_id' => $row->teacher_id,
                    'role' => $row->role,
                ));
                return true;
            } else {
                return 'Wrong Password';
            }
        } else {
            return 'Wrong Staff ID';
        }
    }

  
}
