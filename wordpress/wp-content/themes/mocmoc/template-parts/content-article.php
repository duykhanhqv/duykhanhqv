<div class="row">
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <div class="page-wrapper">
            <div class="blog-title-area">
                <ol class="breadcrumb hidden-xs-down">
                    <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                    <?php $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<li class="breadcrumb-item"><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a></li>';
                    }
                    ?>
                    <li class="breadcrumb-item active"><?php the_title(); ?>
                    </li>
                </ol>
                <?php $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<span class="color-aqua"><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" title="">
                        ' . esc_html($categories[0]->name) . '
                    </a></span>';
                }
                ?>
                <h3><?php
                    the_title();
                    ?>
                </h3>

                <div class="blog-meta big-meta">
                    <small><a href="single.html" title=""><?php the_date('d F,Y') ?></a></small>
                    <small><a href="blog-author.html" title="">by <?php the_author() ?></a></small>
                    <small><a href="#" title=""><i class="fa fa-eye"></i> <?php
                                                                            $post_views_count = get_post_meta(get_the_ID(), 'post_views_count', true);
                                                                            if (!empty($post_views_count)) {
                                                                                echo $post_views_count;
                                                                            }
                                                                            ?></a></small>
                </div><!-- end meta -->

                <div class="post-sharing">
                    <ul class="list-inline">
                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                <span class="down-mobile">Share on Facebook</span></a></li>
                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                <span class="down-mobile">Tweet on Twitter</span></a></li>
                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div><!-- end post-sharing -->
            </div><!-- end title -->
            <?php
            the_content();
            ?>
            <div class="blog-title-area">
                <div class="tag-cloud-single">
                    <span>Tags</span>
                    <?php
                    the_tags('<small>', '</small><small></small>', '</small>');
                    ?>
                </div><!-- end meta -->
                <div class="post-sharing">
                    <ul class="list-inline">
                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                <span class="down-mobile">Share on Facebook</span></a></li>
                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                <span class="down-mobile">Tweet on Twitter</span></a></li>
                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div><!-- end post-sharing -->
            </div><!-- end title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="<?= get_template_directory_uri() ?>/assets/upload/banner_01.jpg" alt=""
                                class="img-fluid">
                        </div><!-- end banner-img -->
                    </div><!-- end banner -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">

            <div class="custombox prevnextpost clearfix">
                <div class="row">
                    <div class="col-lg-6">
                        <?php $prev_post = get_adjacent_post(false, '', false);
                        if (!empty($prev_post)) {
                            echo '
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="' . get_permalink($prev_post->ID) . '"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between text-right">
                                                <img src="' . get_the_post_thumbnail_url($prev_post->ID) . '"
                                                    alt="" class="img-fluid float-right">
                                            <h5 class="mb-1">' . $prev_post->post_title . '</h5>
                                            <small>Prev Post</small>
                                        </div>
                                        </a>
                                    </div>
                                </div>';
                        } ?>
                    </div><!-- end col -->
                    <div class="col-lg-6">
                        <?php $prev_post = get_adjacent_post(false, '', true);
                        if (!empty($prev_post)) {
                            echo '<div class="blog-list-widget">
                            <div class="list-group">
                                <a href="' . get_permalink($prev_post->ID) . '"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="' . get_the_post_thumbnail_url($prev_post->ID) . '" alt=""
                                    class="img-fluid float-left">
                                    <h5 class="mb-1">' . $prev_post->post_title . '</h5>
                                    <small>Next Post</small>
                                </div>
                                </a>
                            </div>
                        </div>';
                        } ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end author-box -->

            <hr class="invis1">

            <div class="custombox authorbox clearfix">
                <h4 class="small-title">About author</h4>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <img src="<?= get_template_directory_uri() ?>/assets/upload/author.jpg" alt=""
                            class="img-fluid rounded-circle">
                    </div><!-- end col -->

                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <h4><a href="#">Jessica</a></h4>
                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet,
                            consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget,
                            finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop
                            Cloapedia!</p>

                        <div class="topsocial">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
                                    class="fa fa-youtube"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                    class="fa fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i
                                    class="fa fa-link"></i></a>
                        </div><!-- end social -->

                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end author-box -->

            <hr class="invis1">
            <?php $tags = wp_get_post_tags($post->ID);

            if ($tags[0]->count > 2) { ?>
            <div class="custombox clearfix">
                <h4 class="small-title">You may also like</h4>
                <div class="row">
                    <?php
                        $first_tag = $tags[0]->term_id;
                        $args = array(
                            'tag__in' => array($first_tag),
                            'post__not_in' => array($post->ID),
                            'posts_per_page' => 2,
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                get_template_part('template-parts/single/content', 'maybe-like');
                            }
                        }
                        wp_reset_postdata();
                        ?>
                </div><!-- end row -->
            </div><!-- end custom-box -->
            <?php } ?>
            <hr class="invis1">
            <?php comments_template(); ?>

        </div><!-- end page-wrapper -->
    </div><!-- end col -->

    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
        <div class="sidebar">
            <div class="widget">
                <h2 class="widget-title">Search</h2>
                <form class="form-inline search-form" id="searchform" method="get"
                    action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search on the site" name="s"
                            value="<?php echo get_search_query(); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div><!-- end widget -->

            <div class="widget">
                <h2 class="widget-title">Recent Posts</h2>
                <div class="blog-list-widget">
                    <div class="list-group">
                        <h2>Recent Posts</h2>
                        <ul>
                            <?php
                            $recent_args = array(
                                "posts_per_page" => 3,
                                "orderby"        => "date",
                                "order"          => "DESC",
                                'post__not_in' => array($post->ID),

                            );

                            $recent_posts = new WP_Query($recent_args);
                            if ($recent_posts->have_posts()) {
                                while ($recent_posts->have_posts()) {
                                    $recent_posts->the_post();
                                    get_template_part('template-parts/content', 'recentpost');
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                </div><!-- end blog-list -->
            </div><!-- end widget -->

            <div class="widget">
                <h2 class="widget-title">Advertising</h2>
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/upload/banner_03.jpg" alt=""
                            class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end widget -->
            <div class="widget">
                <h2 class="widget-title">Popular Categories</h2>
                <div class="link-widget">

                    <ul>
                        <?php
                        $categories = get_categories();
                        foreach ($categories as $category) {
                            echo '<li><a href="' . get_category_link($category->term_id) . '">' .
                                $category->name . ' <span>(' . $category->count . ')</span></a></li>';
                        }
                        ?>
                    </ul>
                </div><!-- end link-widget -->
            </div><!-- end widget -->
        </div><!-- end sidebar -->
    </div><!-- end col -->
</div><!-- end row -->