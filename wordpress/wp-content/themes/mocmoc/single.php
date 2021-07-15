<?php
get_header();
get_sidebar();
?>
<section class="section wb">
    <div class="container">
        <?php
        if (have_posts()) {
            mocmoc_set_post_views(get_the_ID());
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'article');
            }
        }
        ?>
    </div><!-- end container -->
</section>
<?php
get_footer();