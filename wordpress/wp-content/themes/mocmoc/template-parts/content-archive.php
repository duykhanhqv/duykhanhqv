<div class="blog-box row">
    <div class="col-md-4">

        <div class="post-media">
            <a href="<?php the_permalink(); ?>" title="">

                <img width="210px" height="210px" src="<?= the_post_thumbnail_url() ?>" alt="" class="img-fluid">
                <div class="hovereffect"></div>
            </a>
        </div><!-- end media -->
    </div><!-- end col -->

    <div class="blog-meta big-meta col-md-8">
        <h4><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h4>
        <p><?php the_excerpt(); ?></p>
        <?php $categories = get_the_category();
        if (!empty($categories)) {
            echo '<small><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" title="">' . esc_html($categories[0]->name) . '</a></small>';
        }
        ?>
        <small><a href="" title=""><?php echo get_the_date(); ?></a></small>
        <small><a href="blog-author.html" title="">by <?php the_author() ?></a></small>
    </div><!-- end meta -->
</div><!-- end blog-box -->