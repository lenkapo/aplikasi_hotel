<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get_admin_profile()
    {
        return $this->db->where('id', 1)->get('users')->row();
    }
}
