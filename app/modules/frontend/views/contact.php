 <!--HEADER SECTION-->
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
     <div class="inn-banner">
         <div class="container">
             <div class="row">
                 <h4>Contact Us</h4>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus accusantium excepturi a dicta corrupti ad aliquid consequuntur corporis, minus voluptate fugiat est eius alias. Voluptatum id fugit necessitatibus assumenda sit.</p>
                 <p> </p>
                 <ul>
                     <li><a href="<?= base_url() ?>">Home</a>
                     </li>
                     <li><a href="#">Contact Us</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="inn-body-section">
         <div class="container">
             <div class="row">
                 <div class="page-head">
                     <h2>Contact Us</h2>
                     <div class="head-title">
                         <div class="hl-1"></div>
                         <div class="hl-2"></div>
                         <div class="hl-3"></div>
                     </div>
                     <p>Quisque at volutpat nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-3 col-sm-6 col-xs-12 new-con">
                     <h2>My-Hotel <span>Booking</span></h2>
                     <p>Hotels worldwide incl. Infos, Ratings and Photos. Make your Hotel Reservation cheap.</p>
                     <p>The top-rated hotel booking services.</p>
                 </div>
                 <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="<?= base_url('assets/images/icon/20.png') ?>" alt="">
                     <h4>Address</h4>
                     <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.
                         <br>Landmark : Next To Airport
                     </p>
                 </div>
                 <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="<?= base_url('assets/images/icon/22.png') ?>" alt="">
                     <h4>CONTACT INFO:</h4>
                     <p> <a href="tel://0099999999" class="contact-icon">Phone: 01 234874 965478</a>
                         <br> <a href="tel://0099999999" class="contact-icon">Mobile: 01 654874 965478</a>
                         <br> <a href="mailto:mytestmail@gmail.com" class="contact-icon">Email: info@company.com</a>
                     </p>
                 </div>
                 <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="<?= base_url('assets/images/icon/21.png') ?>" alt="">
                     <h4>Website</h4>
                     <p> <a href="#">Website: www.mycompany.com</a>
                         <br> <a href="#">Facebook: www.facebook/my</a>
                         <br> <a href="#">Blog: www.blog.mycompany.com</a>
                     </p>
                 </div>
             </div>
         </div>
     </div>
     <section class="contact-section">
         <div class="contact-row">
             <div class="contact-map">
                 <iframe src="https://www.google.com/maps/embed?..." allowfullscreen="" loading="lazy"></iframe>
             </div>
         </div>
     </section>