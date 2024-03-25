<?php
function gal_get_menu_by_id($menu_id) {
	$menu_items = wp_get_nav_menu_items( $menu_id ); 
	$menu_list = '<ul id="menu-' . $menu_id . '">';
		foreach ( (array) $menu_items as $key => $menu_item ){
			$menu_list .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
		}
	$menu_list .= '</ul>';
	return $menu_list;
}