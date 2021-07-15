<?php
get_header();
get_sidebar();
?>
<!-- <div class="page-title wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-shopping-bag bg-red"></i> Food & Drink <small
                        class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small>
                </h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active">Food</li>
                </ol>
            </div>
        </div>
    </div>
</div> -->
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
                        <?php
                        $query = new WP_Query(array('post_type' => 'any'));
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                get_template_part('template-parts/content', 'archive');
                            }
                        }
                        wp_reset_postdata();
                        ?>
                        <hr class="invis">
                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
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
                                        "order"          => "DESC"
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
    </div><!-- end container -->
</section>
<?php
get_footer();