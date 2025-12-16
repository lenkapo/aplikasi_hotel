<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller: Beranda
 * Author: Luqman Aly Razak (refactored)
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
			'Hotel_model',
			'Booking_model',
			'Subscriber_model',
			'Menu_model',
			'Services_model'
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
			'title' => 'Beranda',

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

	/** Halaman Menu */
	public function menu()
	{
		$this->load->model('Menu_model', 'menu');

		$data = [
			'title' => 'Menu | The Royal',
			'categories' => $this->menu->get_menu_by_category(),
		];
		$this->_load_template('menu', $data);
	}
	// Order Menu
	public function order_menu()
	{
		$data = [
			'menu_name' => $this->input->post('menu_name'),
			'price' => $this->input->post('price'),
			'customer' => $this->input->post('customer'),
			'room' => $this->input->post('room'),
			'quantity' => $this->input->post('quantity'),
			'note' => $this->input->post('note'),
			'created_at' => date('Y-m-d H:i:s')
		];
		$this->db->insert('orders', $data);
		echo json_encode(['status' => 'success', 'message' => 'Pesanan berhasil dikirim!']);
	}

	// Service 
	public function services()
	{
		$this->load->model('Services_model', 'services');

		$data = [
			'title' => 'Service | The Royal',
			'services' => $this->services->get_all(),
		];

		$this->_load_template('services', $data);
	}
	// Services Detail
	public function service_detail($slug)
	{
		$this->load->model('Services_model', 'services');

		$service = $this->services->get_by_slug($slug);
		if (!$service) show_404();

		$data['service'] = $service;
		$data['title'] = $service->service_name;

		$this->_load_template('services_detail', $data);
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

	// Room
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

	// Halaman Booking //
	public function booking()
	{
		$data['title'] = 'Booking';
		$data['rooms'] = $this->db->get('rooms')->result();
		$this->_load_template('booking', $data);
	}

	// Proses Submit Booking //
	public function submit()
	{
		if ($this->input->method() === 'post') {

			$arrival = $this->input->post('arrival_date');
			$departure = $this->input->post('departure_date');

			$arrivalDate   = new DateTime($arrival);
			$departureDate = new DateTime($departure);

			$nights = $arrivalDate->diff($departureDate)->days;

			$room_id = $this->input->post('room_id');

			$room = $this->Room_model->get_by_id($room_id);
			$price_per_night = $room->price;

			$total_price = $price_per_night * $nights;

			if ($nights <= 0) {
				$this->session->set_flashdata('error', 'Departure date harus lebih besar dari arrival date');
				redirect('booking');
			}

			$isAvailable = $this->Booking_model->is_room_available(
				$room_id,
				$arrivalDate->format('Y-m-d'),
				$departureDate->format('Y-m-d')
			);

			if (!$isAvailable) {
				$this->session->set_flashdata(
					'error',
					'Maaf, tipe kamar ini sudah penuh di tanggal tersebut'
				);
				redirect('booking');
			}

			$insert = [
				'full_name'       => $this->input->post('full_name', TRUE),
				'email'           => $this->input->post('email', TRUE),
				'phone'           => $this->input->post('phone', TRUE),
				'mobile'          => $this->input->post('mobile', TRUE),
				'city'            => $this->input->post('city', TRUE),
				'country'         => $this->input->post('country', TRUE),
				'adults'          => $this->input->post('adults', TRUE),
				'children'        => $this->input->post('children', TRUE),
				'arrival_date'    => !empty($arrival) ? date('Y-m-d', strtotime($arrival)) : NULL,
				'departure_date'  => !empty($departure) ? date('Y-m-d', strtotime($departure)) : NULL,
				'nights'         => $nights,
				'message'         => $this->input->post('message', TRUE),
				'room_id'         => $room_id,
				'price_per_night' => $price_per_night,
				'total_price'     => $total_price,
				'invoice_number' => $this->generateInvoice(),
				'status' => 'pending',
				'created_at'      => date('Y-m-d H:i:s')
			];
			$invoice = $insert['invoice_number'];

			$this->Booking_model->insert($insert);

			$invoice = $this->db
				->select('bookings.*, rooms.name AS room_name')
				->from('bookings')
				->join('rooms', 'rooms.id = bookings.room_id')
				->where('invoice_number', $insert['invoice_number'])
				->get()
				->row();

			$this->sendInvoiceEmail($invoice);


			$this->session->set_flashdata('success', 'Booking berhasil dikirim');
			redirect('booking');
		}
	}
	// Halaman Invoice //
	public function invoice($invoice_number = null)
	{
		if (!$invoice_number) {
			show_404();
		}

		$this->db->select('
        bookings.*,
        rooms.name AS room_name
    ');
		$this->db->from('bookings');
		$this->db->join('rooms', 'rooms.id = bookings.room_id');
		$this->db->where('bookings.invoice_number', $invoice_number);

		$data['invoice'] = $this->db->get()->row();

		if (!$data['invoice']) {
			show_404();
		}

		$data['title'] = 'Invoice';

		$this->_load_template('invoice', $data);
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

		$this->session->set_flashdata('success', 'Your message has been sent successfully!');
		redirect('contact');
	}
	/** SUBSCRIBES
	 * Fnnction subscribe di halaman footer
	 */
	public function subscribe()
	{
		$redirect = $this->input->server('HTTP_REFERER') ?: site_url();

		if ($this->input->method() !== 'post') {
			show_404();
		}

		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|valid_email'
		);

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata(
				'subscribe_error',
				validation_errors()
			);
			redirect($redirect);
		}

		$email = $this->input->post('email', TRUE);

		// cek email sudah terdaftar
		if ($this->Subscriber_model->is_email_exist($email)) {
			$this->session->set_flashdata(
				'subscribe_error',
				'Email sudah terdaftar.'
			);
			redirect($redirect);
		}
		$this->Subscriber_model->insert([
			'email' => $email,
			'status' => 'active',
			'created_at' => date('Y-m-d H:i:s')
		]);
		$this->session->set_flashdata(
			'subscribe_success',
			'<strong>Terima kasih telah berlangganan!</strong>'
		);

		redirect($redirect);
	}

	// =========================================================================================================== //
	// 		                                      PRIVATE FUNCTION                                                 //
	// ============================================================================================================//

	/**
	 * Helper untuk kirim Email (header + footer)
	 */
	private function sendInvoiceEmail($invoice)
	{
		// LOAD EMAIL LIBRARY DENGAN CONFIG
		$this->load->library('email');

		// SET HEADER EMAIL (WAJIB)
		$this->email->from('youngsta446@gmail.com', ' Royal Hotel Booking');
		$this->email->to($invoice->email);
		$this->email->subject('Invoice Booking - 	' . $invoice->invoice_number);

		// BODY EMAIL
		$message = $this->load->view('invoice', ['invoice' => $invoice], TRUE);

		$this->email->message($message);

		if (!$this->email->send()) {
			log_message('error', $this->email->print_debugger());
			return false;
		}

		return true;
	}
	// Generate Invoice Otomatis //
	private function generateInvoice()
	{
		return 'INV-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));
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
}
