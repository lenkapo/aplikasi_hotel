<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{

    // Ambil semua komentar berdasarkan post_id
    public function get_comments($post_id)
    {
        return $this->db->where('post_id', $post_id)
            ->order_by('created_at', 'DESC')
            ->get('comments')
            ->result();
    }

    // Tambah komentar baru
    public function insert_comment($data)
    {
        return $this->db->insert('comments', $data);
    }

    // (Opsional) Hitung jumlah komentar berdasarkan post
    public function count_comments($post_id)
    {
        return $this->db->where('post_id', $post_id)
            ->count_all_results('comments');
    }

    // (Opsional) Ambil komentar terbaru (untuk sidebar atau admin dashboard)
    public function get_latest_comments($limit = 10)
    {
        return $this->db->order_by('created_at', 'DESC')
            ->limit($limit)
            ->get('comments')
            ->result();
    }
}
