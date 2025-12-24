<style>
    /* Wrapper DataTables biar scroll horizontal aktif kalau overflow */
    .dataTables_wrapper {
        width: 100% !important;
        overflow-x: auto;
    }

    /* Tabel lebar stabil, tapi masih bisa wrap teks */
    table.dataTable {
        width: 100% !important;
        table-layout: auto !important;
        /* GANTI fixed → auto biar teks bisa wrap */
        border-collapse: collapse !important;
    }

    /* Header tabel bergaya AdminLTE */
    .table>thead>tr>th {
        background-color: #ffffffff;
        color: #1f1e1eff;
        text-align: center;
        vertical-align: middle !important;
        white-space: nowrap;
    }

    /* Sel tabel biar teks tidak menumpuk */
    .table td,
    .table th {
        vertical-align: middle !important;
        white-space: normal;
        /* IZINKAN TEKS WRAP */
        word-wrap: break-word;
        /* PUTUSKAN TEKS PANJANG */
        word-break: break-word;
        line-height: 1.4;
    }

    /* Tools button tetap kecil dan sejajar */
    th:last-child,
    td:last-child {
        text-align: center;
        white-space: nowrap;
    }

    /* Pastikan tabel responsif di zoom */
    .table-responsive {
        overflow-x: auto;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
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
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    var table;
    var base_url = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        table = $('#table').DataTable({
            dom: '<"row"<"col-sm-6"l><"col-sm-6"f>>rt<"bottom"i>p<"clear">',
            processing: true,
            serverSide: true,
            scrollX: true,
            autoWidth: false,
            responsive: false, // JANGAN responsive jika pakai scrollX
            ajax: {
                url: "<?php echo base_url() . $this->uri->segment(1); ?>/ajax_list",
                type: "POST"
            },
            columnDefs: [{
                    targets: [-1],
                    orderable: false,
                    className: "text-center"
                },
                {
                    targets: [0, 1, 5, 6, 7, 8, 9],
                    className: "text-center"
                }
            ]
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
    });

    function reload_table() {
        table.ajax.reload(null, false);
    }
</script>