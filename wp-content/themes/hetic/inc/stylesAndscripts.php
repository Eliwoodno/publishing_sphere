<?php

add_action('wp_enqueue_scripts', 'ajout_css_js');

function ajout_css_js(){
  //get_template_directory_uri() => racine du theme
  wp_register_script('main_script', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'),'1.1', false);
  wp_enqueue_script('main_script');

  wp_register_style( 'main_style', get_template_directory_uri() . '/assets/styles/main.css' );
  wp_enqueue_style( 'main_style' );

}
