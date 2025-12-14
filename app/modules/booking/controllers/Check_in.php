<?php defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'Alus_items');
    }

    public function index()
    {
        if ($this->alus_auth->logged_in()) {
            $title_head = "Check In Data Tamu";
            $head['title'] = $title_head;
            $data['title_head'] = $title_head;

            // Data lain yang diperlukan (misalnya daftar tipe kamar untuk ditampilkan di home)
            $data['tipe_kamar'] = $this->Alus_items->get_all_tipe_kamar();

            $this->load->view('template/temaalus/header', $head);
            $this->load->view('index', $data);
            $this->load->view('template/temaalus/footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }
    public function search()
    {
        // 1. Validasi Input
        $this->form_validation->set_rules('arrival_date', 'Arrival Date', 'required');
        $this->form_validation->set_rules('leave_date', 'Leave Date', 'required|callback_date_check');
        $this->form_validation->set_rules('adults', 'Adults', 'required|numeric');

        // Custom validation: Pastikan tanggal Check Out lebih dari tanggal Check In
        if ($this->form_validation->run() == FALSE) {
            $this->index(); // Kembali ke halaman utama jika validasi gagal
        } else {
            // 2. Ambil Data
            $arrival = $this->input->post('arrival_date');
            $leave   = $this->input->post('leave_date');
            $adults  = $this->input->post('adults');
            $children = $this->input->post('children');

            // 3. Panggil Model untuk Mencari Kamar
            $data['available_rooms'] = $this->Kamar_model->find_available_rooms($arrival, $leave, $adults, $children);
            $data['search_data'] = [
                'arrival' => $arrival,
                'leave' => $leave,
                'adults' => $adults,
                'children' => $children
            ];
            $data['title'] = 'Hasil Pencarian Kamar';

            // 4. Tampilkan Hasil
            $this->load->view('template_frontend/header', $data);
            $this->load->view('booking/hasil_cari', $data);
            $this->load->view('template_frontend/footer');
        }
    }

    // Callback function untuk membandingkan tanggal
    public function date_check($leave_date)
    {
        $arrival_date = $this->input->post('arrival_date');
        if (strtotime($leave_date) <= strtotime($arrival_date)) {
            $this->form_validation->set_message('date_check', 'Tanggal Check Out harus setelah Tanggal Check In.');
            return FALSE;
        }
        return TRUE;
    }
}
