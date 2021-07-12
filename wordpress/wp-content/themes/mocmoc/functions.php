<?php

/*
create function var_dum data
author: khanh moc
*/
function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
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
 register feature image post
 */
add_theme_support('post-thumbnails');