<?php
/**
 * Plugin Name: home page edit Plugin
 * Plugin URI: http://www.technologyofkevin.com
 * Description: home page edit by yourself
 * Author: Kevin Wei
 * Version: 1.0
 * Author URI: http://www.technologyofkevin.com
 */

add_action( 'admin_menu', 'homepage_menu' );

function homepage_menu() {

  $page_title     = 'Home page edit';
  $menu_title     = 'Home page';
  $capability     = 'manage_options';
  $menu_slug      = 'homepageedit';
  $function       = 'test';
  $icon_url       = '';
  $position       = 21;

// create home page option menu
  add_menu_page(  $page_title,
                  $menu_title,
                  $capability,
                  $menu_slug,
                  $function,
                  $icon_url,
                  $position  );

// call register setting functio
  add_action( 'admin_init', 'homepage_init');

}

function homepage_init() {
/*
* @since  1.0
* @global $homepage_title, $homepage_post
*         //home list 1
*         $homepage_listONE_title, $homepage_listONE_imgurl, $homepage_listONE_post
*         $homepage_listONE_box1, $homepage_listONE_box2, $homepage_listONE_box3, $homepage_listONE_box4
*         //home list 2
*         $homepage_listTWO_title, $homepage_listTWO_imgurl, $homepage_listTWO_post
*         $homepage_listTWO_box1, $homepage_listTWO_box2
*/
  register_setting('homepage-setting-group','homepage-setting', 'homepage_setting_options')
}

function homepage_setting_options($input) {
  $input['title'] = sanitize_text_field( $input['title'] );
  $input['post'] = sanitize_text_field( $input['post'] );
}

function test(){
        echo 'this is just test';
}
