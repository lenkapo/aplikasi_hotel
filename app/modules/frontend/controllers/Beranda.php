<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller: Beranda
 * Author: Maulana Rahman (refactored)
 * Deskripsi: Menangani halaman utama, detail kamar, dan tampilan fasilitas hotel.
 */

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'Beranda_model',
			'Room_model',
			'Reservasi_model',
			'Gallery_model',
			'Post_model',
			'Category_model',
			'User_model',
			'Comment_model',
			'Hotel_model'
		]);
		$this->load->helper(['url', 'form', 'text']);
		$this->load->library(['session', 'form_validation']);
	}

	/**
	 * Halaman utama website (beranda)
	 */
	public function index()
	{
		// ambil layanan
		$extra_services = $this->Beranda_model->get_all_extra_services();

		// ambil fitur layanan
		foreach ($extra_services as $s) {
			$s->fitur = $this->Beranda_model->get_features_by_service($s->id);
		}
		$data = [
			'title'           => 'Beranda',

		];


		$this->_load_template('beranda', $data);
	}


	/**
	 * Detail fasilitas hotel
	 * @param int $id_amenity
	 */
	public function facilities($id_amenity)
	{
		$amenity = $this->Beranda_model->get_amenity_details($id_amenity);
		if (!$amenity) {
			show_404();
			return;
		}

		$data = [
			'title' => "{$amenity->nama_amenity} - Detail Fasilitas",
			'amenity_detail' => $amenity,
			'featured_amenities' => $this->Beranda_model->get_other_amenities($id_amenity, 4),
			'facilities' => $this->Beranda_model->get_all_facilities()
		];

		$this->_load_template('facilities', $data);
	}

	/**
	 * Halaman restoran
	 */
	public function restaurant()
	{
		$data = [
			'title' => 'Restaurant',
			'menus' => $this->Beranda_model->get_all_menus(),
			'testimonials' => $this->Beranda_model->get_testimonials()
		];

		// Proses form booking meja
		if ($this->input->post('book_table')) {
			$this->_submit_booking();
		}

		$this->_load_template('restaurant', $data);
	}

	/**
	 * Form reservasi kamar
	 * @param string|null $no_kamar
	 */
	public function reserve($no_kamar = NULL)
	{
		$search_data = $this->session->userdata('search_data');
		if (!$search_data || !$no_kamar) {
			redirect('booking');
		}

		$room_details = $this->Kamar_model->get_kamar_details_by_no($no_kamar);
		if (!$room_details) {
			show_404();
		}

		$arrival = new DateTime($search_data['arrival']);
		$leave = new DateTime($search_data['leave']);
		$durasi = max($arrival->diff($leave)->days, 1);

		$data = [
			'title' => 'Lengkapi Detail Reservasi',
			'no_kamar' => $no_kamar,
			'room' => $room_details,
			'search_data' => $search_data,
			'durasi' => $durasi,
			'total_harga' => $durasi * $room_details->harga_per_malam
		];

		$this->_load_template('booking/form_reservasi', $data);
	}

	/**
	 * Proses penyimpanan reservasi
	 */
	public function process_reserve()
	{
		$this->form_validation->set_rules('nama_tamu', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric');

		$no_kamar = $this->input->post('no_kamar', TRUE);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('beranda/reserve/' . $no_kamar);
		}

		// Ambil input
		$data_tamu = [
			'nama_tamu' => $this->input->post('nama_tamu', TRUE),
			'email'     => $this->input->post('email', TRUE),
			'no_telp'   => $this->input->post('no_telp', TRUE),
			'alamat'    => $this->input->post('alamat', TRUE)
		];

		$data_reservasi = [
			'kode_reservasi'    => $this->Reservasi_model->generate_kode_reservasi(),
			'tgl_reservasi'     => date('Y-m-d H:i:s'),
			'check_in_date'     => $this->input->post('arrival_date', TRUE),
			'check_out_date'    => $this->input->post('leave_date', TRUE),
			'total_biaya'       => $this->input->post('total_harga', TRUE),
			'status_reservasi'  => 'Pending'
		];

		$data_detail = [
			'no_kamar'             => $no_kamar,
			'jumlah_dewasa'        => $this->input->post('adults', TRUE),
			'jumlah_anak'          => $this->input->post('children', TRUE),
			'harga_saat_reservasi' => $this->input->post('harga_per_malam', TRUE)
		];

		// Simpan data ke DB via model
		$id_reservasi = $this->Beranda_model->simpan_reservasi($data_tamu, $data_reservasi, $data_detail);

		if ($id_reservasi) {
			$this->session->set_flashdata('success', 'Reservasi berhasil! Kode Anda: ' . $data_reservasi['kode_reservasi']);
			redirect('booking/confirmation/' . $data_reservasi['kode_reservasi']);
		} else {
			$this->session->set_flashdata('error', 'Reservasi gagal, coba lagi.');
			redirect('booking');
		}
	}

	/**
	 * Detail kamar
	 * @param int $id
	 */
	public function details($id = 1)
	{
		$room = $this->Beranda_model->get_room_detail($id);
		if (!$room) {
			show_404();
		}

		$room->gallery = $this->Beranda_model->get_room_gallery($id);

		$data = [
			'title' => "Detail Kamar: " . $room->name,
			'room' => $room,
			'room_price' => number_format($room->price, 2, '.', ','),
			'amenities' => !empty($room->amenities) ? explode(',', $room->amenities) : []
		];

		$this->_load_template('room_detail', $data);
	}

	public function room()
	{
		$rooms = $this->Room_model->get_all_rooms();
		$today = date('Y-m-d');

		foreach ($rooms as $room) {
			$room->discount_percent = 0;
			$room->discount_rp = 0;
			$room->is_daily_deal = false;
			$room->time_left = null;

			// cek diskon
			if (!empty($room->old_price) && $room->old_price > $room->price) {
				$room->discount_rp = $room->old_price - $room->price;
				$room->discount_percent = round(
					(($room->old_price - $room->price) / $room->old_price) * 100
				);
			}

			// cek Daily Deal (tanggal)
			if (!empty($room->promo_start) && !empty($room->promo_end)) {
				if ($today >= $room->promo_start && $today <= $room->promo_end) {
					$room->is_daily_deal = true;
					$room->time_left = $room->promo_end . ' 23:59:59';
				}
			}
		}

		// urutkan promo paling dekat habis dulu
		usort($rooms, function ($a, $b) {
			$ta = $a->time_left_seconds ?? PHP_INT_MAX;
			$tb = $b->time_left_seconds ?? PHP_INT_MAX;
			return $ta <=> $tb;
		});

		$data = [
			'title' => 'Beranda',
			'rooms' => $rooms,
		];

		$this->_load_template('room', $data);
	}

	public function ourhotel()
	{
		$data['title'] = 'Our Hotels';
		$data['featured'] = $this->Hotel_model->get_featured();
		$data['hotels']   = $this->Hotel_model->get_others();

		$this->_load_template('our_hotel', $data);
	}



	// Halaman galeri
	public function gallery()
	{
		$data = [
			'title' => 'Gallery',
			'all_gallery' => $this->Gallery_model->get_all_gallery_with_active()
		];
		$this->_load_template('gallery', $data);
	}

	/**
	 * Halaman Blog - daftar artikel
	 */
	public function blog()
	{
		// pagination setup
		$this->load->library('pagination');

		$config['base_url'] = site_url('beranda/blog');
		$config['total_rows'] = $this->Post_model->count_posts();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

		// bootstrap style pagination
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';

		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>';

		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';

		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);

		$page = $this->uri->segment(3, 0);

		$data = [
			'title'         => 'Blog Classic',
			'posts'         => $this->Post_model->get_all_posts($config['per_page'], $page),
			'categories'    => $this->Category_model->get_all_categories(),
			'recent_posts'  => $this->Post_model->get_recent_posts(5),
			'admin'         => $this->User_model->get_admin_profile(),
			'post_count' => $this->Post_model->count_posts(),
			'popular' => $this->Post_model->get_popular_posts(5),
			'popular_tags'  => $this->Post_model->get_popular_tags(10),
			'paging'        => $this->pagination->create_links()
		];

		$this->_load_template('blog', $data);
	}

	/**
	 * Halaman Detail Blog
	 */
	public function blog_detail($slug)
	{
		$post = $this->Post_model->get_post_by_slug($slug);
		$comments = $this->Comment_model->get_comments($post->id);

		if (!$post) {
			show_404();
			return;
		}

		$data = [
			'title'         => $post->title,
			'post'          => $post,
			'categories'    => $this->Category_model->get_all_categories(),
			'recent_posts'  => $this->Post_model->get_recent_posts(5),
			'comments'      => $comments,
			'popular' => $this->Post_model->get_popular_posts(5),
			'popular_tags'  => $this->Post_model->get_popular_tags(10),
			'quotes'        => $this->Post_model->get_quotes(1),
			'topics'        => $this->Post_model->get_top_topics(10),
		];

		$this->_load_template('blog_detail', $data);
	}
	public function add_comment()
	{
		$post_id = $this->input->post('post_id');
		$slug    = $this->input->post('slug'); // slug dikirim dari form
		$name    = $this->input->post('name');
		$email   = $this->input->post('email');
		$comment = $this->input->post('comment');

		$this->load->model('Comment_model');

		$this->Comment_model->insert_comment([
			'post_id'     => $post_id,
			'name'        => $name,
			'email'       => $email,
			'comment'     => $comment,
			'created_at'  => date('Y-m-d H:i:s')
		]);

		redirect('blog_detail/' . $this->input->post('slug'), 'refresh');
	}

	/**
	 * Helper untuk memuat template (header + footer)
	 */
	private function _load_template($view, $data = [])
	{
		$this->load->view('frontend/header', $data);
		$this->load->view($view, $data);
		$this->load->view('frontend/footer');
	}

	public function search()
	{
		$checkin   = $this->input->get('checkin');
		$checkout  = $this->input->get('checkout');
		$room_type = $this->input->get('tipe_kamar');

		// VALIDASI INPUT
		if (!$checkin || !$checkout) {
			$this->session->set_flashdata('error', 'Tanggal check-in dan check-out wajib diisi.');
			redirect('beranda');
		}

		// AMBIL DATA KAMAR YANG AVAILABLE
		$rooms = $this->Kamar_model->search_available_room($checkin, $checkout, $room_type);
		$fasilitas   = $this->Beranda_model->get_all_amenities_by_hotel(1);

		// KIRIM KE VIEW
		$data = [
			'title' => 'Hasil Pencarian',
			'rooms' => $rooms, // ⬅ WAJIB: sesuaikan dengan view
			'checkin' => $checkin,
			'checkout' => $checkout,
			'fasilitas' => $fasilitas
		];

		$this->_load_template('hasil_search', $data);
	}

	// Tentang Kami
	public function tentangkami()
	{
		$data = [
			'popular_post' => $this->Post_model->get_popular_posts(5),
			'title' => 'Tentang Kami'
		];

		$this->_load_template('tentang_kami', $data);
	}

	// Contact Kami
	public function contact()
	{
		$data = [
			'popular_post' => $this->Post_model->get_popular_posts(5),
			'title' => 'Kontak Kami'
		];

		$this->_load_template('contact', $data);
	}
	// Send Message	
	public function send_message()
	{
		$name = $this->input->post('name', true);
		$email = $this->input->post('email', true);
		$subject = $this->input->post('subject', true);
		$message = $this->input->post('message', true);

		// Simpan ke database
		$data = [
			'name' => $name,
			'email' => $email,
			'subject' => $subject,
			'message' => $message,
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->db->insert('contact_messages', $data);

		// Redirect atau tampilkan notifikasi sukses
		$this->session->set_flashdata('success', 'Your message has been sent successfully!');
		redirect('contact');
	}
}
