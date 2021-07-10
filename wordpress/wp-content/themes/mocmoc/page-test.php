<?php
// $location =  get_nav_menu_locations();
// print_r("moc");
$position = 'primary_menu';
$bootstraptype= true;
$location =  get_nav_menu_locations(); 
$temp = '';
if ($location[$position] != 0) {
    $menu = get_term($location[$position]);
    $temp.= '<ul class="navbar-nav">';
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    foreach ($menu_items as $row) {
        if ($bootstraptype == true) {
            $haschild = false;
            $parent_id = $row->ID;
            foreach ($menu_items as $sub_menu) {
                if ($sub_menu->menu_item_parent == $parent_id) {
                    $haschild = true;
                    break;
                }
            }
            if ($haschild) {
                $temp .='<li class="nav-item dropdown has-submenu">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">' . $row->title . '</a><ul class="dropdown-menu" aria-labelledby="dropdown' . $row->ID . '">';
                foreach ($menu_items as $sub) {
                    if ($sub->menu_item_parent == $parent_id) {
                        $temp .= '<li><a class="dropdown-item" href="blog-author.html">' . $sub->title . '</a></li>';
                    }
                }
                $temp .= '</ul>
                </li>';
            } else {
                if ($row->menu_item_parent == 0) {
                    $temp.='<li class="nav-item">
                    <a class="nav-link color-pink-hover" href="' . $row->url . '">' . $row->title . '</a>
                </li>';
                }
            }
        } else {
            if ($row->menu_item_parent == 0)

                $temp .= ' <a href="' . $row->url . '">' . $row->title . '</a>';
        }
    }
}
else {
    $temp .= '<a href="' . home_url() . '" class="nav-item nav-link active">Home</a>';
}
$temp .= '</ul>';
echo $temp;

dd(wp_head());

?>