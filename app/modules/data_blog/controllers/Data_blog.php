<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author      Maulana Rahman <maulana.code@gmail.com>
 */

class Data_blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'Alus_items');
        $this->load->library(array('form_validation', 'upload', 'image_lib', 'session'));
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->alus_auth->logged_in()) {
            $title_head = "Data Blog";
            $head['title'] = $title_head;
            $data['title_head'] = $title_head;

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
            $user = $this->db
                ->get_where('users', ['id' => $person->user_id])
                ->row();
            $kategori = $this->db
                ->get_where('categories', ['id' => $person->category_id])
                ->row();
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img src="' . base_url('assets/img/blog/') . $person->thumbnail . '" width="200px" height="auto">';
            $row[] = $user->name;
            $row[] = $kategori->name;
            $row[] = $person->title;
            $row[] = $person->slug;
            $row[] = $person->content;
            $row[] = $person->published_date;
            $row[] = $person->created_at;
            $row[] = $person->published_at;
            $row[] = $person->updated_at;
            $row[] = $person->status ? "<span class='label label-success'>Published</span>"
                : "<span class='label label-danger'>Draft</span>";
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
        $data['title'] = "Tambah Data Blog";
        $data['categories'] = $this->Alus_items->get_all_categories();
        $this->load->view('ajax/modal_add', $data, FALSE);
    }

    function modal_edit($id)
    {
        $data['data'] = $this->Alus_items->getid($id);
        $data['title'] = "Edit Data Blog";
        $this->load->view('ajax/modal_edit', $data, FALSE);
    }

    /*ACTION*/
    function save()
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $slug = url_title($title, 'dash', TRUE) . '-' . time();
        $user_id = $this->session->userdata('id') ?: 1;
        $category_id = $this->input->post('category_id') ?: NULL;
        $status_input = $this->input->post('status');
        $status = intval($status_input);

        $data = [
            'user_id'        => $user_id,
            'category_id'    => $category_id,
            'title'          => $title,
            'slug'           => $slug,
            'content'        => $content,
            'status'         => $status,
            'published_date' => ($status === 1) ? date('Y-m-d') : NULL,
            'published_at'   => ($status === 1) ? date('Y-m-d H:i:s') : NULL,
            'created_at'     => date('Y-m-d H:i:s'),
        ];


        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != '') {
            //--upload
            $upload = $this->_do_upload('thumbnail'); // Meneruskan 'thumbnail' ke fungsi upload
            $m_file = $upload;

            // Simpan nama file hasil upload ke database dengan kolom 'thumbnail'
            $data['thumbnail'] = $m_file;
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




    function edit()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'rating' => $this->input->post('rating'),
            'is_featured' => $this->input->post('featured'),
            'year' => $this->input->post('year'),
            'duration' => $this->input->post('duration'),
            'age' => $this->input->post('age'),
            'description' => $this->input->post('description'),
            'link_trailer' => $this->input->post('link_trailer'),
            'created_by_user_id' => $this->session->userdata('id'),
        );

        if ($_FILES['userfile']['name'] != '') {
            /*cek jika file lama ada, maka hapus */
            if ($this->input->post('userfile_lama') != "") {
                if (file_exists('./assets/movies/' . $this->input->post('userfile_lama'))) {
                    unlink('assets/movies/' . $this->input->post('userfile_lama'));
                }
            }
            /*cek*/

            //--upload
            $upload = $this->_do_upload('userfile');
            $m_file = $upload;

            $data['picture'] = $m_file;
        }

        $q = $this->Alus_items->edit($data);
        if (count($this->input->post('categories[]')) > 0) {
            $this->db->where('movie_id', $this->input->post('id'));
            $this->db->delete('movie_categories');

            foreach ($this->input->post('categories[]') as $key => $value) {
                $inp = array(
                    'movie_id' => $this->input->post('id'),
                    'category_id' => $value,
                );
                $this->db->insert('movie_categories', $inp);
            }
        }
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
        $config['upload_path']   = './assets/img/blog/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5000;
        $config['file_name']     = "Blog_" . time();

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($key)) {
            echo json_encode(["status" => false, "message" => $this->upload->display_errors()]);
            exit();
        }

        return $this->upload->data('file_name');
    }
}

/* Location: ./application/modules/X/controllers/X.php */
/* End of file X.php */
