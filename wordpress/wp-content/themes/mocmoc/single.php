<?php
get_header();
get_sidebar();
?>
<section class="section wb">
    <div class="container">
        <?php
        if (have_posts()) {
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