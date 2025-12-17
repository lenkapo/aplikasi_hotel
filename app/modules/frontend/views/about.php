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
        <!--TOP SECTION-->
        <div class="inn-banner">
            <div class="container">
                <div class="row">
                    <h4>About Us</h4>
                    <p>Curabitur auctor, massa sed interdum ornare, nulla sem vestibulum purus, eu maximus magna urna eu nunc.</p>
                    <p> </p>
                    <ul>
                        <li><a href="<?= base_url() ?>">Home</a>
                        </li>
                        <li><a href="#">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="inn-body-section">
            <div class="container">
                <div class="row">
                    <div class="page-head">
                        <h2>About Us</h2>
                        <div class="head-title">
                            <div class="hl-1"></div>
                            <div class="hl-2"></div>
                            <div class="hl-3"></div>
                        </div>
                        <p>Quisque at volutpat nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-left">
                            <h2>Welcome to <span>My Hotel</span></h2>
                            <h4>Cras eu nisl quis est mattis placerat. Etiam ut ante et lacus imperdiet sagittis a finibus mauris.</h4>
                            <p>Proin nisl mi, eleifend in faucibus et, venenatis eu turpis. Ut hendrerit eleifend odio. Nullam ullamcorper viverra ex quis tempus. In hac habitasse platea dictumst. Vestibulum sed tempor metus. </p>
                            <p>Duis sollicitudin augue nec bibendum mollis. Proin luctus diam vel hendrerit dictum. Nunc tincidunt nibh in sem blandit venenatis. Suspendisse rutrum ultricies porttitor. Quisque at volutpat nibh.Aliquam dapibus turpis mollis felis fermentum bibendum. In finibus a nulla vitae dapibus. Nam non suscipit urna. Vestibulum et lacinia justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="waves-effect waves-light">Call to us: (+404) 142 21 23 78</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-right"> <img src="<?= base_url('assets/images/slider/5.jpg') ?>" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>