<?php
/*
Plugin Name: Blanq Jigoshop
Plugin URI: https://github.com/da-n/blanq-jigoshop
Description: Plug-in component for the Blanq WordPress theme. Improves integration with Jigoshop, "a WordPress eCommerce plugin that works".
Version: 1.0
Author: Daniel Davidson
Author URI: http://github.com/da-n
*/

function _blanq_jigoshop_init() {
  // Creating a custom table
  new scbTable( 'blanq_jigoshop_table', __FILE__, "
    blanq_jigoshop_id int(20),
    blanq_jigoshop varchar(100),
    PRIMARY KEY  (blanq_jigoshop_id)
  ");

  // Creating an options object
  $options = new scbOptions( 'blanq_jigoshop', __FILE__, array(
    'blanq_jigoshop_option_a' => 'foo',
    'blanq_jigoshop_option_b' => 'bar',
  ) );

  // Creating settings page objects
  if ( is_admin() ) {
    require_once( dirname( __FILE__ ) . '/admin.php' );
    new Blanq_Jigoshop_Settings_Page( __FILE__, $options );
  }
  
  // require_once dirname( __FILE__ ) . '/core.php';
}
scb_init( '_blanq_jigoshop_init' );