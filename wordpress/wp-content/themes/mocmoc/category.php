<?php
get_header();
get_sidebar();
?>
<div class="page-title wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><?php
                    echo single_cat_title('', false);

                    ?>

                    <small class="hidden-xs-down hidden-sm-down"><?php
                                                                    $term_description = term_description();
                                                                    if (!empty($term_description)) :
                                                                        echo "<br>";
                                                                        echo "<br>";
                                                                        echo  $term_description;
                                                                    endif;
                                                                    ?>
                    </small>
                </h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= get_home_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category</a></li>

                    <li class="breadcrumb-item active"><a
                            href="<?= get_home_url() ?>"><?php echo single_tag_title('', false); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="section wb">
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'archive');
            }
        }
        ?>
    </div><!-- end container -->
</section>
<?php
get_footer();