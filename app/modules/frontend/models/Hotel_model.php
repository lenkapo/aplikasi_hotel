<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hotel_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('daftar_hotel')->result();
    }
}
