<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_model extends CI_Model
{
    protected $table = 'events';

    public function get_all()
    {
        return $this->db
            ->where('status', 'active')
            ->order_by('event_date', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_by_slug($slug)
    {
        return $this->db
            ->where('slug', $slug)
            ->where('status', 'active')
            ->get($this->table)
            ->row();
    }

    public function insert($data)
    {
        $data['slug'] = $this->generate_slug($data['title']);
        return $this->db->insert($this->table, $data);
    }

    private function generate_slug($title)
    {
        $slug = url_title($title, 'dash', TRUE);

        // cek slug unik
        $count = $this->db
            ->where('slug', $slug)
            ->count_all_results($this->table);

        if ($count > 0) {
            $slug .= '-' . time();
        }

        return $slug;
    }

    public function sisa_quota($event_id)
    {
        $sql = "
            SELECT e.quota - COUNT(r.id) AS sisa
            FROM events e
            LEFT JOIN event_registrations r ON r.event_id = e.id
            WHERE e.id = ?
            GROUP BY e.id
        ";

        return $this->db->query($sql, [$event_id])->row()->sisa ?? 0;
    }
}
