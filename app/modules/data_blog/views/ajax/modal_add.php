<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/temaalus/dist/css/bootstrap-datetimepicker.min.css">
<script src="<?php echo base_url(); ?>assets/temaalus/dist/js/bootstrap-datetimepicker.min.js"></script>
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
  </div>
  <div class="modal-body">
    <!-- FORM -->
    <form id="form_add" enctype="multipart/form-data">
      <!-- KONTEN -->
      <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

      <!-- Judul Content BLog -->
      <div class="form-group">
        <label> Title</label>
        <input type="text" class="form-control" name="title" required>
      </div>
      <!-- Isi Content Blog -->
      <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="10"></textarea>
      </div>
      <!-- Kategori Blog -->
      <div class="row g-3">
        <div class="col-md-6 form-group">
          <label>Kategori</label>
          <select name="category_id" class="form-control">
            <option value="">------- Pilih Kategori --------</option>
            <?php if (!empty($categories)): ?>
              <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>
        <!-- Status Published -->
        <div class="col-md-6 form-group">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Draft</option>
          </select>
        </div>
      </div>
      <!-- Panduan Ukurang Gambar -->
      <div class="form-group">
        <div class="callout callout-warning">
          <p>Panduan Ukuran Gambar: L: 192px T: 270px</p>
        </div>
      </div>
      <!-- Upload Gambar -->
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="thumbnail">
      </div>
      <hr>
      <!-- END KONTEN -->
    </form>
    <!-- END FORM -->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onClick="btn_save_add()" class="btn btn-primary">Save changes</button>
  </div>
</div>