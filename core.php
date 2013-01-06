<?php

function mytheme_open_jigoshop_content_wrappers()
{
  echo '<div class="navbar navbar-fixed-top navbar-subnav"><div class="navbar-inner"><div class="container">';
  if (function_exists('blanq_bootstrap_nav')) {
    blanq_bootstrap_nav(array(
      'theme_location' => 'shop',
      'depth' => 0,
      'container' => false,
      'container_class' => 'navbar',
      'menu_class' => 'nav'
    ));
  }
  echo '<div class="pull-right">';
  // get_search_form();
  echo '</div></div></div></div><div class="container"><div class="row"><div id="primary" class="span12"><div id="content" class="content-area"><div class="row"><div class="span10 offset1">';
}

function mytheme_close_jigoshop_content_wrappers()
{
  echo '</div></div></div></div></div></div>';
}

function mytheme_prepare_jigoshop_wrappers()
{
    remove_action( 'jigoshop_before_main_content', 'jigoshop_output_content_wrapper', 10 );
    remove_action( 'jigoshop_after_main_content', 'jigoshop_output_content_wrapper_end', 10);

    add_action( 'jigoshop_before_main_content', 'mytheme_open_jigoshop_content_wrappers', 10 );
    add_action( 'jigoshop_after_main_content', 'mytheme_close_jigoshop_content_wrappers', 10 );
}
add_action( 'wp_head', 'mytheme_prepare_jigoshop_wrappers' );