<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Best Luxurious Hotel Booking Template.">
    <meta name="keywords"
        content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
    <title>Luxurious - Restaurant Menu</title>

    <link rel="icon" href="<?= base_url('assets/img/favicons/favicon.png') ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url('assets/css/vendor/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendor/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendor/aos.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendor/remixicon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendor/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendor/swiper-bundle.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendor/semantic.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendor/slick.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

</head>

<body>
    <!-- loading -->
    <div class="overlay"></div>
    <div class="lh-loader">
        <span class="loader"></span>
    </div>
    <!-- header -->
    <?php include 'header.php'; ?>

    <section class="section-restaurant padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="1000">
                <h2>Restaurant <span>Menu</span></h2>
            </div>
            <nav class="p-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="nav nav-tabs lh-menu-restaurant" id="nav-tab" role="tablist">

                    <?php
                    // TABS JUDUL MENU
                    // Mengambil semua kategori unik (kunci dari array $menus)
                    $categories = array_keys($menus);

                    foreach ($categories as $index => $category) :
                        // Membersihkan kategori untuk digunakan sebagai ID tab (hapus spasi, ubah ke lowercase)
                        $slug = strtolower(str_replace(' ', '-', $category));
                        $active_class = ($index === 0) ? 'active' : '';
                    ?>
                        <button class="nav-link <?= $active_class ?> lh-menu-buttons" id="nav-<?= $slug ?>-tab"
                            data-bs-toggle="tab" data-bs-target="#nav-<?= $slug ?>" type="button"
                            role="tab" aria-controls="nav-<?= $slug ?>" aria-selected="<?= ($index === 0) ? 'true' : 'false' ?>">
                            <?= htmlspecialchars($category) ?>
                        </button>
                    <?php endforeach; ?>

                </div>
            </nav>
            <div class="tab-content ld-menu-contact border-none" id="nav-tabContent">

                <?php
                // KONTEN PER TAB (ISI MENU)
                // KONTEN PER TAB (ISI MENU)
                foreach ($categories as $index => $category) :
                    $slug = strtolower(str_replace(' ', '-', $category));
                    $active_class = ($index === 0) ? 'active show' : '';
                ?>
                    <div class="tab-pane fade <?= $active_class ?>" id="nav-<?= $slug ?>" role="tabpanel" aria-labelledby="nav-<?= $slug ?>-tab">

                        <?php
                        $menu_items = $menus[$category];
                        $total_items = count($menu_items);
                        $aos_duration = 1500;

                        // Iterasi melalui item dan kelompokkan 2 item per baris
                        for ($i = 0; $i < $total_items; $i += 2):
                        ?>
                            <div class="row p-0 lh-Breakfast-rs">

                                <?php
                                // ITEM PERTAMA (Kiri)
                                $menu_item_1 = $menu_items[$i];
                                ?>
                                <div class="col-lg-6">
                                    <div class="ld-restaurant-menu" data-aos="fade-up" data-aos-duration="<?= $aos_duration ?>">
                                        <div class="ld-restaurant-menu-image">
                                            <img src="<?= base_url('assets/img/restaurant/' . htmlspecialchars($menu_item_1['image'])) ?>" alt="<?= htmlspecialchars($menu_item_1['name']) ?>">
                                        </div>
                                        <div class="ld-restaurant-menu-contain">
                                            <h4><?= htmlspecialchars($menu_item_1['name']) ?> <span>$<?= number_format($menu_item_1['price'], 2) ?></span></h4>
                                            <p><?= htmlspecialchars($menu_item_1['description']) ?></p>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                // ITEM KEDUA (Kanan) - Pastikan ada item kedua
                                if ($i + 1 < $total_items):
                                    $menu_item_2 = $menu_items[$i + 1];
                                    $aos_duration += 300; // Tingkatkan durasi AOS untuk item di sampingnya
                                ?>
                                    <div class="col-lg-6">
                                        <div class="ld-restaurant-menu" data-aos="fade-up" data-aos-duration="<?= $aos_duration ?>">
                                            <div class="ld-restaurant-menu-image">
                                                <img src="<?= base_url('assets/img/restaurant/' . htmlspecialchars($menu_item_2['image'])) ?>" alt="<?= htmlspecialchars($menu_item_2['name']) ?>">
                                            </div>
                                            <div class="ld-restaurant-menu-contain">
                                                <h4><?= htmlspecialchars($menu_item_2['name']) ?> <span>$<?= number_format($menu_item_2['price'], 2) ?></span></h4>
                                                <p><?= htmlspecialchars($menu_item_2['description']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;
                                $aos_duration += 300; // Tingkatkan durasi AOS untuk item di baris berikutnya
                                ?>
                            </div>
                        <?php endfor; ?>

                        <?php if ($total_items === 0): ?>
                            <p class="text-center mt-5">Menu <?= htmlspecialchars($category) ?> sedang diperbarui. Silakan cek kembali nanti!</p>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Testimoni Section -->
    <section class="section-testimonials bg-gray padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="swiper lh-testimonials-swiper">
                        <div class="swiper-wrapper">

                            <?php foreach ($testimonials as $testimonial) : ?>
                                <div class="swiper-slide">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-10 p-0">
                                                <div class="lh-testimonials">
                                                    <div class="lh-testimonials-contain">
                                                        <div class="d-flex align-items-center">
                                                            <div class="lh-testimonials-inner">
                                                                <img src="<?= base_url('assets/img/businessman/businessman-placeholder.jpg') ?>" alt="businessman" class="businessman">
                                                                <div class="lh-testimonials-name-detalis">
                                                                    <h5><?= htmlspecialchars($testimonial['customer_name']) ?></h5>
                                                                    <span><?= htmlspecialchars($testimonial['location']) ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="lh-testimonials-star ms-auto">
                                                                <?php for ($i = 0; $i < 5; $i++): ?>
                                                                    <?php if ($i < $testimonial['rating']): ?>
                                                                        <i class="ri-star-fill"></i>
                                                                    <?php else: ?>
                                                                        <i class="ri-star-line"></i>
                                                                    <?php endif; ?>
                                                                <?php endfor; ?>
                                                            </div>
                                                        </div>
                                                        <p><?= nl2br(htmlspecialchars($testimonial['feedback'])) ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Book Table Section -->
    <section class="section-book-table padding-tb-100">
        <div id="particles-js" class="lh-particles-bg">
            <div class="container lh-book-table-content">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="banner text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2>Booking hotelmu<span> Sekarang! </span></h2>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>

                <form action="<?= site_url('home/restaurant') ?>" method="post" class="lh-book-table" data-aos="fade-up" data-aos-duration="1500">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="lh-book-tale-box">
                                <label>Name*</label>
                                <input type="text" name="customer_name" placeholder="Name" required value="<?= set_value('customer_name') ?>" class="lh-book-form-control">
                                <i class="ri-user-line"></i>
                                <small class="text-danger"><?= form_error('customer_name') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="lh-book-tale-box">
                                <label>Phone No*</label>
                                <input type="text" name="phone_number" placeholder="Phone Number" required value="<?= set_value('phone_number') ?>" class="lh-book-form-control">
                                <i class="ri-phone-line"></i>
                                <small class="text-danger"><?= form_error('phone_number') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="lh-book-tale-box">
                                <label>No. Of Gust*</label>
                                <input type="number" name="num_of_guests" placeholder="No. Of Guest" required min="1" value="<?= set_value('num_of_guests') ?>" class="lh-book-form-control">
                                <i class="ri-team-line"></i>
                                <small class="text-danger"><?= form_error('num_of_guests') ?></small>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="lh-book-tale-box">
                                <label>Date & Time*</label>
                                <div class="calendar">
                                    <input type="datetime-local" name="booking_time" placeholder="Date & Time" required value="<?= set_value('booking_time') ?>" class="lh-book-form-control">
                                    <!-- <i class="ri-calendar-line"></i> -->
                                    <small class="text-danger"><?= form_error('booking_time') ?></small>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="lh-book-tale-contain mt-3">
                                <h6>No refunds will be given once you booked</h6>
                            </div>
                            <div class="lh-book-tale-buttons">
                                <button type="submit" name="book_table" value="1" class="lh-buttons">Book Table</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </section>

    <script>
    </script>