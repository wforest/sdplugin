<?php

/**
 * @package SD Plugin
 */

/*
Plugin Name: SD Plug-in
Plugin URI: https://github.com/wforest/sdplugin
Description: A brief description of the Plugin.
Version: 0.1.0
Author: Bill Sullivan
Author URI: http://www.sullidigital.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: sdplugin
Domain Path: /languages
*/

/* Copyright 2017 Bill Sullivan

SD Plug-in is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

SD Plug-in is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with SD Plug-in. If not, see {URI to Plugin License}.
*/


/**
 * Activate Plug-in
 */
function sdplugin_install()
{
    // trigger our function that registers the custom post type
    location_post_type();

    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'sdplugin_install' );



/**
 * Deactivate Plug-in
 */
function sdplugin_deactivation()
{
    // our post type will be automatically removed, so no need to unregister it

    // clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'sdplugin_deactivation' );


/**
 * Register a custom post type called "location"
 *
 * @see get_post_type_labels() for label keys
 */
function location_post_type() {
    $labels = array(
        'name'                  => _x( 'Locations', 'Post type general name', 'sdplugin' ),
        'singular_name'         => _x( 'Location', 'Post type singular name', 'sdplugin' ),
        'menu_name'             => _x( 'Locations', 'Admin Menu text', 'sdplugin' ),
        'name_admin_bar'        => _x( 'Location', 'PAdd New on Toolbar', 'sdplugin' ),
        'add_new'               => __( 'Add New', 'sdplugin' ),
        'add_new_item'          => __( 'Add New Location', 'sdplugin' ),
        'new_item'              => __( 'New Location', 'sdplugin' ),
        'edit_item'             => __( 'Edit Location', 'sdplugin' ),
        'view_item'             => __( 'View Location', 'sdplugin' ),
        'all_items'             => __( 'All Locations', 'sdplugin' ),
        'search_items'          => __( 'Search Locations', 'sdplugin' ),
        'parent_item_colon'     => __( 'Parent Locations:', 'sdplugin' ),
        'not_found'             => __( 'No locations found.', 'sdplugin' ),
        'not_found_in_trash'    => __( 'No locations found in Trash.', 'sdplugin' ),
        'featured_image'        => _x( 'Location Image', 'sdplugin' ),
        'set_featured_image'    => _x( 'Set location image', 'sdplugin' ),
        'remove_featured_image' => _x( 'Remove location image', 'sdplugin' ),
        'use_featured_image'    => _x( 'Use as location image', 'sdplugin' ),
        'archives'              => _x( 'Location archives', 'sdplugin' ),
        'insert_into_item'      => _x( 'Insert into location', 'sdplugin' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this locations', 'sdplugin' ),
        'filter_items_list'     => _x( 'Filter locations list', 'sdplugin' ),
        'items_list_navigation' => _x( 'Locations list navigation', 'sdplugin' ),
        'items_list'            => _x( 'Locations list', 'sdplugin' ),
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'location' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'menu_icon'             => 'dashicons-location',
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'location', $args );
}
add_action( 'init', 'location_post_type');

/**
 * Register a custom post type called "plan"
 *
 * @see get_post_type_labels() for label keys
 */
function plan_post_type() {
    $labels = array(
        'name'                  => _x( 'Plans', 'Post type general name', 'sdplugin' ),
        'singular_name'         => _x( 'Plan', 'Post type singular name', 'sdplugin' ),
        'menu_name'             => _x( 'Plans', 'Admin Menu text', 'sdplugin' ),
        'name_admin_bar'        => _x( 'Plan', 'Add New on Toolbar', 'sdplugin' ),
        'add_new'               => __( 'Add New', 'sdplugin' ),
        'add_new_item'          => __( 'Add New Plan', 'sdplugin' ),
        'new_item'              => __( 'New Plan', 'sdplugin' ),
        'edit_item'             => __( 'Edit Plan', 'sdplugin' ),
        'view_item'             => __( 'View Plan', 'sdplugin' ),
        'all_items'             => __( 'All Plans', 'sdplugin' ),
        'search_items'          => __( 'Search Plans', 'sdplugin' ),
        'parent_item_colon'     => __( 'Parent Plans:', 'sdplugin' ),
        'not_found'             => __( 'No plans found.', 'sdplugin' ),
        'not_found_in_trash'    => __( 'No plans found in Trash.', 'sdplugin' ),
        'featured_image'        => _x( 'Plan Image', 'sdplugin' ),
        'set_featured_image'    => _x( 'Set plan image', 'sdplugin' ),
        'remove_featured_image' => _x( 'Remove plan image', 'sdplugin' ),
        'use_featured_image'    => _x( 'Use as plan image', 'sdplugin' ),
        'archives'              => _x( 'Plans archives', 'sdplugin' ),
        'insert_into_item'      => _x( 'Insert into plan', 'sdplugin' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this plans', 'sdplugin' ),
        'filter_items_list'     => _x( 'Filter plans list', 'sdplugin' ),
        'items_list_navigation' => _x( 'Plans list navigation', 'sdplugin' ),
        'items_list'            => _x( 'Plans list', 'sdplugin' ),
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'plan' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'menu_icon'             => 'dashicons-portfolio',
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'plan', $args );
}
add_action( 'init', 'plan_post_type');

/**
 * Register a custom post type called "spec"
 *
 * @see get_post_type_labels() for label keys
 */
function spec_post_type() {
    $labels = array(
        'name'                  => _x( 'Specs', 'Post type general name', 'sdplugin' ),
        'singular_name'         => _x( 'Spec', 'Post type singular name', 'sdplugin' ),
        'menu_name'             => _x( 'Specs', 'Admin Menu text', 'sdplugin' ),
        'name_admin_bar'        => _x( 'Spec', 'Add New on Toolbar', 'sdplugin' ),
        'add_new'               => __( 'Add New', 'sdplugin' ),
        'add_new_item'          => __( 'Add New Spec', 'sdplugin' ),
        'new_item'              => __( 'New Spec', 'sdplugin' ),
        'edit_item'             => __( 'Edit Spec', 'sdplugin' ),
        'view_item'             => __( 'View Spec', 'sdplugin' ),
        'all_items'             => __( 'All Specs', 'sdplugin' ),
        'search_items'          => __( 'Search Specs', 'sdplugin' ),
        'parent_item_colon'     => __( 'Parent Specs:', 'sdplugin' ),
        'not_found'             => __( 'No specs found.', 'sdplugin' ),
        'not_found_in_trash'    => __( 'No specs found in Trash.', 'sdplugin' ),
        'featured_image'        => _x( 'Spec Image', 'sdplugin' ),
        'set_featured_image'    => _x( 'Set spec image', 'sdplugin' ),
        'remove_featured_image' => _x( 'Remove spec image', 'sdplugin' ),
        'use_featured_image'    => _x( 'Use as spec image', 'sdplugin' ),
        'archives'              => _x( 'Specs archives', 'sdplugin' ),
        'insert_into_item'      => _x( 'Insert into spec', 'sdplugin' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this specs', 'sdplugin' ),
        'filter_items_list'     => _x( 'Filter specs list', 'sdplugin' ),
        'items_list_navigation' => _x( 'Specs list navigation', 'sdplugin' ),
        'items_list'            => _x( 'Specs list', 'sdplugin' ),
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'plan' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'menu_icon'             => 'dashicons-media-spreadsheet',
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'spec', $args );
}
add_action( 'init', 'spec_post_type');

/**
 * Register a custom post type called "customer"
 *
 * @see get_post_type_labels() for label keys
 */
function customer_post_type() {
    $labels = array(
        'name'                  => _x( 'Customers', 'Post type general name', 'sdplugin' ),
        'singular_name'         => _x( 'Customer', 'Post type singular name', 'sdplugin' ),
        'menu_name'             => _x( 'Customers', 'Admin Menu text', 'sdplugin' ),
        'name_admin_bar'        => _x( 'Customer', 'Add New on Toolbar', 'sdplugin' ),
        'add_new'               => __( 'Add New', 'sdplugin' ),
        'add_new_item'          => __( 'Add New Customer', 'sdplugin' ),
        'new_item'              => __( 'New Customer', 'sdplugin' ),
        'edit_item'             => __( 'Edit Customer', 'sdplugin' ),
        'view_item'             => __( 'View Customer', 'sdplugin' ),
        'all_items'             => __( 'All Customers', 'sdplugin' ),
        'search_items'          => __( 'Search Customers', 'sdplugin' ),
        'parent_item_colon'     => __( 'Parent Customers:', 'sdplugin' ),
        'not_found'             => __( 'No customers found.', 'sdplugin' ),
        'not_found_in_trash'    => __( 'No customers found in Trash.', 'sdplugin' ),
        'featured_image'        => _x( 'Customer Image', 'sdplugin' ),
        'set_featured_image'    => _x( 'Set customer image', 'sdplugin' ),
        'remove_featured_image' => _x( 'Remove customer image', 'sdplugin' ),
        'use_featured_image'    => _x( 'Use as customer image', 'sdplugin' ),
        'archives'              => _x( 'Customers archives', 'sdplugin' ),
        'insert_into_item'      => _x( 'Insert into customer', 'sdplugin' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this customers', 'sdplugin' ),
        'filter_items_list'     => _x( 'Filter customers list', 'sdplugin' ),
        'items_list_navigation' => _x( 'Customers list navigation', 'sdplugin' ),
        'items_list'            => _x( 'Customers list', 'sdplugin' ),
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'customer' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'menu_icon'             => 'dashicons-groups',
        'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'customer', $args );
}
add_action( 'init', 'customer_post_type');

/**
 * Register a 'Product Type' taxonomy for post type 'location'
 *
 * @see register_post_type for registering post types.
 */
function create_product_type_tax() {
    register_taxonomy( 'product type', 'location', array(
        'label'         => __( 'Product Type', 'sdplugin' ),
        'rewrite'       => array( 'slug' => 'locations/product_type' ),
        'hierarchical'  => true,
    ) );
}
add_action( 'init', 'create_product_type_tax', 0 );

/**
 * Register a 'Sales Stage' taxonomy for post type 'location'
 *
 * @see register_post_type for registering post types.
 */
function create_sales_stage_tax() {

    register_taxonomy( 'sales stage', 'location', array(
        'label'         => __( 'Sales Stage', 'sdplugin' ),
        'rewrite'       => array( 'slug' => 'locations/sales_stage' ),
        'hierarchical'  => false,
    ) );
}
add_action( 'init', 'create_sales_stage_tax', 0 );

/**
 * Register a 'Plan Type' taxonomy for post type 'plan'
 *
 * @see register_post_type for registering post types.
 */
function create_plan_type_tax() {
    register_taxonomy( 'plan type', 'plan', array(
        'label'         => __( 'Plan Type', 'sdplugin' ),
        'rewrite'       => array( 'slug' => 'plans/plan_type' ),
        'hierarchical'  => true,
    ) );
}
add_action( 'init', 'create_plan_type_tax', 0 );

/**
 * Register a 'Plan Status' taxonomy for post type 'plan'
 *
 * @see register_post_type for registering post types.
 */
function create_plan_status_tax() {

    register_taxonomy( 'plan status', 'plan', array(
        'label'         => __( 'Plan Status', 'sdplugin' ),
        'rewrite'       => array( 'slug' => 'plans/plan_status' ),
        'hierarchical'  => false,
    ) );
}
add_action( 'init', 'create_plan_status_tax', 0 );

/**
 * Register a 'Plan Status' taxonomy for post type 'plan'
 *
 * @see register_post_type for registering post types.
 */
function create_spec_status_tax() {

    register_taxonomy( 'spec status', 'spec', array(
        'label'         => __( 'Spec Status', 'sdplugin' ),
        'rewrite'       => array( 'slug' => 'specs/spec_status' ),
        'hierarchical'  => false,
    ) );
}
add_action( 'init', 'create_spec_status_tax', 0 );

/**
 * Register a 'Customer Type' taxonomy for post type 'customer'
 *
 * @see register_post_type for registering post types.
 */
function create_customer_type_tax() {
    register_taxonomy( 'customer type', 'customer', array(
        'label'         => __( 'Customer Type', 'sdplugin' ),
        'rewrite'       => array( 'slug' => 'customers/customer_type' ),
        'hierarchical'  => true,
    ) );
}
add_action( 'init', 'create_customer_type_tax', 0 );

/**
 * Register a 'Customer Interests' taxonomy for post type 'customer'
 *
 * @see register_post_type for registering post types.
 */
function create_customer_interests_tax() {

    register_taxonomy( 'customer interests', 'customer', array(
        'label'         => __( 'Customer Interest', 'sdplugin' ),
        'rewrite'       => array( 'slug' => 'customers/customer_interests' ),
        'hierarchical'  => false,
    ) );
}
add_action( 'init', 'create_customer_interests_tax', 0 );