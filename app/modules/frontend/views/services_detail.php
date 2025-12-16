<div class="inn-services in-blog">

    <img src="<?= base_url('uploads/services/' . $service->image); ?>"
        alt="<?= $service->service_name; ?>"
        class="img-responsive mb-3">

    <h3><?= $service->service_name; ?></h3>

    <p>
        <i class="<?= $service->icon; ?>"></i>
        <?= date('F d, Y', strtotime($service->created_at)); ?>
    </p>

    <p><?= $service->description; ?></p>

</div>