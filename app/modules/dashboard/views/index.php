<style type="text/css">
  thead,
  tbody {
    display: block;
  }

  tbody {
    /* height: 100px; */
    /* Just for the demo          */
    overflow-y: auto;
    /* Trigger vertical scroll    */
    overflow-x: auto;
    /* Hide the horizontal scroll */
  }
</style>
<!-- Full Width Column -->
<div class="content-wrapper" style="min-height: 901px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Admin
      <small>Final</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="alert alert-default alert-dismissible" style="background-color: white;">
      <h4><i class="icon fa fa-check"></i>New Update In Alus Base PHP 7</h4>
    </div>
    <div class="alert alert-default alert-dismissible" style="background-color: white;">
      <h4><i class="icon fa fa-circle"></i> DEVELOPMENT ENVIROMENT BY PC NAME</h4>
      <blockquote>
        <h5>Jangan lupa menambahkan nama PC anda sebagai developer</h5>
        <h5>Nama PC ANDA : <?php echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?></h5>
        <h5>Anda dapat merubahnya di index.php, dengan menambah nama PC tsb.</h5>
        <h5>Jika tidak, maka anda akan berada dalam level production, bukan developer</h5>
      </blockquote>
    </div>
    <div class="alert alert-default alert-dismissible" style="background-color: white;">
      <h4><i class="icon fa fa-circle"></i> Download Crawler</h4>
      <br>
      Format :
      <br>
      <blockquote>
        <p>
          $this->Alus_hmvc->download(<b>Alamat File</b>,<b>RENAME FILE + Ekstensi/FALSE</b>,<b>LOGIN[TRUE/FALSE]</b>)</p>
      </blockquote>
      Contoh :
      <br>
      <blockquote>
        <p>
          <a href="<?php echo $this->Alus_hmvc->download('assets/avatar/avatar_default.png', FALSE, TRUE); ?>" class="btn btn-primary">Download dengan Login</a>
        </p>
        <p>
          <a href="<?php echo $this->Alus_hmvc->download('assets/avatar/avatar_default.png', FALSE, FALSE); ?>" class="btn btn-success">Download Tanpa Login</a>
        </p>
      </blockquote>
      <blockquote>
        <p>
          <small>Jika Ingin Me-Rename File yang akan di download : </small>
          $this->Alus_hmvc->download('assets/avatar/avatar_default.png',<b>'Ini test.png'</b>,TRUE)
        </p>

        <p>
          <small>Tanpa Rename</small>
          $this->Alus_hmvc->download('assets/avatar/avatar_default.png',<b>FALSE</b>,TRUE)
        </p>
      </blockquote>

      <blockquote>
        <p>
          <small>Jika download dengan login terlebih dahulu : </small>
          $this->Alus_hmvc->download('assets/avatar/avatar_default.png','Ini test.png',<b>TRUE</b>)
        </p>

        <p>
          <small>Tanpa Rename dan tanpa login :</small>
          $this->Alus_hmvc->download('assets/avatar/avatar_default.png',FALSE,<b>FALSE</b>)
        </p>
      </blockquote>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div id="show_list" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Pop Up</h3>
      </div>
      <div class="modal-body">
        <table id="table_list" class="table table-bordered">
          <thead style="background-color: #F9F9F9;">
          </thead>
          <tbody id="list_data">
          </tbody>
          <tfoot></tfoot>
        </table>
      </div>
      <div class="modal-footer">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
  $(document).ready(function() {

  });
</script>