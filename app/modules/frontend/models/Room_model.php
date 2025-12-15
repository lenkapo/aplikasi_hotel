<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model: Kamar_model
 * Author: Luqman Aly Razak (Refactored)
 * Deskripsi: Menangani semua operasi database terkait kamar hotel
 */

class Room_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil semua kamar yang tersedia (opsional dengan filter harga, fitur, dsb)
     * @param array $filters (opsional)
     * @return array
     */
    public function get_all_rooms()
    {
        // ambil semua kamar
        $rooms = $this->db->get('rooms')->result();

        // untuk setiap kamar, ambil fiturnya
        foreach ($rooms as $room) {
            $this->db->select('f.nama_fitur');
            $this->db->from('room_features rf');
            $this->db->join('features f', 'rf.feature_id = f.id', 'left');
            $this->db->where('rf.room_id', $room->id);
            $fiturs = $this->db->get()->result();

            // jadikan array string
            $list = [];
            foreach ($fiturs as $f) {
                $list[] = $f->nama_fitur;
            }

            $room->fitur_list = $list;
        }

        return $rooms;
    }

    public function get_room($id)
    {
        return $this->db->get_where('rooms', ['id' => $id])->row();
    }

    /**
     * Ambil detail satu kamar berdasarkan ID
     * @param int $id
     * @return object|null
     */
    public function get_kamar_details($id)
    {
        $this->db->select('k.*, GROUP_CONCAT(f.nama_fitur SEPARATOR ", ") AS fitur');
        $this->db->from('tipe_kamar k');
        $this->db->join('fitur_kamar fk', 'fk.id_tipe_kamar = k.id', 'left');
        $this->db->join('fitur f', 'f.id = fk.id_fitur', 'left');
        $this->db->where('k.id', $id);
        $this->db->group_by('k.id');
        return $this->db->get()->row();
    }

    /**
     * Ambil detail kamar berdasarkan nomor kamar (digunakan saat reservasi)
     * @param string $no_kamar
     */
    public function get_kamar_details_by_no($no_kamar)
    {
        // Misalnya no_kamar ada di tabel detail_kamar
        $this->db->select('dk.no_kamar, tk.name, tk.price AS harga_per_malam, tk.main_image');
        $this->db->from('detail_kamar dk');
        $this->db->join('tipe_kamar tk', 'tk.id = dk.id_tipe_kamar');
        $this->db->where('dk.no_kamar', $no_kamar);
        return $this->db->get()->row();
    }

    /**
     * Ambil galeri kamar (foto-foto)
     * @param int $id_kamar
     */
    public function get_gallery($id_kamar)
    {
        return $this->db->get_where('gallery_kamar', ['id_kamar' => $id_kamar])->result();
    }

    /* ==========================================================
       BAGIAN 2. KETERSEDIAAN KAMAR
       ========================================================== */

    /**
     * Cek apakah kamar tersedia pada tanggal tertentu
     * @param string $no_kamar
     * @param string $check_in
     * @param string $check_out
     * @return bool
     */
    public function is_available($no_kamar, $check_in, $check_out)
    {
        // Mengecek jika kamar sudah dipesan di periode yang tumpang tindih
        $this->db->select('r.id');
        $this->db->from('reservasi r');
        $this->db->join('detail_reservasi dr', 'dr.id_reservasi = r.id');
        $this->db->where('dr.no_kamar', $no_kamar);
        $this->db->where('r.status_reservasi !=', 'Cancelled');
        $this->db->where("(
            (r.check_in_date <= '$check_out' AND r.check_out_date >= '$check_in')
        )");

        return $this->db->get()->num_rows() === 0; // true jika tidak ada bentrok
    }

    /**
     * Ambil daftar kamar yang tersedia di rentang tanggal tertentu
     * @param string $check_in
     * @param string $check_out
     */
    public function search_available_room($checkin, $checkout, $room_type = null)
    {
        $this->db->select('
        tk.id,
        tk.name,
        tk.price,
        tk.main_image,
        tk.amenities,  
        tk.deskripsi
    ');
        $this->db->from('tipe_kamar tk');

        if ($room_type) {
            $this->db->where('tk.id', $room_type);
        }

        // Filter kamar yang masih tersedia
        $this->db->where("
        NOT EXISTS (
            SELECT 1
            FROM detail_reservasi dr
            JOIN reservasi r ON r.id = dr.id_reservasi
            WHERE dr.id_tipe_kamar = tk.id
            AND (
                r.check_in_date <= " . $this->db->escape($checkout) . "
                AND r.check_out_date >= " . $this->db->escape($checkin) . "
            )
        )
    ", NULL, FALSE);

        return $this->db->get()->result();
    }



    /* ==========================================================
       BAGIAN 3. UTILITAS TAMBAHAN
       ========================================================== */

    /**
     * Tambahkan kamar baru (admin panel)
     * @param array $data
     */
    public function insert_kamar($data)
    {
        $this->db->insert('tipe_kamar', $data);
        return $this->db->insert_id();
    }

    /**
     * Update data kamar
     * @param int $id
     * @param array $data
     */
    public function update_kamar($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tipe_kamar', $data);
    }

    /**
     * Hapus kamar
     * @param int $id
     */
    public function delete_kamar($id)
    {
        return $this->db->delete('tipe_kamar', ['id' => $id]);
    }
    // Get all rooms with their details on view ALL ROOMS PAGE
}
