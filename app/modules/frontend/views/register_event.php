<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h3>Register: <?= html_escape($event->title) ?></h3>

            <form method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <button class="btn btn-danger btn-block">
                    Submit Registration
                </button>
            </form>

        </div>
    </div>
</div>