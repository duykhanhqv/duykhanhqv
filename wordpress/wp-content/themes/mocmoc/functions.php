<?php

/*
create function var_dum data
author: khanh moc
*/
function dd($var)
{
    var_dump($var);
}

/*
Register style
*/
add_action('wp_enqueue_scripts', 'mocmoc_register_styles');

function mocmoc_register_styles()
{
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all');
    wp_enqueue_style(
        'front-awesome',
        get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css',
        array(),
        '4.7.0',
        'all'
    );
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('reponseve', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0', 'all');
    wp_enqueue_style('color', get_template_directory_uri() . '/assets/css/colors.css', array(), '1.0', 'all');
}
/*
Register javascript
*/
function mocmoc_register_javascripts()
{
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), ' v1.12.4', true);
    wp_enqueue_script('tether', get_template_directory_uri() . '/assets/js/tether.min.js', array(), '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), 'v4.0.0', true);
    wp_enqueue_script('javascript', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mocmoc_register_javascripts');
/*
custom dynamic theme
*/
function mocmoc_theme_support()
{
    //add dynamic title tag support
    add_theme_support('title-tag');
    // add dynamic logo support
    add_theme_support('custom-logo');
    /*
    register feature image post
    */
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mocmoc_theme_support');
/*
Register Menu
Author Khanhmoc
*/
function mocmoc_menus()
{
    $location = array(
        'primary_menu' => __('Primary Menu', 'primarymenu'),
        'social_menu' => __('Social Menu', 'socialmenu')
    );
    register_nav_menus($location);
}
/*
Add mocmoc_menu hook
*/
add_action('init', 'mocmoc_menus');
/*
*Show menu
* Author khanhmoc
*
*/
function mocmoc_showmenu($position, $bootstraptype = false)
{
    $location = get_nav_menu_locations();
    $temp = '';
    if ($location[$position] != 0) {
        $menu = get_term($location[$position]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);
        foreach ($menu_items as $row) {
            if ($bootstraptype == true) {
                $temp .= '<ul class="navbar-nav">';
                $haschild = false;
                $parent_id = $row->ID;
                foreach ($menu_items as $sub_menu) {
                    if ($sub_menu->menu_item_parent == $parent_id) {
                        $haschild = true;
                        break;
                    }
                }
                if ($haschild) {
                    $temp .= '<li class="nav-item dropdown has-submenu">
        <a class="nav-link dropdown-toggle" href="' . $row->url . '" id="dropdown' . $row->ID . '"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $row->title . '</a>
        <ul class="dropdown-menu" aria-labelledby="dropdown' . $row->ID . '">';
                    foreach ($menu_items as $sub) {
                        if ($sub->menu_item_parent == $parent_id) {
                            $temp .= '<li><a class="dropdown-item" href="' . $sub->url . '">' . $sub->title . '</a></li>';
                        }
                    }
                    $temp .= '</ul>
    </li>';
                } else {
                    if ($row->menu_item_parent == 0) {
                        $temp .= '<li class="nav-item">
        <a class="nav-link color-green-hover" href="' . $row->url . '">' . $row->title . '</a>
    </li>';
                    }
                }
                $temp .= '</ul>';
            } else {
                if ($row->menu_item_parent == 0)
                    $temp .= ' <a href="' . $row->url . '" data-toggle="tooltip">' . $row->title . '</a>';
            }
        }
    } else {
        $temp .= '<a href="' . home_url() . '" class="nav-item nav-link active">Home</a>';
    }
    echo $temp;
}

/*
custom list comment
*/
function mocmoc_custom_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
?>
<div class="media">
    <a class="media-left" href="#">
        <img src="<?php printf(__('%s'), get_avatar_url($comment->comment_ID)) ?>" alt="" class="rounded-circle">
    </a>
    <div class="media-body">

        <h4 class="media-heading user_name"><?php printf(__('%s'), get_comment_author_link()) ?>
            <small><?php printf(__('%s on %s'), get_comment_time(), get_comment_date()) ?></small>
        </h4>

        <?php if ($comment->comment_approved == '0') : ?>
        <em>
            <php _e('Your comment is awaiting moderation.') ?>
        </em><br />
        <?php endif; ?>

        <?php comment_text(); ?>

        <a href="#" class="btn btn-primary btn-sm">Reply</a>
    </div>
</div>
<?php
}
/*
set view post
*/
function mocmoc_set_post_views($postID)
{
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '1');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}
/*
get recent post 

*/
function mocmoc_get_recent_posts()
{
    $args = array(
        'posts_per_page' => 3,
        'orderby' => 'post_date',
        'order' => 'DESC',
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', 'recentpost');
        }
    }
    wp_reset_postdata();
}
/*
get recent post except post has ID

*/
function mocmoc_get_recent_post($postID)
{
    $args = array(
        'post_type' => 'post',
        'post__not_in' => array($postID),
        'posts_per_page' => 3,
        'orderby' => 'post_date',
        'order' => 'DESC',
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', 'recentpost');
        }
    }
    wp_reset_postdata();
}
/*
get popular post
*/
function mocmoc_get_popular_posts()
{
    $args = array(
        'posts_per_page' => 3,
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', 'popularpost');
        }
    }
}