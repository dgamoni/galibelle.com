<?php

add_action('wp_enqueue_scripts', 'wpt_register_js');
function wpt_register_js()
{
    if (!is_admin()) {

    	wp_enqueue_style( 'normalize-css', get_template_directory_uri() . "/assets/css/normalize.css");
        wp_enqueue_style( 'galibelle-theme-style', get_stylesheet_uri() );
        wp_enqueue_style( 'adaptive-css', get_template_directory_uri() . "/assets/css/adaptive.css");

        // bootstrap
        wp_enqueue_script("tether", get_template_directory_uri() . "/assets/js/tether.min.js",  array(), '', TRUE);
        wp_enqueue_script("bootstrap-js", get_template_directory_uri() . "/assets/js/bootstrap.min.js",  array( 'jquery','tether' ), '4', TRUE);
        wp_enqueue_style("bootstrap-css", get_template_directory_uri() . "/assets/css/bootstrap.min.css");
        wp_enqueue_style("bootstrap-grid-css", get_template_directory_uri() . "/assets/bootstrap-grid.css");
        wp_enqueue_style("bootstrap-reboot-css", get_template_directory_uri() . "/assets/bootstrap-reboot.css");

        // mobil menu
        wp_enqueue_style( 'multilevelmenu-css', get_template_directory_uri() . "/assets/css/mmenu-component.css", null);
		wp_enqueue_script("modernizr-custom-js", get_template_directory_uri() . "/assets/js/mmenu-modernizr-custom.js",  array(), null, TRUE);
        wp_enqueue_script("multilevelmenu-js", get_template_directory_uri() . "/assets/js/mmenu-dlmenu.js",  array( 'jquery'), null, TRUE);

        // custom
        wp_enqueue_script("custom-js", get_template_directory_uri() . "/assets/js/custom.js",  array( 'jquery'), null, TRUE);
    }
}



