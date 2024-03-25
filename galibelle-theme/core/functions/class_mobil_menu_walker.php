<?php
/**
* Walkers for mobil menu
*
*/



class MobilMenuWalker extends Walker_Nav_Menu {
    private $column_limit = 4;
    private $show_widget = false;
    private $column_count = 0;
    static $li_count = 0;
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $item_id = $item->ID;
        if ($depth == 0) {
            self::$li_count = 0;
        }
        if ($depth == 0 && in_array("widget", $classes)) {
            $this->show_widget = true;
            $this->column_count++;
        }
        if ($depth == 1 && self::$li_count == 1) {
            $this->column_count++;
        }
        if ($depth == 1 && in_array("break", $classes) && self::$li_count != 1 && $this->column_count < $this->column_limit) {
            $output .= "</ul><ul class=\"dl-submenu\">";
            $this->column_count++;
        }
        $class_names = join(" ", apply_filters("nav_menu_css_class", array_filter($classes), $item)); // set up the classes array to be added as classes to each li
        // $class_names = " class=\"" . esc_attr($class_names) . "\"";

    // dgamoni add social icon
        $facebook = '';
        $instagram ='';
        $regions = '';
        if ( $item->object=='regions') {
            $regions = ' mobilregions';
            $gal_regions_facebook_link = get_field('gal_regions_facebook_link', 'regions_' . $item->object_id);
            $gal_regions_instagram_link = get_field('gal_regions_instagram_link', 'regions_' . $item->object_id);
            if ($gal_regions_facebook_link) {
                $facebook = '<a class="socicon socicon-facebook" href="'.$gal_regions_facebook_link.'"><span class="fb-ico-white topmenu-social-ico"></span></a>';
            }
            if ($gal_regions_instagram_link) {
                $instagram = '<a class="socicon socicon-instagram" href="'.$gal_regions_instagram_link.'"><span class="inst-ico-white topmenu-social-ico"></span></a>';
            }
        }

        if ( $item->title=='_menudivider') {

            $gal_regions_facebook_link = '#';
            $gal_regions_instagram_link = '#';
            if ($gal_regions_facebook_link) {
                $facebook = '<a class="socicon socicon-facebook" href="'.$gal_regions_facebook_link.'"><span class="fb-ico-white topmenu-social-ico"></span></a>';
            }
            if ($gal_regions_instagram_link) {
                $instagram = '<a class="socicon socicon-instagram" href="'.$gal_regions_instagram_link.'"><span class="inst-ico-white topmenu-social-ico"></span></a>';
            }
        }

         $class_names = " class=\"" . esc_attr($class_names) . $regions. "\"";



        $output .= sprintf(
            "<li id=\"menu-item-%s\"%s><a href=\"%s\">%s</a>%s",
            $item_id,
            $class_names,
            $item->url,
            $item->title,
            $facebook.$instagram
        );
        self::$li_count++;
    }
    function start_lvl(&$output, $depth = 0, $args = array()) {
        if ($depth == 0) {
            //$output .= "<section>";
        }
        $output .= "<ul class=\"dl-submenu\">";
    }
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "</ul>";
        if ($depth == 0) {
            if ($this->show_widget) {
                ob_start();
                dynamic_sidebar("Navigation Callout");
                $widget = ob_get_contents();
                ob_end_clean();
                $output .= $widget;
                $this->show_widget = false;
            }
            //$output .= "</section>";
        }
    }
    function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if ($depth == 0 && $this->column_count > 0) {
            $this->column_count = 0;
        }
        $output .= "</li>";
    }
}

// add mega-menu-columns-# classes
function add_column_number($items, $args) {
    static $column_limit = 4;
    static $post_id = 0;
    static $x_key = 0;
    static $column_count = 0;
    static $li_count = 0;
    $tmp = array();
    foreach($items as $key => $item) {
        if (0 == $item->menu_item_parent) {
            $x_key = $key;
            $post_id = $item->ID;
            $column_count = 0;
            $li_count = 0;
            if (in_array("widget", $item->classes, 1)) {
                $column_count++;
            }
        }
        if ($post_id == $item->menu_item_parent) {
            $li_count++;
            if ($column_count < $column_limit && $li_count == 1) {
                $column_count++;
            }
            if (in_array("break", $item->classes, 1) && $li_count > 1 && $column_count < $column_limit) {
                $column_count++;
            }
            $tmp[$x_key] = $column_count;
        }
    }
    foreach($tmp as $key => $value) {
        $items[$key]->classes[] = sprintf("column", $value);
    }
    unset($tmp);
    return $items;
};

// // add the column classes
// add_filter("wp_nav_menu_args", function($args) {
//     if ($args["walker"] instanceof megaMenuWalker) {
//         add_filter("wp_nav_menu_objects", "add_column_number");
//     }
//     return $args;
// });

// // stop the column classes function
// add_filter("wp_nav_menu", function( $nav_menu ) {
//     remove_filter("wp_nav_menu_objects", "add_column_number");
//     return $nav_menu;
// });

