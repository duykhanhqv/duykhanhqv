<div class="col-lg-6">
    <div class="blog-box">
        <div class="post-media">
            <a href="single.html" title="">
                <img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="img-fluid">
                <div class="hovereffect">
                    <span class=""></span>
                </div><!-- end hover -->
            </a>
        </div><!-- end media -->
        <div class="blog-meta">
            <h4><a href="single.html" title=""><?= the_title(); ?></a></h4>
            <small>
                <?php $categories = get_the_category(); ?><a href="<?= get_category_link($categories[0]->term_id)  ?>"
                    title=""><?php echo $categories[0]->cat_name; ?></a>
            </small>
            <small><a href="blog-category-01.html" title=""><?= get_the_date('j F, Y'); ?></a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->
</div><!-- end col -->