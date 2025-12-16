<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function get_menu_by_category()
    {
        $categories = $this->db->get('menu_category')->result();
        $result = [];

        foreach ($categories as $cat) {
            $menus = $this->db->where('id_kategori', $cat->id)->get('menu')->result();
            $result[] = [
                'category' => $cat->nama_kategori,
                'menus' => $menus
            ];
        }

        return $result;
    }
}
