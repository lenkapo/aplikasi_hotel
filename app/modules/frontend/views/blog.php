<!-- Banner -->
<section class="section-banner">
    <div class="row banner-image" style="background-image:url('<?= base_url("assets/img/hero/hero-section-2.jpg") ?>');">
        <div class="banner-overlay"></div>
        <div class="banner-section">
            <div class="lh-banner-contain">
                <h2>Blog</h2>
                <div class="lh-breadcrumb">
                    <h5>
                        <span class="lh-inner-breadcrumb">
                            <a href="<?= base_url() ?>">Home</a>
                        </span>
                        <span> / </span>
                        <span>
                            <a href="javascript:void(0)">Blog</a>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<div class="section-blog padding-tb-100">
    <div class="container">
        <div class="row">

            <!-- ====================== -->
            <!--        POST LIST       -->
            <!-- ====================== -->
            <div class="col-lg-8">
                <?php foreach ($posts as $p): ?>
                    <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1200">

                        <!-- Thumbnail -->
                        <div class="lh-our-blog-image">
                            <img src="<?= base_url('assets/img/blog/' . $p->thumbnail) ?>" class="w-100">
                            <div class="lh-our-blog-date">
                                <h4><?= date('d', strtotime($p->created_at)) ?></h4>
                                <span><?= strtolower(date('M', strtotime($p->created_at))) ?></span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="lh-our-blog-contain">
                            <div class="lh-our-blog-contain-heading">
                                <h4><?= $p->title ?></h4>
                                <span>By <?= $p->author_name ?> - <?= $p->comment_count ?> Comment</span>
                            </div>

                            <hr>

                            <div class="lh-our-blog-contain-text">
                                <p><?= word_limiter($p->content, 30) ?></p>
                            </div>

                            <div class="lh-our-blog-contain-buttons">
                                <a class="lh-buttons result-placeholder" href="<?= base_url('blog_detail/' . $p->slug) ?>">
                                    View More
                                </a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

            <!-- ====================== -->
            <!--        SIDEBAR         -->
            <!-- ====================== -->
            <div class="col-lg-4 blog-rs">
                                <!-- Search -->
                <div class="lh-our-blog" data-aos="fade-up">
                    <div class="lh-our-blog-serch-box">
                        <form action="<?= base_url('blog/search') ?>" method="get" class="d-flex">
                            <input class="form-conrol" name="q" type="search" placeholder="Search here">
                            <button class="lh-our-blog-button">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Categories -->
                <div class="lh-our-blog" data-aos="fade-up">
                    <div class="lh-our-blog-categories">
                        <div class="lh-our-blog-heading">
                            <h4>Kategori</h4>
                            <hr>
                            <ul>
                                <?php foreach ($categories as $c): ?>
                                    <li>
                                        <a href="<?= base_url('blog/kategori/' . $c->slug) ?>">
                                            <code>*</code>
                                            <p><?= $c->name ?></p>
                                            <span>[<?= $c->post_count ?>]</span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Popular Post -->
                <div class="lh-our-blog" data-aos="fade-up">
                    <div class="lh-our-blog-post">
                        <div class="lh-our-blog-heading">
                            <h4>Popular Post</h4>
                            <hr>

                            <?php foreach ($popular as $pp): ?>
                                <div class="row lh-our-blog-post-pb">
                                    <div class="col-12 lh-our-blog-post-inner">
                                        <img src="<?= base_url('assets/img/blog/' . $pp->thumbnail) ?>">
                                        <div class="lh-our-blog-post-contain">
                                            <span><?= date('M d, Y', strtotime($pp->created_at)) ?></span>
                                            <a href="<?= base_url('blog/detail/' . $pp->slug) ?>">
                                                <?= $pp->title ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>

                <!-- Popular Tags -->
                <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="2000">
                    <div class="lh-our-blog-tages">
                        <div class="lh-our-blog-heading popular-tags">
                            <h4>Popular Tags</h4>
                            <hr>
                            <ul>
                                <?php foreach ($popular_tags as $t): ?>
                                    <li>
                                        <a href="<?= base_url('blog/tag/' . $t->slug) ?>">
                                            #<?= $t->name ?> (<?= $t->tag_count ?>)
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div> <!-- END SIDEBAR -->

        </div>
    </div>
</div>