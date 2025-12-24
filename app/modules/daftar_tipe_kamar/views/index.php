<script src="<?php echo base_url(); ?>assets/temaalus/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/temaalus/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<div class="content-wrapper" style="min-height: 901px;">

    <section class="content-header">
        <h1>
            <?php echo $title_head; ?>
            <small>Room Reservation</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header" style="background: #3c8dbc; color:white;">
                <div class="col-md-6" style="padding: 1px;">
                </div>
                <div class="button-group pull-right">
                    <?php if ($this->alus_auth->in_group(['admin', 'resepsionist']) || $this->alus_auth->can_add('daftar_booking')): ?>

                        <a href="javascript:" data-toggle="modal" data-target="#modal_add" onClick="btn_modal_add()" class="btn btn-xs btn-default"><i class="fa fa-plus"></i> Tambah <?php echo $title_head; ?></a>
                    <?php endif; ?>
                    <button class="btn btn-xs btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Refresh</button>
                </div>
            </div>
            <div class="box-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th width>Gambar</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th width="100px">Deskripsi</th>
                            <th width>Harga</th>
                            <th width>Kapasitas</th>
                            <th width>Kasur</th>
                            <th width>Size</th>
                            <th width>Status</th>
                            <th width="100px">Tools</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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


<script type="text/javascript">
    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function() {

        table = $('#table').DataTable({
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
                    "targets": [0, 1, 5, 6, 7, 8, 9],
                    "className": "text-center",
                },
            ],
            "lengthMenu": [
                [10, 25, 100, 1000, -1],
                [10, 25, 100, 1000, "All"]
            ],
        });

    });
    // ==== FIX UTAMA: sinkronkan lebar header & isi ====
    function syncTableWidth() {
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).each(function() {
                var dt = $(this).DataTable();
                dt.columns.adjust();

                // Sinkronisasi manual antara header & body
                var $header = $(this).closest('.dataTables_wrapper').find('.dataTables_scrollHeadInner table');
                var $body = $(this).closest('.dataTables_wrapper').find('.dataTables_scrollBody table');
                $header.css('width', $body.outerWidth());
            });
        }, 300);
    }

    // Jalankan di event-event penting
    $('body').on('collapsed.pushMenu expanded.pushMenu', syncTableWidth);
    $(window).on('resize orientationchange', function() {
        clearTimeout(window._resizeTimer);
        window._resizeTimer = setTimeout(syncTableWidth, 1);
    });
    $(window).on('load', syncTableWidth);

    // Setelah data Ajax selesai load
    table.on('draw.dt', function() {
        syncTableWidth();
    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    // =============================
    // Preview image realtime
    // =============================



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

    function btn_modal_view(id) {
        $("#modal_view").modal("show");

        // Tampilkan loading awal
        $("#mark_viewform").html(`
        <div class="text-center" style="padding:20px;">
            <i class="fa fa-spinner fa-spin fa-2x"></i>
            <p>Memuat data...</p>
        </div>
    `);

        // Ambil data dari controller
        $.ajax({
            url: base_url + "<?php echo $this->uri->segment(1); ?>/modal_view/" + id,
            type: "GET",
            dataType: "html",
            success: function(response) {
                $("#mark_viewform").html(response);
            },
            error: function() {
                $("#mark_viewform").html(`
                <div class="modal-body">
                    <p class="text-danger">Gagal memuat data.</p>
                </div>
            `);
            }
        });
    }
</script>