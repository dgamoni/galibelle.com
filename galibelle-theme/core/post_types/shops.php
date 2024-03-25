<?php
// Register Custom Post Type
function shops_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Shops', '', 'galibelle' ),
		'singular_name'         => _x( 'Shops', '', 'galibelle' ),
		'menu_name'             => __( 'Shops', 'galibelle' ),
		'name_admin_bar'        => __( 'Shops', 'galibelle' ),
		'archives'              => __( 'Item Archives', 'galibelle' ),
		'parent_item_colon'     => __( 'Parent Item:', 'galibelle' ),
		'all_items'             => __( 'All Items', 'galibelle' ),
		'add_new_item'          => __( 'Add New Item', 'galibelle' ),
		'add_new'               => __( 'Add New', 'galibelle' ),
		'new_item'              => __( 'New Item', 'galibelle' ),
		'edit_item'             => __( 'Edit Item', 'galibelle' ),
		'update_item'           => __( 'Update Item', 'galibelle' ),
		'view_item'             => __( 'View Item', 'galibelle' ),
		'search_items'          => __( 'Search Item', 'galibelle' ),
		'not_found'             => __( 'Not found', 'galibelle' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'galibelle' ),
		'featured_image'        => __( 'Featured Image', 'galibelle' ),
		'set_featured_image'    => __( 'Set featured image', 'galibelle' ),
		'remove_featured_image' => __( 'Remove featured image', 'galibelle' ),
		'use_featured_image'    => __( 'Use as featured image', 'galibelle' ),
		'insert_into_item'      => __( 'Insert into item', 'galibelle' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'galibelle' ),
		'items_list'            => __( 'Items list', 'galibelle' ),
		'items_list_navigation' => __( 'Items list navigation', 'galibelle' ),
		'filter_items_list'     => __( 'Filter items list', 'galibelle' ),
	);
	$args = array(
		'label'                 => __( 'Shops', 'galibelle' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'taxonomies'            => array( 'regions' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'shops', $args );

}
add_action( 'init', 'shops_custom_post_type', 0 ); 