<?php foreach ($room as $key => $r); ?>
<div class="modal-content">
    <!-- HEADER -->
    <div class="modal-header bg-default" style="color: #000000ff;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
            Detail Kamar
        </h4>
    </div>

    <!-- BODY -->
    <div class="modal-body" style="background: #f9f9f9;">
        <div class="row">
            <!-- FOTO KAMAR -->
            <div class="col-sm-5">
                <div class="thumbnail" style="border: none;">
                    <img src="<?= base_url('assets/images/room/' . $r->image) ?>"
                        alt="Foto Kamar <?= htmlspecialchars($r->room_name) ?>"
                        class="img-responsive img-rounded">
                </div>
                <p class="text-center">

                </p>
            </div>

            <!-- DETAIL INFO -->
            <div class="col-sm-7">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th width="40%">Kategori Kamar</th>
                            <td class="text-center"><?= htmlspecialchars($r->room_type) ?></td>
                        </tr>
                        <tr>
                            <th width="40%">Nama Kamar</th>
                            <td class="text-center"><?= htmlspecialchars($r->room_name) ?></td>
                        </tr>
                        <tr>
                            <th>Harga / Malam</th>
                            <td class="text-center"><strong class="text-success">Rp <?= number_format($r->price, 0, ',', '.') ?></strong></td>
                        </tr>
                        <tr>
                            <th>Kapasitas</th>
                            <td class="text-center"><?= (int)$r->capacity ?> Orang</td>
                        </tr>
                        <tr>
                            <th>Tipe Kasur</th>
                            <td class="text-center"><?= htmlspecialchars($r->bed_type) ?></td>
                        </tr>
                        <tr>
                            <th>Luas Kamar</th>
                            <td class="text-center"><?= htmlspecialchars($r->size) ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td class="text-center">
                                <?php
                                $status = $r->status;
                                if ($status == 'available') echo '<span class="label label-success" style="font-size:13px;">Tersedia</span>';
                                elseif ($status == 'booked') echo '<span class="label label-danger">Dipesan</span>';
                                elseif ($status == 'cleaning') echo '<span class="label label-warning">Dibersihkan</span>';
                                else echo '<span class="label label-default">Maintenance</span>';
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- FASILITAS KAMAR -->
        <div class="panel panel-default">
            <div class="panel-heading" style="background:#337ab7;color:white;">
                <i class="fa fa-cogs"></i> Fasilitas Kamar
            </div>
            <div class="panel-body">
                <?php
                $room_amenities = $this->db
                    ->where('room_id', $r->id)
                    ->get('room_amenities')
                    ->result();
                ?>

                <?php if (!empty($room_amenities)): ?>
                    <?php foreach ($room_amenities as $a): ?>
                        <span class="label label-info" style="margin:2px; display:inline-block;">
                            <i class="fa fa-check"></i> <?= $a->name ?>
                        </span>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Tidak ada fasilitas terdaftar.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<!-- DESKRIPSI -->
<hr>
<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#337ab7; color:white;">
        <i class="fa fa-info-circle"></i> Deskripsi
    </div>
    <div class="panel-body">
        <p style="font-size:13px; color:#555;">
            <?= nl2br(htmlspecialchars($r->description)) ?>
            <?= $this->db->get(); ?>
        </p>
    </div>
</div>
</div>

<!-- FOOTER -->
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">
        <i class="fa fa-times"></i> Tutup
    </button>
</div>
</div>