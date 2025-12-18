<style>
    /* Container Utama */
    .hotel-meta-bar {
        display: flex;
        align-items: center;
        padding: 5px 0;
        border-top: 0px solid #ececec;
        border-bottom: 0px solid #ececec;
        margin-bottom: 0px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Item Meta (Ikon + Teks) */
    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        /* Jarak antara ikon dan teks */
    }

    /* Warna Ikon Layanan (Merah) */
    .icon-service {
        color: #dc3545;
        font-size: 13px;
    }

    /* Warna Ikon Kalender (Biru) */
    .icon-calendar {
        color: #007bff;
        font-size: 12px;
    }

    /* Styling Teks Label */
    .label-text {
        font-size: 14px;
        font-weight: 600;
        color: #333333;
    }

    /* Styling Teks Tanggal */
    .date-text {
        font-size: 14px;
        color: #777777;
        font-weight: 400;
    }

    /* Garis Pemisah Vertikal */
    .meta-divider {
        width: 2px;
        height: 18px;
        background-color: #dddddd;
        margin: 0 10px;
        /* Jarak kiri-kanan garis pemisah */
    }

    /* Responsif untuk layar kecil (Mobile) */
    @media (max-width: 480px) {
        .hotel-meta-bar {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .meta-divider {
            display: none;
            /* Hilangkan garis pemisah di mobile */
        }
    }
</style>
<section>
    <div class="menu-section">
        <div class="container">
            <div class="row">
                <div class="top-bar">
                    <ul>
                        <li class="<?= ($this->uri->segment(1) == 'our_hotel') ? 'active' : '' ?>">
                            <a href="<?= base_url('our_hotel') ?>">Our Hotels</a>
                        <li class="<?= ($this->uri->segment(1) == 'about') ? 'active' : '' ?>">
                            <a href="<?= base_url('about') ?>">About Us</a>
                        <li class="<?= ($this->uri->segment(1) == 'contact') ? 'active' : '' ?>">
                            <a href="<?= base_url('contact') ?>">Contact Us</a>
                        <li><a class='dropdown-button' href='#' data-activates='dropdown2'>Language <i class="fa fa-angle-down"></i></a>
                        </li>
                        <li><a href="#">Toll Free No: 1800 102 7275</a>
                        </li>
                    </ul>
                </div>
                <div class="all-drop-down">
                    <!-- Dropdown Structure -->
                    <ul id='dropdown2' class='dropdown-content drop-con-man'>
                        <li><a href="#!">English</a>
                        </li>
                        <li><a href="#!">Spanish</a>
                        </li>
                        <li><a href="#!">Hindi</a>
                        </li>
                        <li><a href="#!">Russian</a>
                        </li>
                        <li><a href="#!">Portuguese</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="logo">
                    <a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo">
                    </a>
                </div>
                <div class="menu-bar">
                    <ul>
                        <li class="<?= ($this->uri->segment(1) == '') ? 'active' : '' ?>">
                            <a href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="<?= ($this->uri->segment(1) == 'room') ? 'active' : '' ?>">
                            <a href="<?= base_url('room') ?>">Room</a>
                        </li>
                        <li class="<?= ($this->uri->segment(1) == 'services_detail') ? 'active' : '' ?>">
                            <a href="<?= base_url('services') ?>">Service</a>
                        </li>
                        <li class="<?= ($this->uri->segment(1) == 'menu') ? 'active' : '' ?>">
                            <a href="<?= base_url('menu') ?>">Menu</a>
                        </li>
                        <li class="<?= ($this->uri->segment(1) == 'event') ? 'active' : '' ?>">
                            <a href="<?= base_url('event') ?>">Event</a>
                        </li>
                        <li class="<?= ($this->uri->segment(1) == 'amenities') ? 'active' : '' ?>">
                            <a href="<?= base_url('amenities') ?>">Amenities</a>
                        </li>
                        <li><a href="#" class='dropdown-button' data-activates='drop-page'>Pages <i class="fa fa-angle-down"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="inn-banner">
        <div class="container">
            <div class="row">
                <h4>Services</h4>
                <p>Curabitur auctor, massa sed interdum ornare, nulla sem vestibulum purus, eu maximus magna urna eu nunc.</p>
                <p> </p>
                <ul>
                    <li><a href="<?= base_url() ?>">Home</a>
                    </li>
                    <li><a href="<?= base_url('services') ?>">Services</a>
                    </li>
                    <li><a href="#"><?= $title ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="inn-body-section pad-bot-50 py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="inn-services in-blog shadow-sm p-4 p-md-5 bg-white rounded-4">

                        <div class="image-container mb-4 overflow-hidden rounded-4 shadow-sm">
                            <?php if (!empty($service->image)): ?>
                                <img src="<?= base_url('assets/images/ami/' . $service->image); ?>"
                                    alt="<?= $service->service_name; ?>"
                                    class="img-fluid"
                                    style="width: 100%; height: 450px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 350px;">
                                    <p class="text-muted"><i class="fa fa-image fa-3x"></i><br>Gambar tidak tersedia</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <h2 class="fw-bold mb-3 mt-2" style="color: #2c3e50; margin-bottom:1px;"><?= $service->service_name; ?></h2>

                        <div class="hotel-meta-bar" style="border: 0;border-top: 2px solid #eee; margin-top: 10px; ">
                            <div class="meta-item">
                                <i class="<?= $service->icon; ?> icon-service"></i>
                                <span class="label-text">Layanan Hotel</span>
                            </div>

                            <div class="meta-divider"></div>

                            <div class="meta-item">
                                <i class="fa fa-calendar-alt icon-calendar"></i>
                                <span class="date-text"><?= date('F d, Y', strtotime($service->created_at)); ?></span>
                            </div>
                        </div>
                        <div class="service-description" style="border: 0;border-top: 2px solid #eee;">
                            <h4 style="margin-top: 15px; margin-bottom:10px;"><?= $service->short_description ?></h4>
                        </div>

                        <div class="service-description text-secondary" style="line-height: 1.8; text-align: justify; font-size: 12px;">
                            <?= nl2br($service->description); ?>
                        </div>
                        <hr>
                        <div class="service-description text-secondary" style="line-height: 1.8; text-align: justify; font-size:12px;">
                            <?= nl2br($service->cta); ?>
                        </div>

                        <div class="mt-5" style="margin-top: 10px;">
                            <a href="<?= base_url('contact'); ?>" class="btn btn-danger rounded-pill px-4 shadow-sm">
                                Tanya Lebih Lanjut
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="bot-gal h-gal">
                        <h4>Gallery Restaurant</h4>
                        <ul>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/8.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/9.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/10.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/11.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/1.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/2.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/3.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/4.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/5.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/6.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/7.jpg') ?>" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="<?= base_url('assets/images/ami/8.jpg') ?>" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="p-4 bg-white rounded-4 shadow-sm">
                        <h5 class="fw-bold border-bottom pb-3 mb-3">Layanan Kami Lainnya</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="bg-light p-2 rounded me-3"><i class="fa fa-utensils text-danger"></i></div>
                                    <span>Restaurant Service</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="bg-light p-2 rounded me-3"><i class="fa fa-swimming-pool text-primary"></i></div>
                                    <span>Swimming Pool</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>