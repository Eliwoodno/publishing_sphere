
<!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="<?php the_field('texte_meta_description');?>" />
    <title>Publishing Sphere - <?php if(get_the_title()): the_title(); else: echo "404"; endif; ?> </title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="icon" href="<?php the_field('favicon', 'options'); ?>"/>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
    <div class="flex-container">
      <a href="<?php echo home_url(); ?>">
        <img class="logo" src="<?php the_field('logo', 'options'); ?>" alt="<?php the_field('alt_logo', 'options'); ?>">
      </a>
      <div class="header_menu">
        <div><? wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?></div>
        <div><? wp_nav_menu( array( 'theme_location' => 'language-menu' ) ); ?></div>
      </div>
      <button class="hamburger hamburger--squeeze" type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
    </button>
    </div>
    
  </header>