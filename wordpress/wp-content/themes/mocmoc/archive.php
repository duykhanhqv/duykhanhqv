<?php
get_header();
get_sidebar();
?>
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
                        <?php

                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                get_template_part('template-parts/content', 'archive');
                            }
                        }
                        ?>

                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                <?php echo mocmoc_pagination() ?>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2 class="widget-title">Search</h2>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search on the site">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <?php
                                mocmoc_get_recent_post(get_the_ID());
                                ?>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Advertising</h2>
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="<?= get_template_directory_uri() ?>/assets/upload/banner_03.jpg" alt=""
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
?>