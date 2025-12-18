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
                        <li class="<?= ($this->uri->segment(1) == 'event_detail') ? 'active' : '' ?>">
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
                    <li><a href="#"><?= $title ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="inn-body-section pad-bot-50">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>Hotel Events</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                </div>
                <div class="col-md-8">
                    <div class="head-typo typo-com">

                        <h2><?= html_escape($event->title) ?></h2>

                        <span class="label label-info">
                            <?= date('F d, Y', strtotime($event->event_date)) ?>
                            <?php if ($event->end_date): ?>
                                - <?= date('F d, Y', strtotime($event->end_date)) ?>
                            <?php endif; ?>
                        </span>

                        <hr>

                        <img
                            src="<?= base_url('assets/images/event/' . ($event->image ?? 'default.jpg')) ?>"
                            alt="<?= html_escape($event->title) ?>"
                            class="img-responsive"
                            style="margin-bottom:15px">

                        <p>
                            <?= nl2br(html_escape($event->description)) ?>
                        </p>

                    </div>
                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="col-md-4">
                    <div class="head-typo typo-com">

                        <h4>Event Information</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Location:</strong><br>
                                <?= html_escape($event->location ?? '-') ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Quota:</strong><br>
                                <?= $event->quota ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Sisa Kuota:</strong><br>
                                <?= $sisa_quota ?>
                            </li>
                        </ul>

                        <?php if ($sisa_quota > 0): ?>
                            <button class="waves-effect waves-light event-regi"
                                data-toggle="modal"
                                data-target="#registerModal">
                                Register Now
                            </button>
                        <?php else: ?>
                            <button class="btn btn-danger btn-block" disabled>
                                Kuota Habis
                            </button>
                        <?php endif; ?>

                    </div>
                </div>

                <div id="registerModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <form method="post" action="<?= site_url('register_event/' . $event->id) ?>">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Register Event</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>