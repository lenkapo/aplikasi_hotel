<!-- Banner -->
<section class="section-banner" style="height: 100%;">
    <div class="row banner-image" style="background-image:url('<?= base_url("assets/img/hero/hero-section-2.jpg") ?>'); height: 100%">
        <div class="banner-overlay"></div>
        <div class="banner-section">
            <div class="lh-banner-contain">
                <h2><?= $post->title ?></h2>
                <div class="lh-breadcrumb">
                    <h5>
                        <span class="lh-inner-breadcrumb">
                            <a href="<?= base_url() ?>">Home</a>
                        </span>
                        <span> / </span>
                        <span><?= $post->title ?></span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog-details -->
<section class="section-blog-details padding-tb-100">
    <div class="container">
        <div class="row">

            <!-- =================== MAIN CONTENT =================== -->
            <div class="col-lg-8" style="background-color: #f7f7f7; padding-top: 10px; padding-bottom: 20px; border-radius: 8px;">
                <div class="lh-blog-details" data-aos="fade-up" data-aos-duration="1500">

                    <!-- Thumbnail -->
                    <div class="lh-blog-details-image">
                        <img src="<?= base_url('assets/img/blog/' . $post->thumbnail) ?>" alt="<?= $post->title ?>">
                    </div>

                    <div class="lh-blog-details-contain">
                        <div class="blog-top-details">
                            <span>By <?= $post->author_name ?></span> -
                            <span><?= $post->comment_count ?> Comments</span> -
                            <span><?= date('d M Y', strtotime($post->created_at)) ?></span>
                        </div>

                        <h4 class="lh-blog-details-heding"><?= $post->title ?></h4>

                        <p><?= nl2br($post->content) ?></p>
                    </div>

                    <!-- quote -->
                    <div class="lh-blog-details-quote">
                        <div class="lh-blog-details-quote-image">
                            <img src="<?= base_url('assets/img/testimonials/quotes.svg') ?>" class="svg-img" alt="quotes">
                        </div>
                        <div class="lh-blog-details-quote-side">
                            <p>
                                <?= $quotes ? $quotes->quote : 'No quote available.' ?>
                            </p>
                            <h4><?= $quotes ? $quotes->name : 'No Name available.' ?><span><?= $quotes ? $quotes->posisi : 'No Position available.' ?></span></h4>
                        </div>
                    </div>

                    <div class="lh-blog-text">
                        <p><?= nl2br($post->content) ?></p>
                    </div>

                    <div class="lh-blog-relaxation" data-aos="fade-up" data-aos-duration="1500">
                        <h5 class="lh-blog-details-heding">The True Space For Relaxation</h5>
                        <div class="row">
                            <div class="col-6">
                                <div class="lh-blog-relaxation-image">
                                    <img src="<?= base_url('assets/img/blog/' . $post->thumbnail) ?>" alt="blog-2">
                                </div>
                            </div>
                        </div>
                        <p><?= nl2br($post->content) ?></p>
                        <div class="lh-blog-relaxation-tages">
                            <h4>Topics :</h4>

                            <?php if (!empty($topics)) : ?>
                                <?php foreach ($topics as $topic) : ?>
                                    <span>
                                        <a href="<?= base_url('topic/' . $topic->slug) ?>">
                                            <?= $topic->name ?>
                                        </a>
                                    </span>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <span>No topics available.</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="lh-blog-relaxation-tages">
                        <h4>Tags :</h4>
                        <?php if (!empty($tags)) : ?>
                            <?php foreach ($tags as $t) : ?>
                                <span><a href="<?= base_url('blog/tag/' . $t->slug) ?>">#<?= $t->name ?></a></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- =================== COMMENTS =================== -->
                <div class="ld-blog-replic">
                    <h4 class="lh-blog-details-heding">
                        <?= $post->comment_count ?> Balasan untuk postingan "<?= $post->title ?>"
                    </h4>

                    <?php foreach ($comments as $c): ?>
                        <div class="ld-blog-replic-inner">
                            <div class="ld-blog-replic-contain">
                                <div class="d-flex">
                                    <h4 class="heading">
                                        <?= $c->name ?> <span>- <?= date('d M Y', strtotime($c->created_at)) ?></span>
                                    </h4>
                                    <div class="ld-blog-star">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                </div>
                                <p><?= $c->comment ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <!-- ADD COMMENT -->
                <div class="ld-blog-leave" data-aos="fade-up" data-aos-duration="1500" style="margin-top: 20px;">
                    <h4 class="lh-blog-details-heding">Leave a Reply</h4>
                    <div class="lh-blog-address">
                        <span>Your email address Will not be Published</span>
                    </div>
                    <form action="<?= site_url('frontend/beranda/add_comment'); ?>" method="post">
                        <input type="hidden" name="post_id" value="<?= $post->id ?>">
                        <input type="hidden" name="slug" value="<?= $post->slug ?>">
                        <div class="lh-blog-inner-form-warp">
                            <textarea class="lh-form-control" name="comment" placeholder="Comment"></textarea>
                        </div>
                        <div class="lh-blog-inner-form-warp">
                            <input type="text" name="name" placeholder="Full Name" class="lh-form-control mr-30">
                            <input type="email" name="email" placeholder="Your Email" class="lh-form-control">
                        </div>
                        <div class="lh-contact-touch-inner-form-button">
                            <button class="lh-buttons">Post Comment</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- =================== SIDEBAR =================== -->
            <div class="col-lg-4 blog-rs">

                <!-- Search -->
                <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1500">
                    <div class="lh-our-blog-serch-box">
                        <form action="<?= base_url('blog/search') ?>" method="get">
                            <input class="form-conrol" type="search" name="q" placeholder="Search...">
                            <button class="lh-our-blog-button">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Categories -->
                <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1500">
                    <div class="lh-our-blog-categories">
                        <div class="lh-our-blog-heading">
                            <h4>Categories</h4>
                        </div>
                        <ul>
                            <?php foreach ($categories as $c): ?>
                                <li>
                                    <a href="<?= base_url('blog/category/' . $c->slug) ?>">
                                        <code>*</code>
                                        <p><?= $c->name ?></p>
                                        <span>[<?= $c->post_count ?>]</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Popular Posts -->
                <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1500">
                    <div class="lh-our-blog-post">
                        <div class="lh-our-blog-heading">
                            <h4>Popular Postingan</h4>
                            <?php foreach ($popular as $pp): ?>
                                <div class="row lh-our-blog-post-pb">
                                    <div class="col-12 lh-our-blog-post-inner">
                                        <img src="<?= base_url('uploads/posts/' . $pp->thumbnail) ?>">
                                        <div class="lh-our-blog-post-contain">
                                            <span><?= date('M d, Y', strtotime($pp->created_at)) ?></span>
                                            <a href="<?= base_url('blog_detail/' . $pp->slug) ?>"><?= $pp->title ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="lh-our-blog-tages">
                    <h4>Popular Tags</h4>
                    <div class="lh-our-blog-tages-inner">
                        <ul class="lh-our-blog-tages-inner-element">
                            <?php foreach ($popular_tags as $t): ?>
                                <li><a href="<?= base_url('blog/tag/' . $t->slug) ?>">#<?= $t->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>