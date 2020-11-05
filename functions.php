<?php

function university_files() {
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_script('main-university-javascript', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features() {
  # Add support for the HTML title tag being controlled by the WP admin dashboard
  add_theme_support('title-tag');
  # Enable menus in the WordPress dashboard
  register_nav_menu('headerMenuLocation', 'Header Menu Location' );
  register_nav_menu('footerLocationOne', 'Footer Location One' );
  register_nav_menu('footerLocationTwo', 'Footer Location Two' );
}

# execute the university_features function after the theme is enabled
add_action('after_setup_theme', 'university_features');

# execute the function university_post_types after the init hook
add_action('init','university_post_types');

