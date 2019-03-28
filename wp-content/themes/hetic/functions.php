<?php
define( 'THEME_PATH' ,          get_template_directory()            );
define( 'TEMPLATE_PATH' ,       THEME_PATH .    '/templates'        );
define( 'THEME_URL' ,           get_template_directory_uri()        );
define( 'CSS_URL' ,             THEME_URL .    '/assets/styles'       );
define( 'IMAGES_URL' ,          THEME_URL .    '/assets/images'       );
define( 'JS_URL' ,              THEME_URL .    '/assets/scripts'      );
define( 'FAVICONS_URL' ,        THEME_URL .    '/assets/favicon'      );
define( 'FONTS_URL' ,           THEME_URL .    '/assets/fonts'      );
define( 'ADMIN_IMAGES_URL' ,    IMAGES_URL .   '/admin'             );
foreach ( glob( THEME_PATH . "/inc/*.php" ) as $file ) {
    include_once $file;
}

// Menus 
function register_my_menus() {
 register_nav_menus(
 array(
 'header-menu' => __( 'Menu Header' ),
 'footer-menu' => __( 'Menu Footer' ),
 'language-menu' => __( 'Language' ),
 )
 );
}

// Option Page
add_action( 'init', 'register_my_menus' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

//Image svg + xml 
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

//Api google map
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyCpfL-KU8u7NA5QURFxJL9nkld6_V2biIM');
}

add_action('acf/init', 'my_acf_init');


// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );
// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );



