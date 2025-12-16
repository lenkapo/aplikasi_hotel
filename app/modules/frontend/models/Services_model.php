<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services_model extends CI_Model
{
    private $table = 'services';

    public function get_all()
    {
        return $this->db->order_by('id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_by_slug($slug)
    {
        return $this->db->get_where($this->table, [
            'slug'   => $slug,
            'status' => 'active'
        ])->row();
    }
}
