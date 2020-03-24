<?php

/**
 * Custom rating widgets
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      3.2.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/cpt
 */


class Rate_My_Post_CPT {

  public function register_crw() {
    $labels = array(
       'name'                  => esc_html__( 'Custom Rating Widgets', 'rate-my-post' ),
       'singular_name'         => esc_html__( 'Custom Rating Widget', 'rate-my-post' ),
       'menu_name'             => esc_html__( 'Custom Rating Widgets', 'rate-my-post' ),
       'name_admin_bar'        => esc_html__( 'Custom Rating Widget', 'rate-my-post' ),
       'add_new'               => esc_html__( 'Add New', 'rate-my-post' ),
       'add_new_item'          => esc_html__( 'Add New Custom Rating Widget', 'rate-my-post' ),
       'new_item'              => esc_html__( 'New Custom Rating Widget', 'rate-my-post' ),
       'edit_item'             => esc_html__( 'Edit Custom Rating Widget', 'rate-my-post' ),
       'view_item'             => esc_html__( 'View Custom Rating Widget', 'rate-my-post' ),
       'all_items'             => esc_html__( 'All Custom Rating Widgets', 'rate-my-post' ),
       'search_items'          => esc_html__( 'Search Custom Rating Widgets', 'rate-my-post' ),
       'not_found'             => esc_html__( 'No custom rating widgets found.', 'rate-my-post' ),
       'not_found_in_trash'    => esc_html__( 'No custom rating widgets found in trash.', 'rate-my-post' ),
       'featured_image'        => esc_html__( 'Schema Image', 'rate-my-post' ),
       'set_featured_image'    => esc_html__( 'Schema Image', 'rate-my-post' ),
       'remove_featured_image' => esc_html__( 'Remove Image for Schema', 'rate-my-post' ),
       'use_featured_image'    => esc_html__( 'Use as Image for Schema', 'rate-my-post' ),
       'archives'              => esc_html__( 'Custom rating widget archives', 'rate-my-post' ),
       'insert_into_item'      => esc_html__( 'Insert into custom rating widget', 'rate-my-post' ),
       'uploaded_to_this_item' => esc_html__( 'Uploaded to this custom rating widget', 'rate-my-post' ),
       'filter_items_list'     => esc_html__( 'Filter custom rating widgets', 'rate-my-post' ),
       'items_list_navigation' => esc_html__( 'Custom Rating Widgets navigation', 'rate-my-post' ),
       'items_list'            => esc_html__( 'Custom rating widgets list', 'rate-my-post' ),
    );

    $args = array(
      'labels'              => $labels,
      'public'              => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => false,
      'show_ui'             => true,
      'show_in_menu'        => false,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => 'ratingwidget' ),
      'capability_type'     => 'post',
      'has_archive'         => false,
      'hierarchical'        => false,
      'menu_position'       => null,
      'supports'            => array( 'title', 'author', 'thumbnail' ),
    );

    register_post_type( 'crw', $args );

  }

}
