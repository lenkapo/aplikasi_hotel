<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hotel_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('daftar_hotel')->result();
    }

    public function get_featured()
    {
        return $this->db->get_where('daftar_hotel', ['is_featured' => 1])->row();
    }

    public function get_others()
    {
        return $this->db
            ->where('is_featured', 0)
            ->get('daftar_hotel')
            ->result();
    }
}
