<?php
get_header();
get_sidebar();
?>
<?php
get_template_part('template-parts/except/content', 'slider');

?>
<section class="section">
    <div class="container">
        <div class="row">
            <?php $categories = get_categories();
            $category = get_category_by_slug('cong-nghe');
            if ($category) {
            ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h3 class="color-aqua"><a href="<?= get_category_link($category->term_id)  ?>" title="">Công
                            nghệ</a></h3>
                </div><!-- end title -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                            $args = array(
                                'category_name' => 'cong-nghe',
                                'posts_per_page' => 2,
                                'order' => 'DESC',
                                'order_by' => 'date'

                            );

                            $query = new WP_Query($args);
                            if ($query->have_posts()) {
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    get_template_part('template-parts/except/content', 'technology');
                                }
                            }
                            wp_reset_query();
                            ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
            <?php
            } ?>

            <?php if (get_post_type_archive_link('magazine') != false) { ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h3 class="color-pink"><a href=" <?= get_post_type_archive_link('magazine') ?>"
                            title="">Magazine</a>
                    </h3>
                </div><!-- end title -->
                <div class="row">
                    <?php
                        get_template_part('template-parts/except/content', 'magazine');
                        ?>
                </div>
            </div><!-- end row -->
            <?php } ?>
        </div><!-- end row -->

        <hr class="invis1">

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="<?= get_template_directory_uri() ?>/assets/upload/banner_01.jpg" alt=""
                            class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis1">

        <div class="row">
            <div class="col-lg-9">
                <div class="blog-list clearfix">
                    <div class="section-title">
                        <?php $category = get_category_by_slug('du-lich'); ?>
                        <h3 class="color-green"><a href="<?= get_category_link($category->term_id) ?>" title="">Du
                                Lịch</a>
                        </h3>
                    </div><!-- end title -->

                    <?php
                    $args = array(
                        'category_name' => 'du-lich',
                        'order_by' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 3
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            get_template_part('template-parts/content', 'archive');
                        }
                    }
                    wp_reset_query();
                    ?>

                    <hr class="invis">

                </div><!-- end blog-list -->

                <hr class="invis">

                <div class="blog-list clearfix">
                    <div class="section-title">
                        <?php $thethao = get_category_by_slug('the-thao') ?>
                        <h3 class="color-red"><a href="<?= get_category_link($thethao) ?>" title="">Thể thao</a></h3>
                    </div><!-- end title -->
                    <?php
                    $args = array(
                        'category_name' => 'the-thao',
                        'order_by' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 3
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            get_template_part('template-parts/content', 'archive');
                        }
                    }
                    wp_reset_query();
                    ?>

                </div><!-- end blog-list -->
            </div><!-- end col -->

            <div class="col-lg-3">
                <div class="section-title">
                    <?php $khoahoc = get_category_by_slug('khoa-hoc') ?>
                    <h3 class="color-yellow"><a href="<?= get_category_link($khoahoc) ?>" title="">Khoa học</a></h3>
                </div><!-- end title -->
                <?php
                $args = array(
                    'category_name' => 'khoa-hoc',
                    'order_by' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('template-parts/content', 'archive-mini');
                    }
                }
                wp_reset_query();
                ?>
                <hr class="invis">

                <div class="section-title">
                    <?php $xahoi = get_category_by_slug('xa-hoi') ?>
                    <h3 class="color-yellow"><a href="<?= get_category_link($xahoi) ?>" title="">Xã hội</a></h3>
                </div><!-- end title -->

                <?php
                $args = array(
                    'category_name' => 'xa-hoi',
                    'order_by' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('template-parts/content', 'archive-mini');
                    }
                }
                wp_reset_query();
                ?>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis1">

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="<?= get_template_directory_uri() ?>/assets/upload/banner_02.jpg" alt=""
                            class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php
get_footer();