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
                        <li class="<?= ($this->uri->segment(1) == 'services') ? 'active' : '' ?>">
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
                <h4>About Us</h4>
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

                        <h1 class="fw-bold mb-3 mt-2" style="color: #2c3e50;"><?= $service->service_name; ?></h1>

                        <div class="d-flex align-items-center mb-4 py-2 border-top border-bottom text-muted">
                            <div class="me-4">
                                <i class="<?= $service->icon; ?> text-danger me-2"></i>
                                <span class="fw-medium">Layanan Hotel</span>
                            </div>
                            <div>
                                <i class="fa fa-calendar-alt text-primary me-2"></i>
                                <span><?= date('F d, Y', strtotime($service->created_at)); ?></span>
                            </div>
                        </div>

                        <div class="service-description text-secondary" style="line-height: 1.8; text-align: justify;">
                            <?= nl2br($service->description); ?>
                        </div>

                        <div class="mt-5">
                            <a href="javascript:history.back()" class="btn btn-outline-secondary rounded-pill px-4 me-2">
                                <i class="fa fa-arrow-left me-2"></i>Kembali
                            </a>
                            <a href="<?= base_url('contact'); ?>" class="btn btn-danger rounded-pill px-4 shadow-sm">
                                Tanya Lebih Lanjut
                            </a>
                        </div>
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