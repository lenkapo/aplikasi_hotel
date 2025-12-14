<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_banner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'Alus_items');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper(['form', 'url']);
    }

    // Halaman Utama / Tampilan Data Banner
    public function index()
    {
        if ($this->alus_auth->logged_in()) {

            $title_head = "Data Banner";
            $head['title'] = $title_head;
            $data['title_head'] = $title_head;

            $this->load->view('template/temaalus/header', $head);
            $this->load->view('index', $data);
            $this->load->view('template/temaalus/footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    // Ajax Datatables
    public function ajax_list()
    {
        $list = $this->Alus_items->get_datatables();
        $data = [];
        $no = $_POST['start'];

        foreach ($list as $banner) {
            $no++;

            $row = [];
            $row[] = $no;
            $row[] = '<img src="' . base_url('assets/img/banner/' . $banner->image) . '" width="200px">';
            $row[] = $banner->title;
            $row[] = $banner->created_at;
            $row[] = $banner->is_active ?
                "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>Not Active</span>";

            $row[] =
                "<a href='javascript:void(0)' onClick='btn_modal_view(" . $banner->id . ")' 
                data-toggle='tooltip' class='btn btn-xs btn-info btn-flat' title='Info'>
                <i class='fa fa-eye'></i>
                </a>" .

                "<a href='javascript:void(0)' onClick='btn_modal_edit(" . $banner->id . ")' 
                data-toggle='tooltip' title='Edit'
                class='btn btn-xs btn-primary btn-flat'>
                <i class='fa fa-edit'></i>
                </a> " .

                "<a href='javascript:void(0)' onClick='btn_modal_delete(" . $banner->id . ")' 
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

    // Modal Tambah / Add Data Banner
    function modal_add()
    {
        $data['title'] = "Tambah Data Banner";
        $this->load->view('ajax/modal_add', $data);
    }

    // Modal Edit / Update Data Banner
    function modal_edit($id)
    {
        $data['data'] = $this->Alus_items->getid($id);
        $data['title'] = "Edit Data Banner";

        if (!$data['data']) {
            echo "<div class='modal-body'><p class='text-danger'>Data tidak ditemukan</p></div>";
            return;
        }

        $this->load->view('ajax/modal_edit', $data);
    }

    // Modal View / Info
    public function modal_view($id)
    {
        $data['title'] = "Informasi Banner";
        $data['banner'] = $this->Alus_items->getid($id);

        if (!$data['banner']) {
            echo "<p style='padding:20px; color:red;'>Data tidak ditemukan.</p>";
            return;
        }

        $this->load->view('ajax/modal_view', $data);
    }

    // Save Data
    function save()
    {
        $this->form_validation->set_rules('title', 'Nama Banner', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(["status" => false, "message" => validation_errors()]);
            return;
        }

        $data = [
            'title'       => $this->input->post('title'),
            'is_active'  => $this->input->post('is_active') ?: 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($_FILES['image']['name']) {
            $upload = $this->_do_upload('image');
            if (!$upload['status']) {
                echo json_encode(["status" => false, "message" => $upload['error']]);
                return;
            }
            $data['image'] = $upload['file'];
        }
    }

    // Fungsi Edit/Update Data Banner
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
            'title'       => $this->input->post('title'),
        ];

        // Jika upload gambar baru
        if (!empty($_FILES['image']['name'])) {

            // Ambil data lama
            $old = $this->Alus_items->getid($id);

            // Hapus gambar lama jika ada
            if (!empty($old->image) && file_exists('./assets/img/banner/' . $old->image)) {
                unlink('./assets/img/banner/' . $old->image);
            }

            // Upload gambar baru
            $upload = $this->_do_upload('image');
            $data['image'] = $upload;
        }

        // Update database → harus kirim ID + DATA
        $q = $this->Alus_items->edit($id, $data);

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Berhasil Update Data" : "Gagal Menyimpan Data",
        ]);
    }


    // Privat Fungsi Upload Data Gambar ('image')
    private function _do_upload($key)
    {
        $config['upload_path']   = './assets/img/banner/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5000;
        $config['file_name']     = "Banner_" . time();

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($key)) {
            echo json_encode(["status" => false, "message" => $this->upload->display_errors()]);
            exit();
        }

        return $this->upload->data('file_name');
    }

    // Fungsi Delete Data Banner
    public function delete($id)
    {
        $old = $this->Alus_items->getid($id);
        if ($old && !empty($old->image) && file_exists('./assets/img/banner/' . $old->image)) {
            unlink('./assets/img/banner/' . $old->image);
        }

        $q = $this->Alus_items->delete($id); // needs to exist in model

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Banner deleted successfully" : "Failed to delete banner"
        ]);
    }
}
