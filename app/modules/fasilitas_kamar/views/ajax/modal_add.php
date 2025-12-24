<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Booking</h4>
    </div>

    <div class="modal-body">
        <form id="form_add" enctype="multipart/form-data">

            <!-- Token CSRF -->
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                value="<?= $this->security->get_csrf_hash(); ?>" />

            <!-- Info -->
            <div class="callout callout-info">
                <p>Silakan isi data booking kamar dengan lengkap.</p>
            </div>

            <!-- Tanggal Check-In & Check-Out -->

            <div class="row">
                <!-- Check-In -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="arrival_date">Pilih Tanggal Check In</label>
                        <input type="date" name="arrival_date" class="form-control" placeholder="Pilih Tanggal">
                    </div>
                </div>

                <!-- Check-Out -->
                <div class="col-md-6">
                    <label for="departure_date">Check Out</label>
                    <input
                        type="date"
                        name="departure_date"
                        class="form-control"
                        min=""
                        required>
                </div>
            </div>




            <!-- Kamar -->
            <div class="form-group">
                <label for="room_id">Pilih Kamar</label>
                <select name="room_id" id="room_id" class="form-control" required>
                    <option value="">-- Pilih Kamar --</option>
                    <?php
                    $rooms = $this->db->get_where('rooms', ['is_active' => 1])->result();
                    foreach ($rooms as $r): ?>
                        <option value="<?= $r->id; ?>"><?= $r->name; ?> - Rp <?= number_format($r->price, 0, ',', '.'); ?>/malam</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Nama Tamu -->
            <div class="form-group">
                <label for="full_name">Nama Lengkap</label>
                <input type="text" name="full_name" id="full_name" class="form-control" required placeholder="Nama Lengkap Tamu">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="Email Tamu">
            </div>

            <!-- Telepon -->
            <div class="form-group">
                <label for="phone">Telepon</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon">
            </div>

            <div class="form-group">
                <label for="mobile">Telepon</label>
                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Nomor Mobile">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>

            <!-- Jumlah Tamu -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="adults">Dewasa</label>
                        <input type="number" name="adults" id="adults" class="form-control" min="1" value="1" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="children">Anak-anak</label>
                        <input type="number" name="children" id="children" class="form-control" min="0" value="0">
                    </div>
                </div>
            </div>

            <!-- Catatan -->
            <div class="form-group">
                <label for="message">Catatan / Pesan</label>
                <textarea name="message" id="message" rows="3" class="form-control" placeholder="Contoh: Permintaan khusus, jam check-in, dll."></textarea>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" onClick="btn_save_add()" class="btn btn-primary">
            <i class="fa fa-save"></i> Simpan Booking
        </button>
    </div>
</div>

<script>
    flatpickr("#dateRange", {
        mode: "range", // enable date range
        dateFormat: "d-m-Y", // format dd-mm-yyyy
        minDate: "today" // tidak boleh sebelum hari ini
    });
</script>