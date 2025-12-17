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
                     <h4>Services</h4>
                     <p style="color: #777777;">Layanan eksklusif The Royal Hotel yang menghadirkan keanggunan, kenyamanan, dan perhatian <br> pada setiap detail untuk pengalaman menginap sempurna.
                     <p>
                     <ul>
                         <li><a href="#">Home</a>
                         </li>
                         <li><a href="#">Hotel Services</a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
         <!--TOP SECTION-->
         <div class="inn-body-section pad-bot-50">
             <div class="container">
                 <div class="row inn-page-com">
                     <div class="page-head">
                         <h2>Hotel Services</h2>
                         <div class="head-title">
                             <div class="hl-1"></div>
                             <div class="hl-2"></div>
                             <div class="hl-3"></div>
                         </div>
                         <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                     </div>
                     <!--SERVICES SECTION-->
                     <div class="col-md-12">
                         <?php foreach ($services as $service): ?>
                             <div class="row inn-services in-blog mb-4">

                                 <div class="col-md-4">
                                     <img src="<?= base_url('assets/images/ami/' . $service->image); ?>"
                                         alt="<?= $service->service_name; ?>"
                                         class="img-responsive">
                                 </div>

                                 <div class="col-md-8">
                                     <h3><?= $service->service_name; ?></h3>

                                     <span class="blog-date">
                                         Date: <?= date('F d, Y', strtotime($service->created_at)); ?>
                                     </span>

                                     <span class="blog-author">
                                         <i class="<?= $service->icon; ?>"></i>
                                     </span>

                                     <p><?= $service->short_description; ?></p>

                                     <p><?= word_limiter($service->description, 35); ?></p>

                                     <a href="<?= base_url('services_detail/' . $service->slug); ?>"
                                         class="waves-effect waves-light inn-re-mo-btn">
                                         Read More
                                     </a>
                                 </div>

                             </div>
                         <?php endforeach; ?>
                     </div>
                     <!--END SERVICES SECTION-->
                 </div>
             </div>
         </div>
         <!--TOP SECTION-->