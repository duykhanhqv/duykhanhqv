<?php
$args = array(
    'post_type' => 'magazine',
    'posts_per_page' => 4,
    'order' => 'DESC',
    'order_by' => 'date'
);
$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $categories = get_the_category();
        if ($query->current_post == 0) {
?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="blog-box">
        <div class="post-media">
            <a href="<?= the_permalink() ?>" title="">
                <img style=" width:100%;height: 378px; object-fit: cover;" src=" <?= get_the_post_thumbnail_url() ?>"
                    alt="" class="img-fluid">
                <div class="hovereffect">
                    <span></span>
                </div><!-- end hover -->
            </a>
        </div><!-- end media -->
        <div class="blog-meta">
            <h4><a href="<?= the_permalink() ?>" title="">
                    <?= the_title() ?>
                </a></h4>
            <small><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                    title=""><?php echo $categories[0]->cat_name; ?></a></small>
            <small><a href="blog-category-01.html" title=""><?= the_date('j F, Y') ?></a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->
    <?php
        } elseif ($query->current_post == 1) {
            ?>
    <div class="blog-box">
        <div class="post-media">
            <a href="<?= the_permalink() ?>" title="">
                <img style=" width:100%;height: 378px; object-fit: cover;" src="<?= get_the_post_thumbnail_url() ?>"
                    alt="" class="img-fluid">
                <div class="hovereffect">
                    <span></span>
                </div><!-- end hover -->
            </a>
        </div><!-- end media -->
        <div class="blog-meta">
            <h4><a href="<?= the_permalink() ?>" title=""> <?= the_title() ?></a></h4>
            <small><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                    title=""><?php echo $categories[0]->cat_name; ?></a></small>
            <small><a href="blog-category-01.html" title=""><?= get_the_date('j F, Y') ?></a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->
</div><!-- end col -->
<?php
        } elseif ($query->current_post == 2) {
        ?>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="blog-box">
        <div class="post-media">
            <a href="<?= the_permalink() ?>" title="">
                <img style=" width:100%;height: 378px; object-fit: cover;" src="<?= get_the_post_thumbnail_url() ?>"
                    alt="" class="img-fluid">
                <div class="hovereffect">
                    <span></span>
                </div><!-- end hover -->
            </a>
        </div><!-- end media -->
        <div class="blog-meta">
            <h4><a href="<?= the_permalink() ?>" title="">
                    <?= the_title() ?>
                </a></h4>
            <small><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                    title=""><?php echo $categories[0]->cat_name; ?></a></small>
            <small><a href="blog-category-01.html" title=""><?= get_the_date('j F, Y') ?></a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->
    <?php
        } elseif ($query->current_post == 3) {
            ?>
    <div class="blog-box">
        <div class="post-media">
            <a href="<?= the_permalink() ?>" title="">
                <img style=" width:100%;height: 378px; object-fit: cover;" src="<?= get_the_post_thumbnail_url() ?>"
                    alt="" class="img-fluid">
                <div class="hovereffect">
                    <span></span>
                </div><!-- end hover -->
            </a>
        </div><!-- end media -->
        <div class="blog-meta">
            <h4><a href="<?= the_permalink() ?>" title=""> <?= the_title() ?></a></h4>
            <small><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                    title=""><?php echo $categories[0]->cat_name; ?></a></small>
            <small><a href="blog-category-01.html" title=""><?= get_the_date('j F, Y') ?></a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->
</div><!-- end col -->
<?php
        }
    }
    wp_reset_postdata();
}