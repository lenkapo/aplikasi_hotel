<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
 */
class Group extends CI_Controller
{

	private $privilege;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Group_model', 'model');

		if (!$this->alus_auth->logged_in()) {
			redirect('admin/Login', 'refresh');
		}
		$this->privilege = $this->Alus_hmvc->cek_privilege($this->uri->segment(1));
		if ($this->privilege['can_view'] == '0') {
			echo "<script type='text/javascript'>alert('You dont have permission to access this menu');</script>";
			redirect('dashboard', 'refresh');
		}
	}

	public function index()
	{

		if ($this->alus_auth->logged_in()) {
			$head['title'] = "Manajemen Group";
			$data['can_add'] = $this->privilege['can_add'];

			$this->load->view('template/temaalus/header', $head);
			$this->load->view('index.php', $data);
			$this->load->view('template/temaalus/footer');
		} else {
			redirect('admin/Login', 'refresh');
		}
	}


	public function hak_akses($id)
	{
		$data['id'] = $id;
		$sql = $this->model->hak_akses_mod($id);
		foreach ($sql->result() as $oo) {
			$data['menus'][] = $oo->id_menu;
			$data['canad'][] = $oo->can_add;
			$data['canedit'][] = $oo->can_edit;
			$data['candelet'][] = $oo->can_delete;
			$data['canview'][] = $oo->can_view;
			$data['psv'][] = $oo->psv;
			$data['pev'][] = $oo->pev;
			$data['psed'][] = $oo->psed;
			$data['peed'][] = $oo->peed;
		}
		$data['result'] = $this->model->all_tree();
		$this->load->view('group/hak_akses', $data);
	}

	public function save_hak_akses()
	{
		// cek privilege
		if ($this->privilege['can_edit'] == 0) {
			echo json_encode([
				"status" => FALSE,
				"msg"    => "You Dont Have Permission"
			]);
			return;
		}

		$id_group = $this->input->post('id_group');
		$bot      = $this->input->post('bot');

		// validasi manual (lebih stabil untuk array)
		if (empty($id_group) || empty($bot)) {
			echo json_encode([
				"status" => FALSE,
				"msg"    => "Group atau menu belum dipilih"
			]);
			return;
		}

		// ambil semua input array
		$menu      = $this->input->post('menu');
		$canview   = $this->input->post('canview');
		$canedit   = $this->input->post('canedit');
		$canadd    = $this->input->post('canadd');
		$candelete = $this->input->post('candelete');
		$psv       = $this->input->post('psv');
		$pev       = $this->input->post('pev');
		$psed      = $this->input->post('psed');
		$peed      = $this->input->post('peed');

		$data_insert = [];

		foreach ($bot as $idx) {

			if (!isset($menu[$idx])) {
				continue;
			}

			$data_insert[] = [
				'id_group'   => $id_group,
				'id_menu'    => $menu[$idx],
				'can_view'   => isset($canview[$idx])   ? $canview[$idx]   : 0,
				'can_edit'   => isset($canedit[$idx])   ? $canedit[$idx]   : 0,
				'can_add'    => isset($canadd[$idx])    ? $canadd[$idx]    : 0,
				'can_delete' => isset($candelete[$idx]) ? $candelete[$idx] : 0,
				'psv'  => !empty($psv[$idx])  ? date('Y-m-d H:i:s', strtotime($psv[$idx]))  : NULL,
				'pev'  => !empty($pev[$idx])  ? date('Y-m-d H:i:s', strtotime($pev[$idx]))  : NULL,
				'psed' => !empty($psed[$idx]) ? date('Y-m-d H:i:s', strtotime($psed[$idx])) : NULL,
				'peed' => !empty($peed[$idx]) ? date('Y-m-d H:i:s', strtotime($peed[$idx])) : NULL,
			];
		}

		// mulai transaction
		$this->db->trans_begin();

		// hapus hak akses lama (sekali saja)
		$this->model->del_ga($id_group);

		// insert baru
		if (!empty($data_insert)) {
			$this->model->upres($data_insert);
		}

		// cek hasil transaction
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo json_encode([
				"status" => FALSE,
				"msg"    => "Gagal update hak akses"
			]);
		} else {
			$this->db->trans_commit();
			echo json_encode([
				"status" => TRUE
			]);
		}
	}

	/* SERVER SIDE */
	/* Server Side Data */
	/* Modified by : Maulana.code@gmail.com */
	public function ajax_list()
	{
		$list = $this->model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->name;
			$row[] = $person->description;
			if ($this->privilege['can_edit'] == 1 && $this->privilege['can_delete'] == 1) {
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" data-toggle="tooltip" title="Edit Group" onclick="edit_person(' . "'" . $person->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>';

				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" data-toggle="tooltip" title="Edit Hak Akses" onclick="openform(' . "'" . $person->id . "'" . ')"><i class="glyphicon glyphicon-list-alt"></i></a>';

				$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" data-toggle="tooltip" title="Hapus" onclick="delete_person(' . "'" . $person->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i></a>';
			} elseif ($this->privilege['can_edit'] == 0 && $this->privilege['can_delete'] == 1) {
				$row[] = '';
				$row[] = '';
				$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" data-toggle="tooltip" title="Hapus" onclick="delete_person(' . "'" . $person->id . "'" . ')"><i class="glyphicon glyphicon-trash"></i></a>';
			} elseif ($this->privilege['can_edit'] == 1 && $this->privilege['can_delete'] == 0) {
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" data-toggle="tooltip" title="Edit Group" onclick="edit_person(' . "'" . $person->id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>';

				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" data-toggle="tooltip" title="Edit Hak Akses" onclick="openform(' . "'" . $person->id . "'" . ')"><i class="glyphicon glyphicon-list-alt"></i></a>';

				$row[] = '';
			} else {
				$row[] = '';
				$row[] = '';
				$row[] = '';
			}
			//add html for action
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model->count_all(),
			"recordsFiltered" => $this->model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->model->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		if ($this->privilege['can_add'] == 0) {
			echo json_encode(array("status" => FALSE, "msg" => "You Dont Have Permission"));
		} else {
			$this->form_validation->set_rules('group_nama', 'Nama Group', 'required');
			if ($this->form_validation->run() == true) {
				$data = array(
					'name' => $this->input->post('group_nama'),
					'description' => $this->input->post('des_group'),
				);
				$insert = $this->model->save($data);
				echo json_encode(array("status" => TRUE));
			} else {
				echo json_encode(array("status" => FALSE, "msg" => validation_errors()));
			}
		}
	}

	public function ajax_update()
	{
		if ($this->privilege['can_edit'] == 0) {
			echo json_encode(array("status" => FALSE, "msg" => "You Dont Have Permission"));
		} else {

			$this->form_validation->set_rules('group_nama', 'Nama Group', 'required');
			if ($this->form_validation->run() == true) {
				$data = array(
					'name' => $this->input->post('group_nama'),
					'description' => $this->input->post('des_group'),
				);
				$this->model->update(array('id' => $this->input->post('id')), $data);
				echo json_encode(array("status" => TRUE));
			} else {
				echo json_encode(array("status" => FALSE, "msg" => validation_errors()));
			}
		}
	}

	public function ajax_delete($id)
	{
		if ($this->privilege['can_delete'] == 0) {
			echo json_encode(array("status" => FALSE, "msg" => "You Dont Have Permission"));
		} else {
			$this->model->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}
	}
}

/* End of file  Home.php */
/* Location: ./application/controllers/ Home.php */