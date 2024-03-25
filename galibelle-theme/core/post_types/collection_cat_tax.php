<?php
// Register Custom Taxonomy
function collection_cat_tax() {

	$labels = array(
		'name'                       => _x( 'Category', '', 'galibelle' ),
		'singular_name'              => _x( 'Category', '', 'galibelle' ),
		'menu_name'                  => __( 'Category', 'galibelle' ),
		'all_items'                  => __( 'All Items', 'galibelle' ),
		'parent_item'                => __( 'Parent Item', 'galibelle' ),
		'parent_item_colon'          => __( 'Parent Item:', 'galibelle' ),
		'new_item_name'              => __( 'New Item Name', 'galibelle' ),
		'add_new_item'               => __( 'Add New Item', 'galibelle' ),
		'edit_item'                  => __( 'Edit Item', 'galibelle' ),
		'update_item'                => __( 'Update Item', 'galibelle' ),
		'view_item'                  => __( 'View Item', 'galibelle' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'galibelle' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'galibelle' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'galibelle' ),
		'popular_items'              => __( 'Popular Items', 'galibelle' ),
		'search_items'               => __( 'Search Items', 'galibelle' ),
		'not_found'                  => __( 'Not Found', 'galibelle' ),
		'no_terms'                   => __( 'No items', 'galibelle' ),
		'items_list'                 => __( 'Items list', 'galibelle' ),
		'items_list_navigation'      => __( 'Items list navigation', 'galibelle' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'collection_cat', array( 'shoes' ), $args );

}
add_action( 'init', 'collection_cat_tax', 0 ); 