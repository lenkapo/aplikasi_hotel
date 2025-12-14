<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/temaalus/dist/css/bootstrap-datetimepicker.min.css">
<script src="<?php echo base_url(); ?>assets/temaalus/dist/js/bootstrap-datetimepicker.min.js"></script>
<style>
  .remove-preview-btn {
    display: inline-block;
    margin-top: 10px;
  }
</style>

<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel" style="color: ;"><?= $title; ?></h4>
  </div>

  <div class="modal-body">

    <!-- FORM -->
    <form id="form_add" enctype="multipart/form-data">

      <input type="hidden"
        name="<?= $this->security->get_csrf_token_name(); ?>"
        value="<?= $this->security->get_csrf_hash(); ?>" />

      <div class="form-group">
        <label>Nama Banner</label>
        <input type="text" class="form-control" name="title" required>
      </div>

      <div class="form-group">
        <label>Status</label>
        <select name="is_active" class="form-control" required>
          <option value="">-- Pilih Status -- </option>
          <option value="1">Tersedia</option>
          <option value="0">Tidak Tersedia</option>
        </select>
      </div>

      <div class="form-group">
        <div class="callout callout-warning">
          <p>Panduan Ukuran Gambar: Lebar 1920px, Tinggi 1160px</p>
        </div>
      </div>

      <div class="form-group" style="margin-top:10px;">
        <label>Picture</label>
        <input type="file" id="gambar" accept="image/*" onchange="previewImage(event)" class="form-control" name="image">
        <div id="preview-area" style="margin-top:10px;">
        </div>
      </div>
    </form>
    <!-- END FORM -->

  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onClick="btn_save_add()" class="btn btn-primary">Save changes</button>
  </div>
</div>


<script>
  function previewImage(event) {
    const previewArea = document.getElementById("preview-area");
    previewArea.innerHTML = ""; // reset jika upload ulang

    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {

      // wrapper
      const wrapper = document.createElement("div");
      wrapper.style.position = "relative";
      wrapper.style.display = "inline-block";

      // image
      const img = document.createElement("img");
      img.src = e.target.result;
      img.style.width = "100%";
      img.style.height = "100%";
      img.style.objectFit = "cover";
      img.style.borderRadius = "8px";
      img.style.border = "1px solid #ddd";

      // tombol hapus
      const btn = document.createElement("button");
      btn.innerHTML = "×";
      btn.style.position = "absolute";
      btn.style.top = "5px";
      btn.style.right = "5px";
      btn.style.background = "red";
      btn.style.color = "#fff";
      btn.style.border = "none";
      btn.style.borderRadius = "50%";
      btn.style.width = "25px";
      btn.style.height = "25px";
      btn.style.cursor = "pointer";
      btn.onclick = function() {
        previewArea.innerHTML = "";
        document.getElementById("gambar").value = "";
      };

      wrapper.appendChild(img);
      wrapper.appendChild(btn);
      previewArea.appendChild(wrapper);
    };
    reader.readAsDataURL(file);
  }
</script>