<?php
// menu
if (function_exists('register_nav_menu')) {
    register_nav_menus( array( 'primary' => 'Header menu', ) );
    register_nav_menus( array( 'footer_primary' => 'Footer menu primary', ) );
    register_nav_menus( array( 'footer_secondary' => 'Footer menu secondary', ) );
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