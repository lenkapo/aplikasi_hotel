<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{

    public function insert($data)
    {
        return $this->db->insert('bookings', $data);
    }
    public function is_room_available($room_id, $arrival, $departure)
    {
        // TOTAL UNIT KAMAR
        $room = $this->db->get_where('rooms', ['id' => $room_id])->row();
        if (!$room) {
            return false;
        }

        $totalRooms = (int) $room->total_room;

        // TOTAL BOOKING AKTIF (OVERLAP)
        $this->db->where('room_id', $room_id);
        $this->db->where('status !=', 'cancelled');
        $this->db->where('arrival_date <', $departure);
        $this->db->where('departure_date >', $arrival);

        $booked = $this->db->count_all_results('bookings');

        // AVAILABLE JIKA BOOKING < TOTAL UNIT
        return $booked < $totalRooms;
    }
}
