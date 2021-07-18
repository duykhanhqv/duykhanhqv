<?php
/*
 * Template Name: Magazine-template
 * Template Post Type: post,magazine
 */


get_header();
get_sidebar();
?>
<section class="section wb">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) {
                mocmoc_set_post_views(get_the_ID());
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', 'article-fullwidth');
                }
            }
            ?>

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php
get_footer();