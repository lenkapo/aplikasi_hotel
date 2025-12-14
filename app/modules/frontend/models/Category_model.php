<?php
class Category_model extends CI_Model
{
    public function get_all_categories()
    {
        $this->db->select("
            categories.id,
            categories.name,
            categories.slug,
            COUNT(posts.id) AS post_count
        ");
        $this->db->from("categories");
        $this->db->join("posts", "posts.category_id = categories.id", "left");
        $this->db->group_by("categories.id");
        $this->db->order_by("categories.name", "ASC");

        return $this->db->get()->result();
    }
}
