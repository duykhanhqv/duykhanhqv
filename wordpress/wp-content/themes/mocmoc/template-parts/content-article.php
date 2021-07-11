<div class="row">
    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <div class="page-wrapper">
            <div class="blog-title-area">
                <ol class="breadcrumb hidden-xs-down">
                    <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active"><?php the_title(); ?>
                    </li>
                </ol>

                <span class="color-aqua"><a href="blog-category-01.html" title="">
                        <?php $category = get_the_category();
                        echo $category[1]->cat_name;
                        ?>
                    </a></span>
                <h3><?php the_title(); ?></h3>

                <div class="blog-meta big-meta">
                    <small><a href="single.html" title=""><?php the_date('d F,Y') ?></a></small>
                    <small><a href="blog-author.html" title="">by <?php the_author() ?></a></small>
                    <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
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
            <?php the_content(); ?>
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
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="single.html"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between text-right">
                                        <img src="<?= get_template_directory_uri() ?>/assets/upload/blog_square_02.jpg"
                                            alt="" class="img-fluid float-right">
                                        <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                        <small>Prev Post</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-6">
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="single.html"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="<?= get_template_directory_uri() ?>/assets/upload/blog_square_03.jpg"
                                            alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Let's make an introduction to the glorious world of
                                            history</h5>
                                        <small>Next Post</small>
                                    </div>
                                </a>
                            </div>
                        </div>
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

            <div class="custombox clearfix">
                <h4 class="small-title">You may also like</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="blog-box">
                            <div class="post-media">
                                <a href="single.html" title="">
                                    <img src="<?= get_template_directory_uri() ?>/assets/upload/menu_06.jpg" alt=""
                                        class="img-fluid">
                                    <div class="hovereffect">
                                        <span class=""></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="single.html" title="">We are guests of ABC Design Studio</a>
                                </h4>
                                <small><a href="blog-category-01.html" title="">Trends</a></small>
                                <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                    </div><!-- end col -->

                    <div class="col-lg-6">
                        <div class="blog-box">
                            <div class="post-media">
                                <a href="single.html" title="">
                                    <img src="<?= get_template_directory_uri() ?>/assets/upload/menu_07.jpg" alt=""
                                        class="img-fluid">
                                    <div class="hovereffect">
                                        <span class=""></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="single.html" title="">Nostalgia at work with family</a></h4>
                                <small><a href="blog-category-01.html" title="">News</a></small>
                                <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end custom-box -->

            <hr class="invis1">
            <?php comments_template(); ?>

        </div><!-- end page-wrapper -->
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
                        <a href="single.html"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="<?= get_template_directory_uri() ?>/assets/upload/blog_square_01.jpg" alt=""
                                    class="img-fluid float-left">
                                <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                <small>12 Jan, 2016</small>
                            </div>
                        </a>

                        <a href="single.html"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="<?= get_template_directory_uri() ?>/assets/upload/blog_square_02.jpg" alt=""
                                    class="img-fluid float-left">
                                <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                <small>11 Jan, 2016</small>
                            </div>
                        </a>

                        <a href="single.html"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 last-item justify-content-between">
                                <img src="<?= get_template_directory_uri() ?>/assets/upload/blog_square_03.jpg" alt=""
                                    class="img-fluid float-left">
                                <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                <small>07 Jan, 2016</small>
                            </div>
                        </a>
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
                <h2 class="widget-title">Instagram Feed</h2>
                <div class="instagram-wrapper clearfix">
                    <a class="" href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_01.jpeg"
                            alt="" class="img-fluid"></a>
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_02.jpeg" alt=""
                            class="img-fluid"></a>
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_03.jpeg" alt=""
                            class="img-fluid"></a>
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_04.jpeg" alt=""
                            class="img-fluid"></a>
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_05.jpeg" alt=""
                            class="img-fluid"></a>
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_06.jpeg" alt=""
                            class="img-fluid"></a>
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_07.jpeg" alt=""
                            class="img-fluid"></a>
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_08.jpeg" alt=""
                            class="img-fluid"></a>
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/assets/upload/insta_09.jpeg" alt=""
                            class="img-fluid"></a>
                </div><!-- end Instagram wrapper -->
            </div><!-- end widget -->

            <div class="widget">
                <h2 class="widget-title">Popular Categories</h2>
                <div class="link-widget">
                    <ul>
                        <li><a href="#">Fahsion <span>(21)</span></a></li>
                        <li><a href="#">Lifestyle <span>(15)</span></a></li>
                        <li><a href="#">Art & Design <span>(31)</span></a></li>
                        <li><a href="#">Health Beauty <span>(22)</span></a></li>
                        <li><a href="#">Clothing <span>(66)</span></a></li>
                        <li><a href="#">Entertaintment <span>(11)</span></a></li>
                        <li><a href="#">Food & Drink <span>(87)</span></a></li>
                    </ul>
                </div><!-- end link-widget -->
            </div><!-- end widget -->

        </div><!-- end sidebar -->
    </div><!-- end col -->
</div><!-- end row -->