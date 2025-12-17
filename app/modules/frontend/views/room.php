<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section>
    <!--TOP SECTION-->
    <div class="menu-section">
        <div class="container">
            <div class="row">
                <div class="top-bar">
                    <ul>
                        <li><a href="<?= base_url('our_hotel') ?>">Our Hotels</a>
                        </li>
                        <li><a href="<?= base_url('about') ?>">About Us</a>
                        </li>
                        <li><a href="<?= base_url('contact') ?>">Contact Us</a>
                        </li>
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
    <!-- Navbar -->
    <!--TOP BANNER-->
    <div class="inn-banner">
        <div class="container">
            <div class="row">
                <h4>All Room Types</h4>
                <p>Pilihan Kamar Terbaik Nikmati perpaduan sempurna antara kemewahan modern dan kenyamanan tak tertandingi. Dari suite eksekutif hingga kamar keluarga yang hangat, temukan ruang ideal untuk istirahat Anda yang berharga.
                <p>
                <ul>
                    <li><a href="<?= base_url() ?>">Home</a>
                    </li>
                    <li><a href="#">Rooms</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--Room-->
    <div class="inn-body-section pad-bot-55">
        <div class="container">
            <div class="row">
                <div class="page-head text-center">
                    <h2>Room Types</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                </div>

                <?php foreach ($rooms as $room): ?>
                    <div class="room">e
                        <!-- Ribbon Tag -->
                        <?php if (!empty($room->tag)): ?>
                            <div class="ribbon ribbon-top-left"><span><?= $room->tag ?></span></div>
                        <?php endif; ?>

                        <!-- ROOM IMAGE -->
                        <div class="r1 r-com">
                            <img src="<?= base_url('assets/images/room/' . $room->main_image) ?>" alt="<?= $room->name ?>">
                        </div>

                        <!-- ROOM RATING -->
                        <div class="r2 r-com">
                            <h4 class="room-title"><?= htmlspecialchars($room->name) ?></h4>

                            <div class="r2-ratt">
                                <?php
                                $fullStars  = floor($room->rating);
                                $halfStar   = ($room->rating - $fullStars) >= 0.5;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

                                for ($i = 0; $i < $fullStars; $i++) echo '<i class="fa fa-star text-warning"></i> ';
                                if ($halfStar) echo '<i class="fa fa-star-half-o text-warning"></i> ';
                                for ($i = 0; $i < $emptyStars; $i++) echo '<i class="fa fa-star-o text-muted"></i> ';
                                ?>

                                <img src="<?= base_url('assets/images/h-trip.png') ?>" alt="Trip Advisor Rating" class="trip-icon">
                                <span class="rating-text">Excellent <?= number_format($room->rating, 1) ?> / 5</span>
                            </div>

                            <ul class="room-capacity">
                                <li><i class="fa fa-users"></i> <?= ($room->max_adult + $room->max_child) ?> Total Capacity</li>
                                <li><i class="fa fa-user"></i> <?= $room->max_adult ?> Adults</li>
                                <li><i class="fa fa-child"></i> <?= $room->max_child ?> Children</li>
                            </ul>




                        </div>
                        <!-- ROOM AMENITIES -->
                        <div class="r3 r-com">
                            <ul class="room-amenities-icons">
                                <?php
                                // total fitur & ambil 5 dulu
                                $totalFeatures = count($room->fitur_list);
                                $showFeatures = array_slice($room->fitur_list, 0, 5);
                                ?>
                                <?php foreach ($room->fitur_list as $fitur): ?>

                                    <?php
                                    // map nama fitur ke ikon
                                    switch (trim(strtolower($fitur))) {
                                        case '':
                                            $icon = '<i class="fa fa-iron"></i>';
                                            break;
                                        case 'tea/coffee maker':
                                            $icon = '<i class="fa fa-coffee"></i>';
                                            break;
                                        case 'air conditioning':
                                            $icon = '<i class="fa fa-snowflake-o"></i>';
                                            break;
                                        case 'flat-screen tv':
                                            $icon = '<i class="fa fa-tv"></i>';
                                            break;
                                        case 'wake-up service':
                                            $icon = '<i class="fa fa-bell"></i>';
                                            break;
                                        default:
                                            $icon = '<i class="fa fa-check"></i>'; // default icon
                                    }
                                    ?>
                                    <li title="<?= htmlspecialchars($fitur) ?>">
                                        <?= $icon ?>
                                        <span class="amenity-text"><?= htmlspecialchars($fitur) ?></span>
                                    </li>
                                <?php endforeach; ?>
                                <!-- Jika ada fitur lebih dari 5 -->
                                <?php if ($totalFeatures > count($showFeatures)): ?>
                                    <li class="more-features">+<?= ($totalFeatures - count($showFeatures)) ?> more</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- ROOM PRICE -->
                        <div class="r4 r-com">
                            <!-- Discount Badge -->
                            <?php if ($room->discount_percent > 0): ?>
                                <div class="price-badge-discount blink">
                                    🔥 <?= $room->discount_percent ?>% OFF!
                                </div>
                            <?php endif; ?>
                            <!-- Daily Deal Badge -->
                            <?php if ($room->is_daily_deal): ?>
                                <div class="badge-daily-deal">
                                    <span class="countdown"
                                        data-end="<?= date('Y-m-d\TH:i:s', strtotime($room->promo_end . ' 23:59:59')) ?>">
                                    </span>
                                </div>
                            <?php endif; ?>
                            <p>
                                <span class="room-price-1">
                                    Rp <?= number_format($room->price, 0, ',', '.') ?>
                                </span>
                                <?php if (!empty($room->old_price) && $room->old_price > $room->price): ?>
                                    <span class="room-price-old">
                                        Rp <?= number_format($room->old_price, 0, ',', '.') ?>
                                    </span>
                                <?php endif; ?>
                            </p>
                            <!-- Teks hemat -->
                            <?php if ($room->discount_rp > 0): ?>
                                <p class="text-hemat">Hemat Rp <?= number_format($room->discount_rp, 0, ',', '.') ?></p>
                            <?php endif; ?>
                            <p>Non Refundable</p>
                        </div>
                        <!-- ROOM BOOKING BUTTON -->
                        <div class="r5 r-com">
                            <?php
                            // convert status angka jadi teks, class CSS, dan tooltip message
                            switch ($room->status) {
                                case 1:
                                    $status_text  = "Available";
                                    $status_class = "status-1";
                                    $tooltip_msg  = "ready untuk dipesan";
                                    break;
                                case 2:
                                    $status_text  = "Not Available";
                                    $status_class = "status-2";
                                    $tooltip_msg  = "Kamar saat ini tidak tersedia";
                                    break;
                                case 3:
                                    $status_text  = "Fully Booked";
                                    $status_class = "status-3";
                                    $tooltip_msg  = "Semua kamar sudah penuh";
                                    break;
                                case 4:
                                    $status_text  = "Maintenance";
                                    $status_class = "status-4";
                                    $tooltip_msg  = "Sedang dalam perawatan";
                                    break;
                                case 5:
                                    $status_text  = "Sold Out";
                                    $status_class = "status-5";
                                    $tooltip_msg  = "Sudah terjual habis";
                                    break;
                                case 6:
                                    $status_text  = "Promo";
                                    $status_class = "status-6";
                                    $tooltip_msg  = "Sedang ada promo menarik!";
                                    break;
                                default:
                                    $status_text  = "Unknown";
                                    $status_class = "";
                                    $tooltip_msg  = "Status tidak diketahui";
                            }
                            ?>

                            <!-- Badge status dengan tooltip -->
                            <div class="tooltip-status">
                                <div class="r2-available <?= $status_class ?>">
                                    <?= $status_text ?>
                                </div>
                            </div>




                            <p>Price for 1 night</p>


                            <!-- Tombol Book -->
                            <?php if ($room->status == 1): ?>
                                <a href="<?= base_url('booking/add/' . $room->id) ?>" class="inn-room-book">Book</a>
                            <?php elseif ($room->status == 6): ?>
                                <!-- Promo tetap bisa booking -->
                                <a href="<?= base_url('booking/add/' . $room->id) ?>" class="inn-room-book">Book (Promo)</a>
                            <?php else: ?>
                                <a class="inn-room-book disabled"
                                    style="opacity: 0.6; pointer-events: none; background: #ccc; border-color: #ccc;">
                                    Unavailable
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- Custom JS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const countdownElems = document.querySelectorAll('.badge-daily-deal .countdown');

        countdownElems.forEach(elem => {
            const endTime = new Date(elem.dataset.end).getTime();
            let popupShown = false;

            function updateTimer() {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance <= 0) {
                    elem.innerHTML = "Expired";
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const secs = Math.floor((distance % (1000 * 60)) / 1000);

                elem.innerHTML = `${days}d ${hours}h ${mins}m ${secs}s`;

                // jika sisa waktu <= 15 menit (900.000 ms)
                if (!popupShown && distance <= (15 * 60 * 1000)) {
                    showPopup(elem);
                    popupShown = true;
                }
            }

            updateTimer();
            setInterval(updateTimer, 1000);
        });


        function showPopup(elem) {
            const popup = document.createElement('div');
            popup.className = 'deal-popup';
            popup.innerHTML = `
            <div class="deal-popup-content">
                <h3>⚡ Time's Running Out!</h3>
                <p>Hanya 15 menit tersisa untuk promo ini.<br>Pesan sekarang sebelum berakhir!</p>
                <button class="close-btn">Close</button>
            </div>
        `;
            document.body.appendChild(popup);

            popup.querySelector('.close-btn').onclick = function() {
                popup.remove();
            };

            setTimeout(() => {
                if (popup.parentElement) popup.remove();
            }, 8000);
        }

    });
</script>