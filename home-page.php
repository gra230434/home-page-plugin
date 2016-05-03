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
  $function       = 'homepage_setting_page';
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
  register_setting('homepage_setting-group','homepage_setting', 'homepage_setting_options');
}

function homepage_setting_options($input) {
  $input['title'] = sanitize_text_field( $input['title'] );
  $input['post'] = sanitize_text_field( $input['post'] );
}

function homepage_setting_page(){
  ?>
  	<div class="HPS-plugon">
  		<h2>Home page setting</h2>

  		<form method="post" action="options.php">
  			<?php settings_fields( 'homepage_setting-group' ); ?>
  			<?php $homepage_setting = get_option( 'homepage_setting' ); ?>
  			<table class="form-table">
  				<tr valign="top">
  					<th scope="row">Title</th>
  					<td><input type="text" name="homepage_setting[title]" value="<?php echo esc_attr($homepage_setting['title'] ); ?>" /></td>
  				</tr>

  				<tr valign="top">
  					<th scope="row">Post</th>
  					<td><input type="text" name="homepage_setting[post]" value="<?php echo esc_attr($homepage_setting['post'] ); ?>" /></td>
  				</tr>
  			</table>
  			<p class="submit"><input type="submit" class="button-primary" value="Save Changes" /></p>
  		</form>
  	</div>
  <?php
}
