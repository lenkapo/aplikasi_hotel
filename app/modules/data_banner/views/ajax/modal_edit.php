<?php foreach ($data as $key => $r); ?>
<div class="modal-header bg-primary">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Tipe Kamar</h4>
</div>

<div class="modal-body">

  <form id="form_edit" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $r->id ?>">

    <div class="form-group">
      <label>Nama Kamar</label>
      <input type="text" name="name" class="form-control" value="<?= $r->name ?>">
    </div>

    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="5"><?= $r->deskripsi ?></textarea>
    </div>

    <div class="form-group">
      <label>Harga</label>
      <input type="number" name="price" class="form-control" value="<?= $r->price ?>">
    </div>

    <div class="form-group">
      <label>Fasilitas</label>
      <input type="text" name="amenities" class="form-control" value="<?= $r->amenities ?>">
    </div>

    <div class="form-group">
      <label>Kapasitas</label>
      <input type="number" name="capacity" class="form-control" value="<?= $r->capacity ?>">
    </div>

    <div class="form-group">
      <label>Tipe Kasur</label>
      <select name="tipe_kasur" class="form-control">
        <option value="<?= $r->tipe_kasur ?>"><?= $r->tipe_kasur ?></option>
        <option value="Single Bed">Single Bed</option>
        <option value="Double Bed">Double Bed</option>
        <option value="Queen Bed">Queen Bed</option>
        <option value="Twin Bed">Twin Bed</option>
        <option value="King Bed">King Bed</option>
      </select>
    </div>

    <div class="form-group">
      <label>Gambar Saat Ini</label><br>
      <img src="<?= base_url('assets/img/room/' . $r->main_image) ?>" class="img-thumbnail" width="120">
    </div>

    <div class="form-group">
      <label>Ganti Gambar</label>
      <input type="file" name="main_image" class="form-control">
    </div>

  </form>

</div>

<div class="modal-footer">
  <button class="btn btn-default" data-dismiss="modal">Batal</button>
  <button class="btn btn-primary" onClick="btn_save_edit()">Simpan Perubahan</button>
</div>