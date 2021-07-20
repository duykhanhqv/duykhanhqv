<div class="blog-box">
    <div class="post-media">
        <a href="<?php the_permalink(); ?>" title="">
            <img src="<?= the_post_thumbnail_url() ?>" alt="" class="img-fluid">
            <div class="hovereffect">
                <span></span>
            </div>
            <!-- end hover -->
        </a>
    </div>
    <!-- end media -->
    <div class="blog-meta big-meta text-center">

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                        <span class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                        <span class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
        <h4><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h4>
        <?php the_excerpt(); ?>
        <?php $categories = get_the_category();
        if (!empty($categories)) {
            echo '<small><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" title="">' . esc_html($categories[0]->name) . '</a></small>';
        }
        ?> <small><a href="" title=""><?php echo get_the_date(); ?></a></small>
        <small><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="">by
                <?php the_author() ?></a></small>
        <small><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title=""><i class="fa fa-eye"></i> <?php
                                                                                $post_views_count = get_post_meta(get_the_ID(), 'post_views_count', true);
                                                                                if (!empty($post_views_count)) {
                                                                                    echo $post_views_count;
                                                                                }
                                                                                ?></a></small>
    </div><!-- end meta -->
</div><!-- end blog-box -->
<hr class="invis">