<section>
    <!--Navbar-->
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
    <!-- End Navbar -->
    <!--TOP BANNER-->
    <div class="inn-banner">
        <div class="container">
            <div class="row">
                <h4>Our Menu</h4>
                <h5 style="color: #acacacff;">"Kelezatan Bintang Lima di Setiap Hidangan"</h5>
                <p style="color: #818181;">Nikmati pilihan menu premium kami, mulai dari olahan hasil laut segar
                    hingga daging pilihan berkualitas tinggi yang dipanggang <br> dengan sempurna untuk memanjakan lidah Anda.
                <p>
                <ul>
                    <li><a href="<?= base_url() ?>">Home</a>
                    </li>
                    <li><a href="#">Menu</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="inn-body-section pad-bot-65">
        <div class="container">
            <!-- === FILTER TABS (hanya sekali di atas) === -->
            <div class="menu-tabs text-center mb-4">
                <button class="tab-link active" onclick="filterMenu('all', event)">All</button>
                <button class="tab-link" onclick="filterMenu('Non Veg', event)">Non Veg</button>
                <button class="tab-link" onclick="filterMenu('Veg', event)">Veg</button>
                <button class="tab-link" onclick="filterMenu('Drinks & Desserts', event)">Drinks & Desserts</button>
            </div>

            <!-- === LOOP KATEGORI === -->
            <?php foreach ($categories as $cat): ?>
                <div class="row inn-page-com category-section" data-category="<?= $cat['category'] ?>">
                    <div class="page-head">
                        <h2><?= $cat['category'] ?></h2>
                        <div class="head-title">
                            <div class="hl-1"></div>
                            <div class="hl-2"></div>
                            <div class="hl-3"></div>
                        </div>
                        <p>Pilihan <?= strtolower($cat['category']) ?> terbaik kami.</p>
                    </div>

                    <!-- === LOOP MENU DALAM KATEGORI === -->
                    <?php foreach ($cat['menus'] as $index => $m): ?>
                        <div class="col-md-6 mb-4 menu-item-box"
                            style="--i: <?= $index ?>;"
                            data-category="<?= $cat['category'] ?>">
                            <div class="res-menu">
                                <img src="<?= base_url('assets/images/menu/' . $m->gambar) ?>" alt="<?= $m->nama_menu ?>">

                                <div class="menu-content">
                                    <h3><?= $m->nama_menu ?></h3>
                                    <span class="menu-item"><?= $m->deskripsi ?></span>
                                    <div class="menu-price">Rp. <?= number_format($m->harga, 0, ',', '.') ?></div>
                                </div>

                                <button class="btn-order"
                                    onclick="openModal('<?= $m->nama_menu ?>', 'Rp. <?= number_format($m->harga, 0, ',', '.') ?>')">
                                    Order Now
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>


        <!-- Modal Order -->
        <div id="orderModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>

                <h2>Form Pemesanan</h2>
                <form id="orderForm">
                    <div class="form-group">
                        <label>Menu:</label>
                        <input type="text" id="menuName" name="menu_name" readonly>
                    </div>

                    <div class="form-group">
                        <label>Harga:</label>
                        <input type="text" id="menuPrice" name="price" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Anda:</label>
                        <input type="text" id="customerName" name="customer" placeholder="Masukkan nama Anda" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Kamar:</label>
                        <input type="text" id="roomNumber" name="room" placeholder="Masukkan nomor kamar (opsional)">
                    </div>

                    <div class="form-group">
                        <label>Jumlah:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1">
                    </div>

                    <div class="form-group">
                        <label>Catatan:</label>
                        <textarea id="note" name="note" placeholder="Contoh: tanpa saus pedas"></textarea>
                    </div>

                    <button type="button" class="submit-btn" onclick="kirimKeWhatsapp()">Kirim Pesanan</button>
                </form>
            </div>
        </div>

        <!--TOP SECTION-->
        <!--TOP SECTION-->
        <div class="hom-footer-section">
            <div class="container">
                <div class="row">
                    <div class="foot-com foot-1">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
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
    </div>
</section>

<script>
    function openModal(name, price) {
        document.getElementById("menuName").value = name;
        document.getElementById("menuPrice").value = price;
        document.getElementById("orderModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("orderModal").style.display = "none";
    }

    // Tutup modal saat klik di luar area
    window.onclick = function(event) {
        const modal = document.getElementById("orderModal");
        if (event.target === modal) closeModal();
    };

    // Kirim data form (contoh log)
    document.getElementById("orderForm").addEventListener("submit", function(e) {
        e.preventDefault();
        const name = document.getElementById("customerName").value;
        const menu = document.getElementById("menuName").value;
        const qty = document.getElementById("quantity").value;
        alert(`Terima kasih ${name}! Pesanan Anda untuk ${qty}x ${menu} telah dikirim.`);
        closeModal();
    });

    function filterMenu(category, e) {
        const allTabs = document.querySelectorAll('.tab-link');
        const allSections = document.querySelectorAll('.category-section');

        // ubah tab aktif
        allTabs.forEach(tab => tab.classList.remove('active'));
        e.target.classList.add('active');

        // animasi smooth show/hide
        allSections.forEach(sec => {
            if (category === 'all' || sec.dataset.category === category) {
                sec.classList.remove('hide');
            } else {
                sec.classList.add('hide');
            }
        });
    }

    function kirimKeWhatsapp() {
        // Mencegah form melakukan refresh halaman
        event.preventDefault();

        // Ambil data dari ID yang ada di HTML Anda
        const menu = document.getElementById('menuName').value;
        const harga = document.getElementById('menuPrice').value;
        const nama = document.getElementById('customerName').value;
        const kamar = document.getElementById('roomNumber').value;
        const jumlah = document.getElementById('quantity').value;
        const catatan = document.getElementById('note').value;

        // GANTI dengan nomor WhatsApp Anda (Gunakan kode negara 62, tanpa + atau spasi)
        const nomorAdmin = "6285697362948";

        // Validasi sederhana agar nama wajib diisi
        if (!nama) {
            alert("Silakan masukkan nama Anda.");
            return;
        }

        // Menyusun teks pesan agar rapi
        const teksPesan = `*PESANAN BARU*%0A` +
            `--------------------%0A` +
            `*Menu:* ${menu}%0A` +
            `*Harga:* ${harga}%0A` +
            `*Jumlah:* ${jumlah}%0A` +
            `--------------------%0A` +
            `*Nama:* ${nama}%0A` +
            `*No. Kamar:* ${kamar || '-'}%0A` +
            `*Catatan:* ${catatan || '-'}%0A` +
            `--------------------`;

        // Kirim ke WhatsApp
        const url = `https://wa.me/${nomorAdmin}?text=${teksPesan}`;
        window.open(url, '_blank');
    }
</script>