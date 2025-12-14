<script src="<?php echo base_url(); ?>assets/temaalus/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/temaalus/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Check In
            <small>Input data tamu</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">KAMAR NOMOR: <?php echo $kamar->no_kamar; ?></h3>
                    </div>
                    <?php echo form_open('check_in/simpan'); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="invoice"># INVOICE</label>
                                    <input type="text" class="form-control" name="no_invoice" value="<?php echo $invoice; ?>" readonly>
                                    <input type="hidden" name="no_kamar" value="<?php echo $kamar->no_kamar; ?>">
                                </div>

                                <div class="callout callout-info">
                                    <h4><?php echo $kamar->tipe_kamar; ?></h4>
                                    <p>Harga / Malam : Rp <?php echo number_format($kamar->harga, 0, ',', '.'); ?></p>
                                    <p>Maksimal Dewasa : <?php echo $kamar->kapasitas_dewasa; ?> Orang</p>
                                    <p>Maksimal Anak-anak : <?php echo $kamar->kapasitas_anak; ?> Orang</p>
                                </div>

                                <div class="form-group <?php echo form_error('id_tamu') ? 'has-error' : ''; ?>">
                                    <label for="id_tamu">Nama Tamu</label>
                                    <select class="form-control select2" name="id_tamu" style="width: 100%;">
                                        <option value="">--Pilih--</option>
                                        <?php foreach ($list_tamu as $tamu): ?>
                                            <option value="<?php echo $tamu->id_tamu; ?>"><?php echo $tamu->nama_tamu; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="help-block">
                                        <a href="#">Klik disini</a> jika nama tamu yang dimaksud tidak ditemukan pada daftar buku tamu.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Tamu</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <select class="form-control" name="jumlah_dewasa">
                                                <option value="">-Dewasa-</option>
                                                <?php for ($i = 1; $i <= $kamar->kapasitas_dewasa; $i++): ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <select class="form-control" name="jumlah_anak">
                                                <option value="0">-Anak-anak-</option>
                                                <?php for ($i = 1; $i <= $kamar->kapasitas_anak; $i++): ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal / Waktu Check-In</label>
                                    <div class="row">
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                                        </div>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" value="<?php echo date('H:i'); ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group <?php echo form_error('tgl_checkout_estimasi') ? 'has-error' : ''; ?>">
                                    <label>Tanggal / Waktu Check-Out</label>
                                    <div class="row">
                                        <div class="col-xs-7">
                                            <input type="date" class="form-control" name="tgl_checkout_estimasi" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                                        </div>
                                        <div class="col-xs-5">
                                            <input type="time" class="form-control" name="waktu_checkout" value="12:00">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="deposit">Jumlah Deposit (Rp)</label>
                                    <input type="text" class="form-control" name="deposit" id="deposit" placeholder="Jumlah Deposit (Rp)" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Check In</button>
                        <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-warning">Batal</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- MODAL CSS -->

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="mark_addform"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="mark_viewform"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="mark_editform"></div>
        </div>
    </div>
</div>

<!-- END MODAL CSS -->


<!-- <script type="text/javascript">
    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function() {

        table = $('#table').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
            dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"bottom"i>p<"clear">',
            "processing": true,
            "serverSide": true,
            "scrollX": true,

            "ajax": {
                "url": "<?php echo base_url() . $this->uri->segment(1); ?>/ajax_list",
                "type": "POST",
                "error": function(jqXHR, textStatus, errorThrown) {
                    //console.log(textStatus+errorThrown);
                    reload_table();
                },
            },
            "columnDefs": [{
                    "targets": [-1],
                    "orderable": false,
                    "className": "text-center",
                },
                {
                    "targets": [0],
                    "className": "text-center",
                },
            ],
            "lengthMenu": [
                [10, 25, 100, 1000, -1],
                [10, 25, 100, 1000, "All"]
            ],
            "buttons": [{
                extend: 'print',
                text: 'Print',
                autoPrint: true,
                exportOptions: {
                    columns: ':not(:last-child)', // Hanya print kolom yang terlihat
                },
                customize: function(win) {
                    // 1. Atur CSS Dasar untuk Halaman Print
                    $(win.document.body).css('font-family', 'Arial, sans-serif');

                    // 2. Merapikan Judul Laporan (Tengah & Besar)
                    $(win.document.body).find('h1')
                        .css('text-align', 'center')
                        .css('margin-bottom', '20px')
                        .css('font-size', '24px');

                    // 3. Mengambil elemen tabel di halaman print
                    var table = $(win.document.body).find('table');

                    // 4. Styling Tabel (Lebar Penuh & Border Rapi)
                    table
                        .addClass('compact')
                        .css('font-size', '12px')
                        .css('width', '100%')
                        .css('border-collapse', 'collapse'); // Agar garis menyatu

                    // 5. Styling Header Tabel (Background Abu-abu & Tebal)
                    table.find('thead th').css({
                        'background-color': '#f2f2f2', // Warna abu-abu muda
                        'color': '#000',
                        'text-align': 'center',
                        'border': '1px solid #000', // Garis hitam tegas
                        'padding': '8px'
                    });

                    // 6. Styling Isi Tabel (Garis batas tiap sel)
                    table.find('tbody td').css({
                        'border': '1px solid #000',
                        'padding': '6px',
                        'vertical-align': 'middle'
                    });

                    // 7. PERATAAN KOLOM KHUSUS (Meratakan kolom tertentu)
                    // Ingat: nth-child hitungannya mulai dari 1

                    // Kolom 1 (No) -> Tengah
                    table.find('tbody td:nth-child(1)').css('text-align', 'left');

                    // Kolom 2 (ID Barang) -> Tengah
                    table.find('tbody td:nth-child(2)').css('text-align', 'left');

                    // Kolom 5 (Stok) -> Tengah (atau kanan jika mau)
                    table.find('tbody td:nth-child(5)').css('text-align', 'center');

                    // Kolom 6 (Satuan) -> Tengah
                    table.find('tbody td:nth-child(6)').css('text-align', 'center');
                }
            }],
            // Sembunyikan tombol bawaan agar kita bisa pakai tombol custom di atas
        });

        // 3. Hubungkan Tombol HTML Anda dengan fungsi Print DataTables
        $('#btn-print-barang').on('click', function() {
            table.button('.buttons-print').trigger();
        });
    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    /*FUNCTION MODAL*/

    function btn_modal_add() {
        $.ajax({
            url: base_url + "<?php echo $this->uri->segment(1); ?>/modal_add",
            cache: false,
            indicatorId: '#load_ajax',
            beforeSend: function() {
                $('#load_ajax').fadeIn(100);
            },
            success: function(msg) {
                $('#modal_add').modal('show');
                $('#load_ajax').fadeOut(100);
                $("#mark_addform").html(msg);
            }
        });
    }


    function btn_modal_edit(id) {
        $.ajax({
            url: base_url + "<?php echo $this->uri->segment(1); ?>/modal_edit/" + id,
            cache: false,
            indicatorId: '#load_ajax',
            beforeSend: function() {
                $('#load_ajax').fadeIn(100);
            },
            success: function(msg) {
                $('#modal_edit').modal('show');
                $('#load_ajax').fadeOut(100);
                $("#mark_editform").html(msg);
            }
        });
    }

    function btn_modal_delete(id) {
        var r = confirm("Anda Yakin Hapus !");

        if (r == true) {
            btn_save_delete(id);
        } else {
            popup("Batal");
        }
    }

    /*FUNCTION ACTION*/

    function btn_save_add() {
        $('#form_add').validate();
        var isvalid = $("#form_add").valid();
        if (isvalid == false) {
            alert(getvalues("form_add"));
            return false;
        };

        //var art_body = CKEDITOR.instances.editor1.getData();
        var formData = new FormData($('#form_add')[0]);
        //formData.append('tup_nama_kegiatan',art_body);
        /*Ajax Model*/
        $.ajax({
            type: "POST",
            url: base_url + "<?php echo $this->uri->segment(1); ?>/save",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#load_ajax').fadeIn(100);
            },
            success: function(data) {
                $('#modal_add').modal('hide');
                $("#load_ajax").fadeOut(100);
                reload_table();
                popup("Data Tersimpan");
            }
        });
    }

    function btn_save_edit() {
        $('#form_edit').validate();
        var isvalid = $("#form_edit").valid();
        if (isvalid == false) {
            //alert(getvalues("form_add"));
            return false;
        };

        /*Nama Form ID*/
        //var art_body = CKEDITOR.instances.editor2.getData();
        var formData = new FormData($('#form_edit')[0]);
        //formData.append('tup_nama_kegiatan',art_body);
        /*Ajax Model*/
        $.ajax({
            type: "POST",
            url: base_url + "<?php echo $this->uri->segment(1); ?>/edit",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#load_ajax').fadeIn(100);
            },
            success: function(data) {
                $('#modal_edit').modal('hide');
                $("#load_ajax").fadeOut(100);
                reload_table();
                popup("Data Edit Tersimpan");
            }
        });
    }

    function btn_save_delete(id) {
        $.ajax({
            url: base_url + "<?php echo $this->uri->segment(1); ?>/delete/" + id,
            cache: false,
            indicatorId: '#load_ajax',
            beforeSend: function() {
                $('#load_ajax').fadeIn(100);
            },
            success: function(msg) {
                $('#load_ajax').fadeOut(100);
                reload_table();
                popup("Data Terhapus");
            }
        });
    }
</script> -->