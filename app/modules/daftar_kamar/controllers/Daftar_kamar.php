<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_kamar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'Alus_items');
        $this->load->library(['form_validation', 'upload']);
        $this->load->helper(['form', 'url']);
    }

    // =====================================================================
    // MAIN PAGE
    // =====================================================================
    public function index()
    {
        if ($this->alus_auth->logged_in()) {
            $title_head = "Daftar Kamar";
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

        foreach ($list as $daftar_kamar) {
            $nama_kamar = $this->db
                ->get_where('rooms', ['id' => $daftar_kamar->room_id])
                ->row();

            $no++;

            $row = [];
            $row[] = $no;
            $row[] = $daftar_kamar->nomor_kamar;
            $row[] = $nama_kamar ? $nama_kamar->room_name : '-';
            $row[] = $daftar_kamar->status === 'available'
                ? "<span class='label label-success'>Available</span>"
                : "<span class='label label-danger'>Booked</span>";

            // Tombol Aksi
            $buttons = "
                <a href='javascript:void(0)' onClick='btn_modal_view(" . $daftar_kamar->id . ")'
                    class='btn btn-xs btn-info btn-flat' title='Info'>
                    <i class='fa fa-eye'></i>
                </a>";

            $user_role = $this->alus_auth->get_user_role();
            $uri = 'daftar_kamar';

            if (in_array($user_role, ['admin', 'resepsionist'])) {
                $buttons .= "
                    <a href='javascript:void(0)' onClick='btn_modal_edit(" . $daftar_kamar->id . ")'
                        class='btn btn-xs btn-primary btn-flat' title='Edit'>
                        <i class='fa fa-edit'></i>
                    </a>
                    <a href='javascript:void(0)' onClick='btn_modal_delete(" . $daftar_kamar->id . ")'
                        class='btn btn-xs btn-danger btn-flat' title='Hapus'>
                        <i class='fa fa-trash'></i>
                    </a>";
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
        $uri = 'daftar_kamar';
        if (
            ! $this->alus_auth->in_group(['admin', 'resepsionist']) &&
            ! $this->alus_auth->can_add($uri)
        ) {
            show_error('Akses ditolak. Anda tidak memiliki izin menambah data kamar.', 403);
            return;
        }

        $data['title'] = "Tambah Daftar Kamar";
        $data['rooms'] = $this->Alus_items->get_rooms();

        $this->load->view('ajax/modal_add', $data);
    }

    public function modal_edit($id)
    {
        $uri = 'daftar_kamar';

        if (
            ! $this->alus_auth->in_group(['admin', 'resepsionist'])
            && ! $this->alus_auth->can_edit($uri)
        ) {
            show_error('Akses ditolak. Anda tidak memiliki izin edit data.', 403);
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
    // SAVE DATA (ADD)
    // =====================================================================
    public function save()
    {
        $nomor_kamar = $this->input->post('nomor_kamar');

        // === Validasi duplikasi nomor kamar ===
        if ($this->Alus_items->check_duplicate($nomor_kamar)) {
            echo json_encode(['status' => false, 'message' => 'Nomor kamar sudah digunakan!']);
            return;
        }

        $data = [
            'room_id' => $this->input->post('room_id'),
            'nomor_kamar' => $nomor_kamar,
            'status' => $this->input->post('status')
        ];

        $q = $this->Alus_items->save($data);

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Berhasil menyimpan data" : "Gagal menyimpan data"
        ]);
    }

    // =====================================================================
    // UPDATE DATA (EDIT)
    // =====================================================================
    public function edit()
    {
        $id = $this->input->post('id');
        $nomor_kamar = $this->input->post('nomor_kamar');

        // Validasi unik (ignore ID sendiri)
        if ($this->Alus_items->check_duplicate($nomor_kamar, $id)) {
            echo json_encode(['status' => false, 'message' => 'Nomor kamar sudah digunakan!']);
            return;
        }

        $data = [
            'room_id' => $this->input->post('room_id'),
            'nomor_kamar' => $nomor_kamar,
            'status' => $this->input->post('status')
        ];

        $q = $this->Alus_items->edit($id, $data);

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Berhasil update data" : "Gagal update data"
        ]);
    }

    // =====================================================================
    // DELETE DATA
    // =====================================================================
    public function delete($id)
    {
        $uri = 'daftar_kamar';

        if (
            ! $this->alus_auth->in_group(['admin', 'resepsionist'])
            && ! $this->alus_auth->can_delete($uri)
        ) {
            show_error('Akses ditolak. Anda tidak memiliki izin delete data.', 403);
            return;
        }

        $q = $this->Alus_items->delete($id);

        echo json_encode([
            "status" => $q ? true : false,
            "message" => $q ? "Data berhasil dihapus" : "Gagal menghapus data"
        ]);
    }
}
