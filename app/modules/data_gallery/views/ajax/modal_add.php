<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/temaalus/dist/css/bootstrap-datetimepicker.min.css">
<script src="<?php echo base_url(); ?>assets/temaalus/dist/js/bootstrap-datetimepicker.min.js"></script>

<div class="modal-content">
  <div class="modal-header bg-primary" style="color:#fff;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
  </div>

  <div class="modal-body">
    <form id="form_add" enctype="multipart/form-data">
      <!-- CSRF -->
      <input type="hidden"
             name="<?= $this->security->get_csrf_token_name(); ?>"
             value="<?= $this->security->get_csrf_hash(); ?>">
      <input type="hidden" name="tipe_kamar_id" value="1">
      <!-- Judul -->
      <div class="form-group">
        <label><strong>Judul</strong></label>
        <input type="text" class="form-control" name="title" placeholder="Masukkan judul Gallery...">
      </div>

      <!-- Deskripsi -->
      <div class="form-group">
        <label><strong>Deskripsi</strong></label>
        <textarea name="description" class="form-control" rows="5" placeholder="Tulis deskripsi Gallery..."></textarea>
      </div>

      <!-- Status -->
      <div class="form-group">
        <label><strong>Status Gambar</strong></label>
        <select name="is_active" class="form-control" required>
          <option value="">-- Pilih Status --</option>
          <option value="1">Tersedia</option>
          <option value="0">Tidak Tersedia</option>
        </select>
      </div>

      <!-- Panduan ukuran -->
      <div class="form-group">
        <div class="callout callout-warning" style="padding:12px; border-left:5px solid #f0ad4e;">
          <strong>Panduan Ukuran Gambar</strong>
          <p class="mb-0">Rekomendasi: <b>192px x 270px</b></p>
        </div>
      </div>

      <!-- Upload file -->
      <div class="form-group">
        <label><strong>Gambar</strong></label>
        <input type="file" name="image" class="form-control">
      </div>

      <hr>
    </form>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="button" onclick="btn_save_add()" class="btn btn-primary">Simpan</button>
  </div>
</div>
