<?php

add_action('wp_enqueue_scripts', 'ajout_css_js');

function ajout_css_js(){
  //get_template_directory_uri() => racine du theme
  wp_register_script('main_script', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'),'1.1', true);
  wp_enqueue_script('main_script');

  wp_register_script('sponsor_slider_script', get_template_directory_uri() . '/assets/scripts/sponsor_slider.js', array('jquery'),'1.1', true);
  wp_enqueue_script('sponsor_slider_script');

  wp_register_script('responsive_nav_script', get_template_directory_uri() . '/assets/scripts/responsive_nav.js', array('jquery'),'1.1', true);
  wp_enqueue_script('responsive_nav_script');

  wp_register_style( 'main_style', get_template_directory_uri() . '/assets/styles/main.css' );
  wp_enqueue_style( 'main_style' );

  wp_register_style( 'front_page_style', get_template_directory_uri() . '/assets/styles/front_page.css' );
  wp_enqueue_style( 'front_page_style' );

  wp_register_style( 'header_style', get_template_directory_uri() . '/assets/styles/header.css' );
  wp_enqueue_style( 'header_style' );

  wp_register_style( 'footer_style', get_template_directory_uri() . '/assets/styles/footer.css' );
  wp_enqueue_style( 'footer_style' );

  wp_register_style( 'hamburger_style', get_template_directory_uri() . '/assets/styles/hamburger.css' );
  wp_enqueue_style( 'hamburger_style' );

}
