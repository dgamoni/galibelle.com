<?php
// menu
if (function_exists('register_nav_menu')) {
    register_nav_menus( array( 'top_heder' => 'Top header menu', ) );
    register_nav_menus( array( 'primary' => 'Header menu', ) );
    register_nav_menus( array( 'footer_primary' => 'Footer menu primary', ) );
    register_nav_menus( array( 'footer_secondary' => 'Footer menu secondary', ) );
    register_nav_menus( array( 'mobil' => 'Mobil menu', ) );
}

// widget custom menu +social icon 
add_action( 'widgets_init', 'custom_menu_widget' );
function custom_menu_widget() {
    register_widget('WP_Nav_Menu_Widget_social');
}

// megamenu settings 
function megamenu_add_theme_galibelle_menu_1471848200($themes) {
    $themes["galibelle_menu_1471848200"] = array(
        'title' => 'galibelle menu',
        'container_background_from' => 'rgb(247, 195, 41)',
        'container_background_to' => 'rgb(247, 195, 41)',
        'menu_item_align' => 'right',
        'menu_item_background_hover_from' => 'rgb(255, 211, 81)',
        'menu_item_background_hover_to' => 'rgb(255, 211, 81)',
        'menu_item_link_height' => '127px',
        'menu_item_link_text_transform' => 'uppercase',
        'menu_item_link_padding_left' => '25px',
        'menu_item_link_padding_right' => '25px',
        'panel_header_border_color' => '#555',
        'panel_font_size' => '14px',
        'panel_font_color' => '#666',
        'panel_font_family' => 'inherit',
        'panel_second_level_font_color' => '#555',
        'panel_second_level_font_color_hover' => '#555',
        'panel_second_level_text_transform' => 'uppercase',
        'panel_second_level_font' => 'inherit',
        'panel_second_level_font_size' => '16px',
        'panel_second_level_font_weight' => 'bold',
        'panel_second_level_font_weight_hover' => 'bold',
        'panel_second_level_text_decoration' => 'none',
        'panel_second_level_text_decoration_hover' => 'none',
        'panel_second_level_border_color' => '#555',
        'panel_third_level_font_color' => '#666',
        'panel_third_level_font_color_hover' => '#666',
        'panel_third_level_font' => 'inherit',
        'panel_third_level_font_size' => '14px',
        'flyout_link_size' => '14px',
        'flyout_link_color' => '#666',
        'flyout_link_color_hover' => '#666',
        'flyout_link_family' => 'inherit',
        'responsive_breakpoint' => '0px',
        'toggle_background_from' => '#222',
        'toggle_background_to' => '#222',
        'toggle_font_color' => '#ffffff',
        'mobile_background_from' => '#222',
        'mobile_background_to' => '#222',
        'disable_mobile_toggle' => 'on',
        'custom_css' => '/** Push menu onto new line **/
#{$wrap} {
    clear: both;
}',
    );
    return $themes;
}
//add_filter("megamenu_themes", "megamenu_add_theme_galibelle_menu_1471848200");

// mega menu settings + submenu
function megamenu_add_theme_galibelle_menu_1472578695($themes) {
    $themes["galibelle_menu_1472578695"] = array(
        'title' => 'galibelle menu',
        'container_background_from' => 'rgb(247, 195, 41)',
        'container_background_to' => 'rgb(247, 195, 41)',
        'menu_item_align' => 'right',
        'menu_item_background_hover_from' => 'rgb(255, 211, 81)',
        'menu_item_background_hover_to' => 'rgb(255, 211, 81)',
        'menu_item_link_height' => '127px',
        'menu_item_link_text_transform' => 'uppercase',
        'menu_item_link_padding_left' => '25px',
        'menu_item_link_padding_right' => '25px',
        'panel_background_from' => 'rgb(255, 211, 81)',
        'panel_background_to' => 'rgb(255, 211, 81)',
        'panel_width' => '#header',
        'panel_inner_width' => '.container',
        'panel_header_color' => 'rgb(237, 90, 46)',
        'panel_header_font_size' => '13px',
        'panel_header_padding_bottom' => '20px',
        'panel_header_padding_left' => '40px',
        'panel_header_border_color' => '#555',
        'panel_padding_top' => '25px',
        'panel_padding_bottom' => '25px',
        'panel_font_size' => '13px',
        'panel_font_color' => 'rgb(255, 255, 255)',
        'panel_font_family' => 'inherit',
        'panel_second_level_font_color' => 'rgb(255, 255, 255)',
        'panel_second_level_font_color_hover' => '#555',
        'panel_second_level_text_transform' => 'capitalize',
        'panel_second_level_font' => 'inherit',
        'panel_second_level_font_size' => '13px',
        'panel_second_level_font_weight' => 'normal',
        'panel_second_level_font_weight_hover' => 'bold',
        'panel_second_level_text_decoration' => 'none',
        'panel_second_level_text_decoration_hover' => 'none',
        'panel_second_level_border_color' => '#555',
        'panel_third_level_font_color' => '#666',
        'panel_third_level_font_color_hover' => '#666',
        'panel_third_level_font' => 'inherit',
        'panel_third_level_font_size' => '14px',
        'flyout_link_size' => '14px',
        'flyout_link_color' => '#666',
        'flyout_link_color_hover' => '#666',
        'flyout_link_family' => 'inherit',
        'responsive_breakpoint' => '0px',
        'toggle_background_from' => '#222',
        'toggle_background_to' => '#222',
        'toggle_font_color' => '#ffffff',
        'mobile_background_from' => '#222',
        'mobile_background_to' => '#222',
        'disable_mobile_toggle' => 'on',
        'custom_css' => '/** Push menu onto new line **/
#{$wrap} {
    clear: both;
}',
    );
    return $themes;
}
//add_filter("megamenu_themes", "megamenu_add_theme_galibelle_menu_1472578695");