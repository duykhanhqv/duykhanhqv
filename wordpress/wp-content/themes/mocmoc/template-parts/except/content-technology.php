<div class="blog-box">
    <div class="post-media">
        <a href="<?php the_permalink(); ?>" title="">
            <img src="<?= the_post_thumbnail_url() ?>" alt="" class="img-fluid">
            <div class="hovereffect">
                <span></span>
            </div><!-- end hover -->
        </a>
    </div><!-- end media -->
    <div class="blog-meta big-meta">
        <h4><a href="<?= get_the_permalink() ?>" title=""><?= the_title() ?></a></h4>
        <p><?= the_excerpt(); ?></p>
        <?php $categories = get_the_category();
        if (!empty($categories)) {
            echo '<small><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" title="">' . esc_html($categories[0]->name) . '</a></small>';
        }
        ?>
        <small><a href="single.html" title=""><?= get_the_date('j F, Y') ?></a></small>
        <small><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" title="">by
                <?= get_the_author() ?></a></small>
    </div><!-- end meta -->
</div><!-- end blog-box -->
<hr class="invis">