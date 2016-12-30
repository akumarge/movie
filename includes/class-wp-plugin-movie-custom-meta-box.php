<?php
/**
 * Define custom meta box.
 *
 * @package    Movie-Plugin
 * @subpackage Movie-Plugin/includes
 */

/**
 * Class Wp_Movie_Meta_Box
 */
class Wp_Movie_Meta_Box {
	/**
	 * Constructor.
	*/
	public function __construct() {
		
	}
	/*
	 * To add custom meta boxes.
	*/
	public function add_movie_custom_meta_box() {
    	add_meta_box( "movie-meta-box", "Movie Meta Box", "custom_meta_box_markup", "movies", "normal", "high", null );
	}
	/*
	 * Template for custom meta boxes.
	*/
	public function custom_meta_box_markup() {
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
	public function save_custom_meta_box( $post_id, $post, $update ) {

	    if ( ! isset($_POST["meta-box-nonce"]) || ! wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__))) {
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
}

