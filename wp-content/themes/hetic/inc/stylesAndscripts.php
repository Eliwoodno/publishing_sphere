<?php

add_action('wp_enqueue_scripts', 'ajout_css_js');

function ajout_css_js(){
  //get_template_directory_uri() => racine du theme
  wp_register_script('main_script', get_template_directory_uri() . '/assets/scripts/main.js', array('jquery'),'1.1', true);
  wp_enqueue_script('main_script');

  wp_register_script('responsive_nav_script', get_template_directory_uri() . '/assets/scripts/responsive_nav.js', array('jquery'),'1.1', true);
  wp_enqueue_script('responsive_nav_script');

  if ( is_front_page()  ) {

  wp_register_script('sponsor_slider_script', get_template_directory_uri() . '/assets/scripts/sponsor_slider.js', array('jquery'),'1.1', true);
  wp_enqueue_script('sponsor_slider_script');



  wp_register_script('planning', get_template_directory_uri() . '/assets/scripts/planning.js', array('jquery'),'1.1', true);
  wp_enqueue_script('planning');

  wp_register_script('custom_select_input', get_template_directory_uri() . '/assets/scripts/custom_select_input.js', array('jquery'),'1.1', true);
  wp_enqueue_script('custom_select_input');



  }
  if ( is_page('a-propos') || is_page('about')  ) {
    wp_register_script('planning', get_template_directory_uri() . '/assets/scripts/planning.js', array('jquery'),'1.1', true);
    wp_enqueue_script('planning');
    
    wp_register_script('custom_select_input', get_template_directory_uri() . '/assets/scripts/custom_select_input.js', array('jquery'),'1.1', true);
    wp_enqueue_script('custom_select_input');
  }

  wp_register_style( 'main_style', get_template_directory_uri() . '/assets/styles/main.css' );
  wp_enqueue_style( 'main_style' );

  wp_register_style( 'front_page_style', get_template_directory_uri() . '/assets/styles/front_page.css' );
  wp_enqueue_style( 'front_page_style' );

  wp_register_style( 'header_style', get_template_directory_uri() . '/assets/styles/header.css' );
  wp_enqueue_style( 'header_style' );

  wp_register_style( 'footer_style', get_template_directory_uri() . '/assets/styles/footer.css' );
  wp_enqueue_style( 'footer_style' );

  wp_register_style( 'hamb_style', get_template_directory_uri() . '/assets/styles/hamburger.css' );
  wp_enqueue_style( 'hamb_style' );

  wp_register_style( 'single_event_style', get_template_directory_uri() . '/assets/styles/single_event.css' );
  wp_enqueue_style( 'single_event_style' );

  wp_register_style( 'single_speaker_style', get_template_directory_uri() . '/assets/styles/single_speaker.css' );
  wp_enqueue_style( 'single_speaker_style' );
  
  wp_register_style( 'speaker_list_style', get_template_directory_uri() . '/assets/styles/speaker_list.css' );
  wp_enqueue_style( 'speaker_list_style' );

  wp_register_style( 'about_style', get_template_directory_uri() . '/assets/styles/about.css' );
  wp_enqueue_style( 'about_style' );


  wp_register_style( 'archives_style', get_template_directory_uri() . '/assets/styles/archives.css' );
  wp_enqueue_style( 'archives_style' );

  wp_register_style( 'practical_informations_style', get_template_directory_uri() . '/assets/styles/practical_informations.css' );
  wp_enqueue_style( 'practical_informations_style' );

}
 




