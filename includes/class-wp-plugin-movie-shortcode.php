<?php

/**
 * Define Short code.
 *
 * @package    Movie-Plugin
 * @subpackage Movie-Plugin/includes
 */

/**
 * Class Wp_Movie_Shortcode
 */
class Wp_Movie_Shortcode {

	/**
	 * Constructor to add shortcode.
	*/
	public function __construct() {
		
		add_shortcode( 'shortcode_movie', array( $this, 'get_movie_details_shortcode' ) );
	}
	/*
	 * To create short code.
	*/
	public function get_movie_details_shortcode( $atts, $content = null) {
		$shortcode_attrs = shortcode_atts( array(

			'id' => get_the_ID(),
			'author_name' => get_the_author_meta( $field = 'nicename', $user_id = false ),

    	), $atts );
    	
    	// Generate short code template.
		$shortcode_template = '<div> <span> Id of the Post : '. esc_attr( $shortcode_attrs['id'] ) .' <span/> <br/> <span> Author : '. esc_attr( $shortcode_attrs['author_name'] ) .'</span></div>';

		return $shortcode_template;
	}	
}

// Global short code.
global $wp_movie_shortcode;

// Creating object for Wp_Movie_Shortcode to invoke constructor
$wp_movie_shortcode = new Wp_Movie_Shortcode();
