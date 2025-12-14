<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_kamar extends CI_Controller
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

            $title_head = "Data Kamar";
            $head['title'] = $title_head;
            $data['title_head'] = $title_head;

            $this->load->view('template/temaalus/header', $head);
            $this->load->view('index', $data);
            $this->load->view('template/temaalus/footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    // =====================================================================
    // AJAX DATATABLE
    // =====================================================================
    public function ajax_list()
    {
        $list = $this->Alus_items->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $room) {
            $no++;

            $row = [];
            $row[] = $no;
            $row[] = '<img src="' . base_url('assets/img/room/' . $room->main_image) . '" width="200">';
            $row[] = $room->name;
            $row[] = $room->deskripsi;
            $row[] = "Rp " . number_format($room->price, 0, ',', '.');
            $row[] = $room->amenities;
            $row[] = $room->capacity . " Orang";
            $row[] = $room->tipe_kasur;
            $row[] = $room->is_active ? "<span class='label label-success'>Active</span>"
                : "<span class='label label-danger'>Not Active</span>";

            $row[] =
                "<a href='javascript:void(0)' onClick='btn_modal_view(" . $room->id . ")' 
                data-toggle='tooltip' class='btn btn-xs btn-info btn-flat' title='Info'>
         <i class='fa fa-eye'></i>
    </a>" .

                "<a href='javascript:void(0)' onClick='btn_modal_edit(" . $room->id . ")' 
        data-toggle='tooltip' title='Edit'
        class='btn btn-xs btn-primary btn-flat'>
        <i class='fa fa-edit'></i>
    </a> " .

                "<a href='javascript:void(0)' onClick='btn_modal_delete(" . $room->id . ")' 
        data-toggle='tooltip' title='Delete'
        class='btn btn-xs btn-danger btn-flat'>
        <i class='fa fa-trash'></i>
    </a>";


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
    function modal_add()
    {
        $data['title'] = "Tambah Data Kamar";
        $this->load->view('ajax/modal_add', $data);
    }

    function modal_edit($id)
    {
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
        $this->form_validation->set_rules('name', 'Nama Tipe Kamar', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('price', 'Harga per Malam', 'required');
        $this->form_validation->set_rules('amenities', 'Fasilitas', 'required');
        $this->form_validation->set_rules('capacity', 'Kapasitas', 'required');
        $this->form_validation->set_rules('tipe_kasur', 'Tipe Kasur', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(["status" => false, "message" => validation_errors()]);
            return;
        }

        $data = [
            'name'       => $this->input->post('name'),
            'deskripsi'  => $this->input->post('deskripsi'),
            'price'      => $this->input->post('price'),
            'amenities'  => $this->input->post('amenities'),
            'capacity'   => $this->input->post('capacity'),
            'tipe_kasur' => $this->input->post('tipe_kasur'),
            'is_active'  => $this->input->post('is_active') ?: 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Upload gambar utama
        if ($_FILES['main_image']['name']) {
            $upload = $this->_do_upload('main_image');
            $data['main_image'] = $upload;
        }

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
        // ID wajib dari form
        $id = $this->input->post('id');

        if (!$id) {
            echo json_encode([
                "status" => false,
                "message" => "ID tidak ditemukan"
            ]);
            return;
        }

        // Data utama
        $data = [
            'name'       => $this->input->post('name'),
            'deskripsi'  => $this->input->post('deskripsi'),
            'price'      => $this->input->post('price'),
            'amenities'  => $this->input->post('amenities'),
            'capacity'   => $this->input->post('capacity'),
            'tipe_kasur' => $this->input->post('tipe_kasur'),
            'is_active'  => $this->input->post('is_active'),
        ];

        // Jika upload gambar baru
        if (!empty($_FILES['main_image']['name'])) {

            // Ambil data lama
            $old = $this->Alus_items->getid($id);

            // Hapus gambar lama jika ada
            if (!empty($old->main_image) && file_exists('./assets/img/room/' . $old->main_image)) {
                unlink('./assets/img/room/' . $old->main_image);
            }

            // Upload gambar baru
            $upload = $this->_do_upload('main_image');
            $data['main_image'] = $upload;
        }

        // Update database → harus kirim ID + DATA
        $q = $this->Alus_items->edit($id, $data);

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Berhasil Update Data" : "Gagal Menyimpan Data",
        ]);
    }

    // Fungsi Delete Data Kamar
    public function delete($id)
    {
        $old = $this->Alus_items->getid($id);
        if ($old && !empty($old->image) && file_exists('./assets/img/room/' . $old->image)) {
            unlink('./assets/img/room/' . $old->image);
        }

        $q = $this->Alus_items->delete($id); // needs to exist in model

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

}
