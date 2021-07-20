<section class="section first-section">
    <?php
    $args = array(
        'post_type' => array('post'),
        'posts_per_page' => 5,
        'order' => 'DESC',
        'order_by' => 'date'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {

        while ($row = $query->have_posts()) {
            $query->the_post();
            $categories = get_the_category();
            if ($query->current_post == 0) {
    ?>
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <div class="left-side">
                <div class="masonry-box post-media">
                    <img style="height: 352px; object-fit: cover;" src=" <?= get_the_post_thumbnail_url() ?>" alt=""
                        class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-aqua"><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                                        title=""><?php echo $categories[0]->cat_name; ?></a></span>
                                <h4><a href="<?= the_permalink() ?>" title=""><?= the_title() ?></a></h4>
                                <small><a href="single.html" title=""><?= get_the_date('j F, Y') ?></a></small>
                                <small><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="">by
                                        <?= get_the_author() ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end left-side -->
            <?php
                } elseif ($query->current_post == 1) {
                    ?>
            <div class="center-side">
                <div class="masonry-box post-media">
                    <img style="height: 196px; object-fit: cover;" src=" <?= get_the_post_thumbnail_url() ?>" alt=""
                        class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-green"><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                                        title=""><?php echo $categories[0]->cat_name; ?></a></span>
                                <h4><a href="<?= the_permalink() ?>" title=""><?= the_title() ?></a></h4>
                                <small><a href="single.html" title=""><?= get_the_date('j F, Y') ?></a></small>
                                <small><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="">by
                                        <?= get_the_author() ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
                <?php
                    } elseif ($query->current_post == 2) {
                        ?>

                <div class="masonry-box small-box post-media">
                    <img style="height: 146px; object-fit: cover;" src=" <?= get_the_post_thumbnail_url() ?>" alt=""
                        class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-green"><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                                        title=""><?php echo $categories[0]->cat_name; ?></a></span>
                                <h4><a href="<?= the_permalink() ?>" title=""><?= the_title() ?></a></h4>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
                <?php
                    } elseif ($query->current_post == 3) {
                        ?>
                <div class="masonry-box small-box post-media">
                    <img style="height: 146px; object-fit: cover;" src=" <?= get_the_post_thumbnail_url() ?>" alt=""
                        class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-green"><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                                        title=""><?php echo $categories[0]->cat_name; ?></a></span>
                                <h4><a href="<?= the_permalink() ?>" title=""><?= the_title() ?></a></h4>

                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end left-side -->
            <?php
                    } elseif ($query->current_post == 4) {
                    ?>
            <div class="right-side hidden-md-down">
                <div class="masonry-box post-media">
                    <img style="height: 352px; object-fit: cover;" src=" <?= get_the_post_thumbnail_url() ?>" alt=""
                        class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-aqua"><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                                        title=""><?php echo $categories[0]->cat_name; ?></a></span>
                                <h4><a href="<?= the_permalink() ?>" title=""><?= the_title() ?></a></h4>
                                <small><a href="single.html" title=""><?= get_the_date('j F, Y') ?></a></small>
                                <small><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="">by
                                        <?= get_the_author() ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end right-side -->
        </div><!-- end masonry -->
    </div>
</section>
<?php
                    }
                }
            }

?>