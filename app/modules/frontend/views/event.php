<style>
    /* 🌟 EVENT PAGE STYLING */

    /* ====== COUNTDOWN ====== */
    .countdown-box {
        background: #fff;
        border-radius: 10px;
        padding: 15px 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        display: inline-block;
        font-family: 'Poppins', sans-serif;
        margin-bottom: 10px;
        width: 100%;
    }

    .countdown-box h5 {
        margin-bottom: 10px;
        color: #444;
        font-weight: 600;
        font-size: 14px;
    }

    .countdown-box h5::after {
        content: " ⏳";
        animation: blink 1.5s infinite;
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

    .countdown-grid {
        display: flex;
        justify-content: center;
        gap: 6px;
    }

    .countdown-item {
        background: #f9f9f9;
        border-radius: 8px;
        padding: 8px;
        min-width: 55px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .countdown-item span {
        display: block;
        font-size: 16px;
        font-weight: bold;
        color: #e91e63;
    }

    .countdown-item small {
        font-size: 11px;
        color: #777;
    }

    /* ====== BUTTON REGISTER ====== */
    .event-regi {
        background: #e91e63;
        color: #fff !important;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }

    .event-regi:hover {
        background: #c2185b;
    }

    /* ====== FILTER FORM ====== */
    .event-filter-form select,
    .event-filter-form button,
    .event-filter-form input {
        height: 40px;
        border-radius: 5px;
    }

    .event-filter-form button:hover {
        opacity: 0.9;
    }

    /* ====== NAV TABS ====== */
    .nav-tabs {
        border-bottom: 2px solid #ddd;
        margin-bottom: 15px;
    }

    .nav-tabs>li>a {
        color: #555;
        font-weight: 600;
        text-transform: uppercase;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li>a:hover {
        background: #e91e63;
        color: #fff !important;
        border-radius: 4px 4px 0 0;
    }

    .tab-pane {
        transition: opacity 0.4s ease-in-out;
    }

    .tab-pane.fade.in {
        opacity: 1;
    }

    .tab-pane.fade {
        opacity: 0;
    }

    /* ====== PAST LABEL ====== */
    .past-label {
        background: #4CAF50;
        color: #fff;
        padding: 8px 12px;
        border-radius: 6px;
        font-weight: 600;
        display: inline-block;
        margin-top: 15px;
    }

    /* ====== HEADING ====== */
    .page-head h2 {
        color: #e91e63;
        font-weight: 700;
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
                <h4>Hotel Events</h4>
                <p>Temukan acara menarik dan eksklusif yang berlangsung di hotel kami.</p>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Events</a></li>
                </ul>
            </div>
        </div>
    </div>

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
                    <p>Filter event berdasarkan bulan, tahun, atau cari nama event tertentu.</p>
                </div>

                <div class="col-md-12">
                    <div class="head-typo typo-com">
                        <h2>Events: <?= date('F Y') ?></h2>

                        <!-- 🔍 FILTER FORM -->
                        <div>
                            <form method="get" action="<?= site_url('event') ?>" class="event-filter-form">
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-3">
                                        <select name="month" class="select-wrapper">
                                            <option value="">-- Pilih Bulan --</option>
                                            <?php
                                            $months = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
                                            foreach ($months as $num => $name): ?>
                                                <option value="<?= $num ?>" <?= ($month == $num ? 'selected' : '') ?>><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <select name="year" class="select-wrapper">
                                            <option value="">-- Pilih Tahun --</option>
                                            <?php for ($y = date('Y') - 2; $y <= date('Y') + 2; $y++): ?>
                                                <option value="<?= $y ?>" <?= ($year == $y ? 'selected' : '') ?>><?= $y ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" name="keyword" value="<?= $this->input->get('keyword') ?>" class="form-control" placeholder="Cari nama event...">
                                    </div>

                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary" style="background:#e91e63;border:none;">Filter</button>
                                    </div>

                                    <?php if ($month || $year || $this->input->get('keyword')): ?>
                                        <div class="col-md-1">
                                            <a href="<?= site_url('event') ?>" class="btn btn-default">Reset</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>

                        <!-- 📅 TAB MENU -->
                        <ul class="nav nav-tabs" id="eventTabs">
                            <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming Events</a></li>
                            <li><a data-toggle="tab" href="#past">Past Events</a></li>
                        </ul>

                        <div class="tab-content" style="margin-top:20px;">

                            <!-- 🔹 UPCOMING EVENTS -->
                            <div id="upcoming" class="tab-pane fade in active">
                                <?php if (!empty($upcoming)): ?>
                                    <?php foreach ($upcoming as $event): ?>
                                        <div class="row events" style="margin-bottom:25px; align-items:center;">
                                            <div class="col-md-2">
                                                <img src="<?= base_url('assets/images/event/' . ($event->image ?? 'default.jpg')) ?>"
                                                    alt="<?= $event->title ?>" class="img-responsive">
                                            </div>
                                            <div class="col-md-7">
                                                <h3><?= html_escape($event->title) ?></h3>
                                                <span>Date: <?= date('F d, Y', strtotime($event->event_date)) ?>
                                                    <?php if ($event->end_date): ?> - <?= date('F d, Y', strtotime($event->end_date)) ?><?php endif; ?>
                                                </span>
                                                <p><?= word_limiter(strip_tags($event->description), 15) ?></p>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <div class="countdown-box"
                                                    data-date="<?= date('Y-m-d\TH:i:s', strtotime($event->event_date)) ?>">
                                                    <h5>Event starts in:</h5>
                                                    <div class="countdown-grid">
                                                        <div class="countdown-item"><span class="days">0</span><small>Days</small></div>
                                                        <div class="countdown-item"><span class="hours">0</span><small>Hours</small></div>
                                                        <div class="countdown-item"><span class="minutes">0</span><small>Minutes</small></div>
                                                        <div class="countdown-item"><span class="seconds">0</span><small>Seconds</small></div>
                                                    </div>
                                                </div>
                                                <a href="<?= site_url('event_detail/' . $event->slug) ?>"
                                                    class="waves-effect waves-light event-regi"
                                                    style="margin-top:15px; display:inline-block;">Register</a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p><em>Tidak ada event yang akan datang.</em></p>
                                <?php endif; ?>
                            </div>

                            <!-- 🔸 PAST EVENTS -->
                            <div id="past" class="tab-pane fade">
                                <?php if (!empty($past)): ?>
                                    <?php foreach ($past as $event): ?>
                                        <div class="row events" style="margin-bottom:25px; align-items:center;">
                                            <div class="col-md-2">
                                                <img src="<?= base_url('assets/images/event/' . ($event->image ?? 'default.jpg')) ?>"
                                                    alt="<?= $event->title ?>" class="img-responsive">
                                            </div>
                                            <div class="col-md-8">
                                                <h3><?= html_escape($event->title) ?></h3>
                                                <span>Date: <?= date('F d, Y', strtotime($event->event_date)) ?></span>
                                                <p><?= word_limiter(strip_tags($event->description), 15) ?></p>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <div class="past-label">✅ Event Completed</div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p><em>Belum ada event yang selesai.</em></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ⚙️ JS SCRIPTS -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Countdown Timer
        const countdowns = document.querySelectorAll(".countdown-box");
        countdowns.forEach(box => {
            const targetDate = new Date(box.getAttribute("data-date")).getTime();
            const daysEl = box.querySelector(".days");
            const hoursEl = box.querySelector(".hours");
            const minutesEl = box.querySelector(".minutes");
            const secondsEl = box.querySelector(".seconds");

            const interval = setInterval(() => {
                const now = new Date().getTime();
                const distance = targetDate - now;

                if (distance < 0) {
                    box.innerHTML = "<h5 style='color:#4CAF50;'>🎉 Event has started!</h5>";
                    clearInterval(interval);
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                daysEl.textContent = days;
                hoursEl.textContent = hours;
                minutesEl.textContent = minutes;
                secondsEl.textContent = seconds;
            }, 1000);
        });

        // Remember active tab
        const tabs = document.querySelectorAll('#eventTabs a');
        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', function(e) {
                localStorage.setItem('activeTab', e.target.getAttribute('href'));
            });
        });
        const activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            const tabEl = document.querySelector(`#eventTabs a[href="${activeTab}"]`);
            if (tabEl) tabEl.click();
        }
    });
</script>