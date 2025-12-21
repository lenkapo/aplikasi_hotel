<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'Alus_items');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper(['form', 'url']);
    }

    // =====================================================================
    // MAIN PAGE
    // =====================================================================
    public function index()
    {
        if ($this->alus_auth->logged_in()) {

            $title_head = "Daftar Booking";
            $head['title'] = $title_head;
            $data['title_head'] = $title_head;

            $this->load->view('template/temaalus/header', $head);
            $this->load->view('index', $data);
            $this->load->view('template/temaalus/footer');
        } else {
            redirect('admin/login', 'refresh');
        }

        $this->alus_auth->get_user_role();
    }

    // =====================================================================
    // AJAX DATATABLE
    // =====================================================================
    public function ajax_list()
    {

        $list = $this->Alus_items->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $daftar_booking) {
            $nama_kamar = $this->db
                ->get_where('rooms', ['id' => $daftar_booking->room_id])
                ->row();

            $no++;

            $row = [];
            $row[] = $no;
            $row[] = $daftar_booking->invoice_number;
            $row[] = $nama_kamar->name;
            $row[] = $daftar_booking->full_name;
            $row[] = $daftar_booking->email;
            $row[] = $daftar_booking->phone;
            $row[] = $daftar_booking->mobile;
            $row[] = $daftar_booking->city;
            $row[] = $daftar_booking->country;
            $row[] = "Dewasa : {$daftar_booking->adults} <br> Anak : {$daftar_booking->children}";
            $row[] = $daftar_booking->arrival_date;
            $row[] = $daftar_booking->departure_date;
            $row[] = $daftar_booking->nights . " Malam";
            $row[] = "Rp " . number_format($daftar_booking->price_per_night, 0, ',', '.');
            // $row[] = $daftar_booking->capacity . " Orang";
            $row[] =  "Rp " . number_format($daftar_booking->total_price, 0, ',', '.');
            $row[] = $daftar_booking->message;
            $row[] = $daftar_booking->created_at;
            // $row[] = $daftar_booking->is_active ? "<span class='label label-success'>Active</span>"
            //     : "<span class='label label-danger'>Not Active</span>";

            // Tombol default: semua user boleh lihat tombol "Info"

            // Tombol default: semua user boleh lihat Info
            $buttons = "
<a href='javascript:void(0)' onClick='btn_modal_view(" . $daftar_booking->id . ")'
    data-toggle='tooltip' class='btn btn-xs btn-info btn-flat' title='Info'>
    <i class='fa fa-eye'></i>
</a>";

            $user_role = $this->alus_auth->get_user_role(); // ✅ panggil fungsi baru
            $uri = 'daftar_booking';

            // Jika admin atau resepsionist → full access
            if (in_array($user_role, ['admin', 'resepsionist'])) {
                $buttons .= "
    <a href='javascript:void(0)' onClick='btn_modal_edit(" . $daftar_booking->id . ")'
        data-toggle='tooltip' title='Edit'
        class='btn btn-xs btn-primary btn-flat'>
        <i class='fa fa-edit'></i>
    </a>
    <a href='javascript:void(0)' onClick='btn_modal_delete(" . $daftar_booking->id . ")'
        data-toggle='tooltip' title='Delete'
        class='btn btn-xs btn-danger btn-flat'>
        <i class='fa fa-trash'></i>
    </a>";
            } else {
                // Group lain dicek lewat hak akses menu
                if ($this->alus_auth->can_edit($uri)) {
                    $buttons .= "
        <a href='javascript:void(0)' onClick='btn_modal_edit(" . $daftar_booking->id . ")'
            data-toggle='tooltip' title='Edit'
            class='btn btn-xs btn-primary btn-flat'>
            <i class='fa fa-edit'></i>
        </a>";
                }
                if ($this->alus_auth->can_delete($uri)) {
                    $buttons .= "
        <a href='javascript:void(0)' onClick='btn_modal_delete(" . $daftar_booking->id . ")'
            data-toggle='tooltip' title='Delete'
            class='btn btn-xs btn-danger btn-flat'>
            <i class='fa fa-trash'></i>
        </a>";
                }
            }

            $row[] = $buttons;
            $data[] = $row;
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Alus_items->count_all(),
            "recordsFiltered" => $this->Alus_items->count_filtered(),
            "data" => $data,
        ]);
    }

    // =====================================================================
    // MODAL
    // =====================================================================
    public function modal_add()
    {
        $uri = 'daftar_booking'; // sesuaikan dengan nama menu di database kamu

        // === CEK AKSES ===
        // Hanya admin atau resepsionist, atau jika punya hak can_add (hak akses di DB)
        if (
            ! $this->alus_auth->in_group(['admin', 'resepsionist']) &&
            ! $this->alus_auth->can_add($uri)
        ) {
            show_error('Akses ditolak. Anda tidak memiliki izin menambah data booking.', 403);
            return;
        }

        // === JUDUL MODAL ===
        $data['title'] = "Tambah Data Booking";

        // === LOAD VIEW MODAL ===
        $this->load->view('ajax/modal_add', $data);
    }


    function modal_edit($id)
    {
        $uri = 'daftar_booking'; // atau sesuaikan dengan menu kamu

        if (
            ! $this->alus_auth->in_group(['admin', 'resepsionist'])
            && ! $this->alus_auth->can_add($uri)
        ) {
            show_error('Akses ditolak. Anda tidak memiliki izin Edit data.', 403);
            return;
        }

        $data['data'] = $this->Alus_items->getid($id);
        $data['title'] = "Edit Data Kamar";

        if (!$data['data']) {
            echo "<div class='modal-body'><p class='text-danger'>Data tidak ditemukan</p></div>";
            return;
        }

        $this->load->view('ajax/modal_edit', $data);
    }

    public function modal_view($id)
    {
        $data['title'] = "Informasi Kamar";
        $data['room'] = $this->Alus_items->getid($id);

        if (!$data['room']) {
            echo "<p style='padding:20px; color:red;'>Data tidak ditemukan.</p>";
            return;
        }

        $this->load->view('ajax/modal_view', $data);
    }

    // =====================================================================
    // SAVE DATA
    // =====================================================================
    function save()
    {
        $this->form_validation->set_rules('room_id', 'Kamar', 'required');
        $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('arrival_date', 'Tanggal Check-in', 'required');
        $this->form_validation->set_rules('departure_date', 'Tanggal Check-out', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(["status" => false, "message" => validation_errors()]);
            return;
        }

        $room_id = $this->input->post('room_id');
        $arrival_date = $this->input->post('arrival_date');
        $departure_date = $this->input->post('departure_date');

        $room = $this->db->get_where('rooms', ['id' => $room_id])->row();
        if (!$room) {
            echo json_encode(["status" => false, "message" => "Kamar tidak ditemukan"]);
            return;
        }

        $nights = (strtotime($departure_date) - strtotime($arrival_date)) / 86400;
        $total_price = $room->price * $nights;

        $data = [
            'room_id' => $room_id,
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'adults' => $this->input->post('adults'),
            'children' => $this->input->post('children'),
            'arrival_date' => $arrival_date,
            'departure_date' => $departure_date,
            'nights' => $nights,
            'price_per_night' => $room->price,
            'total_price' => $total_price,
            'message' => $this->input->post('message'),
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'invoice_number' => $this->generateInvoice(),

        ];

        $q = $this->Alus_items->save($data);

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Berhasil menyimpan data" : "Gagal menyimpan data",
        ]);
    }

    // =====================================================================
    // UPDATE DATA
    // =====================================================================
    public function edit()
    {

        $id = $this->input->post('id');

        if (!$id) {
            echo json_encode([
                "status" => false,
                "message" => "ID tidak ditemukan"
            ]);
            return;
        }


        $data = [
            'name'       => $this->input->post('name'),
            'deskripsi'  => $this->input->post('deskripsi'),
            'price'      => $this->input->post('price'),
            'amenities'  => $this->input->post('amenities'),
            'capacity'   => $this->input->post('capacity'),
            'tipe_kasur' => $this->input->post('tipe_kasur'),
            'is_active'  => $this->input->post('is_active'),
        ];


        if (!empty($_FILES['main_image']['name'])) {


            $old = $this->Alus_items->getid($id);

            if (!empty($old->main_image) && file_exists('./assets/img/room/' . $old->main_image)) {
                unlink('./assets/img/room/' . $old->main_image);
            }

            $upload = $this->_do_upload('main_image');
            $data['main_image'] = $upload;
        }

        $q = $this->Alus_items->edit($id, $data);

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Berhasil Update Data" : "Gagal Menyimpan Data",
        ]);
    }

    // =====================================================================
    // DELETE
    // =====================================================================
    public function delete($id)
    {

        $uri = 'daftar_booking';

        if (
            ! $this->alus_auth->in_group(['admin', 'resepsionist'])
            && ! $this->alus_auth->can_add($uri)
        ) {
            show_error('Akses ditolak. Anda tidak memiliki izin Delete data.', 403);
            return;
        }

        $old = $this->Alus_items->getid($id);
        if ($old && !empty($old->image) && file_exists('./assets/img/room/' . $old->image)) {
            unlink('./assets/img/room/' . $old->image);
        }

        $q = $this->Alus_items->delete($id);

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Banner deleted successfully" : "Failed to delete banner"
        ]);
    }

    // =====================================================================
    // UPLOAD FILE
    // =====================================================================
    private function _do_upload($key)
    {
        $config['upload_path']   = './assets/img/room/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5000;
        $config['file_name']     = "ROOM_" . time();

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($key)) {
            echo json_encode(["status" => false, "message" => $this->upload->display_errors()]);
            exit();
        }

        return $this->upload->data('file_name');
    }

    private function generateInvoice()
    {
        return 'INV-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));
    }
}
