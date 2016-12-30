<?php
/**
 * Define custom post type.
 *
 * @package    Movie-Plugin
 * @subpackage Movie-Plugin/includes
 */

/**
 * Class Wp_Movie_Cpt
 */
class Wp_Movie_Cpt {
	/**
	 * Constructor.
	*/
	public function __construct() {
		
	}
	/*
	 * To create custom post type.
	*/
	public function movie_create_custom_post_type() {

		register_post_type( 'movies', array(
			'labels' => array(
				'name'               => 'Movies',
				'singular_name'      => 'Movie',
				'add_new'            => 'Add New',
				'add_new_item'       => 'Add New Movie',
				'edit'               => 'Edit',
				'edit_item'          => 'Edit Movie',
				'new_item'           => 'New Movie',
				'view'               => 'View',
				'view_item'          => 'View Movie',
				'search_items'       => 'Search Movie',
				'not_found'          => 'No Movie found',
				'not_found_in_trash' => 'No Movie found in Trash',
			),
			'public'        => true,
			'menu_position' => 5,
		) );

	}	
}

