<?php foreach ($data as $key => $value); ?>
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $title; ?></h4>
    </div>

    <div class="modal-body">
        <!-- FORM -->
        <form id="form_edit">
            <!-- Hidden input -->
            <input type="hidden" name="id" value="<?php echo $value->id; ?>" required>
            <input type="hidden"
                name="<?= $this->security->get_csrf_token_name(); ?>"
                value="<?= $this->security->get_csrf_hash(); ?>" />

            <!-- ROOM SELECTION -->
            <div class="form-group">
                <label>Pilih Tipe Kamar</label>
                <select name="room_id" class="form-control" required>
                    <?php
                    $rooms = $this->db->get_where('rooms', ['status' => 1])->result();
                    foreach ($rooms as $r):
                        $selected = ($r->id == $value->room_id) ? 'selected' : '';
                    ?>
                        <option value="<?= $r->id; ?>" <?= $selected; ?>>
                            <?= $r->room_name; ?> - Rp <?= number_format($r->price, 0, ',', '.'); ?>/malam
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- NOMOR KAMAR -->
            <div class="form-group">
                <label>Nomor Kamar</label>
                <input type="text" class="form-control" name="nomor_kamar"
                    value="<?php echo $value->nomor_kamar; ?>" required>
            </div>

            <!-- STATUS -->
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="available" <?= ($value->status == 'available') ? 'selected' : ''; ?>>Available</option>
                    <option value="booked" <?= ($value->status == 'booked') ? 'selected' : ''; ?>>Booked</option>
                    <option value="cleaning" <?= ($value->status == 'cleaning') ? 'selected' : ''; ?>>Cleaning</option>
                </select>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" onClick="btn_save_edit()" class="btn btn-primary">
            <i class="fa fa-save"></i> Simpan Perubahan
        </button>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Re-inisialisasi select2 ketika modal edit ditampilkan
        $('#myModal, .modal').on('shown.bs.modal', function() {
            $('#room_id').select2({
                width: '100%',
                dropdownParent: $(this)
            });
        });
    });
</script>