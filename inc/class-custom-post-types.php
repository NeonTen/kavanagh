<?php
/**
 * Register Custom Post Types
 *
 * @package Kavanagh
 */

defined( 'WPINC' ) || exit;

/**
 * Main class of Custom Post Types
 */
class Custom_Post_Types {

	/**
	 * The Construct
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'projects_custom_post_type' ] );
		add_action( 'init', [ $this, 'categories_custom_taxonomy' ] );
	}

	/**
	 * Projects CPT
	 */
	public function projects_custom_post_type() {

		// Set UI labels for Custom Post Type.
		$labels = [
			'name'               => _x( 'Projects', 'Post Type General Name', 'kavanagh' ),
			'singular_name'      => _x( 'Project', 'Post Type Singular Name', 'kavanagh' ),
			'menu_name'          => __( 'Projects', 'kavanagh' ),
			'parent_item_colon'  => __( 'Parent Project', 'kavanagh' ),
			'all_items'          => __( 'All Projects', 'kavanagh' ),
			'view_item'          => __( 'View Project', 'kavanagh' ),
			'add_new_item'       => __( 'Add New Project', 'kavanagh' ),
			'add_new'            => __( 'Add New', 'kavanagh' ),
			'edit_item'          => __( 'Edit Project', 'kavanagh' ),
			'update_item'        => __( 'Update Project', 'kavanagh' ),
			'search_items'       => __( 'Search Project', 'kavanagh' ),
			'not_found'          => __( 'Not Found', 'kavanagh' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'kavanagh' ),
		];

		// Set other options for Custom Post Type.
		$args = [
			'label'               => __( 'Projects', 'kavanagh' ),
			'menu_icon'           => 'dashicons-book',
			'description'         => __( 'Project posts', 'kavanagh' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor.
			'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
			/**
			 * A hierarchical CPT is like Pages and can have
			 * Parent and child items. A non-hierarchical CPT
			 * is like Posts.
			 */
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			// 'show_in_rest'        => true,

		];

		// Registering your Custom Post Type.
		register_post_type( 'project', $args );
	}

	/**
	 * Create a custom taxonomy named 'Categories' for Project CPT.
	 */
	public function categories_custom_taxonomy() {

		$labels = [
			'name'              => _x( 'Categories', 'taxonomy general name', 'sbhi' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'sbhi' ),
			'search_items'      => __( 'Search Categories', 'sbhi' ),
			'all_items'         => __( 'All Categories', 'sbhi' ),
			'parent_item'       => __( 'Parent Category', 'sbhi' ),
			'parent_item_colon' => __( 'Parent Category: ', 'sbhi' ),
			'edit_item'         => __( 'Edit Category', 'sbhi' ), 
			'update_item'       => __( 'Update Category', 'sbhi' ),
			'add_new_item'      => __( 'Add New Category', 'sbhi' ),
			'new_item_name'     => __( 'New Category Name', 'sbhi' ),
			'menu_name'         => __( 'Categories', 'sbhi' ),
		];

		register_taxonomy( 'project_category', [ 'project' ], [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'project_category' ],
			// 'show_in_rest'      => true,
		] );
	}

}

/**
 * Init
 */
new Custom_Post_Types();
