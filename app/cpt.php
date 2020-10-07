<?php
// Register Custom Post Type
function cpt_flats() {

	$labels = array(
		'name'                  => _x( 'Mieszkania', 'Post Type General Name', 'apart' ),
		'singular_name'         => _x( 'mieszkanie', 'Post Type Singular Name', 'apart' ),
		'menu_name'             => __( 'Mieszkania', 'apart' ),
		'name_admin_bar'        => __( 'Mieszkania', 'apart' ),
		'archives'              => __( 'Archiwum', 'apart' ),
		'attributes'            => __( 'Atrybuty', 'apart' ),
		'parent_item_colon'     => __( 'Rodzic', 'apart' ),
		'all_items'             => __( 'Wszystkie mieszkania', 'apart' ),
		'add_new_item'          => __( 'Dodaj mieszkanie', 'apart' ),
		'add_new'               => __( 'Dodaj mieszkanie', 'apart' ),
		'new_item'              => __( 'Nowe mieszkanie', 'apart' ),
		'edit_item'             => __( 'Edytuj', 'apart' ),
		'update_item'           => __( 'Aktualizuj', 'apart' ),
		'view_item'             => __( 'Zobacz', 'apart' ),
		'view_items'            => __( '', 'apart' ),
		'search_items'          => __( 'Wyszukaj', 'apart' ),
		'not_found'             => __( 'Nie znaleziono', 'apart' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'apart' ),
		'featured_image'        => __( 'Featured Image', 'apart' ),
		'set_featured_image'    => __( 'Set featured image', 'apart' ),
		'remove_featured_image' => __( 'Remove featured image', 'apart' ),
		'use_featured_image'    => __( 'Use as featured image', 'apart' ),
		'insert_into_item'      => __( 'Insert into item', 'apart' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'apart' ),
		'items_list'            => __( 'Items list', 'apart' ),
		'items_list_navigation' => __( 'Items list navigation', 'apart' ),
		'filter_items_list'     => __( 'Filter items list', 'apart' ),
    );

	$args = array(
		'label'                 => __( 'Mieszkanie', 'apart' ),
		'description'           => __( 'Mieszkania', 'apart' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'custom-fields'),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
        'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
        'has_archive'           => 'false',
        'menu_icon'             => 'dashicons-format-image',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
    register_post_type( 'mieszkanie', $args );
}
add_action( 'init', 'cpt_flats', 0 );


function cpt_build() {
    $labels = array(
		'name'                  => _x( 'Budynki', 'Post Type General Name', 'apart' ),
		'singular_name'         => _x( 'budynek', 'Post Type Singular Name', 'apart' ),
		'menu_name'             => __( 'Budynki', 'apart' ),
		'name_admin_bar'        => __( 'Budynki', 'apart' ),
		'archives'              => __( 'Archiwum', 'apart' ),
		'attributes'            => __( 'Atrybuty', 'apart' ),
		'parent_item_colon'     => __( 'Rodzic', 'apart' ),
		'all_items'             => __( 'Wszystkie budynki', 'apart' ),
		'add_new_item'          => __( 'Dodaj budynek', 'apart' ),
		'add_new'               => __( 'Dodaj budynek', 'apart' ),
		'new_item'              => __( 'Nowe budynek', 'apart' ),
		'edit_item'             => __( 'Edytuj', 'apart' ),
		'update_item'           => __( 'Aktualizuj', 'apart' ),
		'view_item'             => __( 'Zobacz', 'apart' ),
		'view_items'            => __( '', 'apart' ),
		'search_items'          => __( 'Wyszukaj', 'apart' ),
		'not_found'             => __( 'Nie znaleziono', 'apart' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'apart' ),
		'featured_image'        => __( 'Featured Image', 'apart' ),
		'set_featured_image'    => __( 'Set featured image', 'apart' ),
		'remove_featured_image' => __( 'Remove featured image', 'apart' ),
		'use_featured_image'    => __( 'Use as featured image', 'apart' ),
		'insert_into_item'      => __( 'Insert into item', 'apart' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'apart' ),
		'items_list'            => __( 'Items list', 'apart' ),
		'items_list_navigation' => __( 'Items list navigation', 'apart' ),
		'filter_items_list'     => __( 'Filter items list', 'apart' ),
    );

	$args = array(
		'label'                 => __( 'Budynek', 'apart' ),
		'description'           => __( 'Budynki', 'apart' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'custom-fields'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
        'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
        'can_export'            => true,
        'menu_icon'             => 'dashicons-images-alt',
		'has_archive'           => 'false',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
    register_post_type( 'buildings', $args );
}

add_action( 'init', 'cpt_build', 0 );

// Taxonomies
// function taxonomy_localization() {

// 	$labels = array(
// 		'name'                       => _x( 'Lokalizacja', 'Taxonomy General Name', 'apart' ),
// 		'singular_name'              => _x( 'Lokalizacja', 'Taxonomy Singular Name', 'apart' ),
// 		'menu_name'                  => __( 'Lokalizacja', 'apart' ),
// 		'all_items'                  => __( 'Wszystkie', 'apart' ),
// 		'parent_item'                => __( 'Rodzic', 'apart' ),
// 		'parent_item_colon'          => __( 'Rodzic', 'apart' ),
// 		'new_item_name'              => __( 'Dodaj nowy', 'apart' ),
// 		'add_new_item'               => __( 'Dodaj nowy', 'apart' ),
// 		'edit_item'                  => __( 'Edytuj', 'apart' ),
// 		'update_item'                => __( 'Zaktualizuj', 'apart' ),
// 		'view_item'                  => __( 'Zobacz', 'apart' ),
// 		'separate_items_with_commas' => __( 'Separate items with commas', 'apart' ),
// 		'add_or_remove_items'        => __( 'Add or remove items', 'apart' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'apart' ),
// 		'popular_items'              => __( 'Popular Items', 'apart' ),
// 		'search_items'               => __( 'Search Items', 'apart' ),
// 		'not_found'                  => __( 'Not Found', 'apart' ),
// 		'no_terms'                   => __( 'No items', 'apart' ),
// 		'items_list'                 => __( 'Items list', 'apart' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'apart' ),
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 	);
// 	register_taxonomy( 'localization', array( 'mieszkanie' ), $args );

// }
// add_action( 'init', 'taxonomy_localization', 0 );


// ------------------------------

// function taxonomy_building() {

// 	$labels = array(
// 		'name'                       => _x( 'Budynek', 'Taxonomy General Name', 'apart' ),
// 		'singular_name'              => _x( 'Budynek', 'Taxonomy Singular Name', 'apart' ),
// 		'menu_name'                  => __( 'Budynek', 'apart' ),
// 		'all_items'                  => __( 'Wszystkie', 'apart' ),
// 		'parent_item'                => __( 'Rodzic', 'apart' ),
// 		'parent_item_colon'          => __( 'Rodzic', 'apart' ),
// 		'new_item_name'              => __( 'Dodaj nowy', 'apart' ),
// 		'add_new_item'               => __( 'Dodaj nowy', 'apart' ),
// 		'edit_item'                  => __( 'Edytuj', 'apart' ),
// 		'update_item'                => __( 'Zaktualizuj', 'apart' ),
// 		'view_item'                  => __( 'Zobacz', 'apart' ),
// 		'separate_items_with_commas' => __( 'Separate items with commas', 'apart' ),
// 		'add_or_remove_items'        => __( 'Add or remove items', 'apart' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'apart' ),
// 		'popular_items'              => __( 'Popular Items', 'apart' ),
// 		'search_items'               => __( 'Search Items', 'apart' ),
// 		'not_found'                  => __( 'Not Found', 'apart' ),
// 		'no_terms'                   => __( 'No items', 'apart' ),
// 		'items_list'                 => __( 'Items list', 'apart' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'apart' ),
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 	);
// 	register_taxonomy( 'building', array( 'mieszkanie' ), $args );

// }
// add_action( 'init', 'taxonomy_building', 0 );


// function taxonomy_floor() {

// 	$labels = array(
// 		'name'                       => _x( 'Piętro', 'Taxonomy General Name', 'apart' ),
// 		'singular_name'              => _x( 'Piętro', 'Taxonomy Singular Name', 'apart' ),
// 		'menu_name'                  => __( 'Piętro', 'apart' ),
// 		'all_items'                  => __( 'Wszystkie', 'apart' ),
// 		'parent_item'                => __( 'Rodzic', 'apart' ),
// 		'parent_item_colon'          => __( 'Rodzic', 'apart' ),
// 		'new_item_name'              => __( 'Dodaj nowy', 'apart' ),
// 		'add_new_item'               => __( 'Dodaj nowy', 'apart' ),
// 		'edit_item'                  => __( 'Edytuj', 'apart' ),
// 		'update_item'                => __( 'Zaktualizuj', 'apart' ),
// 		'view_item'                  => __( 'Zobacz', 'apart' ),
// 		'separate_items_with_commas' => __( 'Separate items with commas', 'apart' ),
// 		'add_or_remove_items'        => __( 'Add or remove items', 'apart' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'apart' ),
// 		'popular_items'              => __( 'Popular Items', 'apart' ),
// 		'search_items'               => __( 'Search Items', 'apart' ),
// 		'not_found'                  => __( 'Not Found', 'apart' ),
// 		'no_terms'                   => __( 'No items', 'apart' ),
// 		'items_list'                 => __( 'Items list', 'apart' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'apart' ),
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 	);
// 	register_taxonomy( 'floor', array( 'mieszkanie' ), $args );

// }
// add_action( 'init', 'taxonomy_floor', 0 );
