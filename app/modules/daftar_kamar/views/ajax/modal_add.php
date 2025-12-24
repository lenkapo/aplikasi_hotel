<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Daftar Kamar</h4>
    </div>

    <div class="modal-body">
        <form id="form_add" enctype="multipart/form-data">

            <!-- Token CSRF -->
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                value="<?= $this->security->get_csrf_hash(); ?>" />

            <!-- Info -->
            <div class="callout callout-info">
                <p>Silakan isi Daftar Kamar dengan lengkap.</p>
            </div>

            <div class="form-group">
                <label>Tipe Kamar</label>
                <select name="room_id" class="form-control" required>
                    <?php foreach ($rooms as $r): ?>
                        <option value="<?= $r->id ?>"><?= $r->room_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Nomor Kamar</label>
                <input type="number" name="nomor_kamar" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="available">Available</option>
                    <option value="booked">Booked</option>
                    <option value="cleaning">Cleaning</option>
                </select>
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