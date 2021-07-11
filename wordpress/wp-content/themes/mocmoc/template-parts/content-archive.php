<div class="blog-box row">
    <div class="col-md-4">
        <div class="post-media">
            <a href="single.html" title="">
                <?php echo the_post_thumbnail_url() ?>
                <img src="upload/blog_square_05.jpg" alt="" class="img-fluid">
                <div class="hovereffect"></div>
            </a>
        </div><!-- end media -->
    </div><!-- end col -->

    <div class="blog-meta big-meta col-md-8">
        <h4><a href="single.html" title=""><?php the_title(); ?></a></h4>
        <p><?php the_excerpt(); ?></p>
        <small><a href="blog-category-01.html" title=""><?php the_category(1); ?></a></small>
        <small><a href="single.html" title=""><?php the_date() ?></a></small>
        <small><a href="blog-author.html" title="">by <?php the_author() ?></a></small>
    </div><!-- end meta -->
</div><!-- end blog-box -->