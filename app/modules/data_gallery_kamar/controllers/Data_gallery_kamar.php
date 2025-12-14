<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author      Maulana Rahman <maulana.code@gmail.com>
 */

class Data_gallery_kamar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'Alus_items');
    }

    public function index()
    {
        if ($this->alus_auth->logged_in()) {
            $title_head = "Data Gallery Kamar";
            $head['title'] = $title_head;
            $data['title_head'] = $title_head;

            /*DATA*/

            /*END DATA*/

            $this->load->view('template/temaalus/header', $head);
            $this->load->view('index', $data);
            $this->load->view('template/temaalus/footer');
        } else {
            redirect('admin/login', 'refresh');
        }
    }


    /*AJAX LIST*/
    public function ajax_list()
    {
        $list = $this->Alus_items->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $nama_kamar = $this->db
                ->get_where('tipe_kamar', ['id' => $person->id_kamar])
                ->row();
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img src="' . base_url('assets/img/room/') . $person->image_path . '" width="200px" height="auto">';
            $row[] = $nama_kamar->name;
            $row[] = $person->caption;
            $row[] = $person->is_active ? "<span class='label label-success'>Active</span>"
                : "<span class='label label-danger'>Not Active</span>";
            $row[] = "<a href='javascript:' onClick='btn_modal_edit(" . $person->id . ")' data-toggle='tooltip' data-placement='bottom' title='Edit' class='btn btn-xs btn-flat btn-primary' style='background:#00897b'><i class='fa fa-edit'></i> Edit</a>" . "<a href='javascript:' onClick='btn_modal_delete(" . $person->id . ")' data-toggle='tooltip' data-placement='bottom' title='Delete' class='btn btn-xs btn-flat btn-danger'><i class='fa fa-trash'></i> Delete</a>";
            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Alus_items->count_all(),
            "recordsFiltered" => $this->Alus_items->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function modal_add()
    {
        $data['title'] = "Tambah Data Gallery";
        $data['tipe_kamar'] = $this->db->get('tipe_kamar')->result();
        $this->load->view('ajax/modal_add', $data, FALSE);
    }

    function modal_edit($id)
    {
        $data['data'] = $this->Alus_items->getid($id);
        $data['data'] = $this->db->get_where('gallery_kamar', ['id' => $id])->result();
        $data['title'] = "Edit Data Gallery";
        $this->load->view('ajax/modal_edit', $data, FALSE);
    }

    /*ACTION*/

    function save()
    {
        $this->form_validation->set_rules('caption', 'Judul Gambar', 'required');

        $data = array(
            'caption' => $this->input->post('caption'),
            'id_kamar' => $this->input->post('id_kamar'),
            'is_active' => $this->input->post('is_active'),
        );

        if (isset($_FILES['image_path']) && $_FILES['image_path']['name'] != '') {
            //--upload
            $upload = $this->_do_upload('image_path'); // Meneruskan 'image_path' ke fungsi upload
            $m_file = $upload;

            // Simpan nama file hasil upload ke database dengan kolom 'image_path'
            $data['image_path'] = $m_file;
        }

        $q = $this->Alus_items->save($data);
        if ($q) {
            $output = array(
                "status" => true,
                "message" => "Berhasil",
            );
        } else {
            $output = array(
                "status" => false,
                "message" => "Gagal Simpan",
            );
        }

        //output to json format
        echo json_encode($output);
    }


    public function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'caption' => $this->input->post('caption'),
            'id_kamar' => $this->input->post('id_kamar'),
            'is_active' => $this->input->post('is_active'),
        );
        // Jika upload gambar baru
        if (!empty($_FILES['image_path']['name'])) {

            // Ambil data lama
            $old = $this->Alus_items->getid($id);

            // Hapus gambar lama jika ada
            if (!empty($old->image_path) && file_exists('./assets/img/room/' . $old->image_path)) {
                unlink('./assets/img/room/' . $old->image_path);
            }

            // Upload gambar baru
            $upload = $this->_do_upload('image_path');
            $data['image_path'] = $upload;
        }

        $q = $this->Alus_items->edit($data);
        if ($q) {
            $output = array(
                "status" => true,
                "message" => "Berhasil",
            );
        } else {
            $output = array(
                "status" => false,
                "message" => "Gagal Simpan",
            );
        }

        //output to json format
        echo json_encode($output);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $dt_lama = $this->db->get('categories');

        if ($dt_lama->num_rows() > 0) {
            if (file_exists('./assets/movies/' . $dt_lama->row()->picture)) {
                unlink('assets/movies/' . $dt_lama->row()->picture);
            }

            if (file_exists('./assets/movies/' . $dt_lama->row()->file_movie)) {
                unlink('assets/movies/' . $dt_lama->row()->file_movie);
            }
        }

        $q = $this->Alus_items->delete($id);
        if ($q) {
            $output = array(
                "status" => true,
                "message" => "Berhasil",
            );
        } else {
            $output = array(
                "status" => false,
                "message" => "Gagal",
            );
        }

        //output to json format
        echo json_encode($output);
    }

    private function _do_upload($key)
    {
        $config['upload_path']          = './assets/img/room';
        $config['allowed_types']        = '*';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['file_name']            = round(microtime(true) * 100); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($key)) //upload and validate
        {
            echo json_encode(array("status" => FALSE, "msg" => $this->upload->display_errors('', '')));

            exit();
        } else {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/room' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['width'] = 400;
            $config['height'] = 600;
            $config['new_image'] = './assets/img/room' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $gbr['file_name'];
        }
    }
}

/* Location: ./application/modules/X/controllers/X.php */
/* End of file X.php */
