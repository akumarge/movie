<?php
/**
 * Define custom Taxonomy.
 *
 * @package    Movie-Plugin
 * @subpackage Movie-Plugin/includes
 */

/**
 * Class Wp_Movie_Taxonomy
 */
class Wp_Movie_Taxonomy {
	/**
	 * Constructor.
	*/
	public function __construct() {
		
	}
	/*
	 * To create custom texonomies.
	*/
	public function register_movielist_taxonomy() { 

	  	$labels = [
			'name'              => _x( 'Movie list', 'taxonomy general name' ),
			'singular_name'     => _x( 'Movie', 'taxonomy singular name' ),
			'search_items'      =>  __( 'Search Movie list' ),
			'all_items'         => __( 'All Movie list' ),
			'parent_item'       => null,
			'parent_item_colon' => null,
			'edit_item'         => __( 'Edit Movie list' ), 
			'update_item'       => __( 'Update Movie list' ),
			'add_new_item'      => __( 'Add New Movie list' ),
			'new_item_name'     => __( 'New Movie list Name' ),
			'menu_name'         => __( 'Movie list' ),
		 ]; 	

		// Now register the taxonomy

		  register_taxonomy( 'Movie list', 'movies', [
		    'hierarchical'      => false,
		    'labels'            => $labels,
		    'show_ui'           => true,
		    'show_admin_column' => true,
		    'query_var'         => true,
		    'rewrite'           => array( 'slug' => 'movie' ),
		  ] );
	 }
 	/*
	 * To create custom texonomies.
	*/
 	 public function register_director_taxonomy() { 

		  $labels = [
		    'name'              => _x( 'Director list', 'taxonomy general name' ),
		    'singular_name'     => _x( 'Director', 'taxonomy singular name' ),
		    'search_items'      =>  __( 'Search Director' ),
		    'all_items'         => __( 'All Director' ),
		    'parent_item'       => null,
		    'parent_item_colon' => null,
		    'edit_item'         => __( 'Edit Director' ), 
		    'update_item'       => __( 'Update Director' ),
		    'add_new_item'      => __( 'Add New Director' ),
		    'new_item_name'     => __( 'New Director Name' ),
		    'menu_name'         => __( 'Director' ),
		  ]; 	

		// Now register the taxonomy

		  register_taxonomy( 'Director', 'movies', array(
		    'hierarchical' => false,
		    'labels' => $labels,
		    'show_ui' => true,
		    'show_admin_column' => true,
		    'query_var' => true,
		    'rewrite' => array( 'slug' => 'topic' ),
		  ));
	 }
 	/*
	 * To create custom texonomies.
	*/
	 public function register_actor_taxonomy() { 
		  $labels = [
		    'name'              => _x( 'Actor & Actress', 'taxonomy general name' ),
		    'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
		    'search_items'      =>  __( 'Search Actor' ),
		    'all_items'         => __( 'All Actor' ),
		    'parent_item'       => null,
		    'parent_item_colon' => null,
		    'edit_item'         => __( 'Edit Actor' ), 
		    'update_item'       => __( 'Update Actor' ),
		    'add_new_item'      => __( 'Add New Actor' ),
		    'new_item_name'     => __( 'New Actor Name' ),
		    'menu_name'         => __( 'Actor' ),
		  ]; 	

		// Now register the taxonomy

		  register_taxonomy( 'Actor', 'movies', [
		    'hierarchical'      => false,
		    'labels'            => $labels,
		    'show_ui'           => true,
		    'show_admin_column' => true,
		    'query_var'         => true,
		    'rewrite'           => array( 'slug' => 'topic' ),
		  ] );
	 }
	
}