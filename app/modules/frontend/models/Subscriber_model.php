<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscriber_model extends CI_Model
{

    public function insert($data)
    {
        return $this->db->insert('subscribers', $data);
    }

    public function is_email_exist($email)
    {
        return $this->db
            ->where('email', $email)
            ->get('subscribers')
            ->num_rows() > 0;
    }
}
