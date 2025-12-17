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
                     <a href="<?= base_url(); ?>" title="Beranda">
                         <img
                             src="<?= base_url('assets/images/logo.png'); ?>"
                             alt="Logo Hotel"
                             class="img-fluid">
                     </a>
                 </div>
                 <!-- Navbar -->
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
                 <h4>Our Hotels</h4>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.
                 <p>
                 <ul>
                     <li><a href="<?= base_url() ?>">Home</a>
                     </li>
                     <li><a href="#">Our Hotels</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <!--TOP SECTION-->
     <div class="inn-body-section pad-bot-60">
         <div class="container">
             <div class="row inn-page-com">

                 <div class="page-head">
                     <h2>Our Hotels</h2>
                     <div class="head-title">
                         <div class="hl-1"></div>
                         <div class="hl-2"></div>
                         <div class="hl-3"></div>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                 </div>

                 <!-- FEATURED HOTEL -->
                 <?php if ($featured): ?>
                     <div class="col-md-6">
                         <a href="<?= base_url('hotels/detail/' . $featured->id) ?>">
                             <div class="all-hotel-like-com">
                                 <div class="all-hotel-lc-img">
                                     <img src="<?= base_url('assets/images/hotel/' . $featured->image) ?>" alt="">
                                 </div>
                                 <div class="all-hotel-lc-con">
                                     <h5><?= $featured->country ?></h5>
                                     <p>Address: <?= $featured->address ?></p>
                                 </div>
                             </div>
                         </a>
                     </div>
                 <?php endif; ?>

                 <!-- HOTEL LAINNYA -->
                 <?php foreach ($hotels as $hotel): ?>
                     <div class="col-md-3">
                         <a href="<?= base_url('hotels/detail/' . $hotel->id) ?>">
                             <div class="all-hotel-like-com">
                                 <div class="all-hotel-lc-img">
                                     <img src="<?= base_url('assets/images/hotel/' . $hotel->image) ?>" alt="">
                                 </div>
                                 <div class="all-hotel-lc-con all-hotel-lc-con2">
                                     <h5><?= $hotel->country ?></h5>
                                     <p><?= $hotel->address ?></p>
                                 </div>
                             </div>
                         </a>
                     </div>
                 <?php endforeach; ?>

             </div>
         </div>
     </div>
     <!--TOP SECTION-->

     <!--TOP SECTION-->
     <div class="hom-footer-section">
         <div class="container">
             <div class="row">
                 <div class="foot-com foot-1">
                     <ul>
                         <li><a href="<?= base_url('https://www.facebook.com/?locale=id_ID') ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                         </li>
                         <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                         </li>
                         <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                         </li>
                     </ul>
                 </div>
                 <div class="foot-com foot-2">
                     <h5>Phone: (+404) 142 21 23 78</h5>
                 </div>
                 <div class="foot-com foot-3">
                     <!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a class="waves-effect waves-light" href="booking.html">room reservation</a>
                 </div>
                 <div class="foot-com foot-4">
                     <a href="#"><img src="images/card.png" alt="">
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!--END HEADER SECTION-->