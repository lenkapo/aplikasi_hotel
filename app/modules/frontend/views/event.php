    <section>
        <!--TOP SECTION-->
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
        <!--TOP SECTION-->
        <!--TOP BANNER-->
        <div class="inn-banner">
            <div class="container">
                <div class="row">
                    <h4>Hotel Events</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.
                    <p>
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Events</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->
        <div class="inn-body-section pad-bot-50">
            <div class="container">
                <div class="row">
                    <div class="page-head">
                        <h2>All Hotel Events</h2>
                        <div class="head-title">
                            <div class="hl-1"></div>
                            <div class="hl-2"></div>
                            <div class="hl-3"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                    <!--TYPOGRAPHY SECTION-->
                    <div class="col-md-12">
                        <div class="head-typo typo-com">
                            <h2>Events: <?= date('F Y') ?></h2>

                            <p>
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                            </p>

                            <!-- EVENT LOOP -->
                            <?php foreach ($events as $event): ?>
                                <div class="row events" style="margin-bottom:15px">

                                    <!-- IMAGE -->
                                    <div class="col-md-2">
                                        <img
                                            src="<?= base_url('assets/images/event/' . ($event->image ?? 'default.jpg')) ?>"
                                            alt="<?= $event->title ?>"
                                            class="img-responsive">
                                    </div>

                                    <!-- CONTENT -->
                                    <div class="col-md-8">
                                        <h3><?= html_escape($event->title) ?></h3>

                                        <span>
                                            Date:
                                            <?= date('F d, Y', strtotime($event->event_date)) ?>
                                            <?php if ($event->end_date): ?>
                                                - <?= date('F d, Y', strtotime($event->end_date)) ?>
                                            <?php endif; ?>
                                        </span>

                                        <p><?= word_limiter(strip_tags($event->description), 15) ?></p>
                                    </div>

                                    <!-- BUTTON -->
                                    <div class="col-md-2">
                                        <a href="<?= site_url('event_detail/' . $event->slug) ?>"
                                            class="waves-effect waves-light event-regi">
                                            Register
                                        </a>
                                    </div>

                                </div>
                                <!-- END EVENT -->
                            <?php endforeach; ?>

                            <?php if (empty($events)): ?>
                                <p><em>Tidak ada event tersedia.</em></p>
                            <?php endif; ?>

                        </div>
                    </div>

                    <!--END TYPOGRAPHY SECTION-->
                </div>
            </div>
        </div>
    </section>