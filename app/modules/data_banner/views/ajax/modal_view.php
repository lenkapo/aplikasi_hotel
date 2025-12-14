<?php foreach ($room as $key => $r); ?>
<div class="modal-content">
    <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-eye"></i> Detail Data Kamar</h4>
    </div>

    <div class="modal-body">

        <table class="table table-striped table-bordered">
            <tr>
                <th style="width: 150px;">Nama Kamar</th>
                <td>: <?= $r->name ?></td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>: <?= $r->deskripsi ?></td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>: Rp <?= number_format($r->price, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <th>Fasilitas</th>
                <td>: <?= $r->amenities ?></td>
            </tr>
            <tr>
                <th>Kapasitas</th>
                <td>: <?= $r->capacity ?> Orang</td>
            </tr>
            <tr>
                <th>Tipe Kasur</th>
                <td>: <?= $r->tipe_kasur ?></td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td>
                    <img src="<?= base_url('assets/img/room/' . $r->main_image) ?>"
                        class="img-thumbnail" width="160">
                </td>
            </tr>
        </table>

    </div>

    <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal">Tutup</button>
    </div>
</div>