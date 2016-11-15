<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://profiles.wordpress.org/ashokkumar24
 * @since      1.0.0
 *
 * @package    Wp_Plugin_Movie
 * @subpackage Wp_Plugin_Movie/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Plugin_Movie
 * @subpackage Wp_Plugin_Movie/includes
 * @author     Ashokkumar <ak90ashok@gmail.com>
 */
class Wp_Plugin_Movie_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-plugin-movie',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
