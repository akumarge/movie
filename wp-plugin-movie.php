<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/ashokkumar24
 * @since             1.0.0
 * @package           Wp_Plugin_Movie
 *
 * @wordpress-plugin
 * Plugin Name:       wordpress-movie
 * Plugin URI:        https://github.com/akumarge/movie
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ashokkumar
 * Author URI:        https://profiles.wordpress.org/ashokkumar24
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-plugin-movie
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-plugin-movie-activator.php
 */
function activate_wp_plugin_movie() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-plugin-movie-activator.php';
	Wp_Plugin_Movie_Activator::activate();

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-plugin-movie-deactivator.php
 */
function deactivate_wp_plugin_movie() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-plugin-movie-deactivator.php';
	Wp_Plugin_Movie_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_plugin_movie' );
register_deactivation_hook( __FILE__, 'deactivate_wp_plugin_movie' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-plugin-movie.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-plugin-movie-shortcode.php';
//require plugin_dir_path( __FILE__ ) . 'includes/class-wp-plugin-movie-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_plugin_movie() {

	$plugin = new Wp_Plugin_Movie();
	$plugin->run();

}
run_wp_plugin_movie();

/*
 * To add custom meta boxes.
*/
function add_movie_custom_meta_box() {
    add_meta_box( "movie-meta-box", "Movie Meta Box", "custom_meta_box_markup", "movies", "normal", "high", null );
}

add_action( "add_meta_boxes", "add_movie_custom_meta_box" );

/*
 * Template for custom meta boxes.
*/
function custom_meta_box_markup() {
      wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="meta-box-text-director">Director Name</label>
            <input name="meta-box-text-director" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-text-director", true); ?>">
        </div>
        <div>
            <label for="meta-box-text-actor">Actor Name</label>    
            <input name="meta-box-text-actor" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-text-actor", true); ?>">
        </div>
        <div>
            <label for="meta-box-text-actress">Actress Name</label>
            <input name="meta-box-text-actress" type="text" value="<?php echo get_post_meta($object->ID, "meta-box-text-actress", true); ?>">
        </div>

   <?php         
}

/*
 * Save custom meta boxes .
*/
function save_custom_meta_box( $post_id, $post, $update ) {

    if ( ! isset($_POST["meta-box-nonce"] ) || ! wp_verify_nonce($_POST["meta-box-nonce"], basename( __FILE__ ) ) ) {

        return $post_id;
    }

    if( ! current_user_can( "edit_post", $post_id)) {
        
        return $post_id;
    }

    $slug = "movies";
    if( $slug != $post->post_type ) {

        return $post_id;
    }


    $meta_box_director_value = "";
    $meta_box_actor_value    = "";
    $meta_box_actress_value  = "";


    if( isset( $_POST["meta-box-text-director"] ) ) {
        $meta_box_director_value = $_POST["meta-box-text-director"];
    }   
    update_post_meta( $post_id, "meta-box-text-director", $meta_box_director_value );

    if( isset( $_POST["meta-box-text-actor"] ) ) {
        $meta_box_actor_value = $_POST["meta-box-text-actor"];
    }   
    update_post_meta( $post_id, "meta-box-text-actor",  $meta_box_actor_value );

    if( isset( $_POST["meta-box-text-actress"] ) ) {
        $meta_box_actress_value = $_POST["meta-box-text-actress"];
    }   
    update_post_meta( $post_id, "meta-box-text-actress", $meta_box_actress_value );

}

add_action( "save_post", "save_custom_meta_box", 10, 3 );
