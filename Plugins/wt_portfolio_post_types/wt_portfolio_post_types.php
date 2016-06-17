<?php
	
/**
 * Plugin Name: WT Portfolio Post Type
 * Plugin URI: http://www.kailasametro.com/wtproject
 * Description: A plugin that adds the Portfolio post type
 * Version: 0.1
 * Author: Gopal Metro
 * Author URI: http://www.kailasametro.com/wtproject
 * License: GPL2
 * Text Domain: wt-portfolio-pt
 */

/*  Copyright Gopal Metro  (email : gopal.metro@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/* BLOCKS DIRECT ACCESS TO FILE BY CHECKING IF THE ABSPATH CONSTANT HAS BEEN SET BY WP */
	defined( 'ABSPATH' ) or die( 'Not so fast.' );

/* ADDS PORTFOLIO POST TYPE */	
	// Creates the Portfolio custom post type
	function wt_portfolio_posttype() {
    	
    	// Defines the Portfolio post type labels
	    $labels = array(
	        'name'               => 'Portfolio',
	        'singular_name'      => 'Project',
	        'menu_name'          => 'Portfolio',
	        'name_admin_bar'     => 'Portfolio',
	        'add_new'            => 'Add New',
	        'add_new_item'       => 'Add New Portfolio Project',
	        'new_item'           => 'New Portfolio Project',
	        'edit_item'          => 'Edit Portfolio Project',
	        'view_item'          => 'View Portfolio Project',
	        'all_items'          => 'All Portfolio Projects',
	        'search_items'       => 'Search Portfolio Projects',
	        'parent_item_colon'  => 'Parent Portfolio Project:',
	        'not_found'          => 'No portfolio project found.',
	        'not_found_in_trash' => 'No portfolio projects found in Trash.',
	    );
	    
	    // Sets the Portfolio post type arguments
	    $args = array(
	        'labels'             => $labels,
	        'public'             => true,
	        'show_in_nav_menus'  => true,
	        'publicly_queryable' => true,
	        'show_ui'            => true,
	        'show_in_menu'       => true,
	        'menu_icon'          => 'dashicons-portfolio',
	        'query_var'          => true,
	        'rewrite'            => array( 'slug' => 'portfolio' ),
	        'capability_type'    => 'post',
	        'has_archive'        => true,
	        'hierarchical'       => false,
	        'menu_position'      => 5,
	        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	        'taxonomies'         => array( 'category', 'post_tag' )
	    );
	    register_post_type( 'portfolio', $args );
	}
	add_action( 'init', 'wt_portfolio_posttype' );
	
	// Flushes the WordPress Permalink Rewrites on plugin activation
	function rewrite_flush() {
	    wt_portfolio_posttype();
	    flush_rewrite_rules();
	}
	register_activation_hook( __FILE__, 'rewrite_flush' );
	

/* ADDS CUSTOM TAXONOMIES */
	function wt_portfolio_taxonomies() {
		
	    // Project Type taxonomy
	    $labels = array(
	        'name'              => 'Project Type',
	        'singular_name'     => 'Project Type',
	        'search_items'      => 'Search Project Types',
	        'all_items'         => 'All Project Types',
	        'parent_item'       => 'Parent Project Type',
	        'parent_item_colon' => 'Parent Project Type:',
	        'edit_item'         => 'Edit Project Type',
	        'update_item'       => 'Update Project Type',
	        'add_new_item'      => 'Add New Project Type',
	        'new_item_name'     => 'New Project Type Name',
	        'menu_name'         => 'Project Type',
	    );
	
	    $args = array(
	        'hierarchical'      => true,
	        'labels'            => $labels,
	        'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'rewrite'           => array( 'slug' => 'project-types' ),
	    );
	
	    register_taxonomy( 'projecttype', array( 'portfolio', 'page', 'post' ), $args ); //no hyphen in 'projecttype' to preserve ease of reading in DOM; this can easily be adjusted to match preferred syntax 
	    
		// Industry taxonomy
	    $labels = array(
	        'name'              => 'Industry',
	        'singular_name'     => 'Industry',
	        'search_items'      => 'Search Industries',
	        'all_items'         => 'All Industries',
	        'parent_item'       => 'Parent Industry',
	        'parent_item_colon' => 'Parent Industry:',
	        'edit_item'         => 'Edit Industry',
	        'update_item'       => 'Update Industry',
	        'add_new_item'      => 'Add New Industry',
	        'new_item_name'     => 'New Industry Name',
	        'menu_name'         => 'Industry',
	    );
	
	    $args = array(
	        'hierarchical'      => true,
	        'labels'            => $labels,
	        'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'rewrite'           => array( 'slug' => 'industry' ),
	    );
	
	    register_taxonomy( 'industry', array( 'portfolio', 'page', 'post' ), $args );
	    
	    // Platform taxonomy
	    $labels = array(
	        'name'              => 'Platform',
	        'singular_name'     => 'Platform',
	        'search_items'      => 'Search Platforms',
	        'all_items'         => 'All Platforms',
	        'parent_item'       => 'Parent Platform',
	        'parent_item_colon' => 'Parent Platform:',
	        'edit_item'         => 'Edit Platform',
	        'update_item'       => 'Update Platform',
	        'add_new_item'      => 'Add New Platform',
	        'new_item_name'     => 'New Platform Name',
	        'menu_name'         => 'Platform',
	    );
	
	    $args = array(
	        'hierarchical'      => true,
	        'labels'            => $labels,
	        'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'rewrite'           => array( 'slug' => 'platform' ),
	    );
	
	    register_taxonomy( 'platform', array( 'portfolio', 'page', 'post' ), $args );
	    
	    // Service taxonomy
	    $labels = array(
	        'name'              => 'Service',
	        'singular_name'     => 'Service',
	        'search_items'      => 'Search Services',
	        'all_items'         => 'All Services',
	        'parent_item'       => 'Parent Service',
	        'parent_item_colon' => 'Parent Service:',
	        'edit_item'         => 'Edit Service',
	        'update_item'       => 'Update Service',
	        'add_new_item'      => 'Add New Service',
	        'new_item_name'     => 'New Service Name',
	        'menu_name'         => 'Service',
	    );
	
	    $args = array(
	        'hierarchical'      => true,
	        'labels'            => $labels,
	        'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'rewrite'           => array( 'slug' => 'service' ),
	    );
	
	    register_taxonomy( 'service', array( 'portfolio', 'page', 'post' ), $args );
	
	}
	
	add_action( 'init', 'wt_portfolio_taxonomies' );
	
/* ADDS PORTFOLIO METABOXES */

	// Portfolio Challenge Meta Box	 
	function wt_register_portfolio_challenge_meta_box() {
		add_meta_box(
			'wt_portfolio_challenge_meta_box', 
			__('Portfolio Challenge', 'wt-portfolio-pt') , 
			'wt_portfolio_challenge_callback', 
			'portfolio',
			'normal',
			'default'
		);
	}
	add_action('add_meta_boxes_portfolio', 'wt_register_portfolio_challenge_meta_box');
	
	// Info to display in meta box
	function wt_portfolio_challenge_callback($post) {
		// Add nonce for security
		wp_nonce_field(basename(__FILE__), 'wt_portfolio_challenge_nonce' );
		
		echo "<p>NOTE: This is a custom TinyMCE editor meta box.  Due to a limitation of this meta box type, this meta box will stop working if you drag it to a new location.  Should this occur, please refresh, save or update the page and the meta box will work again.</p>";
		
		$content = get_post_meta($post->ID, 'wt_portfolio_challenge_wysiwyg_content', true);
		wp_editor(htmlspecialchars_decode($content) , 'wt_portfolio_challenge_wysiwyg_content', array("media_buttons" => true));
	}
	
	// Run validations and save metadata 
	function wt_portfolio_challenge_save_postdata($post_id) {
		// Checks save status and validate nonce
	    $is_autosave = wp_is_post_autosave( $post_id );
	    $is_revision = wp_is_post_revision( $post_id );
	    $is_valid_nonce = (isset($_POST['wt_portfolio_challenge_nonce']) && wp_verify_nonce($_POST['wt_portfolio_challenge_nonce'], basename(__FILE__))) ? 'true' : 'false';
	    
	    // Exits save funciton depending on save status
	    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
	        return;
	    }
	 
	    // Checks for input and sanitizes/saves if needed
	    if( isset($_POST['wt_portfolio_challenge_wysiwyg_content'])) {
	        update_post_meta($post_id, 'wt_portfolio_challenge_wysiwyg_content', wp_kses_post($_POST[ 'wt_portfolio_challenge_wysiwyg_content' ]));
	    }
	    
		if (!empty($_POST['wt_portfolio_challenge_wysiwyg_content'])) {
			$data = wpautop($_POST['wt_portfolio_challenge_wysiwyg_content'], TRUE);
			$data = wp_kses_post($data); //WordPress Data Sanitization
			update_post_meta($post_id, 'wt_portfolio_challenge_wysiwyg_content', $data);
		}
	}
	add_action('save_post', 'wt_portfolio_challenge_save_postdata');
	
	
	
	// Portfolio Solution Meta Box	 
	function wt_register_portfolio_solution_meta_box() {
		add_meta_box(
			'wt_portfolio_solution_meta_box', 
			__('Portfolio Solution', 'wt-portfolio-pt') , 
			'wt_portfolio_solution_callback', 
			'portfolio',
			'normal',
			'default'
		);
	}
	add_action('add_meta_boxes_portfolio', 'wt_register_portfolio_solution_meta_box');
	
	// Info to display in meta box 
	function wt_portfolio_solution_callback($post) {
		// Add nonce for security
		wp_nonce_field(basename(__FILE__), 'wt_portfolio_solution_nonce');
		
		echo "<p>NOTE: This is a custom TinyMCE editor meta box.  Due to a limitation of this meta box type, this meta box will stop working if you drag it to a new location.  Should this occur, please refresh, save or update the page and the meta box will work again.</p>";
		
		$content = get_post_meta($post->ID, 'wt_portfolio_solution_wysiwyg_content', true);
		wp_editor(htmlspecialchars_decode($content) , 'wt_portfolio_solution_wysiwyg_content', array("media_buttons" => true));
	}
	
	// Run validations and save metadata
	function wt_portfolio_solution_save_postdata($post_id) {		
		// Checks save status and validate nonce
	    $is_autosave = wp_is_post_autosave($post_id);
	    $is_revision = wp_is_post_revision($post_id);
	    $is_valid_nonce = (isset( $_POST['wt_portfolio_solution_nonce']) && wp_verify_nonce($_POST['wt_portfolio_solution_nonce'], basename(__FILE__))) ? 'true' : 'false';
	    
	    // Exits script depending on save status
	    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
	        return;
	    }
	    
	    // Checks for input and sanitizes/saves if needed
	    if(isset($_POST['wt_portfolio_solution_wysiwyg_content'])) {
	        update_post_meta($post_id, 'wt_portfolio_solution_wysiwyg_content', wp_kses_post($_POST['wt_portfolio_solution_wysiwyg_content']));
	    }
	    
		if (!empty($_POST['wt_portfolio_solution_wysiwyg_content'])) {
			$data = wpautop($_POST['wt_portfolio_solution_wysiwyg_content'], TRUE); //Preserve paragraph and line break formatting
			$data = wp_kses_post($data); // Sanitize post data
			update_post_meta($post_id, 'wt_portfolio_solution_wysiwyg_content', $data);
		}
	}
	add_action('save_post', 'wt_portfolio_solution_save_postdata');
	
/* 	INCLUDE PORTFOLIO ITEMS ON HOME PAGE */


function my_add_reviews( $query ) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_home() || $query->is_search() ) {
        $query->set( 'post_type', array( 'post', 'portfolio' ) );
        }
    }
}

add_action( 'pre_get_posts', 'my_add_reviews' );
