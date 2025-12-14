<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model: Reservasi_model
 * Author: Luqman Aly Razak (Refactored)
 * Deskripsi: Menangani semua proses reservasi kamar hotel.
 */

class Reservasi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /* ==========================================================
       BAGIAN 1. GENERATE & VALIDASI
       ========================================================== */

    /**
     * Generate kode reservasi unik
     * Format: RSV-20251130-ABC123
     */
    public function generate_kode_reservasi()
    {
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));
        return 'RSV-' . date('Ymd') . '-' . $random;
    }

    /**
     * Cek apakah kode reservasi sudah ada
     */
    public function is_kode_exist($kode)
    {
        return $this->db->where('kode_reservasi', $kode)
            ->count_all_results('reservasi') > 0;
    }


    /* ==========================================================
       BAGIAN 2. SIMPAN RESERVASI
       ========================================================== */

    /**
     * Simpan data reservasi lengkap
     * @param array $data_tamu
     * @param array $data_reservasi
     * @param array $data_detail
     * @return int|false (id_reservasi)
     */
    public function simpan_reservasi($data_tamu, $data_reservasi, $data_detail)
    {
        $this->db->trans_start();

        // Simpan tamu
        $this->db->insert('tamu', $data_tamu);
        $id_tamu = $this->db->insert_id();

        // Simpan reservasi utama
        $data_reservasi['id_tamu'] = $id_tamu;
        $this->db->insert('reservasi', $data_reservasi);
        $id_reservasi = $this->db->insert_id();

        // Simpan detail reservasi (kamar, jumlah orang, harga)
        $data_detail['id_reservasi'] = $id_reservasi;
        $this->db->insert('detail_reservasi', $data_detail);

        $this->db->trans_complete();

        return $this->db->trans_status() ? $id_reservasi : false;
    }


    /* ==========================================================
       BAGIAN 3. UPDATE STATUS & KONFIRMASI
       ========================================================== */

    /**
     * Konfirmasi reservasi (ubah status menjadi Confirmed)
     */
    public function konfirmasi_reservasi($kode_reservasi)
    {
        $this->db->where('kode_reservasi', $kode_reservasi);
        return $this->db->update('reservasi', [
            'status_reservasi' => 'Confirmed'
        ]);
    }

    /**
     * Batalkan reservasi (ubah status menjadi Cancelled)
     */
    public function batalkan_reservasi($kode_reservasi)
    {
        $this->db->where('kode_reservasi', $kode_reservasi);
        return $this->db->update('reservasi', [
            'status_reservasi' => 'Cancelled'
        ]);
    }


    /* ==========================================================
       BAGIAN 4. PENGAMBILAN DATA
       ========================================================== */

    /**
     * Ambil data reservasi berdasarkan kode
     */
    public function get_by_kode($kode_reservasi)
    {
        $this->db->select('r.*, t.nama_tamu, t.email, t.no_telp, t.alamat');
        $this->db->from('reservasi r');
        $this->db->join('tamu t', 't.id = r.id_tamu', 'left');
        $this->db->where('r.kode_reservasi', $kode_reservasi);
        return $this->db->get()->row();
    }

    /**
     * Ambil detail kamar dari reservasi
     */
    public function get_detail_by_reservasi($id_reservasi)
    {
        $this->db->select('dr.*, tk.name AS nama_kamar, tk.price AS harga_asli');
        $this->db->from('detail_reservasi dr');
        $this->db->join('detail_kamar dk', 'dk.no_kamar = dr.no_kamar', 'left');
        $this->db->join('tipe_kamar tk', 'tk.id = dk.id_tipe_kamar', 'left');
        $this->db->where('dr.id_reservasi', $id_reservasi);
        return $this->db->get()->result();
    }

    /**
     * Ambil semua reservasi (admin / dashboard)
     * @param string $status (opsional)
     */
    public function get_all_reservasi($status = null)
    {
        $this->db->select('r.*, t.nama_tamu, t.email, t.no_telp');
        $this->db->from('reservasi r');
        $this->db->join('tamu t', 't.id = r.id_tamu', 'left');

        if ($status) {
            $this->db->where('r.status_reservasi', $status);
        }

        $this->db->order_by('r.tgl_reservasi', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Ambil semua reservasi berdasarkan ID tamu (riwayat tamu)
     */
    public function get_by_tamu($id_tamu)
    {
        $this->db->select('r.*, COUNT(dr.id) AS total_kamar');
        $this->db->from('reservasi r');
        $this->db->join('detail_reservasi dr', 'dr.id_reservasi = r.id', 'left');
        $this->db->where('r.id_tamu', $id_tamu);
        $this->db->group_by('r.id');
        $this->db->order_by('r.tgl_reservasi', 'DESC');
        return $this->db->get()->result();
    }


    /* ==========================================================
       BAGIAN 5. LAPORAN & UTILITAS
       ========================================================== */

    /**
     * Hitung total reservasi per status
     */
    public function count_by_status()
    {
        $query = $this->db->query("
            SELECT status_reservasi, COUNT(*) AS jumlah
            FROM reservasi
            GROUP BY status_reservasi
        ");
        return $query->result();
    }

    /**
     * Ambil total pendapatan dari reservasi Confirmed
     */
    public function get_total_income()
    {
        $this->db->select_sum('total_biaya', 'total');
        $this->db->where('status_reservasi', 'Confirmed');
        $result = $this->db->get('reservasi')->row();
        return $result ? $result->total : 0;
    }
}
