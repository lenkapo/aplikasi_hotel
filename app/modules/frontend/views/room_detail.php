<link rel="stylesheet" href="<?= base_url('assets/css/demo2.css?v=' . time()) ?>">
<!-- banner section -->
<section class="section-banner" style="background-image: url('<?= base_url('assets/img/room/' . (!empty($room->main_image) ? $room->main_image : 'default-banner.jpg')) ?>'); background-position: center;
	background-size: cover;">
    <div class="row banner-image">
        <div class="banner-overlay"></div>
        <div class="banner-section">
            <div class="lh-banner-contain">
                <h2><?= $room->name ?></h2>
                <div class="lh-breadcrumb">
                    <h5>
                        <span class="lh-inner-breadcrumb">
                            <a href="<?= site_url() ?>">Home</a>
                        </span>
                        <span> / </span>
                        <span>
                            <a href="javascript:void(0)"><?= $room->name ?></a>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Room Details -->
<section class="section-room-detsils padding-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up" data-aos-duration="2000">
                <div class="lh-room-details">
                    <div class="lh-main-room">
                        <?php if (!empty($room)): ?>
                            <div class="slider slider-for mb-3">
                                <?php foreach ($room->gallery as $img): ?>
                                    <div class="lh-room-details-image">
                                        <img src="<?= base_url('assets/img/room/' . $img->image_path) ?>"
                                            alt="<?= htmlspecialchars($img->caption) ?>"
                                            class="img-fluid rounded-3 shadow-sm">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="slider slider-nav">
                                <?php foreach ($room->gallery as $img): ?>
                                    <div class="lh-room-details-inner">
                                        <img src="<?= base_url('assets/img/room/' . $img->image_path) ?>"
                                            alt="<?= htmlspecialchars($img->caption) ?>"
                                            class="img-thumbnail rounded-3">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p>Tidak ada foto tersedia untuk kamar ini.</p>
                        <?php endif; ?>
                    </div>

                    <div class="lh-room-details-contain">
                        <h4 class="lh-room-details-contain-heading"><?= $room->name ?></h4>
                        <p class="mb-4"><?= !empty($room->deskripsi)
                                            ? nl2br(htmlspecialchars($room->deskripsi))
                                            : 'Deskripsi kamar belum tersedia.' ?></p>

                        <div class="lh-room-details-amenities">
                            <div class="row">
                                <h4 class="lh-room-inner-heading">Fasilitas</h4>
                                <?php
                                // 1. Ambil data dari database
                                $amenities_raw = isset($room->amenities) ? ($room->amenities) : null;

                                // Daftar default jika database kosong
                                $default_amenities = [
                                    'TV Layar Datar',
                                    'Brankas Dalam Kamar',
                                    'Mini Kulkas',
                                    'Air Minum Gratis',
                                    'Wi-Fi Kecepatan Tinggi'
                                ];

                                // 2. Cek dan ubah string dari database menjadi array
                                if (!empty($amenities_raw) && is_string($amenities_raw)) {
                                    // Memecah string berdasarkan koma (',') dan membersihkan spasi
                                    $amenities = array_map('trim', explode(',', $amenities_raw));
                                } else {
                                    // Jika kosong/null, gunakan default
                                    $amenities = $default_amenities;
                                }

                                // 3. Proses array untuk tampilan
                                if (is_array($amenities) && count($amenities) > 0) {
                                    // Logika membagi item menjadi 3 kolom
                                    $chunked_amenities = array_chunk($amenities, ceil(count($amenities) / 3));
                                    foreach ($chunked_amenities as $list): ?>
                                        <div class="col-lg-4 lh-cols-room">
                                            <ul>
                                                <?php foreach ($list as $amenity): ?>
                                                    <li><code>*</code><?= htmlspecialchars($amenity) ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                <?php endforeach;
                                } else {
                                    // Ini hanya muncul jika array $amenities benar-benar kosong (dan default juga kosong)
                                    echo '<div class="col-12"><p>Informasi fasilitas kamar tidak tersedia.</p></div>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="lh-room-details-rules">
                            <div class="lh-room-rules">
                                <h4 class="lh-room-inner-heading">Rules &amp; Regulation</h4>
                                <div class="lh-cols-room">
                                    <ul>
                                        <li><code>*</code>No smoking inside the room</li>
                                        <li><code>*</code>Check-in: After 02:00pm</li>
                                        <li><code>*</code>Late checkout: Additional charge 50% of the room rate</li>
                                        <li><code>*</code>Checkout: Before 11:00am</li>
                                        <li><code>*</code>No Pets</li>
                                        <li><code>*</code>Identification document is required for registration</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="lh-room-details-review">
                            <div class="lh-room-review">
                                <h4 class="lh-room-inner-heading">Add A Review</h4>
                                <p>Berikan ulasan Anda mengenai pengalaman menginap di sini.</p>
                            </div>
                            <form action="#" method="post">
                                <div class="lh-room-review-buttons">
                                    <button class="lh-buttons result-placeholder" type="submit">Submit Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="lh-side-room">
                    <h4 class="lh-room-inner-heading">Reservation</h4>
                    <div class="lh-side-reservation">
                        <?php if ($this->session->flashdata('success_booking')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success_booking') ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('error_booking')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error_booking') ?></div>
                        <?php endif; ?>

                        <form action="<?= site_url('beranda/process_room_booking') ?>" method="post">
                            <input type="hidden" name="room_id" value="<?= $room->id ?>">
                            <input type="hidden" name="room_name" value="<?= $room->name ?>">

                            <div class="lh-side-reservation-from">
                                <label>Check In*</label>
                                <div class="calendar" id="date_1">
                                    <input type="text" name="check_in_date" class="reservation-form-control" required value="<?= set_value('check_in_date') ?>">
                                    <i class="ri-calendar-line"></i>
                                </div>
                                <small class="text-danger"><?= form_error('check_in_date') ?></small>
                            </div>

                            <div class="lh-side-reservation-from">
                                <label>Check Out*</label>
                                <div class="calendar" id="date_2">
                                    <input type="text" name="check_out_date" class="reservation-form-control" required value="<?= set_value('check_out_date') ?>">
                                    <i class="ri-calendar-line"></i>
                                </div>
                                <small class="text-danger"><?= form_error('check_out_date') ?></small>
                            </div>

                            <div class="lh-side-reservation-from">
                                <label>Your Email*</label>
                                <input type="email" name="customer_email" class="reservation-form-control" required value="<?= set_value('customer_email') ?>">
                                <small class="text-danger"><?= form_error('customer_email') ?></small>
                            </div>

                            <div class="lh-side-reservation-from">
                                <label>Total Guests*</label>
                                <input type="number" name="guest_count" class="reservation-form-control" min="1" required value="<?= set_value('guest_count') ?>">
                                <small class="text-danger"><?= form_error('guest_count') ?></small>
                            </div>

                            <div class="lh-side-reservation-from">
                                <h4>Your Price</h4>
                                <span><strong>$<?= $room->price ?></strong> / per room per night</span>
                            </div>

                            <div class="lh-side-reservation-from">
                                <div class="lh-side-reservation-from-buttons d-flex">
                                    <button type="submit" name="book_room" value="1" class="lh-buttons result-placeholder">
                                        Book This Room
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>