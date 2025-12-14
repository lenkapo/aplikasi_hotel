<style>
    /* Layout Base */
    .section-room-results {
        padding: 120px 0;
    }

    .title {
        font-size: 46px;
        font-weight: 600;
        margin-bottom: 12px;
        color: black;
    }

    .sub-title {
        color: #777;
        font-size: 15px;
    }

    /* Shadow */
    .shadow-custom {
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        border-radius: 18px;
    }

    /* =======================
   SIDEBAR FILTER
======================= */
    .filter-wrapper {
        background: #fff;
        padding: 28px;
        border-radius: 18px;
    }

    .filter-title {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .filter-group {
        margin-bottom: 20px;
    }

    .filter-group label {
        font-weight: 600;
        margin-bottom: 5px;
        display: block;
    }

    .filter-input {
        width: 100%;
        padding: 10px 14px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .filter-input:focus {
        border-color: #d4a762;
        outline: none;
    }

    .filter-checkbox {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 6px;
    }

    .btn-filter {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        border-radius: 12px;
        background: #d4a762;
        border: none;
        color: #fff;
        font-weight: 600;
        transition: .3s;
    }

    .btn-filter:hover {
        background: #b98c50;
    }

    /* =======================
   ROOM CARDS
======================= */
    .room-card {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        transition: all .35s ease;
    }

    .room-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.12);
    }

    .room-img img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .room-body {
        padding: 25px;
    }

    .room-title {
        font-size: 22px;
        font-weight: 600;
        color: #000;
        margin-bottom: 10px;
    }

    .room-type {
        color: #999;
        font-size: 14px;
        margin-bottom: 14px;
    }

    .room-price .price {
        color: #d4a762;
        font-weight: 700;
        font-size: 22px;
    }

    .room-price .per-night {
        font-size: 13px;
        color: #777;
    }

    .room-actions {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .btn-view,
    .btn-book {
        padding: 10px 20px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-view {
        border: 2px solid #000;
        color: #000;
    }

    .btn-view:hover {
        background: #000;
        color: #fff;
    }

    .btn-book {
        background: #000;
        color: #fff;
    }

    .btn-book:hover {
        background: #d4a762;
    }

    /* Grid spacing */
    .section-room-results .row {
        margin-top: 30px;
    }

    /* Card */
    .room-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        width: 100%;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
    }

    .room-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.15);
    }

    /* Image */
    .room-img img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    /* Body */
    .room-body {
        padding: 20px;
    }

    .room-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .room-type {
        font-size: 14px;
        color: #666;
        height: 60px;
        overflow: hidden;
    }

    /* Price */
    .room-price {
        margin-top: 15px;
        font-weight: bold;
        font-size: 18px;
    }

    .room-price .per-night {
        color: #888;
        font-size: 14px;
    }

    /* Buttons */
    .room-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn-view,
    .btn-book {
        padding: 10px 10px;
        border-radius: 7px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-view {
        background: #000000ff;
        color: #ffffffff;
    }

    .btn-view:hover {
        background: #ddd;
    }

    .btn-book {
        background: #000;
        color: #fff;
    }

    .btn-book:hover {
        opacity: 0.8;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .room-img img {
            height: 200px;
        }
    }

    @media (max-width: 768px) {
        .room-img img {
            height: 180px;
        }
    }

    /* Toggle Button */
    .view-toggle {
        display: flex;
        gap: 10px;
    }

    .toggle-btn {
        background: #eee;
        border: 0;
        padding: 10px 18px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
    }

    .toggle-btn.active {
        background: #000;
        color: #fff;
    }

    /* Default = GRID VIEW */
    .room-grid .room-item {
        display: block;
    }

    .room-grid .room-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .room-grid .room-img img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .room-grid .room-body {
        padding: 20px;
    }

    /* LIST VIEW */
    .room-list .room-item {
        flex: 0 0 100%;
    }

    .room-list .room-card {
        display: flex;
        flex-direction: row;
        height: auto;
    }

    .room-list .room-img img {
        width: 280px;
        height: 200px;
        object-fit: cover;
    }

    .room-list .room-body {
        padding: 20px;
        width: 100%;
    }

    .room-list .room-type {
        height: auto;
    }

    .room-list .room-actions {
        margin-top: 15px;
    }

    /* Responsive Fix */
    @media (max-width: 768px) {
        .room-list .room-card {
            flex-direction: column;
        }

        .room-list .room-img img {
            width: 100%;
            height: 200px;
        }
    }

    /* ===========================
   Booking.com Search Result UI
   =========================== */

    .bc-card {
        display: grid;
        grid-template-columns: 250px 1fr 200px;
        gap: 20px;
        padding: 20px;
        border: 1px solid #e2e2e2;
        border-radius: 10px;
        background: #fff;
        margin-bottom: 20px;
        transition: .2s;
    }

    .bc-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    /* IMAGE */
    .bc-image img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* INFO */
    .bc-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .bc-desc {
        font-size: 14px;
        color: #555;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    /* TAGS */
    .bc-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .bc-tag {
        background: #eef5ff;
        color: #0057e7;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }

    /* PRICE AREA */
    .bc-price-box {
        text-align: right;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .bc-price {
        font-size: 22px;
        font-weight: 700;
        color: #0071c2;
    }

    .bc-night {
        font-size: 12px;
        color: #666;
        margin-bottom: 10px;
    }

    .bc-btn {
        background: #0071c2;
        color: #fff;
        padding: 12px 15px;
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
        display: block;
    }

    .bc-btn:hover {
        background: #005a9e;
    }

    .bc-link {
        margin-top: 10px;
        font-size: 14px;
        text-decoration: underline;
        color: #005a9e;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .bc-card {
            grid-template-columns: 1fr;
        }

        .bc-price-box {
            text-align: left;
        }
    }

    /* ===========================
   Booking.com Search Result UI
   =========================== */

    .bc-card {
        display: grid;
        grid-template-columns: 250px 1fr 200px;
        gap: 20px;
        padding: 20px;
        border: 1px solid #e2e2e2;
        border-radius: 10px;
        background: #fff;
        margin-bottom: 20px;
        transition: .2s;
    }

    .bc-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    /* IMAGE */
    .bc-image img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* INFO */
    .bc-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .bc-desc {
        font-size: 14px;
        color: #555;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    /* TAGS */
    .bc-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .bc-tag {
        background: #eef5ff;
        color: #0057e7;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }

    /* PRICE AREA */
    .bc-price-box {
        text-align: right;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .bc-price {
        font-size: 22px;
        font-weight: 700;
        color: #0071c2;
    }

    .bc-night {
        font-size: 12px;
        color: #666;
        margin-bottom: 10px;
    }

    .bc-btn {
        background: #0071c2;
        color: #fff;
        padding: 12px 15px;
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
        display: block;
    }

    .bc-btn:hover {
        background: #005a9e;
    }

    .bc-link {
        margin-top: 10px;
        font-size: 14px;
        text-decoration: underline;
        color: #005a9e;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .bc-card {
            grid-template-columns: 1fr;
        }

        .bc-price-box {
            text-align: left;
        }
    }

    .result-header h5 {
        font-size: 18px;
        font-weight: 600;
    }

    .sort-select {
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #dcdcdc;
        font-size: 14px;
    }

    .view-toggle .toggle-btn {
        padding: 8px 14px;
        border: 1px solid #dcdcdc;
        background: white;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        font-size: 14px;
    }

    .view-toggle .toggle-btn.active {
        background: #0d6efd;
        color: white;
        border-color: #0d6efd;
    }

    .view-toggle .toggle-btn:not(.active):hover {
        background: #f0f0f0;
    }

    /* LIST MODE */
    .list-view .room-card {
        display: flex;
        flex-direction: row;
    }

    /* GRID MODE */
    .grid-view {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .grid-view .room-card {
        display: block;
    }
</style>

<section class="section-banner">
    <div class="row banner-image" style="background-image:url('<?= base_url("assets/img/hero/hero-section-2.jpg") ?>');">
        <div class="banner-overlay"></div>
        <div class="banner-section">
            <div class="lh-banner-contain">
                <h2>Room Availability</h2>
                <div class="lh-breadcrumb">
                    <h5>
                        <span class="lh-inner-breadcrumb">
                            <a href="<?= base_url() ?>">Home</a>
                        </span>
                        <span> / </span>
                        <span>
                            <a href="javascript:void(0)">Room</a>
                        </span>
                        <span> / </span>
                        <span>
                            <a href="javascript:void(0)">Room Availability</a>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-room-results padding-tb-120">
    <div class="container">

        <div class="row">
            <!-- ==========================
                 SEARCH RESULT
            =========================== -->
            <div class="col-lg-9">

                <div class="text-center mb-10">
                    <h2 class="title">Room Availability</h2>
                    <p class="sub-title">
                        Check-in: <strong><?= $checkin ?></strong> —
                        Check-out: <strong><?= $checkout ?></strong>
                    </p>
                </div>

                <div id="roomList" class="list-view">
                    <div class="result-header d-flex align-items-center justify-content-between mb-4">

                        <!-- Total Results -->
                        <div class="result-count">
                            <h5 class="mb-0">
                                Menampilkan <?= count($rooms) ?> kamar tersedia
                            </h5>
                        </div>

                        <!-- Sorting + Toggle -->
                        <div class="result-actions d-flex align-items-center">

                            <!-- Sorting -->
                            <select id="sortOption" class="sort-select">
                                <option value="default">Urutkan</option>
                                <option value="price_low">Harga Terendah</option>
                                <option value="price_high">Harga Tertinggi</option>
                                <option value="rating">Rating Tertinggi</option>
                                <option value="popular">Paling Populer</option>
                            </select>

                            <!-- Toggle Button -->
                            <div class="view-toggle ms-3">
                                <button class="toggle-btn active" id="listViewBtn">
                                    <i class="fa fa-list"></i>
                                </button>
                                <button class="toggle-btn" id="gridViewBtn">
                                    <i class="fa fa-th-large"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <?php if (empty($rooms)): ?>
                        <div class="col-12 text-center">
                            <h4 class="text-muted">No rooms available.</h4>
                        </div>
                    <?php endif ?>

                    <?php foreach ($rooms as $r): ?>
                        <div class="room-item bc-list">
                            <div class="bc-card">

                                <!-- IMAGE -->
                                <div class="bc-image">
                                    <img src="<?= base_url('assets/img/room/' . $r->main_image) ?>" alt="<?= $r->name ?>">
                                </div>

                                <!-- INFO -->
                                <div class="bc-info">
                                    <h3 class="bc-title"><?= $r->name ?></h3>

                                    <p class="bc-desc">
                                        <?= substr(strip_tags($r->deskripsi), 0, 140) ?>...
                                    </p>

                                    <!-- Facilities -->
                                    <div class="bc-tags">
                                        <?php foreach (explode(',', $r->amenities) as $f): ?>
                                            <span class="bc-tag"><?= $f ?></span>
                                        <?php endforeach ?>
                                    </div>
                                </div>

                                <!-- PRICE BOX -->
                                <div class="bc-price-box">
                                    <div class="bc-price">Rp <?= number_format($r->price, 0, ',', '.') ?></div>
                                    <div class="bc-night">per night</div>

                                    <a href="<?= base_url('booking?room=' . $r->id) ?>" class="bc-btn">
                                        Book Now
                                    </a>

                                    <a href="<?= base_url('room_detail/' . $r->id) ?>" class="bc-link">
                                        View Details
                                    </a>
                                </div>

                            </div>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>
            <!-- ==========================
                 SIDEBAR FILTER
            =========================== -->
            <div class="col-lg-3 mb-5">
                <div class="filter-wrapper shadow-custom">

                    <h4 class="filter-title">Filter Rooms</h4>

                    <form action="<?= base_url('beranda/search') ?>" method="GET">

                        <!-- Check-in -->
                        <div class="filter-group">
                            <label>Check-in</label>
                            <input type="date" name="checkin" class="filter-input" value="<?= $checkin ?>">
                        </div>

                        <!-- Check-out -->
                        <div class="filter-group">
                            <label>Check-out</label>
                            <input type="date" name="checkout" class="filter-input" value="<?= $checkout ?>">
                        </div>

                        <!-- Type -->
                        <div class="filter-group">
                            <label>Tipe Kamar</label>
                            <select name="tipe_kamar" class="filter-input">
                                <option value="">Semua Tipe</option>
                                <?php foreach ($tipe as $t): ?>
                                    <option value="<?= $t->id ?>"
                                        <?= ($t->id == $selected_type) ? 'selected' : '' ?>>
                                        <?= $t->nama_tipe ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Price -->
                        <div class="filter-group">
                            <label>Harga Max</label>
                            <input type="number" name="max_price" class="filter-input" placeholder="0">
                        </div>

                        <!-- Facilities -->
                        <div class="filter-group">
                            <label>Fasilitas</label>
                            <?php foreach ($fasilitas as $f): ?>
                                <div class="filter-checkbox">
                                    <input type="checkbox" name="fasilitas[]" value="<?= $f->id ?>">
                                    <span><?= $f->nama_amenity ?></span>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <button type="submit" class="btn-filter">
                            Apply Filter
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

<script>
    document.querySelectorAll('.toggle-btn').forEach(btn => {

        btn.addEventListener('click', function() {

            // switch active button
            document.querySelectorAll('.toggle-btn')
                .forEach(b => b.classList.remove('active'));

            this.classList.add('active');

            // switch view mode
            const mode = this.dataset.view;
            const container = document.getElementById('room-container');

            container.classList.remove('room-grid', 'room-list');

            if (mode === 'grid') {
                container.classList.add('room-grid');
            } else {
                container.classList.add('room-list');
            }

        });

    });
    document.getElementById("gridViewBtn").addEventListener("click", function() {
        this.classList.add("active");
        document.getElementById("listViewBtn").classList.remove("active");

        document.getElementById("roomList").classList.add("grid-view");
        document.getElementById("roomList").classList.remove("list-view");
    });

    document.getElementById("listViewBtn").addEventListener("click", function() {
        this.classList.add("active");
        document.getElementById("gridViewBtn").classList.remove("active");

        document.getElementById("roomList").classList.add("list-view");
        document.getElementById("roomList").classList.remove("grid-view");
    });
</script>