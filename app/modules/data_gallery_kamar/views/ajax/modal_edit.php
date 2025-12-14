<?php foreach ($data as $key => $value); ?>
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?php echo $title; ?></h4>
  </div>
  <div class="modal-body">
    <!-- FORM -->
    <form id="form_edit">
      <input type="hidden" name="id" value="<?php echo $value->id; ?>" required>
      <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
      <!-- KONTEN -->
      <div class="form-group">
        <label>Caption</label>
        <input type="text" class="form-control" name="caption" value="<?php echo $value->caption; ?>">
      </div>
      <div class="form-group">
        <label><strong>Kamar</strong></label>
        <select name="id_kamar" class="form-control" required>
          <option value="">-- Pilih Kamar --</option>
          <?php
          $rooms = $this->db->get('tipe_kamar')->result();
          foreach ($rooms as $room): ?>
            <option value="<?= $room->id; ?>" <?= ($value->id_kamar == $room->id) ? 'selected' : ''; ?>>
              <?= $room->name; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Status Kamar</label>
        <select name="is_active" class="form-control" required>
          <option value="" disabled <?= $value->is_active === null ? "selected" : "" ?>>Pilih Status</option>
          <option value="1" <?= $value->is_active == "1" ? "selected" : "" ?>>Tersedia</option>
          <option value="0" <?= $value->is_active == "0" ? "selected" : "" ?>>Tidak Tersedia</option>
        </select>
      </div>
      <div class="form-group">
        <div class="callout callout-warning">
          <p>Panduan Ukuran Gambar: L: 192px T: 270px</p>
        </div>
      </div>
      <div class="form-group">
        <label>Gambar Saat Ini</label><br>
        <img src="<?= base_url('assets/img/room/' . $value->image_path) ?>" class="img-thumbnail" style="width: 100%; height: auto;">
      </div>

      <div class="form-group">
        <label>Ganti Gambar</label>
        <input type="file" name="image_path" class="form-control">
      </div>
      <br>
      <hr>
      <!-- END KONTEN -->
    </form>
    <!-- END FORM -->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onClick="btn_save_edit()" class="btn btn-primary">Save changes</button>
  </div>
</div>