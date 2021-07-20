<div class="blog-box">
    <div class="post-media">
        <a href="single.html" title="">
            <img src="<?= the_post_thumbnail_url() ?>" alt="" class="img-fluid">
            <div class="hovereffect">
                <span></span>
            </div><!-- end hover -->
        </a>
    </div><!-- end media -->
    <div class="blog-meta">
        <h4><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h4>
        <?php $categories = get_the_category();
        if (!empty($categories)) {
            echo '<small><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" title="">' . esc_html($categories[0]->name) . '</a></small>';
        }
        ?>
        <small><a href="" title=""><?php echo get_the_date(); ?></a></small>
    </div><!-- end meta -->
</div><!-- end blog-box -->

<hr class="invis">