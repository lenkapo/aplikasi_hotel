<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/temaalus/dist/css/bootstrap-datetimepicker.min.css">
<script src="<?php echo base_url(); ?>assets/temaalus/dist/js/bootstrap-datetimepicker.min.js"></script>

<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
  </div>

  <div class="modal-body">

    <!-- FORM -->
    <form id="form_add" enctype="multipart/form-data">

      <input type="hidden"
        name="<?= $this->security->get_csrf_token_name(); ?>"
        value="<?= $this->security->get_csrf_hash(); ?>" />

      <div class="form-group">
        <label>Nama Kamar</label>
        <input type="text" class="form-control" name="name" required>
      </div>

      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10" required></textarea>
      </div>

      <div class="form-group">
        <label>Harga</label>
        <input type="number" class="form-control" name="price" required>
      </div>

      <div class="form-group">
        <label>Fasilitas</label>
        <input type="text" class="form-control" name="amenities" required>
      </div>

      <div class="form-group">
        <label>Kapasitas (Orang)</label>
        <input type="number" class="form-control" name="capacity" min="1" max="5" required>
      </div>

      <div class="form-group">
        <label>Tipe Kasur</label>
        <select name="tipe_kasur" class="form-control" required>
          <option value="">--- Pilih Tipe Kasur ---</option>
          <option value="Single Bed">Single Bed</option>
          <option value="Double Bed">Double Bed</option>
          <option value="Queen Bed">Queen Bed</option>
          <option value="Twin Bed">Twin Bed</option>
          <option value="King Bed">King Bed</option>
        </select>
      </div>

      <div class="form-group">
        <label>Status Kamar</label>
        <select name="is_active" class="form-control" required>
          <option value="1">Tersedia</option>
          <option value="0">Tidak Tersedia</option>
        </select>
      </div>

      <div class="form-group">
        <div class="callout callout-warning">
          <p>Panduan Ukuran Gambar: Lebar 192px, Tinggi 270px</p>
        </div>
      </div>

      <div class="form-group">
        <label>Main Image</label>
        <input type="file" name="main_image" class="form-control">
      </div>

    </form>
    <!-- END FORM -->

  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onClick="btn_save_add()" class="btn btn-primary">Save changes</button>
  </div>
</div>