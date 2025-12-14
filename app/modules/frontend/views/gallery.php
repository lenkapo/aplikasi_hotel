<!-- Banner -->
<section class="section-banner">
    <div class="row banner-image"
        style="background-image:url('<?= base_url("assets/img/hero/hero-section-2.jpg") ?>');">

        <div class="banner-overlay"></div>
        <div class="banner-section">
            <div class="lh-banner-contain">
                <h2><?= $title ?></h2>
                <div class="lh-breadcrumb">
                    <h5>
                        <span class="lh-inner-breadcrumb">
                            <a href="<?= base_url(); ?>">Home</a>
                        </span>
                        <span> / </span>
                        <span>
                            <a href="javascript:void(0)"><?= $title ?></a>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Banner -->

<!-- Gallery -->
<section class="section-gallery-2 padding-tb-100">
    <div class="container">
        <div class="row mb-m-24">
            <div class="banner" data-aos="fade-up" data-aos-duration="1500">
                <h2>Latest <span>Gallery</span></h2>
            </div>

            <?php foreach ($all_gallery as $g): ?>
                <div class="col-lg-4">
                    <div class="lh-gallery-second" data-aos="fade-up" data-aos-duration="1500">
                        <div class="magnific-img">
                            <a class="image-popup-vertical-fit gallery-img"
                                href="<?= base_url('assets/img/gallery/' . $g->image) ?>"
                                title="<?= $g->title ?>">

                                <img src="<?= base_url('assets/img/gallery/' . $g->image) ?>"
                                    alt="<?= $g->title ?>">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<!-- End Gallery -->