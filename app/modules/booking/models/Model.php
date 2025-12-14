<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
    /**
     * Mendapatkan semua tipe kamar untuk tampilan homepage (Opsional)
     */
    public function get_all_tipe_kamar()
    {
        $this->db->select('tipe_kamar, harga, deskripsi');
        $this->db->group_by('tipe_kamar');
        return $this->db->get('kamar')->result();
    }

    /**
     * Mencari kamar yang tersedia berdasarkan tanggal dan kapasitas
     */
    public function find_available_rooms($arrival, $leave, $adults, $children)
    {
        // 1. Filter Kamar berdasarkan Kapasitas
        $this->db->where('kapasitas_dewasa >=', $adults);
        // Asumsi: kapasitas anak juga harus sesuai
        $this->db->where('kapasitas_anak >=', $children);

        // 2. Filter Kamar yang TIDAK Occupied pada rentang tanggal tersebut
        // Subquery untuk menemukan kamar yang sudah DIBOOKING/OCCUPIED
        $this->db->select('T1.*'); // Pilih semua kolom dari tabel Kamar (T1)
        $this->db->from('kamar T1');

        // Mencegah kamar yang sedang 'Maintenance' muncul
        $this->db->where('T1.status_kamar !=', 'Maintenance');

        // Logika ketersediaan yang kompleks:
        // Cari NO_KAMAR yang memiliki riwayat checkin (T2)
        // yang rentang tanggalnya BERIRISAN dengan rentang pencarian ($arrival - $leave)
        $subquery = $this->db->select('no_kamar')
            ->from('checkin')
            ->where('status', 'IN')
            ->group_start()
            ->where('tgl_checkin <', $leave)
            ->where('tgl_checkout_estimasi >', $arrival)
            ->group_end()
            ->get_compiled_select();

        // Kamar yang tersedia adalah kamar yang NO_KAMAR-nya TIDAK ada dalam hasil subquery di atas
        $this->db->where("T1.no_kamar NOT IN ($subquery)", NULL, FALSE);

        $query = $this->db->get();
        return $query->result();
    }
}
